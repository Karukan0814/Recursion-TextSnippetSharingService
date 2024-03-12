<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
    '' => function (): HTTPRenderer {
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
print_r($allErrors);
            //TODO 全てのエラーをスニペット作成ページに引き渡したい
        }

        // エラーがなかった場合、スニペットをテーブルに登録

        // urlを生成する
        $currentTime = new DateTime();
        $timestamp=$currentTime->getTimestamp();
        $randomNumber = random_int(1, 10000);// 安全なランダムな整数を生成
        $url=strval($randomNumber).strval($timestamp);
        $result = DatabaseHelper::insertSnippet($titleRes["value"],$textRes["value"],$url,$syntaxRes["value"],$expireRes["value"]);
        print_r($result);
        $data="";
        return new HTMLRenderer('show-snippet', ["data",$data]);
    },
    'show' => function (): HTTPRenderer {
        // 指定されたスニペットの表示ページ
        // IDの検証
        $id = ValidationHelper::integer($_GET['id'] ?? null);

        $part = DatabaseHelper::getComputerPartById($id);
        return new HTMLRenderer('component/parts', ['part' => $part]);
    },
];
