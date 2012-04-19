<?php
/**
 * XliffFileFunctionsTests
 * @author Thomas Layh <develop@layh.com>
 */
class Tx_XliffTranslationtool_Utility_XliffFileFunctionsTest extends Tx_Extbase_Tests_Unit_BaseTestCase {

	/**
	 * @var Tx_XliffTranslationtool_Utility_XliffFileFunctions
	 */
	protected $xliffFileFunctions;

	public function setUp() {
		$this->xliffFileFunctions = new Tx_XliffTranslationtool_Utility_XliffFileFunctions();
	}


	/**
	 * @dataProvider fileNameDataProvider
	 * @test
	 */
	public function removeExistingLanguageKeyFromFileTarget($fileName, $expectedFileName) {
		$method = new ReflectionMethod(
			'Tx_XliffTranslationtool_Utility_XliffFileFunctions', 'removeExistingLanguageKeyFromFileTarget'
		);
		$method->setAccessible(TRUE);
		$this->assertEquals($method->invoke($this->xliffFileFunctions, $fileName), $expectedFileName);

	}

	public function fileNameDataProvider() {
		return array(
			'localized file name' => array(
				'de.locallang.xlf',
				'locallang.xlf'
			),
			'normal file name' => array(
				'locallang_db.xlf',
				'locallang_db.xlf'
			)
		);
	}

}