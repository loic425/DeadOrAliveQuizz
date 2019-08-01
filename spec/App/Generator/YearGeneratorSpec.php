<?php

namespace spec\App\Generator;

use App\Generator\YearGenerator;
use PhpSpec\ObjectBehavior;

class YearGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(YearGenerator::class);
    }

    function it_generates_random_years(): void
    {
        $years = $this->generate(3);
        $years->shouldHaveType(\Generator::class);
        $years->shouldHaveCount(3);
    }
}
