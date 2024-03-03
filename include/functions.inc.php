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

//TD7
//Ex3
/**
 * Fonction retournant une liste ordonnee ou non a partir d'un tableau contenant 
 * des regions(String). L'utilisateur pourra choissir via un parametre bool si
 * il veut une liste ordonnee ou non.
 * 
 * @param bool ul ou ol
 * 
 * @return string Contenant un tableau HTML ordonnee ou non avec toutes les regions.
 */

 function regions(bool $ord = false): string {
	if ($ord) {
		$r = "<ol>\n";
	} else {
		$r = "<ul>\n";
	}

	$listRegions = ["Guadeloupe", "Martinique", "Guyane", 
					"La Réunion", "Mayotte", "Île-de-France", 
					"Centre-Val de Loire", "Bourgogne-Franche-Comté", 
					"Normandie", "Hauts-de-France", "Grand Est", 
					"Pays de la Loire", "Bretagne", "Nouvelle-Aquitaine", 
					"Occitanie", "Auvergne-Rhône-Alpes", "Provence-Alpes-Côte d`Azur", 
					"Corse"];

    for ($i = 0; $i < count($listRegions); $i++) {
		$r .= "\t\t<li>" . $listRegions[$i] . "</li>\n";
	}

	if($ord) {
		return $r . "</ol>\n";
	}
	return $r . "</ul>\n";
 }

//Ex4
/**
 * Fonction retournant l'origine etymologique de la date courante. 
 * 
 * @return string[] String contenant l'origine etymologique de la date courante.
 */

$joursSemaine = [
    "monday" => "Lune",
    "tuesday" => "Mars",
    "wednesday" => "Mercure",
    "thursday" => "Jupiter",
    "friday" => "Vénus",
    "saturday" => "Saturne",
    "sunday" => "Soleil"
];

$moisAnnee = [
    "january" => "provient du nom du dieu Janus, dieu des portes (de janua, « porte » en latin, selon Tertullien), des passages et des commencements dans la mythologie romaine, représenté avec deux visages opposés, car il regarde l'entrée et la sortie, la fin et le début d'une année",
    "february" => "du latin populaire febrarius, dérivé du latin classique februarius, issu du verbe februare « purifier ». Février est donc le mois des purifications",
    "march" => "provient du dieu de la guerre Mars (le retour de la période permise pour entamer une guerre)",
    "april" => "du latin aprilis « avril » qui peut avoir la signification d`« ouvrir », car c`est le mois où les fleurs s`ouvrent. Aprilis (avril) était le deuxième mois du calendrier romain",
    "may" => "du latin Maius (mensis) « le mois de mai », provient de la déesse Maïa, l'une des Pléiades et mère de Mercure",
    "june" => "vient du latin junius. Ce nom fut probablement donné en l`honneur de la déesse romaine Junon. À l`époque antique, c`était le quatrième mois du calendrier romain",
    "july" => "deux interprétations possibles : altération de l'ancien français juignet « juillet » proprement « petit juin » et du latin julius (mensis), nom du septième mois de l'année (proprement « mois de Jules, en l'honneur de Jules César, né dans ce mois, réformateur du calendrier romain) », le gn de juignet passant alors en ll de juillet",
    "august" => "du latin augustus, « consacré par les augures », substitué en l'honneur de l'empereur Auguste à Sextilis (mensis) (qui est le sixième mois après le printemps)",
    "september" => "de septem (mensis) : septième mois",
    "october" => " latin october (mensis) « octobre, huitième mois de l'année romaine » (dérivé de octo : « huit »), qui peut également faire référence à l'empereur romain Octave",
    "november" => "novem : « neuf »",
    "december" => "(latin classique december, dérivé de decem : « dix », décembre étant le dixième mois de l'année romaine) ne se comprennent qu`en commençant l'année à l'équinoxe de printemps, au mois de mars."
];

function originesEtymologiques(): array {
    global $joursSemaine, $moisAnnee;
    
    $jourCourant = strtolower(date("l"));
    $moisCourant = strtolower(date("F"));
    
    $origineJour = $joursSemaine[$jourCourant];
    $origineMois = $moisAnnee[$moisCourant];
    
    return [$origineJour, $origineMois];
}

//Ex5
/**
 * Cette fonction determine le navigateur de l'utilisateur
 * 
 * @return string Navigateur de l'utilisateur
 */
function get_navigateur(): string {
	
	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	$base = "Votre navigateur est : ";

    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return $base . 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return $base . 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return $base . 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return $base . 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return $base . 'Internet Explorer';
    
    return $base . 'Other';
}
