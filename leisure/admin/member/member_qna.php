<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

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
		if(document.forms[i].idx != null){
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
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//���û�� ����
function qnaDelete(){

	var i;
	var selconsult = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selconsult = selconsult + document.forms[i].idx.value + "|";
				}
			}
	}

	if(selconsult == ""){
		alert("������ ����� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ ����� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "member_save.php?mode=condelete&selconsult=" + selconsult;
		}else{
			return;
		}
	}
	return;
	
}

function searchEstimate(searchopt,keyword){
	document.searchForm.searchopt.value = searchopt;
	document.searchForm.keyword.value = keyword;
	document.searchForm.page.value = "1";
	document.searchForm.submit();
}
//-->
</script>

	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">1:1 ������</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">���� �ۼ��� 1:1 ����� �����մϴ�.</td>
	    </tr>
	  </table>
	  
	  <br>	
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="tit_sub"><img src="../image/ics_tit.gif"> 1:1�����</td>
        <td align="right">
        <table cellspacing="2" cellpadding="0" border="0">
        <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
        <input type="hidden" name="page" value="<?=$page?>">
        <tr>
        <td>
        <select name="searchopt" onChange="this.form.page.value=1;">
        <option value="">:: ���� ::
        <option value="name" <? if($searchopt == "name") echo "selected"; ?>>�ۼ���
        <option value="memid" <? if($searchopt == "memid") echo "selected"; ?>>���̵�
        </select>
        </td>
        <td><input type="text" name="keyword" value="<?=$keyword?>" size="13" class="input"></td>
        <td><input type="image" src="../image/btn_search.gif" align="absmiddle"></td>
        </tr>
        </table>
        </td>
      </tr>
      <tr><td height="3"></td></tr>
    </table> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form>
      <tr><td class="t_rd" colspan="20"></td></tr>
      <tr class="t_th">
        <th width="30" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
        <th width="60">��ȣ</th>
        <th width="80">ó����Ȳ</th>
        <th>����</th>
        <th width="80">�ۼ���</th>
        <th width="80">�ۼ���</th>
      </tr>
      <tr><td class="t_rd" colspan="20"></td></tr>       
      </form>
	    <?
	    if(!empty($searchopt)) $search_sql = " where $searchopt like '%$keyword%' ";
	    
	    $sql = "select idx from wiz_consult $search_sql order by idx desc";
	    $result = mysql_query($sql) or error(mysql_error());
	    $total = mysql_num_rows($result);
	    
	    $rows = 12;
	    $lists = 5;
	    $page_count = ceil($total/$rows);
	    if(!$page || $page > $page_count) $page = 1;
	    $start = ($page-1)*$rows;
	    $no = $total-$start;
	  	
	    $sql = "select * from wiz_consult $search_sql order by idx desc limit $start, $rows";
	    $result = mysql_query($sql) or error(mysql_error());
	    
	    while(($row = mysql_fetch_object($result)) && $rows){
	    ?>
	    <form>
	    <input type="hidden" name="idx" value="<?=$row->idx?>">
	      <tr> 
	        <td align="center" height="30"><input type="checkbox" name="select_checkbox"></td>
	        <td align="center" align="center"><?=$no?></td>
	        <td align="center"><? if($row->status == "Y") echo "<font color=red>[�亯�Ϸ�]</font>"; else echo "[�����Ϸ�]"; ?></td>
	        <td><a href="member_qna_input.php?idx=<?=$row->idx?>"><?=$row->subject?></a></td>
	        <td align="center"><a href="javascript:searchEstimate('name','<?=$row->name?>');" class="3"><?=$row->name?></a>(<a href="javascript:searchEstimate('memid','<?=$row->memid?>');" class="3"><?=$row->memid?></a>)</td>
	        <td align="center"><?=$row->wdate?></td>
	      </tr>
	    </form>
	    <tr><td colspan="20" class="t_line"></td></tr>
	    <?
				$no--;
				$rows--;
			}
			if($total <= 0){
			?>
				<tr><td height=30 colspan=10 align=center>��ϵ� ����� �����ϴ�.</td></tr>
				<tr><td colspan='20' class='t_line'></td></tr>
			<?
			}
	    ?>
    </table>

    <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
    	<tr><td height="5"></td></tr>
      <tr> 
        <td width="33%"><img src="../image/btn_seldel.gif" style="cursor:hand" onClick="qnaDelete();"></td>
        <td width="33%"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
        <td width="33%"></td>
      </tr>
    </table>


<? include "../footer.php"; ?>