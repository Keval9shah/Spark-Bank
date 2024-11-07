var supp = document.getElementsByClassName("sup")[0];
var linn = document.getElementsByClassName("lin")[0]
var pill = document.getElementsByClassName("pill")[0];
var name_fld = document.getElementsByClassName("name")[0];
var email_fld = document.getElementsByClassName("email")[0];
var pass = document.getElementsByClassName("anp")[0];

function sup() {
    pill.style.left = "4px";
    pill.style.width = "88px";
    linn.classList.remove("sel1");
    supp.classList.add("sel1");
    name_fld.style.display = "block";
    email_fld.style.marginLeft = "40px";
    pass.style.width = "240px";
    pass.placeholder = "Enter Password";
    document.getElementById("ane").style.width = "180px";
    document.getElementById("nm").required = true;
    // <img class="prop2" src="./assets/images/process-indicator-left-filled.svg" alt="">
    document.getElementsByClassName("prop2")[0].src = "./assets/images/process-indicator-left-filled.svg";
}

function lin() {
    linn.classList.add("sel1");
    supp.classList.remove("sel1");
    pill.style.left = "96px";
    pill.style.width = "76px";
    document.getElementById("nm").value = "";
    name_fld.style.display = "none";
    email_fld.style.marginLeft = "0";
    pass.style.width = "170px";
    pass.placeholder = "Password";
    document.getElementById("ane").style.width = "200px";
    document.getElementById("nm").required = false;
    document.getElementsByClassName("prop2")[0].src = "./assets/images/process-indicator-left-filled.svg";
}