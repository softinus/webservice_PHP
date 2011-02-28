<?
// $catlist			: 카테고리
?>
<script language="javascript">
<!--
function viewImg(img){
	if(img == ""){
		alert("이미지가 없습니다.");
	}else{
		/*
		var url = "/bbs/openimg.php?code=<?=$code?>&img=" + img;
		window.open(url, "viewImg", "height=100, width=100, menubar=no, scrollbars=no, resizable=yes, toolbar=no, status=no");
		*/
	   var url = "openimg.php?code=<?=$code?>&img=" + img;
	   window.open(url,"openImg","width=300,height=300,scrollbars=yes");
	}
}
//-->
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
    <td><?=$catlist?></td>
  </tr>
</table>

<table cellpadding=0 cellspacing=0 border=0 width="100%">