<?php

namespace spec\App\Provider;

use App\Provider\TranslationLocaleProvider;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Locale\Model\LocaleInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class TranslationLocaleProviderSpec extends ObjectBehavior
{
    function let(RepositoryInterface $localeRepository): void
    {
        $this->beConstructedWith($localeRepository, 'en_US');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TranslationLocaleProvider::class);
    }

    function it_can_get_defined_locales_codes(
        RepositoryInterface $localeRepository,
        LocaleInterface $firstLocale,
        LocaleInterface $secondLocale
    ): void {
        $localeRepository->findAll()->willReturn([
            $firstLocale->getWrappedObject(),
            $secondLocale->getWrappedObject(),
        ]);

        $firstLocale->getCode()->willReturn('fr_FR');
        $secondLocale->getCode()->willReturn('en_US');

        $this->getDefinedLocalesCodes()->shouldReturn(['fr_FR', 'en_US']);
    }

    function it_can_get_default_locale_code(): void
    {
        $this->getDefaultLocaleCode()->shouldReturn('en_US');
    }
}
