<?php

// Add palette to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['chessboardjs'] = '{title_legend},name,headline,type;{chessboardjs_legend:hide},chessboardjs_coordinates,chessboardjs_width,chessboardjs_position,chessboardjs_text,chessboardjs_move;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

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
				'options'                 => $GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field_options'],
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
				'options'                 => $GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_piece_options'],
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
				'options'                 => $GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true
				)
			),
		)
	),
	'sql'                                 => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['chessboardjs_text'] = array
(
	'label'                               => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_text'],
	'exclude'                             => true,
	'inputType'                           => 'text',
	'eval'                                => array
	(
		'tl_class'                        => 'long',
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
		'buttonPos'                       => 'middle',
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
				'options'                 => $GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true
				)
			),
			'to' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_to'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => $GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field_options'],
				'eval'                    => array
				(
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
					'maxlength'                       => 255,
				)
			),
			'markpieces' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markpieces'],
				'exclude'                 => true,
				'inputType'               => 'text',
			),
			'markcolor' => array
			(
				'label'                   => &$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markcolor'],
				'exclude'                 => true,
				'inputType'               => 'select',
				'options'                 => $GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'],
				'eval'                    => array
				(
					'includeBlankOption'  => true
				)
			),
		)
	),
	'sql'                                 => "blob NULL"
);
