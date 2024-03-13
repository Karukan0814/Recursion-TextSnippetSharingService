<?php

namespace Helpers;

use DateInterval;
use DateTime;


class ValidationHelper


{


    const AVAILABLE_SYNTAXES = [
        'html'       => 'HTML',
        'css'        => 'CSS',
        'javascript' => 'JavaScript',
        'json'       => 'JSON',
        'typescript' => 'TypeScript',
        'python'     => 'Python',
        'java'       => 'Java',
        'csharp'     => 'C#',
        'cpp'        => 'C++',
        'php'        => 'PHP',
        'ruby'       => 'Ruby',
        'go'         => 'Go',
        'markdown'   => 'Markdown',
        'sql'        => 'SQL',
        'xml'        => 'XML',
        'yaml'       => 'YAML'
    ];

    const  AVAILABLE_EXPIRE = [
        'tenMin' => 'PT10M',
        'oneHour' => 'PT1H',
        'oneDay' => 'P1D',
        'never'=>null,
    ];
    public static function integer($value, float $min = -INF, float $max = INF): int
    {
        // PHPには、データを検証する組み込み関数があります。詳細は https://www.php.net/manual/en/filter.filters.validate.php を参照ください。
        $value = filter_var($value, FILTER_VALIDATE_INT, ["min_range" => (int) $min, "max_range" => (int) $max]);

        // 結果がfalseの場合、フィルターは失敗したことになります。
        if ($value === false) throw new \InvalidArgumentException("The provided value is not a valid integer.");

        // 値がすべてのチェックをパスしたら、そのまま返します。
        return $value;
    }


    public static function validateText($text, int $min = 1, int $max = PHP_INT_MAX)
    {

        $error = [];
        $response = [
            "error" => $error,
            "value" => $text
        ];

        // $text が string 型であることを確認
        if (!is_string($text)) {
            $response["error"][] = "The provided value is not a valid string.";
            return $response;
        }

        // 文字列の長さを取得
        $length = strlen($text);

        // 文字列の長さが指定された範囲内であることを確認
        if ($length < $min || $length > $max) {
            // throw new \InvalidArgumentException(sprintf("The provided string must be between %d and %d characters in length.", $min, $max));

            $response["error"][] = sprintf("The provided string must be between %d and %d characters in length.", $min, $max);
            return $response;
        }

        // 値がすべてのチェックをパスしたら、そのまま返します。
        return $response;
    }
    public static function validateSyntax($syntax)


    {

        $error = [];
        $response = [
            "error" => $error,
            "value" => $syntax
        ];

        // $syntax が string 型であることを確認
        if (!is_string($syntax)) {
            // throw new \InvalidArgumentException("The provided value is not a valid string.");
            $response["error"][] = "The provided value is not a valid string.";
            return $response;
        }
        // $syntax がリスト内の値と一致するか確認
        if (!array_key_exists($syntax, self::AVAILABLE_SYNTAXES)) {
            // throw new \InvalidArgumentException(sprintf("The provided syntax '%s' is not allowed. Allowed syntaxes are: %s", $syntax, implode(', ', SyntaxOptions::AVAILABLE_SYNTAXES)));

            $response["error"][] = sprintf("The provided syntax '%s' is not allowed. Allowed syntaxes are: %s", $syntax, implode(', ', SyntaxOptions::AVAILABLE_SYNTAXES));
            return $response;
        }

        // 値がすべてのチェックをパスしたら、そのまま返します。

        return $response;
    }
    public static function validateExpireDatetime($expire)
    {

        $error = [];
        $response = [
            "error" => $error,
            "value" => $expire
        ];

        
        if ($expire === "never") {
            $response["value"] = null; // $expire が "never" の場合、value を null に設定
            return $response;
        }

        $timeIntervals = self::AVAILABLE_EXPIRE;
        if (!isset($timeIntervals[$expire])) {
            $response["error"][] = "Invalid expire interval";
            return $response; // $syntax がリストに存在しない場合は null を返す
        }
 

            $now = new DateTime(); // 現在時刻を取得
            $intervalSpec = $timeIntervals[$expire]; // 対応する時間を取得
            $now->add(new DateInterval($intervalSpec)); // 時間を加える
            
            // print_r($now->format('Y-m-d H:i:s'));
            $formatedVal=$now->format('Y-m-d H:i:s');
            $response["value"] =  $formatedVal;
        

        return $response; // 'YYYY-MM-DD HH:MM:SS'形式で返す
    }
}
