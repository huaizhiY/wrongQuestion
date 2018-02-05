
var xhr = {};

xhr.get = function(url,callback){
	var xhr = new XMLHttpRequest();
		xhr.open("GET",url);
		xhr.send(null);
		xhr.onload = function(){
			if(xhr.status == 200){
				callback(xhr.responseText);
			}
		}
		return xhr;
}

xhr.post = function(url,data,callback){
	var xhr = new XMLHttpRequest();
		xhr.open("POST",url);
		xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded")
		xhr.send(data);
		xhr.onload = function(){
			if(xhr.status == 200){
				callback(xhr.responseText);
			}
		}
		return xhr;
}

