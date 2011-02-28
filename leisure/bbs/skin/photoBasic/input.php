<script language="JavaScript">
<!--
function bbsCheck(frm){

  if(frm.name.value == ""){
    alert("작성자를 입력하세요.");
    frm.name.focus();
    return false;
  }
  if(frm.passwd != null && frm.passwd.value == ""){
    alert("비밀번호를 입력하세요.");
    frm.passwd.focus();
    return false;
  }
  if(frm.subject.value == ""){
    alert("제목을 입력하세요.");
    frm.subject.focus();
    return false;
  }
  if(frm.content.value == ""){
	alert("내용을 입력하세요.");
	try{ frm.content.focus(); }
	catch(e){ }
	return false;
  }

  if (frm.vcode != undefined && (hex_md5(frm.vcode.value) != md5_norobot_key)) {
  	alert("자동등록방지코드를 정확히 입력해주세요.");
    frm.vcode.focus();
    return false;
	}
	
}
-->
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	
<form name="frm" action="save.php" method="post" enctype="multipart/form-data" onSubmit="return bbsCheck(this)">
<input type="hidden" name="ptype" value="save">
<input type="hidden" name="code" value="<?=$code?>">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="idx" value="<?=$idx?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="prdcode" value="<?=$prdcode?>">
<input type="hidden" name="searchopt" value="<?=$searchopt?>">
<input type="hidden" name="searchkey" value="<?=$searchkey?>">
<input type="hidden" name="tmp_vcode" value="<?=md5($norobot_key)?>">

  <tr>
    <td height="2" colspan="11" bgcolor="959595"></td>
  </tr>
  <tr>
    <td width="15%" height="28" align="center"><img src="<?=$skin_dir?>/image/list_txt_writer.gif"></td>
    <td width="1"><img src="<?=$skin_dir?>/image/list_vline.gif" width="1" height="17" /></td>
    <td colspan="9" align="left" style="padding-left:10px"><input  name="name" value="<?=$name?>" type="text" size="30" class="input" /></td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  
  <?=$hide_passwd_start?>
  <tr>
    <td align="center" height="28"><img src="<?=$skin_dir?>/image/list_txt_pw.gif"></td>
    <td width="1"><img src="<?=$skin_dir?>/image/list_vline.gif" width="1" height="17" /></td>
    <td colspan="9" align="left" style="padding-left:10px" class="s01"><input type="password" name="passwd" value="<?=$passwd?>" size="30" class="input" /> (글 수정 및 삭제 시 필요합니다.) </td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <?=$hide_passwd_end?>
  
  
  <tr>	
    <td align="center" height="28"><img src="<?=$skin_dir?>/image/write_txt_email.gif"></td>
    <td width="1"><img src="<?=$skin_dir?>/image/list_vline.gif" width="1" height="17" /></td>
    <td colspan="9" align="left" style="padding-left:10px"><input name="email" value="<?=$email?>" type="text" size="30" class="input" /></td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td align="center" height="28"><img src="<?=$skin_dir?>/image/list_txt_title.gif"></td>
    <td width="1"><img src="<?=$skin_dir?>/image/list_vline.gif" width="1" height="17" /></td>
    <td colspan="9" align="left" style="padding-left:10px">
    	<table width="100%" cellspacing="0" cellpadding="0" border="0">
    		<tr><td><?=$catlist?></td><td width="100%"><input name="subject" value="<?=$subject?>" type="text" style="width:80%;word-break:break-all;" class="input" /></td></tr>
    	</table>
    </td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td colspan="11" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" align="left">
              <input type="checkbox" name="ctype" value="H" <?=$ctype_checked?>>HTML사용
    	        <input type="checkbox" name="privacy" value="Y" <?=$privacy_checked?>> 비밀글
    	        <?=$hide_notice_start?>
    	        <input type="checkbox" name="notice" value="Y" <?=$notice_checked?>> 공지글
    	        <?=$hide_notice_end?>
            </td>
          </tr>
          <tr>
            <td align="right" valign="top">
            	<?
							if($bbs_info[editor] == "Y"){
								$edit_content = $content;
								include WIZSHOP_PATH."/admin/webedit/WIZEditor.html";
							}else{
							?>
              <textarea name="content" cols="85" rows="13" class="input" style="width:98%;word-break:break-all;"><?=$content?></textarea>
							<?
							}
							?>
		        </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
  <?=$hide_upfile_start?>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td align="center" height="28">첨부파일</td>
    <td width="1"><img src="<?=$skin_dir?>/image/list_vline.gif" width="1" height="17" /></td>
    <td colspan="9" align="left" style="padding-left:10px">
    	<input type="file" name="upfile1" size="20" class="input" /> <?=$upfile1?>
    </td>
  </tr>
	<?=$hide_upfile_end?>
	
	<?=$hide_movie_start?>
	<tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td align="center" height="28">동영상</td>
    <td width="1"><img src="<?=$skin_dir?>/image/list_vline.gif" width="1" height="17" /></td>
    <td colspan="9" align="left" style="padding-left:10px">
    	<input type="file" name="movie1" size="20" class="input" /> <?=$movie1?>
    </td>
  </tr>
  <?=$hide_movie_end?>
  
  <?=$hide_spam_check_start?>
	<tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td align="center" height="28">자동등록<br>방지코드</td>
    <td width="1"><img src="<?=$skin_dir?>/image/list_vline.gif" width="1" height="17" /></td>
    <td colspan="9" align="left" style="padding-left:10px" class="s01"><?=$spam_check?> </td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <?=$hide_spam_check_end?>
  
  <tr>
    <td height="1" colspan="11" bgcolor="959595"></td>
  </tr>
  <tr>
    <td height="5" colspan="11"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td align="left"><?=$list_btn?></td>
    <td align="right"><?=$confirm_btn?>&nbsp;<?=$cancel_btn?></td>
  </tr>
</form>
</table>