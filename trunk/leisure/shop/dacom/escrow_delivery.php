<?php
	include "../../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
	include "../../inc/util.inc"; 					// ��ƿ ���̺귯��
	include "../../inc/oper_info.inc"; 		// � ����
//**************************//
//
// ��۰�� �۽� PHP
//
//**************************//
if(!strcmp($oper_info->pay_test, "Y")) {//�׽�Ʈ
	$oper_info->pay_id = "tanywiz";
	$oper_info->pay_key = "6f51f77a2b2222d642e20e445101a35f";
	$platform	= "test";             //LG������ �������� ����(test:�׽�Ʈ, service:����)
	$mid = $oper_info->pay_id;
	$pay_key = $oper_info->pay_key;
	$tport = ":7085";
	$_htt = "";
}else{//�ǰŷ�
	$platform	= "service";
	$mid = $oper_info->pay_id;
	$pay_key = $oper_info->pay_key;
	$tport = "";
	$_htt = "s";
}

$service_url = "http".$_htt."://pgweb.dacom.net".$tport."/pg/wmp/mertadmin/jsp/escrow/rcvdlvinfo.jsp";

$oid = get_param("oid");									// �ֹ���ȣ
$productid = get_param("productid");			// ��ǰID
$dlvtype = "03";													// ��ϳ��뱸��
$dlvdate = get_param("dlvdate");					// �߼�����
$dlvcompcode = get_param("dlvcompcode");	// ���ȸ���ڵ�
$dlvcomp = get_param("dlvcomp");					// ���ȸ���
$dlvno = get_param("dlvno");							// ������ȣ

$mertkey = $pay_key;	// �� ������ �׽�Ʈ�� ����Ű�� ���񽺿� ����Ű

$hashdate;										// ����Ű
$datasize = 1;								// ������ �����ϴ� ��������
//�߼�����
$hashdata = md5($mid.$oid.$dlvdate.$dlvcompcode.$dlvno.$mertkey);

	// �������� ��۰������������� ȣ���Ͽ� ������������
	/*
	*	�Ʒ� URL �� ȣ��� �Ķ������ ���� ������ �߻��ϸ� �ش� URL�� ������������ ȣ��˴ϴ�.
	*	��ۻ����� �Ķ���ͷ� ��Ͻ� ������ "||" ���� �����Ͽ� �ֽñ� �ٶ��ϴ�.
	*/
	$str_url = $service_url."?mid=$mid&oid=$oid&productid=$productid&dlvtype=$dlvtype&rcvdate=$rcvdate&rcvname=$rcvname&rcvrelation=$rcvrelation&dlvdate=$dlvdate&dlvcompcode=$dlvcompcode&dlvno=$dlvno&dlvworker=$dlvworker&dlvworkertel=$dlvworkertel&hashdata=$hashdata";

	$fp = @fopen($str_url,"r");

	if(!$fp)
	{
		echo "fopen access ERROR";
		// ������н� DB ó�� ���� �߰�
	}
	else
	{
		// �ش� ������ return�� �б�
		while(!feof($fp))
		{
				$res .= fgets($fp,3000);
		}

		if(trim($res) == "OK")
		{
				$sql = "UPDATE wiz_order SET escrow_stats='DE' WHERE orderid='$oid'";
				mysql_query($sql) or error(mysql_error());
				echo "OK";
				echo "<script language='javascript'>self.close();</script>";
				// ����ó���Ǿ����� DB ó��
		}
		else
		{
				echo "FAILD";
				echo "<br>����ũ�� ��������߼� ����";
				echo "<br>$str_url";
				//echo "<script language='javascript'>alert('����ũ�� ��������߼� ����');</script>$str_url";
				// ������ó�� �Ǿ����� DB ó��
		}
	}

//**********************************
// �Ʒ� �ִ� �״�� ����Ͻʽÿ�.
//**********************************
function get_param($name)
{
	global $HTTP_POST_VARS, $HTTP_GET_VARS;
	if (!isset($HTTP_POST_VARS[$name]) || $HTTP_POST_VARS[$name] == "") {
		if (!isset($HTTP_GET_VARS[$name]) || $HTTP_GET_VARS[$name] == "") {
			return false;
		} else {
			 return $HTTP_GET_VARS[$name];
		}
	}
	return $HTTP_POST_VARS[$name];
}

?>