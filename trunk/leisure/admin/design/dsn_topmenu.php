<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<html>
<head>
<title>:: 상단메뉴관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
//-->
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> 상단메뉴관리</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="topmenu">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <tr> 
          <td width="25%" class="t_name">메뉴1</td>
          <td width="75%" class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu01.gif")){
          	echo "<img src='../../data/menuimg/topmenu01.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu01.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu01_img" class="input"> (메뉴이미지)<br>
          <?
          if(is_file("../../data/menuimg/topmenu01_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu01_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu01_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu01_over" class="input"> (롤오버이미지)<br>
          <input type="text" name="topmenu01_url" value="<?=$design_info->topmenu01_url?>" size="60" class="input"> (링크)
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴2</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu02.gif")){
          	echo "<img src='../../data/menuimg/topmenu02.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu02.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu02_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu02_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu02_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu02_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu02_over" class="input"><br>
          <input type="text" name="topmenu02_url" value="<?=$design_info->topmenu02_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴3</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu03.gif")){
          	echo "<img src='../../data/menuimg/topmenu03.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu03.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu03_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu03_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu03_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu03_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu03_over" class="input"><br>
          <input type="text" name="topmenu03_url" value="<?=$design_info->topmenu03_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴4</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu04.gif")){
          	echo "<img src='../../data/menuimg/topmenu04.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu04.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu04_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu04_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu04_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu04_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu04_over" class="input"><br>
          <input type="text" name="topmenu04_url" value="<?=$design_info->topmenu04_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴5</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu05.gif")){
          	echo "<img src='../../data/menuimg/topmenu05.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu05.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu05_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu05_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu05_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu05_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu05_over" class="input"><br>
          <input type="text" name="topmenu05_url" value="<?=$design_info->topmenu05_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴6</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu06.gif")){
          	echo "<img src='../../data/menuimg/topmenu06.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu06.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu06_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu06_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu06_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu06_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu06_over" class="input"><br>
          <input type="text" name="topmenu06_url" value="<?=$design_info->topmenu06_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴7</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu07.gif")){
          	echo "<img src='../../data/menuimg/topmenu07.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu07.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu07_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu07_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu07_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu07_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu07_over" class="input"><br>
          <input type="text" name="topmenu07_url" value="<?=$design_info->topmenu07_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴8</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu08.gif")){
          	echo "<img src='../../data/menuimg/topmenu08.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu08.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu08_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu08_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu08_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu08_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu08_over" class="input"><br>
          <input type="text" name="topmenu08_url" value="<?=$design_info->topmenu08_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴9</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu09.gif")){
          	echo "<img src='../../data/menuimg/topmenu09.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu09.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu09_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu09_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu09_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu09_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu09_over" class="input"><br>
          <input type="text" name="topmenu09_url" value="<?=$design_info->topmenu09_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴10</td>
          <td class="t_value">
          <?
          if(is_file("../../data/menuimg/topmenu10.gif")){
          	echo "<img src='../../data/menuimg/topmenu10.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu10.gif'><font color=red>[삭제]</font></a>";
          }
          ?>
          <input type="file" name="topmenu10_img" class="input"><br>
          <?
          if(is_file("../../data/menuimg/topmenu10_over.gif")){
          	echo "<img src='../../data/menuimg/topmenu10_over.gif'> <a href='dsn_save.php?mode=topmenu_del&file=topmenu10_over.gif'><font color=red>[삭제]</font></a>";
          } 
          ?>
          <input type="file" name="topmenu10_over" class="input"><br>
          <input type="text" name="topmenu10_url" value="<?=$design_info->topmenu10_url?>" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td colspan="4" align="center" class="t_name">페이지경로</td>
        </tr>
        <tr>
          <td class="t_value" colspan="4">
          <table width="100%">
          <tr><td valign=top width="50%">
            <table width="100%">
            <tr><td width="30%">처음으로</td> <td width="70%">: &nbsp;/ </td>
            <tr><td>장바구니</td> <td>: &nbsp;/shop/prd_basket.php </td>
            <tr><td>주문,배송조회</td> <td>: &nbsp;/shop/order_list.php </td>
            <tr><td>상품검색</td> <td>: &nbsp;/shop/prd_search.php </td>
            <tr><td>인기상품</td> <td>: &nbsp;/shop/prd_list.php?grp=popular </td>
            <tr><td>추천상품</td> <td>: &nbsp;/shop/prd_list.php?grp=recom </td>
            <tr><td>신상품</td> <td>: &nbsp;/shop/prd_list.php?grp=new </td>
            <tr><td>세일상품</td> <td>: &nbsp;/shop/prd_list.php?grp=sale </td>
            <tr><td>일정목록</td> <td>: &nbsp;/schedule/list.php?code=schedule </td>
            <tr><td>설문조사</td> <td>: &nbsp;/poll/list.php?code=poll </td>
            </table>
          </td>
          <td valign=top width="50%">
            <table width="100%">
            <tr><td width="30%">회사소개</td> <td width="70%">: &nbsp;/center/company.php </td>
            <tr><td>고객센터</td> <td>: &nbsp;/center/center.php </td>
            <tr><td>이용안내</td> <td>: &nbsp;/center/guide.php </td>
            <tr><td>사이트맵</td> <td>: &nbsp;/center/sitemap.php </td>
            <tr><td>자주하는질문</td> <td>: &nbsp;/center/faq.php </td>
            <tr><td>마이쇼핑</td> <td>: &nbsp;/center/my_shop.php </td>
            <tr><td>고객문의</td> <td>: &nbsp;/bbs/list.php?code=qna</td>
            <tr><td>로그인</td> <td>: &nbsp;/member/login.php </td>
            <tr><td>회원가입</td> <td>: &nbsp;/member/join.php </td>
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
