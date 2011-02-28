<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="1" colspan="5" bgcolor="dddddd"></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" height="35">&nbsp;</td>
    <td width="50%" align="center">
    	
    	<? print_pagelist($cpage, $lists, $page_count, $param, "C"); ?>
    	
    </td>
    <td width="25%" align="right"></td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="5" cellspacing="1">
<form name="comment" action="save.php" method="post" onSubmit="return commentCheck(this);">
<input type="hidden" name="mode" value="comment">
<input type="hidden" name="code" value="<?=$code?>">
<input type="hidden" name="idx" value="<?=$idx?>">
<input type="hidden" name="tmp_vcode" value="<?=md5($norobot_key)?>">
  <tr>
    <td>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <?=$hide_passwd_start?>
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="5"></td>
            </tr>
            <tr>
              <td class="s01">이름</td>
              <td style="padding-left:10px"><input type="text" name="name" value="<?=$writer?>" onClick="memberCheck();" size="10" class="input" /></td>
              <td style="padding-left:10px" class="s01">비밀번호</td>
              <td style="padding-left:10px"><input type="password" name="passwd" onClick="memberCheck();" type="text" value="" size="10" class="input" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="3"></td>
      </tr>
      <?=$hide_passwd_end?>
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><textarea name="content" onClick="memberCheck();" cols="10" class="input" style="width:98%;height:40px"></textarea></td>
              <td width="60" align="right"><input type="image" src="<?=$skin_dir?>/image/bt_register.gif" width="65" height="48" /></td>
            </tr>
        </table></td>
      </tr>
      
      <?=$hide_spam_check_start?>
      <tr>
        <td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><?=$spam_check?></td>
            </tr>
          </table>
        </td>
      </tr>
      <?=$hide_spam_check_end?>
      
    </table></td>
  </tr>
  <tr>
  <td height="1" bgcolor="959595"></td>
  </tr>
</form>
</table>