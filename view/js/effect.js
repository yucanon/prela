$(function(){
  var setElm = $('#tool'),
  delayHeight = 200;

  setElm.css({display:'block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({left:'0',opacity:'1'},60);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({left:'-5px',opacity:'0'},60);
      }
    });
  });
});
$(function(){
  var setElm = $('#matching'),
  delayHeight = 200;

  setElm.css({display:'block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({top:'0',opacity:'1'},60);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({top:'-5px',opacity:'0'},60);
      }
    });
  });
});
$(function(){
  var setElm = $('#jobsearch'),
  delayHeight = 200;

  setElm.css({display:'block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({right:'0',opacity:'1'},60);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({right:'-5px',opacity:'0'},60);
      }
    });
  });
});
$(function(){
  var setElm = $('.skill-tool_mb'),
  delayHeight = 200;

  setElm.css({display:'block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({left:'0',opacity:'1'},60);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({left:'-2px',opacity:'0'},60);
      }
    });
  });
});
$(function(){
  var setElm = $('.skill-matching_mb'),
  delayHeight = 200;

  setElm.css({display:'block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({top:'0',opacity:'1'},60);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({top:'-2px',opacity:'0'},60);
      }
    });
  });
});
$(function(){
  var setElm = $('.skill-jobsearch_mb'),
  delayHeight = 200;

  setElm.css({display:'block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({right:'0',opacity:'1'},60);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({right:'-2px',opacity:'0'},60);
      }
    });
  });
});
$(function(){
  var setElm = $('.skill-tool'),
  delayHeight = 200;

  setElm.css({display:'table-cell',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({bottom:'0',opacity:'1'},50);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({bottom:'-25px',opacity:'0'},50);
      }
    });
  });
});
$(function(){
  var setElm = $('.skill-matching'),
  delayHeight = 200;

  setElm.css({display:'table-cell',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({bottom:'0',opacity:'1'},60);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({bottom:'-25px',opacity:'0'},60);
      }
    });
  });
});
$(function(){
  var setElm = $('.skill-jobsearch'),
  delayHeight = 200;

  setElm.css({display:'table-cell',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({bottom:'0',opacity:'1'},70);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({bottom:'-25px',opacity:'0'},70);
      }
    });
  });
});
$(function(){
  var setElm = $('.step-image'),
  delayHeight = 200;

  setElm.css({display:'inline-block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({left:'0',opacity:'1'},250);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({left:'-5px',opacity:'0'},250);
      }
    });
  });
});
$(function(){
  var setElm = $('#safety_1'),
  delayHeight = 200;

  setElm.css({display:'inline-block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({left:'0',opacity:'1'},250);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({left:'-5px',opacity:'0'},250);
      }
    });
  });
});
$(function(){
  var setElm = $('#safety_2'),
  delayHeight = 200;

  setElm.css({display:'inline-block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({right:'-20px',opacity:'1'},250);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({right:'-25px',opacity:'0'},250);
      }
    });
  });
});
$(function(){
  var setElm = $('#signup_pc_1'),
  delayHeight = 200;

  setElm.css({display:'inline-block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({top:'-10px',opacity:'1'},250);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({top:'-15px',opacity:'0'},250);
      }
    });
  });
});
$(function(){
  var setElm = $('#signup_pc_2'),
  delayHeight = 200;

  setElm.css({display:'inline-block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({right:'0',opacity:'1'},250);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({right:'-5px',opacity:'0'},250);
      }
    });
  });
});