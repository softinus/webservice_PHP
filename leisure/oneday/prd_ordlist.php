<table border=0 cellpadding=0 cellspacing=0 width=100%>
  <tr>
    <td colspan="2">

		 <table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr align=center>
				<td background="/images/form_bar_bg1.gif" height=39 width=80>�̹���</td>
				<td background="/images/form_bar_bg1.gif" width="400">���Ż�ǰ����</td>
				<td background="/images/form_bar_bg1.gif" align="center">�ɼ�</td>
				<td background="/images/form_bar_bg1.gif" width=80>��ǰ����</td>
				<td background="/images/form_bar_bg1.gif" width=60>�� ��</td>
				<td background="/images/form_bar_bg1.gif" width=80>������</td>
				<td background="/images/form_bar_bg1.gif" width=80>�հ�</td>
			</tr>
			<?

			// �ֹ�����
			$sql = "select * from wiz_dayorder where orderid='".$orderid."'";
			$result = mysql_query($sql) or error(mysql_error());
			$order_info = mysql_fetch_object($result);

			// �ֹ���ǰ ����
			$sql = "select * from wiz_basket where orderid='".$orderid."'";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			$total_prdprice = 0;
			$del_price = 0;
			while($row = mysql_fetch_object($result)){
			
				$del_price = $del_price + $row->del_price;

				$del_type = "";
				
				///////////////////////////////////////////////////////////////////////////////////
				//������ �� ��ǰ�̸� (1���ϰ�� :���콺 , 2���̻��ϰ�� ���콺 ��1�� �� ���)//
				///////////////////////////////////////////////////////////////////////////////////
				if($total>1){//1�� �̻��ϰ��
					$payment_prdname = $row->prdname." ��".($total-1)."��";
				}else{//�Ѱ��ϰ��
					$payment_prdname = $row->prdname;
				}
				////////////////////////////////////////////////////////////////////////////////////
				$optcode = "";


				$total_prdprice = $total_prdprice + ( $row->prdprice * $row->amount );
				
				$arroptcode = explode("^",$row->optcode);
				$arroptcode2 = explode("^",$row->optcode2);
				$arroptcode3 = explode("^",$row->optcode3);
				$arroptcode4 = explode("^",$row->optcode4);
				$arroptcode5 = explode("^",$row->optcode5);
				$arroptcode6 = explode("^",$row->optcode6);
				$arroptcode7 = explode("^",$row->optcode7);





				if($row->opttitle != '') $optcode = "$row->opttitle : $arroptcode[0] ";

				if($row->opttitle2 != '') $optcode .= "$row->opttitle2 : $arroptcode2[0] <br />";
				if($row->opttitle3 != '') $optcode .= "$row->opttitle3 : $arroptcode3[0] <br />";
				if($row->opttitle4 != '') $optcode .= "$row->opttitle4 : $arroptcode4[0] <br />";

				
				if($row->opttitle2 != '') $row->opttitle2 = "/".$row->opttitle2;
				if($row->optcode2 != '') $row->optcode2 = "/".$row->optcode2;

//				if($row->opttitle != '') $optcode .= $row->opttitle.$row->opttitle2." : ".$row->optcode.$row->optcode2.", ";
	
				if($row->opttitle5 != '') $optcode .= "$row->opttitle5 : $arroptcode5[0] <br />";
				if($row->opttitle6 != '') $optcode .= "$row->opttitle6 : $arroptcode6[0] <br />";
				if($row->opttitle7 != '') $optcode .= "$row->opttitle7 : $arroptcode7[0] <br />";

				
//				if($row->opttitle != '') $optcode .= $row->opttitle;
				if($row->opttitle != '' && $row->opttitle2 != '') $optcode .= "/";
				if($row->opttitle2 != '') $optcode .= $row->opttitle2;

				if(!empty($row->del_type) && strcmp($row->del_type, "DA")) {
					if(!strcmp($row->del_type, "DC")) $del_type = "<br>(".deliver_name_prd($row->del_type)." : ".number_format($row->del_price)."��)";
					else $del_type = "<br>(".deliver_name_prd($row->del_type).")";
				}
				
				// ��ǰ �̹���
				if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$row->prdimg)) $row->prdimg = "/images/noimg_R.gif";
				else $row->prdimg = "/data/prdimg/".$row->prdimg;
			?>
			<tr>
				<td style="padding:5" align=center><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="prdview"><img src="<?=$row->prdimg?>" width="50" height="50" border="0"></a></td>
				<td><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="prdview"><?=$row->prdname?></a><br><?=$del_type?></td>
				<td align="center"><?=$optcode?></td>
				<td align=center><?=number_format($row->prdprice)?>��</td>
				<td align=center><?=$row->amount?></td>
				<td align=center><?=$row->prdreserve?>��</td>
				<td align=center><?=number_format($row->amount*$row->prdprice)?>��</td>
			</tr>
			<tr><td colspan=7 height=1 bgcolor="#E5E5E5"></td></tr>
			</form>
			<?
			}

			if($total <= 0){
			?>
				<tr><td colspan=10 height=30 align=center>��ٱ��ϰ� ����ֽ��ϴ�.</td></tr>
				<tr><td colspan=10 height=1 bgcolor="#E5E5E5"></td></tr>
			<?
			}

			// ��ۺ�
			if($del_price > 0){
			   	$deliver_price = deliver_price2($order_info->prd_price, $oper_info);
			   	if($order_info->deliver_price > $deliver_price){
			   		$deliver_msg .= " , ��ۺ� ����";
			   	}
				$isDeliver="Y";
			}else{
				$isDeliver="N";
			}

			// ȸ������ [$discount_msg �޼��� ����]
	    $discount_price = level_discount($wiz_session[level],$order_info->prd_price);

	    // ������ ���
	    if($order_info->reserve_use > 0){
	    	$reserve_msg = " - ������ ���(<b>".number_format($order_info->reserve_use)."</b>)";
	    }

	    // �������
	    if($order_info->coupon_use > 0){
	    	$coupon_msg = " - ���� ���(<b>".number_format($order_info->coupon_use)."</b>)";
	    }
			?>
		 </table>

    </td>
  </tr>
<?
$lastPrice = $total_prdprice + $deliver_price;
?>

  <tr>
    <td height="38" background="/images/form_bar_bg2.gif">&nbsp;<?if($isDeliver=="Y"){?>[��ۺ� : <?=$deliver_msg?>]<?}?></td>
    <td align="right" background="/images/form_bar_bg2.gif">
	   ��ǰ(<b><?=number_format($total_prdprice)?>��</b>)  <?=$discount_msg?>
	   <?if($isDeliver=="Y"){?>
	   + ��ۺ�(<b><?=number_format($deliver_price)?>��</b>) <?=$coupon_msg?> <?=$reserve_msg?>
	   <?}?>
	   = �ֹ��հ� <span class="price"><strong><?=number_format($lastPrice)?>��</strong></span> &nbsp;
    </td>
  </tr>
</table>