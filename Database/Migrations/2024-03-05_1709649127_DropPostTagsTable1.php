<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class DropPostTagsTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["DROP TABLE IF EXISTS postTags;"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return ["
        CREATE TABLE IF NOT EXISTS postTags (
            postId INT,
            tagId INT,
            FOREIGN KEY (postId) REFERENCES posts(id),
            FOREIGN KEY (tagId) REFERENCES tags(tagId)
        );
        "];
    }
}