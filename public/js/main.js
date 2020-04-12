/* ================================================================
  javascript
   ================================================================ */

$(function () {
  // ---------------------------------------------
  // スティッキーヘッダー
  // ---------------------------------------------

  var $window = $(window),
    $header = $(".p-header"),
    threshold = $(".p-main-visual__img").outerHeight();
  console.log($window.scrollTop());

  $window.on("scroll", function () {
    if ($window.scrollTop() > threshold) {
      $header.addClass("visible");
    } else {
      $header.removeClass("visible");
    }
  });

  // ---------------------------------------------
  // ハンバーガーメニュー
  // ---------------------------------------------
  var $nav = $(".p-header__nav"),
    $menu = $(".p-header__menu"),
    $menuIcon = $(".p-header__menu-line");

  // メニューアイコンをクリックしてnavを開閉する
  var duration = 300;

  $menu.on("click", function () {
    $menuIcon.stop(true).toggleClass("active");
    $nav.toggleClass("open");
    if ($nav.hasClass("open")) {
      $nav.stop(true).animate(
        {
          right: "0",
        },
        duration,
        "swing"
      );
    } else {
      $nav.stop(true).animate(
        {
          right: "-100vw",
        },
        duration,
        "swing"
      );
    }
  });

  // ナビの余白クリックでメニュー閉じる
  $nav.on("click", function () {
    if ($nav.hasClass("open")) {
      $menuIcon.stop(true).removeClass("active");
      $nav.removeClass("open");
      $nav.stop(true).animate(
        {
          right: "-100vw",
        },
        duration,
        "swing"
      );
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
