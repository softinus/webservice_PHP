<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<? include "../../inc/sch_info_set.inc"; 	 								// 일정 정보
// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&display=$display&coupon_use=$coupon_use&searchopt=$searchopt&searchkey=$searchkey";
$param .= "&brand=$brand&shortage=$shortage&stock=$stock";
//--------------------------------------------------------------------------------------------------

?>

<script language="JavaScript" type="text/javascript">
<!--

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
		if(document.forms[i].action == "product_save.php"){
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
		if(document.forms[i].select_checkbox){
			if(document.forms[i].action == "product_save.php"){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//선택상품 삭제
function prdDelete(){

	var i;
	var selected = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selected = selected + document.forms[i].prdcode.value + "|";
				}
			}
	}

	if(selected == ""){
		alert("삭제할 상품을 선택하지 않았습니다.");
		return;
	}else{
		if(confirm("선택한 상품을 정말 삭제하시겠습니까?")){
			document.location = "prd_save.php?mode=delete&page=<?=$page?>&<?=$param?>&selected=" + selected;
		}else{
			selectEmpty();
			return;
		}
	}
	return;
	
}

// 카테고리 변경
function catChange(form, idx){
   if(idx == "1"){
      form.dep2_code.options[0].selected = true;
      form.dep3_code.options[0].selected = true;
   }else if(idx == "2"){
      form.dep3_code.options[0].selected = true;
   }
   	form.page.value = 1;
   	form.submit();
}

// 상품복사
function prdCopy(prdcode){
	if(confirm("동일한 상품을 하나더 자동등록합니다.")){
		document.location = "prd_save.php?mode=prdcopy&prdcode=" + prdcode;
	}
}

// 상품정보 엑셀다운
function excelDown(){
	var url = "prd_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=240, width=560, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 상품정보 엑셀입력 
function excelUp() {
	var url = "prd_excel_up.php";
	window.open(url,"excelUp","height=520, width=560, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 재고여부 
function chgShortage(frm) {
	
	frm.page.value = 1;
	
	if(frm.shortage.value == "S") {
		frm.stock.disabled = false;
		frm.stock.focus();
	} else {
		frm.stock.disabled = true;
		frm.submit();
	}
	
}

// 체크박스 선택리스트
function selectValue(){
	var i;
	var selvalue = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].prdcode != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selvalue = selvalue + document.forms[i].prdcode.value + "|";
				}
			}
	}
	return selvalue;
}

//상품이동
function movePrd(){
	selvalue = selectValue();

	if(selvalue == ""){
		alert("이동할 상품을 선택하세요.");
		return false;
	}else{
		var uri = "prd_move.php?selvalue=" + selvalue;
		window.open(uri,"movePrd","width=350,height=150");
	}
}

// 상품복사
function copyPrd(){
	selvalue = selectValue();
	if(selvalue == ""){
		alert("복사할 상품을 선택하세요.");
		return false;
	}else{
		var uri = "prd_copy.php?selvalue=" + selvalue;
		window.open(uri,"copyPrd","width=350,height=150,resizable=yes");
	}
}
// 달력이동
function onmovemonth(fObj){
	var year = fObj.year.value;
	var month = fObj.month.value;
	window.location.href='<?=$PHP_SELF?>?year='+year+'&month='+month+'&<?=$param?>';
}
//-->
</script>
</head>

<?
/* 검색 정보 캐치*/
if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
if(!empty($display)) $display_sql = "wp.showset = '$display' and ";
if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
if(!empty($coupon_use)) $coupon_sql = "wp.coupon_use = '$coupon_use' and ";
if(!empty($brand)) $brand_sql = "wp.brand = '$brand' and ";
if(!empty($shortage)) {
	if(!strcmp($shortage, "N")) $shortage_sql = " (wp.shortage = '$shortage' or wp.shortage = '') and ";
	else $shortage_sql = " wp.shortage = '$shortage' and ";
}
if(!strcmp($shortage, "S")) $stock_sql = " wp.stock <= '$stock' and ";

/* 달력 날짜정보 캐치*/
if(!$year){
	$year	= date("Y");
}
if(!$month){
 $month	= date("m");
}
$prev = date("Y-m",mktime(0,0,0,$month-1,1,$year));
$prevArray = split("-",$prev);
$prevYear = $prevArray[0];
$prevMonth = $prevArray[1];

$next = date("Y-m",mktime(0,0,0,$month+1,1,$year));
$nextArray = split("-",$next);
$nextYear = $nextArray[0];
$nextMonth = $nextArray[1];

$nnext = date("Y-m",mktime(0,0,0,$month+2,1,$year));
$nnextArray = split("-",$nnext);
$nnextYear = $nnextArray[0];
$nnextMonth = $nnextArray[1];

$day = "";
$first_day	= date("w",mktime(0,0,0,$month,1,$year)) + 1;  
$total_day	= date("t", mktime(0, 0, 0, $month, 1, $year));

$chk_start  = mktime(00,00,01,$month,01,$year);
$chk_end = mktime(23,59,59,$month,$total_day,$year);

$sql = "select * from wiz_product wp, wiz_cprelation wc where $catcode_sql $special_sql $display_sql $search_sql $coupon_sql $brand_sql $shortage_sql $stock_sql wc.prdcode = wp.prdcode and $chk_start < unix_timestamp(selldate) and unix_timestamp(selldate) < $chk_end";
$result = mysql_query($sql) or die($sql);

$arrProduct = "";	// 해당날짜 상품 정보
while($row = mysql_fetch_array($result)){
	$thisday = substr($row[selldate],8,2);

	if($arrProduct[$thisday] != ""){
		$arrProduct[$thisday] .= '|<a href="prd_input.php?mode=update&prdcode='.$row[prdcode].'&page='.$page.'&'.$param.'">'.$row[prdname].'</a>';
	}else{
		$arrProduct[$thisday] .= '<a href="prd_input.php?mode=update&prdcode='.$row[prdcode].'&page='.$page.'&'.$param.'">'.$row[prdname].'</a>';
	}
}
?>
<body>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">상품목록</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">전체상품 목록 및 검색합니다.</td>
	</tr>
</table>
<br>

<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
	<form name="searchForm" action="<?=$PHP_SELF?>" method="get">
		<input type="hidden" name="page" value="<?=$page?>">
	<tr>
		<td width="15%" class="t_name">상품분류</td>
		<td width="85%" colspan="3" class="t_value">
			<select name="dep_code" onChange="catChange(this.form,'1');" class="select">
				<option value=''>:: 대분류 ::
<?
	$sql = "select substring(catcode,1,2) as catcode, catname from wiz_category where depthno = 1 order by priorno01 asc";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){
		if($row->catcode == $dep_code)
			echo "<option value='$row->catcode' selected>$row->catname";
		else
			echo "<option value='$row->catcode'>$row->catname";
	}
?>
			</select>

			<select name="dep2_code" onChange="catChange(this.form,'2');" class="select">
				<option value=''>:: 중분류 ::
<?
	if($dep_code != ''){
		$sql = "select substring(catcode,3,2) as catcode, catname from wiz_category where depthno = 2 and catcode like '$dep_code%' order by priorno02 asc";
		$result = mysql_query($sql) or error(mysql_error());

		while($row = mysql_fetch_object($result)){
			if($row->catcode == $dep2_code)
				echo "<option value='$row->catcode' selected>$row->catname";
			else
				echo "<option value='$row->catcode'>$row->catname";
		}
	}
?>
			</select>

			<select name="dep3_code" onChange="catChange(this.form,'3');" class="select">
				<option value=''>:: 소분류 ::
<?
	if($dep_code != '' && $dep2_code != ''){
		$sql = "select substring(catcode,5,2) as catcode, catname from wiz_category where depthno = 3 and catcode like '$dep_code$dep2_code%' order by  priorno03 asc";
		$result = mysql_query($sql) or error(mysql_error());

		while($row = mysql_fetch_object($result)){
			if($row->catcode == $dep3_code)
				echo "<option value='$row->catcode' selected>$row->catname";
			else
				echo "<option value='$row->catcode'>$row->catname";
		}
	}
?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="15%" class="t_name">날짜검색</td>
		<td width="85%" colspan="3" class="t_value">
			<select name="year" class="select" onchange="onmovemonth(this.form)">
				<option>:: 년 ::</option>
<?for($i=date("Y")-1; $i<=date("Y")+1; $i++){?>
				<option value="<?=$i?>" <?if($year==$i){?>selected<?}?>><?=$i?></option>
<?}?>
			</select> 년
			<select name="month" class="select" onchange="onmovemonth(this.form)">
				<option>:: 월 ::</option>
<?for($i=1; $i<=12; $i++){?>
				<option value="<?=$i?>" <?if($month==$i){?>selected<?}?>><?=$i?></option>
<?}?>
			</select> 월
		</td>
	</tr>
	</form>
</table>

<br>
<style>
/*달력 TBL 테이블*/
.calendarTbl{background:#b8d9e1;}
.calendarTbl tr{background:#fff;}
.calendarTbl thead tr th{background:#e8f3f7; height:30px; font-size:14px; font-family:Comic Sans MS; color:#11809f;}
.calendarTbl tbody tr td{height:80px; vertical-align:top; text-align:right; font-size:13px;}

.calendarTbl tbody tr td span{height:26px; font-size:13px;}
.calendarTbl tbody tr td a{ color:green !important; text-align:left; /*상품 폰트 색상*/ padding-bottom:5px; display:block;}
.sundayColor{color:#f00;}/*일요일*/
.satdayColor{color:#00f;}/*토요일*/
</style>
<table width="100%" border="0" cellpadding="10" cellspacing="1" class="calendarTbl">
	<colgroup>
		<col width="14%" />
		<col width="14%" />
		<col width="14%" />
		<col width="14%" />
		<col width="14%" />
		<col width="14%" />
		<col width="14%" />
	</colgroup>
	<thead>
		<tr>
			<th><span class="sundayColor">Sun</span></th>
			<th>Mon</th>
			<th>Tue</th>
			<th>Wed</th>
			<th>Thu</th>
			<th>Fir</th>
			<th><span class="satdayColor">Sat</span></th>
		</tr>
	</thead>
	<tbody>
<?
if(($first_day > 5) && ((floor($total_day / 5) == 6) || (floor($total_day / 5) == 7))) {
	$line = 6;
	if($total_day == 30 && $first_day == 6) $line--;
} else if(($first_day == 1) && ($total_day == 28)) {
	$line = 4;
} else {
	$line = 5;
}


$k = 0;

for ($i=1; $i<=$line; $i++) {
	echo "<tr>";
	for ($j=1; $j<=7; $j++) {
		$day_sch = "";
		if ((!$day) && ($j == $first_day)) $day = 1;

		$day_color = "";
		if ($j == 7) $day_color = " class='satdayColor' ";
		if ($j == 1) $day_color = " class='sundayColor' ";

		if ($day > 0){
			if($schedule_list[$day]) $td_color = "#A1DE8D";
			else $td_color = "#FFFFFF";
			$day_img = "<img src='/admin/manage/image/schedule/day".$day."-".$day_color.".gif'>";
			$day_sch = "";

			for($k=0;$k<count($schedule_list[$day]);$k++){
				$day_sch .= "&nbsp;<a href='view.php?idx=".$schedule_list[$day][$k][idx].$param."'>".$schedule_list[$day][$k][subject]."</a><br>";
			}
		}else{
			$day_img = "";
		}


		if(strlen($day) == 1){
			$currentDate = $year."-".$month."-0".$day;
		}else{
			$currentDate = $year."-".$month."-".$day;
		}

		$tmp_day = $day;
		if(!strcmp($day, date('j')) && !strcmp($month, date('m'))) $day = "<strong>".$day."</strong>";

		echo	"<td ".$day_color."><span>".$day."</span>";
		
		if($day != "" && $day != "&nbsp;"){
			if($arrProduct[strip_tags($day)]){
				echo '<br>';
				$thisDayArrProduct = explode("|",$arrProduct[strip_tags($day)]);
				for($p=0; $p<count($thisDayArrProduct); $p++){
					echo $thisDayArrProduct[$p];
				}
			}
			echo '<br /><img src="../image/btn_prdadd.gif" onClick="document.location=\'prd_input.php?currentdate='.$currentDate.'&'.$param.'\'" style="cursor:pointer" />';
		}
		echo "</td>".chr(10);

		$day = $tmp_day;

		if ($day != $total_day) {
			if (($day > 0) && ($day < $total_day)) $day++;
		} else {
			$day = "&nbsp;";
		}
	}
	echo "</tr>";
}
?>
	</tbody>
</table>

<?
/*
$sql = "select prdcode from wiz_product";
$result = mysql_query($sql) or error(mysql_error());
$all_total = mysql_num_rows($result);



$sql = "select distinct wp.prdcode from wiz_product wp, wiz_cprelation wc 
where $catcode_sql $special_sql $display_sql $search_sql $coupon_sql $brand_sql $shortage_sql $stock_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";

$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

$rows = 16;
$lists = 5;
$page_count = ceil($total/$rows);
if(!$page || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $total-$start;
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>총 상품수 : <b><?=$all_total?></b> , 검색 상품수 : <b><?=$total?></b></td>
		<td align="right">
			<img src="../image/btn_excel_up.gif" style="cursor:hand" onClick="excelUp();" alt="엑셀상품등록">
			<img src="../image/btn_excel.gif" style="cursor:hand" onClick="excelDown();">
			<img src="../image/btn_prdadd.gif" style="cursor:hand" onClick="document.location='prd_input.php?<?=$param?>'">
		</td>
	</tr>
</table> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form>
	<tr><td class="t_rd" colspan="20"></td></tr>
	<tr class="t_th">
		<th width="5%"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
		<th width="10%">상품코드</td>
		<th width="5%"></td>
		<th width="30%">상품명</td>
		<th width="10%">상품가격</td>
		<th width="10%">재고</td>
		<th width="10%">진열순서</td>
		<th width="15%">기능</td>
	</tr>
	<tr><td class="t_rd" colspan="20"></td></tr>
</form>
<?
$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc 
where $catcode_sql $special_sql $display_sql $search_sql $coupon_sql $brand_sql $shortage_sql $stock_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result)) && $rows){

// 상품 이미지
if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$row->prdimg_R)) $row->prdimg_R = "/images/noimage.gif";
else $row->prdimg_R = "/data/prdimg/".$row->prdimg_R;

?>
<form name="<?=$row->prdcode?>" action="product_save.php" onSubmit="return false;">
	<input type="hidden" name="prdcode" value="<?=$row->prdcode?>">
	<tr> 
		<td align="center" height="52"><input type="checkbox" name="select_checkbox"></td>
		<td align="center"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><?=$row->prdcode?></a></td>
		<td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a></td>
		<td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><?=$row->prdname?></a></td>
		<td align="right"><?=number_format($row->sellprice)?>원</td>
		<td align="center"><?=$row->stock?></td>
		<td align="center">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="prd_save.php?mode=prior&posi=upup&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/upup_icon.gif" border="0" alt="10단계 위로"></a></td>
					<td width="4"></td>
					<td></td>
				</tr>
				<tr>
					<td height="4"></td>
				</tr>
				<tr>
					<td><a href="prd_save.php?mode=prior&posi=up&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/up_icon.gif" border="0" alt="1단계 위로"></a></td>
					<td width="4"></td>
					<td><a href="prd_save.php?mode=prior&posi=down&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/down_icon.gif" border="0" alt="1단계 아래로"></a></td>
				</tr>
				<tr>
					<td height="4"></td>
				</tr>
				<tr>
					<td></td>
					<td width="4"></td>
					<td><a href="prd_save.php?mode=prior&posi=downdown&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/downdown_icon.gif" border="0" alt="10단계 아래로"></a> </td>
				</tr>
			</table>
		</td>
		<td align="center"> 
			<img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>'">
			<input type="image" src="../image/btn_delete_s.gif" style="cursor:hand" onclick="selectEmpty();this.form.select_checkbox.checked=true;prdDelete('<?=$row->prdcode?>');">
			<img src="../image/btn_copy.gif" style="cursor:hand" onclick="prdCopy('<?=$row->prdcode?>');">
		</td>
	</tr>
	<tr>
		<td colspan="20" class="t_line"></td>
	</tr>
</form>
<?
$no--;
$rows--;
}    
if($total <= 0){
?>
	<tr>
		<td height='30' colspan=7 align=center>등록된 상품이 없습니다.</td>
	</tr>
	<tr>
		<td colspan="20" class="t_line"></td>
	</tr>
<?
}
*/
?>
</table>
<!--
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="5"></td>
	</tr>
	<tr> 
		<td width="33%">
			<img src="../image/btn_seldel.gif" style="cursor:hand"  onClick="prdDelete();">
			<img src="../image/btn_prdmove.gif" style="cursor:hand" onClick="movePrd();">
			<img src="../image/btn_prdcopy.gif" style="cursor:hand" onClick="copyPrd();">
		</td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
		<td width="33%"></td>
	</tr>
</table>
-->
<? include "../footer.php"; ?>