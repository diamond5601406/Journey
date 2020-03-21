// ナビゲーションをフェードイン
// $(function() {
//     $(document).ready(function() {
//         $('.nav').css({
//             'opacity': '1',
//             'transition': 'all 1s ease-in 4s'
//         });
//     });
// });

// ハンバーガーボタンが押すとハンバーガーボタンにactiveクラスが追加される
// ハンバーガーボタンがactiveクラスを持ってるか否かでハンバーガーメニューにactiveクラスをつけるかどうか条件分岐
$(function() {
    $('.smp-nav-trigger').click(function() {

    	const targetElement = document.querySelector('.nav');

        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $('.smp-nav-list').addClass('active'); //クラスを付与
            $()
        } else {
            $('.smp-nav-list').removeClass('active'); //クラスを外す
        }
    });

    //ハンバーガーメニュー内の">"クリック時にハンバーガーメニュー閉じる
    $('.smp-nav-btn-inactive').click(function() {
        $('.smp-nav-trigger').toggleClass('active');

        if ($('.smp-nav-trigger').hasClass('active')) {
            $('.smp-nav-list').addClass('active'); //クラスを付与
            bodyScrollLock.disableBodyScroll(targetElement);
        } else {
            $('.smp-nav-list').removeClass('active'); //クラスを外す
            bodyScrollLock.clearAllBodyScrollLocks();
        }
    });
});

// Gallery Ajax
$(function() {

    $('.gallery').click(function() {
        $('.main').css('display', 'none');

        $.getJSON("./json/gallery.json", function(data) {

            var h = '<div class="gallery-area">'

            for(var i in data) {
                    h += '<section class="item-'
                      + data[i].size
                      + ' item-common">'
                      + '<img src="assets/img/gallery-item/'
                      + data[i].photo
                      + '">'
                      + '</section>';
            }

            h += '</div>';

            $('.col-md-10').append(h);

            // Masonry
            $(".col-md-10").imagesLoaded( function() {
                $(".col-md-10").masonry({
                    itemSelector: ".item-common",
                    columnWidth: 180,
                    gutter: 4
                });
            });
        });
    });
});