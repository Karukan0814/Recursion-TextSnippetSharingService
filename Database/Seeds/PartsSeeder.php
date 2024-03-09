<?php


namespace Database\Seeds;

require_once 'vendor/autoload.php';

use Database\AbstractSeeder;
use Database\MySQLWrapper;
use DateTime;
use Faker\Factory;

class PartsSeeder extends AbstractSeeder
{
    protected ?string $tableName = 'parts';

    protected array $tableColumns = [
        // [
        //     'data_type' => 'int',
        //     'column_name' => 'id'
        // ],
        [
            'data_type' => 'int',
            'column_name' => 'carId'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'name'
        ],

        [
            'data_type' => 'string',
            'column_name' => 'description'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'price'
        ],

        [
            'data_type' => 'int',
            'column_name' => 'quantityStock'
        ]
    ];

    public function createRowData(): array
    {
        //fakerを使用してinsertするデータを自動で10000件作成する

        // $mysqli = new MySQLWrapper();
        // $result = $mysqli->query("SELECT id from cars;");
        // $carIds = [];
        // while ($row = $result->fetch_assoc()) {
        //     $carIds[] = $row['id'];  // 各行の 'id' 列の値を配列に追加
        // }


        $faker = Factory::create();
        $insertDatas = [];
        for ($i = 1; $i <= 10000; $i++) {
            // $carId =   $carIds[$i % 100];
            $data = [
                $faker->numberBetween(1, 1000),
                $faker->text(20),
                $faker->text(20),
                $faker->randomFloat(2, 0, 10000),
                $faker->randomNumber(),


            ];

            $insertDatas[] = $data;
        };
        return $insertDatas;
    }
}
