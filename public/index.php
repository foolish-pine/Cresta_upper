<?php
session_start();

// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
$clean = array();
$error = array();

// トークン生成
if (!isset($_SESSION['token'])) {
  $_SESSION['token'] = sha1(random_bytes(30));
}

// サニタイズ
if(!empty($_POST)) {
  foreach($_POST as $key => $value) {
    $clean[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');
  }
}

// 前後にある半角全角スペースを削除する関数
function spaceTrim ($str) {
  // 行頭
  $str = preg_replace('/^[ 　]+/u', '', $str);
  // 末尾
  $str = preg_replace('/[ 　]+$/u', '', $str);
  return $str;
}

?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>クリ★スタコーディング課題【上級編】</title>
  <meta name="description" content="" />
  <!-- 検索結果から除外する -->
  <meta name="robots" content="none" />
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./ img/favicon/apple-touch-icon.png" />
  <link rel="icon" href="./img/favicon/favicon.ico" />
  <!-- CSS -->
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__logo">
        <a href="#">
          <h1>
            <img src="./img/site-logo@2x.png" alt="DIGSMILE INC.">
          </h1>
        </a>
      </div>
      <nav class="p-header__nav">
        <ul class="p-header__list">
          <li class="p-header__item"><a class="js-smoothscroll" href="#about">ABOUT US</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#works">WORKS</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#culture">CULTURE</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#topics">TOPICS</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#contact">CONTACT</a></li>
        </ul>
      </nav>
      <div class="p-header__menu">
        <button class="p-header__menu-icon">
          <span class="p-header__menu-line"></span>
          <span class="p-header__menu-line"></span>
          <span class="p-header__menu-line"></span>
        </button>
      </div>
    </div>
  </header>
  <main class="l-main">
    <div class="p-main-visual">
      <div class="p-main-visual__img"></div>
      <div class="p-main-visual__bg"></div>
      <div class="p-main-visual__catch">
        <p class="p-main-visual__catch--1">
          デザインで人を笑顔にする会社<br>
          DIGSMILE INC.
        </p>
        <p class="p-main-visual__catch--2">
          DESIGN<br>
          FOR<br>
          SMILE.
        </p>
      </div>
    </div>
    <div id="about" class="p-about">
      <div class="p-about__inner">
        <h2 class="c-text__section-title">
          ABOUT US
        </h2>
        <p class="p-about__text c-text">
          DIGSMILEは、デザインで人を笑顔にする会社。<br>
          なんでもない日常に少しのワクワクと遊び心を提供します。笑顔には世界を変える力がある、デザインには人を幸せにする力がある。毎日に幸せを感じて生きていきたい。
          DIGSMILEの社名にはそんな想いが込められています。
        </p>
        <div class="p-about__button c-button--default">
          <a href="#">
            READ MORE
          </a>
        </div>
      </div>
    </div>
    <div class="p-works-culture">
      <div class="p-works-culture__inner">
        <div id="works" class="p-works">
          <h2 class="p-works-culture__section-title c-text__section-title">
            WORKS
          </h2>
          <div class="p-works-culture__img">
            <img src="img/works-img@2x.jpg" alt="">
          </div>
          <div class="p-works-culture__text c-text">
            <p>
              DIGSMILEの制作実績を紹介します。
            </p>
          </div>
          <div class="p-works-culture__button c-button--default">
            <a href="#">
              READ MORE
            </a>
          </div>
        </div>
        <div id="culture" class="p-culture">
          <h2 class="p-works-culture__section-title c-text__section-title">
            CULTURE
          </h2>
          <div class="p-works-culture__img">
            <img src="img/culture-img@2x.jpg" alt="">
          </div>
          <div class="p-works-culture__text c-text">
            <p>
              DIGSMILEの社内文化について紹介します。
            </p>
          </div>
          <div class="p-works-culture__button c-button--default">
            <a href="#">
              READ MORE
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="topics" class="p-topics">
      <div class="p-topics__inner">
        <h2 class="p-topics__section-title c-text__section-title">
          LATEST TOPICS
        </h2>
        <div class="p-topics__container">
          <div class="p-topics__content">
            <a href="">
              <time datetime="2020-2-1">
                2020.02.01
              </time>
              <p>
                イベントレポート「VRクリエイター座談会 〜5Gの次に来るもの〜」
              </p>
            </a>
          </div>
          <div class="p-topics__content">
            <a href="">
              <time datetime="2020-1-18">
                2020.01.18
              </time>
              <p>
                プレスリリースのお知らせ DIGGIN’ RECORDS
              </p>
            </a>
          </div>
          <div class="p-topics__content">
            <a href="">
              <time datetime="2020-1-1">
                2020.01.01
              </time>
              <p>
                新年明けましておめでとうございます
              </p>
            </a>
          </div>
        </div>
        <div class="p-topics__button c-button--default">
          <a href="#">
            READ MORE
          </a>
        </div>
      </div>
    </div>
    <div id="contact" class="p-contact">
      <div class="p-contact__inner">
        <div class="p-contact__img">
          <img src="img/recruit-img@2x.jpg" alt="">
        </div>
        <div class="p-contact__container">
          <h2 class="p-contact__section-title c-text__section-title">
            CONTACT
          </h2>
          <p class="p-contact__text c-text">
            制作の依頼、取材の依頼、IRや採用についての連絡・お問い合わせはコンタクトページから承っております。
            まずはお気軽にご連絡ください。担当者から改めて返信いたします。
          </p>
          <div class="p-contact__button c-button--default">
            <a href="#">
              READ MORE
            </a>
          </div>
        </div>
      </div>
  </main>
  <footer class="l-footer">
    <div class="p-footer">
      <div class="p-footer__inner">
        <p>©2018 DIGSMILE INC.</p>
      </div>
    </div>
  </footer>
  <!-- jQuery -->
  <script src="./js/jQuery/jquery-3.5.0.min.js"></script>
  <script src="./js/main.js"></script>
</body>

</html>