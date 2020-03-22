<?php
/*
--------------------------------------------------------------------------------

Kei Funatsuya Contact Form Utility

--------------------------------------------------------------------------------
*/
// -----------------------------------------------------------------------------
// 定義（項目と入力例）
// -----------------------------------------------------------------------------
$items = array();
// 項目名（日本語）
$items['Name']['name']				= "Name";
$items['Email']['name']				= "Email";
$items['Contents']['name']			= "Content";


// -----------------------------------------------------------------------------
// 定義（エラーメッセージ）
// -----------------------------------------------------------------------------
$errmsg = array();
// エラーメッセージ
$errmsg['Name']['required']			= $items['Name']['name'] . "のご入力をお願いします";
$errmsg['Name']['maxlength']		= $items['Name']['name'] . "は50文字以下でのご入力をお願いします";
$errmsg['Email']['required']		= $items['Email']['name'] . "のご入力をお願いします";
$errmsg['Email']['format']			= $items['Email']['name'] . "はアルファベットと＠でのご入力をお願いします";
$errmsg['Email']['maxlength']		= $items['Email']['name'] . "は50文字以下でのご入力をお願いします";
$errmsg['Contents']['required']		= $items['Contents']['name'] . "のご入力をお願いします";
$errmsg['Contents']['maxlength']	= $items['Contents']['name'] . "は1,000文字以下でのご入力をお願いします";

// -----------------------------------------------------------------------------
// 定義（メール関連）
// -----------------------------------------------------------------------------
$maildate = date("Y\.m\.d H:i");
$mailAutoReply = array();
// 自動返信メールテンプレート（お問い合わせ者本人用）（日本語/英語）
$mailAutoReply['header']			= "From: " .mb_encode_mimeheader("Kei Funatsuya") ."<kei.funatsuya@gmail.com>";
$mailAutoReply['subject']			= "【】お問い合わせ内容";
$mailAutoReply['to']				= ""; // Replace Input Value
$mailAutoReply['body']				= ""; // Replace Input Value
$mailAutoReply['template']			= "
お問い合わせ内容は以下の内容で送信致しました。

※このメールは自動返信メールにてお送りしております。
　本メールには返信しないようお願いいたします。

--------------------------------------------------------------------------------
";
$mailAutoReply['templatefoot']		= "
--------------------------------------------------------------------------------

Kei Funatsuya

--------------------------------------------------------------------------------
";
/*

【名前】：<名前>

【Email】：<Email>

【お問い合わせ内容】：

*/

$mailAutoNoticeTemplate = array();
// 自動返信メールテンプレート（当サイト管理者用）（日本語/英語）
$mailAutoNotice['header']			= "From: " .mb_encode_mimeheader("Kei Funatsuya") ."<kei.funatsuya@gmail.com>";
$mailAutoNotice['subject']			= "【Kei Funatsuya】お問い合わせのお知らせ - " . $maildate;
$mailAutoNotice['to'][MODE_DEBUG]	= "kei.funatsuya@gmail.com"; 
$mailAutoNotice['to'][MODE_LIVE]	= "kei.funatsuya@gmail.com";
$mailAutoNotice['body']				= ""; // Replace Input Value
$mailAutoNotice['template']			= "
Webサイトからお問い合わせが入りました。
ご対応をお願いいたします。

--------------------------------------------------------------------------------
";
/*

【名前】：<名前>

【Email】：<Email>

【お問い合わせ内容】：

*/

// -----------------------------------------------------------------------------
// お問い合わせ処理（バリデーション含む）
// -----------------------------------------------------------------------------
// Contact Status & Validation Check

$error = array();
$posts = $_POST;

if( isset($posts['status']) ) { // Confirm or Thanks

	$status = $posts['status'];

	$uri = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	$referer = $_SERVER['HTTP_REFERER'];
	if($uri !== $referer) {
		return;
	}
	
	// Status : Confirm ----------
	if( $status == STATUS_CONFIRM ) {

		// 迷惑メール対策としてダミーの入力フォームを設置
		if( !empty($posts['d_text']) ) {
			return;
		}
		
		// Name
		if( empty($posts['Name']) ){
			$error['Name'] = $errmsg['Name']['required'];
		}else{
			if( mb_strlen($posts['Name']) > 50 ) {
				$error['Name'] = $errmsg['Name']['maxlength'];
			}
		}
		// Email
		if( empty( $posts['Email'] ) ) {
			$error['Email'] = $errmsg['Email']['required'];
		} else {
			if( preg_match( "|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|",$posts['Email'] ) ) {
				if( mb_strlen( $posts['Email'] ) > 50) {
					$error['Email'] = $errmsg['Email']['maxlength'];
				}
			} else {
				$error['Email'] = $errmsg['Email']['format'];
			}
		}
		// Contents
		if( empty( $posts['Contents'] ) ) {
			$error['Contents'] = $errmsg['Contents']['required'];
		} else {
			if( mb_strlen( $posts['Contents'] ) > 1000 ) {
				$error['Contents'] = $errmsg['Contents']['maxlength'];
			}
		}

		// !!! Success -> Status is THANKS
		$status = STATUS_THANKS;
		if( count($error) ) {
			// !!! Error   -> Status is INPUT
			$status = STATUS_INPUT;
		}
	}
	
	// Status : Thanks ----------
	if( $status == STATUS_THANKS ) {
		
		// Mail Data Make
		$body_tmp = NULL;
		$line_length = 0;
		$body  = "【". $items['Name']['name'] ."】：" . $posts['Name'] ."\n"."\n";
		$body .= "【". $items['Email']['name'] ."】：" . $posts['Email'] ."\n"."\n";
		/////////////////////////////////////////////////////////////////////////
		// 改行(一行)ごとにデータを取得する
		$line = mb_split("\n", $posts['Contents']);
		$body_tmp = NULL;
		$line_length = 0;
		// 1行あたりの制限文字数（日本語を取り扱う前提） 39*2 = 78 Byte
		$part_length = 39;
		for ($i = 0; $i < count($line); $i++) {
			$line_length = strlen($line[$i]);
			$one_line = NULL;
			// ASCII文字のみであれば、最大制限文字数の2倍の文字数までを許可する
			if ($line_length > ($part_length * 2)) {
				$mb_length = mb_strlen($line[$i]);
				// メール全体の行数を求める
				if (($mb_length % $part_length) == 0) {
					$loop_cnt = $mb_length / $part_length;
				} else {
					$loop_cnt = ceil(mb_strlen($line[$i]) / $part_length);
				}
				$start_num = 0;
				// 1行ごとに制限文字数内で分解して改行コードを挿入する
				for ($j = 1; $j <= $loop_cnt; $j++) {
					// 制限文字数単位で改行コード挿入
					$one_line .= mb_substr($line[$i], $start_num, $part_length) . "\r\n";
					$start_num = $part_length * $j;
				}
			} else {
				$one_line = $line[$i] . "\r\n";
			}
			$body_tmp .= $one_line;
		}
		/////////////////////////////////////////////////////////////////////////
		$body .= "【". $items['Contents']['name'] ."】：" ."\n"."\n" . $body_tmp ."\n"."\n";
		
		// Auto Reply
		$mailAutoReply['to'] = $posts['Email'];
		$mailAutoReply['body'] = $mailAutoReply['template'] . $body . $mailAutoReply['templatefoot'];
		mb_send_mail( $mailAutoReply['to'], $mailAutoReply['subject'], $mailAutoReply['body'], $mailAutoReply['header'] );
		
		// Auto Notice
		$mailAutoNotice['body'] = $mailAutoNotice['template'] . $body;
		mb_send_mail( $mailAutoNotice['to'][$mode], $mailAutoNotice['subject'], $mailAutoNotice['body'], $mailAutoNotice['header'] );
		
	}

// debug
//if( isset($posts) ) {
//	var_dump($posts);
//}

}

?>