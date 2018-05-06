/**
 * Created by zhenglu on 30/3/18.
 */

function preview(input) {
    var img = document.getElementById('preview');

    if (input.files && input.files[0]) {


        if(input.files[0].type.match('image.*')){
            var reader = new FileReader();
            reader.onload = function(evt){
                img.innerHTML = '<img src="' + evt.target.result + '" />';
            }
            reader.readAsDataURL(input.files[0]);
            document.getElementById("set-prof-label").innerText = "";
        } else{
            document.getElementById("set-prof-label").innerText = "It's not a image";
        }

    }
}

function setbackimage(input) {
    var img = document.getElementById('whole');
    if (input.files && input.files[0]) {
        if(input.files[0].type.match('image.*')){
            var reader = new FileReader();
            reader.onload = function(evt){

                img.style.backgroundImage = "url(" + evt.target.result + ")";
            }
            reader.readAsDataURL(input.files[0]);
            document.getElementById("set-back-label").innerText = "";
        }else {
            document.getElementById("set-back-label").innerText = "It's not a image";
        }

    }
}