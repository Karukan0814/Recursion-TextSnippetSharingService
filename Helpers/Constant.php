<?php
namespace Helpers;

class SyntaxOptions {
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

    const  AVAILABLE_EXPIRE= [
        'tenMin' => 'PT10M',
        'oneHour' => 'PT1H',
        'oneDay' => 'P1D',
    ];
}
