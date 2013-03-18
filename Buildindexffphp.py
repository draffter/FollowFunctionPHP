import sublime, sublime_plugin
import tempfile, os, sys
import fnmatch
import re
import threading


class BuildindexffphpCommand(sublime_plugin.TextCommand):

	def checkPathForDB(self):
		for root, dirs, files in os.walk(sublime.packages_path()):
			for onedir in dirs:
				if re.match(r'.ollow ?.unction ?php', onedir):
					self.pathForDB = onedir

	def run(self, edit):
		threads = []
		dirs = self.getDirectories()
		self.dirCount = len(dirs)
		self.checkPathForDB()
		for dir in dirs:
			pName = self.getDirectoryMD5(dir)
			dbPath = os.path.join(sublime.packages_path(), self.pathForDB, pName)
			thread = BuildindexThread(dir, dbPath)
			threads.append(thread)
			thread.start()
		sublime.status_message("Indexing, please be patient")
		self.handle_threads(threads)

	# obsluga watkow indeksowania,
	# osobny watek dla kazdego katalogu w lewym oknie
	def handle_threads(self, threads):
		next_threads = []
		for thread in threads:
			if thread.is_alive():
				next_threads.append(thread)
				continue
			if thread.result == False:
				continue
		threads = next_threads
		if (len(threads)):
			sublime.status_message("Indexing files. Remaining: %d" % (self.dirCount - (self.dirCount - len(threads))))
			sublime.set_timeout(lambda: self.handle_threads(threads), 200)
		else:
			sublime.status_message("Thank you for indexing. Plugin is ready to use")

		return

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

class BuildindexThread(threading.Thread):
	functionsArray = []
	dbFile = None

	# przeszukuje plik pod katem podanego paternu,
	# zapisuje, jezeli patern zostal znaleziony
	def grep(self, filename, pattern):
		datafile = file(filename)
		for line in datafile:
			if pattern.decode('utf-8') in line.decode('utf-8','ignore'):
				start = line.find("function")
				if start > -1:
					stop = line.find(")")+1
					nazwaFunkcji = line[start:stop]
					lineToFile = nazwaFunkcji + ";" + filename
					try:
						self.dbFile.write(lineToFile.decode('utf-8') + "\n")
					except IOError:
						print "blad zapisu"

	# przeszukuje katalog pod katem plikow
	# w tym przypadku .php
	def find(self, path, tofind, filePattern):
		project_path = os.path.normpath(path)
		# print "project path %s" % project_path
		for path, dirs, files in os.walk(os.path.abspath(project_path)):
			for filename in fnmatch.filter(files, filePattern):
				# print "filename in path %s" % filename
				filepath = os.path.join(path, filename)
				if fnmatch.fnmatch(filepath, filePattern):
					result = self.grep(filepath, tofind)

	# inicjuje plik z baza danych
	def initDb(self, filename):
		try:
			self.dbFile = open(filename, 'w')
			return True
		except IOError:
			print "blad otwarcia "+filename
		return False

	# zamyka plik bazy danych
	def closeDb(self):
		try:
			self.dbFile.close()
		except IOError:
			print "blad zamkniecia "

	def __init__(self, dir, dbPath):
		self.dir = dir
		self.dbPath = dbPath
		self.result = None
		threading.Thread.__init__(self)

	def run(self):
		if self.initDb(self.dbPath):
			self.find(self.dir, "function ", "*.php")
			self.closeDb()
		return
