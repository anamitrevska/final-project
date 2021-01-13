function defaultBtnActive(){
    document.querySelector("#addProfilePicture").click();
}

function previewPicture(event){

    var reader = new FileReader();
    var imageField = document.querySelector("#profileImage");
    reader.onload=function(){
        if(reader.readyState==2){
            imageField.src=reader.result;
        }
    }
    reader.readAsDataURL(event.target.files[0]);

}