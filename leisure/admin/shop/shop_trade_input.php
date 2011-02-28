<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
if($sub_mode == "update"){
	$sql = "select * from wiz_tradecom where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$cominfo = mysql_fetch_array($result);
}
?>

<script language="JavaScript" type="text/javascript">
<!--

function inputCheck(frm){
   
   if(frm.com_name.value == ""){
      alert("상호를 입력하세요");
      frm.com_name.focus();
      return false;
   }
   if(frm.com_type.value == ""){
      alert("업체구분을 선택하세요");
      frm.com_type.focus();
      return false;
   }
}

// 우편번호 찾기
function searchZip(){
	document.frm.com_address.focus();
	var url = "../member/search_zip.php?kind=com_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
//-->
</script>

		<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">거래처관리</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">거래처 정보를 관리합니다.</td>
        </tr>
      </table>

			<br>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
      <form name="frm" action="shop_save.php" method="post" onSubmit="return inputCheck(this);">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="shop_trade">
      <input type="hidden" name="sub_mode" value="<?=$sub_mode?>">
      <input type="hidden" name="idx" value="<?=$idx?>">
        <tr> 
          <td width="15%" class="t_name">사업자등록번호</td>
          <td width="35%" class="t_value"><input name="com_num" value="<?=$cominfo[com_num]?>" type="text" class="input"></td>
          <td width="15%" class="t_name">업체구분</td>
          <td width="35%" class="t_value">
            <select name="com_type">
            <option value="">:: 선택 ::
            <option value="BUY" <? if($cominfo[com_type] == "BUY") echo "selected"; ?>>매입처
            <option value="SAL" <? if($cominfo[com_type] == "SAL") echo "selected"; ?>>매출처
            <option value="DEL" <? if($cominfo[com_type] == "DEL") echo "selected"; ?>>배송업체
            <option value="OTH" <? if($cominfo[com_type] == "OTH") echo "selected"; ?>>기타
            </select>
          </td>
        </tr>
        <tr> 
          <td class="t_name">상호</td>
          <td class="t_value">
            <input name="com_name" value="<?=$cominfo[com_name]?>" type="text"  class="input">
          </td>
          <td class="t_name">대표자</td>
          <td class="t_value">
            <input name="com_owner" value="<?=$cominfo[com_owner]?>" type="text" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">사업장주소</td>
          <td class="t_value" colspan="3">
            <? list($com_post, $com_post2) = explode("-", $cominfo[com_post]); ?>
            <input type="text" name="com_post" value="<?=$com_post?>" size="6" class="input"> - 
            <input type="text" name="com_post2" value="<?=$com_post2?>" size="6" class="input">
            <img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip();"><br>
            <input name="com_address" value="<?=$cominfo[com_address]?>" type="text" size="50" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">업태</td>
          <td class="t_value">
            <input name="com_kind" value="<?=$cominfo[com_kind]?>" type="text" class="input">
          </td>
          <td class="t_name">종목</td>
          <td class="t_value">
             <input name="com_class" value="<?=$cominfo[com_class]?>" type="text" class="input">
          </td>
        </tr>
      </table>
      <br>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr> 
          <td width="15%" class="t_name">전화번호</td>
          <td width="35%" class="t_value">
            <input name="com_tel" value="<?=$cominfo[com_tel]?>" type="text" class="input">
          </td>
          <td width="15%" class="t_name">팩스</td>
          <td width="35%" class="t_value">
            <input name="com_fax" value="<?=$cominfo[com_fax]?>" type="text" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">거래은행</td>
          <td class="t_value">
            <input name="com_bank" value="<?=$cominfo[com_bank]?>" type="text" class="input">
          </td>
          <td class="t_name">계좌번호</td>
          <td class="t_value">
            <input name="com_account" value="<?=$cominfo[com_account]?>" type="text" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">홈페이지</td>
          <td class="t_value" colspan="3">
            <input name="com_homepage" value="<?=$cominfo[com_homepage]?>" size="30" type="text" class="input">
          </td>
        </tr>
      </table>
      <br>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
        <tr> 
          <td width="15%" class="t_name">담당자</td>
          <td width="35%" class="t_value">
            <input name="charge_name" value="<?=$cominfo[charge_name]?>" type="text" class="input">
          </td>
          <td width="15%" class="t_name">담당자 이메일</td>
          <td width="35%" class="t_value">
            <input name="charge_email" value="<?=$cominfo[charge_email]?>" type="text" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">담당자 휴대폰</td>
          <td class="t_value">
            <input name="charge_hand" value="<?=$cominfo[charge_hand]?>" type="text" class="input">
          </td>
          <td class="t_name">담당자 전화</td>
          <td class="t_value">
            <input name="charge_tel" value="<?=$cominfo[charge_tel]?>" type="text" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">기타사항</td>
          <td class="t_value" colspan="3">
          <textarea name="descript" cols="70" rows="5" class="textarea" style="width:100%"><?=$cominfo[descript]?></textarea>
          </td>
        </tr>
      </table>
                                          
      <br>
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='shop_trade.php';">
          </td>
        </tr>
      </form>
      </table>

<? include "../footer.php"; ?>