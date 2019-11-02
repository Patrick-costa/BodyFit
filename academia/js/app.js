var $target = $('.menu'),
	animationClass = 'menu-anime';
	offset = $(window).height() * 3/4;

	function animeScroll(){
		var documentTop = $(document).scrollTop();
		
		$target.each(function(){
			var itemTop = $(this).offset().top;
			if(documentTop = itemTop){
				$(this).addClass(animationClass);
			} else{
				$(this).removeClass(animationClass);
			}
		})
	}

	animeScroll();

	$(document).scroll(function(){
		animeScroll();
	})

	