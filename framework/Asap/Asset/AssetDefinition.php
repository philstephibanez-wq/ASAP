<?php

declare(strict_types=1);

namespace ASAP\Asset;

use ASAP\Contract\ContractException;

/*
 * ASAP_REFBOOK:
 *   domain: ASSET
 *   role: Class AssetDefinition belongs to the ASSET ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the ASSET domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - asset-overview
 *   diagrams:
 *     - asset-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC VALUE OBJECT
 *
 * Role:
 *   Declare one public asset.
 *
 * Contract:
 *   Asset declaration is data only. No rendering side effect.
 *
 * Since:
 *   P112D4A
 */
final class AssetDefinition
{
    public function __construct(
        public readonly string $type,
        public readonly string $path
    ) {
        if (!in_array($this->type, ['css', 'js'], true)) {
            throw ContractException::because('ASAP_ASSET_TYPE_INVALID', $this->type);
        }

        if (trim($this->path) === '') {
            throw ContractException::because('ASAP_ASSET_PATH_EMPTY');
        }
    }
}
