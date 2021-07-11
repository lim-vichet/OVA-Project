$(document).ready(function(){

    var slide = $('.slide');
    var i = 0;
    var num_slide = slide.length;
    slide.eq(i).show();
    //next slide
    $('.btn-next').click(function(){
        slide.eq(i).hide();
        i++;
        if (i>=num_slide) {
            i=0;
        }
        slide.eq(i).show();
    });
    //back slide
    $('.btn-back').click(function(){
        slide.eq(i).hide();
        if (i<=0) {
            i = num_slide;
        }
        i--;
        slide.eq(i).show();
    });

    //auto slide
    var myVar = setInterval(myTimer, 2500);
    function myTimer() {
        slide.eq(i).hide();
        if (i<=0) {
            i = num_slide;
        }
        i--;
        slide.eq(i).show();
    }
    function myStopFunction() {
        clearInterval(myVar);
    }
    // stop auto slide
    $('.slide-box').mouseover(function(){
        myStopFunction();
    });
    //redisplay auto slide
    $('.slide-box').mouseleave(function(){
        myVar = setInterval(myTimer, 2500);
    });

    //
    $('.btn-menu').click(function(){
        var pop = "<div class='popup'></div>";
        $('body').append(pop);
        $('.draw-bar').css({"left":"0"});
    });
    // close popup
    $('body').on('click','.popup',function(){
        var eThis = $(this);
        eThis.remove();
        $('.draw-bar').css({"left":"-250px"});
    });

    // back to top
    $('#btn-back-top').scroll(function(){
        if ($(this).scrollTop()>50) {
            $('#btn-back-top').fedeIn(4000);
        }
        else{
            $('#btn-back-top').fadeOut(4000);
        }
    });
    $("#btn-back-top").click(function(){
        $('html, body').animate({scrollTop: 0}, 500);
    });

    //video slide
    var new_slide = $('.new-slide');
    var n = 0;
    var new_num_slide = new_slide.length;
    // alert(new_num_slide);
    new_slide.eq(n).show();
    //next slide
    $('.new-btn-next').click(function() {
        new_slide.eq(n).hide();
        n++;
        if(n>= new_num_slide){
            n=0;
        }
        new_slide.eq(n).show();
    });

});