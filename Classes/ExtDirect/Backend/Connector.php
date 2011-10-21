<?php
/**
 * Tx_XliffTranslationtool_ExtDirect_Backend_Convert
 */

/**
 *
 */
class Tx_XliffTranslationtool_ExtDirect_Backend_Connector {

	/**
	 * @param stdClass $params
	 * @return Array
	 */
	public function get(stdClass $params) {
		$this->setParameters($params, array('help'));
		return $this->connector->runControllerAction('IndexController', 'help');
	}

}