  function foc(){
    document.loginform.username.focus();
  }
  function check(loginform){
	if ( document.loginform.username.value == '' ){
		alert('Please enter your username');
		document.loginform.username.focus();
                return false;
	}
	else if ( document.loginform.password.value == '' ){
		alert('Please enter your password');
		document.loginform.password.focus();
                return false;
	}
        else {
                return true;
        }
  }
  function AnnMsg(AnnForm){
	var inputstr=document.AnnForm;
	if(inputstr.activedisp.checked){
		inputstr.AnnMessage.disabled=false;
		inputstr.AnnMessage.style.backgroundColor='#fff';
	}
	else{
		inputstr.AnnMessage.disabled=true;
		inputstr.AnnMessage.style.backgroundColor='#e6e6e6';
	}
  }