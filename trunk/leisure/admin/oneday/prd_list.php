<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<? include "../../inc/sch_info_set.inc"; 	 								// ���� ����
// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&display=$display&coupon_use=$coupon_use&searchopt=$searchopt&searchkey=$searchkey";
$param .= "&brand=$brand&shortage=$shortage&stock=$stock";
//--------------------------------------------------------------------------------------------------

?>

<style>
/*�޷� TBL ���̺�*/
.calendarTbl{background:#b8d9e1;}
.calendarTbl tr{background:#fff;}
.calendarTbl thead tr th{background:#e8f3f7; height:30px; font-size:14px; font-family:Comic Sans MS; color:#11809f;}
.calendarTbl tbody tr td{height:80px; vertical-align:top; text-align:right; font-size:13px;}

.calendarTbl tbody tr td span{height:26px; font-size:13px;}
.calendarTbl tbody tr td a{ color:green !important; text-align:left; /*��ǰ ��Ʈ ����*/ padding-bottom:5px; display:block;}
.sundayColor{color:#f00;}/*�Ͽ���*/
.satdayColor{color:#00f;}/*�����*/
</style>
<script language="JavaScript" type="text/javascript">
<!--

//üũ�ڽ����� ����
function onSelect(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectEmpty(); 
	}
}

//üũ�ڽ� ��ü����
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

//üũ�ڽ� ��������
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

//���û�ǰ ����
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
		alert("������ ��ǰ�� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ ��ǰ�� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "prd_save.php?mode=delete&page=<?=$page?>&<?=$param?>&selected=" + selected;
		}else{
			selectEmpty();
			return;
		}
	}
	return;
	
}

// ī�װ� ����
function catChange(form, idx){
   if(idx == "1"){
//      form.dep2_code.options[0].selected = true;
//      form.dep3_code.options[0].selected = true;
   }else if(idx == "2"){
//      form.dep3_code.options[0].selected = true;
   }
   	form.page.value = 1;
   	form.submit();
}

// ��ǰ����
function prdCopy(prdcode){
	if(confirm("������ ��ǰ�� �ϳ��� �ڵ�����մϴ�.")){
		document.location = "prd_save.php?mode=prdcopy&prdcode=" + prdcode;
	}
}

// ��ǰ���� �����ٿ�
function excelDown(){
	var url = "prd_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=240, width=560, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// ��ǰ���� �����Է� 
function excelUp() {
	var url = "prd_excel_up.php";
	window.open(url,"excelUp","height=520, width=560, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// ����� 
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

// üũ�ڽ� ���ø���Ʈ
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

//��ǰ�̵�
function movePrd(){
	selvalue = selectValue();

	if(selvalue == ""){
		alert("�̵��� ��ǰ�� �����ϼ���.");
		return false;
	}else{
		var uri = "prd_move.php?selvalue=" + selvalue;
		window.open(uri,"movePrd","width=350,height=150");
	}
}

// ��ǰ����
function copyPrd(){
	selvalue = selectValue();
	if(selvalue == ""){
		alert("������ ��ǰ�� �����ϼ���.");
		return false;
	}else{
		var uri = "prd_copy.php?selvalue=" + selvalue;
		window.open(uri,"copyPrd","width=350,height=150,resizable=yes");
	}
}
// �޷��̵�
function onmovemonth(fObj){
	var year = fObj.year.value;
	var month = fObj.month.value;

	fObj.submit();
	//window.location.href='<?=$PHP_SELF?>?year='+year+'&month='+month+'&<?=$param?>';
}

function cateSearch(formObj){
	var catcode = formObj.catcode.value;
	
	formObj.submit();
}
//-->
</script>
</head>

<?
/* �˻� ���� ĳġ*/
if(!empty($catcode) || $catcode != "ALL"){
	$catcode_sql = "wc.catcode like '$catcode%' and ";
}
if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
if(!empty($display)) $display_sql = "wp.showset = '$display' and ";
if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
if(!empty($coupon_use)) $coupon_sql = "wp.coupon_use = '$coupon_use' and ";
if(!empty($brand)) $brand_sql = "wp.brand = '$brand' and ";
if(!empty($company)) $company_sql = "wp.company_idx = '$company' and ";
if(!empty($shortage)) {
	if(!strcmp($shortage, "N")) $shortage_sql = " (wp.shortage = '$shortage' or wp.shortage = '') and ";
	else $shortage_sql = " wp.shortage = '$shortage' and ";
}
if(!strcmp($shortage, "S")) $stock_sql = " wp.stock <= '$stock' and ";

/* �޷� ��¥���� ĳġ*/
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

$sql = "select * from wiz_dayproduct wp, wiz_daycprelation wc , wiz_daycategory wy where $catcode_sql $special_sql $display_sql $search_sql $company_sql $coupon_sql $brand_sql $shortage_sql $stock_sql wc.prdcode = wp.prdcode and wy.catcode = wc.catcode and $chk_start <= unix_timestamp(selldate) and unix_timestamp(selldate) <= $chk_end";
$result = mysql_query($sql) or die($sql);


$arrProduct = "";	// �ش糯¥ ��ǰ ����
while($row = mysql_fetch_array($result)){

	$thisday = substr($row[selldate],8,2);


	// ���ȭ ����. �Ϸ翡 �ϳ��� or �Ϸ翡 ������ checkmodule keyword ��������
	if($arrProduct[number_format($thisday)] != ""){
		$arrProduct[number_format($thisday)] .= '|<a href="prd_input.php?mode=update&prdcode='.$row[prdcode].'&page='.$page.'&'.$param.'">['.$row[catname].']'.$row[prdname].'</a>';
	}else{
		$arrProduct[number_format($thisday)] .= '<a href="prd_input.php?mode=update&prdcode='.$row[prdcode].'&page='.$page.'&'.$param.'">['.$row[catname].']'.$row[prdname].'</a>';
	}
}

?>
<body>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">��ǰ���</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">��ü��ǰ ��� �� �˻��մϴ�.</td>
	</tr>
</table>
<br>

<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
	<form name="searchForm" action="<?=$PHP_SELF?>" method="get">
		<input type="hidden" name="page" value="<?=$page?>">
	<tr>
		<td width="15%" class="t_name">�����з�</td>
		<td width="85%" colspan="4" class="t_value">
		<input type='radio' name='catcode' value="ALL" /> ��ü
<?
	$sql = "select catcode, catname from wiz_daycategory where depthno = 1 order by priorno01 asc";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){
		echo "<input type='radio' name='catcode' value='$row->catcode' ".(($catcode==($row->catcode))?"checked='checked'":"")." /> $row->catname";
	}
?>
		</td>
	</tr>
	<tr>
		<td width="15%" class="t_name">���޾�ü</td>
		<td width="30%" class="t_value">


			<select name="company">
				<option value="">:: �����ϼ��� ::</option>
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

		</td>
		<td width="15%" class="t_name">��¥�˻�</td>
		<td width="30%" class="t_value">
			<select name="year" class="select" onchange="onmovemonth(this.form)">
				<option>:: �� ::</option>
<?for($i=date("Y")-1; $i<=date("Y")+1; $i++){?>
				<option value="<?=$i?>" <?if($year==$i){?>selected<?}?>><?=$i?></option>
<?}?>
			</select> ��
			<select name="month" class="select" onchange="onmovemonth(this.form)">
				<option>:: �� ::</option>
<?for($i=1; $i<=12; $i++){?>
				<option value="<?=$i?>" <?if($month==$i){?>selected<?}?>><?=$i?></option>
<?}?>
			</select> ��
			&nbsp; 
			<input type="image" src="../image/btn_search.gif" align="absmiddle">
		</td>
	</tr>
	</form>
</table>

<br>
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
			<th>Fri</th>
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


	// ���ȭ ����. �Ϸ翡 �ϳ��� or �Ϸ翡 ������ checkmodule keyword ��������
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
	// �������
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

<? include "../footer.php"; ?>