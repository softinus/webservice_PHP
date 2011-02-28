<?
if(!empty($poll_code)) $code = $poll_code;
else if(!empty($_REQUEST["code"])) $code = $_REQUEST["code"];

$sql = "select * from wiz_pollinfo where code = '$code'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){

	$purl = "/".$row[purl];
	$skin = $row[mainskin];
	
	// 스킨위치
	$skin_dir = "/poll/skin/".$row[skin];
	
}else{
	
	$purl = "#";
	$skin = "
	
	<table width='174' border='1' cellspacing='0' cellpadding='0'>
  <tr>
    <td><img src='".$skin_dir."/image/left_txt_top.gif' /></td>
  </tr>
  <tr>
    <td background='".$skin_dir."/image/left_txt_bg.gif' style='padding-top:2px;padding-bottom:2px'>
    
		<table width='100%' cellspacing='0' cellpadding='0' border='0'>
			<tr><td><b>{SUBJECT}</b></td></tr>
			<tr><td>{CONTENT}</td></tr>
			[LOOP]
			<tr><td><img src='/images/point.gif' align='absmiddle'> {QUESTION}</td></tr>
			[LOOP2]
			<tr><td> {ANSWER} </td></tr>
			[/LOOP2]
			[/LOOP]
			<tr><td height=5></td></tr>
			<tr><td align=center>{VOTE_BTN} {VIEW_BTN}</td></tr>
		</table>
		
		</td>
	  </tr>
	  <tr>
	    <td><img src='".$skin_dir."/image/left_txt_bottom.gif' /></td>
	  </tr>
	</table>
	
	";

	// 스킨위치
	$skin_dir = "/poll/skin/pollBasic";
}
?>