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
  <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png" />
  <link rel="icon" href="./img/favicon/favicon.ico" />
  <!-- CSS -->
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
  <div class="p-header__nav-filter"></div>
  <!-- ヘッダーここから -->
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__logo">
        <a href=".">
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
  <!-- ヘッダーここまで -->
  <main class="l-main">
    <!-- メインビジュアルここから -->
    <div class="p-main-visual">
      <div class="p-main-visual__img js-sticky-header-threshold"></div>
      <div class="p-main-visual__bg"></div>
      <div class="p-main-visual__catch">
        <p class="p-main-visual__catch--sub">
          デザインで人を笑顔にする会社<br>
          DIGSMILE INC.
        </p>
        <p class="p-main-visual__catch--main">
          DESIGN<br>
          FOR<br>
          SMILE.
        </p>
      </div>
    </div>
    <!-- メインビジュアルここまで -->
    <!-- aboutコンテンツここから -->
    <div id="about" class="p-about">
      <div class="p-about__inner">
        <div class="p-about__container">
          <h2 class="c-text__section-title">
            ABOUT US
          </h2>
          <p class="p-about__text c-text">
            DIGSMILEは、デザインで人を笑顔にする会社。<br>
            なんでもない日常に少しのワクワクと遊び心を提供します。笑顔には世界を変える力がある、デザインには人を幸せにする力がある。毎日に幸せを感じて生きていきたい。<br>
            DIGSMILEの社名にはそんな想いが込められています。
          </p>
          <div class="c-button--default">
            <a href="about-us/index.php">
              READ MORE
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- aboutコンテンツここまで -->
    <div class="p-works-culture">
      <div class="p-works-culture__inner">
        <!-- worksコンテンツここから -->
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
        <!-- worksコンテンツここまで -->
        <!-- cultureコンテンツここから -->
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
        <!-- cultureコンテンツここまで -->
      </div>
    </div>
    <!-- topicsコンテンツここから -->
    <div id="topics" class="p-topics">
      <div class="p-topics__inner">
        <h2 class="p-topics__section-title c-text__section-title">
          LATEST TOPICS
        </h2>
        <div class="p-topics__container">
          <div class="p-topics__content">
            <a href="">
              <time class="p-topics__content-time" datetime="2020-02-01">
                2020.02.01
              </time>
              <p class="p-topics__content-text">
                イベントレポート「VRクリエイター座談会 〜5Gの次に来るもの〜」
              </p>
            </a>
          </div>
          <div class="p-topics__content">
            <a href="">
              <time class="p-topics__content-time" datetime="2020-01-18">
                2020.01.18
              </time>
              <p class="p-topics__content-text">
                プレスリリースのお知らせ DIGGIN’ RECORDS
              </p>
            </a>
          </div>
          <div class="p-topics__content">
            <a href="">
              <time class="p-topics__content-time" datetime="2020-01-01">
                2020.01.01
              </time>
              <p class="p-topics__content-text">
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
    <!-- topicsコンテンツここまで -->
    <!-- contactコンテンツここから -->
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
            制作の依頼、取材の依頼、IRや採用についての連絡・お問い合わせはコンタクトページから承っております。<br>
            まずはお気軽にご連絡ください。担当者から改めて返信いたします。
          </p>
          <div class="p-contact__button c-button--default">
            <a href="contact/index.php">
              READ MORE
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- contactコンテンツここまで -->
  </main>

  <!-- フッターここから -->
  <footer class="l-footer">
    <div class="p-footer">
      <div class="p-footer__inner">
        <p>©2018 DIGSMILE INC.</p>
      </div>
    </div>
  </footer>
  <!-- フッターここまで -->
  <!-- jQuery -->
  <script src="./js/jQuery/jquery-3.5.0.min.js"></script>
  <script src="./js/main.js"></script>
</body>

</html>