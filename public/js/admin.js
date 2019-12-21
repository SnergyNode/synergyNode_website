function shwimg(){
    // get the image to show selected image
    var i = document.getElementById('imgInp');

    //
    var filetoload = $("#imgInp")[0];

    // initiate the file reader object
    var reader = new FileReader();
    // read the contents of image file
    reader.readAsDataURL(filetoload.files[0]);
    reader.onload = function(e){
        // set the image source
        let srcs = e.target.result;

        jQuery('#imgtoshow').attr('src', srcs);

        // try to add result to another input
        // jQuery('#imgurl').val(e.target.result);
    }
    // another way to get the source of a file
    //=======================================//
    //display selected image into the image tag
    //document.getElementById('thepicture').src = window.URL.createObjectURL(i.files[0]);
}

// Works everywhere
$(document).ready(function () {
    //sidebar javascript START
    $('#dismiss, .overlay').on('click', function () {
        // hide sidebar
        $('#sidebar').removeClass('active');
        $('#dismiss').css('display','none');
        // hide overlay
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        // open sidebar
        $('#sidebar').addClass('active');
        $('#dismiss').css('display','block');
        // fade in the overlay
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    //sidebar javascript END

    //graduate students start
    $('.graduate_s').on('click', function (e) {
        let students = $('.clas_stud');
        console.log(students.length);
    });

    //promote students start
    $('.promote_s').on('click', function (e) {
        let students = $("input[type='checkbox']:checked");
        let obj = [];
        $.each(students, function (a, b) {
            console.log($(b).val());
            obj.push({'student_id':$(b).val()});
        });
        console.log(students.length + ' student(s) selected');
        console.log(obj);

        // send

    });


});