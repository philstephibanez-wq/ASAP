<?php

declare(strict_types=1);

namespace ASAP\Form;

/*
 * ASAP_REFBOOK:
 *   domain: FORM
 *   role: Class FormField belongs to the FORM ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the FORM domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - form-overview
 *   diagrams:
 *     - form-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC VALUE OBJECT
 *
 * Role:
 *   Declare one form field.
 *
 * Contract:
 *   Form field is schema data only.
 *
 * Since:
 *   P112D4B
 */
final class FormField
{
    public function __construct(
        public readonly string $name,
        public readonly string $type = 'text',
        public readonly bool $required = false,
        public readonly string $label = ''
    ) {
        if (trim($this->name) === '') {
            throw FormException::because('ASAP_FORM_FIELD_NAME_EMPTY');
        }

        if (!in_array($this->type, ['text', 'email', 'password', 'number', 'textarea', 'hidden'], true)) {
            throw FormException::because('ASAP_FORM_FIELD_TYPE_INVALID', $this->type);
        }
    }
}
