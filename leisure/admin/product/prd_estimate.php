<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&keyword=$keyword";
//--------------------------------------------------------------------------------------------------

$code = "review";
include "../../inc/bbs_info.inc";

?>

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
function delSelEstimate(){

	var i;
	var selected = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selected = selected + document.forms[i].estiidx.value + "|";
				}
			}
	}

	if(selected == ""){
		alert("������ ��ǰ���� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ ��ǰ�� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "prd_save.php?mode=delesti&page=<?=$page?>&selected=" + selected;
			return;
		}else{
			return;
		}
	}
	return;

}

function delEstimate(idx){
   if(confirm('��ǰ���� �����Ͻðڽ��ϱ�?')){
      document.location = "prd_save.php?mode=delesti&page=<?=$page?>&estiidx=" + idx;
   }
}

function searchEstimate(searchopt,keyword){
	document.searchForm.searchopt.value = searchopt;
	document.searchForm.keyword.value = keyword;
	document.searchForm.page.value = "1";
	document.searchForm.submit();
}

var clickvalue='';
var clickvalue_cut='';
function reviewShow(idnum) {

	review=eval("review"+idnum+".style");
	review_cut=eval("review"+idnum+"_cut.style");

	if(clickvalue != review) {
		if(clickvalue!='') {
			clickvalue.display='none';
			clickvalue_cut.display='block';
		}

		review.display='block';
		review_cut.display='none';
		clickvalue=review;
		clickvalue_cut=review_cut;
	} else {
		review.display='none';
		review_cut.display='block';
		clickvalue='';
		clickvalue_cut='';
	}

}

function openImg(img){
   var url = "../bbs/bbs_openimg.php?code=<?=$code?>&img=" + img;
   window.open(url,"openImg","width=300,height=300,scrollbars=yes");
}
//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">��ǰ�����</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">��ǰ���� �����մϴ�.</td>
			  </tr>
			</table>
			

     	<?
    	$sql = "select wb.idx from wiz_bbs as wb left join wiz_product as wp on wb.prdcode = wp.prdcode
    					where wb.code='$code' and wb.prdcode != ''";
    	$result = mysql_query($sql) or error(mysql_error());
      $all_total = mysql_num_rows($result);

			if(empty($searchopt)){
				$search_sql = "";
			}else{

				if($searchopt == "prdcode" || $searchopt == "prdname") $search_sql = " and wp.$searchopt like '%$keyword%' ";
				else $search_sql = " and wb.$searchopt like '%$keyword%' ";

			}

			$sql = "select wb.idx from wiz_bbs as wb, wiz_product as wp where wb.code='$code' and wb.prdcode = wp.prdcode $search_sql order by wb.wdate desc";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);

			$rows = 20;
			$lists = 5;

     	$page_count = ceil($total/$rows);
     	if(!$page || $page > $page_count) $page = 1;
     	$start = ($page-1)*$rows;
     	$no = $total-$start;
      ?>
      <br>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>�� ��ǰ��� : <b><?=$all_total?></b> , �˻� ��ǰ��� : <b><?=$total?></b></td>
          <td align="right">
          <table cellspacing="2" cellpadding="0" border="0">
          <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
          <input type="hidden" name="page" value="<?=$page?>">
          <tr>
          <td>
          <select name="searchopt" onChange="this.form.page.value=1;">
          <option value="">:: ���� ::
          <option value="content" <? if($searchopt == "content") echo "selected"; ?>>����
          <option value="subject" <? if($searchopt == "subject") echo "selected"; ?>>����
          <option value="name" <? if($searchopt == "name") echo "selected"; ?>>�۾���
          <option value="memid" <? if($searchopt == "memid") echo "selected"; ?>>���̵�
          <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>��ǰ�ڵ�
          <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>��ǰ��
          </select>
          </td>
          <td><input type="text" name="keyword" value="<?=$keyword?>" size="13" class="input"></td>
          <td><input type="image" src="../image/btn_search.gif" align="absmiddle"></td>
          </tr>
          </table>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form>
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
        	<th width="5%"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
          <th width="5%">��ȣ</th>
          <th width="10%">��ǰ</th>
          <th>��ǰ��</th>
          <th width="10%">��ȣ��</th>
          <th width="10%">�۾���</th>
          <th width="10%">�ۼ���</th>
          <th width="10%">���</th>
        </tr>
				<tr><td class="t_rd" colspan="20"></td></tr>
      </form>
      <?
			$sql = "select wb.*, from_unixtime(wb.wdate) as wdate, wp.prdimg_R, wp.prdname from wiz_bbs as wb, wiz_product as wp where wb.code='$code' and wb.prdcode = wp.prdcode $search_sql order by wb.wdate desc limit $start, $rows";
			$result = mysql_query($sql) or error(mysql_error());

      while(($row = mysql_fetch_object($result)) && $rows){

	 			$review_display = "none";

      	if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
      	else $row->prdimg_R = "/data/prdimg/$row->prdimg_R";

      	$subject = "<a href=\"javascript:reviewShow('$no');\">$row->subject</a>";

      	if($row->ctype != "H")  $row->content = str_replace("\n", "<br>", $row->content);

      	$cut_content = cut_str(strip_tags($row->content), 100);

				for($ii = 1; $ii <= $upfile_max; $ii++) {
					if(img_type($DOCUMENT_ROOT."/data/bbs/$code/M".$row->{upfile.$ii})) ${upimg.$ii} = "<div align='".$bbs_info[img_align]."'><a href=javascript:openImg('".$row->{upfile.$ii}."');><img src='/data/bbs/$code/M".$row->{upfile.$ii}."' border='0'></a></div>";
					else ${upimg.$ii} = "";
				}

      ?>
        <form name="<?=$row->prdcode?>" action="product_save.php">
        <input type="hidden" name="estiidx" value="<?=$row->idx?>">
        <tr>
          <td align="center"><input type="checkbox" name="select_checkbox"></td>
          <td height="30" align="center"><?=$no?></td>
          <td align="center">
            <a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="_blank"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a><br>
            <a href="javascript:searchEstimate('prdcode','<?=$row->prdcode?>');" class="3">�˻�</a>
          </td>
          <td valign="top" style="padding:3 0 3 0">
          	<table width="100%" border="0" cellpadding="1" cellspacing="1" style="layout:fixed;">
          		<tr><td class="t_value" style="padding:3px"><b><?=$subject?></b></td></tr>
          		<tr id="review<?=$no?>_cut" style="word-break:break-all;"><td class="t_value" style="padding:3px"><?=$cut_content?></td></tr>
          		<tr id="review<?=$no?>" style="display:<?=$review_display?>;word-break:break-all;"><td class="t_value" style="padding:3px"><? for($ii = 1; $ii <= $upfile_max; $ii++) echo ${upimg.$ii} ?><?=$row->content?></td></tr>
          	</table>
          </td>
          <td><img src="/images/icon_star_<?=$row->star?>.gif"></td>
          <td align="center"><a href="javascript:searchEstimate('name','<?=$row->name?>');" class="3"><?=$row->name?></a><br>(<? if($row->memid=="") echo "��ȸ��"; else echo "<a href=javascript:searchEstimate('memid','$row->memid');>$row->memid</a>"; ?>)</td>
          <td align="center"><?=$row->wdate?></td>
          <td align="center"><img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="delEstimate('<?=$row->idx?>');"></td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
        </form>
      <?
      	$no--;
        $rows--;
      }

      if($total <= 0){
      ?>
      	<tr><td height='30' colspan=7 align=center>��ϵ� ��ǰ�� �����ϴ�.</td></tr>
      	<tr><td colspan="20" class="t_line"></td></tr>
      <?
      }
      ?>
      </table>

      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
      	<tr><td height="5"></td></tr>
        <tr>
          <td width="33%"><img src="../image/btn_seldel.gif" style="cursor:hand" onClick="delSelEstimate();"></td>
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
          <td><table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td><img src="../image/check_tit.gif" width="75" height="19" /></td>
            </tr>
            <tr>
              <td class="chk_alt">
            	- ��ǰ�� ������ Ŭ���ϸ� ��ü ������ �� �� �ֽ��ϴ�.<br>
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