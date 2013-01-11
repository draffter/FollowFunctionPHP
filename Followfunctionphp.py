import sublime, sublime_plugin
import tempfile, os, sys
import fnmatch
import re


class FollowfunctionphpCommand(sublime_plugin.TextCommand):
	resultfiles = []
	dbPath = ""
	word = ""

	def grepDb(self, filename):
		isresult = None
		files = []
		if os.path.isfile(filename):
			for n, line in enumerate(open(filename)):
				if self.word.decode('utf-8') in line.decode('utf-8'):
					tmpline = line.split(";")
					if tmpline[1] != "":
						self.resultfiles.append(tmpline[1])
						isresult = 1
		else:
			print "Brak indeksu"
			sublime.status_message('Please reindex files')
		return isresult

	def grep(self, filename):
		datafile = filename.replace('\\', '/').replace('\n','')
		for n, line in enumerate(open(datafile)):
			if self.word.decode('utf-8') in line.decode('utf-8'):
				return datafile + ":" + str(n+1) + ":0"
		return None

	def openfile(self, num):
		# print "Plikow znalezionych: %d" % len(self.resultfiles)
		if num > -1:
			selectedFile = os.path.normpath(self.resultfiles[num])
			fileWithPosition = self.grep(selectedFile)
			self.view.window().open_file(fileWithPosition,sublime.ENCODED_POSITION)
		elif num == -2:
			self.view.window().show_quick_panel(self.resultfiles, self.openfile)
		else:
			print "nie ma funkcji"
			sublime.status_message('No function found! Reindex!')

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