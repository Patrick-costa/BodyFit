$(function(){
    var width = (parseInt($('.carrousel .item').outerWidth() + parseInt($('.carrousel .item').css('margin-right')))) * $('.carrousel .item').length ;


    var numImages = 3;
    var marginPadding = 80;
    
    var ident = 0;
    var count = ($('.carrousel .item').length / numImages) -1;
    var slide = (numImages * marginPadding) + ($('.carrousel img').outerWidth() * numImages);

    $('.pforth').click(function(){
        if(ident < count){
            ident++;
            $('.carrousel').animate({'margin-left': '-=' + slide + 'px'}, '500');
            
        }
    });

    $('.pback').click(function(){
        if(ident >= 1 ){
            ident--;
            $('.carrousel').animate({'margin-left': '+=' + slide + 'px'}, '500');
        }
    });

    
});

$(function(){
    $('.pforth').click(function(){
        $('.pback').removeClass('ativo');
        $('.pforth').removeClass('ativo');
        $(this).addClass('ativo');
    });
});

$(function(){
    $('.pback').click(function(){
        $('.pforth').removeClass('ativo');
        $('.pback').removeClass('ativo');
        $(this).addClass('ativo');
    });
});