<?php
require_once '../../config.php';
require_once '../../function.php';
require_once '../../public/phpmailer/PHPMailer.php';
require_once '../../public/phpmailer/Exception.php';
require_once '../../public/phpmailer/SMTP.php';

session_start();
if (isset($_SESSION['listing_id']) && isset($_SESSION['pay_limit'])) {
    $list = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM auction WHERE listing_id = " . $_SESSION['listing_id'] . "");
    if (isset($_POST['btn'])) {
        $sql =  "INSERT INTO invoice (listing_id,customer_id,invoice_money,invoice_limit,invoice_date) VALUES(" . $list[0]['listing_id'] . "," . $list[0]['customer_id'] . "," . $list[0]['payment'] . ",'" . $_SESSION['pay_limit'] . "','" . date('Y-m-d H:i:s') . "')";
        $id = insert_sql_id(HOST, USER_ID, PASSWORD, DB_NAME, $sql);

        $result = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM invoice i INNER JOIN customer c ON i.customer_id = c.customer_id INNER JOIN auction a ON i.listing_id = a.listing_id WHERE i.invoice_id = $id");
        $car_detail = select(HOST, USER_ID, PASSWORD, DB_NAME, "SELECT * FROM car_view WHERE car_id = " . $result[0]['car_id'] . "");
        // PDF作成処理を作る
        require_once '../../vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf([
            'fontdata' => [
                'ipa' => [
                    'R' => 'ipag.ttf'
                ]
            ],
            'format' => 'A4-P',
            'mode' => 'ja',
        ]);


        $mpdf->WriteHTML('
    <head>
        <link rel="stylesheet" href="css/index.css">
    </head>
        <h1>御請求書</h1>
        <p>' . $result[0]['customer_name'] . '様</p>
        <p>請求金額：' . number_format($result[0]['invoice_money']) . '円</p>
        <p>支払期日: ' . $result[0]['invoice_limit'] . '</p>
        <p>発行日:' . $result[0]['invoice_date'] . '</p>
        <p>請求番号:' . $result[0]['invoice_id'] . '</p>
        <p>HAL自動車売買株式会社</p>
        <p>&#12306;530-0001</p>
        <p>大阪府大阪市北区梅田3-3-1</p>
        <p>TEL:06-6347-0001</p>
        
        <h2>車両情報</h2>
        <p>落札車両名:' . $car_detail[0]['car_name'] . '</p>
        <table>
            <tr>
                <td>詳細情報</td>
            </tr>
            <tr>
                <td>メーカー名</td>
                <td>' . $car_detail[0]['maker'] . '</td>
            </tr>
            <tr>
                <td>車種名</td>
                <td>' . $car_detail[0]['model_name'] . '</td>
            </tr>
            <tr>
                <td>グレード名</td>
                <td>' . $car_detail[0]['grade_name'] . '</td>
            </tr>
            <tr>
                <td>年式</td>
                <td>' . $car_detail[0]['car_year'] . '</td>
            </tr>
            <tr>
                <td>ミッション</td>
                <td>' . $car_detail[0]['mission'] . '</td>
            </tr>
            <tr>
                <td>色</td>
                <td>' . $car_detail[0]['color_name'] . '</td>
            </tr>
        </table>
        <p><img src="http://localhost/IHTEST/listing_manage/cars/1/1_1.jpg" alt=""></p>
        <p>振込先:HAL銀行 大阪支店 普通預金 1234567 ハルジドウシャバイバイカブシキガイシャ</p>
        <p>ご不明な点がございましたら、お気軽にお問い合わせください。今後ともよろしくお願いいたします。</p>
        ');

        $mpdf->Output('../../invoice_pdf/' . $result[0]['invoice_id'] . '.pdf', 'F');
        $mpdf->showWatermarkText = True;
        unset($_SESSION['pay_limit']);

        // SMTP設定情報
        $config = new \stdClass();
        $config->username  = "mik4zuti.yuma@gmail.com";
        $config->useralias = "HAL自動車売買株式会社";
        $config->password  = "eymq lkie vnaj uuzi";

        $info = new \stdClass();
        $info->to      = "momiki.yuuma@gmail.com";
        $info->subject = "落札車両の請求に関するお知らせ";
        $info->message = "件名:[請求書に関するご案内]";

        $mailer = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mailer->CharSet = "iso-2022-jp-ms";
        $mailer->Encoding = "7bit";
        $mailer->IsSMTP();
        $mailer->Host = "smtp.gmail.com";
        $mailer->SMTPAuth = true;
        $mailer->SMTPDebug = 2;
        $mailer->SMTPSecure = "tls";
        $mailer->Port = 587;
        $mailer->Username = $config->username;
        $mailer->Password = $config->password;
        $mailer->setFrom($config->username, $config->useralias);

        $to = $info->to;
        $subject = $info->subject;
        $body = $info->message . "\r\n"
            . "\r\n"
            . $result[0]['customer_name'] . "様\r\n"
            . "HALCARSをご利用いただきありがとうございます。\r\n"
            . "オークションにて落札された車両につきまして、請求書案内をメールにてご送付いたします。\r\n"
            . "添付ファイルの内容をご確認の上、期日までにお振込みをお願いいたします。\r\n"
            . "------------------------------\r\n"
            . "添付ファイル:" . $result[0]['invoice_id'] . ".pdf 1通\r\n"
            . "ご請求番号:" . $result[0]['invoice_id'] . "\r\n"
            . "ご請求金額:" . number_format($result[0]['invoice_money']) . "円\r\n"
            . "支払期日:" . $result[0]['invoice_limit'] . "\r\n"
            . "------------------------------\r\n"
            . "何かご不明な点がございましたら、お気軽にお問い合わせください。\r\n"
            . "今後ともよろしくお願いいたします。\r\n"
            . "\r\n";
        $mailer->AddAddress($to);
        $mailer->Subject = mb_encode_mimeheader($subject, 'iso-2022-jp-ms');
        $mailer->Body    = mb_convert_encoding($body, "iso-2022-jp-ms", "utf-8");
        $mailer->addAttachment('../../invoice_pdf/' . $result[0]['invoice_id'] . '.pdf');
        ob_start();
        if ($mailer->Send()) {
            header("location:./auctiondetail.php");
            exit();
        }
    }
} else {
    header('location:./auctiondetail.php');
    exit();
}

require_once '../../views/manage/payrequestcheck.php';
