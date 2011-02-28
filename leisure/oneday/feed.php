<?
include "../inc/common.inc"; 				// DB컨넥션, 접속자 파악
include "../inc/util.inc"; 					// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/oper_info.inc"; 		// 운영 정보


$mode = $_POST["mode"];

if($mode=="insert"){
	$sql = iconv("UTF-8","EUC-KR","insert into wiz_feed(feed_email,feed_sms,wdate) values('$feed_email','$feed_sms',now())");
	$result = mysql_query($sql)or die($sql);
	if($result){
		echo "success";
	}else{
		echo "error";
	}
}else{
	
	$sql = "select * from wiz_feed where feed_sms='$feed_sms'";
	$result = mysql_query($sql)or die($sql);
	while($row = mysql_fetch_array($result)){
		$isql = "update wiz_feed set feed_sms = '구독안함' where idx = '$row[idx]'";
		mysql_query($isql);
	}


	$sql = "select * from wiz_feed where feed_email='$feed_email'";
	$result = mysql_query($sql)or die($sql);
	while($row = mysql_fetch_array($result)){
		$isql = "update wiz_feed set feed_email = '구독안함' where idx = '$row[idx]'";
		mysql_query($isql);
	}

	if($result){
		echo "success";
	}else{
		echo "error";
	}

/*
	$sql = iconv("UTF-8","EUC-KR","insert into wiz_feed(feed_email,feed_sms,wdate) values('$feed_email','$feed_sms',now())");
	$result = mysql_query($sql)or die($sql);
*/
}
?>