var validation=(function(){
	

	function validatePassword(){
		if($('#password').val() != $('#confirm_password').val()) {
			$("#confirm_password").addClass("validation-wrong");
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity("");
			$("#confirm_password").removeClass("validation-wrong");
		}
	}
	
	return{
		init:function(){
			var password = document.getElementById("password");
			var confirm_password = document.getElementById("confirm_password");
			password.addEventListener("keyup", validatePassword);
			confirm_password.addEventListener("keyup", validatePassword);
		}
	}
})();