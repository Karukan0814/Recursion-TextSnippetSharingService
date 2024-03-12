<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateSnippetTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS snippets (
            id INT PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(100),

            text VARCHAR(1000),
            url VARCHAR(500),
            syntax VARCHAR(50),
            expire_datetime DATETIME,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


           
        );
        "];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE snippets"

        ];
    }
}