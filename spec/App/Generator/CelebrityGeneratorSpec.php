<?php

namespace spec\App\Generator;

use App\Entity\Celebrity;
use App\Entity\Round;
use App\Generator\CelebrityGenerator;
use App\Repository\CelebrityRepository;
use PhpSpec\ObjectBehavior;

class CelebrityGeneratorSpec extends ObjectBehavior
{
    function let(CelebrityRepository $celebrityRepository): void
    {
        $this->beConstructedWith($celebrityRepository);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(CelebrityGenerator::class);
    }

    function it_can_get_a_random_celebrity(
        CelebrityRepository $celebrityRepository,
        Round $round,
        Celebrity $celebrity
    ): void {
        $celebrityRepository->findRandomOneForRound($round)->willReturn($celebrity);

        $this->generate($round)->shouldReturn($celebrity);
    }
}
