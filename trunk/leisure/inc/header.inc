<?
	include "$DOCUMENT_ROOT/inc/module.inc";		// module include	
?>
<html>
<head>
<title><?=$design_info->site_title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<meta name="keywords" content="<?=$design_info->site_keyword?>">
<meta name="description" content="<?=$design_info->site_intro?>">
<link href="/wiz_style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript" src="/js/flash.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}

MM_reloadPage(true);

function displayLay(getno){
	
	if(document.all.displayer != null){
	  for(i=0; i<document.all.displayer.length; i++){
	          document.all.displayer[i].style.display='none';
	  }
	  if(document.all.displayer.length==null) document.all.displayer.style.display='block';
	  else document.all.displayer[getno].style.display='block';
	}
	
}

function disableLay(getno){
	
	if(document.all.displayer != null){
  	if(document.all.displayer.length==null) document.all.displayer.style.display='none';
  	else document.all.displayer[getno].style.display='none';
  }
  
}

//-->
</script>
</head>

<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td align="<?=$design_info->site_align?>" bgcolor="<?=$design_info->site_bgcolor?>" background="/data/mainimg/<?=$design_info->site_background?>">

      <table border="0" width="914" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2">
          	
					<? include "$DOCUMENT_ROOT/data/design/dsn_header.inc"; ?>
						
          </td>
        </tr>
        <tr>
          <td valign="top" width="190">
          	
					<?
					if($PHP_SELF == "/index.html" || $PHP_SELF == "/index.php") include "$DOCUMENT_ROOT/data/design/dsn_mainleft.inc";
					else  include "$DOCUMENT_ROOT/data/design/dsn_subleft.inc";
					?>
					
          </td>
          <td valign="top" width="724">