<?php

declare(strict_types = 1);

namespace Tests\DataProviders;

use App\Services\SalesTaxService;

class ContainerDataProvider
{
    public function ParamErrorCases(): array
    {
        $class = new class([]){
            public function __construct(
            protected SalesTaxService|array $anonymousClass)
            {
            }
        };

        $class1 = new class('done')
        {
            public function __construct(
            protected $class1,
            ) {
            }
        };

        $class2 = new class([])
        {
            public function __construct(
                protected array $class2,
            ) {
            }
        };
        return [
            [$class::class],
            [$class1::class],
            [$class2::class]
        ];
    }
}