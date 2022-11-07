function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(input.files);
        reader.onload = function (e) {
            // $('#blah')
            //     .attr('src', e.target.result);
            img = document.getElementById('blah').setAttribute('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readArr(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(input.files);
        reader.onload = function (e) {
            // $('#blah')
            //     .attr('src', e.target.result);
            img = document.getElementById('imagedetail').setAttribute('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

