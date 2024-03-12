<?php


namespace Database\Seeds;
require_once 'vendor/autoload.php';

use Database\AbstractSeeder;
use DateTime;
use Faker\Factory;

class SnippetSeeder extends AbstractSeeder
{
    protected ?string $tableName = 'snippet';

    protected array $tableColumns = [
        [
            'data_type' => 'string',
            'column_name' => 'title'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'text'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'url'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'language'
        ],
        [
            'data_type' => 'int',
            'column_name' => 'expire_datetime'
        ],
       
           ];

    public function createRowData(): array
    {
        //fakerを使用してinsertするデータを自動で1000件作成する
        // $faker = Factory::create();
        $insertDatas = [];
        // for ($i = 1; $i <= 1000; $i++) {
        //     $now = new DateTime();
        //     $timestamp = $now->getTimestamp();
        //     $data = [
        //         $faker->text(20),
        //         $faker->text(20),
        //         $faker->randomNumber(),
        //         $faker->colorName(),
        //         $faker->randomFloat(2, 0, 10000),
        //         $faker->randomFloat(2, 0, 10000),
        //         $faker->text(20),
        //         $faker->text(20),
        //         $faker->text(10),
        //     ];

        //     $insertDatas[] = $data;
        // };
        return $insertDatas;
    }
}
