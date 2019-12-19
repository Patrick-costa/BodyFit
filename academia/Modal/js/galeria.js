$(function(){
    $('.thumbs img').click(function(){
        var thumb = $(this).attr('src');
        var cover = $('.cover img');

        if(cover.attr('src') !== thumb){
        cover.fadeTo("200", "0",function(){
            cover.attr('src',thumb);
            cover.fadeTo("150",1);
        });
    }
    });
});

$(function(){
    $('.thumbs img').click(function(){
        $('.thumbs img').removeClass('active');
        $(this).addClass('active');
    });
});

$(function(){
    $('.navbar-toggler').click(function(){
        $('#navbar').css({"height":"420px"});
        $('#navbar').css({"height":""});
    });
});