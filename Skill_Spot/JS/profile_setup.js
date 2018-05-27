/**
 * Created by zhenglu on 30/3/18.
 */
// function preview(input) {
//     var img = document.getElementById('preview');
//
//     if (input.files && input.files[0]) {
//
//
//         if(input.files[0].type.match('image.*')){
//             var reader = new FileReader();
//             reader.onload = function(evt){
//                 img.innerHTML = '<img src="' + evt.target.result + '" />';
//             }
//             reader.readAsDataURL(input.files[0]);
//             document.getElementById("set-prof-label").innerText = "";
//         } else{
//             document.getElementById("set-prof-label").innerText = "It's not a image";
//         }
//
//     }
// }

var croppicHeaderOptions = {
    cropUrl:'crop',
    customUploadButtonId:'cropContainerHeaderButton',
    modal:false,
    processInline:true

};
var croppic = new Croppic('croppic', croppicHeaderOptions);

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
        alert("Cant create that object !")
    else
        return xmlHttp;
}

var geocoder;
function initMap() {
    geocoder = new google.maps.Geocoder();
}

function get_coord(address) {
    console.log(address);
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            console.log(results[0].geometry.location.lat() + " " + results[0].geometry.location.lng());
            return [results[0].geometry.location.lat(), results[0].geometry.location.lng()];
        } else {
            alert('Invalid address!');
            return null;
        }
    });
}

function str2asc(mesg) {
    if (mesg == null) {
        return "";
    }
    var ascmesg = "";
    for(var i = 0; i < mesg.length; i++) {
        ascmesg += mesg.charCodeAt(i) + ",";
    }

    return ascmesg.substr(0, ascmesg.length-1);
}

function handleServerResponse(){
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            xmlResponse = xmlHttp.responseXML;
            console.log(xmlHttp.responseText);
            // xmlDocumentElement = xmlResponse.documentElement;
            // message = xmlDocumentElement.firstChild.data;
            message = xmlHttp.responseText;
            var data_raw = eval ("(" + message + ")");

            if (data_raw["response"] == "Success") {
                alert("OK");
            } else {
                alert(data_raw["error"]);
            }

        }else{
            alert('Someting went wrong !');
        }
    }
}

function upload(){


    geocoder.geocode({'address': document.getElementsByClassName('service-addr')[0].value}, function(results, status) {
        if (status === 'OK') {
            console.log(results[0].geometry.location.lat() + " " + results[0].geometry.location.lng());

            if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
                var name = str2asc(document.getElementById("first-name").value);
                var number = str2asc(document.getElementById("number").value);
                var summary = str2asc(get_content());


                var service = str2asc(document.getElementsByClassName('service-name')[0].value);

                var price = str2asc(document.getElementsByClassName('service-price')[0].value);
                var addr = str2asc(document.getElementsByClassName('service-addr')[0].value);

                var cate = document.getElementsByClassName('service-cate')[0];
                var cate_index = cate.selectedIndex;
                var cate_value = cate.options[cate_index].value;
                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();
                var getmessage = "collectinfo?name=" + name + "&number=" + number + "&summary=" + summary + "&cate=" +
                    cate_value + "&service=" + service + "&price=" + price + "&addr=" + addr + "&lat="+lat+"&lng="+lng;
                console.log(getmessage);
                xmlHttp.open("GET", getmessage,true);
                xmlHttp.onreadystatechange = handleServerResponse;
                xmlHttp.send(null);
            }

        } else {
            alert('Invalid address!');
            return;
        }
    });


}

