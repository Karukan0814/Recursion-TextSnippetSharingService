<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreatePostlikesTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return [
            "CREATE TABLE IF NOT EXISTS postLikes (
                userId BIGINT ,
                postId INT ,
              
                FOREIGN KEY (userId) REFERENCES users(id),
                FOREIGN KEY (postId) REFERENCES posts(id),
                PRIMARY KEY (userId, postId)
            
            );"
        ];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE postLikes"
            
        ];
    }
}