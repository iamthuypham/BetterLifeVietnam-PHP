function img_popup(elem){
	var obj = document.getElementById(elem);
	if(obj.style.display!='none'){
		obj.style.display='none';
	}
	else if(obj.style.display!='block'){
		obj.style.display='block';
	}
}