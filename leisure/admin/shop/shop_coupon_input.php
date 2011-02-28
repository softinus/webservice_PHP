<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
if($sub_mode == "update"){
	$sql = "select * from wiz_coupon where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$coupon_info = mysql_fetch_array($result);
}
?>
<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
   
   if(frm.name.value == ""){
      alert("쿠폰명을 입력하세요");
      frm.name.focus();
      return false;
   }
   if(frm.coupon_sdate.value == ""){
      alert("기간을 입력하세요");
      frm.coupon_sdate.focus();
      return false;
   }
   if(frm.coupon_edate.value == ""){
      alert("기간을 입력하세요");
      frm.coupon_edate.focus();
      return false;
   }
   if(frm.coupon_dis.value == ""){
      alert("할인율을 입력하세요");
      frm.coupon_dis.focus();
      return false;
   }
   
}
//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">쿠폰관리</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">쿠폰을 등록,수정합니다.</td>
        </tr>
      </table>

			<br>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
      <form name="frm" action="shop_save.php" method="post" onSubmit="return inputCheck(this);" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="shop_coupon">
      <input type="hidden" name="sub_mode" value="<?=$sub_mode?>">
      <input type="hidden" name="idx" value="<?=$idx?>">
        <tr> 
          <td width="15%" class="t_name">쿠폰명</td>
          <td width="85%" class="t_value">
            <input name="coupon_name" value="<?=$coupon_info[coupon_name]?>" type="text" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">기간</td>
          <td class="t_value">
            <input name="coupon_sdate" value="<?=$coupon_info[coupon_sdate]?>" type="text" size="12" class="input" onClick="Calendar1('document.frm','coupon_sdate');"> ~
            <input name="coupon_edate" value="<?=$coupon_info[coupon_edate]?>" type="text" size="12" class="input" onClick="Calendar1('document.frm','coupon_edate');">
          </td>
        </tr>
        <tr> 
          <td class="t_name">쿠폰금액/할인율</td>
          <td class="t_value">
            <input name="coupon_dis" value="<?=$coupon_info[coupon_dis]?>" type="text" class="input">&nbsp; 
            <input type="radio" name="coupon_type" value="%" <? if($coupon_info[coupon_type] == "" || $coupon_info[coupon_type] == "%") echo "checked"; ?>>% 퍼센트 
            <input type="radio" name="coupon_type" value="원" <? if($coupon_info[coupon_type] == "원") echo "checked"; ?>>원
          </td>
        </tr>
        <tr> 
          <td class="t_name">쿠폰수량</td>
          <td class="t_value">
            <input name="coupon_amount" value="<?=$coupon_info[coupon_amount]?>" type="text" class="input">&nbsp; 
            <input type="checkbox" name="coupon_limit" value="N" <? if($coupon_info[coupon_limit] == "N") echo "checked"; ?>  onClick="if(this.checked==true) this.form.coupon_amount.disabled = true; else this.form.coupon_amount.disabled = false;">수량제한없음
          </td>
        </tr>
        <!--tr> 
          <td class="t_name">쿠폰이미지</td>
          <td class="t_value">
          	<?
          	$couponimg_path = "../../images/coupon";
          	if( @file($couponimg_path."/".$coupon_info[coupon_img]) ){
          	?>
          	<img src="/images/coupon/<?=$coupon_info[coupon_img]?>"><br>
          	<?
          	}
          	?>
            <input name="coupon_img" value="<?=$coupon_info[coupon_img]?>" type="file" class="input">&nbsp; 
            
          </td>
        </tr-->
        <? if($sub_mode == "update"){ ?>
        <tr> 
          <td height="25" class="t_name">쿠폰링크</td>
          <td class="t_value">&lt;a href="/shop/coupon_down.php?eventidx=<?=$idx?>"&gt;링크명&lt;/a&gt;</td>
        </tr>
        <tr> 
          <td height="25" class="t_name">쿠폰발급회원</td>
          <td class="t_value">
          	<table width="100%" border="0" cellspacing="2" cellpadding="1">
          		<tr>
          			<td height="20" align="center" class="t_name">번호</td>
          			<td align="center" class="t_name">회원이름</td>
          			<td align="center" class="t_name">회원아이디</td>
          			<td align="center" class="t_name">발급시간</td>
          			<td align="center" class="t_name">사용여부</td>
          	  </tr>
		          <?
		          $sql = "select wc.wdate, wc.coupon_use, wm.id, wm.name from wiz_mycoupon wc, wiz_member wm where wc.eventidx='$idx' and wc.memid = wm.id";
		          $result = mysql_query($sql) or error(mysql_error());
		          $total = mysql_num_rows($result);
		          while($row = mysql_fetch_object($result)){
		          ?>
              <tr>
          			<td align="center"><?=$total?></td>
          			<td align="center"><?=$row->name?></td>
          			<td align="center"><?=$row->id?></td>
          			<td align="center"><?=$row->wdate?></td>
          			<td align="center"><?=$row->coupon_use?></td>
          	  </tr>
		          <?
		          	$total--;
		          }
		          ?>
            </table>
          </td>
        </tr>
      	<? } ?>
      </table>
      
      <br>
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_list_l.gif" style="cursor:hand"  onClick="document.location='shop_coupon.php';">
          </td>
        </tr>
      </form>
      </table>
      <br><br>
      

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
            	<font color="#000000">쿠폰다운로드 페이지 생성방법</font><br>
              쿠폰을 생성후 다운로드 받을 페이지를 디자인하여 생성합니다.<br>
          		생성한 페이지의 적당한 위치에 "쿠폰링크" 테그를 이용하여 쿠폰다운로드를 링크를 생성합니다.<br>
          		링크를 클릭하면 쿠폰이 다운로드 됩니다.<br><br>
          	
          		"쿠폰링크" 테그로 링크를 걸면 쇼핑몰 어느위치에서든 쿠폰다운로드 기능을 만들수 있습니다.<br>
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

<? include "../footer.php"; ?>