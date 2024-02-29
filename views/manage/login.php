<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../public/css/destyle.css">
    <link rel="stylesheet" href="../../views/manage/css/style.css">
    <title>管理者　ログイン画面</title>
</head>

<body>
    <div class="">
        <h2>ログイン</h2>

        <?php if ('' != $msg) { ?>
            <p class="err"><?php echo $msg; ?></p>
        <?php } ?>
        <form action="" method="post">
            <?php if (!empty($err)) {
                if (isset($err['id'])) {
                    $id = "input_err";
                } else {
                    $id = "";
                } ?>
                <?php if (isset($err['password'])) {
                    $pass = "input_err";
                } else {
                    $pass = "";
                }
                ?>

            <?php } ?>
            <input type="text" placeholder="ログインID" name="login_id" class="<?php echo $id; ?>" />
            <?php if (isset($err['id'])) { ?>
                <p class="err" style="font-size: 12px"><?php echo $err['id']; ?></p>
            <?php } ?>
            <input type="password" placeholder="パスワード" name="password" class="<?php echo $pass; ?>" />
            <?php if (isset($err['password'])) { ?>
                <p class="err" style="font-size: 12px"><?php echo $err['password']; ?></p>
            <?php } ?>
            <button type="submit" name="insert">ログイン</button>
        </form>
    </div>
</body>

</html>