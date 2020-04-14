/* ================================================================
  javascript
   ================================================================ */

$(function () {
  // ---------------------------------------------
  // スティッキーヘッダー
  // ---------------------------------------------

  var $window = $(window),
    $header = $(".p-header"),
    threshold = $(".p-main-visual__img, .p-sub-main-visual__img").outerHeight();

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
  var $headerNav = $(".p-header__nav"),
    $headerMenu = $(".p-header__menu"),
    $headerMenuLine = $(".p-header__menu-line");

  var mqPC = window.matchMedia("screen and (max-width:1439px)");

  // ウィンドウリサイズ時
  $(window).on("resize", function () {
    $headerNav.removeClass("open");
    $headerMenuLine.stop(true).removeClass("active");
    $(".p-header__nav-filter").fadeOut();
    if (mqPC.matches) {
      // sp, tabサイズのとき
      $headerNav.css({
        right: "-100vw",
      });
    } else {
      $headerNav.css({
        right: "-590px",
      });
    }
  });

  // メニューアイコンをクリックしてnavを開閉する
  var duration = 300;

  $headerMenu.on("click", function () {
    $headerMenuLine.stop(true).toggleClass("active");
    $headerNav.toggleClass("open");
    if (mqPC.matches) {
      // sp, tabサイズのとき
      if ($headerNav.hasClass("open")) {
        $headerNav.stop(true).animate(
          {
            right: "0",
          },
          duration,
          "swing"
        );
      } else {
        $headerNav.stop(true).animate(
          {
            right: "-100vw",
          },
          duration,
          "swing"
        );
      }
    } else {
      // PCサイズのとき
      if ($headerNav.hasClass("open")) {
        $headerNav.stop(true).animate(
          {
            right: "0",
          },
          duration,
          "swing"
        );
        $(".p-header__nav-filter").addClass("active");
        $(".p-header__nav-filter").fadeIn();
      } else {
        $headerNav.stop(true).animate(
          {
            right: "-590px",
          },
          duration,
          "swing"
        );
        $(".p-header__nav-filter").removeClass("active");
        $(".p-header__nav-filter").fadeOut();
      }
    }
  });

  // ナビの余白クリックでメニュー閉じる
  $headerNav.on("click", function () {
    $headerMenuLine.stop(true).removeClass("active");
    $headerNav.removeClass("open");
    if (mqPC.matches) {
      // sp, tabサイズのとき
      $headerMenuLine.stop(true).removeClass("active");
      $headerNav.removeClass("open");
      $headerNav.stop(true).animate(
        {
          right: "-100vw",
        },
        duration,
        "swing"
      );
    } else {
      // PCサイズのとき
      $headerNav.stop(true).animate(
        {
          right: "-590px",
        },
        duration,
        "swing"
      );
      $(".p-header__nav-filter").removeClass("active");
      $(".p-header__nav-filter").fadeOut();
    }
  });

  // navの外側クリックでnav閉じる
  $(".p-header__nav-filter").on("click", function () {
    $headerMenuLine.stop(true).removeClass("active");
    $headerNav.removeClass("open");
    $headerNav.stop(true).animate(
      {
        right: "-590px",
      },
      duration,
      "swing"
    );
    $(".p-header__nav-filter").removeClass("active");
    $(".p-header__nav-filter").fadeOut();
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
