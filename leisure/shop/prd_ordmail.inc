<?

$ordmail = "
<table border=0 cellpadding=0 cellspacing=0 width=98% align=center>
	<tr><td>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr><td style='padding:0 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/sett_t01.gif></td>
				<td></td></tr>
			</table>
	</td></tr>
	<tr><td>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr align=center>
				<td background=http://$HTTP_HOST/images/form_bar_bg1.gif height=39 width=138>�̹���</td>
				<td background=http://$HTTP_HOST/images/form_bar_bg1.gif align=center>���Ż�ǰ����</td>
				<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=100>��ǰ����</td>
				<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=80>������</td>
				<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=80>���ż���</td>
			</tr>
";

	$sql = "select * from wiz_basket where orderid = '$order_info->orderid'";
	$result = mysql_query($sql,$connect) or error(mysql_error());
	$prd_num = mysql_num_rows($result);

	$no = 0;
	while($row = mysql_fetch_object($result)){

		$prd_price += ($row->prdprice * $row->amount);
		if($row->prdimg == "") $row->prdimg = "http://$HTTP_HOST/images/noimage.gif";
		else $row->prdimg = "http://$HTTP_HOST/data/prdimg/".$row->prdimg;

		$optcode = "";
		if($row->opttitle5 != '') $optcode .= "$row->opttitle5 : $row->optcode5, ";
		if($row->opttitle6 != '') $optcode .= "$row->opttitle6 : $row->optcode6, ";
		if($row->opttitle7 != '') $optcode .= "$row->opttitle7 : $row->optcode7, ";
		
		if($row->opttitle3 != '') $optcode .= "$row->opttitle3 : $row->optcode3, ";
		if($row->opttitle4 != '') $optcode .= "$row->opttitle4 : $row->optcode4, ";

		if($row->opttitle != '') $optcode .= $row->opttitle;
		if($row->opttitle != '' && $row->opttitle2 != '') $optcode .= "/";
		if($row->opttitle2 != '') $optcode .= $row->opttitle2;
		if($row->opttitle != '' || $row->opttitle2 != '') $optcode .= " : ".$row->optcode.", ";

		if(!strcmp($row->status, "CA")) $basket_status = "<font color='red'>[��ҽ�û]</font>";
		else if(!strcmp($row->status, "CI")) $basket_status = "<font color='red'>[ó����]</font>";
		else if(!strcmp($row->status, "CC")) $basket_status = "<font color='red'>[��ҿϷ�]</font>";
		else $basket_status = "";

		$del_type = "";
		if(!empty($row->del_type) && strcmp($row->del_type, "DA")) {
			if(!strcmp($row->del_type, "DC")) $del_type = "<br>(".deliver_name_prd($row->del_type)." : ".number_format($row->del_price)."��)";
			else $del_type = "<br>(".deliver_name_prd($row->del_type).")";
		}
		
$ordmail .= "
		<tr>
		<td style=padding:10 align=center><a href='http://$HTTP_HOST/shop/prd_view.php?prdcode=$row->prdcode' target='prdview'><img src='$row->prdimg' border='0' width='50' height='50'></a></td>
		<td><a href='http://$HTTP_HOST/shop/prd_view.php?prdcode=$row->prdcode' target='prdview'>$row->prdname</a> $basket_status <br>$optcode$del_type</td>
		<td class=price align=center>".number_format($row->prdprice)."��</td>
		<td align=center><b>".number_format($row->prdreserve*$row->amount)."��</b></td>
		<td align=center><b>".$row->amount."</b></td>
		</tr>
		<tr><td colspan=7 height=1 bgcolor=#E5E5E5></td></tr>";

		$no++;
	}

// ȸ������
if($order_info->discount_price > 0){
	$discount_msg = " - ȸ������(<b>".number_format($order_info->discount_price)."��</b>)";
}

// ������ ���
if($order_info->reserve_use > 0){
	$reserve_msg = " - ������ ���(<b>".number_format($order_info->reserve_use)."��</b>)";
}

// �������
if($order_info->coupon_use > 0){
	$coupon_msg = " - ���� ���(<b>".number_format($order_info->coupon_use)."��</b>)";
}

$ordmail .= "
		<tr><td colspan=5 height=2 bgcolor=#E5E5E5></td></tr>
		<tr>
		<td height=38 background=http://$HTTP_HOST/images/form_bar_bg2.gif align=center colspan=5>
		<b>�Ѱ����ݾ� </b>:  ��ǰ(<b>".number_format($order_info->prd_price)."��)</b> ".$discount_msg." + ��ۺ�(<b>".number_format($order_info->deliver_price)."��</b>)".$coupon_msg.$reserve_msg." = <span class=price>".number_format($order_info->total_price)."��</span>
		</td>
		</tr>
		</table>
		</td></tr>
		<tr><td><br></td></tr>
		<tr><td>

		<table border=0 cellpadding=5 cellspacing=0 width=100%>
		<tr>
		  <td width=100><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�ֹ���ȣ</td><td> : $order_info->orderid</td>
		  <td width=100><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�ֹ���</td><td> : $order_info->order_date</td>
		</tr>
		<tr>
		  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�������</td><td> : ".pay_method($order_info->pay_method)."</td>
		  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�ֹ�����</td><td> : ".order_status($order_info->status)."</td>
		</tr>";


if($order_info->pay_method == "PB"){


$ordmail .= "
		<tr>
		  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�Աݰ���</td><td> : $order_info->account</td>
		  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�Ա��ڸ�</td><td> : $order_info->account_name</td>
		</tr>";

}else if($order_info->pay_method == "PV"){

$ordmail .= "
		<tr>
		  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle><b>�Աݰ���</b></td><td colspan=3><b> : $order_info->account</b> <font color=red>(������¹�ȣ�� �Ա��ϼž� �ֹ��� �Ϸ�˴ϴ�.)</font></td>
		</tr>";

}

if($order_info->deliver_num != ""){
	
$ordmail .= "
				<tr>
				  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>������ȣ</td><td colspan=3> : ".$order_info->deliver_num."</td>
				</tr>";
				
}

$ordmail .= "
    </table>


  </td>
</tr>
<tr>
  <td>


	<table border=0 cellpadding=5 cellspacing=0 width=100%>
	  <tr>
	    <td>
				<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr><td colspan=2 style='padding:10 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/order_title02.gif></td></tr>
				<tr><td height=3 colspan=2 bgcolor=#999999></td></tr>
				<tr><td height=1 colspan=2 bgcolor=#dadada></td></tr>
				<tr><td height=5></td></tr>
				<tr><td height=25 width=110><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�ֹ��Ͻô� ��</td><td> : $order_info->send_name</td></tr>
				<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>��ȭ��ȣ</td><td> : $order_info->send_tphone</td></tr>
				<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�޴���ȭ��ȣ</td><td> : $order_info->send_hphone</td></tr>
				<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�̸���</td><td> : $order_info->send_email</td></tr>
				<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�ּ�</td><td> : [$order_info->send_post] $order_info->send_address</td></tr>
				</table>
		  </td>
    </tr>
  </table>


  </td>
</tr>
<tr>
  <td>


    <table border=0 cellpadding=5 cellspacing=0 width=100%>
      <tr>
		   <td valign=top>
				<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr><td colspan=2 style='padding:10 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/order_title03.gif></td></tr>
				<tr><td height=3 colspan=2 bgcolor=#999999></td></tr>
				<tr><td height=1 colspan=2 bgcolor=#dadada></td></tr>
				<tr><td height=5></td></tr>
				<tr><td height=25 width=110><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�����ô� ��</td><td> : $order_info->rece_name</td></tr>
				<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>��ȭ��ȣ</td><td> : $order_info->rece_tphone</td></tr>
				<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�޴���ȭ��ȣ</td><td> : $order_info->rece_hphone</td></tr>
				<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>�ּ�</td><td> : [$order_info->rece_post] $order_info->rece_address</td></tr>";

if($order_info->demand != ""){
$ordmail .= "
				<tr>
					<td height=25 colspan=2 valign=top>
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
						<tr><td height=4></td></tr>
						<tr><td width=110 valign=top><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>��û����</td><td> : ".str_replace("\n","<br>&nbsp;&nbsp;",$order_info->demand)."</td></tr>
						</table>
					</td>
				</tr>";
}
$ordmail .= "
				</table>
		   </td>
      </tr>
    </table>


  </td>
</tr>
</table>
";

?>