$(function(){
	$('#pictures_v').slick({
  		dots: true,
  		infinite: false,
  		speed: 300,
  		centerMode: false,
  		centerPadding: '20px',
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		adaptiveHeight: true,
  		responsive: [
    		{
      			breakpoint: 1024,
      			settings: {
        			slidesToShow: 3,
        			slidesToScroll: 1,
        			infinite: true,
        			dots: true
      			}
    		},
    		{
      			breakpoint: 768,
      			settings: {
        			slidesToShow: 2,
        			slidesToScroll: 1
      			}
    		},
    		{
      			breakpoint: 480,
      			settings: {
        			slidesToShow: 1,
        			slidesToScroll: 1
      			}
    		}
       		// You can unslick at a given breakpoint now by adding:
    		// settings: "unslick"
    		// instead of a settings object
  		]
  	});
  	$('#pictures_h').slick({
  		dots: true,
  		infinite: false,
  		speed: 300,
  		centerMode: false,
  		centerPadding: '20px',
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		adaptiveHeight: true,
  		responsive: [
    		{
      			breakpoint: 1024,
      			settings: {
        			slidesToShow: 3,
        			slidesToScroll: 1,
        			infinite: true,
        			dots: true
      			}
    		},
    		{
      			breakpoint: 768,
      			settings: {
        			slidesToShow: 2,
        			slidesToScroll: 1
      			}
    		},
    		{
      			breakpoint: 480,
      			settings: {
        			slidesToShow: 1,
        			slidesToScroll: 1
      			}
    		}
       		// You can unslick at a given breakpoint now by adding:
    		// settings: "unslick"
    		// instead of a settings object
  		]
  	});

  	// slick finished

  	// imageClipper Accordion
  	/*
  	flagAccordionArrowRotate = false;
  	flagAccordion2ArrowRotate = false;
	$('#imageClipCircle').velocity({rotateZ: '0deg'}, 0, 'ease-in-out');
  	toggleClipper = function(_option, _number){
  		var option = -1;
  		if(_option === undefined){
  			option = 0;
  		}
  		else {
  			if(_option == 'open'){
  				option = 1;
  			}
  			if(_option == 'close'){
  				option = 2;
  			}
  		}
  		if(option < 1){
  			$('#imageClipContent').slideToggle();
  		}
  		else if(option == 1){
  			$('#imageClipContent').slideDown();		
  		}
  		else {
  			$('#imageClipContent').slideUp();
  		}
  		if(!flagAccordionArrowRotate || option == 1){
  			deg = 90;
  			flagAccordionArrowRotate = true;
  			$('#imageClipCircle').velocity({rotateZ: deg+'deg'}, 500, 'ease-out');
  		}
  		else {
  			deg = 0;
  			flagAccordionArrowRotate = false;
  			$('#imageClipCircle').velocity({rotateZ: deg+'deg'}, 500, 'ease-out');
  		}
  		
  	}
  	//初期状態で隠す
  	$('#imageClipContent').slideToggle();
  	// end toggleClipper
  	*/

  	// accordion
	$('.accordionTitle').click(function(){
		var time = 500;

		$content = $(this).parent().children('.accordionContent');
		$content.slideToggle(time);
		$(this).children('.accordionArrowIcon').toggleClass('accordionArrowIconOpen');
	});

	$('.accordion').each(function(){
		$(this).children('.accordionContent').slideUp(0);
	});

	openAccordion = function(_id){
		var time = 500;
		$elem = $(_id);
		$elem.children('.accordionContent').slideDown(time);
		$elem.children('.accordionTitle').children('.accordionArrowIcon').addClass('accordionArrowIconOpen');
	};

  	// uploader object 
  	function myImage(_id, _btnid, _clipper, _number, _aspectRatio){
  		/*
			_id: スライドのid
			_btnid: 送信ボタンのid
			_clipper: Jcropを設定するオブジェクトのid
			_number: ファイル名に指定する番号 1-10
			_aspectRatio: 横/縦で指定する少数 
					ex:) 9.0 / 16.0 で縦の画像になる

  		*/
  		this.reader = new FileReader();
  		this.id = _id;
  		this.elem = $(_id);
  		this.fileInput = $(_id + '_file');
  		this.clipper = $(_clipper); //$('#imageClipper');
  		this.btnId = _btnid;
  		this.btn = $(this.btnId);
  		this.number = _number;
  		this.aspectRatio = _aspectRatio;
  		this.imageAvailable = false;
  		this.src = '';
  		this.scaleRatio = 1;
  		this.x = 0;
  		this.y = 0;
  		this.w = 0;
  		this.h = 0;
  		this.checked = false;

  		this.setImageClipper = function(_src){
  			JcropAPI = this.clipper.data('Jcrop');
			// Jcropがロードされていれば一旦destroy
			if(typeof JcropAPI !== "undefined"){
				JcropAPI.destroy();
			}

			var img = new Image();
			img.src = _src;
			var img_w = img.width;
			var img_h = img.height;
			var clipper_h = parseInt( $(window).height() * 0.7);
			this.scaleRatio = ( clipper_h / img_h);
			var width = parseInt(img_w * this.scaleRatio);

			//this.clipper.css("background-image", "url('" + _src + "')");
			this.clipper.attr('width', width + 'px');
			this.clipper.attr('height', clipper_h + 'px');	
			this.clipper.attr("src", _src);	
			//this.elem.children('div').css("background-image", "url('" + _src + "')");	
			this.elem.children('div').children('img').attr('src', _src);
			//this.clipper.velocity({width: width}, 500, 'ease-in-out');

			//Jcropをロード
			this.clipper.Jcrop({
   				aspectRatio: this.aspectRatio, 
   				onSelect: this.clipSelect,
   				onChange: this.clipSelect
   			});
			
			this.btn.unbind('click');

			$(document).ajaxError(function(event, request, settings){
               alert("指定したファイル「"+settings.url+"」は存在しません");
            });

			this.btn.click(function(){
				/*if( this.checkCoords() ){
					var fd = new FormData();

					if(this.w != 0){
						fd.append('x', parseInt(this.x / this.scaleRatio ).toString() );
						fd.append('y', parseInt(this.y / this.scaleRatio ).toString() );
						fd.append('w', parseInt(this.w / this.scaleRatio ).toString() );
						fd.append('h', parseInt(this.h / this.scaleRatio ).toString() );
					}

					fd.append('number', this.number);
					fd.append('file', this.reader.result);
          

					//alert(this.reader.result);

					var postData = {
						type: 'POST',
						dataType: 'text',
						data: fd,
						processData: false,
						contentType: false
					};
					$.ajax('./imageUploader.php', postData).done(function(text){
						//console.log(text);	
						this.elem.children('div').children('img').attr('src', text);
					}.bind(this));
				} */
			}.bind(this) );
			
  		}.bind(this);

  		this.reader.addEventListener('load', function(e) {

  				// image clipper を設定
  				this.setImageClipper(this.reader.result);	
  				this.imageAvailable = true;
  				this.src = this.reader.result;

					// imageclipper を開く
					//現在は開かない仕様

					if(this.number < 6){
						//openAccordion('#clipArea');
					} else {
						//openAccordion('#clipArea2');
					}

          // upload image
        if( this.checkCoords() ){
          var fd = new FormData();

          if(this.w != 0){
            fd.append('x', parseInt(this.x / this.scaleRatio ).toString() );
            fd.append('y', parseInt(this.y / this.scaleRatio ).toString() );
            fd.append('w', parseInt(this.w / this.scaleRatio ).toString() );
            fd.append('h', parseInt(this.h / this.scaleRatio ).toString() );
          }

          fd.append('number', this.number);
          fd.append('file', this.reader.result);
          

          //alert(this.reader.result);

          var postData = {
            type: 'POST',
            dataType: 'text',
            data: fd,
            processData: false,
            contentType: false
          };
          $.ajax('./imageUploader.php', postData).done(function(text){
            //console.log(text);  
            this.elem.children('div').children('img').attr('src', text);
          }.bind(this));
        }
		}.bind(this));

		this.elem.find('img').click(function(){
			/*if(this.imageAvailable){
				this.setImageClipper(this.src);
			}*/
			//ファイル選択画面を表示する
			this.fileInput.get(0).click();
			return false;
		}.bind(this) );

		//画像選択終了時のイベント
		this.fileInput.change(function(){
			var file = this.fileInput.prop('files')[0];
			if(file.type.match('image.*')){
				this.reader.readAsDataURL(file);
			}
		}.bind(this));

		this.clipSelect = function(c){
			this.x = c.x;
    		this.y = c.y;
    		this.w = c.w;
    		this.h = c.h;
		}.bind(this);

			
  		this.elem.on("drop",function(e){
				e.preventDefault();
				var file = e.originalEvent.dataTransfer.files[0];
				
				if(file.type.match('image.*')){
					this.reader.readAsDataURL(file);
				}
				//return false;
		}.bind(this) );

		this.elem.on("dragover",function(e){
				e.preventDefault();
		});

		//formの入力値チェック
		this.checkCoords = function(){
				//x = $('#imageX').val();

    			//if (parseInt($('#imageW').val())) return true;
    			//return false;

    			if( this.w == 0 || this.h == 0){
    				//return false;
    			}

    			return true;
			};

		// checkbox を設定
		$('.checkSearchImages').each(function(){
      $(this).change(function(){
        //全チェックを除去
        $('.checkSearchImages').each(function(){
          $(this).prop('checked', false);
        });
        $elem = $(this);
        if($elem.prop('checked') == false ){
          $elem.prop('checked', true);

          //送信
          var fd = new FormData();

          fd.append('checked', '' + $elem.prop('checked') );

          var number = ( $elem.attr('id').split('_') )[1];

          fd.append('number', number);

          var postData = {
            type: 'POST',
            dataType: 'text',
            data: fd,
            processData: false,
            contentType: false
          };
          $.ajax('./imageUploader.php', postData).done(function(text){
            console.log(text);  
          });
        }
        
      }.bind(this));
    });


  }
  	
  	imagev1 = new myImage('#picture_v1', '#sendBtn', '#imageClipper',  1, 10.0/15.0);
  	imagev2 = new myImage('#picture_v2', '#sendBtn', '#imageClipper', 2, 10.0/15.0);
  	imagev3 = new myImage('#picture_v3', '#sendBtn', '#imageClipper', 3, 10.0/15.0);
  	imagev4 = new myImage('#picture_v4', '#sendBtn', '#imageClipper', 4, 10.0/15.0);
  	imagev5 = new myImage('#picture_v5', '#sendBtn', '#imageClipper', 5, 10.0/15.0);

  	imageh1 = new myImage('#picture_h1', '#sendBtn2', '#imageClipper2',  6, 15.0/10.0);
  	imageh2 = new myImage('#picture_h2', '#sendBtn2', '#imageClipper2',  7, 15.0/10.0);
  	imageh3 = new myImage('#picture_h3', '#sendBtn2', '#imageClipper2',  8, 15.0/10.0);
  	imageh4 = new myImage('#picture_h4', '#sendBtn2', '#imageClipper2',  9, 15.0/10.0);
  	imageh5 = new myImage('#picture_h5', '#sendBtn2', '#imageClipper2',  10, 15.0/10.0);

  	// modal window
	/*$('a[rel*=leanModal]').leanModal({
        top: 150,                     // モーダルウィンドウの縦位置を指定
        overlay : 0.5               // 背面の透明度 
        //,closeButton: ".modal_close"  // 閉じるボタンのCSS classを指定 
    });*/
    //$( 'a[rel*=leanModal]').leanModal();
});