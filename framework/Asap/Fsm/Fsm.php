<?php

declare(strict_types=1);

namespace ASAP\Fsm;

use ASAP\RefBook\Attribute\AsapRefBookClass;
use ASAP\RefBook\Attribute\AsapRefBookMethod;
use ASAP\RefBook\Contract\RefBookInspectableInterface;

/**
 * PUBLIC LEGACY COMPATIBILITY SHIM
 *
 * Role:
 *   Restore the small top-level `ASAP\Fsm` demo surface.
 *
 * Contract:
 *   Demo data only. Runtime FSM execution belongs to `ASAP\Fsm\StateMachine`.
 *
 * Since:
 *   P112P1
 * ASAP_REFBOOK:
 *   domain: FSM
 *   role: Public facade for ASAP finite-state workflow services.
 *   contract:
 *     - keeps FSM access behind an explicit framework API
 *     - does not render UI or execute unrelated business logic
 *     - must fail explicitly when FSM contracts are invalid
 *   examples:
 *     - fsm-basic-transition
 *   diagrams:
 *     - fsm-runtime
 * END_ASAP_REFBOOK
 */
#[AsapRefBookClass(
    domain: 'FSM',
    role: 'Expose the legacy FSM demonstration surface',
    responsibility: 'Keep the historical top-level ASAP\\Fsm facade available while runtime execution remains owned by StateMachine.',
    contracts: [
        'The facade provides demonstration metadata only.',
        'Runtime transition execution belongs to StateMachine.',
        'The facade must not route, render, authorize or execute unrelated business logic.',
    ],
    examples: ['fsm-basic-transition'],
    diagrams: ['fsm-runtime'],
    introducedIn: 'P112Q3E1'
)]
final class Fsm implements RefBookInspectableInterface
{
    #[AsapRefBookMethod(
        role: 'Expose the RefBook domain for the legacy FSM facade',
        behavior: 'Returns the stable RefBook domain used by scanners, snapshots and ASAP_REF_BOOK renderers.',
        preconditions: ['none'],
        postconditions: ['The returned domain is FSM.'],
        sideEffects: ['none'],
        errors: ['none'],
        testRefs: ['tests/Contract/RefBookFsmMetadataContractTest.php'],
        examples: ['fsm-refbook-domain'],
        diagrams: ['fsm-runtime'],
        introducedIn: 'P112Q3E1'
    )]
    public static function refBookDomain(): string
    {
        return 'FSM';
    }

    /** @return array{states:string[],signals:string[],initial:string} */
    #[AsapRefBookMethod(
        role: 'Expose a minimal FSM demonstration flow',
        behavior: 'Returns deterministic demo data that documents a minimal START to DONE workflow without executing a runtime transition.',
        preconditions: ['none'],
        postconditions: [
            'The returned array contains states, signals and initial keys.',
            'The returned data is static demonstration metadata only.',
        ],
        sideEffects: ['none'],
        errors: ['none'],
        testRefs: ['tests/Contract/RefBookFsmMetadataContractTest.php'],
        examples: ['fsm-basic-transition'],
        diagrams: ['fsm-runtime'],
        introducedIn: 'P112Q3E1'
    )]
    public static function demoFlow(): array
    {
        return [
            'states' => ['START', 'DONE'],
            'signals' => ['NEXT'],
            'initial' => 'START',
        ];
    }
}
