<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../header.php"; ?>
<?
// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "s_status=$s_status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<?
// �ֹ����� ��������
$sql = "select * from wiz_order where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);

// ��ۺ�
deliver_price($order_info->prd_price, $oper_info);

?>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
// �� ���Ϲ߼�
function sendEmail(name,email){
	var url = "../member/send_email.php?seluser=" + name + ":" + email;
	window.open(url,"sendEmail","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �� sms�߼�
function sendSms(name,hphone){
	var url = "../member/send_sms.php?seluser=" + hphone;
	window.open(url,"sendSms","height=350, width=270, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �����ȣ ã��
function searchZip(){
	document.frm.send_address.focus();
	var url = "../member/search_zip.php?kind=send_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
function searchZip2(){
	document.frm.rece_address.focus();
	var url = "../member/search_zip.php?kind=rece_";
	window.open(url,"searchZip2","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

function basketCancel( idx, prdname ) {

<? if(!strcmp($order_info->status, "OR") || !strcmp($order_info->status, "OY") || !strcmp($order_info->status, "DR")) { ?>

	if(cancel.style.display == "block" && document.cFrm.idx.value == idx) cancel.style.display = "none";
	else cancel.style.display = "block";

	document.cFrm.idx.value = idx;
	document.getElementById("cPrd").innerHTML = prdname;

<? } else { ?>

	alert("���ó��/�ֹ���ҵ� �ֹ��� ��ǰ�� ����� �� �����ϴ�.");

<? } ?>

}

function resetCancel() {
	document.cFrm.idx.value = "";
	document.getElementById("cPrd").innerHTML = "";
	cancel.style.display = "none";
}

function cancelCheck( frm ) {

	if(frm.idx.value == "") {
		alert("��һ�ǰ�� ���õ��� �ʾҽ��ϴ�.");
		return false;
	}

	if(frm.reason.value == "") {
		alert("��һ����� �������ּ���.");
		frm.reason.focus();
		return false;
	}

	if(frm.bank != undefined) {

		if(frm.repay[0].checked != true && frm.repay[1].checked != true) {
			alert("ȯ�ҹ���� �����ϼ���.")
			return false;
		}
		if(frm.repay[1].checked == true) {
			if(frm.bank.value == "") {
				alert("������ �����ϼ���.");
				frm.bank.focus();
				return false;
			}

			if(frm.account.value == "") {
				alert("�Աݰ��¸� �Է��ϼ���.");
				frm.account.focus();
				return false;
			}

			if(frm.acc_name.value == "") {
				alert("�����ָ� �Է��ϼ���.");
				frm.acc_name.focus();
				return false;
			}
		}

	}

}

var clickvalue='';
function viewCancel( idx ) {

	ccontent =eval("ccontent_"+idx+".style");

	if(clickvalue != ccontent) {
		if(clickvalue!='') {
			clickvalue.display='none';
		}

		ccontent.display='block';
		clickvalue=ccontent;
	} else {
		ccontent.display='none';
		clickvalue='';
	}

}

function orderPrint() {
	var url = "order_print.php?selorder=<?=$orderid?>";
	window.open(url,"OderPrint","height=650, width=750, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// ���ݰ�꼭����
function qclick(idnum) {

  tax01.style.display='none';
  
  if(idnum != ""){
	  tax=eval("tax"+idnum+".style");
	  tax.display='block';
	}
}

// ���ݰ�꼭 ���
function printTax(orderid) {

	var url = "/shop/print_tax_sup.php?orderid=" + orderid;
	window.open(url, "taxPub", "height=750, width=670, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=50, top=50");

}
-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">�ֹ�����</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">�ֹ��� �����Դϴ�.</td>
			  </tr>
			</table>

			<br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="70">��ǰ�ڵ�</th>
          <th width="50"></th>
          <th width="245">��ǰ��</th>
          <th width="60">��ǰ����</th>
          <th width="90">�ɼ�</th>
          <th width="90">����</th>
          <th width="80">������</th>
          <th>���</th>
        </tr>
        <tr><td class="t_rd" colspan="20"></td></tr>
        <?
       $orderid = $order_info->orderid;
       $sql = "select * from wiz_basket where orderid = '$orderid'";
		   $result = mysql_query($sql) or error(mysql_error());
		   $total = mysql_num_rows($result);
		   
		   $prd_info = "";

		   while($row = mysql_fetch_object($result)){
		   	if($row->prdimg == "") $row->prdimg = "/images/noimage.gif";
				else $row->prdimg = "/data/prdimg/$row->prdimg";

		   	$prd_price += $row->prdprice*$row->amount;
		   	$reserve_price += $row->prdreserve*$row->amount;

				$del_type = "";

				if(!empty($row->del_type) && strcmp($row->del_type, "DA")) {
					if(!strcmp($row->del_type, "DC")) $del_type = "<br>(".deliver_name_prd($row->del_type)." : ".number_format($row->del_price)."��)";
					else $del_type = "<br>(".deliver_name_prd($row->del_type).")";
				}
				
				$prd_info .= $row->prdname."^".$row->prdprice."^".$row->amount."^^";

			?>
       	<tr bgcolor="#FFFFFF">
          <td align="center"><?=$row->prdcode?></td>
          <td><a href='/shop/prd_view.php?prdcode=<?=$row->prdcode?>' target='_blank'><img src='<?=$row->prdimg?>' width='50' height='50' border='0'></a></td>
          <td><a href='/shop/prd_view.php?prdcode=<?=$row->prdcode?>' target='_blank'><?=$row->prdname?></a><?=$del_type?></td>
          <td align="center"><?=number_format($row->prdprice)?>��</td>
          <td align="center">
	        <?
					if($row->opttitle3 != '') echo "$row->opttitle3 : $row->optcode3 <br>";
					if($row->opttitle4 != '') echo "$row->opttitle4 : $row->optcode4 <br>";
					if($row->opttitle5 != '') echo "$row->opttitle5 : $row->optcode5 <br>";
					if($row->opttitle6 != '') echo "$row->opttitle6 : $row->optcode6 <br>";
					if($row->opttitle7 != '') echo "$row->opttitle7 : $row->optcode7 <br>";
					
					if($row->opttitle != '') echo $row->opttitle;
					if($row->opttitle != '' && $row->opttitle2 != '') echo "/";
					if($row->opttitle2 != '') echo $row->opttitle2;
					if($row->opttitle != '' || $row->opttitle2 != '') echo " : ".$row->optcode." <br>";
				 	?>
          </td>
          <td align="center"><?=$row->amount?></td>
          <td align="center"><?=number_format($row->prdreserve*$row->amount)?>��</td>
          <td align="center">
					<?
					if(!strcmp($row->status, "CA") || !strcmp($row->status, "CI") || !strcmp($row->status, "CC")) {
						if(!strcmp($row->status, "CA")) $basket_status = "��ҽ�û<br><a href=\"javascript:\" onClick=\"viewCancel('$row->idx')\">[��ҳ�������]</a>";
						else if(!strcmp($row->status, "CI")) $basket_status = "ó����<br><a href=\"javascript:\" onClick=\"viewCancel('$row->idx')\">[��ҳ�������]</a>";
						else if(!strcmp($row->status, "CC")) $basket_status = "��ҿϷ�<br><a href=\"javascript:\" onClick=\"viewCancel('$row->idx')\">[��ҳ�������]</a>";
					?>
					<?=$basket_status?>
					<?
					} else {
					?>
          <img src="../image/btn_cancel_s.gif" style="cursor:hand"  onClick="basketCancel('<?=$row->idx?>', '<?=$row->prdname?>')">
					<?
					}
					?>
          </td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
       	<tr bgcolor="#FFFFFF" id="ccontent_<?=$row->idx?>" style="display:none">
          <td colspan="10" style="padding:3px">
            <table border="0"width="100%" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="100" align="align" class="t_name">��һ���</td>
                <td class="t_value" colspan="5"><?=$row->reason?></td>
              </tr>
              <tr>
                <td width="100" align="align" class="t_name">�޸�</td>
                <td class="t_value" colspan="5"><?=$row->memo?></td>
              </tr>
							<?
							if(!empty($row->repay)) {
								if(!strcmp($row->repay, "R")) $repay = "������";
								if(!strcmp($row->repay, "C")) $repay = "������ü";
							
							?>
              <tr>
                <td width="100" align="align" class="t_name">ȯ�ҹ��</td>
                <td class="t_value" colspan="5"><?=$repay?></td>
              </tr>
							<?
							}
							if(!empty($row->bank)) {
							?>
              <tr>
                <td width="100" align="align" class="t_name">�����</td>
                <td class="t_value"><?=$row->bank?></td>
                <td width="100" align="align" class="t_name">���¹�ȣ</td>
                <td class="t_value"><?=$row->account?></td>
                <td width="100" align="align" class="t_name">������</td>
                <td class="t_value"><?=$row->acc_name?></td>
              </tr>
							<?
							}
							?>
            </table>
          </td>
        </tr>
        <?
        }
        // ȸ������
        if($order_info->discount_price > 0){
        	$discount_msg = " - ȸ������( <b><font color=#ED1C24>".number_format($order_info->discount_price)."��</font></b> )";
        }
        // ������ ���
				if($order_info->reserve_use > 0){
					$reserve_msg = " - ������ ���(<b><font color=#ED1C24>".number_format($order_info->reserve_use)."��</font></b>)";
				}

				// �������
				if($order_info->coupon_use > 0){
					$coupon_msg = " - ���� ���(<b><font color=#ED1C24>".number_format($order_info->coupon_use)."��</font></b>)";
				}
        ?>
      </table>

      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="38" id="cancel" style="display:none">
      <form name="cFrm" action="order_save.php" method="post" onSubmit="return cancelCheck(this)">
    	<input type="hidden" name="orderid" value="<?=$orderid?>">
    	<input type="hidden" name="orderstatus" value="<?=$order_info->status?>">
    	<input type="hidden" name="mode" value="cancel">
    	<input type="hidden" name="idx" value="">
    		<tr><td><br></td></tr>
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> ��ǰ���</td>
			  </tr>
        <tr>
        	<td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td class="t_name">��һ�ǰ</td>
                <td class="t_value" id="cPrd" colspan="5"></td>
              </tr>
              <tr>
                <td class="t_name">��һ���</td>
                <td class="t_value" colspan="5">
                	<select name="reason">
                		<option value="">:: ��һ����� �����ϼ��� ::</option>
                		<option value="������">������</option>
                		<option value="ǰ��">ǰ��</option>
                		<option value="�������">�������</option>
                		<option value="�����ֹ�">�����ֹ�</option>
                		<option value="�ý��ۿ���">�ý��ۿ���</option>
                		<option value="�������">�������</option>
                		<option value="�ù�н�">�ù�н�</option>
                		<option value="��ǰ�ҷ�">��ǰ�ҷ�</option>
                		<option value="��Ÿ">��Ÿ</option>
                	</select>

                </td>
              </tr>
              <tr>
                <td class="t_name">�޸�</td>
                <td class="t_value" colspan="5">
                	<textarea name="memo" class="input" style="width:100%;height:100px"></textarea>
                </td>
              </tr>
							<?
								if(strcmp($order_info->status, "OR") && strcmp($order_info->pay_metho, "PC")) {
							?>
              <tr>
                <td class="t_name">ȯ�ҹ��</td>
                <td class="t_value" colspan="5">
                	<input type="radio" name="repay" value="R"> ������
                	<input type="radio" name="repay" value="C"> ������ü
                </td>
              </tr>
              <tr>
                <td class="t_name">ȯ�Ұ���</td>
                <td class="t_value">
                	<select name="bank">
                		<option value="">:: �����ϼ��� :: </option>
                		<option value="�泲����">�泲���� </option>
                		<option value="��������">�������� </option>
                		<option value="��������">�������� </option>
                		<option value="�������">������� </option>
                		<option value="����">���� </option>
                		<option value="�뱸����">�뱸���� </option>
                		<option value="����ġ��ũ">����ġ��ũ </option>
                		<option value="�λ�����">�λ����� </option>
                		<option value="�������">������� </option>
                		<option value="��ȣ��������">��ȣ�������� </option>
                		<option value="�������ݰ�">�������ݰ� </option>
                		<option value="�����߾�ȸ">�����߾�ȸ </option>
                		<option value="�ſ���������">�ſ��������� </option>
                		<option value="��������">�������� </option>
                		<option value="��ȯ����">��ȯ���� </option>
                		<option value="�츮����">�츮���� </option>
                		<option value="��ü��">��ü�� </option>
                		<option value="��������">�������� </option>
                		<option value="��������">�������� </option>
                		<option value="�ϳ�����">�ϳ����� </option>
                		<option value="�ѱ���Ƽ����">�ѱ���Ƽ���� </option>
                		<option value="HSBC">HSBC </option>
                		<option value="SC��������">SC�������� </option>
                	</select>
                </td>
                <td class="t_name">���¹�ȣ</td>
                <td class="t_value">
                	<input type="text" name="account" class="input">
                </td>
                <td class="t_name">������</td>
                <td class="t_value">
                	<input type="text" name="acc_name" class="input">
                </td>
              </tr>
							<?
								}
							?>
            </table>
        	</td>
        </tr>
        <tr>
        	<td align="center" height="35">
        		<input type="image" src="../image/btn_confirm_s.gif"> &nbsp; 
        		<img src="../image/btn_cancel_s.gif" style="cursor:hand" onClick="resetCancel()">
        	</td>
        </tr>
      </form>
      </table>

      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="38">
        <tr><td height="10"></td></tr>
        <tr>
        	<td><b>��ۺ� : <?=$deliver_msg?></b></td>
          <td align="right">
          ��ǰ�հ�( <b><font color="#ED1C24"><?=number_format($order_info->prd_price)?>��</font></b> )
          <?=$discount_msg?>
           + ��ۺ�( <b><font color="#ED1C24"><?=number_format($order_info->deliver_price)?>��</font></b>)
           <?=$coupon_msg?><?=$reserve_msg?>

          =
          <b><font color="#000000">�� �����ݾ� :</font> <font color="#ED1C24"><?=number_format($order_info->total_price)?>��</font></b>
          </td>
        </tr>
        <tr><td height="10"></td></tr>
      </table>

      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form name="frm" action="order_save.php" method="post">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="update">
      <input type="hidden" name="page" value="<?=$page?>">
      <input type="hidden" name="orderid" value="<?=$orderid?>">
      
      <input type="hidden" name="total_price" value="<?=$order_info->total_price?>">
      <input type="hidden" name="prd_info" value="<?=$prd_info?>">

      <input type="hidden" name="s_status" value="<?=$s_status?>">
      <input type="hidden" name="prev_year" value="<?=$prev_year?>">
      <input type="hidden" name="prev_month" value="<?=$prev_month?>">
      <input type="hidden" name="prev_day" value="<?=$prev_day?>">
      <input type="hidden" name="next_year" value="<?=$next_year?>">
      <input type="hidden" name="next_month" value="<?=$next_month?>">
      <input type="hidden" name="next_day" value="<?=$next_day?>">
      <input type="hidden" name="searchopt" value="<?=$searchopt?>">
      <input type="hidden" name="searchkey" value="<?=$searchkey?>">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">�ֹ���ȣ</td>
                <td width="35%" class="t_value"><?=$orderid?></td>
                <td width="15%" class="t_name">�������</td>
                <td width="35%" class="t_value"><?=pay_method($order_info->pay_method)?></td>
              </tr>
              <tr>
                <td class="t_name">�ֹ�����</td>
                <td class="t_value"><?=$order_info->order_date?></td>
                <td class="t_name">����ũ�ο���</td>
                <td class="t_value"><?=$order_info->escrow_check?></td>
              </tr>
              <tr>
                <td class="t_name">��������</td>
                <td class="t_value"><?=$order_info->account?></td>
                <td class="t_name">�Ա���</td>
                <td class="t_value"><?=$order_info->account_name?></td>
              </tr>
              <tr>
                <td class="t_name">������ȣ</td>
                <td class="t_value"><input name="deliver_num" type="text" value="<?=$order_info->deliver_num?>" class="input"></td>
                <td class="t_name">�߼�����</td>
                <td class="t_value">
                	<input name="deliver_date" type="text" value="<?=$order_info->deliver_date?>" class="input">
				    			<b>�߼����� �Է�����(����Ͻú�)</b><br>
				    			��) <?=date('Y')?>�� <?=date('m')?>�� <?=date('d')?>�� <?=date('H')?>�� <?=date('i')?>�� =
				    			<?=date('Y').date('m').date('d').date('H').date('i')?>
                </td>
              </tr>
              <tr>
                <td class="t_name">ó������</td>
                <td class="t_value">
                	<? if(!strcmp($order_info->status, "OC") || !strcmp($order_info->status, "RC")) {	//�ֹ����,��ҿϷ��� ��� ���º��� �Ұ��� ?>
                	<b><font color="#ED1C24"><?=order_status($order_info->status);?></font></b>
                	<? } else { ?>
		                <select name="chg_status">
		                <option value="">----------</option>
										<?
										if($order_info->status == "" || $order_info->status == "OR"){
										?>
		                <option value="OR" <? if($order_info->status == "OR") echo "selected"; ?>>�ֹ�����</option>
		                <option value="OY" <? if($order_info->status == "OY") echo "selected"; ?>>�����Ϸ�</option>
										<?
										}else{
										?>
		                <option value="OY" <? if($order_info->status == "OY") echo "selected"; ?>>�����Ϸ�</option>
		                <option value="DR" <? if($order_info->status == "DR") echo "selected"; ?>>����غ���</option>
		                <option value="DI" <? if($order_info->status == "DI") echo "selected"; ?>>���ó��</option>
		                <option value="DC" <? if($order_info->status == "DC") echo "selected"; ?>>��ۿϷ�</option>
		                <option value="OC" <? if($order_info->status == "OC") echo "selected"; ?>>�ֹ����</option>
		                <option value="">----------</option>
		                <option value="RD" <? if($order_info->status == "RD") echo "selected"; ?>>��ҿ�û</option>
		                <option value="RC" <? if($order_info->status == "RC") echo "selected"; ?>>��ҿϷ�</option>
		                <option value="CD" <? if($order_info->status == "CD") echo "selected"; ?>>��ȯ��û</option>
		                <option value="CC" <? if($order_info->status == "CC") echo "selected"; ?>>��ȯ�Ϸ�</option>
		                <? } ?>
		                </select>
		              <? } ?>
                </td>
                <td class="t_name"></td>
                <td class="t_value"></td>
              </tr>
              <tr>
                <td class="t_name">ó���ð�</td>
                <td class="t_value" colspan="3">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr class="t_name">
                      <td width="25%" align="center" height="25">�ֹ�����</td>
                      <td width="25%" align="center">�����Ϸ�</td>
                      <td width="25%" align="center">��ۿϷ�</td>
                      <td width="25%" align="center">�ֹ����</td>
                    </tr>
                    <tr>
                      <td align="center" height="25"><? if($order_info->order_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->order_date; ?></td>
                      <td align="center"> <? if($order_info->pay_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->pay_date; ?> </td>
                      <td align="center"> <? if($order_info->send_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->send_date; ?> </td>
                      <td align="center"> <? if($order_info->cancel_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->cancel_date; ?> </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table></td>
        </tr>
      </table>
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���������</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">�ֹ��ڸ�</td>
                <td width="35%" class="t_value"><input name="send_name" type="text" value="<?=$order_info->send_name?>" class="input"></td>
                <td width="15%" class="t_name">�̸���</td>
                <td width="35%" class="t_value"><input name="send_email" type="text" value="<?=$order_info->send_email?>" class="input"> <a href="javascript:sendEmail('<?=$order_info->send_name?>','<?=$order_info->send_email?>')";><img src="../image/btn_send_s.gif" border="0" align="absmiddle"></a></td>
              </tr>
              <tr>
                <td class="t_name">��ȭ��ȣ</td>
                <td class="t_value"><input name="send_tphone" type="text" value="<?=$order_info->send_tphone?>" class="input"></td>
                <td class="t_name">�޴���</td>
                <td class="t_value"><input name="send_hphone" type="text" value="<?=$order_info->send_hphone?>" class="input"> <a href="javascript:sendSms('<?=$order_info->send_name?>','<?=$order_info->send_hphone?>')";><img src="../image/btn_send_s.gif" border="0" align="absmiddle"></a></td>
              </tr>
              <tr>
                <td class="t_name">�����ȣ</td>
                <td class="t_value" colspan="3">
                  <? list($post, $post2) = explode("-",$order_info->send_post); ?>
                  <input name="send_post" type="text" value="<?=$post?>" size="5" class="input"> -
                  <input name="send_post2" type="text" value="<?=$post2?>" size="5" class="input">
                  <img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip();">
                </td>
              </tr>
              <tr>
                <td class="t_name">�ּ�</td>
                <td class="t_value" colspan="3"><input name="send_address" type="text" value="<?=$order_info->send_address?>" size="60" class="input"></td>
              </tr>
            </table></td>
        </tr>
      </table>
      
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> ����������</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td class="t_name">�����θ�</td>
                <td class="t_value" colspan="3"><input name="rece_name" type="text" value="<?=$order_info->rece_name?>" class="input"></td>
              </tr>
              <tr>
                <td width="15%" class="t_name">��ȭ��ȣ</td>
                <td width="35%" class="t_value"><input name="rece_tphone" type="text" value="<?=$order_info->rece_tphone?>" class="input"></td>
                <td width="15%" class="t_name">�޴���</td>
                <td width="35%" class="t_value"><input name="rece_hphone" type="text" value="<?=$order_info->rece_hphone?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">�����ȣ</td>
                <td class="t_value" colspan="3">
                  <? list($post, $post2) = explode("-",$order_info->rece_post); ?>
                  <input name="rece_post" type="text" value="<?=$post?>" size="5" class="input"> -
                  <input name="rece_post2" type="text" value="<?=$post2?>" size="5" class="input">
                  <img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip2();">
                </td>
              </tr>
              <tr>
                <td class="t_name">�ּ�</td>
                <td class="t_value" colspan="3"><input name="rece_address" type="text" value="<?=$order_info->rece_address?>" size="60" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">��û����</td>
                <td class="t_value" colspan="3"><textarea name="demand" rows="6" cols="60" class="textarea" style="width:100%"><?=$order_info->demand?></textarea></td>
              </tr>
              <tr>
                <td class="t_name">�ֹ���� ����</td>
                <td class="t_value" colspan="3"><textarea name="cancelmsg" rows="6" cols="60" class="textarea" style="width:100%"><?=$order_info->cancelmsg?></textarea></td>
              </tr>
              <tr>
                <td class="t_name">�����ڸ޸�</td>
                <td class="t_value" colspan="3"><textarea name="descript" rows="6" cols="60" class="textarea" style="width:100%"><?=$order_info->descript?></textarea></td>
              </tr>
            </table></td>
        </tr>
      </table>

			<?
			if(!strcmp($oper_info->tax_use, "Y")) {
				$sql = "select * from wiz_tax where orderid = '$orderid'";
				$result = mysql_query($sql) or error(mysql_error());
				$tax_info = mysql_fetch_array($result);
			?>
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���ݰ�꼭 ����</td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">�߱޿���</td>
                <td width="85%" class="t_value" colspan="3">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                		<tr>
                			<td>
											  <input type="radio" name="tax_type" value="N" onClick="qclick('');" <? if(!strcmp($order_info->tax_type, "N") || empty($order_iinfo->tax_type)) echo "checked" ?>>������� 
											  <input type="radio" name="tax_type" value="T" onClick="qclick('01');" <? if(!strcmp($order_info->tax_type, "T")) echo "checked" ?>>���ݰ�꼭 ��û 
											  <font color="red" onClick="printTax('<?=$orderid?>')" style="cursor:pointer">[���]</font>
											</td>
										</tr>
										<tr>
											<td height="5"></td>
										</tr>
										<tr>
											<td>
						  		
									  		<table id="tax01" style="display:<? if(!strcmp($order_info->tax_type, "T")) echo "block"; else echo "none"; ?>" bgcolor="C8C8C8" width="500" border="0" cellspacing="1" cellpadding="2">
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; ���ο���</td>
									  				<td colspan="3" bgcolor="#FFFFFF">
									  					<input type="hidden" name="tmp_tax_pub" value="<?=$tax_info[tax_pub]?>">
														  <input type="radio" name="tax_pub" value="Y" <? if(!strcmp($tax_info[tax_pub], "Y")) echo "checked" ?>> ���� 
														  <input type="radio" name="tax_pub" value="N" <? if(!strcmp($tax_info[tax_pub], "N") || empty($tax_info[tax_pub])) echo "checked" ?>> �̽���
									  				</td>
									  			</tr>
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; ����� ��ȣ</td><td colspan="3" bgcolor="#FFFFFF"><input type="text" name="com_num" value="<?=$tax_info[com_num]?>" class="input" size="20"></td>
									  			</tr>
									  			<tr>
									  				<td width="20%" bgcolor="#F9F9F9">&nbsp; �� ȣ</td><td width="30%" bgcolor="#FFFFFF"><input type="text" name="com_name" value="<?=$tax_info[com_name]?>" class="input"></td>
									  				<td width="20%" bgcolor="#F9F9F9">&nbsp; ��ǥ��</td><td width="30%" bgcolor="#FFFFFF"><input type="text" name="com_owner" value="<?=$tax_info[com_owner]?>" class="input"></td>
									  			</tr>
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; ����� ������</td><td colspan="3" bgcolor="#FFFFFF"><input type="text" name="com_address" value="<?=$tax_info[com_address]?>" class="input" size="50"></td>
									  			</tr>
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; �� ��</td><td bgcolor="#FFFFFF"><input type="text" name="com_kind" value="<?=$tax_info[com_kind]?>" class="input"></td>
									  				<td bgcolor="#F9F9F9">&nbsp; �� ��</td><td bgcolor="#FFFFFF"><input type="text" name="com_class" value="<?=$tax_info[com_class]?>" class="input"></td>
									  			</tr>
									  			<tr>
									  				<td bgcolor="#F9F9F9">&nbsp; ��ȭ��ȣ</td><td bgcolor="#FFFFFF"><input type="text" name="com_tel" value="<?=$tax_info[com_tel]?>" class="input"></td>
									  				<td bgcolor="#F9F9F9">&nbsp; �̸���</td><td bgcolor="#FFFFFF"><input type="text" name="com_email" value="<?=$tax_info[com_email]?>" class="input"></td>
									  			</tr>
									  		</table>
									  		
									  	</td>
									  </tr>
									</table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
		<? } ?>
		
		<? if(!strcmp($oper_info->pay_agent, "KCP") && strcmp($order_info->paymethod, "PC")) { ?>
      <br>
      <table border="0" cellspacing="0" cellpadding="2">
		  <tr>
		    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���ݿ����� ����</td>
		    <td valign="bottom" class="tit_alt">KCP ���������� ��ϵ� ���ݿ����� ������ �Է��ϼ���.</td>
		  </tr>
		</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">�߱޿���</td>
                <td width="35%" class="t_value">
                	<input type="text" name="id_info" value="<?=$order_info->id_info?>" class="input">
                </td>
                <td width="15%" class="t_name">����û ���ο���</td>
                <td width="35%" class="t_value">
                	<input type="radio" name="bill_yn" value="Y" <? if(!strcmp($order_info->bill_yn, "Y")) { ?> checked <? } ?>> ����
                	<input type="radio" name="bill_yn" value="N" <? if(!strcmp($order_info->bill_yn, "N")) { ?> checked <? } ?>> �̽���
                </td>
              </tr>
              <tr>
                <td width="15%" class="t_name">���ι�ȣ</td>
                <td width="85%" class="t_value" colspan="3">
                	<input type="text" name="authno" value="<?=$order_info->authno?>" class="input">
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
		<? } ?>

      <br>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="33%"></td>
          <td width="33%" align="center">
            <input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
            <img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='order_list.php?<?=$param?>'">
          </td>
          <td width="33%" align="right"><img src="../image/btn_print_l.gif" style="cursor:hand" onClick="orderPrint()"></td>
        </tr>
      </form>
      </table>

<? include "../footer.php"; ?>