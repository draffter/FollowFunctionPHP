import sublime, sublime_plugin
import tempfile, os, sys
import fnmatch
import re

class BuildindexCommand(sublime_plugin.TextCommand):
	functionsArray = []
	dbFile = None

	def grep(self, filename, pattern):
		datafile = file(filename)
		for line in datafile:
			if pattern.decode('utf-8') in line.decode('utf-8'):
				templine = []
				templine = line.split()
				# print templine
				ind = templine.index("function")+1
				nazwaFunkcji = templine[ind]
				lineToFile = nazwaFunkcji + ";" + filename
				try:
					self.dbFile.write(lineToFile.decode('utf-8') + "\n")
				except IOError:
					print "blad zapisu"

	def find(self, path, tofind, filePattern):
		project_path = os.path.normpath(path)
		print "project path %s" % project_path
		for path, dirs, files in os.walk(os.path.abspath(project_path)):
			for filename in fnmatch.filter(files, filePattern):
				print "filename in path %s" % filename
				filepath = os.path.join(path, filename)
				if fnmatch.fnmatch(filepath, filePattern):
					result = self.grep(filepath, tofind)

	def initDb(self, filename):
		try:
			self.dbFile = open(filename, 'w')
			return True
		except IOError:
			print "blad otwarcia "+filename
		return False

	def closeDb(self):
		try:
			self.dbFile.close()
		except IOError:
			print "blad zamkniecia "

	def run(self, edit):
		dirs = self.getDirectories()
		for dir in dirs:
			print dir
			pName = self.getDirectoryMD5(dir)
			dbPath = os.path.join(sublime.packages_path(), "Followfunctionphp", pName)
			print dbPath
			if self.initDb(dbPath):
				self.find(dir, " function ", "*.php")
				self.closeDb()
		return

	def getDirectories(self):
		return sublime.active_window().folders()

	def getDirectoryMD5(self, dir):
		import hashlib
		m = hashlib.md5()
		m.update(dir)
		md5var = m.hexdigest()
		return md5var
