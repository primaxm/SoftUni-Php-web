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

    public function binde(array $data,string $className) {
        $class_data = new \ReflectionClass($className);
        $class = new $className();
        foreach ($class_data->getProperties() as $property){
            $name = $property->getName();
            if(isset($data[$name])){
                $t = explode('_',$name);
                $setter = 'set'.implode('',array_map(function ($n){ return ucfirst($n);},$t));
                $class->$setter($data[$name]);
            }
        }
        return $class;
    }
}