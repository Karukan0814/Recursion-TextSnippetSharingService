<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateCarssTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS cars (
            id INT PRIMARY KEY AUTO_INCREMENT,
            make VARCHAR(50),
            model VARCHAR(50),
            year INT,
            color VARCHAR(20),
            price FLOAT,
            mileage FLOAT,
            transmission VARCHAR(20),
            engine VARCHAR(20),
            status VARCHAR(10)
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE cars;"

        ];
    }
}