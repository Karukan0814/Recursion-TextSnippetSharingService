<?php


namespace Database\Seeds;
require_once 'vendor/autoload.php';

use Database\AbstractSeeder;
use Faker\Factory;

class ComputerPartsSeeder extends AbstractSeeder
{
    protected ?string $tableName = 'computer_parts';

    protected array $tableColumns = [
        [
            'data_type' => 'string',
            'column_name' => 'name'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'type'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'brand'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'model_number'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'release_date'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'description'
        ],
        [
            'data_type' => 'int',
            'column_name' => 'performance_score'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'market_price'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'rsm'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'power_consumptionw'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'lengthm'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'widthm'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'heightm'
        ],
        [
            'data_type' => 'int',
            'column_name' => 'lifespan'
        ]
    ];

    public function createRowData(): array
    {
        //fakerを使用してinsertするデータを自動で10000件作成する
        $faker = Factory::create();
        $insertDatas = [];
        for ($i = 1; $i <= 100; $i++) {
            
            $data = [
                $faker->word,
                'CPU',
                'AMD',
                $faker->regexify('[A-Z0-9]{15}'),
                $faker->date(),
                $faker->sentence,
                $faker->numberBetween(1, 100),
                $faker->randomFloat(2, 0, 1000),
                $faker->randomFloat(2, 0, 1),
                $faker->randomFloat(1, 0, 200),
                $faker->randomFloat(2, 0, 1),
                $faker->randomFloat(2, 0, 1),
                $faker->randomFloat(3, 0, 1),
                $faker->numberBetween(1, 10)
            ];

            $insertDatas[] = $data;
        };
        return $insertDatas;
    }
}
