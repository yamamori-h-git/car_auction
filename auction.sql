-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-11-09 08:58:11
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.6





SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `auction`
--
CREATE DATABASE IF NOT EXISTS `auction` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `auction`;

-- --------------------------------------------------------

--
-- テーブルの構造 `auction`
--

CREATE TABLE `auction` (
  `listing_id` int(11) NOT NULL COMMENT '出品番号',
  `car_id` int(11) NOT NULL COMMENT '車両番号',
  `auction_date` datetime NOT NULL COMMENT 'オークション日時',
  `listing_price` int(255) NOT NULL COMMENT '出品価格',
  `buyout` int(255) NOT NULL COMMENT '即決価格',
  `contract_price` int(255) NOT NULL COMMENT '落札価格',
  `listing_date` datetime NOT NULL COMMENT '出品日時',
  `listing_flg` int(1) NOT NULL COMMENT '出品状態フラグ',
  `pay_date` date NOT NULL COMMENT '支払日時',
  `payment` int(255) NOT NULL COMMENT '支払金額'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `auction`
--

INSERT INTO `auction` (`listing_id`, `car_id`, `auction_date`, `listing_price`, `buyout`, `contract_price`, `listing_date`, `listing_flg`, `pay_date`, `payment`) VALUES
(1, 10, '2023-11-07 10:00:00', 900000, 1000000, 1500000, '2023-07-14 12:24:31', 1, '2023-11-10', 1500000),
(2, 11, '2023-11-07 10:30:10', 1900000, 2000000, 2300000, '2023-06-12 17:14:12', 1, '2023-11-09', 2300000),
(3, 12, '2023-11-07 11:10:24', 800000, 950000, 1300000, '2023-07-24 12:24:31', 1, '2023-11-12', 1300000),
(4, 13, '2023-11-07 11:44:54', 1100000, 1400000, 1600000, '2023-08-14 10:54:20', 1, '2023-11-11', 1600000),
(5, 14, '2023-11-07 12:10:32', 2000000, 3200000, 2600000, '2023-05-15 11:11:11', 1, '2023-11-10', 2600000),
(6, 15, '2023-11-07 12:32:36', 990000, 1200000, 1200000, '2023-08-12 13:42:12', 1, '2023-11-12', 1200000),
(7, 16, '2023-11-07 13:02:42', 750000, 1000000, 1100000, '2023-08-01 16:22:52', 1, '2023-11-13', 1100000),
(8, 17, '2023-11-07 13:28:23', 1500000, 2000000, 1900000, '2023-07-11 18:31:38', 1, '2023-11-17', 1900000),
(9, 18, '2023-11-07 14:05:53', 3400000, 4500000, 4500000, '2023-05-10 10:55:10', 1, '2023-11-15', 4500000),
(10, 19, '2023-11-07 14:42:49', 5000000, 6000000, 6100000, '2023-06-12 12:02:12', 1, '2023-11-16', 6100000);

-- --------------------------------------------------------

--
-- テーブルの構造 `bid_history`
--

CREATE TABLE `bid_history` (
  `listing_id` int(11) NOT NULL COMMENT '出品番号',
  `customer_id` int(11) NOT NULL COMMENT '会員番号',
  `bit_price` int(255) NOT NULL COMMENT '入札価格',
  `bit_date` datetime NOT NULL COMMENT '入札日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `bid_history`
--

INSERT INTO `bid_history` (`listing_id`, `customer_id`, `bit_price`, `bit_date`) VALUES
(10, 10000, 1000000, '2023-11-07 10:21:32'),
(11, 10205, 2300000, '2023-11-07 10:54:12'),
(12, 20343, 900000, '2023-11-07 11:37:29'),
(13, 9746, 1250000, '2023-11-07 12:06:58'),
(14, 597, 2600000, '2023-11-07 12:27:31'),
(15, 27798, 1200000, '2023-11-07 12:57:21'),
(16, 7688, 1100000, '2023-11-07 13:22:22'),
(17, 27826, 1900000, '2023-11-07 13:53:18'),
(18, 92784, 4500000, '2023-11-07 14:36:25'),
(19, 16898, 6100000, '2023-11-07 15:12:42');

-- --------------------------------------------------------

--
-- テーブルの構造 `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(255) NOT NULL COMMENT '予約番号',
  `customer_id` int(6) NOT NULL COMMENT '会員番号',
  `car_id` int(255) NOT NULL COMMENT '車両番号',
  `visit_date` datetime NOT NULL COMMENT '見学日時',
  `rep_name` varchar(255) NOT NULL COMMENT '見学担当者名',
  `visit_flag` char(1) NOT NULL COMMENT '見学予約確定'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `car_id`, `visit_date`, `rep_name`, `visit_flag`) VALUES
(1, 5134, 10, '2023-10-11 13:10:10', '春　太郎', '1'),
(2, 24350, 11, '2023-10-10 14:00:30', '筒泉', '1');

-- --------------------------------------------------------

--
-- テーブルの構造 `car_img`
--

CREATE TABLE `car_img` (
  `Img_id` int(11) NOT NULL COMMENT '画像番号',
  `Car_id` int(11) NOT NULL COMMENT '車両番号',
  `Img_name` varchar(10) NOT NULL COMMENT '画像名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `car_main`
--

CREATE TABLE `car_main` (
  `car_id` int(11) NOT NULL COMMENT '車両番号',
  `car_name` varchar(255) NOT NULL COMMENT '車両名',
  `maker` varchar(20) NOT NULL COMMENT 'メーカ名',
  `grade` char(4) NOT NULL COMMENT 'グレード名',
  `car_year` date NOT NULL COMMENT '年式',
  `mileage` int(255) NOT NULL COMMENT '走行距離',
  `expiration` date NOT NULL COMMENT '車検有効期限',
  `body` char(4) NOT NULL COMMENT 'ボディタイプ',
  `model_name` char(4) NOT NULL COMMENT '車種名',
  `displacement` int(4) NOT NULL COMMENT '排気量',
  `model_year` char(17) NOT NULL COMMENT '輸入モデル年代',
  `mission` char(2) NOT NULL COMMENT 'ミッション',
  `car_model` varchar(20) NOT NULL COMMENT '型式',
  `color_name` varchar(20) NOT NULL COMMENT '色の名称',
  `car_purchase` int(255) NOT NULL COMMENT '仕入値',
  `car_points` varchar(3) NOT NULL COMMENT '評価点',
  `car_delete` char(1) NOT NULL COMMENT '車両削除',
  `Door_num` int(1) NOT NULL COMMENT 'ドア数',
  `Drive_system` char(10) NOT NULL COMMENT '駆動方式',
  `Inspection_Record` char(2) NOT NULL COMMENT '点検記録簿',
  `car_num(last3_digits)` int(255) NOT NULL COMMENT '車体番号(下3桁)',
  `Import_Routes` char(4) NOT NULL COMMENT '輸入経路',
  `car_history` varchar(255) NOT NULL COMMENT '車歴',
  `Terms_of_delivery` varchar(255) NOT NULL COMMENT '引き渡し条件',
  `Passenger_capacity` int(3) NOT NULL COMMENT '乗車定員数',
  `fuel` int(2) NOT NULL COMMENT '燃料',
  `Repair_history` varchar(255) NOT NULL COMMENT '修理歴',
  `Recycling_deposit` int(255) NOT NULL COMMENT 'リサイクル預託金',
  `handle` char(4) NOT NULL COMMENT 'ハンドル',
  `Owner_history` varchar(255) NOT NULL COMMENT '所有車歴',
  `aircon` char(4) NOT NULL COMMENT 'エアコン',
  `pawasute` char(4) NOT NULL COMMENT 'パワステ',
  `powerwindow` char(4) NOT NULL COMMENT 'パワーウィンドウ',
  `Door_lock` char(4) NOT NULL COMMENT '集中ドアロック',
  `Abs` char(4) NOT NULL COMMENT 'ABS',
  `Airbag` char(4) NOT NULL COMMENT 'エアバンク',
  `Etc` char(4) NOT NULL COMMENT 'ETC',
  `Not_key` char(4) NOT NULL COMMENT 'キーレスエントリー',
  `Smart_key` char(4) NOT NULL COMMENT 'スマートキー',
  `Cd` char(4) NOT NULL COMMENT 'CD',
  `Md` char(4) NOT NULL COMMENT 'MD',
  `Dvd` char(4) NOT NULL COMMENT 'DVDビデオ',
  `TV` char(4) NOT NULL COMMENT 'テレビ',
  `navi` char(4) NOT NULL COMMENT 'ナビゲーション',
  `Back_camera` char(4) NOT NULL COMMENT 'バックカメラ',
  `Slide_door` char(4) NOT NULL COMMENT '電動スライドドア',
  `Sun_roof` char(4) NOT NULL COMMENT 'サンルーフ',
  `Leather_seat` char(4) NOT NULL COMMENT '本革シート',
  `Pure_aero` char(4) NOT NULL COMMENT '純正エアロパーツ',
  `Pure_alum` char(4) NOT NULL COMMENT '純正アルミホイール',
  `Sideslip_ prevention` char(4) NOT NULL COMMENT '横滑り防止装置',
  `Traction_control` char(4) NOT NULL COMMENT 'トラクションコントロール',
  `Cold_car` char(4) NOT NULL COMMENT '寒冷地帯仕様書',
  `Welfare_car` char(4) NOT NULL COMMENT '福祉車両',
  `Low_down` char(4) NOT NULL COMMENT 'ローダウン',
  `Non_smoking_cars` char(4) NOT NULL COMMENT '禁煙車',
  `Pet_car` char(4) NOT NULL COMMENT 'ペット同乗なし',
  `Limited_car` char(4) NOT NULL COMMENT '限定車',
  `explanation` char(4) NOT NULL COMMENT '取扱説明書',
  `Warranty_Card` char(4) NOT NULL COMMENT '新車時保証書',
  `Spare_tire` char(4) NOT NULL COMMENT 'スペアタイヤ',
  `car_date` date NOT NULL COMMENT '車両登録日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `car_model`
--

CREATE TABLE `car_model` (
  `model_number` char(4) NOT NULL COMMENT '車種番号',
  `model_name` varchar(255) NOT NULL COMMENT '車種名',
  `maker` varchar(255) NOT NULL COMMENT 'メーカ名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `car_parts`
--

CREATE TABLE `car_parts` (
  `AR01` char(4) NOT NULL COMMENT 'エアコンあり',
  `AR02` char(4) NOT NULL COMMENT 'エアコンなし',
  `PS01` char(4) NOT NULL COMMENT 'パワステ油圧式',
  `PS02` char(4) NOT NULL COMMENT 'パワステ電動式',
  `PW01` char(4) NOT NULL COMMENT 'パワーウィンドウ手動',
  `PW02` char(4) NOT NULL COMMENT 'パワーウィンドウ電動',
  `SR01` char(4) NOT NULL COMMENT '集中ドアロックあり',
  `SR02` char(4) NOT NULL COMMENT '集中ドアロックなし',
  `AB01` char(4) NOT NULL COMMENT 'ABSあり',
  `AB02` char(4) NOT NULL COMMENT 'ABSなし',
  `AI01` char(4) NOT NULL COMMENT 'エアバックあり',
  `AI02` char(4) NOT NULL COMMENT 'エアバックなし',
  `ET01` char(4) NOT NULL COMMENT 'ETCあり',
  `ET02` char(4) NOT NULL COMMENT 'ETCなし',
  `KL01` char(4) NOT NULL COMMENT 'キーレスエントリーあり',
  `KL02` char(4) NOT NULL COMMENT 'キーレスエントリーなし',
  `SK01` char(4) NOT NULL COMMENT 'スマートキーあり',
  `SK02` char(4) NOT NULL COMMENT 'スマートキーなし',
  `CD01` char(4) NOT NULL COMMENT 'CD取り付けあり',
  `CD02` char(4) NOT NULL COMMENT 'CD取り付けなし',
  `MD01` char(4) NOT NULL COMMENT 'MDあり',
  `MD02` char(4) NOT NULL COMMENT 'MDなし',
  `DV01` char(4) NOT NULL COMMENT 'DVDビデオあり',
  `DV02` char(4) NOT NULL COMMENT 'DVDビデオありなし',
  `TV01` char(4) NOT NULL COMMENT 'テレビあり',
  `TV02` char(4) NOT NULL COMMENT 'テレビなし',
  `NV01` char(4) NOT NULL COMMENT 'ナヴィゲーションあり',
  `NV02` char(4) NOT NULL COMMENT 'ナヴィゲーションなし',
  `BC01` char(4) NOT NULL COMMENT 'バックカメラあり',
  `BC02` char(4) NOT NULL COMMENT 'バックカメラなし',
  `DS01` char(4) NOT NULL COMMENT '電動スライドドアあり',
  `DS02` char(4) NOT NULL COMMENT '電動スライドドアなし',
  `DS03` char(4) NOT NULL COMMENT '電動スライドドア片方のみ',
  `SN01` char(4) NOT NULL COMMENT 'サンルーフあり',
  `SN02` char(4) NOT NULL COMMENT 'サンルーフなし',
  `HN01` char(4) NOT NULL COMMENT '本革シートあり',
  `HN02` char(4) NOT NULL COMMENT '本革シートなし',
  `JP01` char(4) NOT NULL COMMENT '純正エアロパーツあり',
  `JP02` char(4) NOT NULL COMMENT '純正エアロパーツなし',
  `JH01` char(4) NOT NULL COMMENT '純正アルミホイールあり',
  `JH02` char(4) NOT NULL COMMENT '純正アルミホイールなし',
  `YS01` char(4) NOT NULL COMMENT '横滑り防止装置正常',
  `YS02` char(4) NOT NULL COMMENT '横滑り防止装置異常',
  `TK01` char(4) NOT NULL COMMENT 'トラクションコントロールあり',
  `TK02` char(4) NOT NULL COMMENT 'トラクションコントロールなし',
  `KA01` char(4) NOT NULL COMMENT '寒冷地仕様である',
  `KA02` char(4) NOT NULL COMMENT '寒冷地仕様ではない',
  `HK01` char(4) NOT NULL COMMENT '福祉車両である',
  `HK02` char(4) NOT NULL COMMENT '福祉車両ではない',
  `LD01` char(4) NOT NULL COMMENT 'ローダウンしている',
  `LD02` char(4) NOT NULL COMMENT 'ローダウンしていない',
  `KI01` char(4) NOT NULL COMMENT '禁煙車である',
  `KI02` char(4) NOT NULL COMMENT '禁煙車ではない',
  `PE01` char(4) NOT NULL COMMENT 'ペット同乗（犬）',
  `PE02` char(4) NOT NULL COMMENT 'ペット同乗（猫）',
  `PE03` char(4) NOT NULL COMMENT 'ペット同乗（他）',
  `PE04` char(4) NOT NULL COMMENT 'ペット同乗（なし）',
  `GE01` char(4) NOT NULL COMMENT '限定車である',
  `GE02` char(4) NOT NULL COMMENT '限定車でない',
  `TO01` char(4) NOT NULL COMMENT '取扱説明書あり',
  `TO02` char(4) NOT NULL COMMENT '取扱説明書なし',
  `SI01` char(4) NOT NULL COMMENT '新車時保証書あり',
  `SI02` char(4) NOT NULL COMMENT '新車時保証書なし',
  `SP01` char(4) NOT NULL COMMENT 'スペアタイヤあり',
  `SP02` char(4) NOT NULL COMMENT 'スペアタイヤなし',
  `HD01` char(4) NOT NULL COMMENT 'ハンドル右',
  `HD02` char(4) NOT NULL COMMENT 'ハンドル左'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(6) NOT NULL COMMENT '会員番号',
  `customer_name` varchar(255) NOT NULL COMMENT '会員名',
  `customer_birth` char(10) NOT NULL COMMENT '生年月日',
  `customer_gender` char(1) NOT NULL COMMENT '性別',
  `customer_mobilenumber` char(13) NOT NULL COMMENT '電話番号(携帯)',
  `customer_number` char(12) NOT NULL COMMENT '電話番号(固定)',
  `customer_zip` char(8) NOT NULL COMMENT '郵便番号',
  `customer_address` varchar(20) NOT NULL COMMENT '住所(都道府県)',
  `customer_address2` varchar(50) NOT NULL COMMENT '住所(市町村・番地・マンション)',
  `customer_username` varchar(20) NOT NULL COMMENT 'ユーザ名',
  `customer_mail` varchar(255) NOT NULL COMMENT 'メールアドレス',
  `customer_register` date NOT NULL COMMENT '登録日時',
  `customer_delete` char(1) NOT NULL COMMENT '退会'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `delivery_table`
--

CREATE TABLE `delivery_table` (
  `car_id` int(11) NOT NULL COMMENT '車両番号',
  `customer_id` int(6) NOT NULL COMMENT '会員番号',
  `customer_name` varchar(255) NOT NULL COMMENT '氏名',
  `delivery_data` date NOT NULL COMMENT '受け渡し日時',
  `representative` varchar(255) NOT NULL COMMENT '担当者名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `grade`
--

CREATE TABLE `grade` (
  `grade_number` char(5) NOT NULL COMMENT 'グレード番号',
  `grade_name` varchar(255) NOT NULL COMMENT 'グレード名',
  `model_number` char(4) NOT NULL COMMENT '車種番号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL COMMENT '請求書番号',
  `cusstomer_id` int(6) NOT NULL COMMENT '会員番号',
  `Car_id` int(11) NOT NULL COMMENT '車両番号',
  `Invoice_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '請求日',
  `Invoice_money` int(255) NOT NULL COMMENT '請求金額'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `login`
--

CREATE TABLE `login` (
  `login_id` varchar(20) NOT NULL COMMENT 'ログインID',
  `password` varchar(20) NOT NULL COMMENT 'パスワード',
  `salt` char(10) NOT NULL COMMENT 'ソルト'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`listing_id`);

--
-- テーブルのインデックス `bid_history`
--
ALTER TABLE `bid_history`
  ADD PRIMARY KEY (`listing_id`);

--
-- テーブルのインデックス `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- テーブルのインデックス `car_img`
--
ALTER TABLE `car_img`
  ADD PRIMARY KEY (`Img_id`);

--
-- テーブルのインデックス `car_main`
--
ALTER TABLE `car_main`
  ADD PRIMARY KEY (`car_id`);

--
-- テーブルのインデックス `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`model_number`);

--
-- テーブルのインデックス `car_parts`
--
ALTER TABLE `car_parts`
  ADD PRIMARY KEY (`AR01`);

--
-- テーブルのインデックス `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- テーブルのインデックス `delivery_table`
--
ALTER TABLE `delivery_table`
  ADD PRIMARY KEY (`car_id`,`customer_id`);

--
-- テーブルのインデックス `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_number`);

--
-- テーブルのインデックス `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- テーブルのインデックス `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
