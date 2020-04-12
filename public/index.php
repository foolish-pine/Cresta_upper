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
          <li class="p-header__item"><a class="js-smoothscroll" href="#service">WORKS</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#news">CULTURE</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="#contact">TOPICS</a></li>
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
        <h2 class="c-text__sectionTitle">About</h2>
        <h3 class="c-text__sectionSubTitle">
          ミニマルで<br>
          洗練されたデザインを。
        </h3>
        <p class="c-text">
          近年、ミニマルなデザインが流行しています。そこで弊社では、クライアント企業様新規サービス等の課題に対してミニマルで洗練されたデザインを実現させることで解決のサポートを致します。もちろん全てのサービスにおいてミニマルなデザインが課題解決になるわけではないので、課題や今後のサービスの展開等しっかりとヒアリングを行なった上でご提案させて頂きます。
        </p>
      </div>
    </div>
    <div id="service" class="p-service">
      <div class="p-service__inner">
        <h2 class="p-service__sectionTitle c-text__sectionTitle">Service</h2>
        <div class="p-service__container">
          <div class="p-service__textContainer">
            <h3 class="p-service__subTitle c-text__sectionSubTitle">
              リリース時のサポートで<br>
              サービスのブランディングを
            </h3>
            <p class="p-service__text c-text">
              弊社では、リリース時もサポートさせて頂きます。プレスリリース用のサイトや動画制作を通して、サービスのブランディングを行わせて頂きます。
            </p>
          </div>
          <div class="p-service__image">
            <img src="img/service-image@2x.jpg" alt="">
          </div>
        </div>
        <div class="p-service__container">
          <div class="p-service__textContainer">
            <h3 class="p-service__subTitle c-text__sectionSubTitle">
              リリース後のサポートで<br>
              効果を最大化させる
            </h3>
            <p class="p-service__text c-text">
              弊社では、リリース後もサポートさせて頂きます。サービスはリリース後に様々な課題にぶつかります。そこでクライアント様と一緒に改善を行うことで、デザインの効果を最大化させます。
            </p>
          </div>
          <div class="p-service__image">
            <img src="img/service-image02@2x.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div id="news" class="p-news">
      <div class="p-news__inner">
        <h2 class="c-text__sectionTitle">News</h2>
        <div class="p-news__container">
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="img/card-image1@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="img/card-image2@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
          <div class="p-news__card c-card">
            <div class="c-card__image">
              <img src="img/card-image3@2x.jpg" alt="">
            </div>
            <p class="c-card__text">
              新規サイトを公開しました。今回のサイトは白と黒を基調にしたミニマルなデザインになっています。
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="contact" class="p-contact">
      <div class="p-contact__inner">
        <h2 class="p-contact__sectionTitle c-text__sectionTitle">お問い合わせ</h2>
        <form action="contact/index.php" method="post">
          <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
          <div>
            <label for="name">担当者名</label><br>
            <input class="p-contact__textbox" type="text" id="name" name="name" required />
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <input class="p-contact__textbox" type="text" id="tel" name="tel" required />
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <input class="p-contact__textbox" type="text" id="email" name="email" required />
          </div>
          <div class="p-contact__textarea">
            <label for="message">お問い合わせ内容</label><br>
            <textarea id="message" name="message" required></textarea>
          </div>
          <div class="p-contact__button c-button--default">
            <input type="submit" name="confirmation" value="確認画面へ">
          </div>
        </form>
      </div>
    </div>
  </main>
  <footer class="l-footer">
    <div class="p-footer">
      <div class="p-footer__inner">
        <p>©︎cresta.design all rights reserved</p>
      </div>
    </div>
  </footer>
  <!-- jQuery -->
  <script src="./js/jQuery/jquery-3.5.0.min.js"></script>
  <script src="./js/main.js"></script>
</body>

</html>