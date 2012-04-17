<?php
/**
 * DirectoryFunctions
 * @author Thomas Layh <thomas@layh.com>
 */

/**
 *
 */
class Tx_XliffTranslationtool_Utility_DirectoryFunctions {

	/**
	* Extbase Object Manager
	* @var Tx_Extbase_Object_ObjectManager
	*/
	protected $objectManager;

	/**
	 * @var string
	 */
	protected $rootPath;

	/**
	 * default constructor
	 */
	public function __construct() {
		$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
	}

	/**
	 * Find either global or local extensions depending on the selected extension type
	 *
	 * @param integer $extensionType
	 * @param string $hiddenExtensions
	 * @return array
	 * @author Thomas Layh <thomas@layh.com>
	 */
	public function findExtensions($extensionType, $hiddenExtensions) {
		$this->setRootPath($extensionType);

		// find extension with xliff files (revursive)
		$extensions = $this->recursiveDirectorySearch($this->rootPath, $extensions);
		$extensions = $this->cleanUpResultArray($extensions);

		// check for hidden extensions
		//t3lib_utility_Debug::debug($extensions);
		$cleanedExtensions = new ArrayObject();
		if($hiddenExtensions && strlen($hiddenExtensions) > 0) {

				/** @var Tx_XliffTranslationtool_Domain_Model_Extension $ext */
			foreach($extensions as $ext) {
				// if extension found in $hiddenExtensions string, add it to extensions allowed to translate
				if(stristr($hiddenExtensions, $ext->getExtensionName()) === FALSE) {
					$cleanedExtensions->append($ext);
				}
			}
			return $cleanedExtensions;
		}

		return $extensions;
	}


	private function setRootPath($extensionType, $extensionName='') {

		if ($extensionType == 0) {
			$this->rootPath = t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/typo3conf/ext';
		} elseif ($extensionType == 1) {
			$this->rootPath = t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/typo3/sysext';
		}

		if($extensionName != '') {
			$this->rootPath = $this->rootPath . '/' . $extensionName;
		}
	}

	private function cleanUpResultArray($files) {
		$cleanResult = new ArrayObject();

		/** @var $extension Tx_xliffTranslationtool_Domain_Model_Extension */
		$extension = NULL;

		foreach($files as $key => $file) {

			$keyParts = explode('/', $key);
			$extKey = $keyParts[0];

			// check if extension already exists in cleanResult
			$found = FALSE;
			/** @var  $cR Tx_xliffTranslationtool_Domain_Model_Extension */
			foreach($cleanResult as $cR) {
				if($cR->getExtensionName() == $extKey) {
					$found = TRUE;
					$extension = $cR;
				}
			}

				// if the extension does not yet exist, create a new model for the extension
			if(!$found) {
				$extension = $this->objectManager->create('Tx_XliffTranslationtool_Domain_Model_Extension');
			}

			$tempPath = '';
			$subDirCount = count($keyParts)-1;
			if($subDirCount > 0) {
				for($i=1; $i<=$subDirCount; $i++) {
					$tempPath .= $keyParts[$i].'/';
				}
			}

			$extension->setExtensionName($extKey);
			foreach($file as $f) {
				/* @var $fileObject Tx_xliffTranslationtool_Domain_Model_File */
				$fileObject = $this->objectManager->create('Tx_XliffTranslationtool_Domain_Model_File');
				$fileObject->setFileName($f);
				$fileObject->setFilePath($tempPath.$f);
				$extension->addFile($fileObject);
			}
			$extension->setLabelField($extKey . " (" . $extension->getCount() . ")");

			$cleanResult->append($extension);
		}

		return $cleanResult;
	}

	/**
	 * recursive search through the directories
	 *
	 * @param string $dir
	 * @param array $files
	 * @return array
	 * @author Thomas Layh <thomas@layh.com>
	 */
	private function recursiveDirectorySearch($dir, &$files) {

			// check for my templates that are used to create the xliff files later
		if (strpos($dir, 'xliff_translationtool/Resources/Private/XliffTemplates')) {
			return $files;
		}

		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					if (is_dir($dir . '/' . $file)) {
						$dir2 = $dir . '/' . $file;
						$this->recursiveDirectorySearch($dir2, $files);
					} else {
						$extensionName = str_replace($this->rootPath.'/', '', $dir);
						if(end(explode(".", $file)) == 'xlf') {
							$files[$extensionName][] = $file;
						}
					}
				}
			}
			closedir($handle);
		}

		return $files;
	}
}