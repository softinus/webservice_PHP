<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: �̺�Ʈ�����߼� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
function inputCheck(frm){
	if(frm.seluser.value == ""){
		alert("��������ȸ���� �Է��ϼ���");
		frm.seluser.focus();
		return false;
	}
}

function allcheck(obj){

	var formObj = document.frm;

	for(var i=0; i<formObj.elements.length; i++){

		if(formObj.elements[i].name == "idx[]"){
			if(obj.checked == true){
				formObj.elements[i].checked=true
			}else{
				formObj.elements[i].checked=false
			}
		}
	}

}

//-->
</script>
</head>
<body>
<table width="100%" border="0" cellpadding=6 cellspacing=0>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td class="tit_sub"><img src="../image/ics_tit.gif"> �̺�Ʈ  �������� �߼�</td>
				</tr>
			</table>

			<table width="100%" border="0" cellpadding=2 cellspacing=1 class="t_style">
			<form name="frm" action="coupon_post.php" method="post" onSubmit="return inputCheck(this);">
				<input type="hidden" name="mode" value="sendsms">
				<input type="hidden" name="se_name" value="<?=$shop_info->shop_name?>">
				<input type="hidden" name="se_tel" value="<?=$shop_info->shop_hand?>">
				<tr>
					<td height="30" align=center class="t_name">����ȸ��</td>
					<td class="t_value">
						<textarea name="seluser" rows="2" cols="20" class="textarea" style="width:100%"><?=$seluser?></textarea>
						<table>
							<tr>
								<td>����) test1,test2,test3... (ID)</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br />

			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td class="tit_sub"><img src="../image/ics_tit.gif"> �̺�Ʈ���� ���</td>
					<td align="right"></td>
				</tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td class="t_rd" colspan=20></td></tr>
				<tr class="t_th">
					<th width="8%"></th>
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
					<td height="30" align="center"><input type="radio" name="idx" value="<?=$row[idx]?>" /></td>
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

			<table align="center" border="0" cellpadding=0 cellspacing=0>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td><input type="image" src="../image/btn_send_l.gif"> &nbsp; <img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();"></td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>