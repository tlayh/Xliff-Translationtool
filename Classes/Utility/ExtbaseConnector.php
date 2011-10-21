<?php

/**
 * Utility class to simplify the execution of extbase actions from external sources (e.g. from Ext.Direct)
 *
 * @author Stefan Galinski <sgalinski@df.eu>
 * @coauthor Tolleiv Nietsch <tolleiv.nietsch@aoemedia.de>
 * @see https://svn.typo3.org/TYPO3v4/Extensions/df_tools
 * @package df_tools
 */
class Tx_XliffTranslationtool_Utility_ExbaseConnector implements t3lib_Singleton {
	/**
	 * Extension Key
	 *
	 * @var string
	 */
	protected $extensionKey = 'xliff_translationtool';

	/**
	 * Module Key
	 *
	 * @var string
	 */
	protected $moduleOrPluginKey = 'tools_XliffTranslationtoolTranslation';

	/**
	 * ExtBase Bootstrap Instance
	 *
	 * @var Tx_Extbase_Core_Bootstrap
	 */
	protected $bootStrap = NULL;

	/**
	 * Initializes the instance
	 */
	public function __construct() {
		/** @var $bootStrap Tx_Extbase_Core_Bootstrap */
		$bootStrap = t3lib_div::makeInstance('Tx_Extbase_Core_Bootstrap');
		$this->injectBootstrap($bootStrap);
	}

	/**
	 * Initialize the bootstrap
	 *
	 * @param Tx_Extbase_Core_Bootstrap $bootStrap
	 * @return void
	 */
	public function injectBootStrap(Tx_Extbase_Core_Bootstrap $bootStrap) {
		$this->bootStrap = $bootStrap;
	}

	/**
	 * Setter for the extension key
	 *
	 * @param string $extensionKey
	 * @return void
	 */
	public function setExtensionKey($extensionKey) {
		$this->extensionKey = $extensionKey;
	}

	/**
	 * Getter for the extension key
	 *
	 * @return string
	 */
	public function getExtensionKey() {
		return $this->extensionKey;
	}

	/**
	 * Setter for the module or plugin key
	 *
	 * @param string $moduleOrPluginKey
	 * @return void
	 */
	public function setModuleOrPluginKey($moduleOrPluginKey) {
		$this->moduleOrPluginKey = $moduleOrPluginKey;
	}

	/**
	 * Getter for the module or plugin key
	 *
	 * @return string
	 */
	public function getModuleOrPluginKey() {
		return $this->moduleOrPluginKey;
	}

	/**
	 * Sets the parameters for the configured module/plugin
	 *
	 * @param array $parameters
	 * @return void
	 */
	public function setParameters(array $parameters) {
		$parameterNamespace = Tx_Extbase_Utility_Extension::getPluginNamespace(
			$this->extensionKey,
			$this->moduleOrPluginKey
		);

		$_POST[$parameterNamespace] = $parameters;
	}

	/**
	 * Runs the given ExtBase configuration and returns the result
	 *
	 * @param string $controller
	 * @param string $action
	 * @throws InvalidArgumentException
	 * @return array
	 */
	public function runControllerAction($controller, $action) {
		if ($controller === '' || $action === '') {
			throw new InvalidArgumentException('ExtDirect (XliffTranslationtool): Invalid Controller/Action Combination!');
		}
		$response = $this->bootStrap->run('', array(
			'extensionName' => $this->extensionKey,
			'pluginName' => $this->moduleOrPluginKey,
			'switchableControllerActions' => array(
				$controller => array($action)
			),
		));
		return $response;
	}
}

?>