import sublime, sublime_plugin
import tempfile, os, sys
import fnmatch
import re


class FollowfunctionphpCommand(sublime_plugin.TextCommand):
	resultfiles = []
	dbPath = ""
	word = ""
	# view.run_command('followfunctionphp') ctrl+k, ctrl+a
	def grepDb(self, filename):
		isresult = None
		files = []
		if os.path.isfile(filename):
			for n, line in enumerate(open(filename)):
				if self.word.decode('utf-8') in line.decode('utf-8'):
					tmpline = line.split(";")
					self.resultfiles.append(tmpline[1])
					isresult = 1
		else:
			print "Brak indeksu"
			sublime.status_message('Wykonaj indeksacje funkcji')
		return isresult

	def grep(self, filename):
		datafile = filename.replace('\\', '/').replace('\n','')
		for n, line in enumerate(open(datafile)):
			if self.word.decode('utf-8') in line.decode('utf-8'):
				return datafile + ":" + str(n+1) + ":0"
		return None

	def openfile(self, num):
		print "Plikow znalezionych: %d" % len(self.resultfiles)
		if num > -1:
			selectedFile = os.path.normpath(self.resultfiles[num])
			fileWithPosition = self.grep(selectedFile)
			self.view.window().open_file(fileWithPosition,sublime.ENCODED_POSITION)
		elif num == -2:
			self.view.window().show_quick_panel(self.resultfiles, self.openfile)
		else:
			print "nie ma funkcji"
			sublime.status_message('Nie znaleziono funkcji! Wykonaj ponowna indeksacje funkcji')

	def getword(self):
		sel = self.view.sel()[0]
		sel = self.view.word(sel)
		string = self.view.substr(sel)
		return string

	def getDirectories(self):
		return sublime.active_window().folders()

	def getDirectoryMD5(self, dir):
		import hashlib
		m = hashlib.md5()
		m.update(dir)
		md5var = m.hexdigest()
		return md5var

	def run(self, edit):
		self.resultfiles = []
		self.word = self.getword()
		dirs = self.getDirectories()
		found = 0
		for dir in dirs:
			dbFile = self.getDirectoryMD5(dir)
			r = self.grepDb(dbFile)
			if r != None:
				print "znalezione"
				found = 1

		if found == 1:
			print "jest funkcja"
			print self.resultfiles
			self.openfile(-2)

		else:
			print "nie ma funkcji"
			sublime.status_message('Nie znaleziono funkcji! Wykonaj ponowna indeksacje funkcji')

		return