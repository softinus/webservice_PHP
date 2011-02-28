var httpRequest={};
httpRequest.request=function() {
	var ajaxObj=null;
	if(window.ActiveXObject) {
		if(ajaxObj=new window.ActiveXObject("Msxml2.XMLHTTP")) {
			return ajaxObj;
		} else if(ajaxObj=new window.ActiveXObject("Microsoft.XMLHTTP")) {
			return ajaxObj;
		}
	} else if(ajaxObj=new window.XMLHttpRequest()) {
		return ajaxObj;
	}
}
httpRequest.sendRequest=function(url,method,data,asynch,callback) {
	var ajaxObj=httpRequest.request();
	if(data) {
		if(typeof(data)=="object") {
			var encodeQueryString=httpRequest.encodeObjData(data);
		} else if(typeof(data)=="string") {
			var encodeQueryString=httpRequest.encodeStrData(data);
		}
	} else {
		var encodeQueryString=null;
	}
	if(method.toLowerCase()=="get") {
		ajaxObj.open(method,url+"?"+encodeQueryString,asynch);
		ajaxObj.send(null);
	} else if(method.toLowerCase()=="post") {
		ajaxObj.open(method,url,asynch);
		ajaxObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajaxObj.send(encodeQueryString);
	}
	ajaxObj.onreadystatechange=function() {
		if(ajaxObj.readyState==4) {
			if(ajaxObj.status==200) {
				callback(ajaxObj);
			} 
		}
	}
}
httpRequest.encodeObjData=function(objData) {
	var encodeQueryString="";
	var i=0;
	for(proc in objData) {
		if(i==0) {
			encodeQueryString+=encodeURIComponent(proc)+"="+encodeURIComponent(objData[proc]);
		} else {
			encodeQueryString+="&"+encodeURIComponent(proc)+"="+encodeURIComponent(objData[proc]);
		}
		i++;
	}
	return encodeQueryString;
}
httpRequest.encodeStrData=function(strData) {
	var arrStrData=strData.split("&");
	var arrQueryString=[]
	for(var i=0;i<arrStrData.length;i++) {
		var arrSubStrData=arrStrData[i].split("=");
		arrQueryString.push(encodeURIComponent(arrSubStrData[0])+"="+encodeURIComponent(arrSubStrData[1]));
	}
	var strQueryString=arrQueryString.join("&");
	return strQueryString;
}