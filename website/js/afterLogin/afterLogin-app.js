var afterLogin=(function(){

	function clickButton(){
		var status=this.getAttribute('data-status');
		if(status==="register"){
			this.innerHTML="Unregister";
			this.setAttribute('data-status','unregister');
		}
		else if(status==="unregister"){
			this.innerHTML="Register";
			this.setAttribute('data-status','register');	
		}
	}

	return{
		init:function(){
			var button=document.getElementById("register_for_lifi")
			button.addEventListener("click", clickButton);
		}
	}
})();