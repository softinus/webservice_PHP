<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/bbs_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?

if($mode == "insert" || $mode == ""){

	$mode = "insert";
	$bbs_row[name] = $wiz_admin[name];
	$bbs_row[email] = $wiz_admin[email];
	$bbs_row[wdate] = date('Y-m-d H:i:s');
	$bbs_row[passwd] = date('is');
	$bbs_row[count] = 0;

}else if($mode == "update"){

	$sql = "select *,from_unixtime(wdate, '%Y-%m-%d %H:%i:%s') as wdate from wiz_bbs where code = '$code' and idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);

	for($ii = 1; $ii <= 5; $ii++) {
		if(!strcmp($ii, $bbs_row[star])) ${"star".$ii."_checked"} = "checked";
	}
	
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
	      <td valign="bottom" class="tit">�Խù�����</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">�Խù��� �����մϴ�.</td>
	    </tr>
	  </table>			
	  <br>	  
      
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
  	<form action="bbs_list.php" method="post">
		  <tr>
		    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���ðԽ��� : <?=$bbs_info[title]?></td>
		  </tr>
		</form>
		</table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <form name="frm" action="bbs_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this)">
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
              <td class="t_name">�ۼ���</td>
              <td class="t_value"><input name="wdate" type="text" value="<?=$bbs_row[wdate]?>" class="input"></td>
              <td class="t_name">��ȸ��</td>
              <td class="t_value"><input name="count" type="text" value="<?=$bbs_row[count]?>" class="input"></td>
            </tr>
            <? if(!strcmp($code, "review")) { ?>
            <tr> 
              <td class="t_name">��ȣ��</td>
              <td class="t_value" colspan="3">
								<input name="star" type="radio" value="5" style="border:0px; background-color:transparent;" <?=$star5_checked?>><img src="/images/icon_star_5.gif">&nbsp;&nbsp;&nbsp;
								<input name="star" type="radio" value="4" style="border:0px; background-color:transparent;" <?=$star4_checked?>><img src="/images/icon_star_4.gif">&nbsp;&nbsp;&nbsp;
								<input name="star" type="radio" value="3" style="border:0px; background-color:transparent;" <?=$star3_checked?>><img src="/images/icon_star_3.gif">&nbsp;&nbsp;&nbsp;
								<input name="star" type="radio" value="2" style="border:0px; background-color:transparent;" <?=$star2_checked?>><img src="/images/icon_star_2.gif">&nbsp;&nbsp;&nbsp;
								<input name="star" type="radio" value="1" style="border:0px; background-color:transparent;" <?=$star1_checked?>><img src="/images/icon_star_1.gif">	  
            	</td>
            </tr>
          	<? } ?>
            <tr> 
              <td class="t_name">����</td>
              <td class="t_value" colspan="3">
								<?
			          $sql = "select idx, catname from wiz_bbscat where code = '$code' and gubun != 'A' order by idx asc";
			          $result = mysql_query($sql) or error(mysql_error());
			          $total = mysql_num_rows($result);
			          if($total > 0) {
                  echo "<select name='category'>";
                  echo "<option value=''>�з�</option>";
									while($row = mysql_fetch_array($result)) {
										if($bbs_row[category] == $row[idx]) $selected = "selected";
										else $selected = "";
			          		echo "<option value='".$row[idx]."'".$selected.">".$row[catname]."</option>";
									}
                	echo "</select>";
								}
								?>
                
                <input type="checkbox" name="notice" value="Y" <? if($bbs_row[notice] == "Y") echo "checked"; ?>> ������ 
                <input type="checkbox" name="privacy" value="Y" <? if($bbs_row[privacy] == "Y" || ($mode != "update" && $bbs_info[privacy] == "Y")) echo "checked"; ?>> ��б� 
                <input type="checkbox" name="ctype" value="H" <? if($bbs_row[ctype] == "H") echo "checked"; ?>> HTML���<br>
                <input name="subject" type="text" value="<?=$bbs_row[subject]?>" size="70" class="input" style="word-break:break-all;">
              </td>
            </tr>
            <tr> 
              <td class="t_name">����</td>
              <td class="t_value" colspan="3">
              <?
				 			if($bbs_info[editor] == "Y"){
                $edit_content = $bbs_row[content];
                include "../webedit/WIZEditor.html";
			    		}else{
			    		?>
			      		<textarea name="content" rows="16" cols="80" class="textarea" style="width:100%;word-break:break-all;"><?=$bbs_row[content]?></textarea>
					    <?
					    }
					    ?>
			    </td>
            </tr>
            <tr> 
              <td class="t_name">��й�ȣ</td>
              <td width="275" class="t_value" colspan="3"><input name="passwd" type="text" value="<?=$bbs_row[passwd]?>" class="input"></td>
            </tr>
            
<?php
for($ii = 1; $ii <= $upfile_max; $ii++) {
$upfile = "upfile".$ii;
$upfile_name = "upfile".$ii."_name";
?>
            <tr>
              <td class="t_name">����÷��<?=$ii?></td>
              <td class="t_value" colspan="3"><input name="upfile<?=$ii?>" type="file" value="" class="input">
              <? if($bbs_row[$upfile] != ""){ ?>
              	<input type="checkbox" name="delupfile[]" value="upfile<?=$ii?>"> ����
              	<!--a href="save.php?mode=delfile&code=<?=$code?>&idx=<?=$idx?>&file=upfile3">[����]</a//-->
              	&nbsp;<a href='../../data/bbs/<?=$code?>/<?=$bbs_row[$upfile]?>' target='_blank'><?=$bbs_row[$upfile_name]?></a>
              <? } ?>
              </td>
            </tr>
<?php
}
?>
            <tr>
              <td class="t_name">������1</td>
              <td class="t_value" colspan="3">
              <input name="movie1" type="file" value="" class="input">
              <? if($bbs_row[movie1] != ""){ ?>
              	<input type="checkbox" name="delupfile[]" value="movie1"> ����
              	<!--a href="save.php?mode=delfile&code=<?=$code?>&idx=<?=$idx?>&file=movie1">[����]</a//-->
              	&nbsp;<a href='../../data/bbs/<?=$code?>/<?=$bbs_row[movie1]?>' target='_blank'><?=$bbs_row[movie1]?></a>
              <? } ?>

              	<!--<input name="movie1" size="50" type="text" value="<?=$bbs_row[movie1]?>" class="input">//-->
              </td>
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
        	<img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='bbs_list.php?code=<?=$code?>';">
        </td>
      </tr>
    </form>
    </table>

<? include "../footer.php"; ?>