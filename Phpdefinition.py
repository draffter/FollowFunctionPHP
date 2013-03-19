import sublime, sublime_plugin
import tempfile, os, sys
import fnmatch
import linecache
import webbrowser
import re

class PhpdefinitionCommand(sublime_plugin.TextCommand):
	word = ""
	link = ""

	# przeszukuje plik z indeksem za nazwa funkcji
	def grepDb(self):
		filePattern ="*.php"
		filepath = ""
		dirs = os.path.join(sublime.packages_path(), self.pathForDB, "_php")
		for path, dirs, files in os.walk(os.path.abspath(dirs)):
			for filename in fnmatch.filter(files, filePattern):
				filepath = os.path.join(path, filename)
				if fnmatch.fnmatch(filepath, filePattern):
					for n, line in enumerate(open(filepath)):
						if self.word.decode('utf-8','ignore') in line.decode('utf-8','ignore'):
							self.getDefinition(filepath, n)


	# pobiera linie z definicja
	def getDefinition(self, filepath, lineNumber):
		lines = []
		mainLine = linecache.getline(filepath, lineNumber+1)
		for i in reversed(range(lineNumber)):
			tmpLine = linecache.getline(filepath, i)
			if "/**" in tmpLine or i == 1:
				break
			lines.append(tmpLine)
		self.parseDefinition(lines[::-1], mainLine)

	# parsuje i wyswietla definicje
	def parseDefinition(self, data, mainLine):
		params = []
		returns = []
		params.append(mainLine)
		params.append("")
		for line in data:
			if "/**" in line or "*/" in line:
				continue
			if "@link" in line:
				idx = line.find("http")
				self.link = line[idx:]
			else:
				params.append(line.replace(" * ", "").replace("<p>","").replace("</p>","").replace("@param ","$").decode('utf-8','ignore'))
		returns.append(params)
		self.view.window().show_quick_panel(returns, self.openInWeb)

	# otwiera definicje funkcji w przegladarce
	def openInWeb(self,result):
		if result > -1:
			if sublime.ok_cancel_dialog("Open definition in web browser?"):
				webbrowser.open_new_tab(self.link)

	# pobiera slowo, na ktorym jest kursor
	def getword(self):
		sel = self.view.sel()[0]
		sel = self.view.word(sel)
		string = self.view.substr(sel)
		return string

	def checkPathForDB(self):
		for root, dirs, files in os.walk(sublime.packages_path()):
			for onedir in dirs:
				if re.match(r'.ollow ?.unction ?php', onedir):
					self.pathForDB = onedir

	def run(self, edit):
		self.checkPathForDB()
		self.word = "function " + self.getword()
		self.grepDb()

