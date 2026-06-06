<?php

declare(strict_types=1);

namespace ASAP\Recipe\Recipes;

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeInterface;

/** PUBLIC RECIPE: validate multi-provider database config and real SQLite connectivity. */
final class DatabaseRecipe implements RecipeInterface
{
    public function name(): string { return 'database'; }

    public function run(RecipeContext $context): array
    {
        $xml = simplexml_load_string('<databases default="source"><connection name="source" provider="sqlite"><path>' . htmlspecialchars($context->sandbox('database') . DIRECTORY_SEPARATOR . 'source.sqlite', ENT_XML1) . '</path></connection><connection name="target" provider="sqlite"><path>' . htmlspecialchars($context->sandbox('database') . DIRECTORY_SEPARATOR . 'target.sqlite', ENT_XML1) . '</path></connection></databases>');
        $context->assert($xml instanceof \SimpleXMLElement, 'ASAP_DATABASE_TEST_XML_INVALID');
        $config = (new \ASAP\Database\DatabaseMultiConfigLoader())->fromXml($xml, 'P112Q2J_DATABASE_RECIPE');
        $context->assert($config->defaultName() === 'source', 'ASAP_DATABASE_DEFAULT_CONNECTION_INVALID');
        $source = $config->get('source');
        $target = $config->get('target');
        $context->assert($source->normalizedProvider() === \ASAP\Database\DatabaseProvider::SQLITE, 'ASAP_DATABASE_SOURCE_PROVIDER_INVALID');
        $context->assert($target->normalizedProvider() === \ASAP\Database\DatabaseProvider::SQLITE, 'ASAP_DATABASE_TARGET_PROVIDER_INVALID');
        $connector = new \ASAP\Database\PdoDatabaseConnector();
        $db = $connector->connect($source);
        $db->pdo()->exec('CREATE TABLE recipe_probe (id INTEGER PRIMARY KEY, name TEXT NOT NULL)');
        $db->pdo()->exec("INSERT INTO recipe_probe (name) VALUES ('ok')");
        $value = $db->pdo()->query('SELECT name FROM recipe_probe')->fetchColumn();
        $context->assert($value === 'ok', 'ASAP_DATABASE_SQLITE_ROUNDTRIP_FAILED');

        try {
            new \ASAP\Database\DatabaseConnectionConfig('unknown-provider');
            $context->assert(false, 'ASAP_DATABASE_UNSUPPORTED_PROVIDER_DID_NOT_FAIL');
        } catch (\ASAP\Database\DatabaseException) {
        }

        return ['ASAP_DATABASE_OK'];
    }
}
