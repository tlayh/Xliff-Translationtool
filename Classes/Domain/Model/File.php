<?php
/**
 * Tx_XliffTranslationtool_Domain_Model_File
 *
 * Model for File
 *
 * @author Thomas Layh <thomas@layh.com>
 */
class Tx_XliffTranslationtool_Domain_Model_File {

	/**
	 * @var string
	 */
	protected $fileName;

	/**
	 * @var string
	 */
	protected $filePath;

	/**
	 * @var string
	 */
	protected $labelField;

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
	 * @param string $fileName
	 */
	public function setFileName($fileName) {
		$this->fileName = $fileName;
	}

	/**
	 * @return string
	 */
	public function getFileName() {
		return $this->fileName;
	}

	/**
	 * @param string $filePath
	 */
	public function setFilePath($filePath) {
		$this->filePath = $filePath;
	}

	/**
	 * @return string
	 */
	public function getFilePath() {
		return $this->filePath;
	}
}