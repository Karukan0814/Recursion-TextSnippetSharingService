<?php

namespace Helpers;

use Database\MySQLWrapper;
use Exception;

class DatabaseHelper
{
    public static function insertSnippet($title,$text,  $url,$syntax, $expireDatetime): array {
        $db = new MySQLWrapper();
    
        // INSERT文を準備
        $stmt = $db->prepare("INSERT INTO snippets (title,text, url, syntax, expire_datetime) VALUES (?,?, ?, ?, ?)");
    
        // パラメータをバインド
        $stmt->bind_param('sssss',$title, $text, $url, $syntax, $expireDatetime);
    
        // SQLを実行
        $stmt->execute();
    
        // 挿入された行のIDを取得
        $insertedId = $stmt->insert_id;
    
        // 挿入された行を取得
        $stmt = $db->prepare("SELECT * FROM snippets WHERE id = ?");
        $stmt->bind_param('i', $insertedId);
        $stmt->execute();
        $result = $stmt->get_result();
        $snippet = $result->fetch_assoc();
    
        if (!$snippet) throw new Exception('Could not retrieve the inserted snippet');
    
        return $snippet;
    }
    
    public static function getRandomComputerPart(): array{
        $db = new MySQLWrapper();

        $stmt = $db->prepare("SELECT * FROM computer_parts ORDER BY RAND() LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $part = $result->fetch_assoc();

        if (!$part) throw new Exception('Could not find a single part in database');

        return $part;
    }

    public static function getComputerPartById(int $id): array{
        $db = new MySQLWrapper();

        $stmt = $db->prepare("SELECT * FROM computer_parts WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $part = $result->fetch_assoc();

        if (!$part) throw new Exception('Could not find a single part in database');

        return $part;
    }
}
