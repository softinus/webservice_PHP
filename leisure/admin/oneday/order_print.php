<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>�ֹ��� ���</title>
<link href="/admin/style.css" rel="stylesheet" type="text/css">
</head>

<body onLoad="this.focus();print();">
<?php
if(empty($selorder)) {
	error("����� �ֹ����� ���õ��� �ʾҽ��ϴ�.","");
} else {

	$order_list = explode("|", $selorder);
	$search_sql = " and (";
	for($ii = 0; $ii < count($order_list); $ii++) {
		if(!empty($order_list[$ii])) {
			if($ii > 0) $search_sql .= " or ";
			$search_sql .= " orderid = '$order_list[$ii]' ";
		}
	}
	$search_sql .= ")";

	$sql = "select * from wiz_order where orderid != '' $search_sql";
	$result = mysql_query($sql) or error(mysql_error());

	$no = 0;
	
	while($order_info = mysql_fetch_array($result)) {

		$discount_msg = "";
		$reserve_msg = "";
		$coupon_msg = "";
		
		$order_info[demand] = str_replace("\n", "<br>", trim($order_info[demand]));
		$order_info[cancelmsg] = str_replace("\n", "<br>", trim($order_info[cancelmsg]));
		$order_info[descript] = str_replace("\n", "<br>", trim($order_info[descript]));
		
		if($no > 0) echo "<p class=break><br style=\"height:0; line-height:0\"></p>";
?>
<table width="100%">
	<tr>
		<td height="25"><b>+ �ֹ���ǰ</b></td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#000000">
  <tr>
    <td width="10%" height="27" align="center" class="t_value">��ǰ�ڵ�</td>
    <td align="center" class="t_value">��ǰ��</td>
    <td width="70" align="center" class="t_value">��ǰ����</td>
    <td width="90" align="center" class="t_value">�ɼ�</td>
    <td width="70" align="center" class="t_value">����</td>
    <td width="70" align="center" class="t_value">������</td>
    <td width="60" align="center" class="t_value">���</td>
  </tr>
  <?
 $orderid = $order_info[orderid];
 $b_sql = "select * from wiz_basket where orderid = '$orderid'";
 $b_result = mysql_query($b_sql) or error(mysql_error());
 $b_total = mysql_num_rows($b_result);

 while($b_row = mysql_fetch_object($b_result)){
 	if($b_row->prdimg == "") $b_row->prdimg = "/images/noimage.gif";
	else $b_row->prdimg = "/data/prdimg/$b_row->prdimg";

 	$prd_price += $b_row->prdprice*$b_row->amount;
 	$reserve_price += $b_row->prdreserve*$b_row->amount;
?>
 	<tr class="t_value">
    <td height="30" align="center"><?=$b_row->prdcode?></td>
    <td>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    		<tr>
    			<td><img src='<?=$b_row->prdimg?>' width='50' height='50' border='0'></td>
    			<td><?=$b_row->prdname?></td>
    		</tr>
    	</table>
    </td>
    <td align="center"><?=number_format($b_row->prdprice)?>��</td>
    <td align="center">
  <?
  /*
	if($b_row->opttitle != '') echo "$b_row->opttitle : $b_row->optcode <br>";
	if($b_row->opttitle2 != '') echo "$b_row->opttitle2 : $b_row->optcode2 <br>";
	if($b_row->opttitle3 != '') echo "$b_row->opttitle3 : $b_row->optcode3 <br>";
	*/
	if($b_row->opttitle2 != '') $b_row->opttitle2 = "/".$b_row->opttitle2;
	if($b_row->optcode2 != '') $b_row->optcode2 = "/".$b_row->optcode2;

	if($b_row->opttitle != '') echo $b_row->opttitle.$b_row->opttitle2." : ".$b_row->optcode.$b_row->optcode2." <br>";
	if($b_row->opttitle3 != '') echo "$b_row->opttitle3 : $b_row->optcode3 <br>";
	if($b_row->opttitle4 != '') echo "$b_row->opttitle4 : $b_row->optcode4 <br>";
	if($b_row->opttitle5 != '') echo "$b_row->opttitle5 : $b_row->optcode5 <br>";
	if($b_row->opttitle6 != '') echo "$b_row->opttitle6 : $b_row->optcode6 <br>";
	if($b_row->opttitle7 != '') echo "$b_row->opttitle7 : $b_row->optcode7 <br>";
 ?>
    </td>
    <td align="center"><?=$b_row->amount?></td>
    <td align="center"><?=number_format($b_row->prdreserve*$b_row->amount)?>��</td>
    <td align="center">
<?
if(!strcmp($b_row->status, "CA") || !strcmp($b_row->status, "CI") || !strcmp($b_row->status, "CC")) {
	if(!strcmp($b_row->status, "CA")) $basket_status = "��ҽ�û";
	else if(!strcmp($b_row->status, "CI")) $basket_status = "ó����";
	else if(!strcmp($b_row->status, "CC")) $basket_status = "��ҿϷ�";
?>
						<?=$basket_status?>
<?
}
?>
    </td>
  </tr>
  <?
  }
  // ȸ������
  if($order_info[discount_price] > 0){
  	$discount_msg = " - ȸ������( <b><font color=#ED1C24>".number_format($order_info[discount_price])."��</font></b> )";
  }
  // ������ ���
	if($order_info[reserve_use] > 0){
		$reserve_msg = " - ������ ���(<b><font color=#ED1C24>".number_format($order_info[reserve_use])."��</font></b>)";
	}

	// �������
	if($order_info[coupon_use] > 0){
		$coupon_msg = " - ���� ���(<b><font color=#ED1C24>".number_format($order_info[coupon_use])."��</font></b>)";
	}
	
  ?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="38">
  <tr><td height="10"></td></tr>
  <tr>
  	<td><b>��ۺ� : <?=deliver_name($order_info[deliver_method])?></b></td>
    <td align="right">
    ��ǰ�հ�( <b><font color="#ED1C24"><?=number_format($order_info[prd_price])?>��</font></b> )
    <?=$discount_msg?>
     + ��ۺ�( <b><font color="#ED1C24"><?=number_format($order_info[deliver_price])?>��</font></b>)
     <?=$coupon_msg?><?=$reserve_msg?>

    =
    <b><font color="#000000">�� �����ݾ� :</font> <font color="#ED1C24"><?=number_format($order_info[total_price])?>��</font></b>
    </td>
  </tr>
  <tr><td height="10"></td></tr>
</table>
<table width="100%">
	<tr>
		<td height="25"><b>+ �ֹ�����</b></td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
			<table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#000000">
			  <tr>
			    <td width="10%" height="30" align="center" class="t_value">�ֹ���ȣ</td>
			    <td width="40%" class="t_value"><?=$orderid?></td>
			    <td width="10%" height="30" align="center" class="t_value">�������</td>
			    <td width="40%" class="t_value"><?=pay_method($order_info[pay_method])?></td>
			  </tr>
			  <tr>
			    <td height="30" align="center" class="t_value">�ֹ�����</td>
			    <td class="t_value"><?=$order_info[order_date]?></td>
			    <td height="30" align="center" class="t_value">��������</td>
			    <td class="t_value"><?=$order_info[account]?></td>
			  </tr>
			  <tr>
			    <td height="30" align="center" class="t_value">������ȣ</td>
			    <td class="t_value"><?=$order_info[deliver_num]?></td>
			    <td height="30" align="center" class="t_value">�Ա���</td>
			    <td class="t_value"><?=$order_info[account_name]?></td>
			  </tr>
			  <tr>
			    <td height="30" align="center" class="t_value">ó������</td>
			    <td class="t_value"><?=order_status($order_info[status]);?></td>
			    <td height="30" align="center" class="t_value"></td>
			    <td class="t_value"></td>
			  </tr>
			  <tr>
			    <td height="30" align="center" class="t_value">ó���ð�</td>
			    <td class="t_value" colspan="3">
			      <table width="100%" border="0" cellpadding="0" cellspacing="0">
			        <tr class="t_value">
			          <td width="25%" align="center" height="25">�ֹ�����</td>
			          <td width="25%" align="center">�����Ϸ�</td>
			          <td width="25%" align="center">��ۿϷ�</td>
			          <td width="25%" align="center">�ֹ����</td>
			        </tr>
			        <tr>
			          <td align="center" height="25"><? if($order_info[order_date] == "0000-00-00 00:00:00") echo "-"; else echo $order_info[order_date]; ?></td>
			          <td align="center"> <? if($order_info[pay_date] == "0000-00-00 00:00:00") echo "-"; else echo $order_info[pay_date]; ?> </td>
			          <td align="center"> <? if($order_info[send_date] == "0000-00-00 00:00:00") echo "-"; else echo $order_info[send_date]; ?> </td>
			          <td align="center"> <? if($order_info[cancel_date] == "0000-00-00 00:00:00") echo "-"; else echo $order_info[cancel_date]; ?> </td>
			        </tr>
			      </table>
			    </td>
			  </tr>
			</table>
		</td>
  </tr>
</table>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="b_title02">+ ���������</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#000000">
        <tr>
          <td width="10%" height="30" align="center" class="t_value">�ֹ��ڸ�</td>
          <td width="40%" class="t_value"><?=$order_info[send_name]?></td>
          <td width="10%" height="30" align="center" class="t_value">�̸���</td>
          <td width="40%" class="t_value"><?=$order_info[send_email]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">��ȭ��ȣ</td>
          <td class="t_value"><?=$order_info[send_tphone]?></td>
          <td height="30" align="center" class="t_value">�޴���</td>
          <td class="t_value"><?=$order_info[send_hphone]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">�����ȣ</td>
          <td class="t_value" colspan="3"><?=$order_info[send_post]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">�ּ�</td>
          <td class="t_value" colspan="3"><?=$order_info[send_address]?></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="b_title02">+ ����������</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#000000">
        <tr>
          <td height="30" align="center" class="t_value">�����θ�</td>
          <td class="t_value" colspan="3"><?=$order_info[rece_name]?></td>
        </tr>
        <tr>
          <td width="10%" height="30" align="center" class="t_value">��ȭ��ȣ</td>
          <td width="40%" class="t_value"><?=$order_info[rece_tphone]?></td>
          <td width="10%" height="30" align="center" class="t_value">�޴���</td>
          <td width="40%" class="t_value"><?=$order_info[rece_hphone]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">�����ȣ</td>
          <td class="t_value" colspan="3"><?=$order_info[rece_post]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">�ּ�</td>
          <td class="t_value" colspan="3"><?=$order_info[rece_address]?></td>
        </tr>
        <? if(!empty($order_info[demand])) { ?>
        <tr>
          <td height="30" align="center" class="t_value">��û����</td>
          <td class="t_value" colspan="3"><?=$order_info[demand]?></td>
        </tr>
        <? } ?>
        <? if(!empty($order_info[cancelmsg])) { ?>
        <tr>
          <td height="30" align="center" class="t_value">�ֹ���� ����</td>
          <td class="t_value" colspan="3"><?=$order_info[cancelmsg]?></td>
        </tr>
        <? } ?>
        <? if(!empty($order_info[descript])) { ?>
        <tr>
          <td height="30" align="center" class="t_value">�����ڸ޸�</td>
          <td class="t_value" colspan="3"><?=$order_info[descript]?></td>
        </tr>
        <? } ?>
      </table></td>
  </tr>
</table>
<?php
		$no++;
	}

}
?>
</body>
</html>
