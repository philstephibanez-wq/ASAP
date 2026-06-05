<?php

declare(strict_types=1);

namespace ASAP\Asset;

use ASAP\Contract\ContractException;

/**
 * PUBLIC LEGACY-COLLISION RECONCILIATION
 *
 * Role:
 *   Preserve the ASAP ASSET concept inside the canonical Windows-safe
 *   `ASAP\Asset` namespace/directory.
 *
 * Responsibility:
 *   Carry one public asset reference.
 *
 * Contract:
 *   Asset is declaration data only. Rendering belongs to VIEW/TEMPLATE.
 *
 * Since:
 *   P112D4E
 */
final class Asset
{
    public function __construct(
        public readonly string $type,
        public readonly string $href
    ) {
        if (!in_array($this->type, ['css', 'js', 'image'], true)) {
            throw ContractException::because('ASAP_ASSET_TYPE_INVALID', $this->type);
        }

        if (trim($this->href) === '') {
            throw ContractException::because('ASAP_ASSET_HREF_EMPTY');
        }
    }
}
