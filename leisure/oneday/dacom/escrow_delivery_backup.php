<?php
	include "../../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
	include "../../inc/util.inc"; 					// ��ƿ ���̺귯��
	include "../../inc/oper_info.inc"; 		// � ����
//**************************//
//
// ��۰�� �۽� PHP ����
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
		//$mid;			//LG������ �������� ����(test:�׽�Ʈ, service:����)
		//$pay_key;		//����MertKey(mertkey�� ���������� -> ������� -> ���������������� Ȯ���ϽǼ� �ֽ��ϴ�)

// �׽�Ʈ��
$service_url = "http".$_htt."://pgweb.dacom.net".$tport."/pg/wmp/mertadmin/jsp/escrow/rcvdlvinfo.jsp";

// ���񽺿�
//$service_url = "https://pgweb.dacom.net/pg/wmp/mertadmin/jsp/escrow/rcvdlvinfo.jsp";

//$mid = get_param("mid");						// ����ID

$oid = get_param("oid");						// �ֹ���ȣ
$productid = get_param("productid");			// ��ǰID
$orderdate = str_replace(" ",'',get_param("orderdate"));			// �ֹ�����
//$dlvtype = get_param("dlvtype");				// ��ϳ��뱸��
$dlvtype = "03";				// ��ϳ��뱸��
//$rcvdate = get_param("rcvdate");				// �Ǽ�������
//$rcvname = get_param("rcvname");				// �Ǽ����θ�
//$rcvrelation = get_param("rcvrelation");		// ����
$dlvdate = get_param("dlvdate");				// �߼�����
$dlvcompcode = get_param("dlvcompcode");		// ���ȸ���ڵ�
$dlvcomp = get_param("dlvcomp");				// ���ȸ���
$dlvno = get_param("dlvno");					// ������ȣ
$dlvworker = get_param("dlvworker");			// ����ڸ�
$dlvworkertel = get_param("dlvworkertel");		// �������ȭ��ȣ

//$mertkey = "28cab5722dcbb2109c8fd80604574084";	// �� ������ �׽�Ʈ�� ����Ű�� ���񽺿� ����Ű
$mertkey = $pay_key;	// �� ������ �׽�Ʈ�� ����Ű�� ���񽺿� ����Ű
												// �׽�Ʈ���������ڿ� ���񽺻����������� ��������������� ��ȸ ����

$hashdate;										// ����Ű
$datasize = 1;									// ������ �����ϴ� ��������
//�߼�����
$hashdata = md5($mid.$oid.$dlvdate.$dlvcompcode.$dlvno.$mertkey);
// DB���� ������� ����
/*
$query = "select * from temp";
$result = mysql_query($query);
while($row=FetchNext($result))
{

	$mid =  $row["mid"];
	$oid =  $row["oid"];
	$dlvtype =  $row["dlvtype"];

	if("03"==$dlvtype)
	{
		// �߼�����
		$dlvdate =  $row["dlvdate"];
		$dlvcomp =  $row["dlvcomp"];
		$dlvno =  $row["dlvno"];
		$dlvworker =  $row["dlvworker"];
		$dlvworkertel =  $row["dlvworkertel"];

		$hashdata = md5($mid.$oid.$dlvdate.$dlvcompcode.$dlvno.$mertkey);
	}
	else if("01"==$dlvtype)
	{
		// ��������
		$rcvdate =  $row["rcvdate"];
		$rcvname =  $row["rcvname"];
		$rcvrelation =  $row["rcvrelation"];

		$hashdata = md5($mid.$oid.$dlvtype.$rcvdate.$mertkey);
	}

	// �������� ��۰������������� ȣ���Ͽ� ������������
	/*
	*	�Ʒ� URL �� ȣ��� �Ķ������ ���� ������ �߻��ϸ� �ش� URL�� ������������ ȣ��˴ϴ�.
	*	��ۻ����� �Ķ���ͷ� ��Ͻ� ������ "||" ���� �����Ͽ� �ֽñ� �ٶ��ϴ�.
	*/
	$str_url = $service_url."?mid=$mid&oid=$oid&productid=$productid&orderdate=$orderdate&dlvtype=$dlvtype&rcvdate=$rcvdate&rcvname=$rcvname&rcvrelation=$rcvrelation&dlvdate=$dlvdate&dlvcompcode=$dlvcompcode&dlvno=$dlvno&dlvworker=$dlvworker&dlvworkertel=$dlvworkertel&hashdata=$hashdata";

	$fp = fopen($str_url,"r");

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
				echo "OK";
				// ����ó���Ǿ����� DB ó��
		}
		else
		{
				echo "FAILD";
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