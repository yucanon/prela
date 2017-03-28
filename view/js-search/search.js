var flag;
var min_width = 768;	// 768px はmasonryを使用する(iPadではmasonry)
var showFlag = true;	// 無限スクロールのロードフラグ
var postpos = 0;		// 前回の無限スクロールした時の位置
var pageNum = 1;		// ページ番号
 
function widthCheck() {
	$('#loadText').html('<i class="fa fa-spinner fa-spin"></i>読み込み中...');

    if ( $('html').width() < min_width ) {
    		$('#nowloading').css({display: 'none'});
            $('#masonryContainer').css({opacity: '1'}).masonry('destroy');
            $('.masonryItem').css({width: '100%', marginLeft: '0px', opacity: '1.0'});
            flag = 0;
       
    } else {
     //masonry
     var width = $('#masonryContainer').width() / 3 ;

     $item = $('.masonryItem').css({width: width});
     var container = $('#masonryContainer');

	container.imagesLoaded( function(){
		//container.css({display: 'block'});
		container.animate({opacity: '1.0'}, 600);
		//$('#loadText').text("もっと読む");
		$('#nowloading').css({display: 'none'});
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
 
$(window).on('load resize orientationchange', function () {
    widthCheck();
});

var searchOption = '';

//検索時に実行される関数
	function search(_mode){
		//-----------------------------------------------
		// 全項目を削除した上でsearchLoadItem.phpを呼び出す
		//-----------------------------------------------

		//変数の初期化
		showFlag = true;
		postpos = 0;
		pageNum = 1;
		//削除
		$('#masonryContainer').empty();
		widthCheck();

		//GETメッセージの作成
		var option = '';

		//model or camera
		var searchMode = $('#job').attr('value');
		if(searchMode == ''){
			searchMode = 'model';
		}
		option += '?mode=' + searchMode;

		//キーワード
		if( _mode == 0){
			var searchKey = $('#keyword').val();
		}
		else {
			var searchKey = $('#ham_keyword').val();	
		}

		if(searchKey != ''){
			option += 	'&keyword=' + encodeURI(searchKey);
		}

		//給料
		var searchSalary = $('#salary').attr('value');
		if( searchSalary != -1){
			option += 	'&minSalary=' + searchSalary;

			if(searchSalary >= 0 && searchSalary < 15000){
				var myMaxSalary = -1;
				switch(parseInt(searchSalary)){
					case 0:
						myMaxSalary = 2999;
						break;
					case 3000:
						myMaxSalary = 4999;
						break;
					case 5000:
						myMaxSalary = 7999;
						break;
					case 8000:
						myMaxSalary = 9999;
						break;
					case 10000:
						myMaxSalary = 14999;
						break;
				}
				option += '&maxSalary=' + myMaxSalary;
			}
		}

		//地域
		/*
		var pref = $('#prefectureMenu input[type=checkbox]:checked').map(function(){
			return 'pref[]=' + $(this).val();
		}).get().join('&');

		if( pref != ''){
			option += '&' + pref;
		}

		*/
		areaValue = $('#searchFormArea').attr('value');
		if( areaValue != -1 ){
			areaOption = '&area=' + areaValue;
			option += areaOption;
		}
		//console.log(option);

		searchOption = option;
		
		//ロード
		showFlag = true;
		loadItems(option);

		$('#hamburger').css({display: 'none'});

		document.body.scrollTop = document.documentElement.scrollTop = 0;
	}

	function loadItems(_option){
		$.ajax({
              		 type: 'GET',
               		url: 'searchLoadItem.php' + _option,
               		dataType: 'html',
               		beforeSend: function(){
               	 		$('#loadText').html('<i class="fa fa-spinner fa-spin"></i>読み込み中...'); 
               	 		showFlag = false;
               		},
               		success: function(data){
     					 if (data != '') {
     					 	showFlag = false;

        					$container = $("#masonryContainer");
        					$container.imagesLoaded(function(){
          						var el = $(data);
          						el.css('display', 'none');
          						$container.append(el);
          						$container.imagesLoaded(function(){
          							
          							if ( $('html').width() >= min_width ) {
										var width = $('#masonryContainer').width() / 3 ;
									}
									else {
										var width = '100%';	
									}
     								$('.masonryItem').css('width', width);
     								
            						el.css('display', 'inline');
            						if ( $('html').width() >= min_width ) {
            							$container.masonry('appended', el, true);
            						}
            						$('#loadText').text("もっと読む");

            						setTimeout(function(){
            							showFlag = true;
            						}, 500);
         				 		});
        					});
      					} else {
       						 $('#loadText').text("もう画像はありません");
       						 showFlag = false;
     					 }
     					 pageNum++;
    				},
               		error:function() {
                	   console.debug('問題がありました。');
               		}
        		});
	}



$(function(){
 // 無限スクロール
 // 引き金となる要素を設定
    var $triggerNode = $("#loadText");
    
    // 画面スクロール毎に判定を行う
    $(window).scroll(function(){
    	//----------------------------
    	//無限スクロールの発火
    	//----------------------------
        // 引き金となる要素の位置を取得
        var triggerNodePosition = $triggerNode.offset().top - $(window).height(); 
        // 前回呼び出し時と位置が同じなら発動しない
        if( triggerNodePosition == postpos){
        	return;
        }   
        // 現在のスクロール位置が引き金要素の位置より下にあれば‥
        if ($(window).scrollTop() >= triggerNodePosition - 100) {
            // なんらかの命令を実行
            //console.debug("Do Something");
            if(showFlag == true){
            	//ロード
            	if(searchOption == ''){
            		loadItems('?p=' + pageNum);	
            	}
            	else {
            		loadItems(searchOption + '&p=' + pageNum);		
            	}
        	}

        	postpos = triggerNodePosition;
        }

        //----------------------------
        // TOPへボタンを表示
        //----------------------------
        // 最上部から現在位置までの距離を取得して、変数[now]に格納
		var now = $( window ).scrollTop() ;

		// 最上部から現在位置までの距離(now)が300px以上だったら
		if( now > 300 )
		{
			$( '#topIconLink' ).stop().animate({opacity: '0.7'}, 600) ;

				//$( '#topIconLink' ).stop().delay(10000).animate({opacity: '0.1'}, 600) ;
		}
		else
		{
			$( '#topIconLink' ).stop().animate({opacity: '0'}, 600) ;
		}
		//終了
    });

//無限スクロール終わり

//検索画面のインターフェイス
	$('.jobBtn').click(function(e){
		$(this).parent().children().removeClass('active');
		$(this).addClass('active');

		var obj =  $( '#' + $(this).attr('data-inputname') );

		obj.attr('value', $(this).attr('data-inputvalue') );
	});

	//地域選択
	$('#prefectureClose').click( function(){
		$('#prefectureMenu').css('display', 'none');
	});

	$('#areaMenu').children().click( function(){
		var data = $(this).children('a').data('area');
		$('#searchFormArea').attr('value', data );
		switch ( data ){
			case -1:
				$('#searchYourAreaText').text('全ての地域');
			break;
			case 0:
				$('#searchYourAreaText').text('北海道');
			break;
			case 1:
				$('#searchYourAreaText').text('東北');
			break;
			case 2:
				$('#searchYourAreaText').text('関東');
			break;
			case 3:
				$('#searchYourAreaText').text('東海');
			break;
			case 4:
				$('#searchYourAreaText').text('北陸');
			break;
			case 5:
				$('#searchYourAreaText').text('関西');
			break;
			case 6:
				$('#searchYourAreaText').text('中国');
			break;
			case 7:
				$('#searchYourAreaText').text('四国');
			break;
			case 8:
				$('#searchYourAreaText').text('九州');
			break;
			case 9:
				$('#searchYourAreaText').text('沖縄');
			break;
		}
	});

	$('#ham_areaMenu').children().click( function(){
		var data = $(this).children('a').data('area');
		$('#searchFormArea').attr('value', data );
		switch ( data ){
			case -1:
				$('#ham_searchYourAreaText').text('全ての地域');
			break;
			case 0:
				$('#ham_searchYourAreaText').text('北海道');
			break;
			case 1:
				$('#ham_searchYourAreaText').text('東北');
			break;
			case 2:
				$('#ham_searchYourAreaText').text('関東');
			break;
			case 3:
				$('#ham_searchYourAreaText').text('東海');
			break;
			case 4:
				$('#ham_searchYourAreaText').text('北陸');
			break;
			case 5:
				$('#ham_searchYourAreaText').text('関西');
			break;
			case 6:
				$('#ham_searchYourAreaText').text('中国');
			break;
			case 7:
				$('#ham_searchYourAreaText').text('四国');
			break;
			case 8:
				$('#ham_searchYourAreaText').text('九州');
			break;
			case 9:
				$('#ham_searchYourAreaText').text('沖縄');
			break;
		}
	});

	/*$('#prefectureMenu a').click(function() {
		$('#prefectureText').text( $(this).text() );

		var obj =  $( '#prefecture' );
		obj.attr('value', $(this).attr('data-prefecture') );

		//alert( obj.attr('value') );
	}); */

	//以上地域選択

	//給料選択
	$('#salaryMenu a').click(function() {
		$('#salaryText').text( $(this).text() );

		var obj =  $( '#salary' );
		obj.attr('value', $(this).attr('data-salary') );
	});

	$('#ham_salaryMenu a').click(function() {
		$('#ham_salaryText').text( $(this).text() );

		var obj =  $( '#salary' );
		obj.attr('value', $(this).attr('data-salary') );
	});

	//widthCheck();

	//TOPへボタン
	$('#topIconLink').css({opacity: '0'});	

	$('#topIconLink').click(function(){
		$( 'html,body' ).animate( {scrollTop:0} , 'slow' ) ;

		return false;
	});
});