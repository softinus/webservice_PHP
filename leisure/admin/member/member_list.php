<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
$level_info = level_info();

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "detailsearch=$detailsearch&level=$level&searchopt=$searchopt&searchkey=$searchkey&s_birthday=$s_birthday&s_memorial=$s_memorial&s_age=$s_age";
$param .= "&s_address=$s_address&s_job=$s_job&s_marriage=$s_marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day";
//------------------------------------------------------------------------------------------------------------------------------------

?>

<script language="JavaScript" type="text/javascript">
<!--

// �ֹ����� ����
function chgStatus(status){
   document.searchForm.status.value = status;
   document.searchForm.submit();
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
		if(document.forms[i].id != null){
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
		if(document.forms[i].select_checkbox){
			if(document.forms[i].id != null){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//����ȸ�� ����
function userDelete(){

	var i;
	var seluser = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].id != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					seluser = seluser + document.forms[i].id.value + "|";
				}
			}
	}
	
	if(seluser == ""){
		alert("������ ȸ���� �����ϼ���.");
		return false;
	}else{
		if(confirm("������ ȸ���� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "member_save.php?mode=deluser&seluser=" + seluser;
		}
	}
}


// �󼼰˻�
function showDetailsearch(){
   
   if(detailsearch.style.display == ''){
    detailsearch.style.display = 'none';
    document.searchForm.detailsearch.value = "none";
  }else{
    detailsearch.style.display='';
    document.searchForm.detailsearch.value = "show";
  }
  
}

// ȸ������ �����ٿ�
function excelDown(){
	var url = "member_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=270, width=570, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �� ���Ϲ߼�
function sendEmail(seluser){
   
   if(seluser == ""){
      var i;
   	var seluser = "";
   	for(i=0;i<document.forms.length;i++){
   		if(document.forms[i].id != null){
   			if(document.forms[i].select_checkbox){
   				if(document.forms[i].select_checkbox.checked)
   					seluser = seluser + document.forms[i].name.value + ":" + document.forms[i].email.value + ",";
   				}
   			}
   	}
	}
	
   if(seluser == ""){
		alert("�̸��� �߼��� ȸ���� �����ϼ���.");
		return false;
	}else{
	   var url = "send_email.php?seluser=" + seluser;
	   window.open(url,"sendEmail","height=620, width=700, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
	
}

function sendCoupon(seluser){
	alert("Ư��ȸ�� �������� �߱� ��� �Դϴ�. line138 alert ����")

	if(seluser == ""){
		var i;
		var seluser = "";
		var isFirst = true;


		for(i=0;i<document.forms.length;i++){
			if(document.forms[i].id != null){
				if(document.forms[i].select_checkbox){
					if(document.forms[i].select_checkbox.checked){
						if(isFirst==true){
							seluser = seluser + document.forms[i].id.value;
							isFirst=false;
						}else{
							seluser = seluser + "," +document.forms[i].id.value
						}
					}
				}
			}
		}
	}

	if(seluser == ""){
		alert("������ �߼��� ȸ���� �����ϼ���.");
		return false;
	}else{
		var url = "send_coupon.php?seluser=" + seluser;
		window.open(url,"sendCoupon","height=500, width=500, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
}

// �� sms�߼�
function sendSms(seluser){
   
   if(seluser == ""){
      var i;
   	var seluser = "";
   	for(i=0;i<document.forms.length;i++){
   		if(document.forms[i].id != null){
   			if(document.forms[i].select_checkbox){
   				if(document.forms[i].select_checkbox.checked)
   					seluser = seluser + document.forms[i].hphone.value + ",";
   				}
   			}
   	}
	}
	
   if(seluser == ""){
		alert("SMS �߼��� ȸ���� �����ϼ���.");
		return false;
	}else{
	   var url = "send_sms.php?seluser=" + seluser;
	   window.open(url,"sendSms","height=350, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
	
}

// ȸ���� ���ų���
function orderList(id,name){
	var url = "member_order.php?id=" + id + "&name=" + name;
	window.open(url,"orderList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}


// ȸ���� �����ݳ���
function reserveList(id,name){
	var url = "member_reserve.php?id=" + id + "&name=" + name;
	window.open(url,"reserveList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

//-->
</script>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">ȸ�����</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">ȸ�������� �����մϴ�.</td>
	</tr>
</table>			

<br>	  

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<form name="searchForm" action="<?=$PHP_SELF?>" method="get">
	<input type="hidden" name="page" value="<?=$page?>">
	<input type="hidden" name="detailsearch" value="<?=$detailsearch?>">
	<tr>
		<td bgcolor="ffffff">
			<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
				<tr>
					<td width="15%" class="t_name">���ǰ˻�</td>
					<td width="85%" class="t_value">
						<select name="level">
							<option value=""> ��޼��� 
							<?=level_list();?>
						</select> 
<script language="javascript">
<!--
level = document.searchForm.level;
for(ii=0; ii<level.length; ii++){
	if(level.options[ii].value == "<?=$level?>")
	level.options[ii].selected = true;
}
-->
</script>

						<select name="searchopt" class="select">
							<option value="name" <? if($searchopt == "name") echo "selected"; ?>>����
							<option value="id" <? if($searchopt == "id") echo "selected"; ?>>���̵�
							<option value="resno" <? if($searchopt == "resno") echo "selected"; ?>>�ֹι�ȣ
							<option value="email" <? if($searchopt == "email") echo "selected"; ?>>�̸���
							<option value="tphone" <? if($searchopt == "tphone") echo "selected"; ?>>��ȭ��ȣ
							<option value="hphone" <? if($searchopt == "hphone") echo "selected"; ?>>�޴���
						</select>
						<input type="text" name="searchkey" value="<?=$searchkey?>" class="input">
						<input type="image" src="../image/btn_search.gif" align="absmiddle">
						<a href="javascript:showDetailsearch()"><font color="red">>> �󼼰˻�</font></a>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td></td>
				</tr>
			</table>
			<div id='detailsearch' style="display: <? if(empty($detailsearch)) echo none; else echo $detailsearch; ?>">
				<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
					<tr>
						<td width="15%" class="t_name">&nbsp; ���� ����</td>
						<td width="85%" class="t_value"><input type="checkbox" name="s_birthday" value="Y" <? if($s_birthday == "Y") echo "checked"; ?>>��</td>
					</tr>
					<tr>
						<td class="t_name">&nbsp; ���� ��ȥ�����</td>
						<td class="t_value"><input type="checkbox" name="s_memorial" value="Y" <? if($s_memorial == "Y") echo "checked"; ?>>��</td>
					</tr>
					<tr>
						<td class="t_name">&nbsp; ����</td>
						<td class="t_value">
							<select name="s_age">
								<option value="">���ɴ븦 �����ϼ���
								<option value="10" <? if($s_age == "10") echo "selected"; ?>>10�� ~ 19��
								<option value="20" <? if($s_age == "20") echo "selected"; ?>>20�� ~ 29��
								<option value="30" <? if($s_age == "30") echo "selected"; ?>>30�� ~ 39��
								<option value="40" <? if($s_age == "40") echo "selected"; ?>>40�� ~ 49��
								<option value="50" <? if($s_age == "50") echo "selected"; ?>>50�� ~ 59��
								<option value="60" <? if($s_age == "60") echo "selected"; ?>>60�� ~ 69��
							</select>
						</td>
					</tr>
					<tr>
						<td class="t_name">&nbsp; ����</td>
						<td class="t_value">
							<select name="s_address">
								<option value="">�� �ô����� �����ϼ���.</option>
								<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								<option value="�λ�" <? if($s_address == "�λ�") echo "selected"; ?>>�λ�</option>
								<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								<option value="�뱸" <? if($s_address == "�뱸") echo "selected"; ?>>�뱸</option>
								<option value="��õ" <? if($s_address == "��õ") echo "selected"; ?>>��õ</option>
								<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								<option value="���" <? if($s_address == "���") echo "selected"; ?>>���</option>
								<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								<option value="���" <? if($s_address == "���") echo "selected"; ?>>���</option>
								<option value="�泲" <? if($s_address == "�泲") echo "selected"; ?>>�泲</option>
								<option value="���" <? if($s_address == "���") echo "selected"; ?>>���</option>
								<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								<option value="�泲" <? if($s_address == "�泲") echo "selected"; ?>>�泲</option>
								<option value="���" <? if($s_address == "���") echo "selected"; ?>>���</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="t_name">&nbsp; ����</td>
						<td class="t_value">
							<select name="s_job" class="optionjoin">
								<option value="">������ �����ϼ���.</option>
								<option value="00" <? if($s_job == "00") echo "selected"; ?>>����</option>
								<option value="10" <? if($s_job == "10") echo "selected"; ?>>�л�</option>
								<option value="30" <? if($s_job == "30") echo "selected"; ?>>��ǻ��/���ͳ�</option>
								<option value="50" <? if($s_job == "50") echo "selected"; ?>>���</option>
								<option value="70" <? if($s_job == "70") echo "selected"; ?>>������</option>
								<option value="90" <? if($s_job == "90") echo "selected"; ?>>����</option>
								<option value="A0" <? if($s_job == "A0") echo "selected"; ?>>���񽺾�</option>
								<option value="C0" <? if($s_job == "C0") echo "selected"; ?>>����</option>
								<option value="E0" <? if($s_job == "E0") echo "selected"; ?>>����/����/�����</option>
								<option value="G0" <? if($s_job == "G0") echo "selected"; ?>>�����</option>
								<option value="I0" <? if($s_job == "I0") echo "selected"; ?>>����</option>
								<option value="K0" <? if($s_job == "K0") echo "selected"; ?>>�Ƿ�</option>
								<option value="M0" <? if($s_job == "M0") echo "selected"; ?>>����</option>
								<option value="O0" <? if($s_job == "O0") echo "selected"; ?>>�Ǽ���</option>
								<option value="Q0" <? if($s_job == "Q0") echo "selected"; ?>>������</option>
								<option value="S0" <? if($s_job == "S0") echo "selected"; ?>>�ε����</option>
								<option value="U0" <? if($s_job == "U0") echo "selected"; ?>>��۾�</option>
								<option value="W0" <? if($s_job == "W0") echo "selected"; ?>>��/��/��/�����</option>
								<option value="Y0" <? if($s_job == "Y0") echo "selected"; ?>>����</option>
								<option value="z0" <? if($s_job == "z0") echo "selected"; ?>>��Ÿ</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="t_name">&nbsp; ��ȥ����</td>
						<td class="t_value">
							<input type="radio" name="s_marriage" value="N" <? if($s_marriage == "N") echo "checked"; ?>>��ȥ
							<input type="radio" name="s_marriage" value="Y" <? if($s_marriage == "Y") echo "checked"; ?>>��ȥ
						</td>
					</tr>
					<tr>
						<td class="t_name">&nbsp; ������</td>
						<td class="t_value">
							<select name="prev_year">
	<?                     
	if(empty($next_year)) $next_year = date("Y");
	if(empty($next_month)) $next_month = date("n");
	if(empty($next_day)) $next_day = date("d");

	for($ii=2000; $ii <= 2015; $ii++){
		if($ii == $prev_year) echo "<option value=$ii selected>$ii";
		else echo "<option value=$ii>$ii";
	}
	?>
							</select> �� 

							<select name="prev_month">
	<?
	for($ii=1; $ii <= 12; $ii++){
		if($ii<10) $ii = "0".$ii;
		if($ii == $prev_month) echo "<option value=$ii selected>$ii";
		else echo "<option value=$ii>$ii";
	}
	?>
							</select> �� 

							<select name="prev_day">
	<?
	for($ii=1; $ii <= 31; $ii++){
		if($ii<10) $ii = "0".$ii;
		if($ii == $prev_day) echo "<option value=$ii selected>$ii";
		else echo "<option value=$ii>$ii";
	}
	?>
							</select> �� ~ 
							<select name="next_year">
	<?
	for($ii=2000; $ii <= 2015; $ii++){
		if($ii == $next_year) echo "<option value=$ii selected>$ii";
		else echo "<option value=$ii>$ii";
	}
	?>
							</select> �� 
							<select name="next_month">
	<?
	for($ii=1; $ii <= 12; $ii++){
		if($ii<10) $ii = "0".$ii;
		if($ii == $next_month) echo "<option value=$ii selected>$ii";
		else echo "<option value=$ii>$ii";
	}
	?>
							</select> �� 
							<select name="next_day">
	<?
	for($ii=1; $ii <= 31; $ii++){
		if($ii<10) $ii = "0".$ii;
		if($ii == $next_day) echo "<option value=$ii selected>$ii";
		else echo "<option value=$ii>$ii";
	}
	?>
							</select>��
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	</form>
</table>

<br>
<?
$today = date('n-d');
$toyear = date('Y');

$age_syear = substr($toyear-($s_age+9),-2)+1;
$age_eyear = substr($toyear-$s_age,-2)+2;

$join_sdate = $prev_year."-".$prev_month."-".$prev_day;
$join_edate = $next_year."-".$next_month."-".$next_day;

$sql = "select count(id) as all_total from wiz_member ";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$all_total = $row->all_total;

$sql = "select id from wiz_member wm";
$sql .= " where wm.id != ''";
if($level != "") $sql .= " and wm.level = '$level'";
if($prev_year != "") $sql .= " and wm.wdate > '$join_sdate' and wm.wdate <= '$join_edate 23:59:59'";
if($searchopt != "")   $sql .= " and wm.$searchopt like '%$searchkey%'";
if($s_birthday == "Y") $sql .= " and wm.birthday like '%$today'";
if($s_memorial == "Y") $sql .= " and wm.memorial like '%$today'";
if($s_age != "")       $sql .= " and wm.resno > '$age_syear' and wm.resno < '$age_eyear'";
if($s_address != "")   $sql .= " and wm.address like '%$s_address%'";
if($s_job != "")       $sql .= " and wm.job = '$s_job'";
if($s_marriage != "")  $sql .= " and wm.marriage = '$s_marriage'";
$sql .= " and level<>30";
$sql .=" order by wm.wdate desc";

$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

$rows = 20;
$lists = 5;
$page_count = ceil($total/$rows);
if(!$page || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $total-$start;
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>�� ȸ���� : <b><?=$all_total?></b> , �˻� ȸ���� : <b><?=$total?></b></td>
		<td align="right">
			<img src="../image/btn_excel.gif" style="cursor:hand" onClick="excelDown();">
			<img src="../image/btn_memadd.gif" style="cursor:hand" onClick="document.location='member_info.php?mode=insert';">
		</td>
	</tr>
</table> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form>
	<tr><td class="t_rd" colspan="20"></td></tr>
	<tr class="t_th">
		<th width="30" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
		<th align="center">��ȣ</th>
		<th align="center">�̸�</th>
		<th align="center">���̵�/���</th>
		<th align="center">�޴���</th>
		<th align="center">�̸���</th>
		<th align="center">������</th>
		<th align="center">�ֹ���</th>
		<th align="center">�湮��</th>
		<th align="center">������</th>
		<th align="center">���</th>
	</tr>
	<tr><td class="t_rd" colspan="20"></td></tr>
</form>
<?
$sql = "select id,passwd,name,hphone,email,level,visit,wdate from wiz_member wm";
$sql .= " where wm.id != ''";
if($level != "") $sql .= " and wm.level = '$level'";
if($prev_year != "") $sql .= " and wm.wdate > '$join_sdate' and wm.wdate <= '$join_edate 23:59:59'";
if($searchopt != "")   $sql .= " and wm.$searchopt like '%$searchkey%'";
if($s_birthday == "Y") $sql .= " and wm.birthday like '%$today'";
if($s_memorial == "Y") $sql .= " and wm.memorial like '%$today'";
if($s_age != "")       $sql .= " and wm.resno > '$age_syear' and wm.resno < '$age_eyear'";
if($s_address != "")   $sql .= " and wm.address like '%$s_address%'";
if($s_job != "")       $sql .= " and wm.job = '$s_job'";
if($s_marriage != "")  $sql .= " and wm.marriage = '$s_marriage'";
$sql .= " and level<>30";
$sql .=" order by wm.wdate desc limit $start, $rows";

$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result)) && $rows){
	if($shop_info->sms_use == "Y") $hphone = "<a href=javascript:sendSms('".$row->hphone."');>".$row->hphone."</a>";
	else $hphone = $row->hphone;
?>
<form name="frm<?=$no?>">
	<input type="hidden" name="id" value="<?=$row->id?>">
	<input type="hidden" name="name" value="<?=$row->name?>">
	<input type="hidden" name="email" value="<?=$row->email?>">
	<input type="hidden" name="hphone" value="<?=$row->hphone?>">
	<tr> 
		<td height="30" align="center"><input type="checkbox" name="select_checkbox"></td>
		<td align="center"><a href="member_info.php?mode=update&id=<?=$row->id?>&<?=$param?>&page=<?=$page?>"><?=$no?></a></td>
		<td align="center"><a href="member_info.php?mode=update&id=<?=$row->id?>&<?=$param?>&page=<?=$page?>"><?=$row->name?></a></td>
		<td align="center"><a href="member_info.php?mode=update&id=<?=$row->id?>&<?=$param?>&page=<?=$page?>"><?=$row->id?>/<?=$row->passwd?></a></td>
		<td align="center"><?=$hphone?></td>
		<td align="center"><a href="javascript:sendEmail('<?=$row->name?>:<?=$row->email?>')"><?=$row->email?></a></td>
		<td align="center"><a href="javascript:reserveList('<?=$row->id?>','<?=$row->name?>');">����</a></td>
		<td align="center"><a href="javascript:orderList('<?=$row->id?>','<?=$row->name?>');">����</a></td>
		<td align="center"><?=$row->visit?></td>
		<td align="center"><?=substr($row->wdate,0,10)?> &nbsp;</td>
		<td align="center"><img src="../image/btn_view_s.gif" style="cursor:hand" onClick="document.location='member_info.php?mode=update&id=<?=$row->id?>&<?=$param?>&page=<?=$page?>';"></td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
</form>
<?
	$no--;
	$rows--;
}                  
if($total <= 0){
?>
	<tr><td height=30 colspan=11 align=center>��ϵ� ȸ���� �����ϴ�.</td></tr>
	<tr><td colspan='20' class='t_line'></td></tr>
<?
}
?>
</table>

<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr> 
		<td width="33%">
			<img src="../image/btn_memdel.gif" style="cursor:pointer" onClick="userDelete();">
			<img src="../image/btn_sendmail.gif" style="cursor:pointer" onClick="sendEmail('');">
		<? if(!strcmp($shop_info->sms_use, "Y")) { ?>
			<img src="../image/btn_sendsms.gif" style="cursor:pointer" onClick="sendSms('');">
		<? } ?>
			<!--img src="../image/btn_sendsms.gif" style="cursor:pointer" onClick="sendCoupon('');"-->
		</td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
		<td width="33%"></td>
	</tr>
</table>
<? include "../footer.php"; ?>