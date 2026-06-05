<?php

declare(strict_types=1);

/**
 * INTERNAL SMOKE CHECK
 *
 * Role:
 *   Validate the first modern ASAP FSM + ACL PHP skeleton.
 *
 * Responsibility:
 *   Loads the documented PHP classes, verifies one allowed FSM transition,
 *   one refused FSM transition, one allowed ACL decision and one denied ACL decision.
 *
 * Side effects:
 *   Writes smoke-check status lines to STDOUT.
 *
 * Contract:
 *   No vendor, no Composer dependency, no network, no filesystem mutation beyond stdout.
 *   Failure must throw explicitly and return a non-zero process exit.
 *
 * Since:
 *   P112C4
 */

require_once __DIR__ . '/../../framework/ASAP/FSM/StateMachineException.php';
require_once __DIR__ . '/../../framework/ASAP/FSM/StateActionInterface.php';
require_once __DIR__ . '/../../framework/ASAP/FSM/StateDefinition.php';
require_once __DIR__ . '/../../framework/ASAP/FSM/SignalDefinition.php';
require_once __DIR__ . '/../../framework/ASAP/FSM/TransitionDefinition.php';
require_once __DIR__ . '/../../framework/ASAP/FSM/TransitionResult.php';
require_once __DIR__ . '/../../framework/ASAP/FSM/StateMemory.php';
require_once __DIR__ . '/../../framework/ASAP/FSM/StateMachine.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/AccessControlException.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/AccessDeniedException.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/AccessConditionInterface.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/RoleDefinition.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/ResourceDefinition.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/PrivilegeDefinition.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/AccessContext.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/AccessRule.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/AccessDecision.php';
require_once __DIR__ . '/../../framework/ASAP/ACL/AccessControl.php';

use ASAP\FSM\StateDefinition;
use ASAP\FSM\TransitionDefinition;
use ASAP\FSM\StateMachine;
use ASAP\FSM\StateMachineException;
use ASAP\ACL\RoleDefinition;
use ASAP\ACL\ResourceDefinition;
use ASAP\ACL\PrivilegeDefinition;
use ASAP\ACL\AccessRule;
use ASAP\ACL\AccessControl;

function assertTrue(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException('ASSERT_FAILED: ' . $message);
    }
}

$fsm = new StateMachine(
    [
        new StateDefinition('SITE_OPEN'),
        new StateDefinition('SITE_LOCKDOWN'),
    ],
    [
        new TransitionDefinition('SITE_OPEN', 'CONFIRMED_ATTACK', 'SITE_LOCKDOWN'),
    ],
    'SITE_OPEN'
);

$result = $fsm->apply('CONFIRMED_ATTACK');
assertTrue($result->fromState() === 'SITE_OPEN', 'FSM from state');
assertTrue($result->toState() === 'SITE_LOCKDOWN', 'FSM to state');
assertTrue($fsm->currentState() === 'SITE_LOCKDOWN', 'FSM current state');

$refused = false;
try {
    $fsm->apply('UNKNOWN_SIGNAL');
} catch (StateMachineException $exception) {
    $refused = str_contains($exception->getMessage(), StateMachineException::TRANSITION_NOT_ALLOWED);
}
assertTrue($refused, 'FSM refused transition');

$acl = new AccessControl(
    [
        new RoleDefinition('admin'),
        new RoleDefinition('public'),
    ],
    [
        new ResourceDefinition('site'),
    ],
    [
        new PrivilegeDefinition('read'),
        new PrivilegeDefinition('write'),
    ],
    [
        new AccessRule('admin', 'site', 'write', true),
    ]
);

$allowed = $acl->decide('admin', 'site', 'write');
assertTrue($allowed->allowed(), 'ACL admin write allowed');

$denied = $acl->decide('public', 'site', 'write');
assertTrue(!$denied->allowed(), 'ACL public write denied');

echo 'P112C4 FSM smoke OK' . PHP_EOL;
echo 'P112C4 ACL smoke OK' . PHP_EOL;
echo 'P112C4 ASAP smoke checks OK' . PHP_EOL;
