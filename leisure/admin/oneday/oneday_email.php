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

function mailView(prdcode){
	var url = "mail.php?prdcode="+prdcode;
	window.open(url, "�ڵ��ۼ�����Ȯ��","height=641, width=699, menubar=no, scrollbars=no, resizable=yes, toolbar=no, status=no, top=100, left=100");
}


//-->
</script>
<style type="text/css">
.button{padding:5px; overflow:visible; font-size:12px; font-weight:700; color:#fff; background:#bbb; border:1px solid #888;}
</style>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">�̸��Ͼ˸����</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">�̸��Ͼ˸����</td>
	</tr>
</table>
<br>



<?

$sql = "select * from wiz_dayproduct";
$result = mysql_query($sql) or error(mysql_error());
$all_total = mysql_num_rows($result);
$currentTime = time();


$sql = "select * from wiz_dayproduct";
$sql .= " order by wdate desc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$rows = 5;
$lists = 5;
$page_count = ceil($total/$rows);
if(!$page || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $start+1;



?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>�� ��ǰ�� : <b><?=$all_total?></b> , ����Ʈ ��ǰ�� : <b><?=$total?></b></td>
	</tr>
	<tr><td height="3"></td></tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td class="t_rd" colspan="20"></td></tr>
	<tr class="t_th">
		<th align="center">��ȣ</th>
		<th align="center">��ǰ��</th>
		<th align="center">�ǸŽ�����</th>
		<th align="center">�Ǹ�������</th>
		<th align="center">����</th>
		<th align="center">�ǸŰ�</th>
		<th align="center">������</th>
		<th align="center">������</th>
	</tr>
	<tr><td class="t_rd" colspan="20"></td></tr>
<?
$sql = "select * from wiz_dayproduct";
$sql .= " order by wdate desc";
$sql .="  limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result)) && $rows){
	if($row->reemail == "Y") $row->reemail = "��";
	else $row->reemail = "�ƴϿ�";
?>
	<input type="hidden"		name="prdname<?=$row->prdcode?>"		value="<?=$row->prdname?>">
	<input type="hidden"		name="selldate<?=$row->prdcode?>"			value="<?=$row->selldate?>">
	<input type="hidden"		name="selllastdate<?=$row->prdcode?>"	value="<?=$row->selllastdate?>">
	<input type="hidden"		name="conprice<?=$row->prdcode?>"		value="<?=$row->conprice?>">
	<input type="hidden"		name="sellprice<?=$row->prdcode?>"		value="<?=$row->sellprice?>">
	<input type="hidden"		name="discount_per<?=$row->prdcode?>"	value="<?=$row->discount_per?>">
	<tr>
		<td align="center" height="30"><?=$no?></td>
		<td align="left" style="padding-left:20px;"><?=$row->prdname?></td>
		<td align="center"><?=$row->selldate?></td>
		<td align="center"><?=$row->selllastdate?></td>
		<td align="center"><?=number_format($row->conprice)?>��</td>
		<td align="center"><?=number_format($row->sellprice)?>��</td>
		<td align="center"><?=$row->discount_per?>%</td>
		<td align="center"><img src="../image/btn_view_s.gif" style="cursor:hand" onClick="mailView('<?=$row->prdcode?>');"></td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
	$no++;
	$rows--;
}

if($total <= 0){
?>
	<tr><td height=30 colspan=10 align=center>��ϵ� ��ǰ�� �����ϴ�.</td></tr>
	<tr><td colspan='20' class='t_line'></td></tr>
<?
}
?>
</table>
<br />
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr> 
		<td width="33%"></td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
		<td width="33%"></td>
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
						<b>�̸��Ͼ˸������ ȸ������ ������ �ð��� �̸��Ϸ� �ڵ����� �߼��ϴ� ����� ���մϴ�.</b><br><br>
						<font color="red">�̸��Ͼ˸���� ���� ���ǻ���</font><br>
						- Ȩ������ ���������� �뷮�� ������ �߼��ϴ°� �Ұ����մϴ�. CAFE24�뷮���� ���񽺿� ������ ��õ�帳�ϴ�. ������뺰�� 10����[vat����]<br />
						- ���� ��ȣ���� ȸ�翡���� �뷮�� ������ �ڵ��߼��ϴ� ����� �������� �ʽ��ϴ�. ���Ϲ߼� ��������� �Ұ����մϴ�.<br />
						- ������ ���⸦ Ŭ�� �߼��� ���� ������ Ŭ������� ���� CAFE24�뷮���� ���񽺿��� ������ �ٿ��ֱ��� ������ �߼��ϸ� �˴ϴ�.<br />
						- CAFE24�뷮���� �߼۽� �������� �����Ƿ� ���ϴ� �ð��� �����ؼ� �߼��� �����մϴ�.
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
<? include "../footer.php"; ?>