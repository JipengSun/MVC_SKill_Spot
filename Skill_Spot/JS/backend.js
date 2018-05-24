/**
 * Created by zhenglu on 9/5/18.
 */

function change_to_buyer() {
    if (document.getElementById("buy-page").style.display != "block") {
        document.getElementById("buy-page").style.display = "block";
        document.getElementById("sell-page").style.display = "none";
        document.getElementById("mail-page").style.display = "none";
    }
}

function change_to_sell() {
    if (document.getElementById("sell-page").style.display != "block") {
        document.getElementById("buy-page").style.display = "none";
        document.getElementById("sell-page").style.display = "block";
        document.getElementById("mail-page").style.display = "none";
    }
}

function change_to_mail() {
    if (document.getElementById("mail-page").style.display != "block") {
        document.getElementById("buy-page").style.display = "none";
        document.getElementById("sell-page").style.display = "none";
        document.getElementById("mail-page").style.display = "block";
    }
}

window.onclick = function(event) {
    if (event.target == document.getElementById('mail-out-box')) {
        document.getElementById('mail-out-box').style.display = "none";
    }
};


function show_content() {
    var mail = document.getElementById('mail-out-box');
    mail.style.display = "block";

// When the user clicks anywhere outside of the modal, close it

}

function close_mail_content() {
    var mail = document.getElementById('mail-out-box');
    mail.style.display = "none";
}

var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
    var xmlHttp;

    if(window.ActiveXObject){
        try{
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlHttp = false;
        }
    }else{
        try{
            xmlHttp = new XMLHttpRequest();
        }catch(e){
            xmlHttp = false;
        }
    }

    if(!xmlHttp)
        alert("Cant create that object !");
    else
        return xmlHttp;
}

function load_mail() {
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
        xmlHttp.open("GET", "backend",true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
        console.log("ddsdsfsf");
    }else{
        setTimeout('process()',10000);
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            xmlResponse = xmlHttp.responseXML;
            // console.log(xmlHttp.responseText);
            xmlDocumentElement = xmlResponse.documentElement;
            message = xmlDocumentElement.firstChild.data;
            var data_raw = eval ("(" + message + ")");
            console.log(data_raw);
            refresh_mail(data_raw);


        }else{
            alert('Someting went wrong !');
        }
    }
}

function refresh_mail(data) {
    var table = document.getElementById("mail-table"),
        rows = table.getElementsByTagName("tr");

    for(var i = rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }

    var count = 0

    for (row_data in data) {

        var row = table.insertRow();
        row.insertCell(0).innerHTML = data[row_data]["from"];
        row.insertCell(1).innerHTML = "<a id = \"" + count + "\" onclick='show_content()'>" + data[row_data]["subject"] + "</a>";
        row.insertCell(2).innerHTML = data[row_data]["date"];

        count += 1;
    }

}

function confirm(){
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
        xmlHttp.open("GET", "backend",true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
        console.log("ddsdsfsf");
    }else{
        setTimeout('process()',10000);
    }
}








