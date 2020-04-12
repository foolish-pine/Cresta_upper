/* ================================================================
  javascript
   ================================================================ */

$(function () {
  // ---------------------------------------------
  // ハンバーガーメニュー
  // ---------------------------------------------
  var mq = window.matchMedia("screen and (max-width:767px)");

  $(window).on("resize", function () {
    if (mq.matches) {
      // 画面幅767px以下のとき
      // navを非表示にする
      $(".p-header__nav").hide();
      // メニューアイコンを非activeにする
      $(".p-header__menu-line").removeClass("active");
    } else {
      // 画面幅768px以上のとき
      // navを表示させる
      $(".p-header__nav").show();
    }
  });

  // メニューアイコンをクリックしてnavを開閉する
  $(".p-header__menu-icon").on("click", function () {
    $(".p-header__menu-line").stop(true).toggleClass("active");
    $(".p-header__nav").stop(true).fadeToggle();
  });

  // ナビの余白クリックでメニュー閉じる
  $(".p-header__nav").on("click", function () {
    if ($(".p-header__menu-line").hasClass("active")) {
      $(".p-header__menu-line").stop(true).toggleClass("active");
      $(".p-header__nav").stop(true).fadeToggle();
    }
  });

  // ---------------------------------------------
  // スムーススクロール（ページ内リンク）
  // ---------------------------------------------

  $(".js-smoothscroll").click(function () {
    var speed = 500,
      href = $(this).attr("href"),
      target = $(href == "#" || href == "" ? "html" : href),
      headerHeight = $(".p-header").outerHeight(),
      position = target.offset().top - headerHeight; // ヘッダーの高さ分スクロール量を減らす
    $("html, body").animate({ scrollTop: position }, speed);
  });
});
