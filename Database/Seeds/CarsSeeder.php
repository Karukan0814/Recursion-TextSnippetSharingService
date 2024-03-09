<?php


namespace Database\Seeds;
require_once 'vendor/autoload.php';

use Database\AbstractSeeder;
use DateTime;
use Faker\Factory;

class CarsSeeder extends AbstractSeeder
{
    protected ?string $tableName = 'cars';

    protected array $tableColumns = [
        // [
        //     'data_type' => 'int',
        //     'column_name' => 'id'
        // ],
        [
            'data_type' => 'string',
            'column_name' => 'make'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'model'
        ],
        [
            'data_type' => 'int',
            'column_name' => 'year'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'color'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'price'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'mileage'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'transmission'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'engine'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'status'
        ]
           ];

    public function createRowData(): array
    {
        //fakerを使用してinsertするデータを自動で1000件作成する
        $faker = Factory::create();
        $insertDatas = [];
        for ($i = 1; $i <= 1000; $i++) {
            $now = new DateTime();
            $timestamp = $now->getTimestamp();
            $data = [
                $faker->text(20),
                $faker->text(20),
                $faker->randomNumber(),
                $faker->colorName(),
                $faker->randomFloat(2, 0, 10000),
                $faker->randomFloat(2, 0, 10000),
                $faker->text(20),
                $faker->text(20),
                $faker->text(10),
            ];

            $insertDatas[] = $data;
        };
        return $insertDatas;
    }
}
