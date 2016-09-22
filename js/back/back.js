function navigationDrawerToggle(){
	 //var nav_label=document.getElementById('navigation_hide');
	 //var nav_label=document.navigation.getElementsByTagName('span');

var nav_label = document.getElementsByTagName("span1");
var navigationDrawer=document.getElementById('navigation_drawer');
var i;
for (i = 0; i < nav_label.length; i++) {
    if(nav_label[i].style.display==''){
	 	nav_label[i].style.display='none';
	 	navigationDrawer.style.width='25%';

	 }else{
	 	nav_label[i].style.display='';

	 	navigationDrawer.style.width='100%';
	 }
}

	 
}



function loadData(){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("contentView").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "product.php", true);
  xhttp.send();
}


function displayProductName(){
	var product=document.getElementById('ProductDisplay');
	var name=document.getElementById('hide');
	name.style.display='block';
}

function closeProductName(){
	var name=document.getElementById('hide');
	name.style.display='none';

}


function hidePages(){
	var page=document.getElementById("pageList");
	if(page.style.display=="none"){
		page.style.display="";
	}else if(page.style.display==""){
		page.style.display="none";
	}
}
