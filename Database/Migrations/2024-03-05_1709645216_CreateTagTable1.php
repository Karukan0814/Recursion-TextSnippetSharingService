<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateTagTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS tags (
            tagId INT PRIMARY KEY AUTO_INCREMENT,
            tagName VARCHAR(50)
        
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE tags"

        ];
    }
}