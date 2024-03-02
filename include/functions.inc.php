<?php
//TD5
    //Ex2
    function helloNumero() : string {
        $a = "<ul>\n";
        for ($i = 1; $i <= 20; $i++) {
            $a .= "\t\t\t<li>Hello numéro $i</li>\n";
            
        }
        $a .= "\t\t</ul>\n";
        return $a;
    }

    //Ex3
    function conversionASCII(string $s) : string {
        $r = "<span>";

        if (strpos($s,"0x") != "") { //cas hexa
            $r .= "$s = " . hexdec($s) . " = '" . chr(hexdec($s)) . "'";
        } elseif (ord($s) >= 33 && ord($s) <= 127 && strlen($s) == 1) { //cas caractere ascii
            $r .= "0x" . dechex(ord($s)) . " = " . ord($s) . " = '$s'";
        } else { // cas decimal
            $r .= "0x" . dechex($s) . " = $s = '" . chr($s) . "'";
        }

        return $r . "</span>";
    }

    //Ex4
    function chiffresHexa() {
        $r = "<ul>\n";
        for ( $i = 0; $i < 16; $i++) {
            $r .= "\t\t\t<li>0x" . dechex($i) . "</li>\n";
        }
        return $r . "\t\t</ul>\n";
    }

    //Ex5
    function tabConversion() : string {
        $r = "<table>\n";
        $r .= "\t\t\t<caption>Illustration 1 : conversion bases 2, 8, 10, 16.</caption>\n";
        $r .= "\t\t\t<thead>\n\t\t\t\t<tr><th>binaire</th><th>octa</th><th>décimal</th><th>hexadécimal</th></tr>\n\t\t\t</thead>\n\t\t\t<tbody>\n";

        for ($i = 0; $i <= 17; $i++) {
            $r .= "\t\t\t\t<tr><td>" . sprintf("%08b", $i) . "</td><td>" . decoct($i) . "</td><td>$i</td><td>". strtoupper(str_pad(dechex($i), 2, "0", STR_PAD_LEFT)) . "</td></tr>\n";
        }

        return $r . "\t\t\t</tbody>\n\t\t</table>\n";
    }

//TD6
	//Ex1
	/**
	 * La fonction dresse le tableau de multiplication du parametre
	 * donnee et retourne une string qui contient un tableau HTML.
	 * Contient une valeur par defaut (10) si l'utilisateur n'en a pas fournit.
	 * 
	 * @param int Le tableau de multiplication sera celui du parametre
	 * @return string String contenant le tableau de multiplication HTML 
	 */

	define("DEFAULT_TAB_MULTIP", 10);

	function tableauMultiplication(int $val = DEFAULT_TAB_MULTIP) : string {

		if ($val < 1 || $val > 2 * DEFAULT_TAB_MULTIP) { $val = DEFAULT_TAB_MULTIP;}

		$r = "<table>\n";
		$r .= "\t\t\t<caption>\n";
		$r .= "\t\t\t\tTableau de multiplication jusqu'a $val\n";
		$r .= "\t\t\t</caption>\n";

		$r .= "\t\t\t<thead>\n\t\t\t\t<tr>\n\t\t\t\t\t<th>X</th>\n";

		// Generation premiere ligne
		for ($i = 1; $i <= $val; $i++) {
			$r .= "\t\t\t\t\t<th>$i</th>\n";
		}

		$r .= "\t\t\t\t</tr>\n\t\t\t</thead>\n";
		$r .= "\t\t\t<tbody>\n";

		for ($i = 1; $i <= DEFAULT_TAB_MULTIP; $i++) {
			$r .= "\t\t\t\t<tr>\n\t\t\t\t\t<td>$i</td>\n";          // sert a ajouter la premiere colone
			for ($j = 1; $j <= $val; $j++) {                            // dresse le tableau
				$r .= "\t\t\t\t\t<td>" . $j*$i . "</td>\n";
			}
			$r .= "\t\t\t\t</tr>\n";
		}

		$r .= "\t\t\t</tbody>\n";

		return $r . "\t\t</table>\n";
	}

	//Ex2
	/**
	 * Génère une chaine contenant un tableau ASCII en HTML
	 * 
	 * @return string String contenant le tableau HTML représentant la table ASCII standard
	 */
	function tabASCII() {
		$r = "<table>\n";
		$r .= "\t\t\t<caption>Tableau ASCII</caption>\n";
		$r .= "\t\t\t<thead>\n\t\t\t\t<tr>\n\t\t\t\t\t<th></th>\n";

		for ($i = 0; $i < 16; $i++) {                              // mise en place du header
			$r .= "\t\t\t\t\t<th>" . strtoupper(dechex($i)) . "</th>\n";
		}

		$r .= "\t\t\t\t</tr>\n\t\t\t</thead>\n";
		$r .= "\t\t\t<tbody>\n";

		for ($i = 0; $i < 6*17; $i++) {
			
			$decalage = 2 + (int)($i/17);     // decalage du au fait qu'on veut intexer un 
											// tableau de 17 colonnes comme un tableau de 16 colonnes.     
			if ($i % 17 == 0) {
				$r .= "\t\t\t\t<tr>\n\t\t\t\t\t<td>$decalage</td>\n";
			} elseif (($i + 31 - $decalage + 2) == 127 ) {
				$r .= "\t\t\t\t\t<td>&#x00A0;</td>\n\t\t\t\t\t</tr>\n";
			} elseif ($i % 17 == 16) {
				$char = htmlspecialchars(chr($i + 31 - $decalage + 2), ENT_QUOTES | ENT_HTML5);
				$class = ctype_digit($char) ? 'digit' : (ctype_upper($char) ? 'uppercase' : (ctype_lower($char) ? 'lowercase' : ''));
				$r .= "\t\t\t\t\t<td class='$class'>" . $char . "</td>\n\t\t\t\t</tr>\n";
			} else {
				$char = htmlspecialchars(chr($i + 31 - $decalage + 2), ENT_QUOTES | ENT_HTML5);
				$class = ctype_digit($char) ? 'digit' : (ctype_upper($char) ? 'uppercase' : (ctype_lower($char) ? 'lowercase' : ''));
				$r .= "\t\t\t\t\t<td class='$class'>" . $char . "</td>\n";
			}
		}

		$r .= "\t\t\t</tbody>\n\t\t</table>\n";

		return $r;
	}