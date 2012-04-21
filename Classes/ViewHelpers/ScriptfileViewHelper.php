<?php
/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Tolleiv Nietch
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * ************************************************************* */

class Tx_XliffTranslationtool_ViewHelpers_ScriptfileViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
	 * @param bool $absolutUri
	 * @param bool $compress
	 * @param bool $forceOnTop
	 * @return void
	 */
	public function render($absolutUri=FALSE, $compress = TRUE, $forceOnTop = FALSE) {
		$content = $this->renderChildren();
		/** @var $pagerender t3lib_pagerenderer */
		if (is_object($GLOBALS['TSFE'])) {
			$pagerender = $GLOBALS['TSFE']->getPageRenderer();
		} else {
			$pagerender = $GLOBALS['SOBE']->doc->getPageRenderer();
		}

		if ($absolutUri) {
			$resourcePath = '';
		} else if (!stristr($content, 't3lib')) {
			$resourcePath = t3lib_extMgm::extRelPath('xliff_translationtool') . 'Resources/Public/Js/';
		} else {
			$resourcePath = '../';
		}

		$pagerender->addJsFile($resourcePath . $content, 'text/javascript', $compress, $forceOnTop);
	}
}