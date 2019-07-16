<?php

declare(strict_types=1);

namespace Namelivia\Fitbit;

use Namelivia\Fitbit\Exceptions\InvalidConstantValueException;
use ReflectionClass;

abstract class BasicEnum
{
    private static $constCacheArray = null;
    private static $className = null;

    private static function getConstants()
    {
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

    protected static function checkValidity($value)
    {
        $constants = self::getConstants();
        if (!in_array($value, $constants)) {
            throw new InvalidConstantValueException(
              'The value ' . $value . ' is not a valid ' . get_called_class() . ' value'
            );
        }
    }
}
