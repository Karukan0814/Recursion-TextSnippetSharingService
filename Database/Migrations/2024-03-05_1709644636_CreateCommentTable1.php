<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateCommentTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS comments (
            commentId INT PRIMARY KEY AUTO_INCREMENT,
            commentText VARCHAR(250),
            userId BIGINT,
            postId INT,
        
            createdAt DATETIME,
            updatedAt DATETIME,
            FOREIGN KEY (userId) REFERENCES users(id) ,
            FOREIGN KEY (postId) REFERENCES posts(id) 
        
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [

            "DROP TABLE comments"

        ];
    }
}