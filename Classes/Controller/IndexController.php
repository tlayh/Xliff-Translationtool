<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Thomas Layh <develop@layh.com>, layh.com
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * IndexController
 */
class Tx_XliffTranslationtool_Controller_IndexController extends Tx_XliffTranslationtool_Controller_BaseController {

	/**
	 * @var string $rootPath The root path to search in
	 */
	protected $rootPath;

	/**
	 * @var Tx_XliffTranslationtool_Domain_Repository_LanguagesRepository
	 */
	protected $languagesRepository;

	/**
	 * @param Tx_XliffTranslationtool_Domain_Repository_LanguagesRepository $languageRepository
	 * @return void
	 */
	public function injectLanguageRepository(Tx_XliffTranslationtool_Domain_Repository_LanguagesRepository $languageRepository) {
		$this->languagesRepository = $languageRepository;
	}

	/**
	 * Display the start page
	 *
	 * @return void
	 * @author Thomas Layh <develop@layh.com>
	 */
	public function indexAction() {
		$this->setOptions();
	}

	/**
	 * Check here what to do, display local extensions with xliff or global extensions with xliff
	 *
	 * @return void
	 * @author Thomas Layh <develop@layh.com>
	 */
	public function selectGlobalOrLocalExtensionsAction() {
		$this->setOptions();

		$extensionType = $this->request->getArgument('extensionType');
		$this->view->assign('selectedValueExtensionType', $extensionType);

		$this->setExtensions($extensionType);

	}

	/**
	 * get the selected extension and display the available files
	 *
	 * @return void
	 * @author Thomas Layh <develop@layh.com>
	 */
	public function extensionFilesAction() {
		$this->setOptions();

		$extensionName = $this->request->getArgument('extension');
		$this->view->assign('selectedValueExtension', $extensionName);

		$extensionType = $this->request->getArgument('extensionType');
		$this->view->assign('selectedValueExtensionType', $extensionType);

		$this->setExtensions($extensionType);

			// get extensions from session
		$extensions = $GLOBALS['BE_USER']->getSessionData('xlifftranslationtool');

			// get selected extension from extensions from session
		/** @var Tx_xliffTranslationtool_Domain_Model_Extension $ext */
		foreach($extensions as $ext) {
			if($ext->getExtensionName() == $extensionName) {
				$extension = $ext;
			}
		}

		$this->view->assign('extensionName', $extensionName);
		$this->view->assign('files', $extension->getFiles());

	}

	/**
	 * @return void
	 * @author Thomas Layh <develop@layh.com>
	 */
	public function fileSelectionAction() {
		$this->setOptions();

		$extensionName = $this->request->getArgument('extension');
		$this->view->assign('selectedValueExtension', $extensionName);

		$extensionType = $this->request->getArgument('extensionType');
		$this->view->assign('selectedValueExtensionType', $extensionType);

		$this->setExtensions($extensionType);

		// get extensions from session
		$extensions = $GLOBALS['BE_USER']->getSessionData('xlifftranslationtool');

		// get selected extension from extensions from session
		/** @var Tx_xliffTranslationtool_Domain_Model_Extension $ext */
		foreach($extensions as $ext) {
			if($ext->getExtensionName() == $extensionName) {
				$extension = $ext;
			}
		}

		$this->view->assign('extensionName', $extensionName);
		$this->view->assign('files', $extension->getFiles());

		$selectedFile = $this->request->getArgument('file');
		$this->view->assign('selectedFile', $selectedFile);

		$availableLanguages = $this->getLanguages();
		$this->view->assign('languages', $availableLanguages);
	}

	/**
	 * @return void
	 * @author Thomas Layh <develop@layh.com>
	 */
	public function languageSelectionAction() {
		$this->setOptions();

		$extensionName = $this->request->getArgument('extension');
		$this->view->assign('selectedValueExtension', $extensionName);

		$extensionType = $this->request->getArgument('extensionType');
		$this->view->assign('selectedValueExtensionType', $extensionType);

		$this->setExtensions($extensionType);

		$selectedLanguage = $this->request->getArgument('language');
		$this->view->assign('selectedLanguage', $selectedLanguage);

		/** @var $xliffFileFunctions Tx_XliffTranslationtool_Utility_XliffFileFunctions */
		$xliffFileFunctions = $this->objectManager->create('Tx_XliffTranslationtool_Utility_XliffFileFunctions');

			// get extensions from session
		$extensions = $GLOBALS['BE_USER']->getSessionData('xlifftranslationtool');

			// get selected extension from extensions from session
		/** @var Tx_xliffTranslationtool_Domain_Model_Extension $ext */
		foreach($extensions as $ext) {
			if($ext->getExtensionName() == $extensionName) {
				$extension = $ext;
			}
		}

		$this->view->assign('extensionName', $extensionName);
		$this->view->assign('files', $extension->getFiles());

		$selectedFile = $this->request->getArgument('file');
		$this->view->assign('selectedFile', $selectedFile);

		$availableLanguages = $this->getLanguages();
		$this->view->assign('languages', $availableLanguages);

			// check if a translation already exists, then don't copy the file
		if($completePathToFile = $xliffFileFunctions->translationFileExists($selectedLanguage, $extensionName, $selectedFile)) {
			$fileData = $xliffFileFunctions->getFileContents($completePathToFile, $selectedLanguage);
			$this->view->assign('fileData', $fileData);
		}
	}

	/**
	 * set the extension in the view
	 *
	 * @param string $extensionType
	 * @return void
	 * @author Thomas Layh <develop@layh.com>
	 */
	private function setExtensions($extensionType) {

		// resolve current action name
		$currentActionName = $this->resolveActionMethodName();

		// only do the recursive search if we just selected the extension type
		if($currentActionName == 'selectGlobalOrLocalExtensionsAction') {
			/** @var $directoryFunctions Tx_xliffTranslationtool_Utility_DirectoryFunctions */
			$directoryFunctions = $this->objectManager->create('Tx_xliffTranslationtool_Utility_DirectoryFunctions');
			$extensions = $directoryFunctions->findExtensions(intval($extensionType), $this->settings['hideExtensions']);
			// save data to session
			$GLOBALS['BE_USER']->setAndSaveSessionData('xlifftranslationtool', $extensions);
		} else {
			$extensions = $GLOBALS['BE_USER']->getSessionData('xlifftranslationtool');
		}

		$this->view->assign('extensions', $extensions);
	}

	/**
	 *
	 *
	 * @return void
	 * @author Thomas Layh <develop@layh.com>
	 */
	public function saveTranslationAction() {

			// get required arguments
		$selectedExtension = $this->request->getArgument('selectedValueExtension');
		$translationData = $this->request->getArgument('translationData');
		$language = $this->request->getArgument('selectedLanguage');
		$file = $this->request->getArgument('selectedFile');
		$extensionType = $this->request->getArgument('selectedValueExtensionType');


		/** @var $xliffFileFunctions Tx_XliffTranslationtool_Utility_XliffFileFunctions */
		$xliffFileFunctions = $this->objectManager->create('Tx_XliffTranslationtool_Utility_XliffFileFunctions');
		if($xliffFileFunctions->generateXliff($selectedExtension, $language, $file, $translationData, $this->configurationManager)) {
			$this->flashMessageContainer->add('Translated file saved!!');
		} else {
			$this->flashMessageContainer->add('Error saving file!!');
		}

		$this->redirect('index');

	}

	/**
	 * set selectbox for the view
	 *
	 * @return void
	 * @author Thomas Layh <develop@layh.com>
	 */
	private function setOptions() {
		$options = array(0 => 'Local extensions (typo3conf/ext)', 1 => 'Global extensions (typo3/sysext)');
		$this->view->assign('options', $options);
	}

	/**
	 * getLanguages
	 * @return array
	 * @author Thomas Layh <develop@layh.com>
	 */
	private function getLanguages() {

			// get settings
		$limitToLanguages = $this->settings['displayLanguages'];

			// check if languages are limited
		if (empty($limitToLanguages)) {
			$languages = $this->languagesRepository->findAll()->toArray();
		} else {
			$selectedLanguages = explode(',', $limitToLanguages);
			$languages = $this->languagesRepository->findBySelectedLanguages($selectedLanguages);
		}

		// @todo check if language key is set, there are some entries that have an invalid language key

		return $languages;
	}

	/**
	 * help action
	 *
	 * this empty should just display the content
	 *
	 * @return void
	 */
	public function helpAction() {
	}

}

?>
