<?
include "../inc/common.inc";
include "../inc/util.inc";
include "../inc/monitor.inc";
include "../inc/shop_info.inc";


$currentTime = time();
$mailcontent = "";		// ���� ����
$message = "";		// SMS ���� 

$se_num = ereg_replace("-","",$shop_info->shop_tel);
$se_name = $shop_info->shop_name;


$sql = "select * from wiz_dayproduct where unix_timestamp(selldate) < $currentTime and unix_timestamp(selllastdate) > $currentTime";
$result = mysql_query($sql) or die($sql);
while($rs = mysql_fetch_array($result)){
	$sms = $rs[sms];
	$message .= $sms;
}



$sql = "select * from wiz_member order by wdate asc";
$result = mysql_query($sql) or die($sql);
while($row = mysql_fetch_array($result)){

	$reemail	=	$row[reemail];	 	// ���ϼ��ſ���
	$resms	=	$row[resms];		// SMS���ſ���

	$email = $row[email];			//	�̸���
	$hphone = $row[hphone];		//	�޴�������ó

	if($resms=="Y"){

//	function send_sms($se_num, $re_num, $message, $se_name="")



//		send_sms($se_num, );

	}
}

?>