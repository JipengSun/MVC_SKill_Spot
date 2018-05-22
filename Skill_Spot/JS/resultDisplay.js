/**
 * Created by zhenglu on 30/3/18.
 */

var myLatLng
//     = [
//         {"lat":-27.498625, "lng":153.015951, "n":"Mr Fuck", "s":"I sale assignmentddddddddddddddddddddddddddddddddddddddddddddddddddddddddd", "l": "3"},//n:name; s:summary; l:level
//         {"lat":-27.498812, "lng":153.015690, "n":"Lv", "s":"I sale bike", "l": "1"},
//         {"lat":-27.499003, "lng":153.015576, "n":"jjk", "s":"I sale game", "l": "4"},
//         {"lat":-27.499349, "lng":153.015544, "n":"ss", "s":"I sale sss", "l": "5"},
//         {"lat":-27.497831, "lng":153.017952, "n":"he", "s":"I sale dd", "l": "3"},
//         {"lat":-27.493115, "lng":153.010433, "n":"pp", "s":"I sale assignment", "l": "2"},
//         {"lat":-27.493372, "lng":153.012874, "n":"sk", "s":"I sale ee", "l": "5"},
//         {"lat":-27.493449, "lng":153.014144, "n":"gfg", "s":"I sale hhh", "l": "6"},
//         {"lat":-27.494145, "lng":153.013574, "n":"fghf", "s":"I sale bbv", "l": "1"},
//         {"lat":-27.493750, "lng":153.015088, "n":"trhbh", "s":"I sale ewwe", "l": "0"}
// ];



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

function initMap() {
    map = new google.maps.Map(document.getElementById('displayer-map'), {
        zoom: 13,center: new google.maps.LatLng(-27.498625, 153.015951),
        mapTypeId: google.maps.MapTypeId.SATELLITE
    });
}


function process(){
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
        var cate = document.getElementById('filter-cate');
        var cate_index = cate.selectedIndex;
        var cate_value = cate.options[cate_index].value;

        var distance = document.getElementById("filter-location").value;
        var price_min = document.getElementById("filter-price-min").value;
        var price_max = document.getElementById("filter-price-max").value;

        var level = document.getElementById('filter-start');
        var level_index = level.selectedIndex;
        var level_value = level.options[level_index].value;

        var keyword = document.getElementById("keywords").value;
        var location = document.getElementById("location").value;

        // console.log(select_value + " " + price_min + " " + level_value);

        var phpmessage = "resultDisplay.php?keyword="+keyword+"&location="+location + "&cate=" +
            cate_value + "&distance="+distance+"&min="+price_min+"&max="+price_max +
                "&level=" +level_value;

        console.log(phpmessage);
        xmlHttp.open("GET", phpmessage,true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
    }else{
        setTimeout('process()',1000);//cekaj 1s pa probaj opet
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            xmlResponse = xmlHttp.responseXML;
            xmlDocumentElement = xmlResponse.documentElement;
            message = xmlDocumentElement.firstChild.data;
            var data_raw = eval ("(" + message + ")");
            console.log(data_raw);
            myLatLng = data_raw;
            create_map();

        }else{
            alert('Someting went wrong !');
        }
    }
}

function createDiv(provider_info) {
    var parent = document.getElementById("displayer-shop-list");
    var sudiv = document.createElement("div");

    sudiv.style.width = "290px";
    sudiv.style.height = "50px";
    sudiv.style.backgroundColor = "#aadffd";
    sudiv.style.margin = "5px auto";
    sudiv.style.fontSize = "13px";


    var ndiv = document.createElement("div");
    ndiv.style.width = "200px";
    ndiv.style.height = "15px";
    // ndiv.style.backgroundColor = "green";
    ndiv.style.float = "left";
    ndiv.innerHTML = "Name: " + provider_info["n"];

    var level_div = document.createElement("div");
    level_div.style.width = "50px";
    level_div.style.height = "15px";
    // level_div.style.backgroundColor = "yellow";
    level_div.style.float = "right";
    level_div.innerHTML = "level: " + provider_info["l"];

    var summary_div = document.createElement("div");
    summary_div.style.width = "290px";
    summary_div.style.height = "35px";
    // summary_div.style.backgroundColor = "red";
    summary_div.style.overflow = "hidden";
    summary_div.style.textOverflow = "ellipsis";
    summary_div.innerHTML = provider_info["s"];

    var container = document.createElement("div");
    container.style.overflow = "auto";

    container.appendChild(ndiv);
    container.appendChild(level_div);

    sudiv.appendChild(container);
    sudiv.appendChild(summary_div);
    parent.appendChild(sudiv);

}

function create_map() {
    map = new google.maps.Map(document.getElementById('displayer-map'), {
        zoom: 13,center: new google.maps.LatLng(myLatLng[0]["lat"], myLatLng[0]["lng"]),
        mapTypeId: google.maps.MapTypeId.SATELLITE
    });
    var infowindow = new google.maps.InfoWindow();
    var i;
    for (i = 0; i < myLatLng.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(myLatLng[i]["lat"], myLatLng[i]["lng"]),
            map: map

        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(myLatLng[i]["s"]);
                infowindow.open(map, marker);
            };
        })(marker, i));

        createDiv(myLatLng[i]);
    }


}



