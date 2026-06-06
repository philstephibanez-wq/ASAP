<?php

declare(strict_types=1);

namespace ASAP\Recipe\Recipes;

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeInterface;

/** PUBLIC RECIPE: validate translation, plural rules and explicit missing-key failure. */
final class I18nRecipe implements RecipeInterface
{
    public function name(): string { return 'i18n'; }

    public function run(RecipeContext $context): array
    {
        $fr = new \ASAP\I18n\Translator(new \ASAP\I18n\TranslationCatalog(new \ASAP\I18n\LocaleCode('fr'), ['hello' => 'Bonjour {name}'], ['items' => ['one' => '{count} élément', 'other' => '{count} éléments']]), new \ASAP\I18n\Plural\FrenchPluralRule());
        $en = new \ASAP\I18n\Translator(new \ASAP\I18n\TranslationCatalog(new \ASAP\I18n\LocaleCode('en'), ['hello' => 'Hello {name}'], ['items' => ['one' => '{count} item', 'other' => '{count} items']]), new \ASAP\I18n\Plural\EnglishPluralRule());
        $es = new \ASAP\I18n\Translator(new \ASAP\I18n\TranslationCatalog(new \ASAP\I18n\LocaleCode('es'), ['hello' => 'Hola {name}'], ['items' => ['one' => '{count} elemento', 'other' => '{count} elementos']]), new \ASAP\I18n\Plural\SpanishPluralRule());
        $ru = new \ASAP\I18n\Plural\RussianPluralRule();
        $context->assert($fr->translate('hello', ['name' => 'Ada']) === 'Bonjour Ada', 'ASAP_I18N_FR_TRANSLATION_FAILED');
        $context->assert($en->plural('items', 2) === '2 items', 'ASAP_I18N_EN_PLURAL_FAILED');
        $context->assert($es->translate('hello', ['name' => 'Ada']) === 'Hola Ada', 'ASAP_I18N_ES_TRANSLATION_FAILED');
        $context->assert($ru->select(1) === 'one' && $ru->select(2) === 'few' && $ru->select(5) === 'many', 'ASAP_I18N_RU_PLURAL_FAILED');
        try {
            $fr->translate('missing');
            $context->assert(false, 'ASAP_I18N_MISSING_KEY_DID_NOT_FAIL');
        } catch (\ASAP\I18n\TranslationException) {
        }

        return ['ASAP_I18N_OK'];
    }
}
