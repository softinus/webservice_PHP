<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<?

// 검색 파라미터
$param = "code=$code&idx=$idx&page=$page&category=$category&searchopt=$searchopt&searchkey=$searchkey";

if($mode == "insert"){
}else if($mode == "update"){
}else if($mode == "reply"){
}else if($mode == "delete"){
}else if($mode == "delbbs"){// 다중삭제
	$array_selbbs = explode("|",$selbbs);
	for($ii=0;$ii<count($array_selbbs);$ii++){
		$sql = "delete from wiz_feed where idx='$array_selbbs[$ii]'";
		mysql_query($sql) or error(mysql_error());
	}
	complete("삭제되었습니다.","oneday_sns.php?$param");
}else if($mode == "delfile"){ // 첨부파일 삭제
}else if($mode == "comment") { // 코멘트 입력
}else if($mode == "delco"){ // 코멘트 삭제
	
}

?>