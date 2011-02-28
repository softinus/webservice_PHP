<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&keyword=$keyword&birthday=$birthday&memorial=$memorial&age=$age";
$param .= "&address=$address&job=$job&marriage=$marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day";
//--------------------------------------------------------------------------------------------------

?>

<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
	if(frm.subject.value == ""){
		alert("제목을 입력하세요");
		frm.subject.focus();
		return false;
	}
	if(frm.content.value == "<P>&nbsp;</P>"){
		alert("내용을 입력하세요");
		return false;
	}

	if(confirm("메일을 발송 하시겠습니까? \n\n메일 발송창을 완료시까지 닫지마세요.")){
		window.open("","mailWin","height=300, width=300, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, top=100, left=100");
		frm.target = "mailWin";
	}else{
		return false;
	}
}

function reviewMail(frm){

	frm.review.value='Y';
	frm.target='_blank';

	frm.submit();

}

function mailView(prdcode){
	var url = "mail.php?prdcode="+prdcode;
	window.open(url, "자동작성메일확인","height=641, width=699, menubar=no, scrollbars=no, resizable=yes, toolbar=no, status=no, top=100, left=100");
}


//-->
</script>
<style type="text/css">
.button{padding:5px; overflow:visible; font-size:12px; font-weight:700; color:#fff; background:#bbb; border:1px solid #888;}
</style>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">이메일알림기능</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">이메일알림기능</td>
	</tr>
</table>
<br>



<?

$sql = "select * from wiz_dayproduct";
$result = mysql_query($sql) or error(mysql_error());
$all_total = mysql_num_rows($result);
$currentTime = time();


$sql = "select * from wiz_dayproduct";
$sql .= " order by wdate desc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$rows = 5;
$lists = 5;
$page_count = ceil($total/$rows);
if(!$page || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $start+1;



?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>총 상품수 : <b><?=$all_total?></b> , 리스트 상품수 : <b><?=$total?></b></td>
	</tr>
	<tr><td height="3"></td></tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td class="t_rd" colspan="20"></td></tr>
	<tr class="t_th">
		<th align="center">번호</th>
		<th align="center">상품명</th>
		<th align="center">판매시작일</th>
		<th align="center">판매종료일</th>
		<th align="center">정가</th>
		<th align="center">판매가</th>
		<th align="center">할인율</th>
		<th align="center">메일폼</th>
	</tr>
	<tr><td class="t_rd" colspan="20"></td></tr>
<?
$sql = "select * from wiz_dayproduct";
$sql .= " order by wdate desc";
$sql .="  limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result)) && $rows){
	if($row->reemail == "Y") $row->reemail = "예";
	else $row->reemail = "아니오";
?>
	<input type="hidden"		name="prdname<?=$row->prdcode?>"		value="<?=$row->prdname?>">
	<input type="hidden"		name="selldate<?=$row->prdcode?>"			value="<?=$row->selldate?>">
	<input type="hidden"		name="selllastdate<?=$row->prdcode?>"	value="<?=$row->selllastdate?>">
	<input type="hidden"		name="conprice<?=$row->prdcode?>"		value="<?=$row->conprice?>">
	<input type="hidden"		name="sellprice<?=$row->prdcode?>"		value="<?=$row->sellprice?>">
	<input type="hidden"		name="discount_per<?=$row->prdcode?>"	value="<?=$row->discount_per?>">
	<tr>
		<td align="center" height="30"><?=$no?></td>
		<td align="left" style="padding-left:20px;"><?=$row->prdname?></td>
		<td align="center"><?=$row->selldate?></td>
		<td align="center"><?=$row->selllastdate?></td>
		<td align="center"><?=number_format($row->conprice)?>원</td>
		<td align="center"><?=number_format($row->sellprice)?>원</td>
		<td align="center"><?=$row->discount_per?>%</td>
		<td align="center"><img src="../image/btn_view_s.gif" style="cursor:hand" onClick="mailView('<?=$row->prdcode?>');"></td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
	$no++;
	$rows--;
}

if($total <= 0){
?>
	<tr><td height=30 colspan=10 align=center>등록된 상품이 없습니다.</td></tr>
	<tr><td colspan='20' class='t_line'></td></tr>
<?
}
?>
</table>
<br />
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr> 
		<td width="33%"></td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
		<td width="33%"></td>
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
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="6">
				<tr>
					<td><img src="../image/check_tit.gif" width="75" height="19" /></td>
				</tr>
				<tr>
					<td class="chk_alt">
						<b>이메일알림기능은 회원에게 지정한 시간에 이메일로 자동으로 발송하는 기능을 말합니다.</b><br><br>
						<font color="red">이메일알림기능 서비스 주의사항</font><br>
						- 홈페이지 서버에서는 대량에 메일을 발송하는게 불가능합니다. CAFE24대량메일 서비스와 연동을 추천드립니다. 연동비용별도 10만원[vat별도]<br />
						- 보통 웹호스팅 회사에서는 대량의 메일을 자동발송하는 기능을 지원하지 않습니다. 메일발송 수동등록이 불가피합니다.<br />
						- 메일폼 보기를 클릭 발송할 메일 내용을 클립보드로 복사 CAFE24대량메일 서비스에서 내용을 붙여넣기후 메일을 발송하면 됩니다.<br />
						- CAFE24대량메일 발송시 예약기능이 있으므로 원하는 시간을 설정해서 발송이 가능합니다.
					</td>
				</tr>
			</table>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
		<td></td>
		<td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
	</tr>
</table>
<? include "../footer.php"; ?>