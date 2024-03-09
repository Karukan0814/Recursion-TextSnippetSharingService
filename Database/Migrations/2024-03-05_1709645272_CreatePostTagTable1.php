<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreatePostTagTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS postTags (
            postId INT ,
            tagId INT ,
            FOREIGN KEY (postId) REFERENCES posts(id),
            FOREIGN KEY (tagId) REFERENCES tags(tagId)
        
        
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE postTags"

        ];
    }
}