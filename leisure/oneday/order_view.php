<?

include "../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		   // ��ƿ ���̺귯��

$page_type = "ordercom";
include "../inc/page_info.inc"; 		// ������ ����
include "../inc/oper_info.inc"; 		// � ����

// �ֹ�����
$sql = "select * from wiz_dayorder where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);

// �ֹ���� ��ư
get_cancel_btn2();

// ����ũ�� ��ư
get_escrow_btn();

// ���ݰ�꼭 ��ư
get_tax_btn();

include "./prd_ordinfo.php";			// �ֹ�����

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
<title>:: �ֹ����� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
</head>
<body <? if($print == "ok"){ ?>onLoad="window.print();" <? } ?>>
<table width="100%" cellpadding=6 cellspacing=0>
  <tr>
    <td>

      <table width="100%">
        <tr><td height="10"></td></tr>
        <tr><td><?=$ordinfo?></td></tr>
	      <tr><td height="10"></td></tr>
	      <? if($print != "ok"){ ?>
	      <tr>
		      <td align="center">
		      	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		      		<tr>
		      			<td width="30%"><a href="javascript:window.print()"><b><font color=000000>[����Ʈ]</font></b></a></td>
		      			<td align="center"><?=$cancel_btn?>&nbsp;<?=$escrow_btn?></td>
		      			<td width="30%" align="right"><?=$tax_btn?></td>
		      		</tr>
		      	</table>
		      </td>
	      </tr>
	    	<? } ?>
      </table>

    </td>
  </tr>
</table>
</body>
</html>