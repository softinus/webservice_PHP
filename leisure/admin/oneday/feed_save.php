<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<?

// �˻� �Ķ����
$param = "code=$code&idx=$idx&page=$page&category=$category&searchopt=$searchopt&searchkey=$searchkey";

if($mode == "insert"){
}else if($mode == "update"){
}else if($mode == "reply"){
}else if($mode == "delete"){
}else if($mode == "delbbs"){// ���߻���
	$array_selbbs = explode("|",$selbbs);
	for($ii=0;$ii<count($array_selbbs);$ii++){
		$sql = "delete from wiz_feed where idx='$array_selbbs[$ii]'";
		mysql_query($sql) or error(mysql_error());
	}
	complete("�����Ǿ����ϴ�.","oneday_sns.php?$param");
}else if($mode == "delfile"){ // ÷������ ����
}else if($mode == "comment") { // �ڸ�Ʈ �Է�
}else if($mode == "delco"){ // �ڸ�Ʈ ����
	
}

?>