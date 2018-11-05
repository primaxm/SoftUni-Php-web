<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 5.11.2018 г.
 * Time: 20:06 ч.
 */

namespace Core;


class DataBinder implements DataBinderInterface
{

    public function binde(array $form, $className)
    {
        $classInfo = new \ReflectionClass($className);

        $object = new $className;
        foreach ($form as $key => $value) {
            if ($classInfo->hasProperty($key)) {
                $property = $classInfo->getProperty($key);
                $property->setAccessible(true);
                $property->setValue($object, $value);
            }
        }

        return $object;
    }
}