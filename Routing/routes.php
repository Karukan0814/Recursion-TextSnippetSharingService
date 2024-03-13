<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
    '' => function (): HTTPRenderer {
        //初期表示　スニペットリストページ

        //TODO 期限切れのスニペット全てを削除する

        // 登録してある全てのスニペットを表示
        $snippets = DatabaseHelper::getAllSnippets();
        return new HTMLRenderer('list', ['snippets'=>$snippets]);
    },
    'create' => function (): HTTPRenderer {
        //初期表示　スニペット作成ページ
        // $part = DatabaseHelper::getRandomComputerPart();
        return new HTMLRenderer('new-snippet', []);
    },
    'register' => function (): HTTPRenderer {
        // スニペットの登録→表示ページへ遷移

        //登録するスニペットのバリデーション
        $titleRes = ValidationHelper::validateText($_POST['title'] ?? null,1,100);

        $textRes = ValidationHelper::validateText($_POST['text'] ?? null,1,1000);

        $syntaxRes = ValidationHelper::validateSyntax($_POST['syntax'] ?? null);

        $expireRes = ValidationHelper::validateExpireDatetime($_POST['expire'] ?? null);
        if (count($textRes["error"]) > 0 || count($syntaxRes["error"]) > 0 || count($expireRes["error"]) > 0) {
            $allErrors = array_merge($textRes["error"], $syntaxRes["error"], $expireRes["error"]);
            //全てのエラーをスニペット作成ページに引き渡す
        return new HTMLRenderer('new-snippet', ['errors'=>$allErrors]);

        }

        // エラーがなかった場合、スニペットをテーブルに登録
        // urlを生成する
        $currentTime = new DateTime();
        $timestamp=$currentTime->getTimestamp();
        $randomNumber = random_int(1, 500);// 安全なランダムな整数を生成
        $uid=strval($randomNumber).strval($timestamp);
        $result = DatabaseHelper::insertSnippet($uid,$titleRes["value"],$textRes["value"],$syntaxRes["value"],$expireRes["value"]);
        // print_r($result);
        return new HTMLRenderer('show-snippet', ["snippet"=>$result]);
        
    },
    'show' => function (): HTTPRenderer {
        // 指定されたスニペットの表示ページ
        // IDの検証
        $id = ValidationHelper::integer($_GET['uid'] ?? null);

        // $part = DatabaseHelper::getComputerPartById($id);
        return new HTMLRenderer('show-snippet', ['data' => []]);
    },
];
