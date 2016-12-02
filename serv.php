<?php
session_start();
function reportBadRequest() {
	header("HTTP/1.1 400 Bad Request");
	echo "Format de la requete incorrect.";
	echo "Il est attendu une requete de type POST";
	echo "La requete aura ete executee avec succes lorsque la page retournera un code 200";
	echo "<br/>Parametres POST recu: ";
	var_dump($_POST);
	echo "<br/>Parametres GET recu: ";
	var_dump($_GET);
	exit();
}

readF($_GET["req"]);
function readF($section){
    $myfile = fopen($section.'.json', "r") ;
		$file = fread($myfile,filesize($section.'.json'));
		$json = json_decode($file)->{$section};
		for($i = 0 ; $i<count($json); $i++){
			echo '<div id="post">
        <div class="title">
          <p>Posté par'.$json[$i]->{"name"}.' le 01/12/2016</p>
        </div>
        <div class="tags">
          <p>#'.$section.'</p>
        </div>
        <div class="content">
          <p>'.$json[$i]->{"tweet"}.'</p>
        </div>
        <div class="actions">
          <button type="button">Partager</button>
          <button type="button">Like</button>
          <button type="button">Retweet</button>
        </div>
      </div>';
		}
    fclose($myfile);
}