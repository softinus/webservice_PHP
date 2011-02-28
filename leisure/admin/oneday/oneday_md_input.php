<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
if($mode == "update"){
   
	$sql = "select * from wiz_md where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$md_info = mysql_fetch_object($result);
	
	$tel = explode("-",$md_info->tel);
	$tel1 = $tel[0];
	$tel2 = $tel[1];
	$tel3 = $tel[2];
	$hp = explode("-",$md_info->hp);
	$hp1 = $hp[0];
	$hp2 = $hp[1];
	$hp3 = $hp[2];

}else{
	$mode = "insert";
}
?>

<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
   
   if(frm.md_id.value == ""){
      alert("MD 아이디를 입력하세요");
      frm.md_id.focus();
      return false;
   }
   if(frm.md_pw.value == ""){
      alert("MD 비밀번호를 입력하세요");
      frm.md_pw.focus();
      return false;
   }
   if(frm.md_name.value == ""){
      alert("MD 이름을 입력하세요");
      frm.md_name.focus();
      return false;
   }
}

//-->
</script>
<script language="javascript">
</script>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">MD 등록</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">MD 정보를 등록합니다.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="md_save.php" method="post" onSubmit="return inputCheck(this);">
	<input type="hidden" name="mode" value="<?=$mode?>">
	<?if($mode=="update"){?>
	<input type="hidden" name="idx" value="<?=$md_info->idx?>">
	<?}?>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
				<tr>
					<td class="t_name">이름 <font color=red>*</font></td>
					<td class="t_value"><input name="md_name" type="text" value="<?=$md_info->md_name?>" class="input"></td>
					<td class="t_name">이메일 <font color=red>*</font></td>
					<td class="t_value"><input name="md_email" type="text" value="<?=$md_info->md_email?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">전화번호</td>
					<td class="t_value">
						<input type="text" name="tel1" value="<?=$tel1?>" size="5" class="input">- 
						<input type="text" name="tel2" value="<?=$tel2?>" size="5" class="input">- 
						<input type="text" name="tel3" value="<?=$tel3?>" size="5" class="input">
					</td>
					<td class="t_name">휴대폰</td>
					<td class="t_value">
						<input type="text" name="hp1" value="<?=$hp1?>"  size="5" class="input">- 
						<input type="text" name="hp2" value="<?=$hp2?>"  size="5" class="input">- 
						<input type="text" name="hp3" value="<?=$hp3?>"  size="5" class="input">
					</td>
				</tr>
				<tr>
					<td height="25" class="t_name">메모</td>
					<td class="t_value" colspan="3"><textarea name="memo" rows="5" cols="90" class="textarea" style="width:100%"><?=$md_info->memo ?></textarea></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<input type="image" src="../image/btn_confirm_l.gif">&nbsp; 
			<img src="../image/btn_list_l.gif" style="cursor:hand" onclick="document.location='oneday_md.php';">
		</td>
	</tr>
</form>
</table>

<? include "../footer.php"; ?>