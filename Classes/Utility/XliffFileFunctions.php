<?php
/**
 * FileFunctions
 * @author Thomas Layh <thomas@layh.com>
 */

/**
 *
 */
class Tx_XliffTranslationtool_Utility_XliffFileFunctions {

	private $l10nPath = 'typo3conf/l10n/';

	private $pathLocal = 'typo3conf/ext/';
	private $pathGlobal = 'typo3/sysext/';

	/**
	* Extbase Object Manager
	* @var Tx_Extbase_Object_ObjectManager
	*/
	protected $objectManager;

	/**
	 * default constructor
	 */
	public function __construct() {
		$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
	}

	/**
	 * @param string $source
	 * @param string $target
	 * @param string $languageKey
	 * @return boolean
	 */
	public function copyFile($source, $target, $languageKey) {

		// cut the filename from the target
		$parts = explode('/', $target);
		$filenameTarget = array_pop($parts);
		$targetPath = implode('/', $parts);

		// if path does not yet exists, create the path recursive
		if (!file_exists($targetPath)) {
			if (!mkdir($targetPath, 0777, TRUE)) {
				return false;
			}
		}


		// @todo check for errors here and make a better replacement for target-language
		$data = file_get_contents($source);
		$data = str_replace('target-language="en"', 'target-language="' . $languageKey . '"', $data);

		if (file_put_contents($target, $data)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param string $languageKey
	 * @param string $extensionName
	 * @param string $extensionType
	 * @param string $fileName
	 * @return bool|string
	 */
	public function translationFileExists($languageKey, $extensionName, $extensionType, $fileName) {

		if ($extensionType == 0) {
			$pathToExtension = $this->pathLocal;
		} else {
			$pathToExtension = $this->pathGlobal;
		}

			// prepare fileName
		$fileParts = explode('/', $fileName);
		$fileNameWithoutPath = array_pop($fileParts);

		$fileNameWithLanguageKey = $languageKey . '.' . $this->removeExistingLanguageKeyFromFileTarget($fileNameWithoutPath);;
		$tempPath = implode('/', $fileParts);

		$completePathToFile = t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/' . $this->l10nPath . $languageKey . '/' . $extensionName . '/' . $tempPath . '/' . $fileNameWithLanguageKey;

		if (!file_exists($completePathToFile)) {
			$source = t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/' . $pathToExtension . '' . $extensionName . '/' . $tempPath . '/' . $fileNameWithoutPath;
			$target = $completePathToFile;

			if ($this->copyFile($source, $target, $languageKey)) {
				return $completePathToFile;
			} else {
				return FALSE;
			}
		}
		return $completePathToFile;
	}

	/**
	 * @param string $fileNameWithoutPath
	 * @return string $fileNameWithoutPathAndLanguageKey
	 */
	protected function removeExistingLanguageKeyFromFileTarget($fileNameWithoutPath) {
		$parts = explode('.', $fileNameWithoutPath);
		if (count($parts) > 2) {
			array_shift($parts);
			$fileNameWithoutPath = implode('.', $parts);
		}
		return $fileNameWithoutPath;
	}

	/**
	 * set complete path to file and use xliff parser to get the data as array
	 *
	 * @param string $fileRef
	 * @return array
	 */
	public function getFileContents($fileRef) {
		$data = $this->getXliffData($fileRef);
		return $data;
	}

	/**
	 * @param string $data
	 * @param string $completePathToFile
	 * @return int
	 */
	private function setFileContents($data, $completePathToFile) {
		return file_put_contents($completePathToFile, $data);
	}

	/**
	 * @param string $selectedExtension
	 * @param string $language
	 * @param string $file
	 * @param $configurationManager
	 * @param array $translationData
	 * @param string $extensionType
	 * @return int
	 */
	public function generateXliff($selectedExtension, $language, $file, $translationData, $configurationManager, $extensionType) {

			// get xliff view header
		$xliffViewHeader = $this->getXliffRenderer($configurationManager, 'Header');
		$xliffViewHeader->assign('productName', $selectedExtension);
		$xliffViewHeader->assign('targetLanguage', $language);
		$xliffViewHeader->assign('date', date('Y-m-d'));
		$contentHead = $xliffViewHeader->render();

			// get xliff view content
		$xliffViewTranslationUnit = $this->getXliffRenderer($configurationManager, 'TranslationUnit');
		$contentTranslations = '';
		foreach($translationData as $trKey => $trData) {
			$xliffViewTranslationUnit->assign('translationKey', $trKey);
			$xliffViewTranslationUnit->assign('translationSource', $trData['source']);
			$xliffViewTranslationUnit->assign('translationTarget', $trData['target']);
			$contentTranslations .= $xliffViewTranslationUnit->render();
		}

			// get xliff view footer
		$xliffViewFooter = $this->getXliffRenderer($configurationManager, 'Footer');
		$contentFooter = $xliffViewFooter->render();

		$content = $contentHead . $contentTranslations . $contentFooter;

		$completePathToFile = $this->translationFileExists($language, $selectedExtension, $extensionType, $file);

		return $this->setFileContents($content, $completePathToFile);
	}

	/**
	 * Get the view for the current part
	 *
	 * @param Tx_Extbase_Configuration_ConfigurationManager $configurationManager
	 * @param string $templateName
	 * @return Tx_Fluid_View_StandaloneView
	 */
	private function getXliffRenderer($configurationManager, $templateName) {

		/** @var $xliffView Tx_Fluid_View_StandaloneView */
		$xliffView = $this->objectManager->create('Tx_Fluid_View_StandaloneView');
		$xliffView->setFormat('xml');

		$extbaseFrameworkConfiguration = $configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$xliffTemplatePath = t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPathXliff']);

		$templatePathAndFilename = $xliffTemplatePath . $templateName . '.xlf';
		$xliffView->setTemplatePathAndFilename($templatePathAndFilename);
		$xliffView->assign('settings', $this->settings);
		return $xliffView;
	}

	/**
	 * convert the file to an array to display
	 *
	 * @param string $fileRef
	 * @return array
	 */
	private function getXliffData($fileRef) {

		if (file_exists($fileRef)) {
			$fileData = file_get_contents($fileRef);
			$simpleXml = new SimpleXMLElement($fileData);

				// get children
			$translationUnits = $simpleXml->file->body->children();

			$translationArray = array();

			if ($translationUnits) {
				foreach ($translationUnits as $transUnit) { /** @var $transUnit SimpleXMLElement  */
					$key =  $transUnit->attributes()->id;

					$sourceValue = $transUnit->source;
					$translationArray[(string)$key]['source'] = (string)$sourceValue;

					$targetValue = (string)$transUnit->target;
					if ($targetValue == "") {
						$targetValue = $sourceValue;
					}
					$translationArray[(string)$key]['target'] = (string)$targetValue;
				}
			}
		}

		return $translationArray;

	}

}