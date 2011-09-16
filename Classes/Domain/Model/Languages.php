<?php
/**
 * Tx_XliffTranslationtool_Domain_Model_Languages
 *
 * Model for Languages
 * @scope prototype
 * @entity
 * @author Thomas Layh <develop@layh.com>
 */
class Tx_XliffTranslationtool_Domain_Model_Languages extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * @var string
	 */
	protected $lgTypo3;

	/**
	 * @var string
	 */
	protected $lgNameEn;

	/**
	 * @param string $lgNameEn
	 */
	public function setLgNameEn($lgNameEn) {
		$this->lgNameEn = $lgNameEn;
	}

	/**
	 * @return string
	 */
	public function getLgNameEn() {
		return $this->lgNameEn;
	}

	/**
	 * @param string $lgTypo3
	 */
	public function setLgTypo3($lgTypo3) {
		$this->lgTypo3 = $lgTypo3;
	}

	/**
	 * @return string
	 */
	public function getLgTypo3() {
		return $this->lgTypo3;
	}

}