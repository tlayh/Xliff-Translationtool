<?php
/**
 * DirectoryFunctionsTest
 * @author Thomas Layh <develop@layh.com>
 */
class Tx_XliffTranslationtool_Utility_DirectoryFunctionsTest extends Tx_Extbase_Tests_Unit_BaseTestCase {

	/**
	 * @var Tx_XliffTranslationtool_Utility_DirectoryFunctions
	 */
	protected $directoryFunctions;

	public function setUp() {
		$this->directoryFunctions = new Tx_XliffTranslationtool_Utility_DirectoryFunctions();
	}


	/**
	 * @dataProvider fileNameDataProvider
	 * @test
	 */
	public function setRootPathByExtensionType($extensionType, $extensionName, $expectedPath) {
		$method = new ReflectionMethod(
			'Tx_XliffTranslationtool_Utility_DirectoryFunctions', 'setRootPath'
		);
		$method->setAccessible(TRUE);
		$method->invoke($this->directoryFunctions, $extensionType, $extensionName);
		$this->assertEquals($this->directoryFunctions->getRootPath(), $expectedPath);

	}

	public function fileNameDataProvider() {
		return array(
			'root path local' => array(
				0,
				'',
				t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/typo3conf/ext'
			),
			'root path local + extension' => array(
				0,
				'xliff_translationtool',
				t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/typo3conf/ext/xliff_translationtool'
			),
			'root path sys' => array(
				1,
				'',
				t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/typo3/sysext'
			)
		);
	}

}