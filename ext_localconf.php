<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'mod1',
	// cachable actions
	array(
		'Index'   => 'index,selectGlobalOrLocalExtensions,extensionFiles,fileSelection,languageSelection,saveTranslation,help',
		'Convert' => 'index',
		'Admin'   => 'index',
	),
	// non-cacheable actions
	array(

	)
);

if (TYPO3_MODE === 'BE') {
	/** @noinspection PhpUndefinedVariableInspection */
	$extPath = t3lib_extMgm::extPath($_EXTKEY);
	t3lib_extMgm::addTypoScriptConstants(
		file_get_contents($extPath . 'Configuration/TypoScript/constants.txt')
	);

	t3lib_extMgm::addTypoScriptSetup(
		file_get_contents($extPath . 'Configuration/TypoScript/setup.txt')
	);
}

?>