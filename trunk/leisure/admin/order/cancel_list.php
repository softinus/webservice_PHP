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

//
function chgReason(reason){
   document.frm.reason.value = reason;
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
function basketDelete(){

var i;
var selbasket = "";
for(i=0;i<document.forms.length;i++){
	if(document.forms[i].idx != null){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].select_checkbox.checked)
				selbasket = selbasket + document.forms[i].idx.value + "|";
			}
		}
}

if(selbasket == ""){
	alert("������ �ֹ��� �������� �ʾҽ��ϴ�.");
	return;
}else{
	if(confirm("������ �ֹ��� ���� �����Ͻðڽ��ϱ�? \n\n���� �� �ֹ��� ���������� �����˴ϴ�.")){
		document.location = "order_save.php?mode=delete_basket&selbasket=" + selbasket;
	}else{
		return;
	}
}
return;

}

// �����ֹ� ���º���
function batchStatus(){

var i;
var selbasket = "";
for(i=0;i<document.forms.length;i++){
	if(document.forms[i].idx != null){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].select_checkbox.checked)
				selbasket = selbasket + document.forms[i].idx.value + "|";
			}
		}
}

if(selbasket == ""){
	alert("������ �׸��� �������� �ʾҽ��ϴ�.");
	return;
}else{
	var url = "basket_status.php?selbasket=" + selbasket;
	window.open(url,"basketStatus","height=150, width=250, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}
return;

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
-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">��Ҹ��</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">������� ��� �Դϴ�.</td>
			  </tr>
			</table>

			<br>
     <table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
     <form name="frm" action="<?=$PHP_SELF?>" method="get">
     <input type="hidden" name="page" value="">
     <input type="hidden" name="status" value="<?=$status?>">
     <input type="hidden" name="reason" value="<?=$reason?>">
       <tr>
         <td width="15%" class="t_name">�������</td>
         <td width="85%" class="t_value">

           <table>
           <tr><td>
           <input type="button" onClick="chgStatus('');" value=" ��ü " <? if($status == "") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgStatus('CA');" value="��ҽ�û" <? if($status == "CA") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgStatus('CI');" value="ó����" <? if($status == "CI") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgStatus('CC');" value="��ҿϷ�" <? if($status == "CC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           </td></tr>
           </table>

         </td>
       </tr>
       <tr>
         <td width="15%" class="t_name">��һ���</td>
         <td width="85%" class="t_value">

           <table>
           <tr><td>
           <input type="button" onClick="chgReason('');" value=" ��ü " <? if($reason == "") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('������');" value="������" <? if($reason == "������") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('ǰ��');" value="ǰ��" <? if($reason == "ǰ��") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('�������');" value="�������" <? if($reason == "�������") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('�����ֹ�');" value="�����ֹ�" <? if($reason == "�����ֹ�") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('�ý��ۿ���');" value="�ý��ۿ���" <? if($reason == "�ý��ۿ���") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('�������');" value="�������" <? if($reason == "�������") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('�ù�н�');" value="�ù�н�" <? if($reason == "�ù�н�") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('��ǰ�ҷ�');" value="��ǰ�ҷ�" <? if($reason == "��ǰ�ҷ�") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           <input type="button" onClick="chgReason('��Ÿ');" value="��Ÿ" <? if($reason == "��Ÿ") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
           </td></tr>
           </table>

         </td>
       </tr>
       <tr>
         <td class="t_name">�Ⱓ</td>
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
         <td class="t_name">���ǰ˻�</td>
         <td class="t_value">
             <select name="searchopt" class="select2">
             <option value="orderid" <? if($searchopt == "orderid") echo "selected"; ?>>�ֹ���ȣ
             <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>��ǰ��
             <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>��ǰ�ڵ�
             <option value="bank" <? if($searchopt == "bank") echo "selected"; ?>>ȯ������
             <option value="account" <? if($searchopt == "account") echo "selected"; ?>>ȯ�Ұ��¸�
             <option value="acc_name" <? if($searchopt == "acc_name") echo "selected"; ?>>������
             </select>
             <input type="text" name="searchkey" value="<?=$searchkey?>" class="input">
             <input type="image" src="../image/btn_search.gif" align="absmiddle">
         </td>
       </tr>
     </form>
     </table>

     <br>
			<?
			$sql = "select idx from wiz_basket where status != '' and (status = 'CA' or status = 'CI' or status = 'CC')";
			$result = mysql_query($sql) or error(mysql_error());
			$all_total = mysql_num_rows($result);
			
			if($prev_year){
			   $prev_period = $prev_year."-".$prev_month."-".$prev_day;
			   $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
			   $period_sql = " and ca_date >= '$prev_period' and ca_date <= '$next_period'";
			}
			if($status == "") $status_sql = "and status != ''";
			else $status_sql = "and status = '$status'";
			
			if($reason != "") $reason_sql = "and reason = '$reason'";
			
			if($searchopt && $searchkey) $searchopt_sql = " and $searchopt like '%$searchkey%'";
			
			$sql = "select * from wiz_basket where (status = 'CA' or status = 'CI' or status = 'CC') $status_sql $period_sql $searchopt_sql $reason_sql order by ca_date desc";
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
          <td>�� �ֹ��� : <b><?=$all_total?></b> �˻� �ֹ��� : <b><?=$total?></b></td>
          <td align="right">
	       <font color="6DCFF6">��</font> ��ҽ�û
	       <font color="BD8CBF">��</font> ó����
	       <font color="ED1C24">��</font> ��ҿϷ� &nbsp;
          </td>
        </tr>
        <tr><td height="3"></td></tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<form>
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="2%"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
          <th width="7%">��һ���</th>
          <th width="10%">�ֹ���ȣ</th>
          <th>��ǰ��</th>
          <th width="8%">��ҿ�û��</th>
          <th width="8%">��ҿϷ���</th>
          <th width="7%">��ǰ����</th>
          <th width="5%">����</th>
          <th width="21%">�ֹ�����</th>
        </th>
        <tr><td class="t_rd" colspan="20"></td></tr>
      	</form>
				<?
				while(($row = mysql_fetch_object($result)) && $rows){
					if($row->status == "CA") $stacolor = "6DCFF6";
					else if($row->status == "CI") $stacolor = "BD8CBF";
					else if($row->status == "CC") $stacolor = "ED1C24";
					else $stacolor = "";
				?>
	     	<form action="order_save.php" name="<?=$row->idx?>" method="get">
        <input type="hidden" name="mode" value="cancel_status">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="orderid" value="<?=$row->orderid?>">
        <input type="hidden" name="idx" value="<?=$row->idx?>">

        <input type="hidden" name="status" value="<?=$status?>">
        <input type="hidden" name="reason" value="<?=$reason?>">
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
          <td align="center" height="27"><input type="checkbox" name="select_checkbox"></td>
          <td align="center"><?=$row->reason?></td>
          <td align="center"><a href="order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>"><?=$row->orderid?></a></td>
          <td align="center"> 
          	<?= cut_str($row->prdname, 30) ?> 
          	<?
						if($row->opttitle2 != '') $row->opttitle2 = "/".$row->opttitle2;
						if($row->optcode2 != '') $row->optcode2 = "/".$row->optcode2;
		
						if($row->opttitle != '') echo "<br>".$row->opttitle.$row->opttitle2." : ".$row->optcode.$row->optcode2." <br>";
						if($row->opttitle3 != '') echo "$row->opttitle3 : $row->optcode3 <br>";
						if($row->opttitle4 != '') echo "$row->opttitle4 : $row->optcode4 <br>";
						if($row->opttitle5 != '') echo "$row->opttitle5 : $row->optcode5 <br>";
						if($row->opttitle6 != '') echo "$row->opttitle6 : $row->optcode6 <br>";
						if($row->opttitle7 != '') echo "$row->opttitle7 : $row->optcode7 <br>";
          	?>
          </td>
          <td align="center"><?=$row->ca_date?></td>
          <td align="center"><?=$row->cc_date?></td>
          <td align="right"><?=number_format($row->prdprice)?>��</td>
          <td align="right"><?=number_format($row->amount)?></td>
          <td align="center">

          <table cellpadding="2"><tr><td bgcolor=<?=$stacolor?>>
          <select name="chg_status" style="width:90">
          <option value="CA" <? if($row->status == "CA") echo "selected"; ?>>��ҽ�û</option>
          <option value="CI" <? if($row->status == "CI") echo "selected"; ?>>ó����</option>
          <option value="CC" <? if($row->status == "CC") echo "selected"; ?>>��ҿϷ�</option>
          </select>
          </td>
          <td>
          	<input type="image" src="../image/btn_apply_s.gif" align="absmiddle"> 
          	<img src="../image/btn_view_s.gif" style="cursor:hand" align="absmiddle" onClick="viewCancel('<?=$row->idx?>')">
          </td>
          </tr></table>
          </td>
          <td align="center"></td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
       	<tr bgcolor="#FFFFFF" id="ccontent_<?=$row->idx?>" style="display:none">
          <td height="30" colspan="10" style="padding:3px">
            <table border="0"width="100%" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="100" height="30" align="align" class="t_name">��һ���</td>
                <td class="t_value" colspan="5"><?=$row->reason?></td>
              </tr>
              <tr>
                <td width="100" height="30" align="align" class="t_name">�޸�</td>
                <td class="t_value" colspan="5"><?=$row->memo?></td>
              </tr>
							<?
							if(!empty($row->repay)) {
								if(!strcmp($row->repay, "R")) $repay = "������";
								if(!strcmp($row->repay, "C")) $repay = "������ü";
								
							?>
              <tr>
                <td width="100" height="30" align="align" class="t_name">ȯ�ҹ��</td>
                <td class="t_value" colspan="5"><?=$repay?></td>
              </tr>
							<?
							}
							if(!empty($row->bank)) {
							?>
              <tr>
                <td width="100" height="30" align="align" class="t_name">�����</td>
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
        </form>
        <?
        		$no--;
            $rows--;
         }

       	if($total <= 0){
       	?>
       	<tr><td height=30 colspan=9 align=center>������� �׸��� �����ϴ�.</td></tr>
       	<tr><td colspan="20" class="t_line"></td></tr>
       	<?
       	}
				?>
			</table>

			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr><td height="5"></td></tr>
			 <tr>
			   <td width="30%">
			     <img src="../image/btn_seldel.gif" style="cursor:hand" onClick="basketDelete();">
			     <img src="../image/btn_statuschg.gif" style="cursor:hand" onClick="batchStatus();">
			   </td>
			   <td width="30%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
			   <td width="30%"></td>
			 </tr>
			</table>

<? include "../footer.php"; ?>