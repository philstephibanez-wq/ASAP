# P112Q3C — ASAP Public API Coverage Matrix

Generated at: `2026-06-08T17:03:30+00:00`

## Contract note

This report detects unit/contract/recipe **coverage candidates** from local source references.
It does not pretend that a textual reference proves behavioral assertion coverage.

## Summary

| Metric | Count |
|---|---:|
| Symbols | 189 |
| Public methods | 510 |
| Unit candidates | 145 |
| Integration only | 323 |
| Missing test reference | 42 |
| Methods with docblock | 182 |
| Methods in RefBook-tagged source | 510 |

## By domain

| Domain | UNIT_CANDIDATE | INTEGRATION_ONLY | MISSING_TEST_REFERENCE |
|---|---:|---:|---:|
| ACL | 8 | 12 | 1 |
| ACTION | 0 | 1 | 0 |
| APPLICATION | 0 | 5 | 0 |
| ASSET | 0 | 5 | 5 |
| AUTOLOAD | 0 | 6 | 0 |
| CACHE | 3 | 5 | 0 |
| COMPATIBILITY | 4 | 0 | 3 |
| CONFIG | 12 | 8 | 0 |
| CONTRACT | 0 | 1 | 0 |
| CONTROLLER | 0 | 4 | 0 |
| COOKIE | 0 | 1 | 0 |
| CORE | 8 | 1 | 0 |
| CSS | 0 | 1 | 0 |
| DATABASE | 6 | 25 | 1 |
| DATE | 0 | 2 | 0 |
| DEBUG | 6 | 0 | 0 |
| DIRECTORY | 1 | 1 | 0 |
| DOCUMENTATION | 0 | 4 | 0 |
| EVENT | 0 | 1 | 0 |
| EXCEPTION | 0 | 1 | 0 |
| FILE | 1 | 1 | 0 |
| FORM | 0 | 10 | 0 |
| FSM | 10 | 15 | 0 |
| FTP | 0 | 2 | 0 |
| HELPER | 0 | 5 | 0 |
| HTTP | 2 | 4 | 0 |
| I18N | 10 | 17 | 0 |
| JAVASCRIPT | 0 | 1 | 0 |
| JSON | 0 | 2 | 3 |
| LANGUAGE | 0 | 1 | 0 |
| LINK | 5 | 1 | 0 |
| LOG | 2 | 4 | 1 |
| LSTSA | 0 | 62 | 18 |
| MAIL | 0 | 2 | 0 |
| MENU | 0 | 6 | 0 |
| MODEL | 3 | 1 | 0 |
| MODULE | 0 | 4 | 2 |
| PACKAGE | 7 | 3 | 0 |
| RENDERER | 1 | 5 | 0 |
| REQUEST | 0 | 2 | 0 |
| RESPONSE | 2 | 2 | 0 |
| REST | 1 | 0 | 0 |
| ROUTER | 1 | 6 | 0 |
| ROUTING | 10 | 9 | 0 |
| SECURITY | 0 | 10 | 2 |
| SESSION | 3 | 4 | 1 |
| SITE | 3 | 2 | 0 |
| SMTP | 0 | 1 | 0 |
| SUPPORT | 4 | 0 | 0 |
| TEMPLATE | 13 | 6 | 0 |
| THEME | 0 | 1 | 0 |
| URL | 11 | 5 | 2 |
| VALIDATION | 7 | 42 | 0 |
| VIEW | 1 | 3 | 1 |
| XML | 0 | 0 | 2 |

## Public method matrix

| Status | Domain | Symbol | Method | Unit | Smoke | Recipe | File |
|---|---|---|---|---:|---:|---:|---|
| MISSING_TEST_REFERENCE | ACL | `ASAP\Acl\AccessConditionInterface` | `allows` | no | no | no | `framework/Asap/Acl/AccessConditionInterface.php:47` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessContext` | `__construct` | no | no | yes | `framework/Asap/Acl/AccessContext.php:46` |
| UNIT_CANDIDATE | ACL | `ASAP\Acl\AccessContext` | `get` | yes | yes | yes | `framework/Asap/Acl/AccessContext.php:72` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessContext` | `has` | no | yes | yes | `framework/Asap/Acl/AccessContext.php:58` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessControl` | `__construct` | no | yes | yes | `framework/Asap/Acl/AccessControl.php:60` |
| UNIT_CANDIDATE | ACL | `ASAP\Acl\AccessControl` | `decide` | yes | yes | yes | `framework/Asap/Acl/AccessControl.php:113` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessControlException` | `contract` | no | yes | yes | `framework/Asap/Acl/AccessControlException.php:56` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessDecision` | `__construct` | no | no | yes | `framework/Asap/Acl/AccessDecision.php:47` |
| UNIT_CANDIDATE | ACL | `ASAP\Acl\AccessDecision` | `allowed` | yes | no | yes | `framework/Asap/Acl/AccessDecision.php:58` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessDecision` | `reason` | no | no | yes | `framework/Asap/Acl/AccessDecision.php:68` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessRule` | `__construct` | no | yes | yes | `framework/Asap/Acl/AccessRule.php:55` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessRule` | `allows` | no | yes | yes | `framework/Asap/Acl/AccessRule.php:87` |
| UNIT_CANDIDATE | ACL | `ASAP\Acl\AccessRule` | `condition` | yes | yes | yes | `framework/Asap/Acl/AccessRule.php:97` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\AccessRule` | `key` | no | yes | yes | `framework/Asap/Acl/AccessRule.php:77` |
| UNIT_CANDIDATE | ACL | `ASAP\Acl\Acl` | `canView` | yes | no | yes | `framework/Asap/Acl/Acl.php:36` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\PrivilegeDefinition` | `__construct` | no | yes | yes | `framework/Asap/Acl/PrivilegeDefinition.php:47` |
| UNIT_CANDIDATE | ACL | `ASAP\Acl\PrivilegeDefinition` | `id` | yes | yes | yes | `framework/Asap/Acl/PrivilegeDefinition.php:63` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\ResourceDefinition` | `__construct` | no | yes | yes | `framework/Asap/Acl/ResourceDefinition.php:47` |
| UNIT_CANDIDATE | ACL | `ASAP\Acl\ResourceDefinition` | `id` | yes | yes | yes | `framework/Asap/Acl/ResourceDefinition.php:63` |
| INTEGRATION_ONLY | ACL | `ASAP\Acl\RoleDefinition` | `__construct` | no | yes | yes | `framework/Asap/Acl/RoleDefinition.php:47` |
| UNIT_CANDIDATE | ACL | `ASAP\Acl\RoleDefinition` | `id` | yes | yes | yes | `framework/Asap/Acl/RoleDefinition.php:63` |
| INTEGRATION_ONLY | ACTION | `ASAP\Action\Action` | `__construct` | no | no | yes | `framework/Asap/Action/Action.php:25` |
| INTEGRATION_ONLY | APPLICATION | `ASAP\Application\Application` | `__construct` | no | no | yes | `framework/Asap/Application/Application.php:61` |
| INTEGRATION_ONLY | APPLICATION | `ASAP\Application\Application` | `run` | no | yes | yes | `framework/Asap/Application/Application.php:83` |
| INTEGRATION_ONLY | APPLICATION | `ASAP\Application\ApplicationFacade` | `__construct` | no | no | yes | `framework/Asap/Application/ApplicationFacade.php:44` |
| INTEGRATION_ONLY | APPLICATION | `ASAP\Application\ApplicationFacade` | `run` | no | yes | yes | `framework/Asap/Application/ApplicationFacade.php:49` |
| INTEGRATION_ONLY | APPLICATION | `ASAP\Application\ApplicationPaths` | `__construct` | no | no | yes | `framework/Asap/Application/ApplicationPaths.php:47` |
| INTEGRATION_ONLY | ASSET | `ASAP\Asset\Asset` | `__construct` | no | no | yes | `framework/Asap/Asset/Asset.php:44` |
| INTEGRATION_ONLY | ASSET | `ASAP\Asset\Asset` | `css` | no | yes | no | `framework/Asap/Asset/Asset.php:58` |
| MISSING_TEST_REFERENCE | ASSET | `ASAP\Asset\Asset` | `image` | no | no | no | `framework/Asap/Asset/Asset.php:68` |
| MISSING_TEST_REFERENCE | ASSET | `ASAP\Asset\Asset` | `isCss` | no | no | no | `framework/Asap/Asset/Asset.php:73` |
| MISSING_TEST_REFERENCE | ASSET | `ASAP\Asset\Asset` | `isImage` | no | no | no | `framework/Asap/Asset/Asset.php:83` |
| MISSING_TEST_REFERENCE | ASSET | `ASAP\Asset\Asset` | `isJs` | no | no | no | `framework/Asap/Asset/Asset.php:78` |
| INTEGRATION_ONLY | ASSET | `ASAP\Asset\Asset` | `js` | no | yes | yes | `framework/Asap/Asset/Asset.php:63` |
| INTEGRATION_ONLY | ASSET | `ASAP\Asset\AssetDefinition` | `__construct` | no | no | yes | `framework/Asap/Asset/AssetDefinition.php:37` |
| INTEGRATION_ONLY | ASSET | `ASAP\Asset\AssetRegistry` | `add` | no | no | yes | `framework/Asap/Asset/AssetRegistry.php:48` |
| MISSING_TEST_REFERENCE | ASSET | `ASAP\Asset\AssetRegistry` | `byType` | no | no | no | `framework/Asap/Asset/AssetRegistry.php:60` |
| INTEGRATION_ONLY | AUTOLOAD | `ASAP\Autoload\AutoloadCache` | `__construct` | no | no | yes | `framework/Asap/Autoload/AutoloadCache.php:40` |
| INTEGRATION_ONLY | AUTOLOAD | `ASAP\Autoload\AutoloadCache` | `defaultCacheFile` | no | no | yes | `framework/Asap/Autoload/AutoloadCache.php:46` |
| INTEGRATION_ONLY | AUTOLOAD | `ASAP\Autoload\AutoloadCache` | `load` | no | yes | yes | `framework/Asap/Autoload/AutoloadCache.php:59` |
| INTEGRATION_ONLY | AUTOLOAD | `ASAP\Autoload\AutoloadCache` | `register` | no | yes | yes | `framework/Asap/Autoload/AutoloadCache.php:83` |
| INTEGRATION_ONLY | AUTOLOAD | `ASAP\Autoload\ClassMapBuilder` | `build` | no | yes | yes | `framework/Asap/Autoload/ClassMapBuilder.php:49` |
| INTEGRATION_ONLY | AUTOLOAD | `ASAP\Autoload\ClassMapBuilder` | `write` | no | yes | yes | `framework/Asap/Autoload/ClassMapBuilder.php:110` |
| UNIT_CANDIDATE | CACHE | `ASAP\Cache\Cache` | `all` | yes | yes | yes | `framework/Asap/Cache/Cache.php:84` |
| INTEGRATION_ONLY | CACHE | `ASAP\Cache\Cache` | `clear` | no | yes | yes | `framework/Asap/Cache/Cache.php:71` |
| INTEGRATION_ONLY | CACHE | `ASAP\Cache\Cache` | `count` | no | yes | yes | `framework/Asap/Cache/Cache.php:76` |
| UNIT_CANDIDATE | CACHE | `ASAP\Cache\Cache` | `get` | yes | yes | yes | `framework/Asap/Cache/Cache.php:47` |
| INTEGRATION_ONLY | CACHE | `ASAP\Cache\Cache` | `getOrDefault` | no | no | yes | `framework/Asap/Cache/Cache.php:56` |
| INTEGRATION_ONLY | CACHE | `ASAP\Cache\Cache` | `has` | no | yes | yes | `framework/Asap/Cache/Cache.php:61` |
| INTEGRATION_ONLY | CACHE | `ASAP\Cache\Cache` | `remove` | no | yes | yes | `framework/Asap/Cache/Cache.php:66` |
| UNIT_CANDIDATE | CACHE | `ASAP\Cache\Cache` | `set` | yes | yes | yes | `framework/Asap/Cache/Cache.php:41` |
| UNIT_CANDIDATE | COMPATIBILITY | `ASAP\Compatibility\SimpleXMLElementExtended` | `getAttribute` | yes | no | no | `framework/Asap/Compatibility/SimpleXMLElementExtended.php:37` |
| UNIT_CANDIDATE | COMPATIBILITY | `ASAP\Compatibility\SimpleXMLElementExtended` | `getAttributeCount` | yes | no | no | `framework/Asap/Compatibility/SimpleXMLElementExtended.php:48` |
| MISSING_TEST_REFERENCE | COMPATIBILITY | `ASAP\Compatibility\SimpleXMLElementExtended` | `getAttributeNames` | no | no | no | `framework/Asap/Compatibility/SimpleXMLElementExtended.php:56` |
| MISSING_TEST_REFERENCE | COMPATIBILITY | `ASAP\Compatibility\SimpleXMLElementExtended` | `getAttributesArray` | no | no | no | `framework/Asap/Compatibility/SimpleXMLElementExtended.php:64` |
| UNIT_CANDIDATE | COMPATIBILITY | `ASAP\Compatibility\SimpleXMLElementExtended` | `getChildrenCount` | yes | no | no | `framework/Asap/Compatibility/SimpleXMLElementExtended.php:80` |
| MISSING_TEST_REFERENCE | COMPATIBILITY | `ASAP\Compatibility\Singleton` | `__call` | no | no | no | `framework/Asap/Compatibility/Singleton.php:59` |
| UNIT_CANDIDATE | COMPATIBILITY | `ASAP\Compatibility\Singleton` | `getInstance` | yes | no | no | `framework/Asap/Compatibility/Singleton.php:42` |
| INTEGRATION_ONLY | CONFIG | `ASAP\Config\ConfigBag` | `__construct` | no | no | yes | `framework/Asap/Config/ConfigBag.php:41` |
| INTEGRATION_ONLY | CONFIG | `ASAP\Config\ConfigBag` | `boolean` | no | no | yes | `framework/Asap/Config/ConfigBag.php:67` |
| INTEGRATION_ONLY | CONFIG | `ASAP\Config\ConfigBag` | `integer` | no | no | yes | `framework/Asap/Config/ConfigBag.php:56` |
| INTEGRATION_ONLY | CONFIG | `ASAP\Config\ConfigBag` | `string` | no | yes | yes | `framework/Asap/Config/ConfigBag.php:45` |
| INTEGRATION_ONLY | CONFIG | `ASAP\Config\ConfigException` | `because` | no | yes | yes | `framework/Asap/Config/ConfigException.php:34` |
| INTEGRATION_ONLY | CONFIG | `ASAP\Config\ConfigLoader` | `__construct` | no | no | yes | `framework/Asap/Config/ConfigLoader.php:43` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\ConfigLoader` | `getConfig` | yes | no | yes | `framework/Asap/Config/ConfigLoader.php:81` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\ConfigLoader` | `load` | yes | yes | yes | `framework/Asap/Config/ConfigLoader.php:50` |
| INTEGRATION_ONLY | CONFIG | `ASAP\Config\Configuration` | `__construct` | no | no | yes | `framework/Asap/Config/Configuration.php:47` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `all` | yes | yes | yes | `framework/Asap/Config/Configuration.php:116` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `get` | yes | yes | yes | `framework/Asap/Config/Configuration.php:57` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `getDatabase` | yes | no | no | `framework/Asap/Config/Configuration.php:75` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `getEnv` | yes | no | no | `framework/Asap/Config/Configuration.php:80` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `getRoutes` | yes | no | no | `framework/Asap/Config/Configuration.php:94` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `get_browser` | yes | no | no | `framework/Asap/Config/Configuration.php:99` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `get_os` | yes | no | no | `framework/Asap/Config/Configuration.php:106` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `has` | yes | yes | yes | `framework/Asap/Config/Configuration.php:52` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `set` | yes | yes | yes | `framework/Asap/Config/Configuration.php:66` |
| UNIT_CANDIDATE | CONFIG | `ASAP\Config\Configuration` | `setEnv` | yes | no | no | `framework/Asap/Config/Configuration.php:85` |
| INTEGRATION_ONLY | CONFIG | `ASAP\Config\XmlConfigReader` | `read` | no | yes | yes | `framework/Asap/Config/XmlConfigReader.php:40` |
| INTEGRATION_ONLY | CONTRACT | `ASAP\Contract\ContractException` | `because` | no | yes | yes | `framework/Asap/Contract/ContractException.php:48` |
| INTEGRATION_ONLY | CONTROLLER | `ASAP\Controller\Controller` | `__construct` | no | no | yes | `framework/Asap/Controller/Controller.php:43` |
| INTEGRATION_ONLY | CONTROLLER | `ASAP\Controller\ControllerDispatcher` | `__construct` | no | no | yes | `framework/Asap/Controller/ControllerDispatcher.php:53` |
| INTEGRATION_ONLY | CONTROLLER | `ASAP\Controller\ControllerDispatcher` | `dispatch` | no | yes | yes | `framework/Asap/Controller/ControllerDispatcher.php:60` |
| INTEGRATION_ONLY | CONTROLLER | `ASAP\Controller\ControllerException` | `because` | no | yes | yes | `framework/Asap/Controller/ControllerException.php:37` |
| INTEGRATION_ONLY | COOKIE | `ASAP\Cookie\Cookie` | `__construct` | no | no | yes | `framework/Asap/Cookie/Cookie.php:25` |
| UNIT_CANDIDATE | CORE | `ASAP\Core\Bootstrap` | `run` | yes | yes | yes | `framework/Asap/Core/Bootstrap.php:39` |
| INTEGRATION_ONLY | CORE | `ASAP\Core\Kernel` | `__construct` | no | no | yes | `framework/Asap/Core/Kernel.php:35` |
| UNIT_CANDIDATE | CORE | `ASAP\Core\Kernel` | `apiUrl` | yes | no | yes | `framework/Asap/Core/Kernel.php:59` |
| UNIT_CANDIDATE | CORE | `ASAP\Core\Kernel` | `assetUrl` | yes | no | yes | `framework/Asap/Core/Kernel.php:64` |
| UNIT_CANDIDATE | CORE | `ASAP\Core\Kernel` | `getPackage` | yes | no | yes | `framework/Asap/Core/Kernel.php:49` |
| UNIT_CANDIDATE | CORE | `ASAP\Core\Kernel` | `handle` | yes | no | yes | `framework/Asap/Core/Kernel.php:76` |
| UNIT_CANDIDATE | CORE | `ASAP\Core\Kernel` | `packageUrl` | yes | no | yes | `framework/Asap/Core/Kernel.php:69` |
| UNIT_CANDIDATE | CORE | `ASAP\Core\Kernel` | `pageUrl` | yes | no | yes | `framework/Asap/Core/Kernel.php:54` |
| UNIT_CANDIDATE | CORE | `ASAP\Core\Kernel` | `rootDir` | yes | no | yes | `framework/Asap/Core/Kernel.php:44` |
| INTEGRATION_ONLY | CSS | `ASAP\Css\Css` | `__construct` | no | no | yes | `framework/Asap/Css/Css.php:25` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\Database` | `__construct` | no | no | yes | `framework/Asap/Database/Database.php:40` |
| UNIT_CANDIDATE | DATABASE | `ASAP\Database\Database` | `pdo` | yes | no | yes | `framework/Asap/Database/Database.php:44` |
| UNIT_CANDIDATE | DATABASE | `ASAP\Database\DatabaseConfigLoader` | `fromXml` | yes | yes | yes | `framework/Asap/Database/DatabaseConfigLoader.php:51` |
| UNIT_CANDIDATE | DATABASE | `ASAP\Database\DatabaseConfigLoader` | `loadXmlFile` | yes | no | no | `framework/Asap/Database/DatabaseConfigLoader.php:36` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionConfig` | `__construct` | no | no | yes | `framework/Asap/Database/DatabaseConnectionConfig.php:37` |
| UNIT_CANDIDATE | DATABASE | `ASAP\Database\DatabaseConnectionConfig` | `normalizedProvider` | yes | no | yes | `framework/Asap/Database/DatabaseConnectionConfig.php:52` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionConfig` | `optionalParameter` | no | no | yes | `framework/Asap/Database/DatabaseConnectionConfig.php:72` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionConfig` | `parameter` | no | no | yes | `framework/Asap/Database/DatabaseConnectionConfig.php:57` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionsConfig` | `__construct` | no | no | yes | `framework/Asap/Database/DatabaseConnectionsConfig.php:38` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionsConfig` | `all` | no | yes | yes | `framework/Asap/Database/DatabaseConnectionsConfig.php:116` |
| MISSING_TEST_REFERENCE | DATABASE | `ASAP\Database\DatabaseConnectionsConfig` | `assertValidName` | no | no | no | `framework/Asap/Database/DatabaseConnectionsConfig.php:59` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionsConfig` | `count` | no | yes | yes | `framework/Asap/Database/DatabaseConnectionsConfig.php:74` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionsConfig` | `defaultName` | no | no | yes | `framework/Asap/Database/DatabaseConnectionsConfig.php:93` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionsConfig` | `get` | no | yes | yes | `framework/Asap/Database/DatabaseConnectionsConfig.php:84` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionsConfig` | `has` | no | yes | yes | `framework/Asap/Database/DatabaseConnectionsConfig.php:79` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseConnectionsConfig` | `names` | no | no | yes | `framework/Asap/Database/DatabaseConnectionsConfig.php:69` |
| UNIT_CANDIDATE | DATABASE | `ASAP\Database\DatabaseDsnFactory` | `build` | yes | yes | yes | `framework/Asap/Database/DatabaseDsnFactory.php:32` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseException` | `because` | no | yes | yes | `framework/Asap/Database/DatabaseException.php:34` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseMultiConfigLoader` | `fromXml` | no | yes | yes | `framework/Asap/Database/DatabaseMultiConfigLoader.php:62` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseMultiConfigLoader` | `loadXmlFile` | no | no | yes | `framework/Asap/Database/DatabaseMultiConfigLoader.php:47` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseProvider` | `assertSupported` | no | no | yes | `framework/Asap/Database/DatabaseProvider.php:70` |
| UNIT_CANDIDATE | DATABASE | `ASAP\Database\DatabaseProvider` | `normalize` | yes | yes | yes | `framework/Asap/Database/DatabaseProvider.php:57` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseProvider` | `pdoDriver` | no | no | yes | `framework/Asap/Database/DatabaseProvider.php:81` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\DatabaseProvider` | `supported` | no | no | yes | `framework/Asap/Database/DatabaseProvider.php:44` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\Mysql` | `connect` | no | no | yes | `framework/Asap/Database/Mysql.php:32` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\Odbc` | `connect` | no | no | yes | `framework/Asap/Database/Odbc.php:26` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\Oracle` | `connect` | no | no | yes | `framework/Asap/Database/Oracle.php:26` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\PdoDatabaseConnector` | `__construct` | no | no | yes | `framework/Asap/Database/PdoDatabaseConnector.php:35` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\PdoDatabaseConnector` | `connect` | no | no | yes | `framework/Asap/Database/PdoDatabaseConnector.php:39` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\Postgresql` | `connect` | no | no | yes | `framework/Asap/Database/Postgresql.php:26` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\SqlServer` | `connect` | no | no | yes | `framework/Asap/Database/SqlServer.php:26` |
| INTEGRATION_ONLY | DATABASE | `ASAP\Database\Sqlite` | `connect` | no | no | yes | `framework/Asap/Database/Sqlite.php:26` |
| INTEGRATION_ONLY | DATE | `ASAP\Date\Date` | `now` | no | yes | yes | `framework/Asap/Date/Date.php:26` |
| INTEGRATION_ONLY | DATE | `ASAP\Date\Date` | `parse` | no | no | yes | `framework/Asap/Date/Date.php:27` |
| UNIT_CANDIDATE | DEBUG | `ASAP\Debug\Debug` | `add` | yes | no | yes | `framework/Asap/Debug/Debug.php:59` |
| UNIT_CANDIDATE | DEBUG | `ASAP\Debug\Debug` | `addClasses` | yes | no | no | `framework/Asap/Debug/Debug.php:74` |
| UNIT_CANDIDATE | DEBUG | `ASAP\Debug\Debug` | `addDump` | yes | no | no | `framework/Asap/Debug/Debug.php:86` |
| UNIT_CANDIDATE | DEBUG | `ASAP\Debug\Debug` | `dump` | yes | no | no | `framework/Asap/Debug/Debug.php:49` |
| UNIT_CANDIDATE | DEBUG | `ASAP\Debug\Debug` | `get` | yes | yes | yes | `framework/Asap/Debug/Debug.php:101` |
| UNIT_CANDIDATE | DEBUG | `ASAP\Debug\Debug` | `setDebug` | yes | no | no | `framework/Asap/Debug/Debug.php:54` |
| INTEGRATION_ONLY | DIRECTORY | `ASAP\Directory\Directory` | `__construct` | no | no | yes | `framework/Asap/Directory/Directory.php:25` |
| UNIT_CANDIDATE | DIRECTORY | `ASAP\Directory\Directory` | `files` | yes | yes | yes | `framework/Asap/Directory/Directory.php:26` |
| INTEGRATION_ONLY | DOCUMENTATION | `ASAP\Documentation\MarkdownHtmlRenderer` | `render` | no | yes | yes | `framework/Asap/Documentation/MarkdownHtmlRenderer.php:45` |
| INTEGRATION_ONLY | DOCUMENTATION | `ASAP\Documentation\MarkdownPage` | `__construct` | no | no | yes | `framework/Asap/Documentation/MarkdownPage.php:40` |
| INTEGRATION_ONLY | DOCUMENTATION | `ASAP\Documentation\MarkdownPageRepository` | `__construct` | no | no | yes | `framework/Asap/Documentation/MarkdownPageRepository.php:40` |
| INTEGRATION_ONLY | DOCUMENTATION | `ASAP\Documentation\MarkdownPageRepository` | `get` | no | yes | yes | `framework/Asap/Documentation/MarkdownPageRepository.php:54` |
| INTEGRATION_ONLY | EVENT | `ASAP\Event\Event` | `__construct` | no | no | yes | `framework/Asap/Event/Event.php:25` |
| INTEGRATION_ONLY | EXCEPTION | `ASAP\Exception\Exception` | `because` | no | yes | yes | `framework/Asap/Exception/Exception.php:40` |
| INTEGRATION_ONLY | FILE | `ASAP\File\File` | `__construct` | no | no | yes | `framework/Asap/File/File.php:25` |
| UNIT_CANDIDATE | FILE | `ASAP\File\File` | `read` | yes | yes | yes | `framework/Asap/File/File.php:26` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\FormDefinition` | `__construct` | no | no | yes | `framework/Asap/Form/FormDefinition.php:41` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\FormDefinition` | `fields` | no | no | yes | `framework/Asap/Form/FormDefinition.php:59` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\FormError` | `__construct` | no | no | yes | `framework/Asap/Form/FormError.php:32` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\FormException` | `because` | no | yes | yes | `framework/Asap/Form/FormException.php:34` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\FormField` | `__construct` | no | no | yes | `framework/Asap/Form/FormField.php:35` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\FormValidationResult` | `__construct` | no | no | yes | `framework/Asap/Form/FormValidationResult.php:35` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\FormValidationResult` | `isValid` | no | no | yes | `framework/Asap/Form/FormValidationResult.php:39` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\FormValidator` | `validate` | no | yes | yes | `framework/Asap/Form/FormValidator.php:38` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\SubmittedForm` | `__construct` | no | no | yes | `framework/Asap/Form/SubmittedForm.php:38` |
| INTEGRATION_ONLY | FORM | `ASAP\Form\SubmittedForm` | `value` | no | yes | yes | `framework/Asap/Form/SubmittedForm.php:44` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\Fsm` | `demoFlow` | yes | no | yes | `framework/Asap/Fsm/Fsm.php:34` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\SignalDefinition` | `__construct` | no | no | yes | `framework/Asap/Fsm/SignalDefinition.php:45` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\SignalDefinition` | `id` | yes | yes | yes | `framework/Asap/Fsm/SignalDefinition.php:61` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\StateActionInterface` | `execute` | no | yes | yes | `framework/Asap/Fsm/StateActionInterface.php:55` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\StateDefinition` | `__construct` | no | yes | yes | `framework/Asap/Fsm/StateDefinition.php:47` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\StateDefinition` | `id` | yes | yes | yes | `framework/Asap/Fsm/StateDefinition.php:64` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\StateDefinition` | `label` | no | yes | yes | `framework/Asap/Fsm/StateDefinition.php:74` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\StateMachine` | `__construct` | no | yes | yes | `framework/Asap/Fsm/StateMachine.php:54` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\StateMachine` | `apply` | yes | yes | yes | `framework/Asap/Fsm/StateMachine.php:118` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\StateMachine` | `currentState` | yes | yes | yes | `framework/Asap/Fsm/StateMachine.php:85` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\StateMachine` | `memory` | no | yes | yes | `framework/Asap/Fsm/StateMachine.php:95` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\StateMachineException` | `contract` | no | yes | yes | `framework/Asap/Fsm/StateMachineException.php:64` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\StateMemory` | `export` | no | no | yes | `framework/Asap/Fsm/StateMemory.php:83` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\StateMemory` | `get` | yes | yes | yes | `framework/Asap/Fsm/StateMemory.php:69` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\StateMemory` | `set` | no | yes | yes | `framework/Asap/Fsm/StateMemory.php:49` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\TransitionDefinition` | `__construct` | no | yes | yes | `framework/Asap/Fsm/TransitionDefinition.php:51` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\TransitionDefinition` | `action` | no | yes | yes | `framework/Asap/Fsm/TransitionDefinition.php:102` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\TransitionDefinition` | `fromState` | yes | yes | yes | `framework/Asap/Fsm/TransitionDefinition.php:72` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\TransitionDefinition` | `key` | no | yes | yes | `framework/Asap/Fsm/TransitionDefinition.php:112` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\TransitionDefinition` | `signal` | no | yes | yes | `framework/Asap/Fsm/TransitionDefinition.php:82` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\TransitionDefinition` | `toState` | yes | yes | yes | `framework/Asap/Fsm/TransitionDefinition.php:92` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\TransitionResult` | `__construct` | no | no | yes | `framework/Asap/Fsm/TransitionResult.php:47` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\TransitionResult` | `fromState` | yes | no | no | `framework/Asap/Fsm/TransitionResult.php:59` |
| INTEGRATION_ONLY | FSM | `ASAP\Fsm\TransitionResult` | `signal` | no | no | yes | `framework/Asap/Fsm/TransitionResult.php:69` |
| UNIT_CANDIDATE | FSM | `ASAP\Fsm\TransitionResult` | `toState` | yes | no | yes | `framework/Asap/Fsm/TransitionResult.php:79` |
| INTEGRATION_ONLY | FTP | `ASAP\Ftp\Ftp` | `__construct` | no | no | yes | `framework/Asap/Ftp/Ftp.php:38` |
| INTEGRATION_ONLY | FTP | `ASAP\Ftp\Ftp` | `host` | no | no | yes | `framework/Asap/Ftp/Ftp.php:45` |
| INTEGRATION_ONLY | HELPER | `ASAP\Helper\Helper` | `escape` | no | yes | yes | `framework/Asap/Helper/Helper.php:38` |
| INTEGRATION_ONLY | HELPER | `ASAP\Helper\Helper` | `slug` | no | no | yes | `framework/Asap/Helper/Helper.php:43` |
| INTEGRATION_ONLY | HELPER | `ASAP\Helper\HtmlHelper` | `attributes` | no | no | yes | `framework/Asap/Helper/HtmlHelper.php:43` |
| INTEGRATION_ONLY | HELPER | `ASAP\Helper\HtmlHelper` | `escape` | no | yes | yes | `framework/Asap/Helper/HtmlHelper.php:35` |
| INTEGRATION_ONLY | HELPER | `ASAP\Helper\TextHelper` | `slug` | no | no | yes | `framework/Asap/Helper/TextHelper.php:35` |
| INTEGRATION_ONLY | HTTP | `ASAP\Http\Request` | `__construct` | no | yes | yes | `framework/Asap/Http/Request.php:44` |
| INTEGRATION_ONLY | HTTP | `ASAP\Http\Request` | `fromGlobals` | no | yes | yes | `framework/Asap/Http/Request.php:62` |
| INTEGRATION_ONLY | HTTP | `ASAP\Http\Response` | `__construct` | no | no | yes | `framework/Asap/Http/Response.php:48` |
| UNIT_CANDIDATE | HTTP | `ASAP\Http\Response` | `html` | yes | yes | yes | `framework/Asap/Http/Response.php:58` |
| UNIT_CANDIDATE | HTTP | `ASAP\Http\Response` | `json` | yes | yes | yes | `framework/Asap/Http/Response.php:64` |
| INTEGRATION_ONLY | HTTP | `ASAP\Http\Response` | `send` | no | no | yes | `framework/Asap/Http/Response.php:73` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\I18n` | `__construct` | no | no | yes | `framework/Asap/I18n/I18n.php:54` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\I18n` | `dictionary` | yes | no | yes | `framework/Asap/I18n/I18n.php:115` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\I18n` | `getAvalaibleLanguages` | yes | no | yes | `framework/Asap/I18n/I18n.php:74` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\I18n` | `getDictionary` | no | no | yes | `framework/Asap/I18n/I18n.php:121` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\I18n` | `getInstance` | yes | no | yes | `framework/Asap/I18n/I18n.php:62` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\I18n` | `loadDictionary` | no | no | yes | `framework/Asap/I18n/I18n.php:126` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\I18n` | `plural` | no | no | yes | `framework/Asap/I18n/I18n.php:109` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\I18n` | `t` | yes | yes | yes | `framework/Asap/I18n/I18n.php:101` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\I18n` | `translate` | yes | yes | yes | `framework/Asap/I18n/I18n.php:93` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\JsonTranslationCatalogLoader` | `load` | yes | yes | yes | `framework/Asap/I18n/JsonTranslationCatalogLoader.php:47` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\LocaleCode` | `__construct` | no | no | yes | `framework/Asap/I18n/LocaleCode.php:40` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\LocaleCode` | `toString` | yes | no | yes | `framework/Asap/I18n/LocaleCode.php:56` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\PluralRuleInterface` | `select` | no | yes | yes | `framework/Asap/I18n/PluralRuleInterface.php:45` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\Plural\EnglishPluralRule` | `select` | no | yes | yes | `framework/Asap/I18n/Plural/EnglishPluralRule.php:37` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\Plural\FrenchPluralRule` | `select` | no | yes | yes | `framework/Asap/I18n/Plural/FrenchPluralRule.php:37` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\Plural\RussianPluralRule` | `select` | no | yes | yes | `framework/Asap/I18n/Plural/RussianPluralRule.php:40` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\Plural\SpanishPluralRule` | `select` | no | yes | yes | `framework/Asap/I18n/Plural/SpanishPluralRule.php:37` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\TranslationCatalog` | `__construct` | no | no | yes | `framework/Asap/I18n/TranslationCatalog.php:42` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\TranslationCatalog` | `message` | yes | yes | yes | `framework/Asap/I18n/TranslationCatalog.php:49` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\TranslationCatalog` | `messages` | yes | yes | yes | `framework/Asap/I18n/TranslationCatalog.php:78` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\TranslationCatalog` | `plural` | no | no | yes | `framework/Asap/I18n/TranslationCatalog.php:58` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\TranslationCatalog` | `plurals` | no | no | yes | `framework/Asap/I18n/TranslationCatalog.php:84` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\TranslationCatalog` | `toArray` | no | no | yes | `framework/Asap/I18n/TranslationCatalog.php:90` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\TranslationException` | `because` | no | yes | yes | `framework/Asap/I18n/TranslationException.php:48` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\Translator` | `__construct` | no | no | yes | `framework/Asap/I18n/Translator.php:38` |
| INTEGRATION_ONLY | I18N | `ASAP\I18n\Translator` | `plural` | no | no | yes | `framework/Asap/I18n/Translator.php:66` |
| UNIT_CANDIDATE | I18N | `ASAP\I18n\Translator` | `translate` | yes | yes | yes | `framework/Asap/I18n/Translator.php:52` |
| INTEGRATION_ONLY | JAVASCRIPT | `ASAP\Javascript\Javascript` | `__construct` | no | no | yes | `framework/Asap/Javascript/Javascript.php:25` |
| INTEGRATION_ONLY | JSON | `ASAP\Json\Json` | `decode` | no | yes | yes | `framework/Asap/Json/Json.php:57` |
| INTEGRATION_ONLY | JSON | `ASAP\Json\Json` | `encode` | no | yes | yes | `framework/Asap/Json/Json.php:41` |
| MISSING_TEST_REFERENCE | JSON | `ASAP\Json\Json` | `pretty` | no | no | no | `framework/Asap/Json/Json.php:49` |
| MISSING_TEST_REFERENCE | JSON | `ASAP\Json\Json` | `readFile` | no | no | no | `framework/Asap/Json/Json.php:71` |
| MISSING_TEST_REFERENCE | JSON | `ASAP\Json\Json` | `writeFile` | no | no | no | `framework/Asap/Json/Json.php:83` |
| INTEGRATION_ONLY | LANGUAGE | `ASAP\Language\Language` | `__construct` | no | no | yes | `framework/Asap/Language/Language.php:25` |
| INTEGRATION_ONLY | LINK | `ASAP\Link\Link` | `__construct` | no | no | yes | `framework/Asap/Link/Link.php:45` |
| UNIT_CANDIDATE | LINK | `ASAP\Link\Link` | `__toString` | yes | no | no | `framework/Asap/Link/Link.php:56` |
| UNIT_CANDIDATE | LINK | `ASAP\Link\Link` | `changeClass` | yes | no | no | `framework/Asap/Link/Link.php:79` |
| UNIT_CANDIDATE | LINK | `ASAP\Link\Link` | `changeId` | yes | no | no | `framework/Asap/Link/Link.php:86` |
| UNIT_CANDIDATE | LINK | `ASAP\Link\Link` | `getBlock` | yes | no | no | `framework/Asap/Link/Link.php:93` |
| UNIT_CANDIDATE | LINK | `ASAP\Link\Link` | `getMode` | yes | no | no | `framework/Asap/Link/Link.php:98` |
| INTEGRATION_ONLY | LOG | `ASAP\Log\Log` | `add` | no | no | yes | `framework/Asap/Log/Log.php:26` |
| UNIT_CANDIDATE | LOG | `ASAP\Log\Log` | `entries` | yes | no | yes | `framework/Asap/Log/Log.php:61` |
| INTEGRATION_ONLY | LOG | `ASAP\Log\Log` | `error` | no | yes | yes | `framework/Asap/Log/Log.php:56` |
| UNIT_CANDIDATE | LOG | `ASAP\Log\Log` | `info` | yes | no | no | `framework/Asap/Log/Log.php:46` |
| INTEGRATION_ONLY | LOG | `ASAP\Log\Log` | `messages` | no | yes | yes | `framework/Asap/Log/Log.php:66` |
| MISSING_TEST_REFERENCE | LOG | `ASAP\Log\Log` | `records` | no | no | no | `framework/Asap/Log/Log.php:71` |
| INTEGRATION_ONLY | LOG | `ASAP\Log\Log` | `warning` | no | yes | yes | `framework/Asap/Log/Log.php:51` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaArchivePhase` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaArchivePhase.php:32` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaArchiveWriter` | `writeReport` | no | no | no | `framework/Asap/Lstsa/LstsaArchiveWriter.php:32` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaBatchExecutor` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaBatchExecutor.php:26` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaBatchExecutor` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaBatchExecutor.php:31` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaConfigLoader` | `fromXml` | no | yes | yes | `framework/Asap/Lstsa/LstsaConfigLoader.php:46` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaConfigLoader` | `loadXmlFile` | no | no | no | `framework/Asap/Lstsa/LstsaConfigLoader.php:31` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaDatabaseStagingExecutor` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaDatabaseStagingExecutor.php:43` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaDatabaseStagingExecutor` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaDatabaseStagingExecutor.php:56` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaDefinition.php:36` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `archiveConnection` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:84` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `archiveMode` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:82` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `archivePath` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:83` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `archiveTable` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:85` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `assertConnections` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:96` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `id` | no | yes | yes | `framework/Asap/Lstsa/LstsaDefinition.php:75` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `loadConnection` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:77` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `loadFields` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:88` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `loadTable` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:78` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `mappings` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:91` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `runtime` | no | yes | yes | `framework/Asap/Lstsa/LstsaDefinition.php:94` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `storeConnection` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:79` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `storeMode` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:81` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `storeTable` | no | no | no | `framework/Asap/Lstsa/LstsaDefinition.php:80` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaDefinition` | `version` | no | yes | yes | `framework/Asap/Lstsa/LstsaDefinition.php:76` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaException` | `because` | no | yes | yes | `framework/Asap/Lstsa/LstsaException.php:31` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaFieldConstraint` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaFieldConstraint.php:38` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaFieldConstraint` | `fromXml` | no | yes | yes | `framework/Asap/Lstsa/LstsaFieldConstraint.php:74` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaFieldConstraint` | `supportedTypes` | no | no | no | `framework/Asap/Lstsa/LstsaFieldConstraint.php:69` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaFieldConstraint` | `validate` | no | yes | yes | `framework/Asap/Lstsa/LstsaFieldConstraint.php:103` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaFieldMapping` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaFieldMapping.php:34` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaFieldMapping` | `fromXml` | no | yes | yes | `framework/Asap/Lstsa/LstsaFieldMapping.php:55` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaFsmController` | `apply` | no | no | yes | `framework/Asap/Lstsa/LstsaFsmController.php:46` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaFsmState` | `all` | no | yes | yes | `framework/Asap/Lstsa/LstsaFsmState.php:49` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaIdentifier` | `quote` | no | no | yes | `framework/Asap/Lstsa/LstsaIdentifier.php:33` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaIdentifier` | `stageTable` | no | no | no | `framework/Asap/Lstsa/LstsaIdentifier.php:42` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaLoadPhase` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaLoadPhase.php:33` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaPhaseInterface` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaPhaseInterface.php:37` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaPipelineContext` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaPipelineContext.php:73` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaPipelineContext` | `reject` | no | no | no | `framework/Asap/Lstsa/LstsaPipelineContext.php:87` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:45` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `addCounter` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:70` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `addMessage` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:83` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `create` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:59` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `finish` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:91` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `runId` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:102` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `toArray` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:108` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `toJson` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:123` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReport` | `toMarkdown` | no | no | yes | `framework/Asap/Lstsa/LstsaReport.php:133` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReportCatalog` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaReportCatalog.php:37` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReportCatalog` | `build` | no | yes | yes | `framework/Asap/Lstsa/LstsaReportCatalog.php:52` |
| MISSING_TEST_REFERENCE | LSTSA | `ASAP\Lstsa\LstsaReportCatalog` | `writeIndex` | no | no | no | `framework/Asap/Lstsa/LstsaReportCatalog.php:97` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaReportPhase` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaReportPhase.php:33` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStatus` | `all` | no | yes | yes | `framework/Asap/Lstsa/LstsaRunStatus.php:33` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStatus` | `assertValid` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStatus.php:49` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStatus` | `isFinal` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStatus.php:56` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:25` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `acquirePendingRun` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:85` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `createRun` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:37` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `finish` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:231` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `heartbeat` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:124` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `listRunsByStatus` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:268` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `projectRoot` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:390` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `readRun` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:289` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `writeArchivePayload` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:173` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `writeCheckpoint` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:149` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `writeEventPayload` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:212` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `writeQuarantinePayload` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:193` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `writeReport` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:322` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunStore` | `writeRun` | no | no | yes | `framework/Asap/Lstsa/LstsaRunStore.php:306` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunner` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaRunner.php:24` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaRunner` | `runOnce` | no | no | yes | `framework/Asap/Lstsa/LstsaRunner.php:29` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaScheduler` | `__construct` | no | no | yes | `framework/Asap/Lstsa/LstsaScheduler.php:24` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaScheduler` | `enqueue` | no | no | yes | `framework/Asap/Lstsa/LstsaScheduler.php:29` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaScheduler` | `enqueueDatabaseStagingSmokeRun` | no | no | yes | `framework/Asap/Lstsa/LstsaScheduler.php:97` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaScheduler` | `enqueueMemoryBatchSmokeRun` | no | no | yes | `framework/Asap/Lstsa/LstsaScheduler.php:58` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaScheduler` | `enqueueSmokeRun` | no | no | yes | `framework/Asap/Lstsa/LstsaScheduler.php:36` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaSecureInputPhase` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaSecureInputPhase.php:32` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaSecureOutputPhase` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaSecureOutputPhase.php:32` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaStorePhase` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaStorePhase.php:37` |
| INTEGRATION_ONLY | LSTSA | `ASAP\Lstsa\LstsaTransformPhase` | `execute` | no | yes | yes | `framework/Asap/Lstsa/LstsaTransformPhase.php:32` |
| INTEGRATION_ONLY | MAIL | `ASAP\Mail\Mail` | `__construct` | no | no | yes | `framework/Asap/Mail/Mail.php:38` |
| INTEGRATION_ONLY | MAIL | `ASAP\Mail\PhpMailer` | `send` | no | no | yes | `framework/Asap/Mail/PhpMailer.php:38` |
| INTEGRATION_ONLY | MENU | `ASAP\Menu\Menu` | `add` | no | no | yes | `framework/Asap/Menu/Menu.php:41` |
| INTEGRATION_ONLY | MENU | `ASAP\Menu\Menu` | `items` | no | no | yes | `framework/Asap/Menu/Menu.php:53` |
| INTEGRATION_ONLY | MENU | `ASAP\Menu\MenuException` | `because` | no | yes | yes | `framework/Asap/Menu/MenuException.php:34` |
| INTEGRATION_ONLY | MENU | `ASAP\Menu\MenuItem` | `__construct` | no | no | yes | `framework/Asap/Menu/MenuItem.php:38` |
| INTEGRATION_ONLY | MENU | `ASAP\Menu\MenuTree` | `__construct` | no | no | yes | `framework/Asap/Menu/MenuTree.php:38` |
| INTEGRATION_ONLY | MENU | `ASAP\Menu\MenuTree` | `toArray` | no | no | yes | `framework/Asap/Menu/MenuTree.php:48` |
| INTEGRATION_ONLY | MODEL | `ASAP\Model\Model` | `__construct` | no | no | yes | `framework/Asap/Model/Model.php:44` |
| UNIT_CANDIDATE | MODEL | `ASAP\Model\Model` | `all` | yes | yes | yes | `framework/Asap/Model/Model.php:70` |
| UNIT_CANDIDATE | MODEL | `ASAP\Model\Model` | `get` | yes | yes | yes | `framework/Asap/Model/Model.php:49` |
| UNIT_CANDIDATE | MODEL | `ASAP\Model\Model` | `set` | yes | yes | yes | `framework/Asap/Model/Model.php:58` |
| INTEGRATION_ONLY | MODULE | `ASAP\Module\Module` | `__construct` | no | no | yes | `framework/Asap/Module/Module.php:47` |
| MISSING_TEST_REFERENCE | MODULE | `ASAP\Module\Module` | `isEnabled` | no | no | no | `framework/Asap/Module/Module.php:62` |
| INTEGRATION_ONLY | MODULE | `ASAP\Module\Module` | `option` | no | no | yes | `framework/Asap/Module/Module.php:67` |
| INTEGRATION_ONLY | MODULE | `ASAP\Module\ModuleDefinition` | `__construct` | no | no | yes | `framework/Asap/Module/ModuleDefinition.php:37` |
| INTEGRATION_ONLY | MODULE | `ASAP\Module\ModuleRegistry` | `__construct` | no | no | yes | `framework/Asap/Module/ModuleRegistry.php:46` |
| MISSING_TEST_REFERENCE | MODULE | `ASAP\Module\ModuleRegistry` | `getEnabled` | no | no | no | `framework/Asap/Module/ModuleRegistry.php:53` |
| INTEGRATION_ONLY | PACKAGE | `ASAP\Package\Package` | `__construct` | no | no | yes | `framework/Asap/Package/Package.php:40` |
| UNIT_CANDIDATE | PACKAGE | `ASAP\Package\Package` | `content` | yes | yes | yes | `framework/Asap/Package/Package.php:77` |
| UNIT_CANDIDATE | PACKAGE | `ASAP\Package\Package` | `hasLanguage` | yes | no | no | `framework/Asap/Package/Package.php:66` |
| UNIT_CANDIDATE | PACKAGE | `ASAP\Package\Package` | `id` | yes | yes | yes | `framework/Asap/Package/Package.php:56` |
| UNIT_CANDIDATE | PACKAGE | `ASAP\Package\Package` | `rootDir` | yes | no | no | `framework/Asap/Package/Package.php:61` |
| INTEGRATION_ONLY | PACKAGE | `ASAP\Package\Package` | `routes` | no | yes | yes | `framework/Asap/Package/Package.php:72` |
| INTEGRATION_ONLY | PACKAGE | `ASAP\Package\PackageRepository` | `__construct` | no | no | yes | `framework/Asap/Package/PackageRepository.php:39` |
| UNIT_CANDIDATE | PACKAGE | `ASAP\Package\PackageRepository` | `all` | yes | yes | yes | `framework/Asap/Package/PackageRepository.php:47` |
| UNIT_CANDIDATE | PACKAGE | `ASAP\Package\PackageRepository` | `get` | yes | yes | yes | `framework/Asap/Package/PackageRepository.php:52` |
| UNIT_CANDIDATE | PACKAGE | `ASAP\Package\PackageRepository` | `resolve` | yes | yes | no | `framework/Asap/Package/PackageRepository.php:61` |
| INTEGRATION_ONLY | RENDERER | `ASAP\Renderer\HtmlRenderer` | `__construct` | no | no | yes | `framework/Asap/Renderer/HtmlRenderer.php:41` |
| INTEGRATION_ONLY | RENDERER | `ASAP\Renderer\HtmlRenderer` | `render` | no | yes | yes | `framework/Asap/Renderer/HtmlRenderer.php:45` |
| INTEGRATION_ONLY | RENDERER | `ASAP\Renderer\JsonRenderer` | `render` | no | yes | yes | `framework/Asap/Renderer/JsonRenderer.php:44` |
| INTEGRATION_ONLY | RENDERER | `ASAP\Renderer\RenderException` | `because` | no | yes | yes | `framework/Asap/Renderer/RenderException.php:37` |
| UNIT_CANDIDATE | RENDERER | `ASAP\Renderer\RendererInterface` | `render` | yes | yes | yes | `framework/Asap/Renderer/RendererInterface.php:40` |
| INTEGRATION_ONLY | RENDERER | `ASAP\Renderer\ViewModel` | `__construct` | no | no | yes | `framework/Asap/Renderer/ViewModel.php:46` |
| INTEGRATION_ONLY | REQUEST | `ASAP\Request\Request` | `__construct` | no | yes | yes | `framework/Asap/Request/Request.php:21` |
| INTEGRATION_ONLY | REQUEST | `ASAP\Request\Request` | `toHttpRequest` | no | yes | yes | `framework/Asap/Request/Request.php:22` |
| INTEGRATION_ONLY | RESPONSE | `ASAP\Response\Response` | `__construct` | no | no | yes | `framework/Asap/Response/Response.php:21` |
| INTEGRATION_ONLY | RESPONSE | `ASAP\Response\Response` | `toHttpResponse` | no | no | yes | `framework/Asap/Response/Response.php:22` |
| UNIT_CANDIDATE | RESPONSE | `ASAP\Response\ResponseFacade` | `html` | yes | yes | yes | `framework/Asap/Response/ResponseFacade.php:37` |
| UNIT_CANDIDATE | RESPONSE | `ASAP\Response\ResponseFacade` | `json` | yes | yes | yes | `framework/Asap/Response/ResponseFacade.php:43` |
| UNIT_CANDIDATE | REST | `ASAP\Rest\Rest` | `json` | yes | yes | yes | `framework/Asap/Rest/Rest.php:43` |
| INTEGRATION_ONLY | ROUTER | `ASAP\Router\Route` | `__construct` | no | no | yes | `framework/Asap/Router/Route.php:20` |
| INTEGRATION_ONLY | ROUTER | `ASAP\Router\Router` | `__construct` | no | yes | yes | `framework/Asap/Router/Router.php:47` |
| INTEGRATION_ONLY | ROUTER | `ASAP\Router\Router` | `add` | no | yes | yes | `framework/Asap/Router/Router.php:54` |
| UNIT_CANDIDATE | ROUTER | `ASAP\Router\Router` | `all` | yes | yes | yes | `framework/Asap/Router/Router.php:99` |
| INTEGRATION_ONLY | ROUTER | `ASAP\Router\Router` | `byName` | no | yes | yes | `framework/Asap/Router/Router.php:77` |
| INTEGRATION_ONLY | ROUTER | `ASAP\Router\Router` | `hasName` | no | yes | yes | `framework/Asap/Router/Router.php:91` |
| INTEGRATION_ONLY | ROUTER | `ASAP\Router\Router` | `hasPath` | no | yes | yes | `framework/Asap/Router/Router.php:86` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\AttributeRouteProvider` | `__construct` | no | no | yes | `framework/Asap/Routing/AttributeRouteProvider.php:42` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\AttributeRouteProvider` | `routes` | yes | yes | yes | `framework/Asap/Routing/AttributeRouteProvider.php:47` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\ClassIndex` | `__construct` | no | no | yes | `framework/Asap/Routing/ClassIndex.php:47` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\ClassIndex` | `classes` | yes | no | yes | `framework/Asap/Routing/ClassIndex.php:90` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\ClassIndex` | `classesInNamespace` | yes | no | yes | `framework/Asap/Routing/ClassIndex.php:101` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\ClassIndex` | `fromComposerClassMap` | yes | no | yes | `framework/Asap/Routing/ClassIndex.php:84` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\ClassIndex` | `pathForClass` | yes | no | yes | `framework/Asap/Routing/ClassIndex.php:95` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\Route` | `__construct` | no | yes | yes | `framework/Asap/Routing/Route.php:51` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\Route` | `normalizedMethods` | yes | yes | yes | `framework/Asap/Routing/Route.php:86` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\RouteCompilerException` | `because` | no | yes | yes | `framework/Asap/Routing/RouteCompilerException.php:42` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\RouteDefinition` | `__construct` | no | no | yes | `framework/Asap/Routing/RouteDefinition.php:49` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\RouteDefinition` | `normalizedMethods` | yes | yes | no | `framework/Asap/Routing/RouteDefinition.php:90` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\RouteDefinition` | `toManifestRow` | no | yes | no | `framework/Asap/Routing/RouteDefinition.php:102` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\RouteManifestCompiler` | `compile` | yes | no | yes | `framework/Asap/Routing/RouteManifestCompiler.php:44` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\RouteManifestCompiler` | `loadPhpManifest` | yes | no | yes | `framework/Asap/Routing/RouteManifestCompiler.php:114` |
| UNIT_CANDIDATE | ROUTING | `ASAP\Routing\RouteManifestCompiler` | `writePhpManifest` | yes | no | yes | `framework/Asap/Routing/RouteManifestCompiler.php:94` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\RouteMatch` | `__construct` | no | no | yes | `framework/Asap/Routing/RouteMatch.php:54` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\Router` | `__construct` | no | yes | yes | `framework/Asap/Routing/Router.php:53` |
| INTEGRATION_ONLY | ROUTING | `ASAP\Routing\Router` | `fromXml` | no | yes | yes | `framework/Asap/Routing/Router.php:67` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\AclGuard` | `assertAllowed` | no | yes | yes | `framework/Asap/Security/AclGuard.php:53` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\FsmGuard` | `assertAllowed` | no | yes | yes | `framework/Asap/Security/FsmGuard.php:50` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\SecureDispatchDecision` | `__construct` | no | no | yes | `framework/Asap/Security/SecureDispatchDecision.php:50` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\SecureDispatchGate` | `assertAllowed` | no | yes | yes | `framework/Asap/Security/SecureDispatchGate.php:65` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\Security` | `__construct` | no | no | yes | `framework/Asap/Security/Security.php:42` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\Security` | `allow` | no | yes | yes | `framework/Asap/Security/Security.php:48` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\Security` | `assertAllowed` | no | yes | yes | `framework/Asap/Security/Security.php:72` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\Security` | `deny` | no | no | yes | `framework/Asap/Security/Security.php:53` |
| MISSING_TEST_REFERENCE | SECURITY | `ASAP\Security\Security` | `isAllowed` | no | no | no | `framework/Asap/Security/Security.php:62` |
| MISSING_TEST_REFERENCE | SECURITY | `ASAP\Security\Security` | `isDenied` | no | no | no | `framework/Asap/Security/Security.php:67` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\SiteSecurityPolicy` | `__construct` | no | yes | yes | `framework/Asap/Security/SiteSecurityPolicy.php:55` |
| INTEGRATION_ONLY | SECURITY | `ASAP\Security\SiteSecurityPolicyLoader` | `load` | no | yes | yes | `framework/Asap/Security/SiteSecurityPolicyLoader.php:54` |
| INTEGRATION_ONLY | SESSION | `ASAP\Session\Session` | `__construct` | no | no | yes | `framework/Asap/Session/Session.php:44` |
| UNIT_CANDIDATE | SESSION | `ASAP\Session\Session` | `all` | yes | yes | yes | `framework/Asap/Session/Session.php:87` |
| INTEGRATION_ONLY | SESSION | `ASAP\Session\Session` | `clear` | no | yes | no | `framework/Asap/Session/Session.php:79` |
| UNIT_CANDIDATE | SESSION | `ASAP\Session\Session` | `get` | yes | yes | yes | `framework/Asap/Session/Session.php:49` |
| MISSING_TEST_REFERENCE | SESSION | `ASAP\Session\Session` | `getOrDefault` | no | no | no | `framework/Asap/Session/Session.php:58` |
| INTEGRATION_ONLY | SESSION | `ASAP\Session\Session` | `has` | no | yes | yes | `framework/Asap/Session/Session.php:69` |
| INTEGRATION_ONLY | SESSION | `ASAP\Session\Session` | `remove` | no | yes | yes | `framework/Asap/Session/Session.php:74` |
| UNIT_CANDIDATE | SESSION | `ASAP\Session\Session` | `set` | yes | yes | yes | `framework/Asap/Session/Session.php:63` |
| INTEGRATION_ONLY | SITE | `ASAP\Site\SiteDefinition` | `__construct` | no | yes | yes | `framework/Asap/Site/SiteDefinition.php:37` |
| UNIT_CANDIDATE | SITE | `ASAP\Site\SiteDefinition` | `hasDatabase` | yes | yes | yes | `framework/Asap/Site/SiteDefinition.php:65` |
| UNIT_CANDIDATE | SITE | `ASAP\Site\SiteDefinition` | `requireDatabaseFile` | yes | yes | yes | `framework/Asap/Site/SiteDefinition.php:70` |
| INTEGRATION_ONLY | SITE | `ASAP\Site\SiteResolver` | `__construct` | no | no | yes | `framework/Asap/Site/SiteResolver.php:39` |
| UNIT_CANDIDATE | SITE | `ASAP\Site\SiteResolver` | `resolve` | yes | yes | no | `framework/Asap/Site/SiteResolver.php:46` |
| INTEGRATION_ONLY | SMTP | `ASAP\Smtp\Smtp` | `__construct` | no | no | yes | `framework/Asap/Smtp/Smtp.php:38` |
| UNIT_CANDIDATE | SUPPORT | `ASAP\Support\Support` | `e` | yes | yes | yes | `framework/Asap/Support/Support.php:35` |
| UNIT_CANDIDATE | SUPPORT | `ASAP\Support\Support` | `normalizePath` | yes | no | no | `framework/Asap/Support/Support.php:40` |
| UNIT_CANDIDATE | SUPPORT | `ASAP\Support\Support` | `startsWith` | yes | no | no | `framework/Asap/Support/Support.php:87` |
| UNIT_CANDIDATE | SUPPORT | `ASAP\Support\Support` | `trimSlashes` | yes | no | no | `framework/Asap/Support/Support.php:92` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\Adapter` | `loadTemplate` | yes | no | yes | `framework/Asap/Template/Adapter.php:42` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\Adapter` | `render` | yes | yes | yes | `framework/Asap/Template/Adapter.php:47` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\Smarty` | `assign` | yes | no | no | `framework/Asap/Template/Smarty.php:46` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\Smarty` | `assignAll` | yes | no | no | `framework/Asap/Template/Smarty.php:56` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\Smarty` | `loadTemplate` | yes | no | no | `framework/Asap/Template/Smarty.php:68` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\Smarty` | `parse` | yes | no | yes | `framework/Asap/Template/Smarty.php:63` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\Smarty` | `render` | yes | yes | yes | `framework/Asap/Template/Smarty.php:73` |
| INTEGRATION_ONLY | TEMPLATE | `ASAP\Template\TemplateException` | `because` | no | yes | yes | `framework/Asap/Template/TemplateException.php:34` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\TemplateRendererInterface` | `render` | yes | yes | yes | `framework/Asap/Template/TemplateRendererInterface.php:47` |
| INTEGRATION_ONLY | TEMPLATE | `ASAP\Template\Twig` | `__construct` | no | no | yes | `framework/Asap/Template/Twig.php:41` |
| INTEGRATION_ONLY | TEMPLATE | `ASAP\Template\Twig` | `loadTemplate` | no | no | yes | `framework/Asap/Template/Twig.php:45` |
| INTEGRATION_ONLY | TEMPLATE | `ASAP\Template\Twig` | `render` | no | yes | yes | `framework/Asap/Template/Twig.php:50` |
| INTEGRATION_ONLY | TEMPLATE | `ASAP\Template\TwigTemplateRenderer` | `__construct` | no | no | yes | `framework/Asap/Template/TwigTemplateRenderer.php:45` |
| INTEGRATION_ONLY | TEMPLATE | `ASAP\Template\TwigTemplateRenderer` | `render` | no | yes | yes | `framework/Asap/Template/TwigTemplateRenderer.php:68` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\X64` | `assign` | yes | no | no | `framework/Asap/Template/X64.php:40` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\X64` | `assignAll` | yes | no | no | `framework/Asap/Template/X64.php:50` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\X64` | `loadTemplate` | yes | no | no | `framework/Asap/Template/X64.php:62` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\X64` | `parse` | yes | no | yes | `framework/Asap/Template/X64.php:57` |
| UNIT_CANDIDATE | TEMPLATE | `ASAP\Template\X64` | `render` | yes | yes | yes | `framework/Asap/Template/X64.php:67` |
| INTEGRATION_ONLY | THEME | `ASAP\Theme\ThemeDefinition` | `__construct` | no | no | yes | `framework/Asap/Theme/ThemeDefinition.php:41` |
| INTEGRATION_ONLY | URL | `ASAP\Url\Url` | `__construct` | no | no | yes | `framework/Asap/Url/Url.php:53` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `__toString` | yes | no | no | `framework/Asap/Url/Url.php:109` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `asset` | yes | yes | no | `framework/Asap/Url/Url.php:94` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `getAnchor` | yes | no | no | `framework/Asap/Url/Url.php:189` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `getArguments` | yes | no | no | `framework/Asap/Url/Url.php:176` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `getHost` | yes | no | no | `framework/Asap/Url/Url.php:147` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `getPath` | yes | no | yes | `framework/Asap/Url/Url.php:159` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `getProtocol` | yes | no | no | `framework/Asap/Url/Url.php:131` |
| INTEGRATION_ONLY | URL | `ASAP\Url\Url` | `route` | no | yes | yes | `framework/Asap/Url/Url.php:100` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `setAnchor` | yes | no | no | `framework/Asap/Url/Url.php:194` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `setArguments` | yes | no | no | `framework/Asap/Url/Url.php:182` |
| MISSING_TEST_REFERENCE | URL | `ASAP\Url\Url` | `setHost` | no | no | no | `framework/Asap/Url/Url.php:152` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `setPath` | yes | no | no | `framework/Asap/Url/Url.php:164` |
| MISSING_TEST_REFERENCE | URL | `ASAP\Url\Url` | `setProtocol` | no | no | no | `framework/Asap/Url/Url.php:136` |
| UNIT_CANDIDATE | URL | `ASAP\Url\Url` | `to` | yes | yes | yes | `framework/Asap/Url/Url.php:78` |
| INTEGRATION_ONLY | URL | `ASAP\Url\UrlException` | `because` | no | yes | yes | `framework/Asap/Url/UrlException.php:34` |
| INTEGRATION_ONLY | URL | `ASAP\Url\UrlGenerator` | `__construct` | no | no | yes | `framework/Asap/Url/UrlGenerator.php:38` |
| INTEGRATION_ONLY | URL | `ASAP\Url\UrlGenerator` | `path` | no | yes | yes | `framework/Asap/Url/UrlGenerator.php:45` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `__construct` | no | no | yes | `framework/Asap/Validation/Validator.php:47` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `email` | no | yes | yes | `framework/Asap/Validation/Validator.php:62` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `getMessages` | no | no | yes | `framework/Asap/Validation/Validator.php:52` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `integer` | no | no | yes | `framework/Asap/Validation/Validator.php:67` |
| UNIT_CANDIDATE | VALIDATION | `ASAP\Validation\Validator` | `isAbsoluteUrl` | yes | no | yes | `framework/Asap/Validation/Validator.php:179` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isAddress` | no | no | yes | `framework/Asap/Validation/Validator.php:281` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isBirthDate` | no | no | yes | `framework/Asap/Validation/Validator.php:155` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isBool` | no | no | yes | `framework/Asap/Validation/Validator.php:119` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isBoolean` | no | no | yes | `framework/Asap/Validation/Validator.php:124` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isCityName` | no | no | yes | `framework/Asap/Validation/Validator.php:266` |
| UNIT_CANDIDATE | VALIDATION | `ASAP\Validation\Validator` | `isCleanHtml` | yes | no | yes | `framework/Asap/Validation/Validator.php:316` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isColor` | no | no | yes | `framework/Asap/Validation/Validator.php:195` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isCountryName` | no | no | yes | `framework/Asap/Validation/Validator.php:271` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isDate` | no | no | yes | `framework/Asap/Validation/Validator.php:144` |
| UNIT_CANDIDATE | VALIDATION | `ASAP\Validation\Validator` | `isEan13` | yes | no | yes | `framework/Asap/Validation/Validator.php:200` |
| UNIT_CANDIDATE | VALIDATION | `ASAP\Validation\Validator` | `isEmail` | yes | no | yes | `framework/Asap/Validation/Validator.php:72` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isFileName` | no | no | yes | `framework/Asap/Validation/Validator.php:222` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isFloat` | no | no | yes | `framework/Asap/Validation/Validator.php:100` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isGenderIsoCode` | no | no | yes | `framework/Asap/Validation/Validator.php:246` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isGenderName` | no | no | yes | `framework/Asap/Validation/Validator.php:251` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isGenericName` | no | no | yes | `framework/Asap/Validation/Validator.php:261` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isIcoFile` | no | no | yes | `framework/Asap/Validation/Validator.php:231` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isImgFile` | no | no | yes | `framework/Asap/Validation/Validator.php:236` |
| UNIT_CANDIDATE | VALIDATION | `ASAP\Validation\Validator` | `isInt` | yes | no | yes | `framework/Asap/Validation/Validator.php:77` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isLanguageIsoCode` | no | no | yes | `framework/Asap/Validation/Validator.php:241` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isLinkRewrite` | no | no | yes | `framework/Asap/Validation/Validator.php:306` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isLoadedObject` | no | no | yes | `framework/Asap/Validation/Validator.php:323` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isMailName` | no | no | yes | `framework/Asap/Validation/Validator.php:296` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isMailSubject` | no | no | yes | `framework/Asap/Validation/Validator.php:301` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isMd5` | no | no | yes | `framework/Asap/Validation/Validator.php:164` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isName` | no | no | yes | `framework/Asap/Validation/Validator.php:256` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isNullOrUnsignedInt` | no | no | yes | `framework/Asap/Validation/Validator.php:95` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isOptFloat` | no | no | yes | `framework/Asap/Validation/Validator.php:114` |
| UNIT_CANDIDATE | VALIDATION | `ASAP\Validation\Validator` | `isPasswd` | yes | no | yes | `framework/Asap/Validation/Validator.php:337` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isPhoneNumber` | no | no | yes | `framework/Asap/Validation/Validator.php:291` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isPostCode` | no | no | yes | `framework/Asap/Validation/Validator.php:286` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isProtocol` | no | no | yes | `framework/Asap/Validation/Validator.php:190` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isSha1` | no | no | yes | `framework/Asap/Validation/Validator.php:169` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isStateIsoCode` | no | no | yes | `framework/Asap/Validation/Validator.php:276` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isString` | no | no | yes | `framework/Asap/Validation/Validator.php:139` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isSubDomainName` | no | no | yes | `framework/Asap/Validation/Validator.php:311` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isUnsignedFloat` | no | no | yes | `framework/Asap/Validation/Validator.php:109` |
| UNIT_CANDIDATE | VALIDATION | `ASAP\Validation\Validator` | `isUnsignedInt` | yes | no | yes | `framework/Asap/Validation/Validator.php:86` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isUrl` | no | no | yes | `framework/Asap/Validation/Validator.php:174` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isValidSearch` | no | no | yes | `framework/Asap/Validation/Validator.php:332` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `isValide` | no | no | yes | `framework/Asap/Validation/Validator.php:342` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `is_false` | no | no | yes | `framework/Asap/Validation/Validator.php:134` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `is_true` | no | no | yes | `framework/Asap/Validation/Validator.php:129` |
| INTEGRATION_ONLY | VALIDATION | `ASAP\Validation\Validator` | `notEmpty` | no | no | yes | `framework/Asap/Validation/Validator.php:57` |
| INTEGRATION_ONLY | VIEW | `ASAP\View\Html` | `__construct` | no | no | yes | `framework/Asap/View/Html.php:46` |
| MISSING_TEST_REFERENCE | VIEW | `ASAP\View\Html` | `toResponse` | no | no | no | `framework/Asap/View/Html.php:61` |
| INTEGRATION_ONLY | VIEW | `ASAP\View\View` | `__construct` | no | no | yes | `framework/Asap/View/View.php:38` |
| UNIT_CANDIDATE | VIEW | `ASAP\View\View` | `render` | yes | yes | yes | `framework/Asap/View/View.php:44` |
| INTEGRATION_ONLY | VIEW | `ASAP\View\ViewException` | `because` | no | yes | yes | `framework/Asap/View/ViewException.php:34` |
| MISSING_TEST_REFERENCE | XML | `ASAP\Xml\Xml` | `fromFile` | no | no | no | `framework/Asap/Xml/Xml.php:22` |
| MISSING_TEST_REFERENCE | XML | `ASAP\Xml\Xml` | `fromString` | no | no | no | `framework/Asap/Xml/Xml.php:21` |
