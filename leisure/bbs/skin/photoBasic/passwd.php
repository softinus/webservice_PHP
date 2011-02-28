<script language="javascript">
<!--
function bbsCheck(frm){
	if(frm.passwd != null && frm.passwd.value == ""){
		alert("비밀번호를 입력하세요");
		frm.passwd.focus();
		return false;
	}
}
-->
</script>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
	
<form action="<?=$act_url?>" method="post" onSubmit="return bbsCheck(this)">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="code" value="<?=$code?>">
<input type="hidden" name="bbs_idx" value="<?=$bbs_idx?>"> 
<input type="hidden" name="idx" value="<?=$idx?>"> 
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="category" value="<?=$category?>">
<input type="hidden" name="searchopt" value="<?=$searchopt?>">
<input type="hidden" name="searchkey" value="<?=$searchkey?>">

  <tr>
    <td>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="2" colspan="11" bgcolor="959595"></td>
      </tr>
      <tr>
        <td height="28" colspan="3" align="center"><?=$mode_msg?></td>
      </tr>
      <tr>
        <td height="1" colspan="11" bgcolor="dddddd"></td>
      </tr>
	    <tr>
        <td width="40%" height="28" align="right" style="padding-right:10px"><img src="<?=$skin_dir?>/image/list_txt_pw.gif"></td>
        <td width="1"><img src="<?=$skin_dir?>/image/list_vline.gif" width="1" height="17" /></td>
        <td width="60%" align="left" style="padding-left:10px"><?=$input_passwd?></td>
      </tr>
      <tr>
        <td height="1" colspan="11" bgcolor="dddddd"></td>
      </tr>
	    <tr>
        <td height="5" colspan="11"></td>
      </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><?=$confirm_btn?>&nbsp;<?=$cancel_btn?></td>
        </tr>
      </table></td>
  </tr>
</form>
</table>