<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "s_status=$s_status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

if($wiz_admin[company] <> ""){
	$company = "Y";
	$company_sql = " and wp.company_idx = $wiz_admin[company]";
}
?>
<script language="JavaScript" type="text/javascript">
<!--

// 주문상태 변경
function chgStatus(s_status){
   document.frm.s_status.value = s_status;
   document.frm.submit();
}

//체크박스선택 반전
function onSelect(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectEmpty();
	}
}

//체크박스 전체선택
function selectAll(){

	var i;

	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = true;
			}
		}
	}
	return;
}

//체크박스 선택해제
function selectEmpty(){

	var i;

	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//선택상품 삭제
function orderDelete(){

	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value + "|";
				}
			}
	}
	
	if(selorder == ""){
		alert("삭제할 주문을 선택하지 않았습니다.");
		return;
	}else{
		if(confirm("선택한 주문을 정말 삭제하시겠습니까?")){
			document.location = "order_save.php?mode=delete&selorder=" + selorder;
		}else{
			return;
		}
	}
	return;

}

// 선택 주문서 출력 
function orderPrint() {
		
	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value + "|";
				}
			}
	}
	
	if(selorder == ""){
		alert("출력할 주문을 선택하지 않았습니다.");
		return;
	}else{
		document.order_print.location = "order_print.php?selorder=" + selorder;
	}
	return;

}

// 선택주문 상태변경
function batchStatus(){
	
	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value + ":" + document.forms[i].status.value + "|";
				}
			}
	}
	
	if(selorder == ""){
		alert("변경할 주문을 선택하지 않았습니다.");
		return;
	}else{
		var url = "order_status.php?selorder=" + selorder;
		window.open(url,"batchStatus","height=250, width=250, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
	return;

}

// 주문정보 엑셀다운
function excelDown(){
	var url = "order_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=300, width=570, menubar=no, scrollbars=no, resizable=yes, toolbar=no, status=no, top=100, left=100");
}

// 기간설정
function setPeriod(pdate){

	var plist = pdate.split("-");
	
	prev_year = document.frm.prev_year;
	for(ii=0; ii<prev_year.length; ii++){
	   if(prev_year.options[ii].value == plist[0])
	      prev_year.options[ii].selected = true;
	}
	prev_month = document.frm.prev_month;
	for(ii=0; ii<prev_month.length; ii++){
	   if(prev_month.options[ii].value == plist[1])
	      prev_month.options[ii].selected = true;
	}
	prev_day = document.frm.prev_day;
	for(ii=0; ii<prev_day.length; ii++){
	   if(prev_day.options[ii].value == plist[2])
	      prev_day.options[ii].selected = true;
	}
	
	document.frm.submit();
}
function orderSMS(){
/*
	alert("선택 주문의 휴대폰으로 쿠폰SMS를 발행하는 버튼 입니다.\n 버튼 이미지 변경후에 alert 삭제요함. line.171 ");
*/
	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value +"|";
				}
			}
	}
	
	if(selorder == ""){
		alert("변경할 주문을 선택하지 않았습니다.");
		return;
	}else{
		var url = "coupon_sms.php?selorder=" + selorder;
		window.open(url,"SMS","height=350, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
	return;
}

//-->
</script>

<script language="javascript">
<!--
function searchZip(){
document.frm.com_address.focus();
var url = "../member/search_zip.php?kind=com_";
window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
</script>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">주문목록</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">주문검색 목록 입니다.</td>
	</tr>
</table>

<br>

<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
<form name="frm" action="<?=$PHP_SELF?>" method="get">
	<input type="hidden" name="page" value="">
	<input type="hidden" name="s_status" value="">
	<tr>
		<td width="15%" class="t_name">&nbsp; 진행상태</td>
		<td width="85%" class="t_value">
			<table>
				<tr>
					<td>
						<input type="button" onClick="chgStatus('');" value=" 전체 " <? if($s_status == "") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						<input type="button" onClick="chgStatus('OR');" value="주문접수" <? if($s_status == "OR") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						<input type="button" onClick="chgStatus('OY');" value="결제완료" <? if($s_status == "OY") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						<input type="button" onClick="chgStatus('DR');" value="발급(배송)준비중" <? if($s_status == "DR") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						<!--
						<input type="button" onClick="chgStatus('DI');" value="발급(배송)처리" <? if($s_status == "DI") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						-->
						<input type="button" onClick="chgStatus('DC');" value="발급(배송)완료" <? if($s_status == "DC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>&nbsp;
						<input type="button" onClick="chgStatus('OC');" value="주문취소" <? if($s_status == "OC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						<input type="button" onClick="chgStatus('MI');" value="미주문" <? if($s_status == "MI") echo "class=btn_sm"; else echo "class=btn_m"; ?>><br>
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" onClick="chgStatus('RD');" value="취소요청" <? if($s_status == "RD") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						<input type="button" onClick="chgStatus('RC');" value="취소완료" <? if($s_status == "RC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						<input type="button" onClick="chgStatus('CD');" value="교환요청" <? if($s_status == "CD") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
						<input type="button" onClick="chgStatus('CC');" value="교환완료" <? if($s_status == "CC") echo "class=btn_sm"; else echo "class=btn_m"; ?>>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="t_name">&nbsp; 기간</td>
		<td class="t_value">

			<select name="prev_year" class="select2">
			<?
			if(empty($next_year)) $next_year = date("Y");
			if(empty($next_month)) $next_month = date("m");
			if(empty($next_day)) $next_day = date("d");

			for($ii=2004; $ii <= 2020; $ii++){
				if($ii == $prev_year) echo "<option value=$ii selected>$ii";
				else echo "<option value=$ii>$ii";
			}
			?>
			</select>
			년

			<select name="prev_month" class="select2">
			<?
			for($ii=1; $ii <= 12; $ii++){
				if($ii<10) $ii = "0".$ii;
				if($ii == $prev_month) echo "<option value=$ii selected>$ii";
				else echo "<option value=$ii>$ii";
			}
			?>
			</select>
			월

			<select name="prev_day" class="select2">
			<?
			for($ii=1; $ii <= 31; $ii++){
				if($ii<10) $ii = "0".$ii;
				if($ii == $prev_day) echo "<option value=$ii selected>$ii";
				else echo "<option value=$ii>$ii";
			}
			?>
			</select>
			일 ~

			<select name="next_year" class="select2">
			<?
			for($ii=2004; $ii <= 2020; $ii++){
			if($ii == $next_year) echo "<option value=$ii selected>$ii";
			else echo "<option value=$ii>$ii";
			}
			?>
			</select>
			년

			<select name="next_month" class="select2">
			<?
			for($ii=1; $ii <= 12; $ii++){
				if($ii<10) $ii = "0".$ii;
				if($ii == $next_month) echo "<option value=$ii selected>$ii";
				else echo "<option value=$ii>$ii";
			}
			?>
			</select>
			월

			<select name="next_day" class="select2">
			<?
				for($ii=1; $ii <= 31; $ii++){
				if($ii<10) $ii = "0".$ii;
				if($ii == $next_day) echo "<option value=$ii selected>$ii";
				else echo "<option value=$ii>$ii";
			}
			?>
			</select>
			일 &nbsp;
<?
$yes_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*1));
$to_day = date('Y-m-d');
$week_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*7));
$month_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*30));
?>
			<a href="javascript:setPeriod('<?=$to_day?>')"><font color=red>[오늘]</font></a>
			<a href="javascript:setPeriod('<?=$yes_day?>')"><font color=red>[어제]</font></a>
			<a href="javascript:setPeriod('<?=$week_day?>')"><font color=red>[1주일]</font></a>
			<a href="javascript:setPeriod('<?=$month_day?>')"><font color=red>[1개월]</font></a>
		</td>
	</tr>
	<tr>
		<td class="t_name">&nbsp; 지역</td>
		<td class="t_value">
			<input type="radio" name="catcode" value="" <?if($catcode == ""){?>checked<?}?> /> 전체
<?
$sql = "select * from wiz_daycategory  where depthno='1' order by priorno01 asc, priorno02 asc, priorno03 asc";
$result = mysql_query($sql)or die($sql);
while($row = mysql_fetch_array($result)){
?>
			<input type="radio" name="catcode" value="<?=$row["catcode"]?>" <?if($catcode == $row["catcode"]){?>checked<?}?>/> <?=$row["catname"]?>
<?
}
?>

		</td>
	</tr>
<?if(!$wiz_admin[company]){?>
	<tr>
		<td class="t_name">&nbsp; 공급업체</td>
		<td class="t_value">
			<select name="company" class="select2">
				<option value="">::: 공급업체 :::</option>


			<?
			$csql = "select * from wiz_company order by wdate desc";
			$cresult = mysql_query($csql)or die($csql);
	
			while($rs = mysql_fetch_array($cresult)){
			?>
				<option <?if($company==$rs[idx]){?>selected<?}?> value="<?=$rs[idx]?>"><?=$rs[company]?></option>
			<?
			}	
			?>
			</select>



			</select>
		</td>
	</tr>
<?}?>
	<tr>
		<td class="t_name">&nbsp; 조건검색</td>
		<td class="t_value">
			<select name="searchopt" class="select2">
				<option value="orderid" <? if($searchopt == "orderid") echo "selected"; ?>>주문번호</option>
				<option value="send_name" <? if($searchopt == "md_name") echo "selected"; ?>>발신자이름</option>
				<option value="rece_name" <? if($searchopt == "md_name") echo "selected"; ?>>수취인이름</option>
				<option value="send_id" <? if($searchopt == "prd_name") echo "selected"; ?>>아이디</option>
				<option value="send_tphone" <? if($searchopt == "prd_name") echo "selected"; ?>>전화번호</option>
				<option value="send_email" <? if($searchopt == "prd_name") echo "selected"; ?>>이메일</option>
			</select>
			<input type="text" name="searchkey" value="<?=$searchkey?>" class="input">
			<input type="image" src="../image/btn_search.gif" align="absmiddle">
		</td>
	</tr>
</form>
</table>

<br>
<?


$sql = "select wo.orderid ";
$sql .= " from wiz_dayorder wo, wiz_basket wb, wiz_dayproduct wp, wiz_daycprelation wc ";
$sql .= " where wb.orderid=wo.orderid and ";
$sql .= " wp.prdcode=wb.prdcode and ";
$sql .= " wc.prdcode=wp.prdcode and ";
$sql .= " wo.status != ''";
$sql .= " $company_sql ";
$sql .= " group by wo.orderid ";
$result = mysql_query($sql) or error(mysql_error());
$all_total = mysql_num_rows($result);

if($prev_year){
	$prev_period = $prev_year."-".$prev_month."-".$prev_day;
	$next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
	$period_sql = " and wo.order_date >= '$prev_period' and wo.order_date <= '$next_period'";
}
if($s_status == "") $status_sql = "and wo.status != ''";
else if($s_status == "MI") $status_sql = "and wo.status = ''";
else $status_sql = "and wo.status = '$s_status'";
if($company) $comsearch_sql = " and wp.company_idx like '%$company%'";
if($searchopt && $searchkey) $searchopt_sql = " and wo.$searchopt like '%$searchkey%'";

if($catcode) $catcode_sql = " and wc.catcode like '%$catcode%'";


$sql = "select wo.orderid ";
$sql .= " from wiz_dayorder wo, wiz_basket wb, wiz_dayproduct wp, wiz_daycprelation wc ";
$sql .= " where wb.orderid=wo.orderid and wp.prdcode=wb.prdcode and wc.prdcode=wp.prdcode and  wo.orderid !='' $status_sql $period_sql $searchopt_sql $catcode_sql $company_sql ";
$sql .= " group by wo.orderid ";
$sql .= " order by wo.orderid desc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

$rows = 20;
$lists = 5;
$page_count = ceil($total/$rows);
if($page < 1 || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $total-$start;
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>총 주문수 : <b><?=$all_total?></b> &nbsp; 검색 주문수 : <b><?=$total?></b></td>
		<td align="right">
			&nbsp; <font color="6DCFF6">■</font> 결제완료
			&nbsp; <font color="BD8CBF">■</font> 주문완료
			&nbsp; <font color="ED1C24">■</font> 주문취소 &nbsp;
			<?if($company<>"Y"){?>
			<img src="../image/btn_excel.gif" style="cursor:hand" onClick="excelDown();">
			<?}?>
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form>
	<tr><td class="t_rd" colspan="20"></td></tr>
	<tr class="t_th">
		<th width="5%"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
		<th width="12%">주문일</th>
		<th width="15%">주문번호</th>
		<th width="18%">주문자명</th>
		<th width="13%">주문방법</th>
		<th width="12%" align="right">주문금액</th>
		<th width="12%">주문상태</th>
		<th width="13%">기능</th>
	</tr>
	<tr><td class="t_rd" colspan="20"></td></tr>
</form>
<?
$orderid = "";

$sql = "select wo.order_date, wo.orderid, wo.send_name, wo.send_id, wo.pay_method, wo.total_price, wo.status, wo.deliver_num, wo.deliver_date, wo.escrow_check, wp.isdeliver, wo.coupon_number, wo.deliver_num ";
$sql .= " from wiz_dayorder wo, wiz_basket wb, wiz_dayproduct wp, wiz_daycprelation wc  ";
$sql .= "where wb.orderid=wo.orderid and wp.prdcode=wb.prdcode and wc.prdcode=wp.prdcode and ";
$sql .= "wb.orderid !='' $company_sql $status_sql $period_sql $searchopt_sql $catcode_sql group by wo.orderid order by wb.orderid desc limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result)) && $rows){
	if($orderid == $row->orderid) continue;
	else $orderid = $row->orderid; $ordernum = 0;

	if($row->status == "OY") $stacolor = "6DCFF6";
	else if($row->status == "DC" || $row->status == "CC") $stacolor = "BD8CBF";
	else if($row->status == "OC" || $row->status == "RC" || $row->status == "RD") $stacolor = "ED1C24";
	else $stacolor = "";

	if(!strcmp($row->escrow_check, "Y")) $escrow_check = "<br>[에스크로]";
	else  $escrow_check = "";

?>
<form action="order_save.php" name="<?=$row->prdcode?>" method="get">
	<input type="hidden" name="mode" value="chgstatus">
	<input type="hidden" name="page" value="<?=$page?>">
	<input type="hidden" name="orderid" value="<?=$row->orderid?>">
	<input type="hidden" name="status" value="<?=$row->status?>">
	<input type="hidden" name="s_status" value="<?=$s_status?>">
	<input type="hidden" name="prev_year" value="<?=$prev_year?>">
	<input type="hidden" name="prev_month" value="<?=$prev_month?>">
	<input type="hidden" name="prev_day" value="<?=$prev_day?>">
	<input type="hidden" name="next_year" value="<?=$next_year?>">
	<input type="hidden" name="next_month" value="<?=$next_month?>">
	<input type="hidden" name="next_day" value="<?=$next_day?>">
	<input type="hidden" name="searchopt" value="<?=$searchopt?>">
	<input type="hidden" name="searchkey" value="<?=$searchkey?>">
	<tr><td height="4"></td></tr>
	<tr>
		<td align="center"><input type="checkbox" name="select_checkbox"></td>
		<td align="center"><?=substr($row->order_date,0,16)?></td>
		<td align="center"><a href="order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>"><?=$row->orderid?></a> <?=$escrow_check?></td>
		<td align="center">
		<?
		if($row->send_id == "") echo "$row->send_name [비회원]";
		else echo "<a href='../member/member_info.php?mode=update&id=$row->send_id'>$row->send_name [$row->send_id]</a>";
		?>
		</td>
		<td align="center"><?=pay_method($row->pay_method)?></td>
		<td align="right"><?=number_format($row->total_price)?>원 &nbsp; &nbsp;</td>
		<td align="center">
			<table cellpadding="2" width="100%">
				<tr>
					<td bgcolor="<?=$stacolor?>" align="center">
						<select name="chg_status" style="width:120"> 
						<? if(!strcmp($row->status, "OC")) {	//주문취소,취소완료인 경우 상태변경 불가능 ?>
						<option value="OC" <? if($row->status == "OC") echo "selected"; ?>>주문취소</option>
						<? } else if(!strcmp($row->status, "RC")) { ?>
						<option value="RC" <? if($row->status == "RC") echo "selected"; ?>>취소완료</option>
						<? } else { ?>
						<? 		if($row->status == "OR"){ ?>
						<option>---------</option>
						<option value="OR" <? if($row->status == "OR") echo "selected"; ?>>주문접수</option>
						<option value="OY" <? if($row->status == "OY") echo "selected"; ?>>결제완료</option>
						<? 		}else{ ?>
						<option>---------</option>
						<option value="OY" <? if($row->status == "OY") echo "selected"; ?>>결제완료</option>
						<option value="DR" <? if($row->status == "DR") echo "selected"; ?>>발급(배송)준비중</option>
						<!--
						<option value="DI" <? if($row->status == "DI") echo "selected"; ?>>발급(배송)처리</option>
						-->
						<option value="DC" <? if($row->status == "DC") echo "selected"; ?>>발급(배송)완료</option>
						<option value="OC" <? if($row->status == "OC") echo "selected"; ?>>주문취소</option>
						<option>---------</option>
						<option value="RD" <? if($row->status == "RD") echo "selected"; ?>>취소요청</option>
						<option value="RC" <? if($row->status == "RC") echo "selected"; ?>>취소완료</option>
						<option value="CD" <? if($row->status == "CD") echo "selected"; ?>>교환요청</option>
						<option value="CC" <? if($row->status == "CC") echo "selected"; ?>>교환완료</option>
						<? 		} ?>   
						<? } ?>      	
						</select>
					</td>
<?if($company<>"Y"){?>
					<td><input type="image" src="../image/btn_apply_s.gif"></td>
<?}?>
				</tr>
			</table>
		</td>
		<td align="center"><img src="../image/btn_dview_s.gif" style="cursor:hand"  onClick="document.location='order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>'"></td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
</form>
<?
	$no--;
	$rows--;
}

if($total <= 0){
?>
	<tr><td height=30 colspan=9 align=center>등록된 주문이 없습니다.</td></tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
}
?>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td width="33%">
<?if($company<>"Y"){?>
			<img src="../image/btn_seldel.gif" style="cursor:pointer" onClick="orderDelete();" />
			<img src="../image/btn_statuschg.gif" style="cursor:pointer" onClick="batchStatus();" />
			<img src="../image/btn_orderprint.gif" style="cursor:pointer" onClick="orderPrint();" />
			<img src="../image/btn_sendsms.gif" style="cursor:pointer" onClick="orderSMS();" />
<?}?>
		</td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
		<td width="33%"></td>
	</tr>
</table>

<br><br><br>

<?if($company!="Y"){?>
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
						<b><font color="#000000">에스크로 주문 처리 주의사항</font></b><br>
						- 에스크로 주문인경우 반드시 배송정보(택배사,송장번호,발송일자)를 결제시스템 회사에 등록해야합니다.<br>
						- 위 주문 목록에서 주문번호 밑에 [에스크로] 표시가 되있다면 반드시 등록되어야합니다.<br>
						- [에스크로]가 표시된것은 운영정보설정 > 에스크로 사용함으로 설정된 상태에서 고객이 10만원 이상 주문시 계좌이체, 가상계좌를 이용해서 주문한경우입니다.<br>
						- 에스크로 주문인 경우 실제 결제가 완료되어 결제시스템 회사의 상태가 결제된 이후에 배송정보가 결제시스템 회사로 등록됩니다.<br><br>

						<b><font color="#000000">배송정보 등록방법</font></b><br>
						1. 주문상세보기에서 운송장번호를 입력 후 처리상태를 "배송처리", "배송완료" 로 변경한경우 결제시스템 회사에 배송정보가 등록됩니다.<br>
						2. 상태일괄변경에서 상태를 "배송처리", "배송완료" 로 선택하는경우 운송장번호 발송일자를 입력하는 화면이 생성됩니다.<br>
						&nbsp; &nbsp;운송장 번호,발송일자를 입력후 적용하면 배송정보가 결제시스템 회사로 등록됩니다.<br>
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
<?}?>
<iframe SRC="" width="0" height="0" frameborder="0" border="0" scrolling="no" marginheight="0" marginwidth="0"  name="order_print"></iframe>
<? include "../footer.php"; ?>