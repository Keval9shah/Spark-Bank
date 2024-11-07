const $ = (element) => document.querySelector(element);
const signupTab = $(".signup-tab");
const loginTab = $(".login-tab")
const passwordInput = $(".password-input");

function showSignupTab() {

    // move pill on the signup tab
    $(".pill").style.left = 4 + "px";
    $(".pill").style.width = signupTab.offsetWidth + "px";

    // change the current tab (dark color)
    loginTab.classList.remove("current-tab");
    signupTab.classList.add("current-tab");

    // change the input fields
    $(".name").style.display = "block";
    $("#name-input").required = true;
    $("#email-input").style.width = "180px";
    $("#password-input").style.width = "240px";
    $("#password-input").placeholder = "Enter Password";

    // move the process indicator to start
    $(".process-indicator").src = "./assets/images/process-indicator-left-filled.svg";
}

function showLoginTab() {

    // move pill on the login tab
    $(".pill").style.left = loginTab.offsetLeft - signupTab.offsetLeft + 2 + "px";
    $(".pill").style.width = loginTab.offsetWidth + "px";

    // change the current tab (dark color)
    loginTab.classList.add("current-tab");
    signupTab.classList.remove("current-tab");

    // change the input fields
    $(".name").style.display = "none";
    $("#name-input").value = "";
    $("#name-input").required = false;
    $("#email-input").style.width = "200px";
    $("#password-input").style.width = "170px";
    $("#password-input").placeholder = "Password";

    // move the process indicator to center
    $(".process-indicator").src = "./assets/images/process-indicator-center-filled.svg";
}