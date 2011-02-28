<?
$poll_code = "poll";
include_once "$DOCUMENT_ROOT/inc/common.inc";
include "$DOCUMENT_ROOT/inc/pollmain_info.inc";

// 설문조사 정보
$sql = "select * from wiz_poll where code = '$code' and pollmain != 'N' order by idx desc";
$result = mysql_query($sql) or error(mysql_error());
$poll_row = mysql_fetch_array($result);

$poll_idx = $poll_row[idx];
$poll_subject = $poll_row[subject];																						// 제목
$poll_content = str_replace("\n", "<br>", strip_tags($poll_row[content]));		// 내용
$polluse = $poll_row[polluse];																								// 사용여부

if(!empty($poll_row)) {

	$tdate = date('Y-m-d');
	if($poll_row[apermi] == "M" && $wiz_session[id] == "") $polluse = "N";
	if($poll_row[sdate] > $tdate || $poll_row[edate] < $tdate) $polluse = "N";
	
	// 설문하기 버튼
	if(strcmp($polluse, "N")) $vote_btn = "<img src='$skin_dir/image/bt_main_vote.gif' onCLick=\"main_vote();\" style='cursor:pointer'>";
	else $vote_btn = "<img src='$skin_dir/image/bt_main_vote.gif' onCLick=\"alert('설문이 종료되었습니다.');\" style='cursor:pointer'>";
	
	// 결과보기 버튼
	$result_btn = "<img src='$skin_dir/image/bt_main_result.gif' onClick=\"document.location='/poll/view.php?code=".$code."&idx=".$poll_idx."'\" style='cursor:pointer'>";

	// 스크립트 부분
	$poll = "<script Language=\"JavaScript\">
						<!--
						
						function readCookie(cookiename){
						 var Found = false;
						
						 cookiedata = document.cookie; 
						 if ( cookiedata.indexOf(cookiename) >= 0 ){ 
						   Found = true;
						 }
						 return Found;
						} 
						
						function setCookie( name, value, expiredays ){ 
						 var todayDate = new Date(); 
						 todayDate.setDate( todayDate.getDate() + expiredays ); 
						 document.cookie = name + \"=\" + escape( value ) + \"; path=/; expires=\" + todayDate.toGMTString() + \";\" 
						}
						
						function main_vote(){
						
							if(!readCookie(\"wiz_vote".$poll_idx."\")){
						
							var frm = document.voteFormMain;
							var checkValue = \"\";";
							
		for($ii=0;$ii<10;$ii++){
			
			$poll .= "if(frm.answer".$ii." != null){	  
									var voteCheck = false;
									for(var i=0; i < frm.answer".$ii.".length; i++){
									  if(frm.answer".$ii."[i].checked == true){
									  	 voteCheck = true;
									     checkValue = checkValue + frm.qidx".$ii.".value + \":\" + frm.answer".$ii."[i].value + \"/\";
									  }
									}
									if(voteCheck == false){
									  alert('질문에 대한 답변을 선택하세요.'); return;
									}
								}";
		}
		
		$poll .= "	var url = \"/poll/save.php?code=".$code."&pidx=".$poll_idx."&checkValue=\" + checkValue;
								document.location = url;
							  setCookie(\"wiz_vote".$poll_idx."\", \"true\", 1);
							   		
							}else{
								alert('이미 설문에 참여하셨습니다.');
								return;
							}
						
						}
						
						//-->
						</script>";
	

	$poll .= "<form name='voteFormMain' method='post' style='margin:0;'>";
	
	// 상단
	$poll .="<table width='174' border='0' cellspacing='0' cellpadding='0'>
					  <tr>
					    <td><img src='".$skin_dir."/image/main_top_line.gif' /></td>
					  </tr>
					  <tr>
					    <td align='center' background='".$skin_dir."/image/main_bg.gif' style='padding-top:2px;padding-bottom:2px'>
					    
							<table width='158' cellspacing='0' cellpadding='0' border='0'>
								<tr>
          				<td height='24' background='".$skin_dir."/image/main_title_bg.gif' style='padding-left:20px'><b><font color='#ffffff'>".$poll_subject."</font></b></td>
        				</tr>
        				<tr><td height='5'></td></tr>
								<tr><td bgcolor='f3f3f3' style='padding:4px'>".$poll_content."</td></tr>";
								
								// 설문 내용 
								$no = 0;
								$sql = "select * from wiz_polldata where pidx = '$poll_idx' order by idx asc";
								$result = mysql_query($sql);
								while($row = mysql_fetch_array($result)){
								
									$total_count = $row[count01]+$row[count02]+$row[count03]+$row[count04]+$row[count05]+$row[count06]+$row[count07]+$row[count08]+$row[count09]+$row[count10];
									if($total_count == 0) $total_count = 1;
								
									$answer_list[0][0] = $row[answer01];
									$answer_list[0][1] = $row[count01];
									$answer_list[0][2] = "count01";
									$answer_list[0][3] = round(($row[count01]/$total_count)*100,1);
								
									$answer_list[1][0] = $row[answer02];
									$answer_list[1][1] = $row[count02];
									$answer_list[1][2] = "count02";
									$answer_list[1][3] = round(($row[count02]/$total_count)*100,1);
								
									$answer_list[2][0] = $row[answer03];
									$answer_list[2][1] = $row[count03];
									$answer_list[2][2] = "count03";
									$answer_list[2][3] = round(($row[count03]/$total_count)*100,1);
								
									$answer_list[3][0] = $row[answer04];
									$answer_list[3][1] = $row[count04];
									$answer_list[3][2] = "count04";
									$answer_list[3][3] = round(($row[count04]/$total_count)*100,1);
								
									$answer_list[4][0] = $row[answer05];
									$answer_list[4][1] = $row[count05];
									$answer_list[4][2] = "count05";
									$answer_list[4][3] = round(($row[count05]/$total_count)*100,1);
								
									$answer_list[5][0] = $row[answer06];
									$answer_list[5][1] = $row[count06];
									$answer_list[5][2] = "count06";
									$answer_list[5][3] = round(($row[count06]/$total_count)*100,1);
								
									$answer_list[6][0] = $row[answer07];
									$answer_list[6][1] = $row[count07];
									$answer_list[6][2] = "count07";
									$answer_list[6][3] = round(($row[count07]/$total_count)*100,1);
								
									$answer_list[7][0] = $row[answer08];
									$answer_list[7][1] = $row[count08];
									$answer_list[7][2] = "count08";
									$answer_list[7][3] = round(($row[count08]/$total_count)*100,1);
								
									$answer_list[8][0] = $row[answer09];
									$answer_list[8][1] = $row[count09];
									$answer_list[8][2] = "count09";
									$answer_list[8][3] = round(($row[count09]/$total_count)*100,1);
								
									$answer_list[9][0] = $row[answer10];
									$answer_list[9][1] = $row[count10];
									$answer_list[9][2] = "count10";
									$answer_list[9][3] = round(($row[count10]/$total_count)*100,1);
								
									$poll .= "<input type='hidden' name='qidx".$no."' value='".$row[idx]."'>";
									$poll .= "<tr><td height='7'></td></tr>";
									$poll .= "<tr><td><img src='".$skin_dir."/image/point.gif' align='absmiddle'> ".$row[question]." </td></tr>";
								
									for($ii=0;$ii<10;$ii++){
										if($answer_list[$ii][0] != ""){
											$poll_content = "";
											$poll_content = "<input onFocus=this.blur(); type=radio name='answer".$no."' value='".$answer_list[$ii][2]."'>";
								      $poll_content .= $answer_list[$ii][0];
											$poll .= "<tr><td> ".$poll_content." </td></tr>";
								    }
								  }
								  
									$no++;
								
								}

	// 하단 
	$poll .= "			<tr><td height=10></td></tr>
									<tr><td align=right>".$vote_btn." ".$result_btn."</td></tr>
								</table>
							
							</td>
						</tr>
						<tr>
							<td><img src='".$skin_dir."/image/main_bottom_line.gif'></td>
						</tr>
					</table>";

	$poll .= "</form>";
	
}
?>
