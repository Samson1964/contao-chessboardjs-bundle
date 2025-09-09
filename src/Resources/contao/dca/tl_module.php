<?php

// Add palette to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'chessboardjs_alternativePosition';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'chessboardjs_playmode';
$GLOBALS['TL_DCA']['tl_module']['palettes']['chessboardjs1'] = '{title_legend},name,headline,type;{chessboardjs_main_legend},chessboardjs_coordinates,chessboardjs_width;{chessboardjs_position_legend},chessboardjs_alternativePosition,chessboardjs_text;{chessboardjs_modus_legend},chessboardjs_playmode;{chessboardjs_moves_legend},chessboardjs_move;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['chessboardjs2'] = '{title_legend},name,headline,type;{chessboardjs_main_legend},chessboardjs_coordinates,chessboardjs_width,chessboardjs_button;{chessboardjs_position_legend},chessboardjs_alternativePosition,chessboardjs_text;{chessboardjs_modus_legend},chessboardjs_playmode;{chessboardjs_moves_legend},chessboardjs_fenplay;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['chessboardjs3'] = '{title_legend},name,headline,type;{chessboardjs_main_legend},chessboardjs_coordinates,chessboardjs_width;{chessboardjs_position_legend},chessboardjs_alternativePosition,chessboardjs_text;{chessboardjs_modus_legend},chessboardjs_playmode;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['subpalettes']['chessboardjs_alternativePosition'] = 'chessboardjs_position,chessboardjs_fen';

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_alternativePosition'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_alternativePosition'],
	'exclude'                             => true,
	'inputType'                           => 'checkbox',
	'eval'                                => array
	(
		'tl_class'                        => 'w50',
		'submitOnChange'                  => true,
		'isBoolean'                       => true
	),
	'sql'                                 => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_button'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_button'],
	'exclude'                             => true,
	'default'                             => 1,
	'inputType'                           => 'checkbox',
	'eval'                                => array
	(
		'tl_class'                        => 'w50',
		'isBoolean'                       => true
	),
	'sql'                                 => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_playmode'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_playmode'],
	'exclude'                             => true,
	//'default'                             => 'chessboardjs1',
	'inputType'                           => 'radio',
	'options'                             => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_playmode_options'],
	'eval'                                => array
	(
		'tl_class'                        => 'w50',
		'submitOnChange'                  => true
	),
	'sql'                                 => "varchar(13) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_coordinates'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_coordinates'],
	'default'                             => 30,
	'exclude'                             => true,
	'default'                             => 1,
	'inputType'                           => 'checkbox',
	'eval'                                => array
	(
		'tl_class'                        => 'w50',
		'isBoolean'                       => true
	),
	'sql'                                 => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_width'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_width'],
	'exclude'                             => true,
	'default'                             => '400px',
	'inputType'                           => 'text',
	'eval'                                => array
	(
		'tl_class'                        => 'w50',
		'maxlength'                       => 6,
	),
	'sql'                                 => "varchar(6) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_position'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position'],
	'exclude'                             => true,
	'inputType'                           => 'multiColumnWizard',
	'eval'                                => array
	(
		'tl_class'                        => 'long clr',
		'buttonPos'                       => 'middle',
		'buttons'                         => array
		(
			'copy'                        => 'system/themes/flexible/icons/copy.svg',
			'delete'                      => 'system/themes/flexible/icons/delete.svg',
			'move'                        => false,
			'up'                          => false,
			'down'                        => false
		),
		'columnFields'                    => array
		(
			'field' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true
				)
			),
			'piece' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_piece'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_piece_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true
				)
			),
			'mark' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true
				)
			),
		)
	),
	'sql'                                 => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_fen'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_fen'],
	'exclude'                             => true,
	'inputType'                           => 'text',
	'eval'                                => array
	(
		'tl_class'                        => 'long clr',
		'maxlength'                       => 255,
	),
	'sql'                                 => "tinytext NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_text'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_text'],
	'exclude'                             => true,
	'inputType'                           => 'text',
	'eval'                                => array
	(
		'tl_class'                        => 'long clr',
		'maxlength'                       => 255,
	),
	'sql'                                 => "tinytext NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_move'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move'],
	'exclude'                             => true,
	'inputType'                           => 'multiColumnWizard',
	'eval'                                => array
	(
		'tl_class'                        => 'long clr',
		'buttonPos'                       => 'top',
		'buttons'                         => array
		(
			'copy'                        => 'system/themes/flexible/icons/copy.svg',
			'delete'                      => 'system/themes/flexible/icons/delete.svg',
			'move'                        => 'system/themes/flexible/icons/drag.svg',
			'up'                          => false,
			'down'                        => false
		),
		'columnFields'                    => array
		(
			'from' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_from'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field_options'],
				'eval'                    => array
				(
					'columnPos'           => 1,
					'valign'              => 'top',
					'includeBlankOption'  => true
				)
			),
			'to' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_to'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field_options'],
				'eval'                    => array
				(
					'columnPos'           => 2,
					'valign'              => 'top',
					'includeBlankOption'  => true
				)
			),
			'text' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_text'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 3,
					'valign'              => 'top',
					'maxlength'           => 255,
					'style'               => 'width:300px;'
				)
			),
			'markpieces' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markpieces'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 4,
				)
			),
			'markcolor' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markcolor'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true,
					'columnPos'           => 5,
				)
			),
			'markpieces2' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markpieces'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 4,
				)
			),
			'markcolor2' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markcolor'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true,
					'columnPos'           => 5,
				)
			),
			'markpieces3' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markpieces'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 4,
				)
			),
			'markcolor3' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markcolor'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true,
					'columnPos'           => 5,
				)
			)
		)
	),
	'sql'                                 => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_fenplay'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_fenplay'],
	'exclude'                             => true,
	'inputType'                           => 'multiColumnWizard',
	'eval'                                => array
	(
		'tl_class'                        => 'long clr',
		'buttonPos'                       => 'top',
		'buttons'                         => array
		(
			'copy'                        => 'system/themes/flexible/icons/copy.svg',
			'delete'                      => 'system/themes/flexible/icons/delete.svg',
			'move'                        => 'system/themes/flexible/icons/drag.svg',
			'up'                          => false,
			'down'                        => false
		),
		'columnFields'                    => array
		(
			'fen' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_fenplay_fen'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 1,
					'valign'              => 'top',
					'maxlength'           => 255,
					'style'               => 'width:300px;'
				)
			),
			'text' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_text'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 2,
					'valign'              => 'top',
					'maxlength'           => 255,
					'style'               => 'width:300px;'
				)
			),
			'markpieces' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markpieces'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 3,
				)
			),
			'markcolor' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markcolor'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true,
					'columnPos'           => 4,
				)
			),
			'markpieces2' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markpieces'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 3,
				)
			),
			'markcolor2' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markcolor'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true,
					'columnPos'           => 4,
				)
			),
			'markpieces3' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markpieces'],
				'exclude'                 => true,
				'inputType'               => 'text',
				'eval'                    => array
				(
					'columnPos'           => 3,
				)
			),
			'markcolor3' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markcolor'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true,
					'columnPos'           => 4,
				)
			)
		)
	),
	'sql'                                 => "blob NULL"
);
