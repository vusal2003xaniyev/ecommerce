function ImageSetter(input,target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            target.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(".imgInp").change(function(){
    var imgDiv=$(this).data('id');
    imgDiv=$('#' + imgDiv);
    ImageSetter(this,imgDiv);
});
