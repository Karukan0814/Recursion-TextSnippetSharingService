<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
    ''=>function(): HTTPRenderer{
        //初期表示　スニペット作成ページ
        $part = DatabaseHelper::getRandomComputerPart();
        return new HTMLRenderer('new-snippet', ['part'=>$part]);
    },
    'snippet'=>function(): HTTPRenderer{
        // 指定されたスニペットの表示ページ
        // IDの検証
        $id = ValidationHelper::integer($_GET['id']??null);

        $part = DatabaseHelper::getComputerPartById($id);
        return new HTMLRenderer('component/parts', ['part'=>$part]);
    },
    'api/snippet/insert'=>function(): HTTPRenderer{
        // スニペットをDBに登録するAPI
        $part = DatabaseHelper::getRandomComputerPart();
        return new JSONRenderer(['part'=>$part]);
    },
    'api/parts'=>function(){
        $id = ValidationHelper::integer($_GET['id']??null);
        $part = DatabaseHelper::getComputerPartById($id);
        return new JSONRenderer(['part'=>$part]);
    },
];