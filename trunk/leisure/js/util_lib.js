var reswap;
function clearSwap(){
	clearTimeout(reswap);
}
function onSwapLayerImgs(no, obj){	// 메인페이지 상품이미지 레이어

	if(obj != "productBox"){
		var tdObj = findNode(obj,"TD");
		var mode = "stop";
	}else{
		var tdObj = document.getElementById(obj);
		var mode = "ing";
	}
	var imgObjs = tdObj.getElementsByTagName("img");


	if(parseInt(no) > 4){
		no = no%5;
	}

	for(var i=0; i< imgObjs.length; i++){

		if(imgObjs[i].getAttribute("name").substr(0,6) != "imgbtn"){
			if(i==no){
				imgObjs[i].style.display = "inline";
			}else{
				imgObjs[i].style.display = "none";
			}
		}
	}

	if(mode == "ing"){
		reswap = setTimeout("onSwapLayerImgs('"+(parseInt(no)+1)+"','productBox')",5000);
	}
}
function findNode(obj, findName){	// 부모객체 찾기 findNode(object, tagName)
	obj=obj.parentNode
	while(obj.tagName != findName){
		obj = obj.parentNode;
	}
	return obj;
}
function onFeed(formObj){
	var chkno=0;
	var feed_email = "";
	var feed_sms = "";
	for(var i=0; i<formObj.elements.length; i++){
		if(formObj.elements[i].checked == true){
			if(formObj.elements[i].value=="email"){
				if(formObj.feed_email.value.trim()==""){
					alert("이메일 주소를 입력하세요!");
					formObj.feed_email.focus();
					return false;
				}else{
					feed_email = formObj.feed_email.value.trim();
				}
			}
			if(formObj.elements[i].value=="sms"){
				if(formObj.feed_sms.value.trim()==""){
					alert("휴대폰 번호를 입력하세요!");
					formObj.feed_sms.focus();
					return false;
				}else{
					feed_sms = formObj.feed_sms.value;
				}
			}
			chkno++;
		}
	}
	if(chkno < 1){
		alert("구독신청 하고자 하는 타입을 선택 해주세요!");
		return false;
	}
	showMask("wrapper","mask")

	var sendData={
		"feed_email":feed_email,
		"feed_sms":feed_sms,
		"mode":"insert"
	}

	var postUrl=formObj.action;
	httpRequest.sendRequest(postUrl,"post",sendData,true,feedresult);

	return false;

}
function notReveive(formObj){
	var chkno=0;
	var feed_email = "";
	var feed_sms = "";


	for(var i=0; i<formObj.elements.length; i++){
		if(formObj.elements[i].checked == true){
			if(formObj.elements[i].value=="email"){
				if(formObj.feed_email.value.trim()==""){
					alert("이메일 주소를 입력하세요!");
					formObj.feed_email.focus();
					return false;
				}else{
					feed_email = formObj.feed_email.value.trim();
				}
			}
			if(formObj.elements[i].value=="sms"){
				if(formObj.feed_sms.value.trim()==""){
					alert("휴대폰 번호를 입력하세요!");
					formObj.feed_sms.focus();
					return false;
				}else{
					feed_sms = formObj.feed_sms.value;
				}
			}
			chkno++;
		}
	}
	if(chkno < 1){
		alert("수신거부 하고자 하는 타입을 선택 해주세요!");
		return false;
	}
	
	var sendData={
		"feed_email":feed_email,
		"feed_sms":feed_sms,
		"mode":"not"
	}

	var postUrl=formObj.action;
	httpRequest.sendRequest(postUrl,"post",sendData,true,feednotresult);

	return false;
}

function feednotresult(obj){
	if(obj.responseText=="success"){
		alert("해당 이메일/휴대폰번호로된 구독신청이 거부 처리 되었습니다.");
		document.feedForm.reset();
		hideMask("mask")
	}else if(obj.responseText=="error"){
		alert("데이터베이스 저장이 실패하였습니다. 관리자에게 문의하세요. ")
	}else{
		alert("실패하였습니다. 관리자에게 문의하세요. ")
	}
}


function feedresult(obj){
	if(obj.responseText=="success"){
		alert("구독신청 되었습니다.");
		document.feedForm.reset();
		hideMask("mask")
	}else if(obj.responseText=="error"){
		alert("데이터베이스 저장이 실패하였습니다. 관리자에게 문의하세요. ")
	}else{
		alert("구독신청 실패하였습니다. 관리자에게 문의하세요. ")
	}
}

function onDelete(idx){
	if(!confirm("정말로 삭제 하시겠습니까?")){
		return;
	}
	showMask("wrapper","mask")
	var formObj = document.deleteForm;
	var sendData={
		"code":formObj.code.value,
		"mode":formObj.mode.value,
		"memid":formObj.memid.value,
		"name":formObj.name.value,
		"prdcode":formObj.prdcode.value,
		"writemode":formObj.writemode.value,
		"cmt_limit":cmt_limit,
		"idx":idx
	}

	var postUrl=formObj.action;
	httpRequest.sendRequest(postUrl,"post",sendData,true,onCommentWrite);
}
var cmt_limit = 5;
function commentWrite(formObj){
	if(formObj.memid.value.trim()==""){
		alert("로그인 하셔야 입력 가능합니다.");
		return false;
	}
	if(formObj.content.value.trim()==""){
		alert("내용을 입력 해 주세요!");
		return false;
	}
	var code = formObj.code.value;
	var mode = formObj.mode.value;
	var memid = formObj.memid.value;
	var name = formObj.name.value;
	var prdcode = formObj.prdcode.value;
	var content = formObj.content.value;


	var writemode = "action";

	showMask("wrapper","mask")
	for(var i=0; i<formObj.elements.length; i++){
		if(formObj.elements[i].name=="star" && formObj.elements[i].checked==true){	
			var star = formObj.elements[i].value;
		}
	}


	if(mode=="reply"){
		var idx = formObj.idx.value;
		var sendData={
			"code":code,
			"mode":mode,
			"memid":memid,
			"name":name,
			"prdcode":prdcode,
			"content":content,
			"writemode":writemode,
			"cmt_limit":cmt_limit,
			"star":star,
			"idx":idx
		}
	}else{
		var sendData={
			"code":code,
			"mode":mode,
			"memid":memid,
			"name":name,
			"prdcode":prdcode,
			"content":content,
			"cmt_limit":cmt_limit,
			"star":star,
			"writemode":writemode
		}
	}

	var postUrl=formObj.action;
	httpRequest.sendRequest(postUrl,"post",sendData,true,onCommentWrite);
	return false;
}



function onMoreComment(prdcode){	// 토크더보기

	showMask("wrapper","mask")
	cmt_limit = cmt_limit +5;

	var sendData={
		"prdcode":prdcode,
		"cmt_limit":cmt_limit
	}
	var postUrl="more_comment.php";
	httpRequest.sendRequest(postUrl,"post",sendData,true,onCommentWrite);
}
function onShowCmt(idvle){
	document.getElementById(idvle).style.display = "inline";
}
function onDelete(idx){

	if(!confirm("정말로 삭제 하시겠습니까?")){
		return;
	}

	showMask("wrapper", "mask")

	var formObj = document.deleteForm;
	var sendData={
		"code":formObj.code.value,
		"mode":formObj.mode.value,
		"memid":formObj.memid.value,
		"name":formObj.name.value,
		"prdcode":formObj.prdcode.value,
		"writemode":formObj.writemode.value,
		"cmt_limit":cmt_limit,
		"idx":idx
	}

	var postUrl=formObj.action;
	httpRequest.sendRequest(postUrl,"post",sendData,true,onCommentWrite);
}
function onCommentWrite(obj){

	if(obj.responseText==404){
		alert("페이지 누락 에러 입니다. 관리자에게 문의하세요.");
		hideMask("mask")
	}
		
	if(obj.responseText=="replyerror"){
		alert("리플이 작성 된 있는 게시물 입니다.. 리플 삭제후에 삭제바랍니다.");
		hideMask("mask")
		return;
	}
	if(obj.responseText=="pwderror"){
		alert("비밀번호가 일치하지 않습니다.");
		hideMask("mask")
		return;
	}
	if(obj.responseText=="permi"){
		alert("권한이 없습니다.");
		hideMask("mask")
		return;
	}

	// XML 긁어오기
	var xmlObj = obj.responseXML;
	var clist = xmlObj.getElementsByTagName("clist")[0];
	var conObj = clist.getElementsByTagName("con");

	comList = ""; // XML 내용 담기
	for(var i=0; i<conObj.length; i++){
		var cname = conObj[i].getElementsByTagName("cname")[0].firstChild.data;
		var cdate = conObj[i].getElementsByTagName("cdate")[0].firstChild.data;
		var content = conObj[i].getElementsByTagName("content")[0].firstChild.data;
		var conIdx = conObj[i].getAttribute("idx");
		var prdcode = conObj[i].getAttribute("prdcode");
		var se_name = conObj[i].getAttribute("sname");
		var se_id = conObj[i].getAttribute("smemid");
		var star = parseInt(conObj[i].getAttribute("star"))

		var display_star = "";
		for(var s=1; s<=star; s++){
			display_star += "★";
		}
		for(var s=1; s<=(5-star); s++){
			display_star += "☆";
		}

		comList += '<table width="670" border="0" cellspacing="0" cellpadding="8">';
		comList += '<tr>';
		comList += '<td width="70" align="center"><strong><font color="#F97200">'+cname+'</font></strong></td>';
		comList += '<td width="70" align="center">'+display_star+'</td>';
		comList += '<td width="530">'+content+' ('+cdate+') <img src="image/anyto_button_02.jpg" width="48" height="16" onclick="onShowCmt(\'tbl'+conIdx+'\')" style="cursor:pointer;"> <img src="image/btn_del.gif" width="10" height="11" style="cursor:pointer" onclick="onDelete(\''+conIdx+'\')" /></td>';
		comList += '</tr>';
		comList += '</table>';
		comList += '<table width="670" border="0" cellspacing="0" cellpadding="8" style="display:none" id="tbl'+conIdx+'">';
		comList += '<tr>';
		comList += '<form name="reply" action="/bbs/save.php" method="post" onsubmit="return commentWrite(this)">';
		comList += '<input type="hidden" name="code" value="talk" />';

		comList += '<input type="hidden" name="prdcode" value="'+prdcode+'" />';
		comList += '<input type="hidden" name="mode" value="reply" />';
		comList += '<input type="hidden" name="memid" value="'+se_id+'" />';
		comList += '<input type="hidden" name="name" value="'+se_name+'" />';
		comList += '<input type="hidden" name="idx" value="'+conIdx+'" />';

		comList += '<td width="106" align="center"></td>';
		comList += '<td width="400">';
		comList += '<textarea name="content" style="width:400px; height:40px;"></textarea>';
		comList += '</td>';
		comList += '<td><input type="image" src="/image/talk_btn_submit.gif" /></td>';
		comList += '</form>';
		comList += '</tr>';
		comList += '</table>';


		conrelist = conObj[i].getElementsByTagName("conrelist");
		for(var j=0; j<conrelist.length; j++){
			crename = conrelist[j].getElementsByTagName("crename")[0].firstChild.data;
			credate = conrelist[j].getElementsByTagName("credate")[0].firstChild.data;
			recontent = conrelist[j].getElementsByTagName("recontent")[0].firstChild.data;
			com_idx = conrelist[j].getAttribute("idx");

			comList += '<table width="670" border="0" cellspacing="0" cellpadding="8">';
			comList += '<tr>';
			comList += '<td width="106" align="center"></td>';
			comList += '<td>┗▶ ['+crename+'] '+recontent+' ('+credate+') <img src="image/btn_del.gif" width="10" height="11" style="cursor:pointer" onclick="onDelete(\''+com_idx+'\')" /></td>';
			comList += '</tr>';
			comList += '</table>';

		}
		
		comList += '<table width="670" height="1" border="0" cellpadding="0" cellspacing="0" background="image/anyto_line_bg.jpg">';
		comList += '<tr>';
		comList += '<td></td>';
		comList += '</tr>';
		comList += '</table>';
	}

	document.getElementById("talkBox").innerHTML = comList;
	document.bbs.content.value = "";
	hideMask("mask")

}
String.prototype.trim = function(){ 
	return this.replace(/(^\s*)|(\s*$)/g,""); 
} 
 
 

var catView = true;	// 카테고리on/off

function hideCategory(hei){
	var cObj = document.getElementById("oneCatList");


	if(hei <= 1){
		cObj.style.height = "1px";
		clearTimeout(moveout);
		catView=false;
		return;
	}
	if(parseInt(hei,10) >= 33){
		clearTimeout(moveout);
		catView=true;
		return;
	}


	if(!hei){
		if(catView==true){
			hei = parseInt(cObj.style.height) - 3;
		}else{
			hei = parseInt(cObj.style.height) + 3;
		}
	}

	cObj.style.height = hei+"px";

	if(catView==true){
		hei = hei-3;
	}else{
		hei = hei+3;
	}

	moveout=setTimeout("hideCategory("+hei+")",1);


/*
	if(cObj.style.display=="none"){
		cObj.style.display= "inline"
	}else{
		cObj.style.display= "none"
	}
*/
}


function swapTabMenu(no,obj){
	
	var tObj = document.getElementById("mainTabMenuBtn");
	var imgObj = tObj.getElementsByTagName("img");
	for(var i=0; i<imgObj.length; i++){
		if((parseInt(no,10)-1)==i){
			imgObj[i].src = "/image/center_btn_0"+(i+1)+"_on.gif";
		}else{
			imgObj[i].src = "/image/center_btn_0"+(i+1)+".gif";
		}
	}

	if(no == "5"){
		document.getElementById("talkTable").style.display = "none";
	}else{
		document.getElementById("talkTable").style.display = "inline";
	}

	for(var i=1; i<=4; i++){
		if(parseInt(no,10)==i){
			document.getElementById("mainTabMenu"+i).style.display = "inline";
		}else{
			document.getElementById("mainTabMenu"+i).style.display = "none";
		}
	}
}
// 남은시간 함수
function CalcRemaining(etime,tidx,atime) {		// 남은시간 함수
	var now = new Date(); 
	var difference = parseInt(etime - atime);
	atime = parseInt(atime) + 1;

	if (difference > 0){ 
		var secs = difference % 60 
		difference = parseInt(difference / 60) 
		var minutes = difference % 60 
		difference = parseInt(difference / 60) 
		var hours = difference % 24 
		difference = parseInt(difference / 24) 
		var days = difference 

		// 남은시간 구하기
		var days1 = parseInt(days/10);
		var days2 = days%10;
		
		hours = (days2 *24) + hours;
		if(hours > 99){
			hours = 99;
		}
		var hours1 = parseInt(hours/10);
		var hours2 = hours%10;

		var minutes1 = parseInt(minutes/10);
		var minutes2 = minutes%10;

		var secs1 = parseInt(secs/10);
		var secs2 = secs%10;

		// 시간입력
		document.getElementById("thour0_"+tidx).src = "/data/oneday/number_"+hours1+".gif";
		document.getElementById("thour1_"+tidx).src = "/data/oneday/number_"+hours2+".gif";
		document.getElementById("tminite0_"+tidx).src = "/data/oneday/number_"+minutes1+".gif";
		document.getElementById("tminite1_"+tidx).src = "/data/oneday/number_"+minutes2+".gif";
		document.getElementById("ttime0_"+tidx).src = "/data/oneday/number_"+secs1+".gif";
		document.getElementById("ttime1_"+tidx).src = "/data/oneday/number_"+secs2+".gif";
		setTimeout("CalcRemaining('"+etime+"','"+tidx+"','"+atime+"')", 1000); 
	}else{ 
		document.getElementById("thour0_"+tidx).src = "/data/oneday/number_0.gif";
		document.getElementById("thour1_"+tidx).src = "/data/oneday/number_0.gif";
		document.getElementById("tminite0_"+tidx).src = "/data/oneday/number_0.gif";
		document.getElementById("tminite1_"+tidx).src = "/data/oneday/number_0.gif";
		document.getElementById("ttime0_"+tidx).src = "/data/oneday/number_0.gif";
		document.getElementById("ttime1_"+tidx).src = "/data/oneday/number_0.gif";

		// 구매버튼 변경(시간마감)
		changeButton('timeout');
	}
}
// 가격에 원단위 컴마를 찍는다.
function won_Comma(num){
	num = num+"";
	point = num.length%3
	len = num.length;

	str = num.substring(0,point);
	while( point < len){
		if( str != "" ) str += ",";
		str += num.substring( point , point+3);
		point +=3;
	}
	return str;
}
// 즐겨찾기 추가
function bookMark(site_url, site_name){
   window.external.AddFavorite(site_url, site_name);
}

// 이메일 체크
function check_Email(email)
{  

	var email_1 = "";
	var email_2 = "";
	var check_point = 0;

	if (email.indexOf("@") < 0 ) {
		alert("e-mail에 @ 가 빠져있습니다.");
		return false;
	}
	if (email.indexOf(".") < 0 ) {
		alert("e-mail에 . 가 빠져있습니다.");
		return false;
	}

	if (email.indexOf("'") >= 0 ) {
		alert("e-mail에 ' 는 포함할수 없습니다..");
		return false;
	}
	if (email.indexOf("|") >= 0 ) {
		alert("e-mail에 | 는 포함할수 없습니다..");
		return false;
	}
	if (email.indexOf(">") >= 0 ) {
		alert("e-mail에 > 는 포함할수 없습니다..");
		return false;
	}
	if (email.indexOf("<") >= 0 ) {
		alert("e-mail에 < 는 포함할수 없습니다..");
		return false;
	}
	if (email.indexOf(" ") >= 0 ) {
		alert("e-mail에 스페이스는 포함할수 없습니다..");
		return false;
	}

          for (var j = 0 ; j < email.length; j++)
          {
               if ( email.substring(j, j + 1) != "@"  && check_point == 0 ) {
						email_1 = email_1 + email.substring(j, j + 1)
               } else if ( email.substring(j, j + 1) == "@" )  {
						check_point = check_point + 1;
               } else {
               		email_2 = email_2 + email.substring(j, j + 1);	
               }
          }

	//if (email_1.length < 3 ) {
	//	alert("e-mail에 @ 앞자리는 3자리이상 입력하셔야합니다.");
	//	form1.email.focus();
	//	return false;
	//}
	
	//if (email_2.length < 2 ) {
	//	alert("e-mail에 @ 뒷자리는 2자리이상 입력하셔야합니다.");
	//	form1.email.focus();
	//	return false;
	//}

	if (check_point > 1 ) {
		alert("e-mail에 @ 는 1번이상 들어갈수 없습니다.");
		return false;
	}

	if (email_2.indexOf("(") >= 0 ) {
		alert("e-mail에 ( 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("(") >= 0 ) {
		alert("e-mail에 ( 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(")") >= 0 ) {
		alert("e-mail에 ) 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(",") >= 0 ) {
		alert("e-mail에 , 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(";") >= 0 ) {
		alert("e-mail에 ; 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(":") >= 0 ) {
		alert("e-mail에 : 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("/") >= 0 ) {
		alert("e-mail에 / 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("[") >= 0 ) {
		alert("e-mail에 [ 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("]") >= 0 ) {
		alert("e-mail에 ] 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("{") >= 0 ) {
		alert("e-mail에 { 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("}") >= 0 ) {
		alert("e-mail에 } 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(" ") >= 0 ) {
		alert("e-mail에 스페이스는 포함할수 없습니다..");
		return false;
	}
	return true;
	
}

// 숫자 체크
function Check_Num(tocheck)
{
	var isnum = true;
	
	if (tocheck == null || tocheck == "")
	{
		isnum = false;
		return isnum;
	}
	
	for (var j = 0 ; j < tocheck.length; j++)
	{
		if (      tocheck.substring(j, j + 1) != "0"
			&&   tocheck.substring(j, j + 1) != "1"
			&&   tocheck.substring(j, j + 1) != "2"
			&&   tocheck.substring(j, j + 1) != "3"
			&&   tocheck.substring(j, j + 1) != "4"
			&&   tocheck.substring(j, j + 1) != "5"
			&&   tocheck.substring(j, j + 1) != "6"
			&&   tocheck.substring(j, j + 1) != "7"
			&&   tocheck.substring(j, j + 1) != "8"
			&&   tocheck.substring(j, j + 1) != "9" )
		{
			isnum = false;
		}
	}
	return isnum;
}

// 주민 등록 번호 체크
function check_ResidentNO(str_f_num, str_l_num)
{  

	var i3=0
	for (var i=0;i<str_f_num.length;i++)
	{
		var ch1 = str_f_num.substring(i,i+1);
		if (ch1<'0' || ch1>'9') { i3=i3+1 }
	}
	if ((str_f_num == '') || ( i3 != 0 ))
	{
		return (false);
	}

	var i4=0
	for (var i=0;i<str_l_num.length;i++)
	{
		var ch1 = str_l_num.substring(i,i+1);
		if (ch1<'0' || ch1>'9') { i4=i4+1 }
	}
	if ((str_l_num == '') || ( i4 != 0 ))
	{
		return (false);
	}
	
	if(str_f_num.substring(0,1) < 0)
	{
		return (false);
	}
	
	if(str_l_num.substring(0,1) > 2)
	{
		return (false);
	}
	
	if((str_f_num.length > 7) || (str_l_num.length > 8))
	{
		return (false);
	}
	
	if ((str_f_num == '72') || ( str_l_num == '18'))
	{
		return (false);
	}
	
	var f1=str_f_num.substring(0,1)
	var f2=str_f_num.substring(1,2)
	var f3=str_f_num.substring(2,3)
	var f4=str_f_num.substring(3,4)
	var f5=str_f_num.substring(4,5)
	var f6=str_f_num.substring(5,6)
	var hap=f1*2+f2*3+f3*4+f4*5+f5*6+f6*7
	var l1=str_l_num.substring(0,1)
	var l2=str_l_num.substring(1,2)
	var l3=str_l_num.substring(2,3)
	var l4=str_l_num.substring(3,4)
	var l5=str_l_num.substring(4,5)
	var l6=str_l_num.substring(5,6)
	var l7=str_l_num.substring(6,7)
	hap=hap+l1*8+l2*9+l3*2+l4*3+l5*4+l6*5
	hap=hap%11
	hap=11-hap
	hap=hap%10
	if (hap != l7) 
	{
		return (false);
	}
	
	return true; 
}

// 특수문자가있는지 체크
function Check_Char(id_text)
{
	var alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	var numeric = '1234567890';
	var nonkorean = alpha+numeric; 
	
	var i ; 
	for ( i=0; i < id_text.length; i++ )  {
		if( nonkorean.indexOf(id_text.substring(i,i+1)) < 0) {
			break ; 
		}
	}
	
	if ( i != id_text.length ) {
		return false ; 
	}
	else{
		return true ;
	} 
	
	return true;
}

// 특수문자 체크
function Check_nonChar(id_text)
{
	var nonchar = '~`!@#$%^&*()-_=+\|<>?,./;:"';
	var numeric = '1234567890';
	var nonkorean = nonchar+numeric; 
	
	var i ; 
	for ( i=0; i < id_text.length; i++ )  {
		if( nonkorean.indexOf(id_text.substring(i,i+1)) > 0) {
			break ; 
		}
	}
	
	if ( i != id_text.length ) {
		return false ; 
	}
	else{
		return true ;
	} 
	
	return false;
}

// 이미지 롤오버
function WIZ_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function WIZ_swapImgRestore() { //v3.0
  var i,x,a=document.WIZ_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function WIZ_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.WIZ_p) d.WIZ_p=new Array();
    var i,j=d.WIZ_p.length,a=WIZ_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.WIZ_p[j]=new Image; d.WIZ_p[j++].src=a[i];}}
}

function WIZ_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=WIZ_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function WIZ_swapImage() { //v3.0
  var i,j=0,x,a=WIZ_swapImage.arguments; document.WIZ_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=WIZ_findObj(a[i]))!=null){document.WIZ_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function WIZ_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.WIZ_pgW=innerWidth; document.WIZ_pgH=innerHeight; onresize=WIZ_reloadPage; }}
  else if (innerWidth!=document.WIZ_pgW || innerHeight!=document.WIZ_pgH) location.reload();
}

function sns_sms(msg){
	var href = "/oneday/sms_send.php?msg=" + msg;
	window.open(href, 'sns_sms', 'width=430,height=352,top=100,left=100');
}

function sns_facebook(msg,url){
	var href = "http://www.facebook.com/sharer.php?u=" + url + "&t=" + encodeURIComponent(msg);
	window.open(href, 'facebook', '');
}
function sns_twitter(msg,url){
	var href = "http://twitter.com/home?status=" + encodeURIComponent(msg) + " " + encodeURIComponent(url);
	window.open(href, 'twitter', '');
}

function sns_me2day(msg,url,tag){
	var href = "http://me2day.net/posts/new?new_post[body]=" + encodeURIComponent(msg) + " " + encodeURIComponent(url)
	+ "&new_post[tags]=" + encodeURIComponent(tag);
	window.open(href, 'me2day', '');
}
function goYozmDaum(link,prefix,parameter){
	var href = "http://yozm.daum.net/api/popup/prePost?link=" + encodeURIComponent(link) + "&prefix=" + encodeURIComponent(prefix) + "&parameter=" + encodeURIComponent(parameter);
	var a = window.open(href, 'yozmSend', 'width=466, height=356');
	if ( a ) {
		a.focus();
	}
}
function sns_email(msg){
	   var url = "/oneday/send_email.php?msg=" + msg;
	   window.open(url,"sendEmail","height=620, width=700, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}


function sns_cyworld(msg,url,tag){
	var href="http://csp.cyworld.com/bi/bi_recommend_pop.php?url="+encodeURIComponent(url)+"&summery="+encodeURIComponent(msg)+"&writer=";
	window.open(href, 'me2day', 'width=400,height=364,scrollbars=no,resizable=no');
}


WIZ_reloadPage(true);



function showMask(tId,mId) { // 마스크
	if(typeof(tId) =="string") {
		var tObj=document.getElementById(tId);
	} else {
		var tObj=tId;
	}
	if(typeof(mId)=="string") {
		var mObj=document.getElementById(mId);
	} else {
		var mObj=mId;
	}
	var tw=tObj.offsetWidth;
	var th=tObj.offsetHeight;
	var arrXY=getXY(tObj);
	mObj.style.left=arrXY[0]+"px";
	mObj.style.top=arrXY[1]+"px";
	mObj.style.width=tw+"px";
	mObj.style.height=th+"px";
	mObj.style.backgroundColor="#99ccff";
	mObj.style.display="block";
}

function hideMask(mId) { // 마스크 숨기기 
	if(typeof(mId)=="string") { 
		var mObj=document.getElementById(mId); 
	} else { 
		var mObj=mId; 
	} 
	mObj.style.display="none"; 
} 
function getXY(n){ 
	var ex=0; 
	var ey=0; 
	var objN=n; 

	while(objN){ 
		ex+=objN.offsetLeft; 
		ey+=objN.offsetTop; 
		objN=objN.offsetParent; 
	} 

	var objM=n.parentNode; 
	while(objM!=document.body){ 
		if(objM.scrollTop){ 
			ey-=objM.scrollTop; 
		} 
		if(objM.scrollLeft){ 
			ex-=objM.scrollLeft; 
		} 
		objM=objM.parentNode; 
	} 
	return [ex,ey]; 
} 

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function onSwapImgs(obj, imgsrc){

	obj.src = imgsrc;
}