<?php

namespace Helpers;

use Database\MySQLWrapper;
use DateTime;
use Exception;

class DatabaseHelper
{
    public static function insertSnippet($uid,$title,$text,  $syntax, $expireDatetime): array {
        $db = new MySQLWrapper();
    
        // INSERT文を準備
        $stmt = $db->prepare("INSERT INTO snippets (uid,title,text,  syntax, expire_datetime) VALUES (?,?, ?, ?, ?)");
    
        // パラメータをバインド
        $stmt->bind_param('sssss', $uid,$title, $text, $syntax, $expireDatetime);
    
        // SQLを実行
        $stmt->execute();
    
        // // 挿入された行のIDを取得
        // $insertedId = $stmt->insert_id;
    
        // 挿入された行を取得
        $stmt = $db->prepare("SELECT * FROM snippets WHERE uid = ?");
        $stmt->bind_param('i', $uid);
        $stmt->execute();
        $result = $stmt->get_result();
        $snippet = $result->fetch_assoc();
    
        if (!$snippet) throw new Exception('Could not retrieve the inserted snippet');
    
        return $snippet;
    }
    
    public static function deleteAllExpiredSnippets(){
        $db = new MySQLWrapper();

        // 現在時刻を取得
        $now = new DateTime();
    
        // 有効期限が現在時刻を過ぎたスニペットを削除
        $stmt = $db->prepare("DELETE FROM snippets WHERE expire_datetime IS NOT NULL AND expire_datetime < ?");
        $nowFormat=$now->format('Y-m-d H:i:s');
        $stmt->bind_param('s', $nowFormat );
        $stmt->execute();
    
        // 削除された行数を返す
        return $stmt->affected_rows;
    }

    public static function getAllSnippets(): array{
        $db = new MySQLWrapper();

        $stmt = $db->prepare("SELECT * FROM snippets ORDER BY created_at DESC");
        $stmt->execute();
        $result = $stmt->get_result();
    
        $snippets = [];
        while ($snippet = $result->fetch_assoc()) {
            $snippets[] = $snippet;
        }
    
        
    
        return $snippets;
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
