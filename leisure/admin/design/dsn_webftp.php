<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
// ������ ��������
if(empty($file_path) || $file_path == "../../images" || substr($file_path, 0,1) == "/" || strpos($file_path, "../", 6) > 0){
   $file_path = "../../images";
   $par_path = "../../images";
}else{

	$path_list = explode( "/", $file_path);
	for($ii = 0; $ii < count($path_list)-1; $ii++){
		$par_path .= $path_list[$ii]."/";
	}
	$par_path = substr($par_path,0,strlen($par_path)-1);
	
}

           
?>

<script language="JavaScript" type="text/javascript">
<!--
function displayLay(getno){
	if(document.all.displayer.length==null) document.all.displayer.style.display='block';
	else document.all.displayer[getno].style.display='block';
}

function disableLay(getno){

	if(document.all.displayer.length==null) document.all.displayer.style.display='none';
	else document.all.displayer[getno].style.display='none';				
}

function confirmDelete(file_name){
   
   if(confirm('�����ΰ�� �������ϱ��� ��� �����˴ϴ�.\n\n������ ������ ���� �����Ͻðڽ��ϱ�?')){
      document.location = "dsn_webftp_save.php?mode=delete&page=<?=$page?>&file_path=<?=$file_path?>&file_name=" + file_name;
   }
}

function insertFiledir(){
   var url = "dsn_webftp_input.php?mode=insert&file_path=<?=$file_path?>&page=<?=$page?>";
   window.open(url, "insertFiledir", "height=260, width=500, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=150, top=100");
}

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
		if(document.forms[i].filename != null){
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
		if(document.forms[i].filename != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//�������� ����
function fileDelete(){

	var i;
	var selfile = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].filename != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selfile = selfile + document.forms[i].filename.value + "|";
				}
			}
	}

	if(selfile == ""){
		alert("������ ������ �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ ������ ���� �����Ͻðڽ��ϱ�?\n\n�����ΰ�� �������ϱ��� ��� �����˴ϴ�.")){
			document.location = "dsn_webftp_save.php?mode=delete&page=<?=$page?>&file_path=<?=$file_path?>&selfile=" + selfile;
		}else{
			return;
		}
	}
	return;
	
}

// �������� ����
function fileEdit(){

	var i;
	var selfile = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].filename != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selfile = selfile + document.forms[i].filename.value + "|";
				}
			}
	}

	if(selfile == ""){
		alert("������ ������ �������� �ʾҽ��ϴ�.");
		return;
	}else{
		var url = "dsn_webftp_input.php?mode=update&page=<?=$page?>&file_path=<?=$file_path?>&selfile=" + selfile;
   	window.open(url, "fileEdit", "height=300, width=500, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, left=150, top=100");
	}
	return;
	
}
//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">WEB-FTP</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">/images ������ �̹��� ���ε�,����,���� �մϴ�.</td>
			  </tr>
			</table>

			<br>
      <table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
      <form action='<?=$PHP_SELF?>'>
      <input type="hidden" name="file_path" value="<?=$file_path?>">
        <tr>
         <td width="15%" class="t_name">���ϸ�</td>
         <td class="t_value"><input type="text" name="file_search" class="input"> <input type="image" src="../image/btn_search.gif" align="absmiddle"></td>
       </tr>
      </form>
      </table>
      
      <table><tr><td height="10"></td></tr></table>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="b_title" height="25">��ġ : http://<? echo $HTTP_HOST."/".str_replace("../../", "", $file_path); ?></td>
          <td align="right"><img src="../image/btn_fileadd.gif" style="cursor:hand" onclick="insertFiledir();"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form>
      	<tr><td colspan=20 class="t_rd"></td></tr>
        <tr class="t_th">
          <th width="5%"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
          <th width="5%">��ȣ</th>
          <th width="10%">��������</th>
          <th>���ϸ�</th>
          <th width="20%">���ϻ�����</th>
        </tr>
        <tr><td colspan=20 class="t_rd"></td></tr>
	      <?
	      $start_Y = 243;
	      
	      if($file_path != "../../images"){
	      	$start_Y += 26;
	      ?>
        <tr>
          <td align="center" height="26"><input type="checkbox"></td>
          <td align="center">..</td>
          <td align="center"><font color="red"><b>..</b></font></td>
          <td><a href='<?=$PHP_SELF?>?file_path=<?=$par_path?>'> <font color="red"><b>������</b></font></a></td>
          <td align="center">..</td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
      	<?
   			}
   			?>
      </form>
      </table>
      <?
      if($file_search != "")
      	exec("ls ".$file_path."/".$file_search."*", $file_array, $return_val);
      else
      	exec("ls -X $file_path", $file_array, $return_val);

      $posi = 0;
      $no = 0;
      $total = count($file_array);
      $rows = 20;
      $lists = 5;
      
			$page_count = ceil($total/$rows);
			if($page < 1 || $page > $page_count) $page = 1;
			$start = ($page-1)*$rows;
			$num = $total-$start;
		
			while( $no < $total && $rows){
		   
		   if($no >= $start){
		      
            $file_name = str_replace($file_path."/","",$file_array[$no]);
            
            if(is_file("$file_path/$file_name")){
               $file_size = round(filesize("$file_path/$file_name")/1024, 2)."K";
               $file_type = substr($file_name,-3);
               if($file_type == "bmp" ||
               	$file_type == "doc" ||
               	$file_type == "gif" ||
               	$file_type == "jpg" ||
               	$file_type == "ppt" ||
               	$file_type == "psd" ||
               	$file_type == "xls" ||
               	$file_type == "zip"
               	){
               }else{
               	$file_type = "etc";
               }
               	
            }else{
               $file_size = "0K";
               $file_type = "dir";
            }
         
      ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form>
      <input type="hidden" name="filename" value="<?=$file_name?>">
        <tr> 
          <td width="5%" align="center" height="26"  <? if($file_type != "dir") echo "onmouseover=displayLay('$posi'); onmouseout=disableLay('$posi');"; ?> style="cursor:hand"><input type="checkbox" name="select_checkbox"></td>
          <td width="5%" align="center"><?=$num?></td>
          <td width="10%" align="center"><img src="../image/filetype/icon_<?=$file_type?>.gif"></td>
          <td width="60%">
          <?
          if($file_type != "dir")
          	echo "<a href='$file_path/$file_name' target='_blank' onmouseover=displayLay('$posi'); onmouseout=disableLay('$posi');>$file_name</a></td>";
          else
          	echo "<a href='$PHP_SELF?file_path=$file_path/$file_name'>$file_name</a></td>";
          ?>
          <td width="20%" align="center"><?=$file_size?></td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
      </form>
      </table>
      <div style="display:none;position:absolute;top:<?=(27*$posi + $start_Y)?>;left:470;" id="displayer">
        <img src="<?=$file_path?>/<?=$file_name?>" align=absmiddle style="border:1px dddddd solid;"></a> 
      </div>
      <?
      		$posi++;
            $rows--;
            $num--;
         }
   			$no++;
      }
      ?>

      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td></td>
        </tr>
      </table>
      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="200"><img src="../image/btn_seledit.gif" style="cursor:hand"  onClick="fileEdit();">&nbsp;<img src="../image/btn_seldel.gif" style="cursor:hand"  onClick="fileDelete();"></td>
          <td width="500"><? print_pagelist($page, $lists, $page_count, "&file_path=$file_path&file_search=$file_search"); ?></td>
        </tr>
      </table>

<? include "../footer.php"; ?>