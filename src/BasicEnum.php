<?php

declare(strict_types=1);

namespace Namelivia\Fitbit;

use ReflectionClass;

abstract class BasicEnum
{
    private static $constCacheArray = null;

    private static function getConstants() {
        if (self::$constCacheArray == null) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
		}

    protected static function isInvalid($value) {
        $constants = self::getConstants();
        return in_array($value, $constants) === false;
    }
}
