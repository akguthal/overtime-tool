

$(document).ready( function() {


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result) .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("input[id='img-upload']").click(function() {
        $("input[id='imgInp']").click();

        $("#imgInp").change(function () {
            readURL(this);
        });
    });

});
