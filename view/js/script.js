////////////////////////////////////////
//　SCRIPT
////////////////////////////////////////
$(function(){
	var setImg = $('.switch'),
	namePc = '_pc',
	nameSp = '_sp',
	switchWidth = 640;

	setImg.each(function(){
		var selfImg = $(this);

		function switchImg(){
			if(window.innerWidth > switchWidth) {
				selfImg.attr('src', selfImg.attr('src').replace(nameSp, namePc));
			} else {
				selfImg.attr('src', selfImg.attr('src').replace(namePc, nameSp));
			}
		}

		$(window).on('load resize orientationchange', function(){
			switchImg();
			setTimeout(function(){
				setImg.css({visibility: 'visible'});
			},500);
		});
	});
});