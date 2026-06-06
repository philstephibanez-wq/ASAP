<?php

declare(strict_types=1);

namespace ASAP\Recipe\Recipes;

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeInterface;

/** PUBLIC RECIPE: validate ACL allow, deny and unknown-role failures. */
final class AclRecipe implements RecipeInterface
{
    public function name(): string { return 'acl'; }

    public function run(RecipeContext $context): array
    {
        $acl = new \ASAP\Acl\AccessControl(
            [new \ASAP\Acl\RoleDefinition('anonymous'), new \ASAP\Acl\RoleDefinition('admin'), new \ASAP\Acl\RoleDefinition('denied')],
            [new \ASAP\Acl\ResourceDefinition('public'), new \ASAP\Acl\ResourceDefinition('admin')],
            [new \ASAP\Acl\PrivilegeDefinition('view')],
            [new \ASAP\Acl\AccessRule('anonymous', 'public', 'view', true), new \ASAP\Acl\AccessRule('admin', 'admin', 'view', true), new \ASAP\Acl\AccessRule('denied', 'admin', 'view', false)]
        );
        $context->assert($acl->decide('anonymous', 'public', 'view')->allowed(), 'ASAP_ACL_PUBLIC_ACCESS_DENIED');
        $context->assert($acl->decide('admin', 'admin', 'view')->allowed(), 'ASAP_ACL_ADMIN_ACCESS_DENIED');
        $context->assert(!$acl->decide('denied', 'admin', 'view')->allowed(), 'ASAP_ACL_DENIED_USER_ALLOWED');
        $context->assert(!$acl->decide('anonymous', 'admin', 'view')->allowed(), 'ASAP_ACL_IMPLICIT_ALLOW_DETECTED');
        try {
            $acl->decide('ghost', 'public', 'view');
            $context->assert(false, 'ASAP_ACL_UNKNOWN_ROLE_DID_NOT_FAIL');
        } catch (\ASAP\Acl\AccessControlException) {
        }

        return ['ASAP_ACL_OK'];
    }
}
