<?php
/*
 * For italian sites.
 * Returns the abbreviation of a given province / region or just the region if not found
 */
function getAbbrRegion($province, $region) {
	$phrase = mb_strtolower($province.'|'.$region);
	$patterns = array('/Á/','/É/','/Í/','/Ó/','/Ú/',
					'/À/','/È/','/Ì/','/Ò/','/Ù/',
					'/á/','/é/','/í/','/ó/','/ú/','/ý/',
					'/à/','/è/','/ì/','/ò/','/ù/',
					'/â/','/ê/','/î/','/ô/','/û/',
					'/Â/','/Ê/','/Î/','/Ô/','/Û/',
					'/ä/','/ë/','/ï/','/ö/','/ü/','/ÿ/',
					'/Ä/','/Ë/','/Ï/','/Ö/','/Ü/','/Ÿ/',
					'/ã/','/õ/','/ñ/','/å/','/ø/','/š/',
					'/Ã/','/Õ/','/Ñ/','/Å/','/Ø/','/Š/',
					'/ç/','/&#287;/','/&#305;/','/ö/','/&#351;/','/ü/',
					'/€/','/£/','/¥/','/$/','/#/','/&/','/%/', '/,/', '/"/');
	
	$replace  = array('a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,'y',
					 'a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,'y',
					 'a' , 'e' , 'i' , 'o' , 'u' ,'y',
					 'a' , 'o' , 'n' , 'a' , 'q' ,'s',
					 'a' , 'o' , 'n' , 'a' , 'q' ,'s',
					 'c' , 'g' , 'i' , 'o' , 's' ,'u',
					 ''  , ''  , ''  , ''  , '' , '' , '', '', '');
	$phrase = preg_replace($patterns,$replace,$phrase);
	
	$arr1 = array("agrigento|sicilia", "alessandria|piemonte", "ancona|marche", "aosta|valle d'aosta", "l'aquila|abruzzo", "arezzo|toscana", "ascoli piceno|marche", "asti|piemonte", "avellino|campania", "bari|puglia", "barletta andria trani|puglia", "belluno|veneto", "benevento|campania", "bergamo|lombardia", "biella|piemonte", "bologna|emilia romagna", "bolzano|trentino alto adige", "brescia|lombardia", "brindisi|puglia", "cagliari|sardegna", "caltanissetta|sicilia", "campobasso|molise", "carbonia iglesias|sardegna", "caserta|campania", "catania|sicilia", "catanzaro|calabria", "chieti|abruzzo", "como|lombardia", "cosenza|calabria", "cremona|lombardia", "crotone|calabria", "cuneo|piemonte", "enna|sicilia", "fermo|marche", "ferrara|emilia romagna", "firenze|toscana", "foggia|puglia", "forli cesena|emilia romagna", "frosinone|lazio", "genova|liguria", "gorizia|friuli venezia giulia", "grosseto|toscana", "imperia|liguria", "isernia|molise", "la spezia|liguria", "latina|lazio", "lecce|puglia", "lecco|lombardia", "livorno|toscana", "lodi|lombardia", "lucca|toscana", "macerata|marche", "mantova|lombardia", "massa carrara|toscana", "matera|basilicata", "medio campidano|sardegna", "messina|sicilia", "milano|lombardia", "modena|emilia romagna", "monza brianza|lombardia", "napoli|campania", "novara|piemonte", "nuoro|sardegna", "ogliastra|sardegna", "olbia tempio|sardegna", "oristano|sardegna", "padova|veneto", "palermo|sicilia", "parma|emilia romagna", "pavia|lombardia", "perugia|umbria", "pesaro urbino|marche", "pescara|abruzzo", "piacenza|emilia romagna", "pisa|toscana", "pistoia|toscana", "pordenone|friuli venezia giulia", "potenza|basilicata", "prato|toscana", "ragusa|sicilia", "ravenna|emilia romagna", "reggio calabria|calabria", "reggio emilia|emilia romagna", "rieti|lazio", "rimini|emilia romagna", "roma|lazio", "rovigo|veneto", "salerno|campania", "sassari|sardegna", "savona|liguria", "siena|toscana", "siracusa|sicilia", "sondrio|lombardia", "taranto|puglia", "teramo|abruzzo", "terni|umbria", "torino|piemonte", "trapani|sicilia", "trento|trentino alto adige", "treviso|veneto", "trieste|friuli venezia giulia", "udine|friuli venezia giulia", "varese|lombardia", "venezia|veneto", "verbania|piemonte", "vercelli|piemonte", "verona|veneto", "vibo valentia|calabria", "vicenza|veneto", "viterbo|lazio");
	
	$arr2 = array("AG","AN","AL","AO","AQ","AR","AP","AT","AV","BA","BT","BL","BN","BG","BI","BO","BZ","BS","BR","CA","CL","CB","CI","CE","CT","CZ","CH","CO","CS","CR","KR","CN","EN","FM","FE","FI","FG","FC","FR","GE","GO","GR","IM","IS","SP","LT","LE","LC","LI","LO","LU","MC","MN","MS","MT","VS","ME","MI","MO","MB","NA","NO","NU","OG","OT","OR","PD","PA","PR","PV","PG","PU","PE","PC","PI","PT","PN","PZ","PO","RG","RA","RC","RE","RI","RN","RM","RO","SA","SS","SV","SI","SR","SO","TA","TE","TR","TO","TP","TN","TV","TS","UD","VA","VE","VB","VC","VR","VV","VI","VT");
	
	$ret = "";
	foreach($arr1 as $k => $v) {
		if($phrase == $v) {
			if ($ret == "") {
				$ret = $arr2[$k];
			}
		}
	}
	
	return ($ret != "") ? $ret : $region;
}

/*
 * For foreign sites using accented words.
 * Returns a clean url (e.g: la-vita-e-bella) using a regular phrase
 */
function seo_link($data) {
	$trimmed = ltrim(rtrim($data));
	$convert = mb_convert_case($trimmed, MB_CASE_LOWER, "UTF-8");

	$convert = preg_replace("/(-)\\1+/", "", $convert);
	//
	$patterns = array('/Á/','/É/','/Í/','/Ó/','/Ú/',
					'/À/','/È/','/Ì/','/Ò/','/Ù/',
					'/á/','/é/','/í/','/ó/','/ú/','/ý/',
					'/à/','/è/','/ì/','/ò/','/ù/',
					'/â/','/ê/','/î/','/ô/','/û/',
					'/Â/','/Ê/','/Î/','/Ô/','/Û/',
					'/ä/','/ë/','/ï/','/ö/','/ü/','/ÿ/',
					'/Ä/','/Ë/','/Ï/','/Ö/','/Ü/','/Ÿ/',
					'/ã/','/õ/','/ñ/','/å/','/ø/','/š/',
					'/Ã/','/Õ/','/Ñ/','/Å/','/Ø/','/Š/',
					'/ç/','/&#287;/','/&#305;/','/ö/','/&#351;/','/ü/',
					'/€/','/£/','/¥/','/$/','/#/','/&/','/%/', '/,/', '/"/');
	
	$replace  = array('a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,'y',
					 'a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,
					 'a' , 'e' , 'i' , 'o' , 'u' ,'y',
					 'a' , 'e' , 'i' , 'o' , 'u' ,'y',
					 'a' , 'o' , 'n' , 'a' , 'q' ,'s',
					 'a' , 'o' , 'n' , 'a' , 'q' ,'s',
					 'c' , 'g' , 'i' , 'o' , 's' ,'u',
					 ''  , ''  , ''  , ''  , '' , '' , '', '', '');
	$str = preg_replace($patterns,$replace,$convert);
	$str =  preg_replace("/\ +/", "-", $str);
	return $str;
}

/*
 * Returns a given array well formed in UTF8
 */
function utf8_converter($array) {
	array_walk_recursive($array, function(&$item, $key) {
		if(!mb_detect_encoding($item, 'utf-8', true)){
			$item = utf8_encode($item);
		}
	});
	return $array;
}

/*
 * Multidimensional array sorter
 * E.g: $ret = array_msort($results, array('COL_NAME' => SORT_ASC));
 */
function array_msort($array, $cols) {
	$colarr = array();
	foreach ($cols as $col => $order) {
		$colarr[$col] = array();
		foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = mb_strtolower($row[$col], 'UTF-8'); }
	}
	$eval = 'array_multisort(';
	foreach ($cols as $col => $order) {
		$eval .= '$colarr[\''.$col.'\'],'.$order.',';
	}
	$eval = substr($eval,0,-1).');';
	eval($eval);
	$ret = array();
	foreach ($colarr as $col => $arr) {
		foreach ($arr as $k => $v) {
			$k = substr($k,1);
			if (!isset($ret[$k])) $ret[$k] = $array[$k];
			$ret[$k][$col] = $array[$k][$col];
		}
	}
	return $ret;
}
?>
