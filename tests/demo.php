<?php

require __DIR__ . '/../vendor/autoload.php';

ini_set('xdebug.overload_var_dump', '0');

if (empty('acme') === false) {
    //echo 'empty === false' . PHP_EOL;
}
if (notEmpty('acme')) {
    //echo 'notEmpty' . PHP_EOL;
}

if (empty('   ') === false) {
    //echo 'empty === false' . PHP_EOL;
}
if (blank('   ')) {
    //echo 'blank' . PHP_EOL;
}

if (present('acme')) {
    //echo 'present' . PHP_EOL;
}

$tmpEmptyObject = new stdClass();
$tmpFilledObject = new stdClass();
$tmpFilledObject->foo = 'bar';

$testDataProvider = [
    [
        'value' => '',
        'literal' => 'string \'\'',
        'isEmpty' => true,
        'isBlank' => true
    ],
    [
        'value' => 'acme',
        'literal' => 'string \'acme\'',
        'isEmpty' => false,
        'isBlank' => false
    ],
    [
        'value' => ' ',
        'literal' => 'string \' \'',
        'isEmpty' => false,
        'isBlank' => true
    ],
    [
        'value' => '   ',
        'literal' => 'string \'   \'',
        'isEmpty' => false,
        'isBlank' => true
    ],
    [
        'value' => "\t\n",
        'literal' => 'string "\t\n"',
        'isEmpty' => false,
        'isBlank' => true
    ],
    [
        'value' => 0,
        'literal' => 'int 0',
        'isEmpty' => true,
        'isBlank' => true
    ],
    [
        'value' => 0.0,
        'literal' => 'float 0.0',
        'isEmpty' => true,
        'isBlank' => true
    ],
    [
        'value' => 42,
        'literal' => 'int 42',
        'isEmpty' => false,
        'isBlank' => false
    ],
    [
        'value' => 3.14,
        'literal' => 'float 3.14',
        'isEmpty' => false,
        'isBlank' => false
    ],
    [
        'value' => '0',
        'literal' => 'string \'0\'',
        'isEmpty' => true,
        'isBlank' => true
    ],
    [
        'value' => '1337',
        'literal' => 'string \'1337\'',
        'isEmpty' => false,
        'isBlank' => false
    ],
    [
        'value' => null,
        'literal' => 'null',
        'isEmpty' => true,
        'isBlank' => true
    ],
    [
        'value' => true,
        'literal' => 'bool true',
        'isEmpty' => false,
        'isBlank' => false
    ],
    [
        'value' => false,
        'literal' => 'bool false',
        'isEmpty' => true,
        'isBlank' => true
    ],
    [
        'value' => [],
        'literal' => 'array []',
        'isEmpty' => true,
        'isBlank' => true
    ],
    [
        'value' => ['acme'],
        'literal' => 'array [\'acme\']',
        'isEmpty' => false,
        'isBlank' => false
    ],
    [
        'value' => $tmpEmptyObject,
        'literal' => 'object {}',
        'isEmpty' => false,
        'isBlank' => true
    ],
    [
        'value' => $tmpFilledObject,
        'literal' => 'object {"foo" => "bar"}',
        'isEmpty' => false,
        'isBlank' => false
    ]
];

$tableData = [];
foreach ($testDataProvider as $testData) {
    $tableData[] = [
        'value' => $testData['literal'],
        'empty() expected' => $testData['isEmpty'],
        'empty() result' => empty($testData['value']),
        'notEmpty() expected' => !$testData['isEmpty'],
        'notEmpty() result' => notEmpty($testData['value']),
        'blank() expected' => $testData['isBlank'],
        'blank() result' => blank($testData['value']),
        'present() expected' => !$testData['isBlank'],
        'present() result' => present($testData['value'])
    ];
}

$tableRenderer = new MathieuViossat\Util\ArrayToTextTable($tableData);

$tableFormatter = function (&$value, $key, $renderer) {
    if ($value === true) {
        $value = 'true';
    }
    //else if ($value === false) {
    //    $value = 'false';
    //}
};
$tableRenderer->setFormatter($tableFormatter);
echo $tableRenderer->getTable();
