loginForm = document.getElementById("login-form");
signupForm = document.getElementById("signup-form");

function toggleLoginFormVisibility() {
	if (loginForm.style.visibility == "visible") {
		loginForm.style.visibility = "hidden";
	} else {
		loginForm.style.visibility = "visible";
	}
}

function toggleSignupFormVisibility() {
	if (signupForm.style.visibility == "visible") {
		signupForm.style.visibility = "hidden";
	} else {
		signupForm.style.visibility = "visible";
	}
}