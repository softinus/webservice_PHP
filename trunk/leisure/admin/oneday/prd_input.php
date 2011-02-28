<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&display=$display&searchopt=$searchopt&searchkey=$searchkey&page=$page&shortpage=$shortpage";
//--------------------------------------------------------------------------------------------------

if($shortpage == "Y") $listpage_url = "prd_shortage.php";
else $listpage_url = "prd_list.php";

$imgpath = $DOCUMENT_ROOT."/data/prdimg";

if(empty($mode)) $mode = "insert";




if($mode == "insert"){

	$catcode01 = $dep_code;
   $catcode02 = $dep_code.$dep2_code;
   $catcode03 = $dep_code.$dep2_code.$dep3_code;
   $prd_row->stock = "100";


// 상품정보를 가져온다.
}else if($mode == "update"){

   $sql = "select wp.*, wc.idx, wc.catcode from wiz_dayproduct wp, wiz_daycprelation wc where wp.prdcode = '$prdcode' and wp.prdcode = wc.prdcode";
   $result = mysql_query($sql) or error(mysql_error());
   $prd_row = mysql_fetch_object($result);

   $relidx = $prd_row->idx;
   $catcode01 = substr($prd_row->catcode,0,2);
   $catcode02 = substr($prd_row->catcode,0,4);
   $catcode03 = substr($prd_row->catcode,0,6);

}

/*
기본정보 후에 운영정보설정에서 가져올생각.
*/
if($mode=="update"){
	$selldate = substr($prd_row->selldate,0,10);
	$selllastdate = substr($prd_row->selllastdate,0,10);
	$starttime = $prd_row->starttime;
	$endtime = $prd_row->endtime;
}else{
	$selldate = $currentdate;
	$selllastdate = $currentdate;
	$starttime = "09:00:00";
	$endtime = "20:00:00";
}
// 적립금 사용여부와 적용률을 가저온다.
$sql = "select reserve_use, reserve_buy from wiz_operinfo";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$reserve_use = $row->reserve_use;
$reserve_buy = $row->reserve_buy;

?>
<script language="JavaScript" type="text/javascript">
<!--
  var loding = false;
  var prd_class = new Array();
<?
   $no = 0;
   $sql = "select catcode, catname, depthno from wiz_daycategory order by priorno01, priorno02, priorno03 asc";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);
   while($row = mysql_fetch_object($result)){

      $code01 = substr($row->catcode,0,2);
      $code02 = substr($row->catcode,0,4);
      $code03 = substr($row->catcode,0,6);

      if($row->depthno == 1){ $catcode = $code01; $parent = 0; }
      if($row->depthno == 2){ $catcode = $code02; $parent = $code01; }
      if($row->depthno == 3){ $catcode = $code03; $parent = $code02; }
?>

  prd_class[<?=$no?>] = new Array();
  prd_class[<?=$no?>][0] = "<?=$catcode?>";
  prd_class[<?=$no?>][1] = "<?=$row->catname?>";
  prd_class[<?=$no?>][2] = "<?=$parent?>";
  prd_class[<?=$no?>][3] = "<?=$row->depthno?>";

<?
   	$no++;
   }
?>
var tno = <?=$total?>;
/*
function setClass01(){

  var arrayClass = eval("document.frm.class01");
  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");
  arrayClass.options[0] = new Option(":: 지역 ::","");
  arrayClass1.options[0] = new Option(":: 중분류 ::","");
  arrayClass2.options[0] = new Option(":: 소분류 ::","");
  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='1'){
		 arrayClass.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }
}

function changeClass01(){

  var arrayClass = eval("document.frm.class01");
  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");

  var selidx = arrayClass.selectedIndex;
  var selvalue = arrayClass.options[selidx].value;

  arrayClass1.options.length=0;
  arrayClass2.options.length=0;
  arrayClass1.options[0] = new Option(":: 중분류 ::","");
  arrayClass2.options[0] = new Option(":: 소분류 ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='2' && prd_class[no][2]==selvalue){
		 arrayClass1.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }

}

function changeClass02(){

  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");

  var selidx = arrayClass1.selectedIndex;
  var selvalue = arrayClass1.options[selidx].value;

  arrayClass2.options.length=0;
  arrayClass2.options[0] = new Option(":: 소분류 ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='3' && prd_class[no][2]==selvalue){
		 arrayClass2.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }

}
function changeClass03(){
}

// 상품카테고리 설정
function setCategory(){

  var arrayClass01 = eval("document.frm.class01");
  var arrayClass02 = eval("document.frm.class02");
  var arrayClass03 = eval("document.frm.class03");
  for(no=1; no < arrayClass01.length; no++){
    if(arrayClass01.options[no].value == '<?=$catcode01?>'){
      arrayClass01.options[no].selected = true;
      changeClass01();
    }
  }
  for(no=1; no < arrayClass02.length; no++){
    if(arrayClass02.options[no].value == '<?=$catcode02?>'){
      arrayClass02.options[no].selected = true;
      changeClass02();
    }
  }

  for(no=1; no < arrayClass03.length; no++){
    if(arrayClass03.options[no].value == '<?=$catcode03?>')
      arrayClass03.options[no].selected = true;
  }
}

*/
function inputCheck(frm){

   if(loding == false){
   	alert("상품정보를 가져오고 있습니다. 잠시후 재시도 하세요");
   	return false;
   }
	if(frm.prdname.value == ""){
		alert("상품명을 입력하세요");
		frm.prdname.focus();
		return false;
	}
	if(frm.sellprice.value == ""){
		alert("판매가를 입력하세요");
		frm.sellprice.focus();
		return false;
	}
/*
	var optvalue = "";
	var length = frm.optcode_tmp.length;
	for(ii = 0; ii < length; ii++){ optvalue += frm.optcode_tmp.options[ii].value+"^^"; }
	frm.optcode.value = optvalue;
*/
}

//해당 이미지를 삭제한다.
function deleteImage(prdcode, prdimg, imgpath){
	if(imgpath == ""){
		alert("삭제할 이미지가 없습니다.");
		return;
	}else{
	if(confirm("이미지를 삭제하시겠습니까?"))
		document.location = "prd_save.php?mode=delete_image&prdcode="+prdcode+"&prdimg="+prdimg+"&imgpath="+imgpath;
	}
	return;
}

function appendOption(){

	var frm = document.frm;
	var length = frm.optcode_tmp.length;

	var optcode_01 = frm.optcode_01.value;
	var optcode_02 = frm.optcode_02.value;
	var optcode_03 = frm.optcode_03.value;

	if(optcode_01 == ""){
		alert("옵션을 입력하세요.");
		frm.optcode_01.focus();
		return;
	}
	if(optcode_02 == "") optcode_02 = "0";
	if(optcode_03 == "") optcode_03 = "0";

	if(!Check_Num(optcode_02)){
		alert("가격은 숫자만 가능합니다.");
		frm.optcode_02.focus();
		return;
	}
	if(!Check_Num(optcode_03)){
		alert("재고는 숫자만 가능합니다.");
		frm.optcode_03.focus();
		return;
	}

	var opttxt = optcode_01+" - "+optcode_02+"원 : "+optcode_03+"개";
	var optvalue = optcode_01+"^"+optcode_02+"^"+optcode_03;

	var option1 = new Option(opttxt, optvalue, true);
	frm.optcode_tmp.options[length] = option1;

	frm.optcode_01.value = "";
	frm.optcode_02.value = "";
	frm.optcode_03.value = "";

}

function deleteOption(){

	var frm = document.frm;
	var index = frm.optcode_tmp.selectedIndex;

	if(index >= 0){
		frm.optcode_tmp.options[index] = null;
	}
	frm.optcode_01.value = "";
	frm.optcode_02.value = "";
	frm.optcode_03.value = "";
}

function editOption(){


	var frm = document.frm;
	var length = frm.optcode_tmp.length;
	var idx = document.frm.optcode_tmp.selectedIndex;

	if(idx < 0) return;

	var optcode_01 = frm.optcode_01.value;
	var optcode_02 = frm.optcode_02.value;
	var optcode_03 = frm.optcode_03.value;

	if(optcode_01 == ""){
		alert("옵션을 입력하세요.");
		frm.optcode_01.focus();
		return;
	}
	if(optcode_02 == "") optcode_02 = "0";
	if(optcode_03 == "") optcode_03 = "0";

	if(!Check_Num(optcode_02)){
		alert("가격은 숫자만 가능합니다.");
		frm.optcode_02.focus();
		return;
	}
	if(!Check_Num(optcode_03)){
		alert("재고는 숫자만 가능합니다.");
		frm.optcode_03.focus();
		return;
	}

	var opttxt = optcode_01+" - "+optcode_02+"원 : "+optcode_03+"개";
	var optvalue = optcode_01+"^"+optcode_02+"^"+optcode_03;

	document.frm.optcode_tmp.options[idx].text = opttxt;
	document.frm.optcode_tmp.options[idx].value = optvalue;

}

function openOption(optno){
	var url = "option_list.php?optno=" + optno;
	window.open(url,"","height=270, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");
}

function openPreview(prdcode){
	var url = "preview.php?prdidx="+prdcode;
	window.open(url,"","height=768, width=1124, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no");

	/*
	var url = "option_list.php?optno=" + optno;
	*/
}

function chgOption(){

	var tmp_optcode = document.frm.optlist.value.split("^^");
	var tmp_opttext = document.frm.opttext.value.split("^^");
   var length = document.frm.optcode_tmp.length;
	for(ii=0; ii < (tmp_optcode.length-1); ii++){
		var option1 = new Option(tmp_opttext[ii], tmp_optcode[ii], true);
		document.frm.optcode_tmp.options[length] = option1;

		length++;
	}

	return false;
}

function setOption(){
	var idx = document.frm.optcode_tmp.selectedIndex;
	if(idx >= 0){
		var tmp_optcode = document.frm.optcode_tmp.options[idx].value.split("^");
		frm.optcode_01.value = tmp_optcode[0];
		frm.optcode_02.value = tmp_optcode[1];
		frm.optcode_03.value = tmp_optcode[2];
	}

}


function optUp(){

	var frm = document.frm;
	var sel_idx = frm.optcode_tmp.selectedIndex;

	if(sel_idx > 0){

		chg_idx = sel_idx - 1;

		var sel_txt = frm.optcode_tmp.options[sel_idx].text;
		var sel_val = frm.optcode_tmp.options[sel_idx].value;
		var chg_txt = frm.optcode_tmp.options[chg_idx].text;
		var chg_val = frm.optcode_tmp.options[chg_idx].value;


		frm.optcode_tmp.options[chg_idx].text = sel_txt;
		frm.optcode_tmp.options[chg_idx].value = sel_val;
		frm.optcode_tmp.options[sel_idx].text = chg_txt;
		frm.optcode_tmp.options[sel_idx].value = chg_val;

		frm.optcode_tmp.options[chg_idx].selected = true;

	}



}

function optDown(){

	var frm = document.frm;
	var sel_idx = frm.optcode_tmp.selectedIndex;
	var opt_len = document.frm.optcode_tmp.length;

	if(-1 < sel_idx && sel_idx < (opt_len-1)){

		var chg_idx = sel_idx + 1;

		var sel_txt = frm.optcode_tmp.options[sel_idx].text;
		var sel_val = frm.optcode_tmp.options[sel_idx].value;
		var chg_txt = frm.optcode_tmp.options[chg_idx].text;
		var chg_val = frm.optcode_tmp.options[chg_idx].value;


		frm.optcode_tmp.options[chg_idx].text = sel_txt;
		frm.optcode_tmp.options[chg_idx].value = sel_val;
		frm.optcode_tmp.options[sel_idx].text = chg_txt;
		frm.optcode_tmp.options[sel_idx].value = chg_val;

		frm.optcode_tmp.options[chg_idx].selected = true;

	}

}

function prdlayCheck(){
	<?
/*	if(@file($imgpath."/".$prd_row->prdimg_S2)) echo "document.frm.prdlay_check2.checked = true; prdlay2.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S3)) echo "document.frm.prdlay_check3.checked = true; prdlay3.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S4)) echo "document.frm.prdlay_check4.checked = true; prdlay4.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S5)) echo "document.frm.prdlay_check5.checked = true; prdlay5.style.display='';";*/
	if($prd_row->opttitle != "" || $prd_row->optcode != "") echo "document.frm.opt_use.checked = true; prdopt.style.display='';";
	if($prd_row->opt_use == "Y") echo "document.frm.opt_use.checked = true; prdopt.style.display='';";
	?>
}

// 상품가격에 따른 적립금 적용 퍼센트에따라 적립금 적용
function setReserve(frm){

   if(frm.reserve != null){
   	var sellprice = frm.sellprice.value;
   	if(!Check_Num(sellprice)){
			alert("판매가는 숫자이어야 합니다.");
			frm.sellprice.value = "";
			frm.sellprice.focus();
		}else{
	      var reserve = "" + sellprice*(<?=$reserve_buy?>/100)
	      reserve = reserve.split('.');
	      frm.reserve.value = reserve[0];
	   }
   }
}

function lodingComplete(){
	loding = true;
}

function prdCategory(){
  var url = "prd_catlist.php?prdcode=<?=$prdcode?>";
  window.open(url, "prdCategory", "height=330, width=600, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, left=150, top=100");
}

function prdIcon(){
	var url = "prd_icon.php";
	window.open(url, "prdIcon", "height=250, width=450, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=150, top=100");
}

function setImgsize(){
	var url = "prd_imgsize.php";
   window.open(url, "setImgsize", "height=220, width=300, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=150, top=100");
}


function addopt(optid) {

	var frm = document.frm;
	var tbl = document.getElementById('opt');

	if(optid == 'opt1') {

		var row = tbl.insertRow();

		var idx = tbl.rows.length - 2;

		for (i=0;i<tbl.rows[0].cells.length;i++){
			cell = row.insertCell();
			switch (i){
				case 0: cell.innerHTML = "<input type=\"text\" class=\"input\" size=\"10\" name=\"tmp_optcode[]\" required>";break;
				default:
					cell.innerHTML = "<input type=\"text\" name=\"tmp_opt[sellprice][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[reserve][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[stock][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[minno][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[maxno][]\" class=\"input\" size=\"7\">";
					break;
			}
		}

	} else if(optid == 'opt2') {

		for (i=0;i<tbl.rows.length;i++){

			cell = tbl.rows[i].insertCell();
			switch (i){
				case 0: cell.innerHTML = "<input type=\"text\" class=\"input\" style=\"width:100%\" name=\"tmp_optcode2[]\" required>";break;
				default:
					cell.innerHTML = "<input type=\"text\" name=\"tmp_opt[sellprice][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[reserve][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[stock][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[minno][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[maxno][]\" class=\"input\" size=\"7\">";
					break;
			}
		}

	} else if(optid == 'opt3') {

		var tbl = document.getElementById('opt3');
		var row = tbl.insertRow();

		for (i=0;i<tbl.rows[0].cells.length;i++){
			cell = row.insertCell();
			cell.innerHTML = "&nbsp; &nbsp;항목 : <input type=\"text\" class=\"input\" name=\"optcode3_opt[]\">";
			cell.innerHTML += " 추가가격 : <input type=\"text\" size=\"10\" class=\"input\" name=\"optcode3_pri[]\">";
			cell.innerHTML += " 추가적립금 : <input type=\"text\" size=\"10\" class=\"input\" name=\"optcode3_res[]\">";
		}

	} else if(optid == 'opt4') {

		var tbl = document.getElementById('opt4');
		var row = tbl.insertRow();

		for (i=0;i<tbl.rows[0].cells.length;i++){
			cell = row.insertCell();
			cell.innerHTML = "&nbsp; &nbsp;항목 : <input type=\"text\" class=\"input\" name=\"optcode4_opt[]\">";
			cell.innerHTML += " 추가가격 : <input type=\"text\" size=\"10\" class=\"input\" name=\"optcode4_pri[]\">";
			cell.innerHTML += " 추가적립금 : <input type=\"text\" size=\"10\" class=\"input\" name=\"optcode4_res[]\">";
		}

	}
}

function delopt(optid) {
	var tbl = document.getElementById('opt');

	if(optid == 'opt1') {

		if (tbl.rows.length > 2) opt.deleteRow(-1);

	} else if(optid == 'opt2') {

		if (tbl.rows[0].cells.length < 3) return;
		for (i=0;i<tbl.rows.length;i++){
			tbl.rows[i].deleteCell();
		}

	} else if(optid == 'opt3') {
		var tbl = document.getElementById('opt3');
		if (tbl.rows.length > 1) opt3.deleteRow(-1);
	} else if(optid == 'opt4') {
		var tbl = document.getElementById('opt4');
		if (tbl.rows.length > 1) opt4.deleteRow(-1);
	}
}

// 상품별쿠폰 발급회원
function popMycoupon(prdcode){
	var url = "../shop/shop_mycoupon.php?prdcode=" + prdcode;
	window.open(url,"MyCouponList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

function showLimit(idvle){
	if(idvle == "personallimit"){
		document.getElementById("personallimit").style.display = "inline";
		document.getElementById("stocklimit").style.display = "none";
	}else{
		document.getElementById("personallimit").style.display = "none";
		document.getElementById("stocklimit").style.display = "inline";
	}
}

function onSelectComPany(obj){
	var selno = obj.selectedIndex;
	document.frm.company.value = obj.options[selno].text;
}
function onSelectMD(obj){
	var selno = obj.selectedIndex;
	document.frm.md_name.value = obj.options[selno].text;
}
function onAccount(obj){
	var moneyField = document.getElementById("moneyField");
	var commissionField = document.getElementById("commissionField");

	if(obj.value=="money"){
		moneyField.style.display = "inline";
		commissionField.style.display = "none";
	}else{
		moneyField.style.display = "none";
		commissionField.style.display = "inline";
	}

}
//-->
</script>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">상품등록</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">상품 상세정보를 설정합니다.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> 기본정보</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="prd_save.php?<?=$param?>" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
	<input type="hidden" name="tmp">
	<input type="hidden" name="mode" value="<?=$mode?>">
	<input type="hidden" name="optlist" value="">
	<input type="hidden" name="opttext" value="">
	<input type="hidden" name="prdcode" value="<?=$prdcode?>">
	<input type="hidden" name="relidx" value="<?=$relidx?>">
	<input type="hidden" name="optcode" value="<?=$optcode?>">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">지역분류</td>
					<td width="85%" class="t_value" colspan="3">

					<?
					$sql = "select * from wiz_daycategory  where depthno='1' order by priorno01 asc, priorno02 asc, priorno03 asc";
					$result = mysql_query($sql)or die($sql);
					while($row = mysql_fetch_array($result)){
					?>
						<input type="radio" name="catcode" value="<?=$row["catcode"]?>" <?if($prd_row->catcode == $row["catcode"]){?>checked<?}?>/> <?=$row["catname"]?>
					<?
					}
					?>

					</td>
				</tr>

				<tr>
					<td class="t_name">상품명 <font color="red">*</font></td>
					<td class="t_value" colspan="3"><input type="text" name="prdname" value="<?=$prd_row->prdname?>" size="60" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">상품진열</td>
					<td class="t_value" colspan="3"><input type="radio" name="showset" value="Y" <? if($prd_row->showset == "Y" || empty($prd_row->showset)) echo "checked"; ?>>진열함&nbsp;<input type="radio" name="showset" value="N" <? if($prd_row->showset == "N") echo "checked"; ?>>진열안함</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 공급업체 MD정보</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">공급업체 <font color="red">*</font></td>
					<td width="35%" class="t_value">
						<select name="company_idx" onchange="onSelectComPany(this)">
							<option value="">:: 선택하세요 ::</option>
						<?
						$csql = "select * from wiz_company order by wdate desc";
						$cresult = mysql_query($csql)or die($csql);
						while($rs = mysql_fetch_array($cresult)){
						?>
							<option <?if($rs[idx] == $prd_row->company_idx){?>selected<?}?> value="<?=$rs[idx]?>"><?=$rs[company]?></option>
						<?
						}	
						?>
						</select>
						<input type="hidden" name="company" value="<?=$prd_row->company?>" /> <!--위 SELECT는 공급업체 테이블의 고유값을, 하단의 hidden은 업체명을 입력한다. onchange참조-->
					</td>
					<td width="15%" class="t_name">담당MD</td>
					<td width="35%" class="t_value">
						<select name="md_idx" onchange="onSelectMD(this)">
							<option value="">:: 선택하세요 ::</option>
						<?
						$csql = "select * from wiz_md order by wdate desc";
						$cresult = mysql_query($csql)or die($csql);
						while($rs = mysql_fetch_array($cresult)){
						?>
							<option <?if($rs[idx] == $prd_row->md_idx){?>selected<?}?> value="<?=$rs[idx]?>"><?=$rs[md_name]?></option>
						<?
						}	
						?>
						</select>
						<input type="hidden" name="md_name" value="<?=$prd_row->md_name?>" /> <!--위 SELECT는 공급업체 테이블의 고유값을, 하단의 hidden은 업체명을 입력한다. onchange참조--></td>
				</tr>
				<tr>
					<td class="t_name">업체정산형태 <font color="red">*</font></td>
					<td class="t_value" colspan="3">
						<input type="radio" name="accounts" value="money" <?if($prd_row->accounts=="money" || $prd_row->accounts==""){?>checked<?}?> onclick="onAccount(this)" />공급가
						<input type="radio" name="accounts" value="commission" <?if($prd_row->accounts=="commission"){?>checked<?}?> onclick="onAccount(this)" /> 수수료
					</td>
				</tr>
				<tr id="moneyField" style="display:inline;">
					<td class="t_name">공급가격(매입가) <font color="red">*</font></td>
					<td class="t_value" colspan="3">
						<input name="money" type="text" value="<?=$prd_row->money?>" class="input" style="width:80px;">원
					</td>
				</tr>
				<tr id="commissionField" style="display:none">
					<td class="t_name">수수료 <font color="red">*</font></td>
					<td class="t_value" colspan="3">
						<input name="commission" type="text" value="<?=$prd_row->commission?>" class="input" style="width:80px;">%
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 가격및재고</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">판매가 <font color="red">*</font></td>
					<td width="35%" class="t_value"><input name="sellprice" type="text" value="<?=$prd_row->sellprice?>" class="input" onchange="setReserve(this.form);"></td>
					<td width="15%" class="t_name">정가</td>
					<td width="35%" class="t_value"><input name="conprice" type="text" value="<?=$prd_row->conprice?>" class="input"><br>* <s>5,000</s>로 표기됨, 0 입력시 표기안됨 </td>
				</tr>
				<tr>
					<td class="t_name">할인율</td>
					<td class="t_value"><input name="discount_per" type="text" value="<?=$prd_row->discount_per?>" class="input"></td>
					<td class="t_name">적립금<br><a href="../shop/shop_oper.php#res"><? if($reserve_use == "Y") echo "(판매가 ".$reserve_buy." %)"; ?></a></td>
					<td class="t_value"><input name="reserve" type="text" value="<?=$prd_row->reserve?>" class="input"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<br>

<?
if($prd_row->selllimit == "personal"){
	$personal_check = "checked";
	$personal_display = "inline";
	$stock_check = "";
	$stock_display = "none";
}else{
	$personal_check = "";
	$personal_display = "none";
	$stock_check = "checked";
	$stock_display = "inline";
}

?>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 판매정보</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">판매시작일<font color="red">*</font></td>
					<td width="35%" class="t_value"><input name="selldate" type="text" value="<?=$selldate?>" class="input" onchange="setReserve(this.form);" maxlength="10">
                	<img src="../image/ic_cal.gif" style="cursor:hand" align="center" onClick="Calendar1('document.frm','selldate');"></td>
					<td width="15%" class="t_name">판매종료일<font color="red">*</font></td>
					<td width="35%" class="t_value"><input name="selllastdate" type="text" value="<?=$selllastdate?>" class="input" onchange="setReserve(this.form);" maxlength="10">
                	<img src="../image/ic_cal.gif" style="cursor:hand" align="center" onClick="Calendar1('document.frm','selllastdate');"></td>
				</tr>
				<tr>
					<td class="t_name" width="15%">판매시작시간</td>
					<td class="t_value" width="35%"><input name="starttime" type="text" value="<?=$starttime?>" class="input" maxlength="8"></td>
					<td class="t_name" width="15%">판매종료시간</td>
					<td class="t_value" width="35%"><input name="endtime" type="text" value="<?=$endtime?>" class="input" maxlength="8"></td>
				</tr>
				<tr>
					<td class="t_name" width="15%">구매제한</td>
					<td class="t_value" width="35%">
						<input type="radio" name="selllimit" value="personal" <?=$personal_check?> onclick="showLimit('personallimit')" /> 인원제한
						<input type="radio" name="selllimit" value="stock" <?=$stock_check?> onclick="showLimit('stocklimit')" /> 개수제한
					</td>
					<td class="t_name" width="15%">+ 판매량</td>
					<td class="t_value" width="35%"><input name="addstock" type="text" value="<?=$prd_row->addstock?>" class="input" maxlength="8"></td>
				</tr>
				<tr id="personallimit" style="display:<?=$personal_display?>;">
					<td class="t_name">최소구매성사인원</td>
					<td class="t_value"><input name="personal_mininum" type="text" value="<?=$prd_row->personal_mininum?>" class="input"></td>
					<td class="t_name">최대구매인원</td>
					<td class="t_value"><input name="personal_maxnum" type="text" value="<?=$prd_row->personal_maxnum?>" class="input"></td>
				</tr>
				<tr id="stocklimit" style="display:<?=$stock_display?>;">
					<td class="t_name">최소구매성사수량</td>
					<td class="t_value"><input name="stock_mininum" type="text" value="<?=$prd_row->stock_mininum?>" class="input"></td>
					<td class="t_name">최대재고수량</td>
					<td class="t_value"><input name="stock_maxnum" type="text" value="<?=$prd_row->stock_maxnum?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">1인최소구매수량</td>
					<td class="t_value"><input name="buy_mininum" type="text" value="<?=$prd_row->buy_mininum?>" class="input"></td>
					<td class="t_name">1인최대구매수량</td>
					<td class="t_value"><input name="buy_maxnum" type="text" value="<?=$prd_row->buy_maxnum?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">배송여부</td>
					<td class="t_value" colspan="3"><input type="radio" name="isdeliver" value="Y" <?=($prd_row->isdeliver=="Y")?"checked='checked'":""?> /> Y <input type="radio" name="isdeliver"  value="N"<?=($prd_row->isdeliver=="N" || $prd_row->isdeliver=="")?"checked='checked'":""?> /> N 
					( 택배나 우편으로 배송하는 상품일경우 Y , 단순 쿠폰발급만을 목적으로 하는 상품의 경우 N)
					</td>
					<!--
					<td class="t_name">배송금액</td>
					<td class="t_value"><input name="deliver_fee" type="text" class="input" value="<?=$prd_row->deliver_fee?>" /> &nbsp; &nbsp; <input type="text" name="deliver_standard" class="input" value="<?=$prd_row->deliver_standard?>" size="10" /> 원 이상 무료배송</td>
					-->
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
<!--
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 배송비</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">배송비</td>
					<td width="85%" class="t_value">
						<input type="radio" name="del_type" value="DA" <? if(!strcmp($prd_row->del_type, "DA") || empty($prd_row->del_type)) echo "checked" ?>> 기본 배송정책
						<input type="radio" name="del_type" value="DB" <? if(!strcmp($prd_row->del_type, "DB")) echo "checked" ?>> 무료배송
						<input type="radio" name="del_type" value="DC" <? if(!strcmp($prd_row->del_type, "DC")) echo "checked" ?>> 상품별 배송비
						<input name="del_price" type="text" value="<?=$prd_row->del_price?>" class="input" size="10">원
						<input type="radio" name="del_type" value="DD" <? if(!strcmp($prd_row->del_type, "DD")) echo "checked" ?>> 수신자부담(착불)
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
-->
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 상품옵션</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">일반 옵션1</td>
					<td width="85%" class="t_value" colspan="3">
					옵션명 : <input type="text" name="opttitle5" value="<?=$prd_row->opttitle5?>" size="12" class="input">
					&nbsp; 옵션 : <input type="text" name="optcode5" value="<?=$prd_row->optcode5?>" size="40" class="input">
					<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt5');"> 옵션은 컴마(,)로 구분
					</td>
				</tr>
				<tr>
					<td class="t_name">일반 옵션2</td>
					<td class="t_value" colspan="3">
					옵션명 : <input type="text" name="opttitle6" value="<?=$prd_row->opttitle6?>" size="12" class="input">
					&nbsp; 옵션 : <input type="text" name="optcode6" value="<?=$prd_row->optcode6?>" size="40" class="input">
					<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt6');"> ex(95,100,105...)
					</td>
				</tr>
				<tr>
					<td class="t_name">일반 옵션3</td>
					<td class="t_value" colspan="3">
					옵션명 : <input type="text" name="opttitle7" value="<?=$prd_row->opttitle7?>" size="12" class="input">
					&nbsp; 옵션 : <input type="text" name="optcode7" value="<?=$prd_row->optcode7?>" size="40" class="input">
					<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt7');">
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">가격추가 옵션1</td>
					<td width="85%" class="t_value" colspan="3">옵션명 : 
						<input type="text" name="opttitle3" value="<?=$prd_row->opttitle3?>" size="12" class="input">
						<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt3');">
						<a href="javascript:addopt('opt3')">[항목추가]</a>
						<a href="javascript:delopt('opt3')">[항목삭제]</a>
						<br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" id="opt3">
							<tr>
								<td></td>
							</tr>
<?
$optcode3_arr = explode("^^", $prd_row->optcode3);
for($ii = 0; $ii < count($optcode3_arr) - 1; $ii++) {
	list($opt, $price, $reserve) = explode("^", $optcode3_arr[$ii]);
?>
							<tr>
								<td>
									&nbsp; &nbsp;항목 : <input type="text" class="input" name="optcode3_opt[]" value="<?=$opt?>">
									추가가격 : <input type="text" class="input" name="optcode3_pri[]" value="<?=$price?>">
									추가적립금 : <input type="text" class="input" name="optcode3_res[]" value="<?=$reserve?>">
								</td>
							</tr>
<?
}
?>
						</table>
					</td>
				</tr>
				<tr>
					<td class="t_name">가격추가 옵션2</td>
					<td class="t_value" colspan="3">옵션명 : 
						<input type="text" name="opttitle4" value="<?=$prd_row->opttitle4?>" size="12" class="input">
						<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt4');">
						<a href="javascript:addopt('opt4')">[항목추가]</a>
						<a href="javascript:delopt('opt4')">[항목삭제]</a>
						<br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" id="opt4">
							<tr>
								<td></td>
							</tr>
<?
$optcode4_arr = explode("^^", $prd_row->optcode4);
for($ii = 0; $ii < count($optcode4_arr) - 1; $ii++) {
	list($opt, $price, $reserve) = explode("^", $optcode4_arr[$ii]);
?>
							<tr>
								<td>&nbsp; &nbsp;항목 : <input type="text" class="input" name="optcode4_opt[]" value="<?=$opt?>">
								추가가격 : <input type="text" class="input" name="optcode4_pri[]" value="<?=$price?>">
								추가적립금 : <input type="text" class="input" name="optcode4_res[]" value="<?=$reserve?>">
								</td>
							</tr>
<?
}
?>
						</table>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">가격/재고 옵션</td>
					<td width="85%" class="t_value" colspan="3">하나 또는 두개의 옵션을 조합하여 가격/적립금추가,재고관리가 가능합니다.
						<input type="checkbox" name="opt_use" value="Y" onClick="if(this.checked==true) prdopt.style.display=''; else prdopt.style.display='none';"><font color="red">설정하기</font><br>
						<div id="prdopt" style="display:none">
							<table border="0" cellpadding="0" cellspacing="0">
								<tr height="30">
									<td>
										옵션 1 : <input type="text" name="opttitle" value="<?=$prd_row->opttitle?>" size="12" class="input">
										<a href="javascript:addopt('opt1')">[항목추가]</a>
										<a href="javascript:delopt('opt1')">[항목삭제]</a>
									</td>
									<td width="5"></td>
									<td>
										옵션 2 : <input type="text" name="opttitle2" value="<?=$prd_row->opttitle2?>" size="12" class="input">
										<a href="javascript:addopt('opt2')">[항목추가]</a>
										<a href="javascript:delopt('opt2')">[항목삭제]</a>
									</td>
								</tr>
							</table>
							<table border="0" cellpadding="0" cellspacing="0">
								<tr height="30">
									<td>입력형식 : 
										<input type="text" size="9" class="input" value="추가금액" readonly>:
										<input type="text" size="10" class="input" value="추가적립금" readonly>:
										<input type="text" size="8" class="input" value="재고" readonly>:
										<input type="text" size="11" class="input" value="최소구매수량" readonly>:
										<input type="text" size="11" class="input" value="최대구매수량" readonly>
									</td>
								</tr>
							</table>
<?
$optcode_list = explode("^",$prd_row->optcode);
$optcode2_list = explode("^",$prd_row->optcode2);

$opt_list = explode("^^",$prd_row->optvalue);
for($ii=0; $ii < count($opt_list)-1; $ii++){
	$optvalue[$ii] = explode("^",$opt_list[$ii]);
}

$no = 0;
?>
							<table id="opt" border="1" bordercolor="#cccccc" style="border-collapse:.">
								<tr align="center">
									<td></td>
									<td id="opt2_1"><input type="text" name="tmp_optcode2[]" class="input" value="<?=$optcode2_list[0]?>" style="width:100%"></td>
<?
for($ii = 1; $ii < count($optcode2_list) - 1; $ii++) {
?>
									<td id="opt2_<? echo $ii + 1 ?>"><input type="text" name="tmp_optcode2[]" class="input" value="<?=$optcode2_list[$ii]?>" style="width:100%"></td>
<?
}
?>
								</tr>
								<tr id="opt1">
									<td nowrap><input type="text" name="tmp_optcode[]" value="<?=$optcode_list[0]?>" size="10" class="input" ></td>
									<td>
										<input type="text" name="tmp_opt[sellprice][0]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[reserve][0]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[stock][0]" value="<?=$optvalue[$no][2]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[minno][0]" value="<?=$optvalue[$no][3]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[maxno][0]" value="<?=$optvalue[$no][4]?>" size="7" class="input">
									</td>
<?
for($ii = 1; $ii < count($optcode2_list) - 1; $ii++) {
	$no++;
?>
									<td id="opt2_<? echo $ii + 1 ?>"><input type="text" name="tmp_opt[sellprice][]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:<input type="text" name="tmp_opt[reserve][]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:<input type="text" name="tmp_opt[stock][]" value="<?=$optvalue[$no][2]?>" size="7" class="input"></td>
<?
}
?>
								</tr>
<?
for($ii = 1; $ii < count($optcode_list) - 1; $ii++) {
	$no++;
?>
								<tr id="opt1_<? echo $ii+1 ?>">
									<td nowrap><input type="text" name="tmp_optcode[]" value="<?=$optcode_list[$ii]?>" size="10" class="input" ></td>
									<td>
										<input type="text" name="tmp_opt[sellprice][]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[reserve][]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[stock][]" value="<?=$optvalue[$no][2]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[minno][]" value="<?=$optvalue[$no][3]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[maxno][]" value="<?=$optvalue[$no][4]?>" size="7" class="input">
									</td>
<?
	for($jj = 1; $jj < count($optcode2_list) - 1; $jj++) {
		$no++;
?>
									<td id="opt2_<? echo $jj + 1 ?>"><input type="text" name="tmp_opt[sellprice][]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:<input type="text" name="tmp_opt[reserve][]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:<input type="text" name="tmp_opt[stock][]" value="<?=$optvalue[$no][2]?>" size="7" class="input"></td>
<?
	}
?>
								</tr>
<?
}
?>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 상품사진</td>
		<!--
		<td>
			<input type="checkbox" name="prdlay_check2" onClick="if(this.checked==true) prdlay2.style.display=''; else prdlay2.style.display='none';"><font color="red">이미지추가2</font>
			<input type="checkbox" name="prdlay_check3" onClick="if(this.checked==true) prdlay3.style.display=''; else prdlay3.style.display='none';"><font color="red">이미지추가3</font>
			<input type="checkbox" name="prdlay_check4" onClick="if(this.checked==true) prdlay4.style.display=''; else prdlay4.style.display='none';"><font color="red">이미지추가4</font>
			<input type="checkbox" name="prdlay_check5" onClick="if(this.checked==true) prdlay5.style.display=''; else prdlay5.style.display='none';"><font color="red">이미지추가5</font> &nbsp; &nbsp;
			<a href="javascript:setImgsize();"><img src="../image/btn_imgsize.gif" align="absmiddle" border="0"></a>
		</td>
		-->
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="75%">
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="20%" class="t_name">상품 이미지 1 </td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L1) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L1?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L1?>';"><?=$prd_row->prdimg_L1?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">상품 이미지 2</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg2" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L2) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L2?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L2?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L2?>';"><?=$prd_row->prdimg_L2?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">상품 이미지 3</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg3" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L3) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L3?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L3?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L3?>';"><?=$prd_row->prdimg_L3?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">상품 이미지 4</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg4" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L4) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L4?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L4?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L4?>';"><?=$prd_row->prdimg_L4?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">상품 이미지 5</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg5" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L5) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L5?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L5?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L5?>';"><?=$prd_row->prdimg_L5?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">쿠폰 이미지</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="img_coupon" class="input"> [GIF, JPG, PNG]  ( 222px x 134px )
						<? if( @file($imgpath."/".$prd_row->img_coupon) ){ ?>
						(<a href="/data/prdimg/<?=$prd_row->img_coupon?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->img_coupon?>';"><?=$prd_row->img_coupon?></a>)
						<!--input type="checkbox" name="delimg[]" value="<?=$prd_row->img_coupon?>">삭제 (<a href="/data/prdimg/<?=$prd_row->img_coupon?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->img_coupon?>';"><?=$prd_row->img_coupon?></a>)-->
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">메일링 이미지</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="img_mail" class="input"> [GIF, JPG, PNG] ( 298px x 155px )
						<? if( @file($imgpath."/".$prd_row->img_mail) ){ ?>
						(<a href="/data/prdimg/<?=$prd_row->img_mail?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->img_mail?>';"><?=$prd_row->img_mail?></a>)
						<!--input type="checkbox" name="delimg[]" value="<?=$prd_row->img_mail?>">삭제 (<a href="/data/prdimg/<?=$prd_row->img_mail?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->img_mail?>';"><?=$prd_row->img_mail?></a>)-->
						<? } ?>
					</td>
				</tr>
			</table>
		</td>
		<td width="25%" height="100%">
			<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td align="center" bgcolor="#ffffff">
					<?
					if(@file($imgpath."/".$prd_row->prdimg_R))
					echo "<img src='../../data/prdimg/$prd_row->prdimg_R' name='prdimg1' width='100'>";
					else
					echo "No<br>Image";
					?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!--
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="75%">
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="20%" class="t_name">원본 이미지</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg" class="input"> [GIF, JPG, PNG]<br>원본이미지를 등록하면 나머지 이미지가 자동생성 됩니다.</td>
				</tr>
				<tr>
					<td height="40" class="t_name">상품목록 이미지 <font color="red">*</font><br>
					&nbsp;&nbsp;⇒ 크기 : <?=$oper_info->prdimg_R?> x <?=$oper_info->prdimg_R?></td>
					<td class="t_value" colspan="3">
						<input type="file" name="prdimg_R" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_R) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_R?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_R?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_R?>';"><?=$prd_row->prdimg_R?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td height="40" class="t_name">축소이미지 이미지1<br>
					&nbsp;&nbsp;⇒ 크기 : <?=$oper_info->prdimg_S?> x <?=$oper_info->prdimg_S?></td>
					<td class="t_value" colspan="3">
						<input type="file" name="prdimg_S1" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S1) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S1?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_S1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_S1?>';"><?=$prd_row->prdimg_S1?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td height="40" class="t_name">제품상세 이미지1 <font color="red">*</font><br>
					&nbsp;&nbsp;⇒ 크기 : <?=$oper_info->prdimg_M?> x <?=$oper_info->prdimg_M?></td>
					<td class="t_value" colspan="3">
						<input type="file" name="prdimg_M1" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M1) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M1?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_M1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_M1?>';"><?=$prd_row->prdimg_M1?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td height="40" class="t_name">확대 이미지1 <font color="red">*</font><br>
					&nbsp;&nbsp;⇒ 크기 : <?=$oper_info->prdimg_L?> x <?=$oper_info->prdimg_L?></td>
					<td class="t_value" colspan="3">
						<input type="file" name="prdimg_L1" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L1) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L1?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L1?>';"><?=$prd_row->prdimg_L1?></a>)
						<? } ?>
					</td>
				</tr>
			</table>
		</td>
		<td width="25%" height="100%">
			<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td align="center" bgcolor="#ffffff">
					<?
					if(@file($imgpath."/".$prd_row->prdimg_R))
					echo "<img src='../../data/prdimg/$prd_row->prdimg_R' name='prdimg1' width='100'>";
					else
					echo "No<br>Image";
					?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<div id="prdlay2" style="display:none">
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="75%">
				<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td width="20%" class="t_name">원본 이미지</td>
						<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg2" class="input"></td>
					</tr>
					<tr>
						<td class="t_name">축소 이미지2</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_S2" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S2) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S2?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_S2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_S2?>';"><?=$prd_row->prdimg_S2?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">상세 이미지2</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_M2" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M2) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M2?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_M2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_M2?>';"><?=$prd_row->prdimg_M2?></a>)
						<? } ?>
						</td>
					</tr>
					<tr>
						<td class="t_name">확대 이미지2</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_L2" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L2) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L2?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_L2?>';"><?=$prd_row->prdimg_L2?></a>)
						<? } ?></td>
					</tr>
				</table>
			</td>
			<td width="25%" height="100%">
				<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td align="center" bgcolor="#ffffff">
						<?
						if(@file($imgpath."/".$prd_row->prdimg_M2))
						echo "<img src='../../data/prdimg/$prd_row->prdimg_M2' name='prdimg2' width='100'>";
						else
						echo "No<br>Image";
						?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>

<div id="prdlay3" style=display:none>
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="75%">
				<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td width="20%" class="t_name">원본 이미지</td>
						<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg3" class="input"></td>
					</tr>
					<tr>
						<td class="t_name">축소 이미지3</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_S3" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S3) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S3?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_S3?>" target="_blank" onMouseOver="document.prdimg3.src='../../data/prdimg/<?=$prd_row->prdimg_S3?>';"><?=$prd_row->prdimg_S3?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">상세 이미지3</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_M3" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M3) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M3?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_M3?>" target="_blank" onMouseOver="document.prdimg3.src='../../data/prdimg/<?=$prd_row->prdimg_M3?>';"><?=$prd_row->prdimg_M3?></a>)
						<? } ?>
						</td>
					</tr>
					<tr>
						<td class="t_name">확대 이미지3</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_L3" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L3) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L3?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L3?>" target="_blank" onMouseOver="document.prdimg3.src='../../data/prdimg/<?=$prd_row->prdimg_L3?>';"><?=$prd_row->prdimg_L3?></a>)
						<? } ?>
						</td>
					</tr>
				</table>
			</td>
			<td width="25%" height="100%">
				<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td align="center" bgcolor="#ffffff">
							<?
							if(@file($imgpath."/".$prd_row->prdimg_M3))
							echo "<img src='../../data/prdimg/$prd_row->prdimg_M3' name='prdimg3' width='100'>";
							else
							echo "No<br>Image";
							?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>

<div id="prdlay4" style=display:none>
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="75%">
				<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td width="20%" class="t_name">원본 이미지</td>
						<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg4" class="input"></td>
					</tr>
					<tr>
						<td class="t_name">축소 이미지4</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_S4" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S4) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S4?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_S4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_S4?>';"><?=$prd_row->prdimg_S4?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">상세 이미지4</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_M4" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M4) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M4?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_M4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_M4?>';"><?=$prd_row->prdimg_M4?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">확대 이미지4</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_L4" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L4) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L4?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_L4?>';"><?=$prd_row->prdimg_L4?></a>)
						<? } ?></td>
					</tr>
				</table>
			</td>
			<td width="25%" height="100%">
				<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td align="center" bgcolor="#ffffff">
						<?
						if(@file($imgpath."/".$prd_row->prdimg_M4))
						echo "<img src='../../data/prdimg/$prd_row->prdimg_M4' name='prdimg4' width='100'>";
						else
						echo "No<br>Image";
						?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>

<div id="prdlay5" style=display:none>
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="75%">
				<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td width="20%" class="t_name">원본 이미지</td>
						<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg5" class="input"></td>
					</tr>
					<tr>
						<td class="t_name">축소 이미지5</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_S5" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S5) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S5?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_S5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_S5?>';"><?=$prd_row->prdimg_S5?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">상세 이미지5</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_M5" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M5) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M5?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_M5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_M5?>';"><?=$prd_row->prdimg_M5?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">확대 이미지5</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_L5" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L5) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L5?>">삭제 (<a href="/data/prdimg/<?=$prd_row->prdimg_L5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_L5?>';"><?=$prd_row->prdimg_L5?></a>)
						<? } ?></td>
					</tr>
				</table>
			</td>
			<td width="25%" height="100%">
				<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td align="center" bgcolor="#ffffff">
							<?
							if(@file($imgpath."/".$prd_row->prdimg_M5))
							echo "<img src='../../data/prdimg/$prd_row->prdimg_M5' name='prdimg5' width='100'>";
							else
							echo "No<br>Image";
							?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
-->
<? if(!strcmp($oper_info->prdrel_use, "Y")) { ?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 관련상품</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="100%" class="t_value"><iframe width="100%" height="95" frameborder="0" src="prd_relation.php?mode=<?=$mode?>&prdcode=<?=$prdcode?>"></iframe></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<? } ?>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 상품설명</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">간단설명</td>
					<td width="85%" class="t_value"><textarea name="stortexp" rows="3" cols="90" class="textarea"><?=$prd_row->stortexp?></textarea></td>
				</tr>
				<tr>
					<td width="15%" class="t_name">SMS 문구</td>
					<td width="85%" class="t_value"><textarea name="sms" rows="3" cols="90" class="textarea"><?=$prd_row->sms?></textarea></td>
				</tr>
				<tr>
					<td width="15%" class="t_name">쿠폰 내 매장안내</td>
					<td width="85%" class="t_value"><textarea name="shopinfo" rows="3" cols="90" class="textarea"><?=$prd_row->shopinfo?></textarea></td>
				</tr>
				<tr>
					<td width="15%" class="t_name">쿠폰 내 주의사항</td>
					<td width="85%" class="t_value"><textarea name="attention" rows="3" cols="90" class="textarea"><?=$prd_row->attention?></textarea></td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="t_name">상세설명</td>
				</tr>
				<tr>
					<td colspan="3" class="t_value">
<?
$edit_content = $prd_row->content;
include "../webedit/WIZEditor.html";
?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 쿠폰사용안내</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td colspan="3" class="t_value">
<?
$edit_content = $prd_row->coupon_con;
include "../webedit2/WIZEditor.html";
?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> 매장안내</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td colspan="3" class="t_value">
<?
$edit_content = $prd_row->shopguide;
include "../webedit3/WIZEditor.html";
?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>


<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td></td>
	</tr>
</table>


<div id='floater' style='Z-INDEX:1;POSITION:absolute;LEFT:expression(document.body.clientWidth-80);TOP:200'>
	<table>
		<tr>
			<td><input type="image" src="../image/btn_prdsave.gif"></td>
		</tr>
		<tr>
			<td><a href='<?=$listpage_url?>?<?=$param?>''><img src="../image/btn_prdlist.gif" border="0"></a></td>
		</tr>
	</table>
</div>
<script language="JavaScript" type="text/javascript">
<!--
self.onError=null;
currentX = currentY = 0;
whichIt = null;
lastScrollX = 0; lastScrollY = 0;
NS = (document.layers) ? 1 : 0;
IE = (document.all) ? 1: 0;

function heartBeat() {
	if(IE) {
		diffY = document.body.scrollTop;
		diffX = 0;
	}

	if(NS) {
		diffY = self.pageYOffset; diffX = self.pageXOffset;
	}

	if(diffY != lastScrollY) {
		percent = .05 * (diffY - lastScrollY);
		if(percent > 0) percent = Math.ceil(percent);
		else percent = Math.floor(percent);
		if(IE) document.all.floater.style.pixelTop += percent;
		if(NS) document.floater.top += percent;
		lastScrollY = lastScrollY + percent;
	}

	if(diffX != lastScrollX) {
		percent = .05 * (diffX - lastScrollX);
		if(percent > 0) percent = Math.ceil(percent);
		else percent = Math.floor(percent);
		if(IE) document.all.floater.style.pixelLeft += percent;
		if(NS) document.floater.top += percent;
		lastScrollY = lastScrollY + percent;
	}
}
if(NS || IE) action = window.setInterval("heartBeat()",1);
//-->
</script>

<br>
<table align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<input type="image" src="../image/btn_confirm_l.gif"> &nbsp;
			<img src="../image/btn_list_l.gif" style="cursor:hand" onclick="document.location='<?=$listpage_url?>?<?=$param?>';"> &nbsp;
			<? if($mode == "update"){ ?>
			<img src="../image/btn_delete_l.gif" style="cursor:hand" onclick="document.location='prd_save.php?mode=delete&prdcode=<?=$prdcode?>&<?=$param?>';"> &nbsp;
			<? } ?>
			<img src="../image/btn_overview_l.gif" style="cursor:hand" onclick="openPreview('<?=$prdcode?>')" />
		</td>
	</tr>
</form>
</table>
<script>prdlayCheck();lodingComplete();</script>

<? include "../footer.php"; ?>