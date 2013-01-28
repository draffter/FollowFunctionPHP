import sublime, sublime_plugin
import tempfile, os, sys
import fnmatch
import re


class FollowfunctionphpCommand(sublime_plugin.TextCommand):
	resultfiles = []
	dbPath = ""
	word = ""

	# przeszukuje plik z indeksem za nazwa funkcji
	def grepDb(self, filename):
		isresult = None
		files = []
		if os.path.isfile(filename):
			for n, line in enumerate(open(filename)):
				if self.word.decode('utf-8') in line.decode('utf-8'):
					tmpline = line.split(";")
					if tmpline[1] != "":
						self.resultfiles.append(tmpline)
						isresult = 1
		else:
			print "Brak indeksu"
			sublime.status_message('Please reindex files')
		return isresult

	# przeszukuje plik, w ktorym jest funkcja,
	# aby otworzyc w odpowiednim miejscu
	def grep(self, filename):
		datafile = filename.replace('\\', '/').replace('\n','')
		for n, line in enumerate(open(datafile)):
			search = "function " + self.word
			if search.decode('utf-8') in line.decode('utf-8'):
				return datafile + ":" + str(n+1) + ":0"
		return None

	# otwiera plik z funkcja, lub wyswietla liste Plikow
	# jezeli funkcja wystepuje w wiekszej ilosci plikow
	def openfile(self, num):
		# print "Plikow znalezionych: %d" % len(self.resultfiles)
		if num > -1:
			selectedFile = os.path.normpath(self.resultfiles[num])
			fileWithPosition = self.grep(selectedFile)
			self.saveUndo()
			self.view.window().open_file(fileWithPosition,sublime.ENCODED_POSITION)
		elif num == -2:
			if len(self.resultfiles) == 1:
				selectedFile = os.path.normpath(self.resultfiles[0])
				fileWithPosition = self.grep(selectedFile)
				self.saveUndo()
				self.view.window().open_file(fileWithPosition,sublime.ENCODED_POSITION)
			else:
				self.view.window().show_quick_panel(self.resultfiles, self.openfile, sublime.MONOSPACE_FONT)
		else:
			print "nie ma funkcji"
			sublime.status_message('No function found! Reindex!')

	# zapisuje miejsce, z ktorego wywolano plugin, aby wrocic
	def saveUndo(self):
		for region in self.view.sel():
			column = self.view.rowcol(region.begin())[1] + 1
			row = self.view.rowcol(region.begin())[0] + 1
			# (row,col) = self.view.rowcol(self.view.sel()[0].begin())

		undoFilename = self.view.file_name() + ":" + str(row) + ":" + str(column)
		filename = os.path.join(sublime.packages_path(), "Followfunctionphp", "undo")
		if os.path.isfile(filename) == False:
			with open(filename, 'w') as f:
				f.write(undoFilename.decode('utf-8') + "\n")
			f.close()
		else:
			with open(filename, 'r+') as f:
				lineCnt = sum(1 for line in f)
				if lineCnt > 4 :
					f.seek(0,0)
					lines = f.readlines()
					# print lines
					f.close
					with open(filename, 'w') as f:
						for (cnt, line) in enumerate(lines):
							if cnt > (lineCnt-4-1):
								f.write(line)
						f.write(undoFilename.decode('utf-8') + "\n")
					f.close()
				else:
					f.write(undoFilename.decode('utf-8') + "\n")
					f.close()

	# pobiera slowo, na ktorym jest kursor
	def getword(self):
		sel = self.view.sel()[0]
		sel = self.view.word(sel)
		string = self.view.substr(sel)
		return string

	# pobiera liste katalogow otwartych (lewe okno)
	def getDirectories(self):
		return sublime.active_window().folders()

	# poiera hash pliku z baza
	def getDirectoryMD5(self, dir):
		import hashlib
		m = hashlib.md5()
		m.update(dir)
		md5var = m.hexdigest()
		return md5var

	def run(self, edit):
		# print 'START'
		self.resultfiles = []
		self.word = self.getword()
		dirs = self.getDirectories()
		found = 0
		for dir in dirs:
			pName = self.getDirectoryMD5(dir)
			dbPath = os.path.join(sublime.packages_path(), "Followfunctionphp", pName)
			r = self.grepDb(dbPath)
			if r != None:
				# print "znalezione w %s" % dir
				found = 1

		if found == 1:
			# print "jest funkcja"
			# print self.resultfiles
			self.openfile(-2)

		else:
			print "nie ma funkcji"
			sublime.status_message('No function found! Reindex!')

		return