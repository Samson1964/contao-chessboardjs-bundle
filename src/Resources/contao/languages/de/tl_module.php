<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   fh-counter
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2014
 */

/**
 * Felder für Ausgabemodul
 */
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_main_legend'] = 'Diagramm-Einstellungen';
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_coordinates'] = array('Koordinaten', 'Koordinaten anzeigen');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_width'] = array('Breite', 'Breite des Diagramms, z.B. 400px oder 60%');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_button'] = array('Spielbutton', 'Spielbutton unter dem Diagramm anzeigen');

$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_legend'] = 'Grundstellung';
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_alternativePosition'] = array('Alternative Stellung aufbauen', 'Alternative Stellung aufbauen. Die Grundstellung wird dann nicht verwendet.');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position'] = array('Stellung aufbauen', 'Stellung aufbauen');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field'] = array('Feld', '');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_piece'] = array('Figur', '');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark'] = array('Markierung', '');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_text'] = array('Text zur Stellung', 'Text zur Stellung');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_fen'] = array('Stellung aufbauen (FEN)', 'Stellung aufbauen (FEN). Diese Stellung überschreibt die Figuren aus dem vorherigen Abschnitt. Leerlassen, wenn FEN nicht benutzt werden soll.');

$GLOBALS['TL_LANG']['tl_module']['chessboardjs_modus_legend'] = 'Modus';
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_playmode'] = array('Spielmodus', 'Spielmodus festlegen');

$GLOBALS['TL_LANG']['tl_module']['chessboardjs_moves_legend'] = 'Folgezüge';
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move'] = array('Züge ausführen (je Zeile ein Halbzug)', 'Züge ausführen (je Zeile ein Halbzug)');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_from'] = array('Von Feld', '');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_to'] = array('Nach Feld', '');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_text'] = array('Text', '');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markpieces'] = array('Felder markieren', 'Zu markierende Felder mit Komma trennen, z.B. a3,b4,c5');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_move_markcolor'] = array('Markierungsfarbe', '');

$GLOBALS['TL_LANG']['tl_module']['chessboardjs_fenplay'] = array('FEN eingeben (je Zeile eine Stellung)', 'FEN eingeben (je Zeile eine Stellung)');
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_fenplay_fen'] = array('FEN-String', '');

/**
 * Optionen für Ausgabemodul
 */
$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_field_options'] = array
(
	'a1' => 'Feld A1',
	'a2' => 'Feld A2',
	'a3' => 'Feld A3',
	'a4' => 'Feld A4',
	'a5' => 'Feld A5',
	'a6' => 'Feld A6',
	'a7' => 'Feld A7',
	'a8' => 'Feld A8',
	'b1' => 'Feld B1',
	'b2' => 'Feld B2',
	'b3' => 'Feld B3',
	'b4' => 'Feld B4',
	'b5' => 'Feld B5',
	'b6' => 'Feld B6',
	'b7' => 'Feld B7',
	'b8' => 'Feld B8',
	'c1' => 'Feld C1',
	'c2' => 'Feld C2',
	'c3' => 'Feld C3',
	'c4' => 'Feld C4',
	'c5' => 'Feld C5',
	'c6' => 'Feld C6',
	'c7' => 'Feld C7',
	'c8' => 'Feld C8',
	'd1' => 'Feld D1',
	'd2' => 'Feld D2',
	'd3' => 'Feld D3',
	'd4' => 'Feld D4',
	'd5' => 'Feld D5',
	'd6' => 'Feld D6',
	'd7' => 'Feld D7',
	'd8' => 'Feld D8',
	'e1' => 'Feld E1',
	'e2' => 'Feld E2',
	'e3' => 'Feld E3',
	'e4' => 'Feld E4',
	'e5' => 'Feld E5',
	'e6' => 'Feld E6',
	'e7' => 'Feld E7',
	'e8' => 'Feld E8',
	'f1' => 'Feld F1',
	'f2' => 'Feld F2',
	'f3' => 'Feld F3',
	'f4' => 'Feld F4',
	'f5' => 'Feld F5',
	'f6' => 'Feld F6',
	'f7' => 'Feld F7',
	'f8' => 'Feld F8',
	'g1' => 'Feld G1',
	'g2' => 'Feld G2',
	'g3' => 'Feld G3',
	'g4' => 'Feld G4',
	'g5' => 'Feld G5',
	'g6' => 'Feld G6',
	'g7' => 'Feld G7',
	'g8' => 'Feld G8',
	'h1' => 'Feld H1',
	'h2' => 'Feld H2',
	'h3' => 'Feld H3',
	'h4' => 'Feld H4',
	'h5' => 'Feld H5',
	'h6' => 'Feld H6',
	'h7' => 'Feld H7',
	'h8' => 'Feld H8'
);

$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_piece_options'] = array
(
	'wK' => 'weißer König',
	'wQ' => 'weiße Dame',
	'wR' => 'weißer Turm',
	'wB' => 'weißer Läufer',
	'wN' => 'weißer Springer',
	'wP' => 'weißer Bauer',
	'bK' => 'schwarzer König',
	'bQ' => 'schwarze Dame',
	'bR' => 'schwarzer Turm',
	'bB' => 'schwarzer Läufer',
	'bN' => 'schwarzer Springer',
	'bP' => 'schwarzer Bauer'
);

$GLOBALS['TL_LANG']['tl_module']['chessboardjs_position_mark_options'] = array
(
	'shadow-blue'        => 'blauer Schatten',
	'shadow-darkblue'    => 'dunkelblauer Schatten',
	'shadow-red'         => 'roter Schatten',
	'shadow-yellow'      => 'gelber Schatten',
	'shadow-green'       => 'grüner Schatten',
);

$GLOBALS['TL_LANG']['tl_module']['chessboardjs_playmode_options'] = array
(
	'chessboardjs1'      => 'Halbzüge mit Markierungen eingeben mit Nächster-Zug-Button',
	'chessboardjs2'      => 'Halbzüge als FEN-Strings mit Markierungen eingeben',
	'chessboardjs3'      => 'Halbzüge als Strings mit Markierungen eingeben'
);

