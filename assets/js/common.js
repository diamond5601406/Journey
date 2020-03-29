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

    $('.gallery').one('click', function() {
        $('.main').css('display', 'none');
        $('.gallery-are').css('position', 'absolute');

        $.getJSON("./json/gallery.json", function(data) {

            var h = '<div class="gallery-area">'

            for(var i in data) {
                    h += '<section class="item-'
                      + data[i].size
                      + ' item-common">'
                      + '<img src="assets/img/gallery-item/'
                      + data[i].photo
                      + '">'
                      + '<strong>'
                      + data[i].title
                      + '</strong>'
                      + '<span></span>'
                      + '</section>';
            }

            h += '</div>';

            $('.col-md-10').append(h);

            $.when(
                // Masonry
                $(".col-md-10").imagesLoaded( function() {
                    $(".col-md-10").masonry({
                        itemSelector: ".item-common",
                        columnWidth: 180,
                        gutter: 4,
                        containerStyle: null
                    });
                })
            ).done(function() {
                $('.col-md-10').css('height', 'auto');

                $(function() {

                var duration = 300;

                $('.item-common').on('mouseover', function() {
                  $(this).find('strong, span').stop(true).animate({
                    opacity: 1
                  },duration);
                })
                .on('mouseout', function() {
                  $(this).find('strong, span').stop(true).animate({
                    opacity: 0
                  }, duration);
                  });
                });
            });
        });
    });
  });

// Skill Ajax
$(function() {

    $('.skill').on('click', function() {
        $('.profile-area').css('display', 'none');
        $('.profile-area-wrapper').css({
          'background-image':'url(/assets/img/portfolio-profile-background-tab.jpg)',
          'background-repeat':'round',
          'transition-all':'0.7'
        });

        $.getJSON("./json/skill.json", function(data) {

            var h = '<div class="skill-area">'

            for(var i in data) {
                    h += '<div class="skill-area-block">'
                      + '<div class="skill-area-logo">'
                      + '<img src="./assets/img/'
                      + data[i].logo
                      + '">'
                      + '</div>'
                      + '<div class="skill-area-title">'
                      + '<h2>'
                      + data[i].title
                      + '</h2>'
                      + '</div>'
                      + '<div class="skill-area-description">'
                      + '<p>'
                      + data[i].description
                      + '</p>'
                      + '</div>'
                      + '</div>';
            }

            h += '</div>'
              + '<div class="skill-area-arrow">'
              + '<img src="/assets/img/arrow-under-icon.png">'
              + '</div>';

            $('.profile-area-wrapper').append(h);
        });
    });
});

// Works FadeIn Text
$(function() {
  var options1 = {
    id: 'box1',
    auto: false,
    trigger: 'on-visible'
  };

  $('.works-area-description h2').initReveal(options1);
});