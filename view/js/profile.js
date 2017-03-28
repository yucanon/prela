////////////////////////////////////////
//　SCRIPT
////////////////////////////////////////
$(function() {
	$('.switch').each(function(){
	    $(this).hover(
	    	function(){
	          var photo_name_path = $(this).attr('src').split('/').pop();
	          var photo_name = photo_name_path.split('_').shift();      
	          this.$item_to = $(".profile_photo")
	          this.$item_to.attr('src',"./view/images/" + photo_name +"_bg.jpg");
	    	},
	    	function(){

	    	}
	    );
	});
});