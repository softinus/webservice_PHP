<?
include "../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		   // ��ƿ ���̺귯��

$page_type = "ordercom";
include "../inc/page_info.inc"; 		// ������ ����
include "../inc/oper_info.inc"; 		// � ����

// �ֹ�����
$sql = "select * from wiz_dayorder where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_array($result);

$sql = "select * from wiz_basket where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$basket_info = mysql_fetch_array($result);


$sql = "select * from wiz_dayproduct where prdcode = '$basket_info[prdcode]'";
$result = mysql_query($sql) or error(mysql_error());
$prd_info = mysql_fetch_array($result);

$sql = "select * from wiz_company where idx = '$prd_info[company_idx]'";
$result = mysql_query($sql) or error(mysql_error());
$com_info = mysql_fetch_array($result);

$arrMehtod = array("PB"=>"�������Ա�","PC"=>"�ſ�ī�����");

include "./prd_ordinfo.inc";			// �ֹ�����

if(!empty($HTTP_REFERER)) {
	$pos = strpos($HTTP_REFERER, $HTTP_HOST);
	if($pos === false) {
?>
<script Language="Javascript">
<!--
		alert("�߸��� ��� �Դϴ�.");
		self.close();
//-->
</script>
<?php
	}
}

?>
<html>
<head>
<title>::: �ִ����� ::: �ѷ� �Ѱ��� �ݰ���ҽ�! any Coupon</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" onload="window.print();">
<table width="700" height="590" border="0" cellpadding="5" cellspacing="2" bgcolor="3C3C3C">
	<tr>
		<td width="685" align="center" valign="top" bgcolor="#FFFFFF">
			<table  width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td width="29%"><img src="image/cupon_logo.gif" width="200" height="73"></td>
					<td width="71%" valign="bottom">
						<table  width="376" height="48" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><strong><font color="#FF6600">��<?=$order_info[send_name]?>�� (<?=$order_info[send_id]?>)</font>���� ���������Դϴ�.</strong></td>
							</tr>
						</table>
					</td>
				</tr>
			</table> 
			<table width="685" height="41" border="0" cellpadding="0" cellspacing="0" background="image/cupon_bg.gif">
				<tr>
					<td class="font02" style="padding-left:15px;"><font color="FFC56A"><?=$prd_info[prdname]?></font></td>
				</tr>
			</table>
			<table width="90" height="26" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="640" height="392" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">
						<table width="639" height="156" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td width="251">
									<table  width="222" height="134" border="0" cellpadding="0" cellspacing="1" bgcolor="C7C7C7">
										<tr>
										<?if($prd_info[img_coupon] != "Array" && $prd_info[img_coupon]){?>
											<td bgcolor="#FFFFFF"><img src="<?=$_SERVER["HTTP_HOST"]?>/data/prdimg/<?=$prd_info[img_coupon]?>" width="222" height="134" title="�����̹���" /></td>
										<?}else{?>
											<td bgcolor="#FFFFFF" align="center" valign="middle">�����̹����� ��ϵǾ����� �ʽ��ϴ�.</td>
										<?}?>
										</tr>
									</table>
								</td>
								<td width="388">
									<table  width="374" height="23" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td height="23"><strong>�Ѱ����ݾ� :<font color="ED207B"> <?=number_format($order_info[total_price])?>�� </font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>�̸� : <font color="666666"><?=$order_info[rece_name]?></font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>�Ѽ��� :<font color="666666"> <?=$order_info[amount]?>�� </font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>�ֹ��ð� : <font color="666666"><?=$order_info[order_date]?></font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>Ƽ�Ϲ�ȣ : <font color="666666"><?=$orderid?> </font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>������� : <font color="666666"><?=$arrMehtod[$order_info[pay_method]]?></font></strong></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<table width="90" height="26" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td></td>
							</tr>
						</table>
						<table width="111" height="21" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><img src="image/cupon_s_t_01.gif" width="60" height="20"></td>
							</tr>
						</table>
						<table width="639" height="72" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td>
									<?=nl2br($prd_info[shopinfo])?>
								</td>
							</tr>
						</table>
						<table width="111" height="21" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td><img src="image/cupon_s_t_02.gif" width="60" height="20"></td>
							</tr>
						</table>
						<table width="639" height="72" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td>
									<?=nl2br($prd_info[attention])?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="D1D1D1">
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="100%" height="38" border="0" cellspacing="0">
				<tr>
					<td align="right" style="padding-right:30px;">������ : <?=$shop_info->shop_tel?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
