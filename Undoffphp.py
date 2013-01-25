import sublime, sublime_plugin
import tempfile, os, sys
import fnmatch
import re

class UndoffphpCommand(sublime_plugin.TextCommand):

	def run(self, edit):
		self.getUndo()

	def getUndo(self):
		dbFilename = os.path.join(sublime.packages_path(), "Followfunctionphp", "undo").replace('\\', '/').replace('\n','')
		with open(dbFilename, 'r+') as f:
			lines = f.readlines()
		f.close
		last = len(lines)-1
		if last > 0:
			fileWithPosition = lines[last].replace('\\', '/').replace('\n','')
			with open(dbFilename, 'w') as f:
				for (cnt, line) in enumerate(lines):
					if cnt < last:
						f.write(line)
			f.close()
			self.view.window().open_file(fileWithPosition,sublime.ENCODED_POSITION)
		else:
			sublime.status_message("No history.")


		# dbFile = open(dbFilename, 'r')
		# fileWithPosition = dbFile.readline().replace('\\', '/').replace('\n','')
		# dbFile.close()
