<?php


        // プロトコルを取得
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';

        // ホスト名を取得
        $host = $_SERVER['HTTP_HOST'];
        
        
        // 完全なURLを組み立てる
        $linkUrl = $protocol . '://' . $host."?uid=". $uid;

?>
<div>
    <?= $uid ? 
        '<p>Your text has been registered successfully! Link is below.</p>
        <a href="' . htmlspecialchars($linkUrl) . '">' . htmlspecialchars($linkUrl) . '</a>' :
        '<p>Registering your snippet was failed!</p>' ?>
</div>