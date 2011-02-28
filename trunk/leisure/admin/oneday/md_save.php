<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<?

// 검색 파라미터
$param = "code=$code&idx=$idx&page=$page&category=$category&searchopt=$searchopt&searchkey=$searchkey";

$tel = $tel1."-".$tel2."-".$tel3;
$hp = $hp1."-".$hp2."-".$hp3;

if($mode == "insert"){

	$sql = "insert into wiz_md(md_name,md_email,tel,hp,memo,wdate) values('$md_name','$md_email','$tel','$hp','$memo',now())";
	mysql_query($sql) or die($sql);

	complete("등록되었습니다.","oneday_md.php?$param");

}else if($mode == "update"){

	$sql = "update wiz_md set ";
	$sql .= " md_name='$md_name', ";
	$sql .= " md_email='$md_email', ";
	$sql .= " tel='$tel', ";
	$sql .= " hp='$hp', ";
	$sql .= " memo='$memo'";
	$sql .= " where idx = '$idx'";
	mysql_query($sql) or die($sql);


	complete("수정되었습니다.","oneday_md.php?$param");


}else if($mode == "delete"){
	
	$sql = "delete from wiz_md where idx = '$idx'";
	mysql_query($sql) or die($sql);
	complete("삭제되었습니다.","oneday_md.php?$param");


}else if($mode == "delbbs"){ // 다중삭제
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