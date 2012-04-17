<?php
/**
 * Tx_xliffTranslationtool_Domain_Model_Extension
 *
 * Model for Extension
 *
 * @author Thomas Layh <thomas@layh.com>
 */
class Tx_XliffTranslationtool_Domain_Model_Extension {

	/**
	 * @var string
	 */
	protected $extensionName;

	/**
	 * @var array
	 */
	protected $files;

	/**
	 * @var string
	 */
	protected $labelField;

	/**
	 * @param string $extensionName
	 */
	public function setExtensionName($extensionName) {
		$this->extensionName = $extensionName;
	}

	/**
	 * @return string
	 */
	public function getExtensionName() {
		return $this->extensionName;
	}

	/**
	 * @param array $files
	 */
	public function setFiles($files) {
		$this->files = $files;
	}

	/**
	 * @param Tx_XliffTranslationtool_Domain_Model_File $file
	 */
	public function addFile($file) {
		$this->files[] = $file;
	}

	/**
	 * @return array
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * @param string $labelField
	 */
	public function setLabelField($labelField) {
		$this->labelField = $labelField;
	}

	/**
	 * @return string
	 */
	public function getLabelField() {
		return $this->labelField;
	}

	/**
	 * count the number of files for this extension model
	 *
	 * @return int
	 */
	public function getCount() {
		return count($this->files);
	}
}