import sublime, sublime_plugin
import tempfile, os, sys
import fnmatch
import re

class BuildindexCommand(sublime_plugin.TextCommand):
	functionsArray = []

	def grep(self, filename, pattern):
		datafile = file(filename)
		for line in datafile:
			if pattern.decode('utf-8') in line.decode('utf-8'):
				templine = []
				templine = line.split()
				print templine
				ind = templine.index("function")+1
				nazwaFunkcji = templine[ind]
				self.functionsArray.append(nazwaFunkcji + ";" + filename)

	def find(self, path, tofind, filePattern):
		project_path = os.path.normpath(path)
		print "project path %s" % project_path
		for path, dirs, files in os.walk(os.path.abspath(project_path)):
			for filename in fnmatch.filter(files, filePattern):
				print "filename in path %s" % filename
				filepath = os.path.join(path, filename)
				if fnmatch.fnmatch(filepath, filePattern):
					result = self.grep(filepath, tofind)

	def saveDbToFile(self, file):
		file = open(file, 'w')
		for line in self.functionsArray:
			file.write(line + "\n")
		file.close()
		self.functionsArray = []

	def run(self, edit):
		dirs = self.getDirectories()
		for dir in dirs:
			pName = self.getDirectoryMD5(dir)
			self.dbPath = os.path.join(sublime.packages_path(), "Followfunctionphp", pName)
			print self.dbPath
			self.find(dir, " function ", "*.php")
			self.saveDbToFile(pName)
		return

	def getDirectories(self):
		return sublime.active_window().folders()

	def getDirectoryMD5(self, dir):
		import hashlib
		m = hashlib.md5()
		m.update(dir)
		md5var = m.hexdigest()
		return md5var
