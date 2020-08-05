<?php

// Atoum: namespace of tested class + "test\units"
namespace Pixelbrackets\NotEmpty\tests\units;

require_once __DIR__ . '/../../vendor/autoload.php';

use atoum;

class Blank extends atoum
{
    protected function notEmptyDataProvider()
    {
        $tmpEmptyObject = new \stdClass();
        $tmpFilledObject = new \stdClass();
        $tmpFilledObject->foo = 'bar';

        $testDataProvider = [
            [
                '',
                true,
                true
            ],
            [
                'acme',
                false,
                false
            ],
            [
                ' ',
                false,
                true
            ],
            [
                '   ',
                false,
                true
            ],
            [
                "\t\n",
                false,
                true
            ],
            [
                0,
                true,
                true
            ],
            [
                0.0,
                true,
                true
            ],
            [
                42,
                false,
                false
            ],
            [
                3.14,
                false,
                false
            ],
            [
                '0',
                true,
                true
            ],
            [
                '1337',
                false,
                false
            ],
            [
                null,
                true,
                true
            ],
            [
                true,
                false,
                false
            ],
            [
                false,
                true,
                true
            ],
            [
                [],
                true,
                true
            ],
            [
                ['acme'],
                false,
                false
            ],
            [
                $tmpEmptyObject,
                false,
                true
            ],
            [
                $tmpFilledObject,
                false,
                false
            ]
        ];

        return $testDataProvider;
    }

    /**
     * @dataProvider notEmptyDataProvider
     */
    public function testBlank($variable, $expectedIsEmpty, $expectedIsBlank)
    {
        /*
        $this
            ->variable($variable)
            ->isEqualTo($expected);
        */

        $this
            ->given($this->newTestedInstance)
            ->then
                ->boolean($this->testedInstance->blank($variable))
                ->isEqualTo($expectedIsBlank);
    }

    /**
     * @dataProvider notEmptyDataProvider
     */
    public function testPresent($variable, $expectedIsEmpty, $expectedIsBlank)
    {
        $this
            ->given($present = new \Pixelbrackets\NotEmpty\Present())
            ->then
                ->boolean($present->present($variable))
                ->isEqualTo(!$expectedIsBlank);
    }

    /**
     * @dataProvider notEmptyDataProvider
     */
    public function testNotEmpty($variable, $expectedIsEmpty, $expectedIsBlank)
    {
        $this
            ->given($notEmpty = new \Pixelbrackets\NotEmpty\NotEmpty())
            ->then
                ->boolean($notEmpty->notEmpty($variable))
                ->isEqualTo(!$expectedIsEmpty);
    }

    /**
     * @dataProvider notEmptyDataProvider
     */
    public function testEmpty($variable, $expectedIsEmpty, $expectedIsBlank)
    {
        $this
            ->boolean(empty($variable))
            ->isEqualTo($expectedIsEmpty);
    }
}
