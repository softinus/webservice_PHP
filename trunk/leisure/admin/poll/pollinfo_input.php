<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$param = "page=".$page."&searchopt=".$searchopt."&searchkey=".$searchkey;

if($mode == "") $mode = "insert";

if($mode == "insert"){
	
	$poll_info[permsg] = "������ �����ϴ�.";
	
}else if($mode == "update"){
	
	$sql = "select * from wiz_pollinfo where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	$poll_info = mysql_fetch_array($result);
	
}
?>
<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(form){
   
   if(form.code.value == ""){
      alert('�����ڵ带 �Է��ϼ���.');
      form.code.focus();
      return false;
   } else if(!Check_Char(form.code.value)) {
   		alert('�����ڵ�� Ư�����ڸ� ����� �� �����ϴ�.');
      form.code.focus();
   		return false;
   }
   if(form.title.value == ""){
      alert('�������� �Է��ϼ���.');
      form.title.focus();
      return false;
   }

}

//-->
</script>


	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">��������</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">���������� ���/�����մϴ�.</td>
	    </tr>
	  </table>			
	  <br>	  
	  
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form name="frm" action="pollinfo_save.php?<?=$param?>" method="post" onSubmit="return inputCheck(this);" enctype="multipart/form-data">
      <input type="hidden" name="mode" value="<?=$mode?>">
      <input type="hidden" name="idx" value="<?=$idx?>">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr> 
                <td class="t_name">�����ڵ� <font color=red>*</font></td>
                <td class="t_value" colspan="3">
                <? if(!strcmp($mode, "update")) { ?>
	                <?=$poll_info[code]?>
	                <input name="code" type="hidden" value="<?=$poll_info[code]?>">
                <? } else { ?>
                	<input name="code" type="text" size="30" value="<?=$poll_info[code]?>" maxlength="30" <? if($mode == "update") echo "readonly"; ?> class="input">
                <? } ?>                  
                </td>
              </tr>
              <tr>
                <td class="t_name">������ <font color=red>*</font></td>
                <td class="t_value" colspan="3">
                  <input name="title" type="text" size="30" value="<?=$poll_info[title]?>" maxlength="30" class="input">
                </td>
              </tr>
              <tr>
                <td class="t_name">Ÿ�̵��̹���</td>
                <td class="t_value" colspan="3">
                <?
                if($poll_info[titleimg] != "") echo "<img src=/data/poll/$code/$poll_info[titleimg] width=500><a href=pollinfo_save.php?mode=del_titleimg&code=$code><font color=red>[����]</font></a><br>";
                ?>
                <input name="titleimg" type="file" size="30" class="input">
                </td>
              </tr>
              <tr> 
                <td class="t_name">�Խ����ּ�</td>
                <td class="t_value" colspan="3">
                http://<?=$HTTP_HOST?>/poll/list.php?code=<?=$poll_info[code]?> &nbsp; 
                <a href="http://<?=$HTTP_HOST?>/poll/list.php?code=<?=$poll_info[code]?>" target="_blank"><img src="../image/btn_overview.gif" border="0" align="absmiddle"></a>
                </td>
              </tr>
              <!-- ���/�ϴ����� 
              <tr>
                <td class="t_name">�������</td>
                <td class="t_value" colspan="3"><input name="header" type="text" size="30" value="<?=$poll_info[header]?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">�ϴ�����</td>
                <td class="t_value" colspan="3"><input name="footer" type="text" size="30" value="<?=$poll_info[footer]?>" class="input"></td>
              </tr>
              ���/�ϴ����� //-->
              <tr>
                <td class="t_name">����</td>
                <td class="t_value" colspan="3">
                  <table width="98%" border="0" cellpadding="0" cellspacing="0">
                    <tr class="t_name">
                      <td width="25%" align="center" height="25">��Ϻ���</td>
                      <td width="25%" align="center">���뺸��</td>
                      <td width="25%" align="center">��������</td>
                      <td width="25%" align="center">�ڸ�Ʈ����</td>
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
                      lpermi = document.frm.lpermi;
                      for(ii=0; ii<lpermi.length; ii++){
                         if(lpermi.options[ii].value == "<?=$poll_info[lpermi]?>")
                            lpermi.options[ii].selected = true;
                      }
                      rpermi = document.frm.rpermi;
                      for(ii=0; ii<rpermi.length; ii++){
                         if(rpermi.options[ii].value == "<?=$poll_info[rpermi]?>")
                            rpermi.options[ii].selected = true;
                      }
                      apermi = document.frm.apermi;
                      for(ii=0; ii<apermi.length; ii++){
                         if(apermi.options[ii].value == "<?=$poll_info[apermi]?>")
                            apermi.options[ii].selected = true;
                      }
                      cpermi = document.frm.cpermi;
                      for(ii=0; ii<cpermi.length; ii++){
                         if(cpermi.options[ii].value == "<?=$poll_info[cpermi]?>")
                            cpermi.options[ii].selected = true;
                      }
                    -->
                  </script>
                </td>
              </tr>
              <tr>
                <td class="t_name">������ �������</td>
                <td class="t_value" colspan="3">
                	���޼��� : <input name="permsg" type="text" size="30" value="<?=$poll_info[permsg]?>" class="input">&nbsp;
                	����� �̵������� : <input name="perurl" type="text" size="30" value="<?=$poll_info[perurl]?>" class="input">
                </td>
              </tr>
              <tr> 
                <td class="t_name">��Ų</td>
                <td colspan="3" class="t_value">
                <select name="skin">
                <?
                $dh = opendir("../../poll/skin");
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
                <script language="javascript">
                <!--
                  skin = document.frm.skin;
                  for(ii=0; ii<skin.length; ii++){
                     if(skin.options[ii].value == "<?=$poll_info[skin]?>")
                        skin.options[ii].selected = true;
                  }
                -->
                </script> 
                </td>
              </tr>
              <tr>
                <td width="15%" class="t_name">���Ա�üũ���</td>
                <td width="35%" class="t_value">
                	<input type="radio" name="spam_check" value="Y" <? if($poll_info[spam_check] == "Y") echo "checked"; ?>>�����
                	<input type="radio" name="spam_check" value="N" <? if($poll_info[spam_check] == "N" || $poll_info[spam_check] == "") echo "checked"; ?>>������
                </td>
                <td width="15%" class="t_name">�ڸ�Ʈ ���</td>
                <td width="35%" class="t_value">
                  <input type="radio" name="comment" value="Y" <? if($poll_info[comment] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="comment" value="N" <? if($poll_info[comment] == "N" || empty($poll_info[comment])) echo "checked"; ?>>������
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
                         if(datetype_list.options[ii].value == "<?=$poll_info[datetype_list]?>")
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
                         if(datetype_view.options[ii].value == "<?=$poll_info[datetype_view]?>")
                            datetype_view.options[ii].selected = true;
                      }
                    -->
                  </script>
                </td>
              </tr>
              <tr>
                <td class="t_name">��������¼� <font color=red>*</font></td>
                <td class="t_value"><input name="rows" type="text" value="<? if($poll_info[rows] == "") echo "20"; else echo $poll_info[rows]; ?>" class="input"></td>
                <td class="t_name">����Ʈ��¼� <font color=red>*</font></td>
                <td class="t_value"><input name="lists" type="text" value="<? if($poll_info[lists] == "") echo "5"; else echo $poll_info[lists]; ?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">new �Ⱓ����</td>
                <td class="t_value"><input name="newc" type="text" value="<? if($poll_info[newc] == "") echo "2"; else echo $poll_info[newc]; ?>" class="input"></td>
                <td class="t_name">���� ���ڼ�</td>
                <td class="t_value"><input name="subject_len" type="text" value="<?=$poll_info[subject_len];?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">�弳,����<br>���͸�</td>
                <td class="t_value" colspan="3">
                  <input type="checkbox" name="abuse" value="Y" <? if($poll_info[abuse] == "Y") echo "checked"; ?>>����� &nbsp; (������� �ܾ �Է��Ͻð�, �ܾ�� �ܾ���̿��� �޸�(,)�� �����ϼ���.)<br>
                  <textarea name="abtxt" rows="3" cols="80" class="textarea"><?=$poll_info[abtxt]?></textarea></td>
              </tr>
              
            </table>
           </td>
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
          <td><table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td><img src="../image/check_tit.gif" width="75" height="19" /></td>
            </tr>
            <tr>
              <td class="chk_alt">
            	- ���Ѽ����� �� ��Ȳ�� ȸ���з������� ���ٱ����� �����մϴ�.<br>
            	- �弳,���� ������ ���Ͽ� �� �ۼ��� �弳 ������ ������ �� �ֽ��ϴ�.<br>
            	- ���� ���ڼ��� �Խ��� ��Ͽ��� �������� ������ ���ڼ��� �����ϸ� �� �̻��� ... ���� ǥ�õ˴ϴ�.<br>
            	- ���� ���ڼ��� �������� �ʰų� 0�� ��쿡�� ���ڼ� ���⿡ ������ �����ϴ�.
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
          	<input type="image" src="../image/btn_confirm_l.gif">
          </td>
        </tr>
      </form>
      </table>

           	
<? include "../footer.php"; ?>