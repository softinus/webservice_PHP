<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
if($mode == "") $mode = "insert";

if($mode == "insert"){

	$sch_info[simgsize] = "120";
	$sch_info[mimgsize] = "500";
	
	$sch_info[permsg] = "������ �����ϴ�.";
	
}else if($mode == "update"){
	$sql = "select * from wiz_bbsinfo where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	$sch_info = mysql_fetch_array($result);
}
?>
<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
   
   if(frm.code != undefined) {
	   if(frm.code.value == ""){
	      alert('���� ������(db��)�� �Է��ϼ���.');
	      frm.code.focus();
	      return false;
	   } else if(!Check_Char(frm.code.value)) {
	   		alert('���� ������(db��)�� Ư�����ڸ� ����� �� �����ϴ�.');
	      frm.code.focus();
	   		return false;
	   }
	 }
   
   if(frm.title.value == ""){
      alert('���� �ѱ۸� �Է��ϼ���.');
      frm.title.focus();
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
	      <td valign="bottom" class="tit_alt">���� ����� �󼼼��� �մϴ�.</td>
	    </tr>
	  </table>			
	  <br>	  
	  
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form name="frm" action="sch_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
      <input type="hidden" name="mode" value="<?=$mode?>">
      <input type="hidden" name="page" value="<?=$page?>">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr> 
                <td class="t_name">������(db��) <font color=red>*</font></td>
                <td class="t_value" colspan="3">
                <? if(!strcmp($mode, "update")) { ?>
	                <?=$sch_info[code]?>
	                <input name="code" type="hidden" value="<?=$sch_info[code]?>">
                <? } else { ?>
                	<input name="code" type="text" size="30" value="<?=$sch_info[code]?>" <? if($mode == "update") echo "readonly"; ?> class="input">
                <? } ?>
                </td>
              </tr>
              <tr> 
                <td class="t_name">�ѱ۸� <font color=red>*</font></td>
                <td class="t_value" colspan="3"><input name="title" type="text" size="30" value="<?=$sch_info[title]?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">Ÿ�̵��̹���</td>
                <td class="t_value" colspan="3">
                <?
                if($sch_info[titleimg] != "") echo "<img src=/data/bbs/$code/$sch_info[titleimg] width=500><a href=sch_save.php?mode=del_titleimg&code=$code><font color=red>[����]</font></a><br>";
                ?>
                <input name="titleimg" type="file" size="30" class="input">
                </td>
              </tr>
              <tr> 
                <td class="t_name">�Խ����ּ�</td>
                <td class="t_value" colspan="3">
                http://<?=$HTTP_HOST?>/schedule/list.php?code=<?=$sch_info[code]?> &nbsp; 
                <a href="http://<?=$HTTP_HOST?>/schedule/list.php?code=<?=$sch_info[code]?>" target="_blank"><img src="../image/btn_overview.gif" border="0" align="absmiddle"></a></td>
              </tr>
              <!-- ���/�ϴ����� 
              <tr>
                <td class="t_name">�������</td>
                <td class="t_value" colspan="3"><input name="header" type="text" size="30" value="<?=$sch_info[header]?>" class="input"></td>
              </tr>
              <tr>
                <td class="t_name">�ϴ�����</td>
                <td class="t_value" colspan="3"><input name="footer" type="text" size="30" value="<?=$sch_info[footer]?>" class="input"></td>
              </tr>
              ���/�ϴ����� //-->
              <tr> 
                <td class="t_name">����������</td>
                <td class="t_value" colspan="3">���̵� ��ǥ�� �и� ��)admin,admin1,admin3<br><input name="bbsadmin" type="text" size="60" value="<?=$sch_info[bbsadmin]?>" class="input"></td>
              </tr>
              <tr> 
                <td width="15%" class="t_name">�ڵ� ��б�</td>
                <td width="35%" class="t_value">
                  <input type="checkbox" name="privacy" value="Y" <? if($sch_info[privacy] == "Y") echo "checked"; ?>>�ۼ��ڿ� ��ڸ� ��������
                </td>
                <td width="15%" class="t_name">������Ų</td>
                <td width="35%" class="t_value">
                <select name="skin">
                <?
                $dh = opendir("../../schedule/skin");
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
                </td>
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
                      skin = document.frm.skin;
                      for(ii=0; ii<skin.length; ii++){
                         if(skin.options[ii].value == "<?=$sch_info[skin]?>")
                            skin.options[ii].selected = true;
                      }
                      lpermi = document.frm.lpermi;
                      for(ii=0; ii<lpermi.length; ii++){
                         if(lpermi.options[ii].value == "<?=$sch_info[lpermi]?>")
                            lpermi.options[ii].selected = true;
                      }
                      rpermi = document.frm.rpermi;
                      for(ii=0; ii<rpermi.length; ii++){
                         if(rpermi.options[ii].value == "<?=$sch_info[rpermi]?>")
                            rpermi.options[ii].selected = true;
                      }
                      wpermi = document.frm.wpermi;
                      for(ii=0; ii<wpermi.length; ii++){
                         if(wpermi.options[ii].value == "<?=$sch_info[wpermi]?>")
                            wpermi.options[ii].selected = true;
                      }
                      apermi = document.frm.apermi;
                      for(ii=0; ii<apermi.length; ii++){
                         if(apermi.options[ii].value == "<?=$sch_info[apermi]?>")
                            apermi.options[ii].selected = true;
                      }
                      cpermi = document.frm.cpermi;
                      for(ii=0; ii<cpermi.length; ii++){
                         if(cpermi.options[ii].value == "<?=$sch_info[cpermi]?>")
                            cpermi.options[ii].selected = true;
                      }
                    -->
                  </script>
                </td>
              </tr>
              <tr> 
                <td rowspan="2" class="t_name">������ �������</td>
                <td class="t_value" colspan="3">
                	���޼��� : <input name="permsg" type="text" size="30" value="<?=$sch_info[permsg]?>" class="input">&nbsp; 
                	����� �̵������� : <input name="perurl" type="text" size="30" value="<?=$sch_info[perurl]?>" class="input">
                </td>
              </tr>
              <tr>
                <td class="t_value" colspan="3">
                	<input type="radio" name="btn_view" value="N" <? if($sch_info[btn_view] == "N" || $sch_info[btn_view] == "") echo "checked"; ?>> �۾��� ��ư�� ������ ����
                	<input type="radio" name="btn_view" value="Y" <? if($sch_info[btn_view] == "Y") echo "checked"; ?>> �۾��� ��ư�� ���̰� Ŭ�� �� ���â
                </td>
              </tr>
              <tr> 
                <td class="t_name">�̹���ũ��</td>
                <td class="t_value" colspan="3">
                	���������  : <input name="simgsize" type="text" size="9" value="<?=$sch_info[simgsize]?>" class="input">�ȼ� &nbsp; 
                	����������  : <input name="mimgsize" type="text" size="9" value="<?=$sch_info[mimgsize]?>" class="input">�ȼ�
                </td>
              </tr>
              <tr>
                <td class="t_name">�̹�������</td>
                <td class="t_value" colspan="3">
                	<input type="checkbox" name="imgview" value="N" <? if($sch_info[imgview] == "N") echo "checked"; ?>>÷�������� �̹����� ��� ���� ���������� �̹��� ���߱�
                </td>
              </tr>
              <tr>
                <td class="t_name">�̹��� ÷������ ����</td>
                <td class="t_value">
                	<input type="radio" name="img_align" value="LEFT" <? if($sch_info[img_align] == "LEFT" || $sch_info[img_align] == "") echo "checked"; ?>> ��������
                	<input type="radio" name="img_align" value="CENTER" <? if($sch_info[img_align] == "CENTER") echo "checked"; ?>> �߾�����
                	<input type="radio" name="img_align" value="RIGHT" <? if($sch_info[img_align] == "RIGHT") echo "checked"; ?>> ��������
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
                         if(datetype_view.options[ii].value == "<?=$sch_info[datetype_view]?>")
                            datetype_view.options[ii].selected = true;
                      }
                    -->
                  </script>
                </td>
              </tr>
              <tr> 
                <td height="30" class="t_name">��������</td>
                <td class="t_value">
                	<input type="radio" name="editor" value="Y" <? if($sch_info[editor] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="editor" value="N" <? if($sch_info[editor] == "N" || $sch_info[editor] == "") echo "checked"; ?>>������
                </td>
                <td height="30" class="t_name">�ڸ�Ʈ ���</td>
                <td class="t_value">
                  <input type="radio" name="comment" value="Y" <? if($sch_info[comment] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="comment" value="N" <? if($sch_info[comment] == "N" || empty($sch_info[comment])) echo "checked"; ?>>������
                </td>
              </tr>
              <tr> 
                <td height="30" class="t_name">���Ͼ��ε�</td>
                <td class="t_value">
                  <input type="radio" name="upfile" value="Y" <? if($sch_info[upfile] == "Y" || empty($sch_info[upfile])) echo "checked"; ?>>�����
                  <input type="radio" name="upfile" value="N" <? if($sch_info[upfile] == "N") echo "checked"; ?>>������
                </td>
                <td height="30" class="t_name">������</td>
                <td class="t_value">
                  <input type="radio" name="movie" value="Y" <? if($sch_info[movie] == "Y" || empty($sch_info[movie])) echo "checked"; ?>>�����
                  <input type="radio" name="movie" value="N" <? if($sch_info[movie] == "N") echo "checked"; ?>>������
                </td>
              </tr>
              <tr>
                <td class="t_name">���Ա�üũ���</td>
                <td class="t_value">
                	<input type="radio" name="spam_check" value="Y" <? if($sch_info[spam_check] == "Y") echo "checked"; ?>>�����
                	<input type="radio" name="spam_check" value="N" <? if($sch_info[spam_check] == "N" || $sch_info[spam_check] == "") echo "checked"; ?>>������
                </td>
                <td height="30" class="t_name">��õ���</td>
                <td class="t_value">
                	<input type="radio" name="recom" value="Y" <? if($sch_info[recom] == "Y") echo "checked"; ?>>�����
                  <input type="radio" name="recom" value="N" <? if($sch_info[recom] == "N" || empty($sch_info[recom])) echo "checked"; ?>>������
                </td>
              </tr>
              <tr> 
                <td class="t_name">�弳,����<br>���͸�</td>
                <td class="t_value" colspan="3">
                  <input type="checkbox" name="abuse" value="Y" <? if($sch_info[abuse] == "Y") echo "checked"; ?>>����� &nbsp; (������� �ܾ �Է��Ͻð�, �ܾ�� �ܾ���̿��� �޸�(,)�� �����ϼ���.)<br>
                  <textarea name="abtxt" rows="3" cols="80" class="textarea"><?=$sch_info[abtxt]?></textarea></td>
              </tr>
            </table></td>
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
            	- �������� �ݵ�� �������� �ۼ��ϰ� ������ �Ұ��մϴ�.<br>
            	- ���Ѽ����� �� ��Ȳ�� ȸ���з������� ���ٱ����� �����մϴ�.<br>
            	- �弳,���� ������ ���Ͽ� �� �ۼ��� �弳 ������ ������ �� �ֽ��ϴ�.
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
          <td><input type="image" src="../image/btn_confirm_l.gif"></td>
        </tr>
      </form>
      </table>

<? include "../footer.php"; ?>