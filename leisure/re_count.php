<?
include "./inc/common.inc"; 		// DBÄÁ³Ø¼Ç, Á¢¼ÓÀÚ ÆÄ¾Ç

$prdcode = $_POST["prdcode"];

$sql = "select selllimit,stock_maxnum,personal_maxnum,personal_mininum,stock_mininum,addstock from wiz_dayproduct where prdcode = '$prdcode'";
$result = mysql_query($sql)or die($sql);
$row = mysql_fetch_array($result);

$selllimit = $row[selllimit];


if($selllimit == "personal"){
	$mininum = $row[personal_mininum];
	$maxnum = $row[personal_maxnum];
}else{
	$mininum = $row[stock_mininum];
	$maxnum = $row[stock_maxnum];
}

$addstock = $row[addstock];


$sql = "select sum(amount) as amount, count(orderid) as counter from wiz_dayorder where prdcode='$prdcode' group by prdcode";
$result = mysql_query($sql) or die($sql);
$row = mysql_fetch_array($result);

header("Content-type:text/xml");
echo"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";

$personal = $row[counter];
$buycount = $row[amount];
if(empty($personal)) $personal = 0;
if(empty($buycount)) $buycount = 0;


$personal = $personal+ $addstock;
$buycount = $buycount+ $addstock;

if($maxnum > $buycount){
	$status = "ing";
}else{
	$status = "soldout";
}
?>
<plist prdstatus="<?=$status?>" selllimit="<?=$selllimit?>" mininum="<?=$mininum?>">
	<personal><?=$personal?></personal>
	<buycount><?=$buycount?></buycount>
</plist>