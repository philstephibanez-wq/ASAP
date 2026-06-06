<?php

declare(strict_types=1);

require_once __DIR__ . '/../Exception/Exception.php';
require_once __DIR__ . '/Singleton.php';

if (!class_exists('ASAP_Singleton', false)) {
    class ASAP_Singleton extends \ASAP\Compatibility\Singleton
    {
    }
}
