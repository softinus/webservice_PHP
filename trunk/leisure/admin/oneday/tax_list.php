<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "status=$status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------
?>
<script language="JavaScript" type="text/javascript">
<!--

// �ֹ����� ����
function chgStatus(status){
   document.frm.status.value = status;
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
function taxDelete(){

var i;
var selvalue = "";
for(i=0;i<document.forms.length;i++){
	if(document.forms[i].orderid != null){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].select_checkbox.checked)
				selvalue = selvalue + document.forms[i].orderid.value + "|";
			}
		}
}

if(selvalue == ""){
	alert("������ ���ݰ�꼭�� �������� �ʾҽ��ϴ�.");
	return;
}else{
	if(confirm("������ ���ݰ�꼭�� ���� �����Ͻðڽ��ϱ�?")){
		document.location = "order_save.php?mode=tax_delete&selvalue=" + selvalue;
	}else{
		return;
	}
}
return;

}

// �����ֹ� ���º���
function batchStatus(){

var i;
var selvalue = "";
for(i=0;i<document.forms.length;i++){
	if(document.forms[i].orderid != null){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].select_checkbox.checked)
				selvalue = selvalue + document.forms[i].orderid.value + "|";
			}
		}
}

if(selvalue == ""){
	alert("������ ���ݰ�꼭�� �������� �ʾҽ��ϴ�.");
	return;
}else{
	var url = "tax_status.php?selvalue=" + selvalue;
	window.open(url,"taxStatus","height=130, width=200, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}
return;

}

// ���ݰ�꼭 �����ٿ�
function excelDown(){
	
	document.location = "tax_excel.php?<?=$param?>";

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

var clickvalue='';
function viewTax( orderid ) {

	ccontent =eval("ccontent_"+orderid+".style");

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
			    <td valign="bottom" class="tit">���ݰ�꼭���</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">���ݰ�꼭 ��� �Դϴ�.</td>
			  </tr>
			</table>

			<br>
			<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
			<form name="frm" action="<?=$PHP_SELF?>" method="get">
			<input type="hidden" name="page" value="">
			<input type="hidden" name="status" value="<?=$status?>">
			 <tr>
			   <td width="15%" class="t_name">&nbsp; �������</td>
			   <td width="85%" class="t_value">
			
			     <table>
			     <tr><td>
			     <input type="button" onClick="chgStatus('');" value=" ��ü " <? if($status == "") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('Y');" value=" ���� " <? if($status == "Y") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
			     <input type="button" onClick="chgStatus('N');" value="�̽���" <? if($status == "N") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
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
			       <option value="orderid" <? if($searchopt == "orderid") echo "selected"; ?>>�ֹ���ȣ
			       <option value="com_name" <? if($searchopt == "com_name") echo "selected"; ?>>��ȣ
			       <option value="com_owner" <? if($searchopt == "com_owner") echo "selected"; ?>>��ǥ��
			       <option value="com_address" <? if($searchopt == "com_address") echo "selected"; ?>>����������
			       <option value="com_num" <? if($searchopt == "com_num") echo "selected"; ?>>����ڵ�Ϲ�ȣ
			       <option value="com_kind" <? if($searchopt == "com_kind") echo "selected"; ?>>����
			       <option value="com_class" <? if($searchopt == "com_class") echo "selected"; ?>>����
			       <option value="com_tel" <? if($searchopt == "com_tel") echo "selected"; ?>>��ȭ��ȣ
			       <option value="com_email" <? if($searchopt == "com_email") echo "selected"; ?>>�̸���
			       </select>
			       <input type="text" name="searchkey" value="<?=$searchkey?>" class="input">
			       <input type="image" src="../image/btn_search.gif" align="absmiddle">
			   </td>
			 </tr>
			</form>
			</table>

      <br>
      <?
    	$sql = "select orderid from wiz_tax where tax_date != ''";
    	$result = mysql_query($sql) or error(mysql_error());
      $all_total = mysql_num_rows($result);

      if($prev_year){
         $prev_period = $prev_year."-".$prev_month."-".$prev_day;
         $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
         $period_sql = " and tax_date >= '$prev_period' and tax_date <= '$next_period'";
      }
      if($status == "") $status_sql = "and tax_pub != ''";
      else $status_sql = "and tax_pub = '$status'";

      if($searchopt && $searchkey) $searchopt_sql = " and $searchopt like '%$searchkey%'";

      $sql = "select * from wiz_tax where tax_date != '' $status_sql $period_sql $searchopt_sql order by tax_date desc";
      $result = mysql_query($sql) or error(mysql_error());
      $total = mysql_num_rows($result);

      $rows = 20;
      $lists = 5;
     	$page_count = ceil($total/$rows);
     	if($page < 1 || $page > $page_count) $page = 1;
     	$start = ($page-1)*$rows;
     	$no = $total-$start;
     	if($start>1) mysql_data_seek($result,$start);
      ?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>�� ���ݰ�꼭�� : <b><?=$all_total?></b> &nbsp; �˻� ���ݰ�꼭�� : <b><?=$total?></b></td>
          <td align="right">
	       	&nbsp; <font color="6DCFF6">��</font> ����
	       	&nbsp; <font color="ED1C24">��</font> �̽��� 
	       	<img src="../image/btn_excel.gif" style="cursor:hand" onClick="excelDown();">
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<form>
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="3%"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
          <th width="10%">�ֹ���ȣ</th>
          <th>ǰ ��</th>
          <th width="8%">�߱���</th>
          <th width="8%">������</th>
          <th width="8%">���ް���</th>
          <th width="8%">����</th>
          <th width="15%">ó������</th>
          <th width="10%">���</th>
        </tr>
        <tr><td class="t_rd" colspan="20"></td></tr>
      	</form>
				<?
				while(($row = mysql_fetch_object($result)) && $rows){
		
					if($row->tax_pub == "Y") $stacolor = "6DCFF6";
					else if($row->tax_pub == "N") $stacolor = "ED1C24";
					else $stacolor = "";
					
					$prd_name = "";
		
					$prd_info = explode("^^", $row->prd_info);
					$no = 0;
					for($ii = 0; $ii < count($prd_info); $ii++) {
					
						if(!empty($prd_info[$ii])) {
							$tmp_prd = explode("^", $prd_info[$ii]);
							if($ii < 1) $prd_name = cut_str($tmp_prd[0], 25);
							$no++;
						}
					}
					
					if($no > 1) {
						$prd_name .= " �� ".($no-1)."��";
					}
		
				?>
	     	<form action="order_save.php" name="<?=$row->orderid?>" method="get">
        <input type="hidden" name="mode" value="tax_status">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="orderid" value="<?=$row->orderid?>">
        <input type="hidden" name="tmp_tax_pub" value="<?=$row->tax_pub?>">

        <input type="hidden" name="status" value="<?=$status?>">
        <input type="hidden" name="prev_year" value="<?=$prev_year?>">
        <input type="hidden" name="prev_month" value="<?=$prev_month?>">
        <input type="hidden" name="prev_day" value="<?=$prev_day?>">
        <input type="hidden" name="next_year" value="<?=$next_year?>">
        <input type="hidden" name="next_month" value="<?=$next_month?>">
        <input type="hidden" name="next_day" value="<?=$next_day?>">
        <input type="hidden" name="searchopt" value="<?=$searchopt?>">
        <input type="hidden" name="searchkey" value="<?=$searchkey?>">
        <tr>
          <td align="center" height="27"><input type="checkbox" name="select_checkbox"></td>
          <td align="center"><a href="order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>"><?=$row->orderid?></a></td>
          <td align="center"> <?= $prd_name ?> </td>
          <td align="center"><?=$row->tax_date?></td>
          <td align="center"><?=$row->wdate?></td>
          <td align="center"><?=number_format($row->supp_price)?>��</td>
          <td align="center"><?=number_format($row->tax_price)?>��</td>
          <td align="center">
	          <table cellpadding="2">
	          	<tr>
	          		<td bgcolor=<?=$stacolor?>>
			          <select name="tax_pub" style="width:90">
			          <option value="N" <? if($row->tax_pub == "N") echo "selected"; ?>>�̽���</option>
			          <option value="Y" <? if($row->tax_pub == "Y") echo "selected"; ?>>����</option>
			          </select>
	          		</td>
	          		<td><input type="image" src="../image/btn_apply_s.gif"></td>
	          	</tr>
	          </table>
	        </td>
	        <td align="center">
	        	<img src="../image/btn_view_s.gif" style="cursor:hand" align="absmiddle" onClick="viewTax('<?=$row->orderid?>')">
	        	<img src="../image/btn_print_s.gif" style="cursor:hand" align="absmiddle" onClick="printTax('<?=$row->orderid?>')">
          </td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
       	<tr bgcolor="#FFFFFF" id="ccontent_<?=$row->orderid?>" style="display:none">
          <td height="30" colspan="10" style="padding:3px">
			  		<table bgcolor="C8C8C8" width="100%" border="0" cellspacing="1" cellpadding="2">
			  			<tr>
			  				<td width="15%" height="25" bgcolor="#F9F9F9">&nbsp; ����� ��ȣ</td><td width="35%" bgcolor="#FFFFFF"><?=$row->com_num?></td>
			  				<td width="15%" bgcolor="#F9F9F9">&nbsp; �� ȣ</td><td bgcolor="#FFFFFF"><?=$row->com_name?></td>
			  			</tr>
			  			<tr>
			  				<td height="25" bgcolor="#F9F9F9">&nbsp; ��ǥ��</td><td width="30%" bgcolor="#FFFFFF"><?=$row->com_owner?></td>
			  				<td bgcolor="#F9F9F9">&nbsp; ����� ������</td><td bgcolor="#FFFFFF"><?=$row->com_address?></td>
			  			</tr>
			  			<tr>
			  				<td height="25" bgcolor="#F9F9F9">&nbsp; �� ��</td><td bgcolor="#FFFFFF"><?=$row->com_kind?></td>
			  				<td bgcolor="#F9F9F9">&nbsp; �� ��</td><td bgcolor="#FFFFFF"><?=$row->com_class?></td>
			  			</tr>
			  			<tr>
			  				<td height="25" bgcolor="#F9F9F9">&nbsp; ��ȭ��ȣ</td><td bgcolor="#FFFFFF"><?=$row->com_tel?></td>
			  				<td bgcolor="#F9F9F9">&nbsp; �̸���</td><td bgcolor="#FFFFFF"><?=$row->com_email?></td>
			  			</tr>
			  		</table>
          </td>
        </tr>
        </form>
        <?
        		$no--;
            $rows--;
         }
       	if($total <= 0){
       	?>
       		<tr><td height=30 colspan=9 align=center>��ϵ� ���ݰ�꼭�� �����ϴ�.</td></tr>
       		<tr><td colspan="20" class="t_line"></td></tr>
       	<?
       	}
        ?>
      </table>

			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr><td height="5"></td></tr>
			 <tr>
			   <td width="33%">
			     <img src="../image/btn_seldel.gif" style="cursor:hand" onClick="taxDelete();">
			     <img src="../image/btn_statuschg.gif" style="cursor:hand" onClick="batchStatus();">
			   </td>
			   <td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
			   <td width="33%"></td>
			 </tr>
			</table>

<? include "../footer.php"; ?>