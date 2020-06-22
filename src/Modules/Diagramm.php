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

	var $hash; // Variable für den Hashwert, um ein Brett eindeutig zuzuordnen
	var $position;
	var $halbzug;
	var $brett;

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
		$this->hash = substr(md5(microtime()), 0, 10); // Hash-Wert für den Diagramm-Container ermitteln

		// Virtuelles Brett initialisieren
		$this->brett = array
		(
			'a8' => array('figur' => '', 'farbe' => ''),
			'b8' => array('figur' => '', 'farbe' => ''),
			'c8' => array('figur' => '', 'farbe' => ''),
			'd8' => array('figur' => '', 'farbe' => ''),
			'e8' => array('figur' => '', 'farbe' => ''),
			'f8' => array('figur' => '', 'farbe' => ''),
			'g8' => array('figur' => '', 'farbe' => ''),
			'h8' => array('figur' => '', 'farbe' => ''),
			'a7' => array('figur' => '', 'farbe' => ''),
			'b7' => array('figur' => '', 'farbe' => ''),
			'c7' => array('figur' => '', 'farbe' => ''),
			'd7' => array('figur' => '', 'farbe' => ''),
			'e7' => array('figur' => '', 'farbe' => ''),
			'f7' => array('figur' => '', 'farbe' => ''),
			'g7' => array('figur' => '', 'farbe' => ''),
			'h7' => array('figur' => '', 'farbe' => ''),
			'a6' => array('figur' => '', 'farbe' => ''),
			'b6' => array('figur' => '', 'farbe' => ''),
			'c6' => array('figur' => '', 'farbe' => ''),
			'd6' => array('figur' => '', 'farbe' => ''),
			'e6' => array('figur' => '', 'farbe' => ''),
			'f6' => array('figur' => '', 'farbe' => ''),
			'g6' => array('figur' => '', 'farbe' => ''),
			'h6' => array('figur' => '', 'farbe' => ''),
			'a5' => array('figur' => '', 'farbe' => ''),
			'b5' => array('figur' => '', 'farbe' => ''),
			'c5' => array('figur' => '', 'farbe' => ''),
			'd5' => array('figur' => '', 'farbe' => ''),
			'e5' => array('figur' => '', 'farbe' => ''),
			'f5' => array('figur' => '', 'farbe' => ''),
			'g5' => array('figur' => '', 'farbe' => ''),
			'h5' => array('figur' => '', 'farbe' => ''),
			'a4' => array('figur' => '', 'farbe' => ''),
			'b4' => array('figur' => '', 'farbe' => ''),
			'c4' => array('figur' => '', 'farbe' => ''),
			'd4' => array('figur' => '', 'farbe' => ''),
			'e4' => array('figur' => '', 'farbe' => ''),
			'f4' => array('figur' => '', 'farbe' => ''),
			'g4' => array('figur' => '', 'farbe' => ''),
			'h4' => array('figur' => '', 'farbe' => ''),
			'a3' => array('figur' => '', 'farbe' => ''),
			'b3' => array('figur' => '', 'farbe' => ''),
			'c3' => array('figur' => '', 'farbe' => ''),
			'd3' => array('figur' => '', 'farbe' => ''),
			'e3' => array('figur' => '', 'farbe' => ''),
			'f3' => array('figur' => '', 'farbe' => ''),
			'g3' => array('figur' => '', 'farbe' => ''),
			'h3' => array('figur' => '', 'farbe' => ''),
			'a2' => array('figur' => '', 'farbe' => ''),
			'b2' => array('figur' => '', 'farbe' => ''),
			'c2' => array('figur' => '', 'farbe' => ''),
			'd2' => array('figur' => '', 'farbe' => ''),
			'e2' => array('figur' => '', 'farbe' => ''),
			'f2' => array('figur' => '', 'farbe' => ''),
			'g2' => array('figur' => '', 'farbe' => ''),
			'h2' => array('figur' => '', 'farbe' => ''),
			'a1' => array('figur' => '', 'farbe' => ''),
			'b1' => array('figur' => '', 'farbe' => ''),
			'c1' => array('figur' => '', 'farbe' => ''),
			'd1' => array('figur' => '', 'farbe' => ''),
			'e1' => array('figur' => '', 'farbe' => ''),
			'f1' => array('figur' => '', 'farbe' => ''),
			'g1' => array('figur' => '', 'farbe' => ''),
			'h1' => array('figur' => '', 'farbe' => ''),
		);

		// Diagramm-Container und Text
		$content .= '<div id="board_'.$this->hash.'" class="chessboardjs_brett" style="width:'.$this->chessboardjs_width.'"></div>'."\n";
		$content .= '<div id="boardtext_'.$this->hash.'" class="chessboardjs_text" style="width:'.$this->chessboardjs_width.'"></div>'."\n";

		$this->position = unserialize($this->chessboardjs_position);
		if($this->chessboardjs_playmode == 'chessboardjs1') $this->halbzug = unserialize($this->chessboardjs_move);
		elseif($this->chessboardjs_playmode == 'chessboardjs2') $this->halbzug = unserialize($this->chessboardjs_fenplay);

		self::getBrett(0);

		// Buttons hinzufügen
		if($this->halbzug) $content .= '<button id="boardbutton_next_'.$this->hash.'">Nächster Zug</button>'."\n";

		// Skriptabschnitt erzeugen
		$content .= '<script>'."\n";
		$content .= 'var zug_'.$this->hash.' = 0;'."\n";

		// Nächster-Zug-Button verändern
		if($this->halbzug) $content .= '$("#boardbutton_next_'.$this->hash.'").html("Nächster Zug (1 von '.count($this->halbzug).')");'."\n";

		$content .= self::getConfigHTML();

		$content .= 'ZugMachen();'."\n";

		// Funktion ZugMachen
		$content .= 'function ZugMachen()'."\n";
		$content .= '{'."\n";
		$content .= '  if(zug_'.$this->hash.' == 0)'."\n";
		$content .= '  {'."\n";
		$content .= self::getConfigHTML();
		$content .= '    zug_'.$this->hash.'++;'."\n";
		$content .= '  }'."\n";
		// Scriptcode für restliche Züge generieren
		for($i = 0; $i < count($this->halbzug); $i++)
		{
			$zugnr = $i + 1;
			$content .= '  else if(zug_'.$this->hash.' == '.$zugnr.')'."\n";
			$content .= '  {'."\n";
			$content .= self::getConfigHTML($zugnr);
			if($zugnr < count($this->halbzug)) $content .= '    zug_'.$this->hash.'++;'."\n";
			else $content .= '    zug_'.$this->hash.' = 0;'."\n";
			$content .= '  }'."\n";
		}

		// Funktion ZugMachen beenden
		$content .= '};'."\n";

		// Button-Aktionen hinzufügen
		if($this->halbzug) $content .= '$("#boardbutton_next_'.$this->hash.'").on("click", ZugMachen);'."\n";

		$content .= '</script>'."\n";

		// Template füllen
		$objTemplate = new \FrontendTemplate($this->strTemplate);
		$this->Template->chessboardjs = $content;
	}

	function css($string)
	{
		switch($string)
		{
			case 'shadow-blue'       : return '"box-shadow", "inset 0px 0px 3px 3px blue"'; break;
			case 'shadow-darkblue'   : return '"box-shadow", "inset 0px 0px 3px 3px darkblue"'; break;
			case 'shadow-red'        : return '"box-shadow", "inset 0px 0px 3px 3px red"'; break;
			case 'shadow-yellow'     : return '"box-shadow", "inset 0px 0px 3px 3px yellow"'; break;
			case 'shadow-green'      : return '"box-shadow", "inset 0px 0px 3px 3px green"'; break;
		}
	}

	/* function getConfigHTML
	 * ==============================================================================================
	 * Liefert den Scriptcode für die Konfiguration des aktuellen Brettes
	 * @param $halbzug      int         Nummer des Halbzuges, Standard ist 0 für die gewünschte Grundstellung
	 * @return              string      Javascript-Code
	*/
	function getConfigHTML($halbzug = 0)
	{
		if($this->chessboardjs_coordinates) $koordinaten = 'true';
		else $koordinaten = 'false';

		$this->getBrett($halbzug); // aktuelle Stellung aufbauen

		$content = '';

		if($halbzug == 0)
		{
			// Globaler Bereich
			$content .= 'var config_'.$this->hash.' ='."\n";
			$content .= '{'."\n";
			$content .= 'moveSpeed: \'slow\','."\n";
			$content .= 'snapbackSpeed: 500,'."\n";
			$content .= 'snapSpeed: 100,'."\n";
			$content .= 'showNotation: '.$koordinaten.','."\n";

			if($this->chessboardjs_alternativePosition)
			{
				// Alternative Startstellung
				if($this->chessboardjs_fen)
				{
					// FEN-Code wurde übergeben
					self::setBrett($this->chessboardjs_fen);
					$content .= 'position: \''.$this->chessboardjs_fen.'\''."\n";
				}
				else
				{
					// Normaler Modus mit gewünschter Stellung
					$content .= $this->getFiguren();
				}
			}
			else
			{
				// Grundstellung = Startstellung
				$content .= 'position: \'start\''."\n";
			}

			$content .= '};'."\n";
			$content .= 'var board_'.$this->hash.' = Chessboard(\'board_'.$this->hash.'\', config_'.$this->hash.');'."\n";
			// Farben werden immer ausgewertet
			$content .= $this->getFarben();
			// Text zum Diagramm einfügen
			if($this->chessboardjs_text) $content .= '$("#boardtext_'.$this->hash.'").html("'.$this->chessboardjs_text.'");'."\n";
		}
		else
		{
			if($this->chessboardjs_playmode == 'chessboardjs1')
			{
				// Andere Züge
				$content .= 'var config_'.$this->hash.' ='."\n";
				$content .= '{'."\n";
				$content .= 'moveSpeed: \'slow\','."\n";
				$content .= 'snapbackSpeed: 500,'."\n";
				$content .= 'snapSpeed: 100,'."\n";
				$content .= 'showNotation: '.$koordinaten.','."\n";
				$content .= $this->getFiguren();
				$content .= '};'."\n";
				$content .= 'var board_'.$this->hash.' = Chessboard(\'board_'.$this->hash.'\', config_'.$this->hash.');'."\n";
				$content .= $this->getFarben();

				// Neuen Text setzen
				$content .= '$("#boardtext_'.$this->hash.'").html("'.$this->halbzug[$halbzug-1]['text'].'");'."\n";
			}
			elseif($this->chessboardjs_playmode == 'chessboardjs2')
			{
				// Andere Züge
				$content .= 'var config_'.$this->hash.' ='."\n";
				$content .= '{'."\n";
				$content .= 'moveSpeed: \'slow\','."\n";
				$content .= 'snapbackSpeed: 500,'."\n";
				$content .= 'snapSpeed: 100,'."\n";
				$content .= 'showNotation: '.$koordinaten.','."\n";
				$this->getBrett($halbzug); // aktuelle Stellung aufbauen
				$content .= 'position: \''.$this->halbzug[$halbzug-1]['fen'].'\''."\n";
				$content .= '};'."\n";
				$content .= 'var board_'.$this->hash.' = Chessboard(\'board_'.$this->hash.'\', config_'.$this->hash.');'."\n";
				$content .= $this->getFarben();

				// Neuen Text setzen
				$content .= '$("#boardtext_'.$this->hash.'").html("'.$this->halbzug[$halbzug-1]['text'].'");'."\n";
			}
		}

		if($this->chessboardjs_playmode == 'chessboardjs1' || $this->chessboardjs_playmode == 'chessboardjs2')
		{
			// Nächster-Zug-Button verändern
			if($this->halbzug)
			{
				$naechsterZug = $halbzug + 1;
				if($naechsterZug <= count($this->halbzug))
				{
					$content .= '$("#boardbutton_next_'.$this->hash.'").html("Nächster Zug ('.$naechsterZug.' von '.count($this->halbzug).')");'."\n";
				}
				elseif($naechsterZug > count($this->halbzug))
				{
					$content .= '$("#boardbutton_next_'.$this->hash.'").html("Nächster Zug (Start)");'."\n";
				}
			}
		}

		return $content;
	}

	/* function getBrett
	 * ==============================================================================================
	 * Schreibt die aktuelle Stellung in ein virtuelles Brett
	 * @param $halbzug      int         Nummer des Halbzuges, Standard ist 0 für die gewünschte Grundstellung
	 * @return              string      Javascript-Code
	*/
	function getBrett($halbzug = 0)
	{

		// Grundstellung auslesen und im Array speichern
		if($this->chessboardjs_alternativePosition)
		{
			// Eine alternative Stellung ist gewünscht, diese auslesen
			if($this->position)
			{
				foreach($this->position as $item)
				{
					if($item['field'])
					{
						$this->brett[$item['field']]['figur'] = $item['piece'];
						$this->brett[$item['field']]['farbe'] = $item['mark'];
					}
				}
			}
		}
		else
		{
			// Grundstellung ist gewünscht, virtuelles Brett entsprechend aufbauen
			self::setBrett();
		}

		// Gibt es Folgezüge und gewünschter Halbzug > 0 (Grundstellung)
		if($this->halbzug && $halbzug > 0)
		{
			// Bis zum aktuellen Halbzug das Brett entsprechend ändern
			$zugindex = $halbzug - 1;
			for($i = 0; $i <= $zugindex; $i++)
			{
				if($this->chessboardjs_playmode == 'chessboardjs1')
				{
					$vonFeld = $this->halbzug[$i]['from']; // Ausgangsfeld
					$nachFeld = $this->halbzug[$i]['to']; // Zielfeld

					// Figur und Markierung dem Zielfeld zuordnen und Ausgangsfeld leeren
					if($this->brett[$nachFeld] != $this->brett[$vonFeld])
					{
						$this->brett[$nachFeld] = $this->brett[$vonFeld];
						$this->brett[$vonFeld] = array('figur' => '', 'farbe' => '');
					}

					// Markierungen ohne Figuren entfernen
					foreach($this->brett as $key => $value)
					{
						if($this->brett[$key]['figur'] == '') $this->brett[$key]['farbe'] = '';
					}

				}
				elseif($this->chessboardjs_playmode == 'chessboardjs2')
				{
					self::setBrett($this->halbzug[$i]['fen']);
					// Markierungen entfernen
					foreach($this->brett as $key => $value)
					{
						$this->brett[$key]['farbe'] = '';
					}
				}

				// Neue Farben setzen
				$Felder = explode(',', $this->halbzug[$i]['markpieces']); // Farbfelder laden
				$Farbe = $this->halbzug[$i]['markcolor']; // Farbe für diese Felder
				$Felder2 = explode(',', $this->halbzug[$i]['markpieces2']); // Farbfelder laden
				$Farbe2 = $this->halbzug[$i]['markcolor2']; // Farbe für diese Felder
				$Felder3 = explode(',', $this->halbzug[$i]['markpieces3']); // Farbfelder laden
				$Farbe3 = $this->halbzug[$i]['markcolor3']; // Farbe für diese Felder
				if($Felder)
				{
					for($x = 0; $x < count($Felder); $x++)
					{
						$key = trim($Felder[$x]);
						if(isset($this->brett[$key])) $this->brett[$key]['farbe'] = $Farbe;
					}
				}
				if($Felder2)
				{
					for($x = 0; $x < count($Felder2); $x++)
					{
						$key = trim($Felder2[$x]);
						if(isset($this->brett[$key])) $this->brett[$key]['farbe'] = $Farbe2;
					}
				}
				if($Felder3)
				{
					for($x = 0; $x < count($Felder3); $x++)
					{
						$key = trim($Felder3[$x]);
						if(isset($this->brett[$key])) $this->brett[$key]['farbe'] = $Farbe3;
					}
				}
			}
		}

		//$this->viewBrett();

	}

	/* function setBrett
	 * ==============================================================================================
	 * Stellt auf dem virtuellen Brett, eine Stellung nach dem übergebendem FEN-String auf
	 * Standard ist die Grundstellung
	*/
	function setBrett($fen = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR')
	{
		$zeile = 8;
		$spalte = 97;
		$brett = array();
		for($i = 0; $i < strlen($fen); $i++)
		{
			$zeichen = substr($fen, $i, 1);
			switch($zeichen)
			{
				case 'r':
					self::setFeld(chr($spalte).$zeile, 'bR');
					$spalte++;
					break;
				case 'n':
					self::setFeld(chr($spalte).$zeile, 'bN');
					$spalte++;
					break;
				case 'b':
					self::setFeld(chr($spalte).$zeile, 'bB');
					$spalte++;
					break;
				case 'q':
					self::setFeld(chr($spalte).$zeile, 'bQ');
					$spalte++;
					break;
				case 'k':
					self::setFeld(chr($spalte).$zeile, 'bK');
					$spalte++;
					break;
				case 'p':
					self::setFeld(chr($spalte).$zeile, 'bP');
					$spalte++;
					break;
				case 'R':
					self::setFeld(chr($spalte).$zeile, 'wR');
					$spalte++;
					break;
				case 'N':
					self::setFeld(chr($spalte).$zeile, 'wN');
					$spalte++;
					break;
				case 'B':
					self::setFeld(chr($spalte).$zeile, 'wB');
					$spalte++;
					break;
				case 'Q':
					self::setFeld(chr($spalte).$zeile, 'wQ');
					$spalte++;
					break;
				case 'K':
					self::setFeld(chr($spalte).$zeile, 'wK');
					$spalte++;
					break;
				case 'P':
					self::setFeld(chr($spalte).$zeile, 'wP');
					$spalte++;
					break;
				case '/': $zeile--; $spalte = 97; break;
				default:
					for($x = 0; $x < (int)$zeichen; $x++)
					{
						self::setFeld(chr($spalte).$zeile, '');
						$spalte++;
					}
			}
		}
	}

	function setFeld($feld, $figur)
	{
		$this->brett[$feld]['figur'] = $figur;
	}

	/* function getFarben
	 * ==============================================================================================
	 * Generiert für das aktuelle Brett die Farbmarkierungen als JS-Code
	*/
	function getFarben()
	{
		$code = '';
		foreach($this->brett as $key => $value)
		{
			if($this->brett[$key]['farbe'])
			{
				// Farbe setzen
				$code .= '$("#board_'.$this->hash.' .square-'.$key.'").css('.$this->css($this->brett[$key]['farbe']).');'."\n";
			}
			else
			{
				// Farbe löschen
				$code .= '$("#board_'.$this->hash.' .square-'.$key.'").css("box-shadow", "none");'."\n";
			}
		}
		return $code;
	}

	/* function getFiguren
	 * ==============================================================================================
	 * Generiert für das aktuelle Brett die Figuren als JS-Code
	*/
	function getFiguren()
	{
		$code = array();
		foreach($this->brett as $key => $value)
		{
			if($this->brett[$key]['figur'])
			{
				// Figur setzen
				$code[] = $key.": '".$this->brett[$key]['figur']."'";
			}
		}
		if($code) return "position:\n{\n".implode(",\n", $code)."\n}\n";
		return '';
	}

	/* function viewBrett
	 * ==============================================================================================
	 * Gibt das virtuelle Brett in einer Tabelle aus
	*/
	function viewBrett()
	{
		$str = '<div><table>';
		$str .= '<tr><th></th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th><th>G</th><th>H</th><th></th></tr>';
		$start = 1;
		$zeile = 1;
		foreach($this->brett as $feld)
		{
			if($start == 1)
			{
				$str .= '<tr>';
				$str .= '<td>'.$zeile.'</td>';
			}

			$str .= '<td>'.$feld['figur'].'<br><i>'.$feld['farbe'].'</i></td>';

			if($start == 8)
			{
				$str .= '<td>'.$zeile.'</td>';
				$str .= '</tr>';
			}

			$start++;
			if($start > 8)
			{
				$start = 1;
				$zeile++;
			}
		}
		$str .= '<tr><th></th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th><th>G</th><th>H</th><th></th></tr>';
		$str .= '</table></div>';
		echo $str;
	}
}
