<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<?
// �˻� �Ķ����
$param = "code=$code&idx=$idx&page=$page&category=$category&searchopt=$searchopt&searchkey=$searchkey";

$charge_tel		=	$charge_tel1."-".$charge_tel2."-".$charge_tel3;
$charge_hp		=	$charge_hp1."-".$charge_hp2."-".$charge_hp3;
$charge_fax	=	$charge_fax1."-".$charge_fax2."-".$charge_fax3;

if($mode == "insert"){

	$sql = "select count(idx) as counter from wiz_company where com_id='$com_id'";
	$result = mysql_query($sql) or die($sql);
	$row = mysql_fetch_array($result);

	$counter = $row[counter];

	if($counter <> 0){
		echo '<script type="text/javascript">alert("�̹� ��ϵǾ� �ִ� ���̵� �Դϴ�."); history.back(-1);</script>';
		die();
	}


	$sql = "insert into wiz_company(com_id,com_pw,company,com_no,bossname,business,com_kind,addr1,addr2,charge,charge_tel,charge_hp,charge_fax,charge_email,memo,wdate) values(";
	$sql .= " '$com_id', '$com_pw','$company','$com_no','$bossname','$business','$com_kind','$addr1','$addr2','$charge','$charge_tel','$charge_hp','$charge_fax','$charge_email','$memo',now())";
	mysql_query($sql) or die($sql);

	complete("��ϵǾ����ϴ�.","oneday_company.php?$param");

}else if($mode == "update"){

	$sql = "update wiz_company set ";
	$sql .= " com_pw= '$com_pw',";
	$sql .= " company= '$company',";
	$sql .= " com_no= '$com_no',";
	$sql .= " bossname= '$bossname',";
	$sql .= " business= '$business',";
	$sql .= " com_kind= '$com_kind',";
	$sql .= " addr1= '$addr1',";
	$sql .= " addr2= '$addr2',";
	$sql .= " charge= '$charge',";
	$sql .= " charge_tel= '$charge_tel',";
	$sql .= " charge_hp= '$charge_hp',";
	$sql .= " charge_fax= '$charge_fax',";
	$sql .= " charge_email= '$charge_email',";
	$sql .= " memo= '$memo'";
	$sql .= " where idx = '$idx'";
	mysql_query($sql) or die($sql);
	complete("�����Ǿ����ϴ�.","oneday_company.php?$param");

}else if($mode == "delete"){
	
	$sql = "delete from wiz_company where idx = '$idx'";
	mysql_query($sql) or die($sql);
	complete("�����Ǿ����ϴ�.","oneday_company.php?$param");


}else if($mode == "delbbs"){ // ���߻���
/*
	$array_selbbs = explode("|",$selbbs);
	for($ii=0;$ii<count($array_selbbs);$ii++){
		$sql = "delete from wiz_feed where idx='$array_selbbs[$ii]'";
		mysql_query($sql) or error(mysql_error());
	}
	complete("�����Ǿ����ϴ�.","oneday_sns.php?$param");
*/
}

?>