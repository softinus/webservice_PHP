<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">기타페이지</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">기타페이지 이미지를 설정합니다.</td>
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
         <td width="15%" class="t_name">사이트맵</td>
         <td width="85%" class="t_value">
					<?
					$type = "sitemap";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
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
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="faq_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">로그인</td>
         <td class="t_value">
					<?
					$type = "login";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="login_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">마이쇼핑</td>
         <td class="t_value">
					<?
					$type = "myshop";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="myshop_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">주문입력</td>
         <td class="t_value">
					<?
					$type = "orderform";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="orderform_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">결제하기</td>
         <td class="t_value">
					<?
					$type = "orderpay";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="orderpay_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">주문완료</td>
         <td class="t_value">
					<?
					$type = "ordercom";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="ordercom_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">주문배송조회</td>
         <td class="t_value">
					<?
					$type = "orderdel";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="orderdel_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">상품검색</td>
         <td class="t_value">
					<?
					$type = "prdsearch";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="prdsearch_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">신상품</td>
         <td class="t_value">
					<?
					$type = "new";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="new_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">추천상품</td>
         <td class="t_value">
					<?
					$type = "recom";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="recom_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">인기상품</td>
         <td class="t_value">
					<?
					$type = "popular";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="popular_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">세일상품</td>
         <td class="t_value">
					<?
					$type = "sale";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
					?>
         <input type="file" name="sale_subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr> 
         <td class="t_name">베스트상품</td>
         <td class="t_value">
					<?
					$type = "best";
					$sql = "select * from wiz_page where type='$type'";
					$result = mysql_query($sql) or error(mysql_error());
					$page_info = mysql_fetch_object($result);
					
					if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
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