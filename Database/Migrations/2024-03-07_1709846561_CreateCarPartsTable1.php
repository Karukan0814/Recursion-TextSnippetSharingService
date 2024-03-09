<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateCarPartsTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE IF NOT EXISTS parts (
            id INT PRIMARY KEY AUTO_INCREMENT,
            carId INT,
            name VARCHAR(50),
            description VARCHAR(200),
            price FLOAT,
            quantityStock INT,

            FOREIGN KEY (carId) REFERENCES cars(id)
           
        );
        "];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE parts;"

        ];
    }
}