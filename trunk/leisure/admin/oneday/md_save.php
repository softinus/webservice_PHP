<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<?

// �˻� �Ķ����
$param = "code=$code&idx=$idx&page=$page&category=$category&searchopt=$searchopt&searchkey=$searchkey";

$tel = $tel1."-".$tel2."-".$tel3;
$hp = $hp1."-".$hp2."-".$hp3;

if($mode == "insert"){

	$sql = "insert into wiz_md(md_name,md_email,tel,hp,memo,wdate) values('$md_name','$md_email','$tel','$hp','$memo',now())";
	mysql_query($sql) or die($sql);

	complete("��ϵǾ����ϴ�.","oneday_md.php?$param");

}else if($mode == "update"){

	$sql = "update wiz_md set ";
	$sql .= " md_name='$md_name', ";
	$sql .= " md_email='$md_email', ";
	$sql .= " tel='$tel', ";
	$sql .= " hp='$hp', ";
	$sql .= " memo='$memo'";
	$sql .= " where idx = '$idx'";
	mysql_query($sql) or die($sql);


	complete("�����Ǿ����ϴ�.","oneday_md.php?$param");


}else if($mode == "delete"){
	
	$sql = "delete from wiz_md where idx = '$idx'";
	mysql_query($sql) or die($sql);
	complete("�����Ǿ����ϴ�.","oneday_md.php?$param");


}else if($mode == "delbbs"){ // ���߻���
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