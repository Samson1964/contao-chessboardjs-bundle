<?php

// Add palette to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['chessboardjs'] = '{title_legend},name,headline,type;{chessboardjs_legend:hide},chessboardjs_koordinates;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_koordinates'] = array
(
	'label'                    => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_koordinates'],
	'default'                  => 30,
	'exclude'                  => true,
	'inputType'                => 'checkbox',
	'eval'                     => array
	(
		'tl_class'             => 'w50',
		'isBoolean'            => true
	),
	'sql'                      => "char(1) NOT NULL default ''"
); 
