<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Thomas Layh <develop@layh.com>, layh.com
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Tx_XliffTranslationtool_Controller_BaseController
 */
class Tx_XliffTranslationtool_Controller_BaseController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var string Key of the extension this controller belongs to
	 */
	protected $extensionName = 'XliffTranslationtool';

    /**
     * @var t3lib_PageRenderer
     */
    protected $pageRenderer;

    /**
     * @var integer
     */
    protected $pageId;

	/**
	 * @var \template
	 */
	protected $template;

    /**
     * Initializes the controller before invoking an action method.
     *
     * @return void
     */
    protected function initializeAction() {
        // @todo Evaluate how the intval() call can be used with Extbase validators/filters
        $this->pageId = intval(t3lib_div::_GP('id'));

        $this->pageRenderer->addInlineLanguageLabelFile('EXT:xliff_translationtool/Resources/Private/Language/locallang.xml');
    }

	/**
	 * Processes a general request. The result can be returned by altering the given response.
	 *
	 * @param Tx_Extbase_MVC_RequestInterface $request The request object
	 * @param Tx_Extbase_MVC_ResponseInterface $response The response, modified by this handler
	 * @throws Tx_Extbase_MVC_Exception_UnsupportedRequestType if the controller doesn't support the current request type
	 * @return void
	 */
	public function processRequest(Tx_Extbase_MVC_RequestInterface $request, Tx_Extbase_MVC_ResponseInterface $response) {
		$this->template = t3lib_div::makeInstance('template');
		$this->pageRenderer = $this->template->getPageRenderer();

		$GLOBALS['SOBE'] = new stdClass();
		$GLOBALS['SOBE']->doc = $this->template;

		parent::processRequest($request, $response);

		$pageHeader = $this->template->startpage($GLOBALS['LANG']->sL('LLL:EXT:workspaces/Resources/Private/Language/locallang.xml:module.title'));
		$pageEnd = $this->template->endPage();

		$response->setContent($pageHeader . $response->getContent() . $pageEnd);
	}

}

?>
