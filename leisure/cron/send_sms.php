<? 
include dirname(__FILE__)."../../inc/common.inc";
include dirname(__FILE__)."../../inc/func.inc";
include dirname(__FILE__)."../../inc/util.inc";
include dirname(__FILE__)."../../inc/shop_info.inc";



/*
페이지 정리후에 35줄, 46줄의 send_sms함수 관련 주석제거
*/



$se_tel		= $shop_info->shop_tel;
$se_name	= $shop_info->shop_name;

$selectedDate = date("Y-m-d");
$sql = "select * from wiz_dayproduct wp, wiz_daycprelation wd, wiz_daycategory wc where wp.prdcode = wd.prdcode and wc.catcode = wd.catcode  and '".$selectedDate."' between DATE_FORMAT(selldate,'%Y-%m-%d') and DATE_FORMAT(selllastdate,'%Y-%m-%d') and wp.showset='Y'  $catcode_sql ";

echo $sql;


$result		= mysql_query($sql) or die($sql);
$msg	= "";
$i = 0;

while($rs = mysql_fetch_array($result)){
	$content .= $rs["sms"] ;		//
}

// 구독 신청자 
$sql	= "SELECT * FROM wiz_feed WHERE feed_sms<>''";
$f_rs	= mysql_query($sql) or error($sql);

while($row	= mysql_fetch_array($f_rs)) {	
	if($row["feed_sms"] != "구독안함"){
	//	send_sms($se_tel, $row["feed_sms"], $content, $se_name);
		$msg	.= $se_tel." | ".$row["feed_sms"]." | ".$content." | ".$se_name." | ".date("Y-m-d H:i:s")."\n";
	}
}

// 회원
$sql	= "SELECT * FROM wiz_member WHERE resms='Y'";
$f_rs	= mysql_query($sql) or error($sql);

while($row	= mysql_fetch_array($f_rs)) {	
	if($row["feed_sms"] != "구독안함"){
	//	send_sms($se_tel, $row["hphone"], $content, $se_name);
		$msg	.= $se_tel." | ".$row["hphone"]." | ".$content." | ".$se_name." | ".date("Y-m-d H:i:s")."\n";
	}
}


$filename	= date("Ymd_His")."_sms.txt";
$fopen		= fopen("log/".$filename,"w");
fwrite($fopen,$msg);
fclose($fopen);

echo $msg;

?>