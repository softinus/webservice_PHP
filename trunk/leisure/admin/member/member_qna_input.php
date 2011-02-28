<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$sql = "select * from wiz_consult where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$con_info = mysql_fetch_object($result);
?>


      <table border="0" cellspacing="0" cellpadding="2">
		    <tr>
		      <td><img src="../image/ic_tit.gif"></td>
		      <td valign="bottom" class="tit">1:1 상담관리</td>
		      <td width="2"></td>
		      <td valign="bottom" class="tit_alt">고객이 작성한 1:1 상담을 관리합니다.</td>
		    </tr>
		  </table>
		  		
		  <br>	
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form action="member_save.php" method="post">
      <input type="hidden" name="mode" value="consult">
      <input type="hidden" name="idx" value="<?=$idx?>">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
              <tr> 
                <td width="15%" class="t_name">작성자</td>
                <td width="85%" class="t_value"><?=$con_info->name?>(<?=$con_info->memid?>)</td>
              </tr>
              <tr> 
                <td class="t_name">제 목</td>
                <td class="t_value"><?=$con_info->subject?></td>
              </tr>
              <tr> 
                <td class="t_name">내 용</td>
                <td class="t_value"><textarea name="question" cols="70" rows="10" class="textarea" style="width:100%"><?=$con_info->question?></textarea></td>
              </tr>
              <tr> 
                <td class="t_name">답 변</td>
                <td class="t_value"><textarea name="answer" cols="70" rows="10" class="textarea" style="width:100%"><?=$con_info->answer?></textarea></td>
              </tr>
            </table></td>
        </tr>
      </table>
      
      <br>
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_list_l.gif" style="cursor:hand" onclick="document.location='member_qna.php';">
          </td>
        </tr>
      </form>
      </table>
   

<? include "../footer.php"; ?>