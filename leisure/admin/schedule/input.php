<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
// �˻� �Ķ����
$param = "code=$code&page=$page&category=$category&searchopt=$searchopt&searchkey=$searchkey";

if($mode == "insert" || $mode == ""){
   
	$mode = "insert";
	$bbs_row[name] = $wiz_admin[name];
	$bbs_row[email] = $wiz_admin[email];
	if($wdate != "") $bbs_row[wdate] = $wdate;
	else $bbs_row[wdate] = date('Y-m-d');
	$bbs_row[passwd] = date('is');
	$bbs_row[count] = 0;

}else if($mode == "update"){
	
	$sql = "select *, from_unixtime(wdate, '%Y-%m-%d') as wdate from wiz_bbs where code = '$code' and idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);
	
}else if($mode == "reply"){
	
	$sql = "select subject, content, privacy, passwd from wiz_bbs where code = '$code' and idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);
	
	$bbs_row[name] 	= $wiz_admin[name];
  $bbs_row[email] = $wiz_admin[email];
  $bbs_row[wdate] = date('Y-m-d');
  $bbs_row[count] = 0;
	$bbs_row[content] = $bbs_row[content]."\n\n==================== �� �� ====================\n\n";
	
}

?>

      <script language="JavaScript" type="text/javascript">
      <!--
        function inputCheck(frm){

        if(frm.name.value == ""){
          alert("�̸��� �Է��ϼ���.");
          frm.name.focus();
          return false;
        }
        if(frm.subject.value == ""){
          alert("������ �Է��ϼ���.");
          frm.subject.focus();
          return false;
        }
        if(frm.content.value == ""){
          alert("������ �Է��ϼ���.");
          return false;
        }
        if(frm.passwd.value == ""){
          alert("��й�ȣ�� �Է��ϼ���.");
          frm.passwd.focus();
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
		  <td valign="bottom" class="tit_alt">������ �����մϴ�.</td>
		</tr>
	  </table>			
	  <br>	        
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form name="frm" action="save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this)">
      <input type="hidden" name="code" value="<?=$code?>">
      <input type="hidden" name="mode" value="<?=$mode?>">
      <input type="hidden" name="idx" value="<?=$idx?>">
      <input type="hidden" name="page" value="<?=$page?>">
      <input type="hidden" name="ctype" value="<?=$ctype ?>">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="15%" class="t_name">�ۼ���</td>
                <td width="35%" class="t_value"><input name="name" type="text" value="<?=$bbs_row[name]?>" class="input"></td>
                <td width="15%" class="t_name">�̸���</td>
                <td width="35%" class="t_value"><input name="email" type="text" value="<?=$bbs_row[email]?>" size="30" class="input"></td>
              </tr>
              <tr> 
                <td class="t_name">����</td>
                <td class="t_value">
                	<input name="wdate" type="text" value="<?=$bbs_row[wdate]?>" class="input">
                	<img src="../image/ic_cal.gif" style="cursor:hand" align="center" onClick="Calendar1('document.frm','wdate');">
                </td>
                <td class="t_name">��ȸ��</td>
                <td class="t_value"><input name="count" type="text" value="<?=$bbs_row[count]?>" class="input"></td>
              </tr>
              <tr> 
                <td class="t_name">����</td>
                <td class="t_value" colspan="3">
								<?
								if($bbs_info[category] != ""){
									$catlist = explode(",",$bbs_info[category]);  
                  echo "<select name='category'>";
                  echo "<option value=''>�з�</option>";
									for($ii=0;$ii<count($catlist);$ii++){
										if($bbs_row[category] == $catlist[$ii]) $selected = "selected";
										else $selected = "";
                		echo "<option value='".$catlist[$ii]."' ".$selected.">".$catlist[$ii]."</option>";
									}
                	echo "</select>";
								}
								?>
                <input type="text" name="subject"  value="<?=$bbs_row[subject]?>" size="60" class="input">
                <!--<input type="checkbox" name="notice" value="Y" <? if($bbs_row[notice] == "Y") echo "checked"; ?>>������--> 
                <input type="checkbox" name="privacy" value="Y" <? if($bbs_row[privacy] == "Y" || ($mode != "update" && $bbs_info[privacy] == "Y")) echo "checked"; ?>>��б�
                <input type="checkbox" name="ctype" value="H" <? if($bbs_row[ctype] == "H") echo "checked"; ?>>HTML���
                </td>
              </tr>
              <tr> 
                <td class="t_name">����</td>
                <td class="t_value" colspan="3">
                <?
					 			if($bbs_info[editor] == "Y"){
									$edit_content = $bbs_row[content];
									include "../../webedit/WIZEditor.html";
								}else{
								?>
                  <textarea name="content" rows="16" cols="80" class="textarea" style="width:100%"><?=$bbs_row[content]?></textarea>
								<?
								}
								?>
				    </td>
              </tr>
              <tr> 
                <td class="t_name">��й�ȣ</td>
                <td width="275" class="t_value" colspan="3"><input name="passwd" type="text" value="<?=$bbs_row[passwd]?>" class="input"></td>
              </tr>
              <tr> 
                <td class="t_name">����÷��1</td>
                <td class="t_value" colspan="3">
                <input name="upfile1" type="file" value="" class="input">
                <? if($bbs_row[upfile1] != ""){ ?>
                	<a href="save.php?mode=delfile&code=<?=$code?>&idx=<?=$idx?>&file=upfile1">[����]</a>&nbsp;<a href='../../data/bbs/<?=$code?>/<?=$bbs_row[upfile1]?>' target='_blank'><?=$bbs_row[upfile1_name]?></a>
                <? } ?>
                </td>
              </tr>
              <tr> 
                <td class="t_name">����÷��2</td>
                <td class="t_value" colspan="3"><input name="upfile2" type="file" value="" class="input">
                <? if($bbs_row[upfile2] != ""){ ?>
                	<a href="save.php?mode=delfile&code=<?=$code?>&idx=<?=$idx?>&file=upfile2">[����]</a>&nbsp;<a href='../../data/bbs/<?=$code?>/<?=$bbs_row[upfile2]?>' target='_blank'><?=$bbs_row[upfile2_name]?></a>
                <? } ?>
                </td>
              </tr>
              <tr> 
                <td class="t_name">����÷��3</td>
                <td class="t_value" colspan="3"><input name="upfile3" type="file" value="" class="input">
                <? if($bbs_row[upfile3] != ""){ ?>
                	<a href="save.php?mode=delfile&code=<?=$code?>&idx=<?=$idx?>&file=upfile3">[����]</a>&nbsp;<a href='../../data/bbs/<?=$code?>/<?=$bbs_row[upfile3]?>' target='_blank'><?=$bbs_row[upfile3_name]?></a>
                <? } ?>
                </td>
              </tr>
              <tr> 
                <td class="t_name">������1</td>
                <td width="275" class="t_value" colspan="3"><input name="movie1" size="50" type="text" value="<?=$bbs_row[movie1]?>" class="input"></td>
              </tr>
              <tr> 
                <td class="t_name">������2</td>
                <td width="275" class="t_value" colspan="3"><input name="movie2" size="50" type="text" value="<?=$bbs_row[movie2]?>" class="input"></td>
              </tr>
              <tr> 
                <td class="t_name">������3</td>
                <td width="275" class="t_value" colspan="3"><input name="movie3" size="50" type="text" value="<?=$bbs_row[movie3]?>" class="input"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      
      <br>
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='list.php?<?=$param?>';">
          </td>
        </tr>
      </form>
      </table>
    

<? include "../footer.php"; ?>