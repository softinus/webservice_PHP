<?
$sql = "select advert_use from wiz_advert ";
$result = mysql_query($sql)or die($sql);
$row = mysql_fetch_array($result);
$advert_use = $row[advert_use];

if($advert_use=="Y" && $_GET["rid"] != ""){
	$recoId = base64_decode($_GET["rid"]);
	setcookie("wiz_session[reco]", "Y", false, "/");
	setcookie("wiz_session[rid]", $recoId, false, "/");
}

?>