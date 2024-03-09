<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class IntroducePostTaxonomiesTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return [" CREATE TABLE IF NOT EXISTS postTaxonomies (
            postTaxonomyId INT PRIMARY KEY AUTO_INCREMENT,
            postId INT,
            taxonomyTermId INT,
            FOREIGN KEY (postId) REFERENCES posts(id),
            FOREIGN KEY (taxonomyTermId) REFERENCES taxonomyTerms(taxonomyTermId)
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return ["
        DROP TABLE IF EXISTS postTaxonomies;
        "];
    }
}