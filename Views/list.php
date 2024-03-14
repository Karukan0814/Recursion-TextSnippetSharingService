<?php

use Database\MySQLWrapper;

// データベース接続を初期化します
$db = new MySQLWrapper();



//スニペットのリストを表示する



// phpによる処理をすべき場合は前段に記述

?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php if (empty($snippets)): ?>
                <div class="alert alert-info">スニペットは登録されていません。</div>
            <?php else: ?>
                <ul class="list-group">
                    <?php foreach ($snippets as $snippet): ?>
                        <li class="list-group-item">
                            <a href="/show?uid=<?= htmlspecialchars($snippet['uid']) ?>" class="text-decoration-none">
                                <h5><?= htmlspecialchars($snippet['title']) ?></h5>
                                <small>Syntax: <?= htmlspecialchars($snippet['syntax']) ?></small><br>
                                <small>Expire: <?= $snippet['expire_datetime'] ? htmlspecialchars($snippet['expire_datetime']) : "Never" ?></small>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>