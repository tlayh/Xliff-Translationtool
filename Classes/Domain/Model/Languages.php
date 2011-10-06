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
	 * @var string
	 */
	protected $lgIso_2;

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

	/**
	 * @param string $lgIso2
	 */
	public function setLgIso2($lgIso2) {
		$this->lgIso_2 = $lgIso2;
	}

	/**
	 * @return string
	 */
	public function getLgIso2() {
		return $this->lgIso_2;
	}

}