<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateCommentlikesTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS commentLikes (
            userId BIGINT ,
            commentId INT ,
          
            FOREIGN KEY (userId) REFERENCES users(id),
            FOREIGN KEY (commentId) REFERENCES comments(commentId),
            PRIMARY KEY (userId, commentId)
        
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE commentLikes"

        ];
    }
}