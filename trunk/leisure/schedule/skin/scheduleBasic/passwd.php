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
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
	
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
        <td height="28" colspan="3" align="center"><?=$mode_msg?></td>
      </tr>
      </table>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	    	<td><img src="<?=$skin_dir?>/image/bar_bottom_bg_l.gif"></td>
        <td width="30%" height="28" align="right" style="padding-right:10px" background="<?=$skin_dir?>/image/bar_bottom_bg.gif">비밀번호</td>
        <td width="70%" align="left" style="padding-left:10px" background="<?=$skin_dir?>/image/bar_bottom_bg.gif"><?=$input_passwd?></td>
        <td><img src="<?=$skin_dir?>/image/bar_bottom_bg_r.gif"></td>
      </tr>
	    <tr>
        <td height="5" colspan="11"></td>
      </tr>
      </table>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><?=$confirm_btn?>&nbsp;&nbsp;<?=$cancel_btn?></td>
        </tr>
      </table></td>
  </tr>
</form>
</table>