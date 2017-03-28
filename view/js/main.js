$(function () {
    /*
     * ギャラリー
     */
    $('#gallery').each(function () {

        var index,
            $container = $(this),
            $loadMoreButton = $('.load-more'), // 追加ボタン
            addItemCount = 5,                    // 一度に表示するアイテム数
            addedd = 0,                        // 表示済みのアイテム数
            allData = [],                      // すべての JSON データ
            filteredData = [];                 // フィルタリングされた JSON データ

        // JSON を取得し、initGallery 関数を実行
        $.getJSON('./view/data/contents.json', initGallery);

        // ギャラリーを初期化する
        function initGallery (data) {

            // 取得した JSON データを格納
            allData = data;
            //console.log(allData);
            // 最初の状態ではフィルタリングせず、そのまま全データを渡す
            filteredData = allData;

            // 最初のアイテムを表示
            addItems();

            // 追加ボタンがクリックされたら追加で表示
            $loadMoreButton.on('click', addItems);

            // フィルターのラジオボタンが変更されたらフィルタリングを実行
            //$filter.on('change', 'input[type="radio"]', filterItems);

            // 06-04 に追加
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // アイテムのリンクにホバーエフェクト処理を登録
            //$container.on('mouseenter mouseleave', '.gallery-item a', headDisp);
            //$container.on('mouseenter mouseleave', '.gallery-item a', headDisp);
            
            //評点
            //$container.on('mouseenter mouseleave', '.gallery-itme a', headDisp);
            
            //$container.on('mouseenter mouseleave', '.gallery-itme a', headDisp);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        }

        // アイテムを生成しドキュメントに挿入する
        function addItems (filter) {

          this.$item = $(".gallery-item a");
          this.$window = $(window);

          /*  */
            var elements = [],
                // 追加するデータの配列
                slicedData = filteredData.slice(addedd, addedd + addItemCount);

            // slicedData の要素ごとに DOM 要素を生成
            $.each(slicedData, function (i, item) {
                var itemHTML =
                        '<figure>' +
                            '<div class="gallery-item is-loading">' +
                                '<a href="">' +
                                   '<img src="./image.php?name=photo' + item.id + '" width="100%" alt="user_id">' +
                                '</a>' +
                            '</div>' +
                            '<div class="icon_list clearfix">' +
                                '<div class="camera_icon_zone">' +
                                    '<p><a href="./profile.php?user_id= '+ item.camera_id +'">photographer</a></p>' +
                                '</div>' +
                                '<div class="model_icon_zone">' +
                                    '<p><a href="./profile.php?user_id= '+ item.model_id +'">model</a></p>' +
                                '</div>' +
                                '<div class="place_zone">' +
                                    '<p>' + item.camera_place + '</p>' +
                                '</div>' +
                                '<div class="price_zone">' +
                                    '<p>'  + item.camera_price + '円/h</p>' +
                                '</div>' +
                            '</div>' +
                            '<div class="comment clearfix">' +
                              '<p>' + item.camera_comment + '</p>' +
                            '</div>'+ 
                        '</figure>'
                        ;     
                elements.push($(itemHTML).get(0));
            });

            // DOM 要素の配列をコンテナーに挿入し、Masonry レイアウトを実行
            $container.append(elements);

            // 追加済みアイテム数の更新
            addedd += slicedData.length;

            // JSON データがすべて追加し終わっていたら追加ボタンを消す
            if (addedd < filteredData.length) {
                $loadMoreButton.show();
            } else {
                $loadMoreButton.hide();
            }
        }
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    });

});
