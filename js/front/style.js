function loseLogin(){
	var logout=document.getElementById('registerButton');
	var login=document.getElementById('loginButton');
	if(logout.text!="REGISTER"){
		login.style.display='none';
	}else{
		login.style.display='inline-block';
	}
}


function loginfocused(){
	var button=document.getElementById('register-submit');
	var email=document.getElementById('loginemail');
	var password=document.getElementById('loginpassword');
	if((email.value=="")||(password.value=="")){
		button.disabled="true";
	}else{
		button.disabled="";
	}

}
function loginHome(){
	var button=document.getElementById('register-submit');
	if(button.onclick=true){
		button.
		window.location.href="index.php";
	}
}

function editProfileAjax(){
	var div=document.getElementById('modalAjaxResponse');
	var xmlhttp=new XMLHttpRequest();
	var url="editProfile.php";
	var urlp="editProfile.php?pass='123'&&id=1";
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.status==200 && xmlhttp.readyState==4){
			div.innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();


	
}

function viewOrdersAjax(){
	
}


function savechangesbutton(){
	var btn=document.getElementById('savechanges');

}





