<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @package   Chessboardjs
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2016 - 2017
 */
namespace Schachbulle\ContaoChessboardjsBundle\Modules;

class Diagramm extends \Module
{

	protected $strTemplate = 'mod_chessboardjs';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### CHESSBOARDJS ###';
			$objTemplate->title = $this->name;
			$objTemplate->id = $this->id;

			return $objTemplate->parse();
		}

		return parent::generate(); // Weitermachen mit dem Modul
	}

	/**
	 * Generate the module
	 */
	protected function compile()
	{
		// Template füllen
		$objTemplate = new \FrontendTemplate($this->strTemplate);
		$this->Template->links = $this->Subtemplate->parse();
		$this->Template->counter = array('categories'=>$this->numberCategories,'links'=>$this->numberLinks);
	}

}
