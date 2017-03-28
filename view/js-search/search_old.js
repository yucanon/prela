var flag;
var min_width = 540;
 
function widthCheck() {
    if ( $('html').width() < min_width ) {
        if ( flag ) {
            $('#masonryContainer').masonry('destroy');
            $('.masonryItem').css({width: '100%', marginLeft: '0px'});
            flag = 0;
        }
    } else {
     //masonry
     var width = $('#masonryContainer').width() / 3 ;

     $('.masonryItem').css('width', width);

	var container = $('#masonryContainer').css('opacity', '0');

	container.imagesLoaded( function(){
		container.animate({opacity: '1.0'}, 1000);
		container.masonry({
			itemSelector: '.masonryItem',
			isFitWidth: false,
			columnWidth: width,
			isAnimated: true,
			isResizable: false,
		});
	});
        flag = 1;
    }
}
 
$(window).resize(function () {
    widthCheck();
});



$(function(){

//メニューの変更
//$('.header-right a[href="./search.php"] span').text('ホーム');
//$('.header-right a[href="./search.php"] i').toggleClass('fa-search').toggleClass('fa-home');
//$('.header-right a[href="./search.php"]').attr('href', 'http://matchmo.jp')


 // 無限スクロール
 // 引き金となる要素を設定
    var triggerNode = $("#loadText");
    var showFlag = false;
    var pageNum = 1;
    // 画面スクロール毎に判定を行う
    $(window).scroll(function(){
        // 引き金となる要素の位置を取得
        var triggerNodePosition = $(triggerNode).offset().top - $(window).height();    
        // 現在のスクロール位置が引き金要素の位置より下にあれば‥
        if ($(window).scrollTop() > triggerNodePosition) {
            // なんらかの命令を実行
            //console.debug("Do Something");
            if(showFlag == false){
            	$.ajax({
              		 type: 'GET',
               		url: 'searchLoadItem.php?p=' + pageNum,
               		dataType: 'html',
               		beforeSend: function(){
               	 		$('#loadText').text("読み込み中..."); 
               	 		showFlag = true;
               		},
               		success: function(data){
     					 if (data != '') {
        					$container = $("#masonryContainer");
        					$container.imagesLoaded(function(){
          						var el = $(data);
          						el.css('display', 'none');
          						$container.append(el);
          						$container.imagesLoaded(function(){
								 var width = $('#masonryContainer').width() / 3 ;

     							$('.masonryItem').css('width', width);

            						el.css('display', 'inline');
            						$container.masonry('appended', el, true);
            						$('#loadText').text("もっと読む");
         				 		});
        					});
      					} else {
       						 $('#read-more').text("もう画像はありません");
     					 }
     					 pageNum++;
     					if( pageNum < 5){
     					 showFlag = false;
     					}
    				},
               		error:function() {
                	   console.debug('問題がありました。');
               		}
        		});
        	}
        }
    });

//無限スクロール終わり

	//画像ファイル指定

	/*$('.cardImage').each( function(){
		//画像ディレクトリ名
		var dir = 'images/';

		$(this).css('backgroundImage', 'url(\"' + dir + $(this).data('imagefile') + '.jpg\")');

		//alert('url(\"images/' + $(this).data('imagefile') + '.jpg\")');
	});*/

	//検索画面のインターフェイス
	$('.jobBtn').click(function(e){
		$(this).parent().children().removeClass('active');
		$(this).addClass('active');

		var obj =  $( '#' + $(this).attr('data-inputname') );

		obj.attr('value', $(this).attr('data-inputvalue') );

		//alert( obj.attr('value') );
	});

	//地域選択

	$('#areaMenu').children().click( function(){
		//alert( $(this).children('a').data('area') );
		switch ( $(this).children('a').data('area') ){
			case -1:
				$('#searchYourAreaText').text('全ての地域');
				//$('#prefectureText').text( '北海道' );
			break;
			case 0:
				$('#searchYourAreaText').text('北海道');
				//$('#prefectureText').text( '北海道' );
			break;
			case 1:
				$('#searchYourAreaText').text('東北');
				//$('#prefectureText').text( '青森県' );
			break;
			case 2:
				$('#searchYourAreaText').text('関東');
				//$('#prefectureText').text( '東京都' );
			break;
			case 3:
				$('#searchYourAreaText').text('東海');
				//$('#prefectureText').text( '愛知県' );
			break;
			case 4:
				$('#searchYourAreaText').text('北陸');
				//$('#prefectureText').text( '新潟県' );
			break;
			case 5:
				$('#searchYourAreaText').text('関西');
				//$('#prefectureText').text( '大阪府' );
			break;
			case 6:
				$('#searchYourAreaText').text('中国');
				//$('#prefectureText').text( '広島県' );
			break;
			case 7:
				$('#searchYourAreaText').text('四国');
				//$('#prefectureText').text( '香川県' );
			break;
			case 8:
				$('#searchYourAreaText').text('九州');
				//$('#prefectureText').text( '福岡県' );
			break;
		}

		//都道府県を表示
		$('#prefectureMenu').css('display', 'block');

		var min = $(this).children('a').data('area') * 10;
		//都道府県を初期設定に
		//var obj =  $( '#prefecture' );
		//obj.attr('value', min );

		$('#prefectureMenu a').each(function() {
			if( $(this).data('prefecture') >= min && $(this).data('prefecture') < (min+10)  ){
				$(this).css({display: 'block'});
			}
			else {
				if(min == -10){
					$(this).css({display: 'block'});
				}
				else {
					$(this).css({display: 'none'});
				}
			}
		});
	});

	$('#prefectureMenu a').click(function() {
		$('#prefectureText').text( $(this).text() );

		var obj =  $( '#prefecture' );
		obj.attr('value', $(this).attr('data-prefecture') );

		//alert( obj.attr('value') );
	});

	//以上地域選択

	$('#salaryMenu a').click(function() {
		$('#salaryText').text( $(this).text() );

		var obj =  $( '#salary' );
		obj.attr('value', $(this).attr('data-salary') );

		//alert( obj.attr('value') );
	});

	widthCheck();

	$('#masonryContainer').infinitescroll({
		navSelector  : '.navigation',
		nextSelector : '#loadText',
		itemSelector : '.masonryItem',
		loading: {
            finishedMsg: 'No more pages to load.',
            img: 'http://i.imgur.com/qkKy8.gif'
          }
	},
	function( newElements ) {
		var $newElems = $( newElements );
		$newElems.imagesLoaded(function(){
			$('#masonryContainer').masonry( 'appended', $newElems, true ); 
		});
	});
	
});