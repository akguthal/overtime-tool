/*$(document).ready( function() {


    function readURL(input) {
        console.log(input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "saveImg.php", true);
            var formData = new FormData();
            formData.append("file", input.files[0]);
            xhr.send(formData);
            xhr.onload = function() {
                alert(xhr.responseText); //test the returned info from PHP.
                if (xhr.responseText != "") {

                }
                else {
                    alert("Your file failed to upload");
                }
            }
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result) .width(200)
                    .height(200);
            }


        }



    }

    $("input[id='img-upload']").click(function() {
        $("input[id='imgInp']").click();

        $("#imgInp").change(function () {
            console.log(this);
            readURL(this);
        });
    });

});*/

$(document).ready(function() {
    $("#save").click(saveImage);
     $("#img-upload").click(function() {
        $("#imgInp").click();
        $("#imgInp").change(preview);
     });
});


function saveImage() {
    let image = document.getElementById("imgInp").files[0];
    console.log(image);
    var reader = new FileReader();
    reader.readAsDataURL(image);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "saveImg.php", true);
    var formData = new FormData();
    formData.append("file", image);
    xhr.send(formData);
    xhr.onload = function() {
        alert(xhr.responseText); //test the returned info from PHP.
        if (xhr.responseText != "") {

        }
        else {
            alert("Your file failed to upload");
        }
    }
}

function preview() {
    let reader = new FileReader();

    reader.addEventListener("load", function () {
        $("#img-upload").attr("src", reader.result);
    }, false);

    reader.readAsDataURL(document.getElementById("imgInp").files[0]);
}



