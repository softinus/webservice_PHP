<?
include "../inc/common.inc"; 			  // DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		// � ����
include "../inc/oper_info.inc"; 		// � ����


$status = "OR";													// �ֹ�����
$rescode = "0000";											// �������
$resmsg = "���������� �����Ǿ����ϴ�.";	// �����޼���

// �ֹ�����
$sql = "select * from wiz_dayorder where orderid='$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);

$_Payment[status]		= "OR"; //��������

// ���������� ��� ������ �����Ϸ�[OY]
if($order_info->reserve_use >= $order_info->total_price){
  $status = "OY";
  $paydate = date('Y-m-d h:i:s');
}
		////////////////////////////////////////////////////////////////////////////
	 	/////////////////////// �ֹ����� ������Ʈ //////////////////////////////////
	 	////////////////////////////////////////////////////////////////////////////

		$_Payment[orderid]	= $orderid; //�ֹ���ȣ
		$_Payment[paymethod]	= "PB"; //��������
		$_Payment[accountno]	= $account; //���¹�ȣ
		$_Payment[accountname] = $account_name; // ������
		$_Payment[pgname]		= "PB";//PG�� ����
		//$_Payment[tprice]		=	$LGD_AMOUNT; //�����ݾ�

		//����ó��(���º���,�ֹ� ������Ʈ)
		Exe_payment2($_Payment);
		// ������ ó�� : ������ ���� ������ ����
		Exe_reserve();
		// ���ó��(�����Ϸ�[OY]�� ��쿡�� ��� ����)
		if(!strcmp($status, "OY")) Exe_stock();
		// ��ٱ��� ����
	    Exe_delbasket();
		$resp = true;
		$resultMSG ="OK";
		
		// ���ݰ�꼭 ������Ʈ
		if(!strcmp($oper_info->tax_use, "Y")) {
			$sql = "update wiz_tax set tax_date = now() where orderid = '$orderid'";
			mysql_query($sql) or error(mysql_error());
		}
		
		
// �ֹ����� ����
//$sql = "update wiz_order set account='$account', account_name='$account_name', status='$status' where orderid='$orderid'";
//	$result = mysql_query($sql) or error(mysql_error());



// ��ٱ��� ����
//@mysql_query("DELETE FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."'");
//session_unregister("basket_list");

?>

<form name="frm" action="order_ok.php" method="post">
<input type="hidden" name="orderid" value="<?=$orderid?>">
<input type="hidden" name="rescode" value="<?=$rescode?>">
<input type="hidden" name="resmsg" value="<?=$resmsg?>">
<input type="hidden" name="pay_method" value="<?=$pay_method?>">
</form>
<script>document.frm.submit();</script>