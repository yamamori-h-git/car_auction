<?php

/** 
 * @pram　変更系のSQL文
 * @pram $host データベースの接続子
 * @pram $id DBのid
 * @pram $pass DBのパスワード
 * @pram $db データベース名
 * @pram $sql SQL文
 **/
function change_sql($host, $id, $pass, $db, $sql)
{
    $link = @mysqli_connect($host, $id, $pass, $db);
    if ($link != false) {
        mysqli_set_charset($link, 'utf8');
        mysqli_query($link, $sql);
        mysqli_close($link);
    } else {
        return '接続できませんでした';
    }
}


/** 
 * @pram　INSERTしたidの取得
 * @pram $host データベースの接続子
 * @pram $id DBのid
 * @pram $pass DBのパスワード
 * @pram $db データベース名
 * @pram $sql SQL文
 * @return 登録したid
 **/
function insert_sql_id($host, $id, $pass, $db, $sql)
{
    $link = @mysqli_connect($host, $id, $pass, $db);
    $list = [];
    if ($link != false) {
        mysqli_set_charset($link, 'utf8');
        mysqli_query($link, $sql);
        $id = mysqli_insert_id($link);
        mysqli_close($link);
        return $id;
    } else {
        return '接続できませんでした';
    }
}

/** 
 * @pram 参照系のSQL文
 * @pram $host データベースの接続子
 * @pram $id DBのid
 * @pram $pass DBのパスワード
 * @pram $db データベース名
 * @pram $sql SQL文
 **/
function select($host, $id, $pass, $db, $sql)
{
    $link = @mysqli_connect($host, $id, $pass, $db);
    $list = [];
    if ($link != false) {
        mysqli_set_charset($link, 'utf8');
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        mysqli_close($link);
        return $list;
    } else {
        return '接続できませんでした';
    }
}

/** 
 * @pram ハッシュ化
 * @pram $password パスワード
 * @pram $salt ソルト
 * @pram $strech ストレッチ
 **/
function get_hash($password, $salt, $strech)
{
    for ($i = 0; $i < $strech; $i++) {
        $password = md5($password . $salt);
    }
    return $password;
}
/** 
@pram ページャのページ数取得
@pram $host データベースの接続子
@pram $id DBのid
@pram $pass DBのパスワード
@pram $db データベース名
@pram $table テーブル名
@pram $const_num 一ページの項目数 
 **/

function pager_num($host, $id, $pass, $db, $table, $const_num)
{
    $link = @mysqli_connect($host, $id, $pass, $db);
    $sql = "SELECT COUNT(*) FROM " . $table . ";";
    $list = [];
    if ($link != false) {
        mysqli_set_charset($link, 'utf8');
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        mysqli_close($link);
        $page_num = ceil($list[0]['COUNT(*)'] / $const_num);


        return $page_num;
    } else {
        return '接続できませんでした';
    }
}
