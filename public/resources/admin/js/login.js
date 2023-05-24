var rmCheck = document.getElementById("rememberMe");
var   emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  
  rmCheck.checked =true;
  emailInput.value = localStorage.username;
} else {

  rmCheck.checked = false;
  emailInput.value = "";
}

function lsRememberMe() {
 
  if (rmCheck.checked == true && emailInput.value !== "") {
   
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}

