<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 domainfactory GmbH (Stefan Galinski <sgalinski@df.eu>)
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
 * Response class for Ext.Direct / Ajax calls
 *
 * @see EXT:df_tools
 * @author Stefan Galinski <sgalinski@df.eu>
 */
class Tx_XliffTranslationtool_Utility_AjaxResponse extends Tx_Extbase_MVC_Web_Response {
	/**
	 * Appends content to the already existing content.
	 *
	 * @param mixed $content
	 * @return void
	 */
	public function appendContent($content) {
		if (is_array($content)) {
			$this->setContent($content);
		} else {
			$this->content .= $content;
		}
	}
}

?>