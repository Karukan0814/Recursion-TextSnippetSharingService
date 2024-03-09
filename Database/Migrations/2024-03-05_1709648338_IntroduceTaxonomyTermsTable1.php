<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class IntroduceTaxonomyTermsTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["       CREATE TABLE IF NOT EXISTS taxonomyTerms (
            taxonomyTermId INT PRIMARY KEY AUTO_INCREMENT,
            taxonomyTermName VARCHAR(50),
            taxonomyTypeId INT,
            description VARCHAR(255),
            parentTaxonomyTerm INT,
            FOREIGN KEY (taxonomyTypeId) REFERENCES taxonomies(taxonomyId)
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return ["
        DROP TABLE IF EXISTS taxonomyTerms;
        "];
    }
}