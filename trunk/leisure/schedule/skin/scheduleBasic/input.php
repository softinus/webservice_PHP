<script language="JavaScript" src="/js/calendar.js"></script>
<script language="JavaScript">
<!--
function bbsCheck(frm){

  if(frm.name.value == ""){
    alert("�ۼ��ڸ� �Է��ϼ���.");
    frm.name.focus();
    return false;
  }
  if(frm.passwd != null && frm.passwd.value == ""){
    alert("��й�ȣ�� �Է��ϼ���.");
    frm.passwd.focus();
    return false;
  }
  if(frm.subject.value == ""){
    alert("������ �Է��ϼ���.");
    frm.subject.focus();
    return false;
  }
  if(frm.content.value == ""){
    alert("������ �Է��ϼ���.");
    frm.content.focus();
    return false;
  }
  

  if (frm.vcode != undefined && (hex_md5(frm.vcode.value) != md5_norobot_key)) {
  	alert("�ڵ���Ϲ����ڵ带 ��Ȯ�� �Է����ּ���.");
    frm.vcode.focus();
    return false;
	}
}
-->
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	
<form name="frm" action="save.php" method="post" enctype="multipart/form-data" onSubmit="return bbsCheck(this)">
<input type="hidden" name="code" value="<?=$code?>">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="idx" value="<?=$idx?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="searchopt" value="<?=$searchopt?>">
<input type="hidden" name="searchkey" value="<?=$searchkey?>">
<input type="hidden" name="prdcode" value="<?=$prdcode?>">
<input type="hidden" name="tmp_vcode" value="<?=md5($norobot_key)?>">

  <tr>
    <td height="2" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td width="89" height="28"><img src="<?=$skin_dir?>/image/view_t_writer.gif"></td>
    <td colspan="9" align="left" style="padding-left:5px"><input  name="name" value="<?=$name?>" type="text" size="30" class="input" /></td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  
  <?=$hide_passwd_start?>
  <tr>
    <td height="28"><img src="<?=$skin_dir?>/image/write_t_password.gif"></td>
    <td colspan="9" align="left" style="padding-left:5px"><input type="password" name="passwd" value="<?=$passwd?>" size="30" class="input" /> (�� ���� �� ���� �� �ʿ��մϴ�.) </td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <?=$hide_passwd_end?>
  
  <tr>	
    <td height="28"><img src="<?=$skin_dir?>/image/write_t_email.gif"></td>
    <td colspan="9" align="left" style="padding-left:5px"><input name="email" value="<?=$email?>" type="text" size="30" class="input" /></td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td height="28" align="center" background="<?=$skin_dir?>/image/write_t_bg2.gif"><b>��¥</b></td>
    <td colspan="9" align="left" style="padding-left:5px">
    	<table width="100%" cellspacing="0" cellpadding="0" border="0">
    		<tr>
    			<td>
	    			<input name="wdate" value="<?=$wdate?>" type="text" size="15" class="input" />
	    			<input type="button" value="�޷�" onClick="Calendar1('document.frm','wdate');" class="gbtn">
    			</td>
    		</tr>
    	</table>
    </td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td height="28"><img src="<?=$skin_dir?>/image/write_t_title.gif"></td>
    <td colspan="9" align="left" style="padding-left:5px">
    	<table width="100%" cellspacing="0" cellpadding="0" border="0">
    		<tr><td><?=$catlist?></td><td width="100%"><input name="subject" value="<?=$subject?>" type="text" style="width:80%;word-break:break-all;" class="input" /></td></tr>
    	</table>
    </td>
  </tr>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  
  <tr>
  	<td height="28" background="<?=$skin_dir?>/image/write_t_bg2.gif"><img src="<?=$skin_dir?>/image/write_t_contents.gif"></td>
    <td colspan="11" valign="top" style="padding-left:5px">
    	
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" align="left">
              <input type="checkbox" name="ctype" value="H" <?=$ctype_checked?>>HTML���
    	        <input type="checkbox" name="privacy" value="Y" <?=$privacy_checked?>> ��б�
    	        <?=$hide_notice_start?>
    	        <input type="checkbox" name="notice" value="Y" <?=$notice_checked?>> ������
    	        <?=$hide_notice_end?>
            </td>
          </tr>
          <tr>
            <td align="right" valign="top">
            	<?
							if($bbs_info[editor] == "Y"){
								$edit_content = $content;
								include WIZHOME_PATH."/webedit/WIZEditor.html";
							}else{
							?>
              <textarea name="content" cols="85" rows="13" class="input" style="width:100%;word-break:break-all;"><?=$content?></textarea>
							<?
							}
							?>
		        </td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    
    </td>
  </tr>
  
  <?=$hide_upfile_start?>
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td height="28"><img src="<?=$skin_dir?>/image/view_t_file.gif"></td>
    <td colspan="9" align="left" style="padding-left:5px"><input type="file" name="upfile1" size="20" class="input" /> <?=$upfile1?></td>
  </tr>
	<?=$hide_upfile_end?>
	
	<?=$hide_movie_start?>
	<tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td height="28" align="center" background="<?=$skin_dir?>/image/write_t_bg2.gif"><b>������</b></td>
    <td colspan="9" align="left" style="padding-left:5px">
    	<input type="file" name="movie1" size="20" class="input" /> <?=$movie1?>
    </td>
  </tr>
  <?=$hide_movie_end?>
  
  
  <?=$hide_spam_check_start?>
	<tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
  </tr>
  <tr>
    <td height="30" align="center" background="<?=$skin_dir?>/image/write_t_bg2.gif"><img src="<?=$skin_dir?>/image/write_t_code.gif"></td>
    <td colspan="9" align="left" style="padding-left:5px">
    	<?=$spam_check?>
    </td>
  </tr>
  <?=$hide_spam_check_end?>
  
  <tr>
    <td height="1" colspan="11" bgcolor="dddddd"></td>
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