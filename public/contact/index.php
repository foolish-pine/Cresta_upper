<?php
session_start();

// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
$page_flag = 0;
$clean = array();

// サニタイズ
if (!empty($_POST)) {
  foreach ($_POST as $key => $value) {
    $clean[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
}

// 前後にある半角全角スペースを削除する関数
function spaceTrim($str)
{
  // 行頭
  $str = preg_replace('/^[ 　]+/u', '', $str);
  // 末尾
  $str = preg_replace('/[ 　]+$/u', '', $str);
  return $str;
}

if (!empty($clean['back'])) {
  $page_flag = 0;

  // トークン生成
  if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = sha1(random_bytes(30));
  }
} elseif (!empty($clean['confirmation'])) {
  // tokenを変数に入れる
  $token = $_POST['token'];

  // トークンを確認し、確認画面を表示
  if (!(hash_equals($token, $_SESSION['token']) && !empty($token))) {
    echo "不正アクセスの可能性があります";
    exit();
  }

  $error = validation($clean);

  if (empty($error)) {
    $page_flag = 1;

    // セッションの書き込み
    $_SESSION['page'] = true;
  }
} elseif (!empty($clean['submit'])) {

  if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {

    // セッションの削除
    unset($_SESSION['page']);

    $page_flag = 2;

    $auto_reply_subject = null;
    $auto_reply_text = null;
    $admin_reply_subject = null;
    $admin_reply_text = null;
    date_default_timezone_set('Asia/Tokyo');

    $header = "MIME-Version: 1.0\n";
    $header .= "From: Cresta Design <noreply@test.com>\n";
    $header .= "Reply-To: Cresta Design <noreply@test.com>\n";

    $auto_reply_subject = 'お問い合わせありがとうございます。';

    $auto_reply_text = "※※※このメールはテストメールです※※※\n\n";
    $auto_reply_text .= "この度は、お問い合わせいただきありがとうございます。\n下記の内容でお問い合わせを受け付けました。\n\n";
    $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $auto_reply_text .= "氏名：" . $clean['name'] . "\n";
    $auto_reply_text .= "電話番号：" . $clean['tel'] . "\n";
    $auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
    $auto_reply_text .= "お問い合わせ内容：\n" . $clean['message'] . "\n\n";
    $auto_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-beginner.foolish-pine.com/index.php";

    // 利用者へメール送信
    mb_send_mail($clean['email'], $auto_reply_subject, $auto_reply_text, $header);

    $admin_reply_subject = "お問い合わせ受け付けました";

    $admin_reply_text = "※※※このメールはテストメールです※※※\n\n";
    $admin_reply_text .= "下記の内容でお問い合わせがありました。\n\n";
    $admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $admin_reply_text .= "氏名：" . $clean['name'] . "\n";
    $admin_reply_text .= "電話番号：" . $clean['tel'] . "\n";
    $admin_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
    $admin_reply_text .= "お問い合わせ内容：\n" . $clean['message'] . "\n\n";
    $admin_reply_text .= "このメールは以下のサイトのお問い合わせフォームから送信されました。\nhttps://cresta-beginner.foolish-pine.com/index.php";

    // 管理者へメール送信
    mb_send_mail($clean['email'], $admin_reply_subject, $admin_reply_text, $header);
  } else {
    $page_flag = 0;
  }
}

function validation($data)
{
  $error = array();

  // 氏名のバリデーション
  if (20 < mb_strlen($data['name'])) {
    $error[] = "「担当者名」は20文字以内で入力してください。";
  }

  // 電話番号のバリデーション
  if (!preg_match('/^[0-9-]{6,9}$|^[0-9-]{13}$/', $data['tel'])) {
    $error[] = "「電話番号」は正しい形式で入力してください。";
  }

  // メールアドレスのバリデーション
  if (!preg_match('/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email'])) {
    $error[] = "「メールアドレス」は正しい形式で入力してください。";
  }

  return $error;
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
  <link rel="apple-touch-icon" sizes="180x180" href="..// img/favicon/apple-touch-icon.png" />
  <link rel="icon" href="..//img/favicon/favicon.ico" />
  <!-- CSS -->
  <link rel="stylesheet" href="..//css/style.css" />
</head>

<body>
  <div class="p-header__nav-filter"></div>
  <header class="l-header">
    <div class="p-header">
      <div class="p-header__logo">
        <a href="../">
          <h1>
            <img src="..//img/site-logo@2x.png" alt="DIGSMILE INC.">
          </h1>
        </a>
      </div>
      <nav class="p-header__nav">
        <ul class="p-header__list">
          <li class="p-header__item"><a class="js-smoothscroll" href="../index.html#about">ABOUT US</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="../index.html#works">WORKS</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="../index.html#culture">CULTURE</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="../index.html#topics">TOPICS</a></li>
          <li class="p-header__item"><a class="js-smoothscroll" href="../index.html#contact">CONTACT</a></li>
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
    <div class="p-sub-main-visual">
      <div class="p-sub-main-visual__img p-sub-main-visual__img--contact"></div>
      <div class="p-sub-main-visual__bg"></div>
      <div class="p-sub-main-visual__catch">
        <p class="p-sub-main-visual__catch--main">
          CONTACT
        </p>
        <p class="p-sub-main-visual__catch--sub">
          お問い合わせ
        </p>
      </div>
    </div>
    <div class="p-contact-page">
      <div class="p-contact-page__inner">
        <!-- お問い合わせフォーム入力ページ -->
        <p class="p-contact-page__text c-text">
          ご依頼やご相談についてのご質問やご要望がございましたら、下記フォームよりお気軽にお問い合わせください。送付いただいた内容を確認の上、担当者からご連絡させていただきます。
        </p>
        <?php if ($page_flag === 0) : ?>
        <?php if (!empty($error)): ?>
        <ul class="p-contact-page__error-list">
          <?php foreach ($error as $value): ?>
          <li><?php echo $value; ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <form action="" method="post">
          <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
          <div>
            <p class="p-contact-page__label">お問い合わせ種別<span class="p-contact-page__label-required"></span></p>
            <div class="p-contact-page__radio-container">
              <label class="p-contact-page__radio-button" for="order"><input type="radio" id="order" name="content" value="制作依頼" <?php if (!empty($clean['order'])) {echo 'checked';} ?>> 制作依頼</label>
              <label class="p-contact-page__radio-button" for="recruit"><input type="radio" id="recruit" name="content" value="採用" <?php if (!empty($clean['consult']))  {echo 'checked';} ?>> 採用</label>
              <label class="p-contact-page__radio-button" for="IR"><input type="radio" id="IR" name="content" value="IR" <?php if (!empty($clean['apply'])) {echo 'checked';} ?>> IR</label>
              <label class="p-contact-page__radio-button" for="others"><input type="radio" id="others" name="content" value="others" <?php if (!empty($clean['apply'])) {echo 'checked';} ?>> その他</label>
            </div>
          </div>
          <div>
            <label for="company-name" class="p-contact-page__label">会社名・団体名</label>
            <input class="p-contact-page__textbox" type="text" id="company-name" name="company-name" value="<?php if( !empty($clean['company-name']) ){ echo $clean['company-name']; } ?>" />
          </div>
          <div>
            <label for="name" class="p-contact-page__label">お名前<span class="p-contact-page__label-required"></span></label>
            <input class="p-contact-page__textbox" type="text" id="name" name="name" value="<?php if( !empty($clean['name']) ){ echo $clean['name']; } ?>" required />
          </div>
          <div>
            <label for="email" class="p-contact-page__label">メールアドレス<span class="p-contact-page__label-required"></span></label>
            <input class="p-contact-page__textbox" type="text" id="email" name="email" value="<?php if( !empty($clean['email']) ){ echo $clean['email']; } ?>" required />
          </div>
          <div>
            <label for="tel" class="p-contact-page__label">電話番号</label>
            <input class="p-contact-page__textbox" type="text" id="tel" name="tel" value="<?php if( !empty($clean['tel']) ){ echo $clean['tel']; } ?>" />
          </div>
          <div class="p-contact-page__textarea">
            <label for="message" class="p-contact-page__label">お問い合わせ内容<span class="p-contact-page__label-required"></span></label>
            <textarea id="message" name="message" required><?php if( !empty($clean['message']) ){ echo $clean['message']; } ?></textarea>
          </div>
          <div class="p-contact-page__privacy-policy">
            <p class="p-contact-page__label">PRIVACY POLICY</p>
            <div class="p-contact-page__privacy-policy-container">
              <p class="p-contact-page__privacy-policy-title c-text">
                個人情報保護方針
              </p>
              <p class="p-contact-page__privacy-policy-text c-text">
                株式会社DIGSMILE（以下、当社）では、個人情報の重要性を認識し、以下の基準に従って、適切な管理、保護に努めます。
              </p>
              <br>
              <p class="p-contact-page__privacy-policy-text c-text">
                1.個人情報の収集、利用<br>
                当社では、お客様との取引、サービスの提供のために個人情報を適法に収集し、収集した目的の範囲内で、個人情報を利用いたします。
              </p>
              <br>
              <p class="p-contact-page__privacy-policy-text c-text">
                2.個人情報の第三者への開示と提供<br>
                収集したお客様の個人情報は、法的な要請等によらない限り、お客様の承諾を得ない第三者に対して提供・開示はいたしません。<br>
                業務の都合上、業務委託先に個人情報を提供する場合は、機密保持契約等によって業務委託先に個人情報保護を義務付けるとともに、業務委託先が適切に個人情報を取り扱うように管理いたします。
              </p>
              <br>
              <p class="p-contact-page__privacy-policy-text c-text">
                3.個人情報の保護<br>
                当社では、個人情報の紛失、破壊、改ざん、不正アクセス、および漏えい等を防止するため、適切な対策を行います。
              </p>
              <br>
              <p class="p-contact-page__privacy-policy-text c-text">
                4.法令および関連規範の遵守<br>
                当社は、個人情報の取り扱いに関して、個人情報保護法をはじめとする個人情報に関する法令および関連する規範を遵守します。
              </p>
              <br>
              <p class="p-contact-page__privacy-policy-text c-text">
                5.個人情報の開示・訂正・削除<br>
                当社では、個人情報の開示・訂正・削除等の依頼があった場合、情報提供者本人であることを確認の上、すみやかに対応いたします。
              </p>
              <br>
              <p class="p-contact-page__privacy-policy-text c-text">
                法令や当社方針により、プライバシー・ポリシーを予告なく改訂することがあります。
              </p>
              <br>
              <p class="p-contact-page__privacy-policy-text c-text">
                お問い合わせ窓口<br>
                当社の個人情報の取扱いに関するお問い合わせは下記までご連絡お願いいたします。<br>
                株式会社ファイアープレイス<br>
                044-589-4333
              </p>
            </div>
          </div>
          <div class="p-contact-page__agree">
            <label class="c-text" for="agree">
              <input type="checkbox" id="agree" name="agree" value="agree" <?php if (!empty($clean['order'])) {echo 'checked';} ?> required />個人情報の取り扱いについて同意のうえ送信します。
            </label>
          </div>
          <div class="p-contact-page__button c-button--default">
            <input type="submit" name="confirmation" value="確認画面へ">
          </div>
        </form>
        <!-- お問い合わせフォーム確認ページ -->
        <?php elseif ($page_flag === 1) : ?> <h2 class="p-contact-page__section-title c-text__section-title">お問い合わせ</h2>
        <p class="p-contact-page__text--confirmation c-text">
          以下の内容で送信します。よろしいですか？<br>※利用者宛と管理者宛のメールが入力されたメールアドレスに送信されます。</p>
        <form action="" method="post">
          <div>
            <label for="name">担当者名</label><br>
            <?php if (isset($clean['name'])) {
              echo '<div class="p-contact-page__textbox--confirmation">' . $clean['name'] . '</div>';
            } ?>
          </div>
          <div>
            <label for="tel">電話番号</label><br>
            <?php if (isset($clean['tel'])) {
              echo '<div class="p-contact-page__textbox--confirmation">' . $clean['tel'] . '</div>';
            } ?>
          </div>
          <div>
            <label for="email">メールアドレス</label><br>
            <?php if (isset($clean['email'])) {
              echo '<div class="p-contact-page__textbox--confirmation">' . $clean['email'] . '</div>';
            } ?>
          </div>
          <div class="p-contact-page__textarea">
            <label for="message">お問い合わせ内容</label><br>
            <?php if (isset($clean['message'])) {
              echo '<div class="p-contact-page__textarea--confirmation">' . nl2br($clean['message']) . '</div>';
            } ?>
          </div>
          <div class="p-contact-page__button-container">
            <div class="p-contact-page__button c-button--back">
              <input type="submit" name="back" value="戻る">
            </div>
            <div class="p-contact-page__button c-button--default">
              <input type="submit" name="submit" value="送信">
            </div>
          </div>
          <input type="hidden" name="name" value="<?php echo $clean['name'] ?>">
          <input type="hidden" name="tel" value="<?php echo $clean['tel'] ?>">
          <input type="hidden" name="email" value="<?php echo $clean['email'] ?>">
          <input type="hidden" name="message" value="<?php echo $clean['message'] ?>">
        </form>
        <!-- お問い合わせフォーム完了ページ -->
        <?php elseif ($page_flag === 2) : ?>
        <h2 class="p-contact-page__section-title c-text__section-title">送信が完了しました。</h2>
        <div class="p-contact-page__button c-button--top">
          <a href="../index.php">トップへ戻る</a>
        </div>
        <?php endif; ?>
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
  <script src="..//js/jQuery/jquery-3.5.0.min.js"></script>
  <script src="..//js/main.js"></script>
</body>

</html>