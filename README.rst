========================
XLIFF Translation tool
========================

:Author:
	Thomas Layh <thomas@layh.com>
	http://www.layh.com


Description:
---------------

XLIFF Translation tool is designed to have an easy way to translate some labels.

If you find a bug, report it to: https://github.com/tlayh/Xliff-Translationtool

TypoScript configuration:
--------------------------------

Hide extensions that you don't want to show up in the list (constants)::

	module.tx_xlifftranslationtool.settings.hideExtensions = cms, css_styled_content, viewpage

Show only some languages::

	module.tx_xlifftranslationtool.settings.displayLanguages = de, en, gb, us, fr