<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "s_status=$s_status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" type="text/javascript">
<!--

// �ֹ����� ����
function chgStatus(s_status){
   document.frm.s_status.value = s_status;
   document.frm.submit();
}

//üũ�ڽ����� ����
function onSelect(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectEmpty();
	}
}

//üũ�ڽ� ��ü����
function selectAll(){

	var i;

	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = true;
			}
		}
	}
	return;
}

//üũ�ڽ� ��������
function selectEmpty(){

	var i;

	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//���û�ǰ ����
function orderDelete(){

	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value + "|";
				}
			}
	}
	
	if(selorder == ""){
		alert("������ �ֹ��� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ �ֹ��� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "order_save.php?mode=delete&selorder=" + selorder;
		}else{
			return;
		}
	}
	return;

}

// ���� �ֹ��� ��� 
function orderPrint() {
		
	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value + "|";
				}
			}
	}
	
	if(selorder == ""){
		alert("����� �ֹ��� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		document.order_print.location = "order_print.php?selorder=" + selorder;
	}
	return;

}

// �����ֹ� ���º���
function batchStatus(){
	
	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value + ":" + document.forms[i].status.value + "|";
				}
			}
	}
	
	if(selorder == ""){
		alert("������ �ֹ��� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		var url = "order_status.php?selorder=" + selorder;
		window.open(url,"batchStatus","height=250, width=250, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
	return;

}

// �ֹ����� �����ٿ�
function excelDown(){
	var url = "order_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=300, width=570, menubar=no, scrollbars=no, resizable=yes, toolbar=no, status=no, top=100, left=100");
}

// �Ⱓ����
function setPeriod(pdate){

	var plist = pdate.split("-");
	
	prev_year = document.frm.prev_year;
	for(ii=0; ii<prev_year.length; ii++){
	   if(prev_year.options[ii].value == plist[0])
	      prev_year.options[ii].selected = true;
	}
	prev_month = document.frm.prev_month;
	for(ii=0; ii<prev_month.length; ii++){
	   if(prev_month.options[ii].value == plist[1])
	      prev_month.options[ii].selected = true;
	}
	prev_day = document.frm.prev_day;
	for(ii=0; ii<prev_day.length; ii++){
	   if(prev_day.options[ii].value == plist[2])
	      prev_day.options[ii].selected = true;
	}
	
	document.frm.submit();
}
//-->
</script>

<script language="javascript">
<!--
function searchZip(){
document.frm.com_address.focus();
var url = "../member/search_zip.php?kind=com_";
window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">�ֹ����</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">�ֹ��˻� ��� �Դϴ�.</td>
			  </tr>
			</table>

			<br>
			<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
			<form name="frm" action="<?=$PHP_SELF?>" method="get">
			<input type="hidden" name="page" value="">
			<input type="hidden" name="s_status" value="">
			 <tr>
			   <td width="15%" class="t_name">&nbsp; �������</td>
			   <td width="85%" class="t_value">
			
			     <table>
			     <tr><td>
			     <input type="button" onClick="chgStatus('');" value=" ��ü " <? if($s_status == "") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('OR');" value="�ֹ�����" <? if($s_status == "OR") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('OY');" value="�����Ϸ�" <? if($s_status == "OY") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('DR');" value="����غ���" <? if($s_status == "DR") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('DI');" value="���ó��" <? if($s_status == "DI") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('DC');" value="��ۿϷ�" <? if($s_status == "DC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>&nbsp;
			     <input type="button" onClick="chgStatus('OC');" value="�ֹ����" <? if($s_status == "OC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('MI');" value="���ֹ�" <? if($s_status == "MI") echo "class=btn_sm"; else echo "class=btn_m"; ?>><br>
			     </td></tr>
			     <tr><td>
			     <input type="button" onClick="chgStatus('RD');" value="��ҿ�û" <? if($s_status == "RD") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('RC');" value="��ҿϷ�" <? if($s_status == "RC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('CD');" value="��ȯ��û" <? if($s_status == "CD") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('CC');" value="��ȯ�Ϸ�" <? if($s_status == "CC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     </td></tr>
			     </table>
			
			   </td>
			 </tr>
			 <tr>
			   <td class="t_name">&nbsp; �Ⱓ</td>
			   <td class="t_value">
			
			     <select name="prev_year" class="select2">
			    	<?
			       if(empty($next_year)) $next_year = date("Y");
			       if(empty($next_month)) $next_month = date("m");
			       if(empty($next_day)) $next_day = date("d");
			
			       for($ii=2004; $ii <= 2020; $ii++){
			         if($ii == $prev_year) echo "<option value=$ii selected>$ii";
			         else echo "<option value=$ii>$ii";
			       }
			    	?>
			      </select>
			      ��
			      <select name="prev_month" class="select2">
			        <?
			       for($ii=1; $ii <= 12; $ii++){
			         if($ii<10) $ii = "0".$ii;
			         if($ii == $prev_month) echo "<option value=$ii selected>$ii";
			         else echo "<option value=$ii>$ii";
			       }
			    	?>
			      </select>
			      ��
			      <select name="prev_day" class="select2">
			        <?
			       for($ii=1; $ii <= 31; $ii++){
			         if($ii<10) $ii = "0".$ii;
			         if($ii == $prev_day) echo "<option value=$ii selected>$ii";
			         else echo "<option value=$ii>$ii";
			       }
			    	?>
			      </select>
			      �� ~
			      <select name="next_year" class="select2">
			        <?
			       for($ii=2004; $ii <= 2020; $ii++){
			         if($ii == $next_year) echo "<option value=$ii selected>$ii";
			         else echo "<option value=$ii>$ii";
			       }
			    	?>
			      </select>
			      ��
			      <select name="next_month" class="select2">
			        <?
			       for($ii=1; $ii <= 12; $ii++){
			         if($ii<10) $ii = "0".$ii;
			         if($ii == $next_month) echo "<option value=$ii selected>$ii";
			         else echo "<option value=$ii>$ii";
			       }
			    	?>
			      </select>
			      ��
			      <select name="next_day" class="select2">
			        <?
			       for($ii=1; $ii <= 31; $ii++){
			         if($ii<10) $ii = "0".$ii;
			         if($ii == $next_day) echo "<option value=$ii selected>$ii";
			         else echo "<option value=$ii>$ii";
			       }
			    	?>
			      </select>
			      �� &nbsp;
				    <?
				    $yes_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*1));
				    $to_day = date('Y-m-d');
				    $week_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*7));
				    $month_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*30));
				    ?>
			      <a href="javascript:setPeriod('<?=$to_day?>')"><font color=red>[����]</font></a>
			      <a href="javascript:setPeriod('<?=$yes_day?>')"><font color=red>[����]</font></a>
			      <a href="javascript:setPeriod('<?=$week_day?>')"><font color=red>[1����]</font></a>
			      <a href="javascript:setPeriod('<?=$month_day?>')"><font color=red>[1����]</font></a>
			   </td>
			 </tr>
			 <tr>
			   <td class="t_name">&nbsp; ���ǰ˻�</td>
			   <td class="t_value">
			       <select name="searchopt" class="select2">
			       <option value="send_name" <? if($searchopt == "send_name") echo "selected"; ?>>�ֹ��ڸ�
			       <option value="rece_name" <? if($searchopt == "rece_name") echo "selected"; ?>>�����θ�
			       <option value="orderid" <? if($searchopt == "orderid") echo "selected"; ?>>�ֹ���ȣ
			       <option value="send_id" <? if($searchopt == "send_id") echo "selected"; ?>>���̵�
			       <option value="send_hphone" <? if($searchopt == "send_hphone") echo "selected"; ?>>�޴���
			       <option value="rece_tphone" <? if($searchopt == "rece_tphone") echo "selected"; ?>>��ȭ��ȣ
			       <option value="send_email" <? if($searchopt == "send_email") echo "selected"; ?>>�̸���
			       <option value="account_name" <? if($searchopt == "account_name") echo "selected"; ?>>�Ա��ڸ�
			       </select>
			       <input type="text" name="searchkey" value="<?=$searchkey?>" class="input">
			       <input type="image" src="../image/btn_search.gif" align="absmiddle">
			   </td>
			 </tr>
			</form>
			</table>

      <br>
			<?
			$sql = "select orderid from wiz_order where status != ''";
			$result = mysql_query($sql) or error(mysql_error());
			$all_total = mysql_num_rows($result);
			
			if($prev_year){
			   $prev_period = $prev_year."-".$prev_month."-".$prev_day;
			   $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
			   $period_sql = " and wo.order_date >= '$prev_period' and wo.order_date <= '$next_period'";
			}
			if($s_status == "") $status_sql = "and wo.status != ''";
			else if($s_status == "MI") $status_sql = "and wo.status = ''";
			else $status_sql = "and wo.status = '$s_status'";
			
			if($searchopt && $searchkey) $searchopt_sql = " and wo.$searchopt like '%$searchkey%'";
			
			$sql = "select orderid from wiz_order wo where orderid !='' $status_sql $period_sql $searchopt_sql order by orderid desc";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			
			$rows = 20;
			$lists = 5;
			$page_count = ceil($total/$rows);
			if($page < 1 || $page > $page_count) $page = 1;
			$start = ($page-1)*$rows;
			$no = $total-$start;
			?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>�� �ֹ��� : <b><?=$all_total?></b> &nbsp; �˻� �ֹ��� : <b><?=$total?></b></td>
          <td align="right">
	       		&nbsp; <font color="6DCFF6">��</font> �����Ϸ�
	       		&nbsp; <font color="BD8CBF">��</font> �ֹ��Ϸ�
	       		&nbsp; <font color="ED1C24">��</font> �ֹ���� &nbsp;
	       		<img src="../image/btn_excel.gif" style="cursor:hand" onClick="excelDown();">
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form>
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="5%"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
          <th width="12%">�ֹ���</th>
          <th width="15%">�ֹ���ȣ</th>
          <th width="18%">�ֹ��ڸ�</th>
          <th width="13%">�ֹ����</th>
          <th width="12%" align="right">�ֹ��ݾ�</th>
          <th width="12%">�ֹ�����</th>
          <th width="13%">���</th>
        </tr>
        <tr><td class="t_rd" colspan="20"></td></tr>
      </form>
			<?
			$orderid = "";
	
	    $sql = "select order_date, orderid, send_name, send_id, pay_method, total_price, status, deliver_num, deliver_date, escrow_check from wiz_order wo where orderid !='' $status_sql $period_sql $searchopt_sql order by orderid desc limit $start, $rows";
	    $result = mysql_query($sql) or error(mysql_error());
	
			while(($row = mysql_fetch_object($result)) && $rows){
	
				if($orderid == $row->orderid) continue;
				else $orderid = $row->orderid; $ordernum = 0;
	
				if($row->status == "OY") $stacolor = "6DCFF6";
				else if($row->status == "DC" || $row->status == "CC") $stacolor = "BD8CBF";
				else if($row->status == "OC" || $row->status == "RC" || $row->status == "RD") $stacolor = "ED1C24";
				else $stacolor = "";
				
				if(!strcmp($row->escrow_check, "Y")) $escrow_check = "<br>[����ũ��]";
				else  $escrow_check = "";
	
			?>
     	<form action="order_save.php" name="<?=$row->prdcode?>" method="get">
      <input type="hidden" name="mode" value="chgstatus">
      <input type="hidden" name="page" value="<?=$page?>">
      <input type="hidden" name="orderid" value="<?=$row->orderid?>">

      <input type="hidden" name="status" value="<?=$row->status?>">
      
      <input type="hidden" name="s_status" value="<?=$s_status?>">
      <input type="hidden" name="prev_year" value="<?=$prev_year?>">
      <input type="hidden" name="prev_month" value="<?=$prev_month?>">
      <input type="hidden" name="prev_day" value="<?=$prev_day?>">
      <input type="hidden" name="next_year" value="<?=$next_year?>">
      <input type="hidden" name="next_month" value="<?=$next_month?>">
      <input type="hidden" name="next_day" value="<?=$next_day?>">
      <input type="hidden" name="searchopt" value="<?=$searchopt?>">
      <input type="hidden" name="searchkey" value="<?=$searchkey?>">
      <tr><td height="4"></td></tr>
      <tr>
        <td align="center"><input type="checkbox" name="select_checkbox"></td>
        <td align="center"><?=substr($row->order_date,0,16)?></td>
        <td align="center"><a href="order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>"><?=$row->orderid?></a> <?=$escrow_check?></td>
        <td align="center">
        <?
        if($row->send_id == "") echo "$row->send_name [��ȸ��]";
        else echo "<a href='../member/member_info.php?mode=update&id=$row->send_id'>$row->send_name [$row->send_id]</a>";
        ?>
        </td>
        <td align="center"><?=pay_method($row->pay_method)?></td>
        <td align="right"><?=number_format($row->total_price)?>�� &nbsp; &nbsp;</td>
        <td align="center">
          <table cellpadding="2" width="100%">
          	<tr>
          		<td bgcolor="<?=$stacolor?>" align="center">
        				<select name="chg_status" style="width:90"> 
			          <? if(!strcmp($row->status, "OC")) {	//�ֹ����,��ҿϷ��� ��� ���º��� �Ұ��� ?>
				          <option value="OC" <? if($row->status == "OC") echo "selected"; ?>>�ֹ����</option>
								<? } else if(!strcmp($row->status, "RC")) { ?>
				          <option value="RC" <? if($row->status == "RC") echo "selected"; ?>>��ҿϷ�</option>
								<? } else { ?>
			          <? 		if($row->status == "OR"){ ?>
				          <option>---------</option>
				          <option value="OR" <? if($row->status == "OR") echo "selected"; ?>>�ֹ�����</option>
				          <option value="OY" <? if($row->status == "OY") echo "selected"; ?>>�����Ϸ�</option>
			 					<? 		}else{ ?>
				          <option>---------</option>
				          <option value="OY" <? if($row->status == "OY") echo "selected"; ?>>�����Ϸ�</option>
				          <option value="DR" <? if($row->status == "DR") echo "selected"; ?>>����غ���</option>
				          <option value="DI" <? if($row->status == "DI") echo "selected"; ?>>���ó��</option>
				          <option value="DC" <? if($row->status == "DC") echo "selected"; ?>>��ۿϷ�</option>
				          <option value="OC" <? if($row->status == "OC") echo "selected"; ?>>�ֹ����</option>
				          <option>---------</option>
				          <option value="RD" <? if($row->status == "RD") echo "selected"; ?>>��ҿ�û</option>
				          <option value="RC" <? if($row->status == "RC") echo "selected"; ?>>��ҿϷ�</option>
				          <option value="CD" <? if($row->status == "CD") echo "selected"; ?>>��ȯ��û</option>
									<option value="CC" <? if($row->status == "CC") echo "selected"; ?>>��ȯ�Ϸ�</option>
			          <? 		} ?>   
			         	<? } ?>      	
        				</select>
        			</td>
        			<td><input type="image" src="../image/btn_apply_s.gif"></td>
        		</tr>
        	</table>
        </td>
        <td align="center">
        	<img src="../image/btn_dview_s.gif" style="cursor:hand"  onClick="document.location='order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>'">
        </td>
      </tr>
      <tr><td colspan="20" class="t_line"></td></tr>
      </form>
			<?
				$no--;
				$rows--;
			}
			if($total <= 0){
			?>
			<tr><td height=30 colspan=9 align=center>��ϵ� �ֹ��� �����ϴ�.</td></tr>
			<tr><td colspan="20" class="t_line"></td></tr>
			<?
			}
			?>
			</table>

			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr><td height="5"></td></tr>
				<tr>
				 <td width="33%">
				   <img src="../image/btn_seldel.gif" style="cursor:hand" onClick="orderDelete();">
				   <img src="../image/btn_statuschg.gif" style="cursor:hand" onClick="batchStatus();">
				   <img src="../image/btn_orderprint.gif" style="cursor:hand" onClick="orderPrint();">
				 </td>
				 <td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
				 <td width="33%"></td>
				</tr>
			</table>
         
			<br><br><br>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="9d9d9d">
        <tr>
          <td width="5" height="5"><img src="../image/check_left_top.gif"></td>
          <td width="100%"></td>
          <td width="5" height="5"><img src="../image/check_right_top.gif"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td><img src="../image/check_tit.gif" width="75" height="19" /></td>
            </tr>
            <tr>
              <td class="chk_alt">
              <b><font color="#000000">����ũ�� �ֹ� ó�� ���ǻ���</font></b><br>
              - ����ũ�� �ֹ��ΰ�� �ݵ�� �������(�ù��,�����ȣ,�߼�����)�� �����ý��� ȸ�翡 ����ؾ��մϴ�.<br>
              - �� �ֹ� ��Ͽ��� �ֹ���ȣ �ؿ� [����ũ��] ǥ�ð� ���ִٸ� �ݵ�� ��ϵǾ���մϴ�.<br>
              - [����ũ��]�� ǥ�õȰ��� ��������� > ����ũ�� ��������� ������ ���¿��� ���� 10���� �̻� �ֹ��� ������ü, ������¸� �̿��ؼ� �ֹ��Ѱ���Դϴ�.<br>
        			- ����ũ�� �ֹ��� ��� ���� ������ �Ϸ�Ǿ� �����ý��� ȸ���� ���°� ������ ���Ŀ� ��������� �����ý��� ȸ��� ��ϵ˴ϴ�.<br><br>
        			              
              <b><font color="#000000">������� ��Ϲ��</font></b><br>
              1. �ֹ��󼼺��⿡�� ������ȣ�� �Է� �� ó�����¸� "���ó��", "��ۿϷ�" �� �����Ѱ�� �����ý��� ȸ�翡 ��������� ��ϵ˴ϴ�.<br>
              2. �����ϰ����濡�� ���¸� "���ó��", "��ۿϷ�" �� �����ϴ°�� ������ȣ �߼����ڸ� �Է��ϴ� ȭ���� �����˴ϴ�.<br>
              &nbsp; &nbsp;����� ��ȣ,�߼����ڸ� �Է��� �����ϸ� ��������� �����ý��� ȸ��� ��ϵ˴ϴ�.<br>
              </td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
          <td></td>
          <td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
        </tr>
      </table>

			<iframe SRC="" width="0" height="0" frameborder="0" border="0" scrolling="no" marginheight="0" marginwidth="0"  name="order_print"></iframe>

<? include "../footer.php"; ?>