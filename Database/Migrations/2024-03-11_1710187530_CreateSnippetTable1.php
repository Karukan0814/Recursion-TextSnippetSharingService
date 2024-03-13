<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateSnippetTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS snippets (
            uid VARCHAR(500) PRIMARY KEY,
            title VARCHAR(100),
            text VARCHAR(1000),
            syntax VARCHAR(50),
            expire_datetime DATETIME NULL,
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