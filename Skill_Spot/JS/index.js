/**
 * Created by zhenglu on 28/3/18.
 */
function openLogin() {
    document.getElementById("login-window").style.display="block";
    document.getElementById("black").style.display="block";
}

function closeLogin() {
    document.getElementById("login-window").style.display="none";
    document.getElementById("black").style.display="none";
}

function openSignup() {
    document.getElementById("signup-window").style.display="block";
    document.getElementById("black").style.display="block";
}

function closeSignup() {
    document.getElementById("signup-window").style.display="none";
    document.getElementById("black").style.display="none";
}

function getStart() {
    document.getElementById("main-body-text").style.display = "none";
    document.getElementById("search-line").style.display = "block";
}

function subLogin() {
    var email =document.getElementById("login-E").value;
    var ss = /\w@\w*\.\w/;
    //xxx @ xxx . xxx
    //\w* 0-n chars
    switch (1) {
        case 1:
            if(ss.test(email)){
                document.getElementById('login-win-e-label').innerText="";
            }else {
                document.getElementById('login-win-e-label').innerText="invalidate E-mail address";
                break;
            }

        case 2:
            document.getElementById("login-window").style.display="none";
            document.getElementById("black").style.display="none";
            document.getElementById("account-before-login").style.display="none";
            document.getElementById("account-after-login").style.display="block";

            document.getElementById('id-after-login').innerText="lvzheng";
    }

}

function subSignup() {
    var email =document.getElementById("signup-E").value;
    var ps1 = document.getElementById("signup-pw").value;
    var ps2 = document.getElementById("signup-repw").value;
    var ss = /\w@\w*\.\w/;
    //xxx @ xxx . xxx
    //\w* 0-n chars
    console.log("abc")
    if(ss.test(email)){
        document.getElementById('signup-win-e-label').innerText="";
    }else {
        document.getElementById('signup-win-e-label').innerText="invalidate E-mail address";
    }

    if(ps1 == ps2) {
        document.getElementById('signup-win-p-label').innerText="";
    } else{
        document.getElementById('signup-win-p-label').innerText="twice password are not same";
    }
}

function logout() {
     document.getElementById("account-before-login").style.display="block";
     document.getElementById("account-after-login").style.display="none";
}

