$(function(){
  $('#headerSearchIcon').click( function(e){
       /*$('#hamburger').animate({zIndex:1},{
          duration:600,
          step:function(now){
            pos = (-200*(1-now));
        $('#hamburger').css({transform: 'translateY(' + pos + ')'});
        },
        complete:function(){
              //
              $('#hamburger').css({zIndex: 0});
        }
      });*/
      e.preventDefault();
      e.stopPropagation();
      var $hamburger = $('#hamburger');

      if( $hamburger.css('display') == 'none' ){
        $hamburger.css({display: 'block'});
      }
      else {
        $hamburger.css({display: 'none'});
      }

      //メニューのアニメーションを除去
    $('#headerSearchBtn').removeClass('boundAnimation');

    return false;  

  });
});

function closeHamburger(){
	/* $('#hamburger').animate({zIndex:1},{
          duration:600,
          step:function(now){
          	pos = (-200*(now));
		    $('#hamburger').css('transform', 'translateY(' + pos + ')');
	      },
	      complete:function(){
	            //
	            $('#hamburger').css({zIndex: 0});
	      }
      });*/

      $('#hamburger').css({display: 'none'});

      return false;
}