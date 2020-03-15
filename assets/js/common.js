// ハンバーガーボタンが押すとハンバーガーボタンにactiveクラスが追加される
// ハンバーガーボタンがactiveクラスを持ってるか否かでハンバーガーメニューにactiveクラスをつけるかどうか条件分岐
$(function() {
　$('.smp-nav-trigger').click(function() {
　　$(this).toggleClass('active');

	　if ($(this).hasClass('active')) {
	　　$('.smp-nav-list').addClass('active');　 //クラスを付与
	　} else {
	　　$('.smp-nav-list').removeClass('active'); //クラスを外す
	　}
　});

	//ハンバーガーメニュー内の">"クリック時にハンバーガーメニュー閉じる
	$('.smp-nav-btn-inactive').click(function() {
		$('.smp-nav-trigger').toggleClass('active');

		if ($('.smp-nav-trigger').hasClass('active')) {
	　　$('.smp-nav-list').addClass('active');　 //クラスを付与
	　} else {
	　　$('.smp-nav-list').removeClass('active'); //クラスを外す
	　}
	});
});