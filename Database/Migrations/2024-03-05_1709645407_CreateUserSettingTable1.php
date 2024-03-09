<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateUserSettingTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS userSettings (
            entryId INT PRIMARY KEY AUTO_INCREMENT,
            metaKey CHAR(1),
            metaValue VARCHAR(255),
            userId BIGINT,
            FOREIGN KEY (userId) REFERENCES users(id)
        
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE userSettings"

        ];
    }
}