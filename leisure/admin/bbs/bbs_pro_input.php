<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
if($mode == "") $mode = "insert";

if($mode == "insert"){

	$bbs_info[simgsize] = "120";
	$bbs_info[mimgsize] = "500";
	$bbs_info[permsg] = "������ �����ϴ�.";
	$bbs_info[line] = "4";

}else if($mode == "update"){
	$sql = "select * from wiz_bbsinfo where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_info = mysql_fetch_array($result);
}
?>

<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
   
   if(frm.code.value == ""){
      alert('�Խ��� ������(db��)�� �Է��ϼ���.');
      frm.code.focus();
      return false;
   }
   
   if(frm.title.value == ""){
      alert('�Խ��� �ѱ۸� �Է��ϼ���.');
      frm.title.focus();
      return false;
   }
   
   if(frm.rows.value == ""){
      alert('��������¼� �Է��ϼ���.');
      frm.rows.focus();
      return false;
   }
   if(frm.lists.value == ""){
      alert('����Ʈ��¼� �Է��ϼ���.');
      frm.lists.focus();
      return false;
   }

}

function popCategory(title) {
<?php
if(!strcmp($mode, "insert")) {
?>
	alert("�Խ��� �߰� �� ī�װ��� ������ �� �ֽ��ϴ�.");
<?php
} else {
?>
	var url = "category.php?code=<?=$code?>&title=" + title;
	window.open(url,"BBSCategory","height=300, width=700, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
<?php
}
?>

}
//-->
</script>

	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">�Խ��Ǽ���</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">�Խ��� ����� �󼼼��� �մϴ�.</td>
	    </tr>
	  </table>			
	  <br>	  
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form name="frm" action="bbs_pro_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
      <input type="hidden" name="mode" value="<?=$mode?>">
      <input type="hidden" name="page" value="<?=$page?>">
        <tr>
          <td>

			      <table width="100%" border="0" cellspacing="0" cellpadding="2">
						  <tr>
						    <td class="tit_sub"><img src="../image/ics_tit.gif"> �⺻����</td>
						  </tr>
						</table>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td class="t_name">������(db��) <font color=red>*</font></td>
                <td class="t_value" colspan="3"><input name="code" type="text" size="30" value="<?=$bbs_info[code]?>" maxlength="30" <? if($mode == "update") echo "readonly"; ?> class="input"></td>
              </tr>
              <tr>
                <td class="t_name">�ѱ۸� <font color=red>*</font></td>
                <td class="t_value" colspan="3"><input name="title" type="text" size="30" value="<?=$bbs_info[title]?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">Ÿ�̵��̹���</td>
                <td class="t_value" colspan="3">
                <?
                if($bbs_info[titleimg] != "") echo "<img src=/data/bbs/$code/$bbs_info[titleimg] width=500><a href=bbs_pro_save.php?mode=del_titleimg&code=$code><font color=red>[����]</font></a><br>";
                ?>
                <input name="titleimg" type="file" size="30" class="input">
                </td>
              </tr>
              <tr> 
                <td class="t_name">�Խ����ּ�</td>
                <td class="t_value" colspan="3">
                http://<?=$HTTP_HOST?>/bbs/list.php?code=<?=$bbs_info[code]?> &nbsp; 
                <a href="http://<?=$HTTP_HOST?>/bbs/list.php?code=<?=$bbs_info[code]?>" target="_blank"><img src="../image/btn_overview.gif" border="0" align="absmiddle"></a></td>
              </tr>
              <!-- ���/�ϴ����� 
              <tr>
                <td class="t_name">�������</td>
                <td class="t_value" colspan="3"><input name="header" type="text" size="30" value="<?=$bbs_info[header]?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">�ϴ�����</td>
                <td class="t_value" colspan="3"><input name="footer" type="text" size="30" value="<?=$bbs_info[footer]?>" class="input"></td>
              </tr>
              ���/�ϴ����� //-->
              <tr>
                <td class="t_name">ī�װ�</td>
                <td class="t_value" colspan="3">
                	�Խ��� �߰� �� ī�װ��� ������ �� �ֽ��ϴ�. <br>
                	<select name="bbs_cat">
                		<option value="">:: ī�װ� ::</option>
                	<?
                	$sql = "select * from wiz_bbscat where code = '$code' order by idx asc";
                	$result = mysql_query($sql) or error(mysql_error());
                	while($cat_row = mysql_fetch_array($result)) {
                	?>
                		<option value="<?=$cat_row[idx]?>"><?=$cat_row[catname]?></option>
                	<?
                	}
                	?>
                	</select>
                	<img src="../image/btn_category_s.gif" style="cursor:hand" onclick="popCategory('<?=$bbs_info[title]?>')">
                </td>
              </tr>
              <tr>
                <td class="t_name">�Խ��ǰ�����</td>
                <td class="t_value" colspan="3">���̵� ��ǥ�� �и� ��)admin,admin1,admin3<br><input name="bbsadmin" type="text" size="60" value="<?=$bbs_info[bbsadmin]?>" class="input"></td>
              </tr>
              <tr> 
                <td width="15%" class="t_name">��뿩��</td>
                <td width="35%" class="t_value">
                  <input type="radio" name="usetype" value="Y" <? if($bbs_info[usetype] == "Y" || $bbs_info[usetype] == "") echo "checked"; ?>>�����
                  <input type="radio" name="usetype" value="N" <? if($bbs_info[usetype] == "N") echo "checked"; ?>>������
                </td> 
                <td width="15%" class="t_name">�Խ���Ÿ��</td>
                <td width="35%" class="t_value">
                	<input type="radio" name="skin" value="bbsBasic" <? if(!strcmp($bbs_info[skin], "bbsBasic") || empty($bbs_info[skin])) echo "checked"; ?>> �Խ���
                	<input type="radio" name="skin" value="photoBasic" <? if(!strcmp($bbs_info[skin], "photoBasic")) echo "checked"; ?>> ����Խ���
                	<input type="radio" name="skin" value="formBasic" <? if(!strcmp($bbs_info[skin], "formBasic")) echo "checked"; ?>> ������                	
                  <!--input type="radio" name="type" value="BBS" <? if($bbs_info[type] == "BBS" || empty($bbs_info[type])) echo "checked"; ?>>�Խ���
                  <input type="radio" name="type" value="PRD" <? if($bbs_info[type] == "PRD") echo "checked"; ?>>��ǰQ&A
                  <input type="radio" name="type" value="RV" <? if($bbs_info[type] == "RV") echo "checked"; ?>>��ǰ�ı�//-->
                </td>
              </tr>
              <tr>
                <td class="t_name">�ڵ� ��б�</td>
                <td class="t_value" colspan="3">
                  <input type="checkbox" name="privacy" value="Y" <? if($bbs_info[privacy] == "Y") echo "checked"; ?>>�ۼ��ڿ� ��ڸ� ��������
                </td>
                <!--td class="t_name">�Խ��ǽ�Ų</td>
                <td class="t_value">
                <select name="skin">
                <?
                $dh = opendir("../../bbs/skin");
                while(($file = readdir($dh)) !== false){
                	if($file != "." && $file != ".."){
                		$file_list[] = $file;
                	}
                }
                sort ($file_list); reset ($file_list);
                for($ii=0;$ii<count($file_list);$ii++){
                ?>
                <option value="<?=$file_list[$ii]?>"><?=$file_list[$ii]?></option>
                <?
                }
                ?>
                </select>
                </td//-->
              </tr>
              <tr>
                <td class="t_name">����</td>
                <td class="t_value" colspan="3">
                  <table width="98%" border="0" cellpadding="0" cellspacing="0">
                    <tr class="t_name">
                      <td width="20%" align="center" height="25">��Ϻ���</td>
                      <td width="20%" align="center">���뺸��</td>
                      <td width="20%" align="center">�۾���</td>
                      <td width="20%" align="center">��۾���</td>
                      <td width="20%" align="center">�ڸ�Ʈ����</td>
                    </tr>
                    <tr>
                      <td align="center" height="25">
                        <select name="lpermi">
                        <option value="">��ü</option>
                        <?=level_list();?>
                        <option value="0">������</option>
                        </select>
                      </td>
                      <td align="center">
                        <select name="rpermi">
                        <option value="">��ü</option>
                        <?=level_list();?>
                        <option value="0">������</option>
                        </select>
                      </td>
                      <td align="center">
                        <select name="wpermi">
                        <option value="">��ü</option>
                        <?=level_list();?>
                        <? if(!strcmp($code, "review")) { ?>
                        <option value="-1">����ȸ��</option>
                      	<? } ?>
                        <option value="0">������</option>
                        </select>
                      </td>
                      <td align="center">
                        <select name="apermi">
                        <option value="">��ü</option>
                        <?=level_list();?>
                        <option value="0">������</option>
                        </select>
                      </td>
                      <td align="center">
                        <select name="cpermi">
                        <option value="">��ü</option>
                        <?=level_list();?>
                        <option value="0">������</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                  <script language="javascript">
                    <!--
                    /*
                      skin = document.frm.skin;
                      for(ii=0; ii<skin.length; ii++){
                         if(skin.options[ii].value == "<?=$bbs_info[skin]?>")
                            skin.options[ii].selected = true;
                      }
                    */
                      lpermi = document.frm.lpermi;
                      for(ii=0; ii<lpermi.length; ii++){
                         if(lpermi.options[ii].value == "<?=$bbs_info[lpermi]?>")
                            lpermi.options[ii].selected = true;
                      }
                      rpermi = document.frm.rpermi;
                      for(ii=0; ii<rpermi.length; ii++){
                         if(rpermi.options[ii].value == "<?=$bbs_info[rpermi]?>")
                            rpermi.options[ii].selected = true;
                      }
                      wpermi = document.frm.wpermi;
                      for(ii=0; ii<wpermi.length; ii++){
                         if(wpermi.options[ii].value == "<?=$bbs_info[wpermi]?>")
                            wpermi.options[ii].selected = true;
                      }
                      apermi = document.frm.apermi;
                      for(ii=0; ii<apermi.length; ii++){
                         if(apermi.options[ii].value == "<?=$bbs_info[apermi]?>")
                            apermi.options[ii].selected = true;
                      }
                      cpermi = document.frm.cpermi;
                      for(ii=0; ii<cpermi.length; ii++){
                         if(cpermi.options[ii].value == "<?=$bbs_info[cpermi]?>")
                            cpermi.options[ii].selected = true;
                      }
                    -->
                  </script>
                </td>
              </tr>
              <tr>
                <td rowspan="2" class="t_name">������ �������</td>
                <td class="t_value" colspan="3">
                	���޼��� : <input name="permsg" type="text" size="30" value="<?=$bbs_info[permsg]?>" class="input">&nbsp;
                	����� �̵������� : <input name="perurl" type="text" size="30" value="<?=$bbs_info[perurl]?>" class="input">
                </td>
              </tr>
              <tr>
                <td class="t_value" colspan="3">
                	<input type="radio" name="btn_view" value="N" <? if($bbs_info[btn_view] == "N" || $bbs_info[btn_view] == "") echo "checked"; ?>> �۾��� ��ư�� ������ ����
                	<input type="radio" name="btn_view" value="Y" <? if($bbs_info[btn_view] == "Y") echo "checked"; ?>> �۾��� ��ư�� ���̰� Ŭ�� �� ���â
                </td>
              </tr>
              <tr>
                <td class="t_name">�̹���ũ��</td>
                <td class="t_value" colspan="3">
                	���������  : <input name="simgsize" type="text" size="9" value="<?=$bbs_info[simgsize]?>" class="input">�ȼ� &nbsp;
                	����������  : <input name="mimgsize" type="text" size="9" value="<?=$bbs_info[mimgsize]?>" class="input">�ȼ�
                </td>
              </tr>
              <tr>
                <td class="t_name">�̹�������</td>
                <td class="t_value" colspan="3">
                	<input type="checkbox" name="imgview" value="N" <? if($bbs_info[imgview] == "N") echo "checked"; ?>>÷�������� �̹����� ��� ���� ���������� �̹��� ���߱�
                </td>
              </tr>
              <tr>
                <td class="t_name">�̹��� ÷������ ����</td>
                <td class="t_value" colspan="3">
                	<input type="radio" name="img_align" value="LEFT" <? if($bbs_info[img_align] == "LEFT" || $bbs_info[img_align] == "") echo "checked"; ?>> ��������
                	<input type="radio" name="img_align" value="CENTER" <? if($bbs_info[img_align] == "CENTER") echo "checked"; ?>> �߾�����
                	<input type="radio" name="img_align" value="RIGHT" <? if($bbs_info[img_align] == "RIGHT") echo "checked"; ?>> ��������
                </td>
              </tr>
              <tr>
                <td height="10" align="left" class="t_name">���� �ϴܿ� ��Ϻ���</td>
                <td class="t_value" colspan="3">
                	<input type="radio" name="view_list" value="Y" <? if($bbs_info[view_list] == "Y") echo "checked"; ?>> �����
                	<input type="radio" name="view_list" value="N" <? if($bbs_info[view_list] == "N" || $bbs_info[view_list] == "") echo "checked"; ?>> ������
                </td>
              </tr>
              <tr>
                <td class="t_name">���Ա�üũ���</td>
                <td class="t_value" colspan="3">
                	<input type="radio" name="spam_check" value="Y" <? if($bbs_info[spam_check] == "Y" || $bbs_info[spam_check] == "") echo "checked"; ?>>�����
                	<input type="radio" name="spam_check" value="N" <? if($bbs_info[spam_check] == "N") echo "checked"; ?>>������
                </td>
              </tr>
              <tr>
                <td class="t_name">��¥����(���������)</td>
                <td class="t_value">
                	<select name=datetype_list>
                		<option value="">:: ��������� :: </option>
                		<option value="%y.%m.%d"><?= date('y.m.d') ?></option>
                		<option value="%y/%m/%d"><?= date('y/m/d') ?></option>
                		<option value="%y-%m-%d"><?= date('y-m-d') ?></option>
                		<option value="%Y.%m.%d"><?= date('Y.m.d') ?></option>
                		<option value="%Y/%m/%d"><?= date('Y/m/d') ?></option>
                		<option value="%Y-%m-%d"><?= date('Y-m-d') ?></option>
                		<option value="%Y�� %m�� %d��"><?= date('Y�� m�� d��') ?></option>
                		<option value="%Y-%m-%d %H:%i"><?= date('Y-m-d H:i') ?></option>
                		<option value="%Y-%m-%d %H:%i %p"><?= date('Y-m-d h:i A') ?></option>
                	</select>
                  <script language="javascript">
                    <!--
                      datetype_list = document.frm.datetype_list;
                      for(ii=0; ii<datetype_list.length; ii++){
                         if(datetype_list.options[ii].value == "<?=$bbs_info[datetype_list]?>")
                            datetype_list.options[ii].selected = true;
                      }
                    -->
                  </script>
                </td>
                <td class="t_name">��¥����(����������)</td>
                <td class="t_value">
                	<select name=datetype_view>
                		<option value="">:: ���������� :: </option>
                		<option value="%y.%m.%d"><?= date('y.m.d') ?></option>
                		<option value="%y/%m/%d"><?= date('y/m/d') ?></option>
                		<option value="%y-%m-%d"><?= date('y-m-d') ?></option>
                		<option value="%Y.%m.%d"><?= date('Y.m.d') ?></option>
                		<option value="%Y/%m/%d"><?= date('Y/m/d') ?></option>
                		<option value="%Y-%m-%d"><?= date('Y-m-d') ?></option>
                		<option value="%Y�� %m�� %d��"><?= date('Y�� m�� d��') ?></option>
                		<option value="%Y-%m-%d %H:%i"><?= date('Y-m-d H:i') ?></option>
                		<option value="%Y-%m-%d %H:%i %p"><?= date('Y-m-d h:i A') ?></option>
                	</select>
                  <script language="javascript">
                    <!--
                      datetype_view = document.frm.datetype_view;
                      for(ii=0; ii<datetype_view.length; ii++){
                         if(datetype_view.options[ii].value == "<?=$bbs_info[datetype_view]?>")
                            datetype_view.options[ii].selected = true;
                      }
                    -->
                  </script>
                </td>
              </tr>
              <tr>
                <td height="30" class="t_name">��������</td>
                <td class="t_value">
                	<input type="radio" name="editor" value="Y" <? if($bbs_info[editor] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="editor" value="N" <? if($bbs_info[editor] == "N" || $bbs_info[editor] == "") echo "checked"; ?>>������
                </td>
                <td height="30" class="t_name">��õ���</td>
                <td class="t_value">
                	<input type="radio" name="recom" value="Y" <? if($bbs_info[recom] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="recom" value="N" <? if($bbs_info[recom] == "N" || empty($bbs_info[recom])) echo "checked"; ?>>������
                </td>
              </tr>
              <tr>
                <td height="30" class="t_name">���Ͼ��ε�</td>
                <td class="t_value">
                  <input type="radio" name="upfile" value="Y" <? if($bbs_info[upfile] == "Y" || empty($bbs_info[upfile])) echo "checked"; ?>>�����
                  <input type="radio" name="upfile" value="N" <? if($bbs_info[upfile] == "N") echo "checked"; ?>>������
                </td>
                <td height="30" class="t_name">������</td>
                <td class="t_value">
                	<input type="radio" name="movie" value="Y" <? if($bbs_info[movie] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="movie" value="N" <? if($bbs_info[movie] == "N" || empty($bbs_info[movie])) echo "checked"; ?>>������
                </td>
              </tr>
              <tr>
                <td height="30" class="t_name">�ڸ�Ʈ ���</td>
                <td class="t_value" colspan="3">
                  <input type="radio" name="comment" value="Y" <? if($bbs_info[comment] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="comment" value="N" <? if($bbs_info[comment] == "N" || empty($bbs_info[comment])) echo "checked"; ?>>������
                </td>
                <!--td height="30" class="t_name">��� ���Ͼ˸�</td>
                <td class="t_value">
                  <input type="radio" name="remail" value="Y" <? if($bbs_info[remail] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="remail" value="N" <? if($bbs_info[remail] == "N" || empty($bbs_info[remail])) echo "checked"; ?>>������
                </td//-->
              </tr>
              <tr>
                <td height="30" class="t_name">��������¼� <font color=red>*</font></td>
                <td class="t_value"><input name="rows" type="text" value="<? if($bbs_info[rows] == "") echo "20"; else echo $bbs_info[rows]; ?>" class="input"></td>
                <td height="30" class="t_name">����Ʈ��¼� <font color=red>*</font></td>
                <td class="t_value"><input name="lists" type="text" value="<? if($bbs_info[lists] == "") echo "5"; else echo $bbs_info[lists]; ?>" class="input"></td>
              </tr>
              <tr>
                <td height="30" class="t_name">new �Ⱓ����</td>
                <td class="t_value"><input name="newc" type="text" value="<? if($bbs_info[newc] == "") echo "2"; else echo $bbs_info[newc]; ?>" class="input"></td>
                <td height="30" class="t_name">hot ��ȸ������</td>
                <td class="t_value"><input name="hotc" type="text" value="<? if($bbs_info[hotc] == "") echo "600"; else echo $bbs_info[hotc]; ?>" class="input"></td>
              </tr>
              <tr>
                <td height="30" class="t_name">���� ���ڼ�</td>
                <td class="t_value"><input name="subject_len" type="text" value="<?=$bbs_info[subject_len];?>" class="input"></td>
                <td height="30" class="t_name">�ٹٲ� �Խù���</td>
                <td class="t_value"><input name="line" type="text" value="<?= $bbs_info[line]; ?>" class="input"><br>(���䰶���� ���� ��Ų�� ��� ����)</td>
              </tr>
              <tr>
                <td class="t_name">�弳,����<br>���͸�</td>
                <td class="t_value" colspan="3">
                  <input type="checkbox" name="abuse" value="Y" <? if($bbs_info[abuse] == "Y") echo "checked"; ?>>����� &nbsp; (������� �ܾ �Է��Ͻð�, �ܾ�� �ܾ���̿��� �޸�(,)�� �����ϼ���.)<br>
                  <textarea name="abtxt" rows="3" cols="80" class="textarea"><?=$bbs_info[abtxt]?></textarea></td>
              </tr>
            </table></td>
        </tr>
      </table><br>

<?php
if(!strcmp($site_info[point_use], "Y")) {
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><b>+ ����Ʈ����</b></td>
        </tr>
        <tr><td height="3"></td></tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td height="30" class="t_name">�ۺ��� ����Ʈ</td>
                <td class="t_value"><input name="view_point" type="text" value="<? if($bbs_info[view_point] == "" && $mode != "update") echo $site_info[view_point]; else echo $bbs_info[view_point]; ?>" class="input"></td>
                <td height="30" class="t_name">�۾��� ����Ʈ</td>
                <td class="t_value"><input name="write_point" type="text" value="<? if($bbs_info[write_point] == "" && $mode != "update") echo $site_info[write_point]; else echo $bbs_info[write_point]; ?>" class="input"></td>
              </tr>
              <tr>
                <td height="30" class="t_name">�ٿ�ε� ����Ʈ</td>
                <td class="t_value"><input name="down_point" type="text" value="<? if($bbs_info[down_point] == "" && $mode != "update") echo $site_info[down_point]; else echo $bbs_info[down_point]; ?>" class="input"></td>
                <td height="30" class="t_name">�ڸ�Ʈ ����Ʈ</td>
                <td class="t_value"><input name="comment_point" type="text" value="<? if($bbs_info[comment_point] == "" && $mode != "update") echo $site_info[comment_point]; else echo $bbs_info[comment_point]; ?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">����Ʈ�� �������</td>
                <td class="t_value" colspan="3">
                	���޼��� : <input name="point_msg" type="text" size="30" value="<? if($bbs_info[point_msg] == "" && $mode != "update") echo $site_info[point_msg]; else echo $bbs_info[point_msg]?>" class="input">
                </td>
              </tr>
            </table>
           </td>
        </tr>
      </table><br>
<?php
}
?>

			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="9d9d9d">
        <tr>
          <td width="5" height="5"><img src="../image/check_left_top.gif"></td>
          <td width="100%"></td>
          <td width="5" height="5"><img src="../image/check_right_top.gif"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td><img src="../image/check_tit.gif" width="75" height="19" /></td>
            </tr>
            <tr>
              <td class="chk_alt">
              - �������� �ݵ�� �������� �ۼ��ϰ� ������ �Ұ��մϴ�.<br>
              - ���Ѽ����� �� ��Ȳ�� ȸ���з������� ���ٱ����� �����մϴ�.<br>
              - ���� ���ڼ��� �Խ��� ��Ͽ��� �������� ������ ���ڼ��� �����ϸ� �� �̻��� ... ���� ǥ�õ˴ϴ�.<br>
              - ���� ���ڼ��� �������� �ʰų� 0�� ��쿡�� ���ڼ� ���⿡ ������ �����ϴ�.<br>
              - �ٹٲ� �Խù����� �Խ��� ��Ų�� ���䰶���� ������ ��� �� �ٿ� ������ �Խù� ���� �����մϴ�.<br>
              - �ٹٲ� �Խù����� �������� �ʰų� 0�� ��쿡�� ������� �ʽ��ϴ�.<br>
              <? if(!strcmp($site_info[point_use], "Y")) { ?>
							- ����Ʈ�� �����ϰ� ���� ��� ���� �տ� - �� �ٿ� �ּ���. (�� : -10)
							<? } ?>
              </td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
          <td></td>
          <td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
        </tr>
      </table>
      

      <br>
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='bbs_pro_list.php';">
          </td>
        </tr>
      </form>
      </table>



<? include "../footer.php"; ?>