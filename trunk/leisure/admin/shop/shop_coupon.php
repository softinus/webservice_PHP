<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="JavaScript" type="text/javascript">
<!--
function delCoupon(idx){
   if(confirm('�ش������� �����Ͻðڽ��ϱ�?')){
      document.location = "shop_save.php?mode=shop_coupon&sub_mode=delete&idx=" + idx;
   }
}

// ��ǰ������ �߱�ȸ��
function popMycoupon(prdcode){
	var url = "shop_mycoupon.php?prdcode=" + prdcode;
	window.open(url,"MyCouponList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

//-->
</script>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">��������</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">������ ���,�����մϴ�.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
<form name="frm" action="shop_save.php" method="post">
	<input type="hidden" name="tmp">
	<input type="hidden" name="mode" value="coupon_use">
	<tr> 
		<td width="15%" class="t_name">������뿩��</td>
		<td width="85%" class="t_value">
			<input type="radio" name="coupon_use" value="Y" <? if($oper_info->coupon_use == "Y") echo "checked"; ?>>����� 
			<input type="radio" name="coupon_use" value="N" <? if($oper_info->coupon_use == "N") echo "checked"; ?>>������ &nbsp; 
			<input type="image" src="../image/btn_confirm_s.gif" align="absmiddle">
		</td>
	</tr>
</form>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> �̺�Ʈ����</td>
		<td align="right"><img src="../image/btn_couponadd.gif" style="cursor:hand" onClick="document.location='shop_coupon_input.php?sub_mode=insert';" class="sbtn"></td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td class="t_rd" colspan=20></td></tr>
	<tr class="t_th">
		<th width="8%">��ȣ</th>
		<th>������</th>
		<th>�Ⱓ</th>
		<th>����</th>
		<th>����</th>
		<th>���</th>
	</tr>
	<tr><td class="t_rd" colspan=20></td></tr>
<?
$sql = "select * from wiz_coupon order by idx desc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$no = $total;
while($row = mysql_fetch_array($result)){
if($row[coupon_limit] == "N") $row[coupon_amount] = "�������Ѿ���";
?>
	<tr> 
		<td height="30" align="center"><?=$no?></td>
		<td><?=$row[coupon_name]?></td>
		<td align="center"><?=$row[coupon_sdate]?> ~ <?=$row[coupon_edate]?></td>
		<td align="center"><?=$row[coupon_dis]?><?=$row[coupon_type]?></td>
		<td align="center"><?=$row[coupon_amount]?></td>
		<td align="center">
			<img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='shop_coupon_input.php?sub_mode=update&idx=<?=$row[idx]?>'">
			<img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="delCoupon('<?=$row[idx]?>');">
		</td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
$no--;
}
if($total <= 0){
?>
	<tr align="center"><td height="30" colspan="10" align="center">��ϵ� ������ �����ϴ�.</td></tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
}
?>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> ��ǰ������</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td class="t_rd" colspan=20></td></tr>
	<tr class="t_th">
		<th width="8%">��ȣ</th>
		<th>��ǰ��</th>
		<th>�Ⱓ</th>
		<th>����</th>
		<th>����</th>
		<th width="15%">���</th>
	</tr>
	<tr><td class="t_rd" colspan=20></td></tr>
<?
$sql = "select prdcode from wiz_product where coupon_use='Y' order by prior desc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

$rows = 12;
$lists = 5;
$page_count = ceil($total/$rows);
if($page < 1 || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $total-$start;

$sql = "select prdcode,prdname,coupon_dis,coupon_type,coupon_sdate,coupon_edate,coupon_amount,coupon_limit from wiz_product where coupon_use='Y' order by prior desc limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_array($result)) && $rows){
	if($row[coupon_limit] == "N") $row[coupon_amount] = "�������Ѿ���";
?>
	<tr>
		<td height="30" align="center"><?=$no?></td>
		<td><a href="../product/prd_input.php?mode=update&prdcode=<?=$row[prdcode]?>"><?=$row[prdname]?></a></td>
		<td align="center"><?=$row[coupon_sdate]?> ~ <?=$row[coupon_edate]?></td>
		<td align="center"><?=$row[coupon_dis]?><?=$row[coupon_type]?></td>
		<td align="center"><?=$row[coupon_amount]?></td>
		<td align="center">
			<img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='../product/prd_input.php?mode=update&prdcode=<?=$row[prdcode]?>'">
			<img src="../image/btn_couponmem.gif" style="cursor:hand" onclick="popMycoupon('<?=$row[prdcode]?>')">
		</td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
	$no--;
	$rows--;
}
if($total <= 0){
?>
	<tr align="center"> 
		<td height="30" colspan="10" align="center">��ϵ� �������� ��ǰ�� �����ϴ�.</td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
}
?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td width="33%"></td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
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
						- �������� : �̺�Ʈ����,��ǰ������ ������ �����մϴ�.<br>
						&nbsp; ������ > ��ǰ���� > ��ǰ��Ͻ� ��ǰ�� ���������� ����<br>
						&nbsp; ���θ� > ��ǰ�������� ���� ��ǰ�� �������� �ٿ�ε� ���<br>
						&nbsp; ���θ� > �ֹ������Է� ���������� ������ȸ �� �����<br>
						&nbsp; ���θ� > �������������� ���� ��볻�� ��ȸ���<br><br>

						- �̺�Ʈ���� : �Ⱓ�� ���ξ׵��� �����Ͽ� ������ �����մϴ�. �ٿ���� ������ ��� ��ǰ���Խ� ��� �����մϴ�.<br>
						&nbsp; Ư����ǰ ���Խø� �Ǵ� Ư����ǰ�� �����ϰ� ����ϴ� ����� �������� �ʽ��ϴ�.<br><br>

						- ��ǰ������ : Ư����ǰ�� ���ؼ��� ������ �����ϸ� �ٿ���� ������ �ش� ��ǰ ���Խÿ��� ��� �����մϴ�.<br>
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