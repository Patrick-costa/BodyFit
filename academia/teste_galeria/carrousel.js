$(function(){
    var width = parseInt($('.carrousel .item').outerWidth() + parseInt($('.carrousel .item').css('margin-right')))* $('.carrousel .item').lenght ;
    $('.carrousel').css('width',width);

    var numImages = 3;
    var marginPadding = 30;
    
    var ident = 0;
    var count = ($('.carrousel .item').lenght / numImages) -1;
    var slide = (numImages * marginPadding) + ($('.carrousel img').outerWidth() * numImages);

    $('.forth').click(function(){

            ident++;
            $('.carrousel').animate({'margin-left': '-=' + slide + 'px'}, '500');
            
        
    });

    $('.back').click(function(){
        if(ident >= 1 ){
            ident++;
            $('.carrousel').animate({'margin-left': '+=' + slide + 'px'}, '500');
        }
    });
});