<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class IntroduceTaxonomyTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["
        CREATE TABLE IF NOT EXISTS taxonomies (
            taxonomyId INT PRIMARY KEY AUTO_INCREMENT,
            taxonomyName VARCHAR(50),
            description VARCHAR(255)
        );
        "];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return ["
            DROP TABLE IF EXISTS taxonomies;
           
        "];
    }
}
