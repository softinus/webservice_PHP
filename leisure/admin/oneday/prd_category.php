<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
if($mode == "update"){
   $sql = "select * from wiz_daycategory where catcode = '$catcode'";
   $result = mysql_query($sql) or error(mysql_error());
   $cat_info = mysql_fetch_object($result);
}
?>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">��������</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">�����з��� �����մϴ�.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="40%" valign="top">
			<table width="100%" border="0" cellspacing="1" cellpadding="0">
				<tr>
					<td valign="top">
						<table width="100%" height="400" border="0" cellspacing="6" cellpadding="6" bgcolor="B7AEAB">
							<tr>
								<td valign="top" bgcolor="#ffffff">
								<? include "category_list.php"; ?>
								</td>
							</tr>
						</table>
					</td>
					<td width="5"></td>
					<td>
						<br>
						<br>
						<br>
						<a href="category_save.php?mode=updateprior&posi=up&catcode=<?=$catcode?>&depthno=<?=$depthno?>"><img src="../image/cat_up.gif" border="0"></a><br><br><br><br>
						<a href="category_save.php?mode=updateprior&posi=down&catcode=<?=$catcode?>&depthno=<?=$depthno?>"><img src="../image/cat_down.gif" border="0"></a>
					</td>
					<td width="10"></td>
				</tr>
			</table>
		</td>
		<td width="60%" height="400" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
<script language="JavaScript" type="text/javascript">
<!--

function inputCheck(frm){
	if(frm.catname.value == ""){
		alert("�з����� �Է��ϼ���");
		frm.catname.focus();
		return false;
	}
}

function showCatsub(gubun){
	cat_sub.style.display = 'none';
	cat_sub2.style.display = 'none';

	if(gubun == "NON") cat_sub.style.display = 'none';
	else if(gubun == "FIL") cat_sub.style.display = '';
	else if(gubun == "HTM") cat_sub2.style.display = '';
}

function delConfirm(){
	if(confirm("ī�װ��� ���� �Ͻðڽ��ϱ�?")){
		document.location='category_save.php?mode=delete&catcode=<?=$catcode?>&depthno=<?=$depthno?>';
	}
}
-->
</script>
<?if($mode == "") $mode = "insert";?>

						<table width="100%" border="0" cellspacing="0" cellpadding="0"  valign="top">
						<form action="category_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
							<input type="hidden" name="tmp">
							<input type="hidden" name="mode" value="<?=$mode?>">
							<input type="hidden" name="catcode" value="<?=$catcode?>">
							<input type="hidden" name="depthno" value="<?=$depthno?>">
							<tr>
								<td bgcolor="D5D3D3">
									<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
										<tr>
											<td width="20%" class="t_name">��ġ</td>
											<td width="80%" class="t_value">
<?
$catname = "�ֻ���";

if($catcode != ""){
	$catcode1 = substr($catcode,0,2);
	$catcode2 = substr($catcode,0,4);
	$sql = "select * from wiz_daycategory where (catcode like '$catcode1%' and depthno = 1)
				or (catcode like '$catcode2%' and depthno = 2)
				or (catcode = '$catcode')";
	$result = mysql_query($sql) or error(mysql_error());

	while($prow = mysql_fetch_object($result)){
		$catname .= " &gt; <a href=prd_category.php?mode=update&catcode=$prow->catcode>$prow->catname</a>";
	}
}
echo $catname;
?>
											</td>
										</tr>
										<tr>
											<td class="t_name">�з���</td>
											<td class="t_value">
												<input name="catname" value="<?=$cat_info->catname?>" size="30" type="text" class="input">&nbsp; 
												<input type="checkbox" name="catuse" value="N" <? if($cat_info->catuse == "N") echo "checked"; ?>>�з�����
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<table width="10" height="10" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td></td>
							</tr>
						</table>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<?if($mode == "insert"){?>
							<tr>
								<td align="center"><input type="image" src="../image/btn_insert_l.gif"></td>
							</tr>
<?}else if($mode == "update"){?>
							<tr>
								<td width="100%" align="center">
									<input type="image" src="../image/btn_edit_l.gif">&nbsp; 
									<img src="../image/btn_delete_l.gif" style="cursor:hand" onClick="delConfirm();">
								</td>
							</tr>
<?
}
?>
						</form>
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
											- ī�װ� ���� ������ ī�װ� Ŭ���� �����ʿ��� �����մϴ�.<br>
											- ī�װ� ���� ����� Ŭ���� ���Ʒ� ȭ��ǥ�� �̿��մϴ�.<br>
											- ��ǰ ����, ���� ����� �Է��ϸ� ���Ƿ� ������ ������ �����մϴ�.<br>&nbsp; &nbsp;���� ����� �̹����� ���� �� �ֽ��ϴ�.
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
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<? include "../footer.php"; ?>