<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">��Ÿ������</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">��Ÿ������ �̹����� �����մϴ�.</td>
			  </tr>
			</table>
			
      <br>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
      <form name="frm" action="page_save.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="other">
      <input type="hidden" name="type" value="<?=$type?>">
      <input type="hidden" name="content" value="<?=$page_info->content?>">
        <tr> 
         <td width="15%" class="t_name">����Ʈ��</td>
         <td width="85%" class="t_value">
					<?
					$type = "sitemap";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="sitemap_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">FAQ</td>
         <td class="t_value">
					<?
					$type = "faq";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="faq_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">�α���</td>
         <td class="t_value">
					<?
					$type = "login";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="login_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">���̼���</td>
         <td class="t_value">
					<?
					$type = "myshop";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="myshop_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">�ֹ��Է�</td>
         <td class="t_value">
					<?
					$type = "orderform";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="orderform_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">�����ϱ�</td>
         <td class="t_value">
					<?
					$type = "orderpay";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="orderpay_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">�ֹ��Ϸ�</td>
         <td class="t_value">
					<?
					$type = "ordercom";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="ordercom_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">�ֹ������ȸ</td>
         <td class="t_value">
					<?
					$type = "orderdel";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="orderdel_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">��ǰ�˻�</td>
         <td class="t_value">
					<?
					$type = "prdsearch";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="prdsearch_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">�Ż�ǰ</td>
         <td class="t_value">
					<?
					$type = "new";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="new_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">��õ��ǰ</td>
         <td class="t_value">
					<?
					$type = "recom";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="recom_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">�α��ǰ</td>
         <td class="t_value">
					<?
					$type = "popular";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="popular_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">���ϻ�ǰ</td>
         <td class="t_value">
					<?
					$type = "sale";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="sale_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">����Ʈ��ǰ</td>
         <td class="t_value">
					<?
					$type = "best";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
					?>
         <input type="file" name="best_subimg" class="input"> &nbsp; 
         </td>
        </tr>
      </table>
      

      <br>
      <table align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_cancel_l.gif" style="cursor:hand" onClick="history.go(-1);">
          </td>
        </tr>
      </form>
      </table>


<? include "../footer.php"; ?>