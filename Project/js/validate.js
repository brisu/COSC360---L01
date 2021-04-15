  //check passwords

function isBlank(inputField)
{
    if (inputField.value=="")
    {
	     return true;
    }
    return false;
}

function makeRed(inputDiv){
	inputDiv.style.borderColor="#AA0000";
}

function makeClean(inputDiv){
	inputDiv.style.borderColor="#FFFFFF";
}

  function signUpPwdCheck(e) {
          var mainForm = document.getElementById("signup-form");
          let pwd = mainForm.pwd_signup.value;
          let pwd_check = mainForm.pwd_signupC.value;
          // this checks for correct email format
         // link used for reference
        // https://www.w3resource.com/javascript/form/email-validation.php
         var properEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

          if(isBlank($("#pwd-signup"))) {
              alert("Password can't be empty");
              makeRed(mainForm.password);
              return false;
          } else if (isBlank($("#pwd-signupC"))) {
              alert("Retype password in the field");
              makeRed(mainForm.password-check);
              return false;
          } else if (password !== password_check) {
              alert("\nPassword not a match, re-enter password again");
              makeRed(mainForm.password);
              makeRed(mainForm.pwd_check);
              return false;
          } else {
              alert("Password Match!");
              return true;
          }
  }

  window.onload = function()
{
    var mainForm = document.getElementById("signup-form");
    var requiredInputs = document.querySelectorAll(".required");

    mainForm.onsubmit = function(e)
    {
        var requiredInputs = document.querySelectorAll(".required");
       var err = false;

	     for (var i=0; i < requiredInputs.length; i++)
       {
	        if( isBlank(requiredInputs[i]))
          {
		          err |= true;
		          makeRed(requiredInputs[i]);
	        }
	        else
          {
		          makeClean(requiredInputs[i]);
	        }
	    }
      if (err == true)
      {
        e.preventDefault();
      }
      else
      {
        console.log('checking match');
          signUpPwdCheck(e);
      }
    }
}
