<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&keyword=$keyword&birthday=$birthday&memorial=$memorial&age=$age";
$param .= "&address=$address&job=$job&marriage=$marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day";
//--------------------------------------------------------------------------------------------------

?>

<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){

   if(frm.subject.value == ""){
		alert("������ �Է��ϼ���");
		frm.subject.focus();
		return false;
	}
	if(frm.content.value == "<P>&nbsp;</P>"){
		alert("������ �Է��ϼ���");
		return false;
	}

	if(confirm("������ �߼� �Ͻðڽ��ϱ�? \n\n���� �߼�â�� �Ϸ�ñ��� ����������.")){

  	window.open("","mailWin","height=300, width=300, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, top=100, left=100");
		frm.target = "mailWin";

	}else{
		return false;
	}

}

function reviewMail(frm){

	frm.review.value='Y';
	frm.target='_blank';

	frm.submit();

}


//-->
</script>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">���Ϲ߼�</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">�˻� �� ȸ������ ������ �߼��մϴ�.</td>
	</tr>
</table>			
<br>	  

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<form name="searchForm" action="<?=$PHP_SELF?>" method="get">
	<input type="hidden" name="tmp">
	<input type="hidden" name="page" value="<?=$page?>">
	<input type="hidden" name="detailsearch" value="<?=$detailsearch?>">
	<tr>
		<td bgcolor="ffffff">
			<table width="100%" cellpadding="3" cellspacing="1" class="t_style" border="0">
				<tr>
					<td width="15%" class="t_name">���� ����</td>
					<td width="35%" class="t_value"><input type="checkbox" name="birthday" value="Y" <? if($birthday == "Y") echo "checked"; ?>>��</td>
					<td width="15%" class="t_name">���� ��ȥ�����</td>
					<td width="35%" class="t_value"><input type="checkbox" name="memorial" value="Y" <? if($memorial == "Y") echo "checked"; ?>>��</td>
				</tr>
				<tr>
					<td class="t_name">����</td>
					<td class="t_value">
						<select name="age">
							<option value="">���ɴ븦 �����ϼ���
							<option value="10" <? if($age == "10") echo "selected"; ?>>10�� ~ 19��</option>
							<option value="20" <? if($age == "20") echo "selected"; ?>>20�� ~ 29��</option>
							<option value="30" <? if($age == "30") echo "selected"; ?>>30�� ~ 39��</option>
							<option value="40" <? if($age == "40") echo "selected"; ?>>40�� ~ 49��</option>
							<option value="50" <? if($age == "50") echo "selected"; ?>>50�� ~ 59��</option>
							<option value="60" <? if($age == "60") echo "selected"; ?>>60�� ~ 69��</option>
						</select>
					</td>
					<td class="t_name">����</td>
					<td class="t_value">
						<select name="address">
							<option value="">�� �ô����� �����ϼ���.</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="�λ�" <? if($address == "�λ�") echo "selected"; ?>>�λ�</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="�뱸" <? if($address == "�뱸") echo "selected"; ?>>�뱸</option>
							<option value="��õ" <? if($address == "��õ") echo "selected"; ?>>��õ</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
							<option value="�泲" <? if($address == "�泲") echo "selected"; ?>>�泲</option>
							<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="�泲" <? if($address == "�泲") echo "selected"; ?>>�泲</option>
							<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="t_name">����</td>
					<td class="t_value">
						<select name="job" class="optionjoin">
							<option value="">������ �����ϼ���.</option>
							<option value="00" <? if($job == "00") echo "selected"; ?>>����</option>
							<option value="10" <? if($job == "10") echo "selected"; ?>>�л�</option>
							<option value="30" <? if($job == "30") echo "selected"; ?>>��ǻ��/���ͳ�</option>
							<option value="50" <? if($job == "50") echo "selected"; ?>>���</option>
							<option value="70" <? if($job == "70") echo "selected"; ?>>������</option>
							<option value="90" <? if($job == "90") echo "selected"; ?>>����</option>
							<option value="A0" <? if($job == "A0") echo "selected"; ?>>���񽺾�</option>
							<option value="C0" <? if($job == "C0") echo "selected"; ?>>����</option>
							<option value="E0" <? if($job == "E0") echo "selected"; ?>>����/����/�����</option>
							<option value="G0" <? if($job == "G0") echo "selected"; ?>>�����</option>
							<option value="I0" <? if($job == "I0") echo "selected"; ?>>����</option>
							<option value="K0" <? if($job == "K0") echo "selected"; ?>>�Ƿ�</option>
							<option value="M0" <? if($job == "M0") echo "selected"; ?>>����</option>
							<option value="O0" <? if($job == "O0") echo "selected"; ?>>�Ǽ���</option>
							<option value="Q0" <? if($job == "Q0") echo "selected"; ?>>������</option>
							<option value="S0" <? if($job == "S0") echo "selected"; ?>>�ε����</option>
							<option value="U0" <? if($job == "U0") echo "selected"; ?>>��۾�</option>
							<option value="W0" <? if($job == "W0") echo "selected"; ?>>��/��/��/�����</option>
							<option value="Y0" <? if($job == "Y0") echo "selected"; ?>>����</option>
							<option value="z0" <? if($job == "z0") echo "selected"; ?>>��Ÿ</option>
						</select>
					</td>
					<td class="t_name">��ȥ����</td>
					<td class="t_value">
						<input type="radio" name="marriage" value="N" <? if($marriage == "N") echo "checked"; ?>>��ȥ
						<input type="radio" name="marriage" value="Y" <? if($marriage == "Y") echo "checked"; ?>>��ȥ
					</td>
				</tr>
				<tr>
					<td class="t_name">������</td>
					<td colspan="3" class="t_value">
						<select name="prev_year">
<?
if(empty($next_year)) $next_year = date("Y");
if(empty($next_month)) $next_month = date("n");
if(empty($next_day)) $next_day = date("d");

for($ii=2000; $ii <= date("Y"); $ii++){
if($ii == $prev_year) echo "<option value=$ii selected>$ii";
else echo "<option value=$ii>$ii";
}
?>
						</select>
						��
						<select name="prev_month">
<?
for($ii=1; $ii <= 12; $ii++){
if($ii<10) $ii = "0".$ii;
if($ii == $prev_month) echo "<option value=$ii selected>$ii";
else echo "<option value=$ii>$ii";
}
?>
						</select>
						��
						<select name="prev_day">
<?
for($ii=1; $ii <= 31; $ii++){
if($ii<10) $ii = "0".$ii;
if($ii == $prev_day) echo "<option value=$ii selected>$ii";
else echo "<option value=$ii>$ii";
}
?>
						</select>
						�� ~
						<select name="next_year">
<?
for($ii=2000; $ii <= date("Y"); $ii++){
if($ii == $next_year) echo "<option value=$ii selected>$ii";
else echo "<option value=$ii>$ii";
}
?>
						</select>
						��
						<select name="next_month">
<?
for($ii=1; $ii <= 12; $ii++){
if($ii<10) $ii = "0".$ii;
if($ii == $next_month) echo "<option value=$ii selected>$ii";
else echo "<option value=$ii>$ii";
}
?>
						</select>
						��
						<select name="next_day">
<?
for($ii=1; $ii <= 31; $ii++){
if($ii<10) $ii = "0".$ii;
if($ii == $next_day) echo "<option value=$ii selected>$ii";
else echo "<option value=$ii>$ii";
}
?>
						</select>
						��
					</td>
				</tr>
				<tr>
					<td class="t_name">���ǰ˻�</td>
					<td colspan="3" class="t_value">
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
						<input type="text" name="keyword" value="<?=$keyword?>" class="input">
						<input type="image" src="../image/btn_search.gif" align="absmiddle">
					</td>
				</tr>
				<tr>
					<td class="t_name"><font color=red><b>�̸��� ����</b></font></td>
					<td colspan="3" class="t_value">
						<input type="radio" name="remail" value="RJ" <? if($remail == "RJ" || $remail == "") echo "checked"; ?>>���Űź�ȸ�� ����
						<input type="radio" name="remail" value="RA" <? if($remail == "RA") echo "checked"; ?>>ȸ����ü
					</td>
				</tr>
			</table>
		</td>
	</tr>
</form>
</table>

<br>
<?

$sql = "select id from wiz_member";
$result = mysql_query($sql) or error(mysql_error());
$all_total = mysql_num_rows($result);

$today = date('n-d');
$toyear = date('Y');

$age_syear = substr($toyear-($age+9),-2)+1;
$age_eyear = substr($toyear-$age,-2)+2;

$join_sdate = $prev_year."-".$prev_month."-".$prev_day;
$join_edate = $next_year."-".$next_month."-".$next_day;

$sql = "select id from wiz_member where id != '' ";
if($level != "") 		$sql .= " and level = '$level'";
if($prev_year != "") $sql .= " and wdate > '$join_sdate' and wdate <= '$join_edate 23:59:59'";
if($searchopt != "") $sql .= " and $searchopt like '%$keyword%'";
if($birthday == "Y") $sql .= " and birthday like '%$today'";
if($memorial == "Y") $sql .= " and memorial like '%$today'";
if($age != "")       $sql .= " and resno > '$age_syear' and resno < '$age_eyear'";
if($address != "")   $sql .= " and address like '%$address%'";
if($job != "")       $sql .= " and job = '$job'";
if($marriage != "")  $sql .= " and marriage = '$marriage'";
if($remail == "RJ" || $remail == "")		$sql .= " and reemail != 'N'";

$sql .=" order by wdate desc";

$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

$rows = 6;
$lists = 5;
$page_count = ceil($total/$rows);
if(!$page || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $start+1;
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>�� ȸ���� : <b><?=$all_total?></b> , �˻� ȸ���� : <b><?=$total?></b></td>
	</tr>
	<tr><td height="3"></td></tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form>
	<tr><td class="t_rd" colspan="20"></td></tr>
	<tr class="t_th">
		<th align="center">��ȣ</th>
		<th align="center">�̸�</th>
		<th align="center">���̵�/���</th>
		<th align="center">�޴���</th>
		<th align="center">�̸���</th>
		<th align="center">�湮��</th>
		<th align="center">���ϼ���</th>
		<th align="center">������</th>
	</tr>
	<tr><td class="t_rd" colspan="20"></td></tr>
</form>
<?
$sql = "select id,passwd,name,hphone,email,visit,reemail,wdate from wiz_member where id != '' ";
if($level != "") 		$sql .= " and level = '$level'";
if($prev_year != "") $sql .= " and wdate > '$join_sdate' and wdate <= '$join_edate 23:59:59'";
if($searchopt != "") $sql .= " and $searchopt like '%$keyword%'";
if($birthday == "Y") $sql .= " and birthday like '%$today'";
if($memorial == "Y") $sql .= " and memorial like '%$today'";
if($age != "")       $sql .= " and resno > '$age_syear' and resno < '$age_eyear'";
if($address != "")   $sql .= " and address like '%$address%'";
if($job != "")       $sql .= " and job = '$job'";
if($marriage != "")  $sql .= " and marriage = '$marriage'";
if($remail == "RJ" || $remail == "")		$sql .= " and reemail != 'N'";

$mailsql = $sql;
$sql .=" order by wdate desc ";
$mailsql = $sql;
$sql .=" limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result)) && $rows){
	if($row->reemail == "Y") $row->reemail = "��";
	else $row->reemail = "�ƴϿ�";
?>
<form>
	<input type="hidden" name="id" value="<?=$row->id?>">
	<tr>
		<td align="center" height="30"><?=$no?></td>
		<td align="center"><?=$row->name?></td>
		<td align="center"><?=$row->id?>/<?=$row->passwd?></td>
		<td align="center"><?=$row->hphone?></td>
		<td align="center"><?=$row->email?></td>
		<td align="center"><?=$row->visit?></td>
		<td align="center"><?=$row->reemail?></td>
		<td align="center"><?=substr($row->wdate,0,10)?> &nbsp;</td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
</form>
<?
	$no++;
	$rows--;
}

if($total <= 0){
?>
	<tr><td height=30 colspan=10 align=center>��ϵ� ȸ���� �����ϴ�.</td></tr>
	<tr><td colspan='20' class='t_line'></td></tr>
<?
}
?>
</table>

<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr> 
		<td width="33%"></td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
		<td width="33%"></td>
	</tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="member_save.php" method="post" onSubmit="return inputCheck(this)">
	<input type="hidden" name="mode" value="mememail">
	<input type="hidden" name="review" value="">
	<input type="hidden" name="mailsql" value="<?=$mailsql?>">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="20%" class="t_name">���ҹ߼�</td>
					<td width="80%" class="t_value">
						<input type="text" name="snum" value="1" size="6" class="input" checked>������ ~
						<input type="text" name="enum" value="1000" size="6" class="input">������ �߼�
					</td>
				</tr>
				<tr>
					<td class="t_name">����</td>
					<td class="t_value"><input type="text" name="subject" size="80" class="input"></td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="t_name">����</td>
				</tr>
				<tr>
					<td colspan="2" class="t_value">
					<?
					// ���Ͻ�Ų
					include "$DOCUMENT_ROOT/inc/shop_info.inc";
					$sql = "select * from wiz_mailsms where code = 'mem_notice'";
					$result = mysql_query($sql) or error(mysql_error());
					$row = mysql_fetch_object($result);

					$edit_content = $row->email_msg;
					$edit_content = info_replace($shop_info, $re_info, $order_info, $edit_content);
					include "../webedit/WIZEditor.html";
					?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="9d9d9d">
	<tr>
		<td width="5" height="5"><img src="../image/check_left_top.gif"></td>
		<td width="100%"></td>
		<td width="5" height="5"><img src="../image/check_right_top.gif"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="6">
				<tr>
					<td><img src="../image/check_tit.gif" width="75" height="19" /></td>
				</tr>
				<tr>
					<td class="chk_alt">
					- ��Ż����Ʈ���� �ش� ������ �����Ѱ�� ������ ���������� �߼۵��� �ʽ��ϴ�.<br>
					- 1ȸ �߼۷��� ������� ���� ������ ���� �߼��� �ߴܵ� �� �ֽ��ϴ�.
					</td>
				</tr>
			</table>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
		<td></td>
		<td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
	</tr>
</table>

<br>
<table border="0" align="center" cellspacing="0" cellpadding="0">
	<tr>
		<td><input type="image" src="../image/btn_send_l.gif"></td>
	</tr>
</form>
</table>




<? include "../footer.php"; ?>