<?php

########################################################################
# Extension Manager/Repository config file for ext "xliff_translationtool".
#
# Auto generated 17-04-2012 21:23
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'XLIFF Translation Tool',
	'description' => 'Backendmodul to add translations for xliff',
	'category' => 'module',
	'author' => 'Thomas Layh',
	'author_email' => 'thomas@layh.com',
	'author_company' => '',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.1.0',
	'constraints' => array(
		'depends' => array(
			'cms' => '4.6.0-0.0.0',
			'extbase' => '1.4.0-0.0.0',
			'fluid' => '1.4.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:48:{s:21:"ExtensionBuilder.json";s:4:"762c";s:10:"README.rst";s:4:"f4ea";s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"ef4d";s:14:"ext_tables.php";s:4:"edb8";s:14:"ext_tables.sql";s:4:"d41d";s:37:"Classes/Controller/BaseController.php";s:4:"fa2c";s:40:"Classes/Controller/ConvertController.php";s:4:"7775";s:38:"Classes/Controller/IndexController.php";s:4:"2566";s:34:"Classes/Domain/Model/Extension.php";s:4:"925d";s:29:"Classes/Domain/Model/File.php";s:4:"a092";s:34:"Classes/Domain/Model/Languages.php";s:4:"7a93";s:49:"Classes/Domain/Repository/LanguagesRepository.php";s:4:"c3fb";s:32:"Classes/Utility/AjaxResponse.php";s:4:"793b";s:38:"Classes/Utility/DirectoryFunctions.php";s:4:"92fd";s:36:"Classes/Utility/ExtbaseConnector.php";s:4:"e777";s:38:"Classes/Utility/XliffFileFunctions.php";s:4:"16e0";s:26:"Classes/View/ArrayView.php";s:4:"d057";s:44:"Classes/ViewHelpers/ScriptfileViewHelper.php";s:4:"68a4";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"0ac8";s:38:"Configuration/TypoScript/constants.txt";s:4:"e978";s:34:"Configuration/TypoScript/setup.txt";s:4:"2dc6";s:46:"Resources/Private/Backend/Layouts/Default.html";s:4:"8e23";s:49:"Resources/Private/Backend/Partials/Extension.html";s:4:"1a95";s:53:"Resources/Private/Backend/Partials/ExtensionType.html";s:4:"9443";s:44:"Resources/Private/Backend/Partials/File.html";s:4:"9a63";s:49:"Resources/Private/Backend/Partials/Languages.html";s:4:"e4e9";s:50:"Resources/Private/Backend/Partials/Navigation.html";s:4:"30a0";s:54:"Resources/Private/Backend/Templates/Convert/Index.html";s:4:"1be5";s:61:"Resources/Private/Backend/Templates/Index/ExtensionFiles.html";s:4:"b228";s:60:"Resources/Private/Backend/Templates/Index/FileSelection.html";s:4:"7b8e";s:51:"Resources/Private/Backend/Templates/Index/Help.html";s:4:"062d";s:52:"Resources/Private/Backend/Templates/Index/Index.html";s:4:"0c45";s:64:"Resources/Private/Backend/Templates/Index/LanguageSelection.html";s:4:"3272";s:76:"Resources/Private/Backend/Templates/Index/SelectGlobalOrLocalExtensions.html";s:4:"63d5";s:40:"Resources/Private/Language/locallang.xlf";s:4:"682d";s:43:"Resources/Private/Language/locallang_db.xlf";s:4:"040c";s:61:"Resources/Private/Language/locallang_xlifftranslationtool.xlf";s:4:"88f1";s:43:"Resources/Private/XliffTemplates/Footer.xlf";s:4:"1697";s:43:"Resources/Private/XliffTemplates/Header.xlf";s:4:"86b5";s:52:"Resources/Private/XliffTemplates/TranslationUnit.xlf";s:4:"423b";s:30:"Resources/Public/Css/Style.css";s:4:"a788";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:29:"Resources/Public/Js/Script.js";s:4:"9220";s:21:"doc/Configuration.rst";s:4:"5ccc";s:13:"doc/Index.rst";s:4:"b070";s:20:"doc/Installation.rst";s:4:"6dd1";s:20:"doc/Introduction.rst";s:4:"b382";}',
);

?>