<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<html>
<head>
<title>:: ž�޴����� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="JavaScript" type="text/JavaScript">
<!--
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ž�޴�����</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="topnavi">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <tr> 
          <td width="25%" class="t_name">�޴�1</td>
          <td width="75%" class="t_value">
          <?
          if(is_file("../../data/menuimg/topnavi01.gif")){
          	echo "<img src='../../data/menuimg/topnavi01.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi01.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi01_img" class="input"><br>
          <input type="text" name="topnavi01_url" value="<?=$design_info->topnavi01_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">�޴�2</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topnavi02.gif")){
          	echo "<img src='../../data/menuimg/topnavi02.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi02.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi02_img" class="input"><br>
          <input type="text" name="topnavi02_url" value="<?=$design_info->topnavi02_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">�α���<br>�α׾ƿ�</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topnavi_login.gif")){
          	echo "<img src='../../data/menuimg/topnavi_login.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi_login.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi_login_img" class="input"> (�޴��̹���)<br>
          <input type="text" name="topnavi_login_url" value="<?=$design_info->topnavi_login_url?>" size="60" class="input" readonly> (��ũ)<br>
          <?
          if(is_file("../../data/menuimg/topnavi_logout.gif")){
          	echo "<img src='../../data/menuimg/topnavi_logout.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi_logout.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi_logout_img" class="input"><br>
          <input type="text" name="topnavi_logout_url" value="<?=$design_info->topnavi_logout_url?>" size="60" class="input" readonly>
          </td>
        </tr>
        <tr> 
          <td class="t_name">ȸ������<br>����������</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topnavi_join.gif")){
          	echo "<img src='../../data/menuimg/topnavi_join.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi_join.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi_join_img" class="input"> <br>
          <input type="text" name="topnavi_join_url" value="<?=$design_info->topnavi_join_url?>" size="60" class="input" readonly> <br>
          <?
          if(is_file("../../data/menuimg/topnavi_myshop.gif")){
          	echo "<img src='../../data/menuimg/topnavi_myshop.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi_myshop.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi_myshop_img" class="input"><br>
          <input type="text" name="topnavi_myshop_url" value="<?=$design_info->topnavi_myshop_url?>" size="60" class="input" readonly>
          </td>
        </tr>
        <tr> 
          <td class="t_name">�޴�3</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topnavi03.gif")){
          	echo "<img src='../../data/menuimg/topnavi03.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi03.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi03_img" class="input"><br>
          <input type="text" name="topnavi03_url" value="<?=$design_info->topnavi03_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">�޴�4</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topnavi04.gif")){
          	echo "<img src='../../data/menuimg/topnavi04.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi04.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi04_img" class="input"><br>
          <input type="text" name="topnavi04_url" value="<?=$design_info->topnavi04_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">�޴�5</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topnavi05.gif")){
          	echo "<img src='../../data/menuimg/topnavi05.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi05.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi05_img" class="input"><br>
          <input type="text" name="topnavi05_url" value="<?=$design_info->topnavi05_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">�޴�6</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topnavi06.gif")){
          	echo "<img src='../../data/menuimg/topnavi06.gif'> <a href='dsn_save.php?mode=topnavi_del&file=topnavi06.gif'><font color=red>[����]</font></a>";
          }
          ?>
          <input type="file" name="topnavi06_img" class="input"><br>
          <input type="text" name="topnavi06_url" value="<?=$design_info->topnavi06_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td colspan="4" align="center" class="t_name">���������</td>
        </tr>
        <tr>
          <td class="t_value" colspan="4">
          <table width="100%">
          <tr><td valign=top width="50%">
            <table width="100%">
            <tr><td width="30%">ó������</td> <td width="70%">: &nbsp;/ </td>
            <tr><td>��ٱ���</td> <td>: &nbsp;/shop/prd_basket.php </td>
            <tr><td>�ֹ�,�����ȸ</td> <td>: &nbsp;/shop/order_list.php </td>
            <tr><td>��ǰ�˻�</td> <td>: &nbsp;/shop/prd_search.php </td>
            <tr><td>�α��ǰ</td> <td>: &nbsp;/shop/prd_list.php?grp=popular </td>
            <tr><td>��õ��ǰ</td> <td>: &nbsp;/shop/prd_list.php?grp=recom </td>
            <tr><td>�Ż�ǰ</td> <td>: &nbsp;/shop/prd_list.php?grp=new </td>
            <tr><td>���ϻ�ǰ</td> <td>: &nbsp;/shop/prd_list.php?grp=sale </td>
            <tr><td>�������</td> <td>: &nbsp;/schedule/list.php?code=schedule </td>
            <tr><td>��������</td> <td>: &nbsp;/poll/list.php?code=poll </td>
            </table>
          </td>
          <td valign=top width="50%">
            <table width="100%">
            <tr><td width="30%">ȸ��Ұ�</td> <td width="70%">: &nbsp;/center/company.php </td>
            <tr><td>������</td> <td>: &nbsp;/center/center.php </td>
            <tr><td>�̿�ȳ�</td> <td>: &nbsp;/center/guide.php </td>
            <tr><td>����Ʈ��</td> <td>: &nbsp;/center/sitemap.php </td>
            <tr><td>�����ϴ�����</td> <td>: &nbsp;/center/faq.php </td>
            <tr><td>���̼���</td> <td>: &nbsp;/member/my_shop.php </td>
            <tr><td>������</td> <td>: &nbsp;/bbs/list.php?code=qna</td>
            <tr><td>�α���</td> <td>: &nbsp;/member/login.php </td>
            <tr><td>ȸ������</td> <td>: &nbsp;/member/join.php </td>
            </table>
          </td></tr>
          </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
      <input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
      <img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>


</td></tr></table>
</body>
</html>