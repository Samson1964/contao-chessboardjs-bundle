<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   bdf
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2014
 */

// Include Simple HTML Dom Parser
//require_once(TL_ROOT . '/system/helper/simple_html_dom.php');

/**
 * Frontend-Module der Linksammlung an Position 1 einfügen
 */
$GLOBALS['FE_MOD']['schach']['chessboardjs'] = 'Schachbulle\ContaoChessboardjsBundle\Modules\Diagramm';
