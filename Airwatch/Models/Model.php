<?php

namespace Airwatch\Models;

// Basic Doctrine Model

class Model
{
    public function toArray()
    {
        // Converts Doctrine Object to Array
        $properties = get_object_vars($this);
        $array = array();

        foreach (array_keys($properties) as $property) {
            $array[$property] = $this->$property;
        }

        return $array;
    }

    public function __set($name, $value)
    {
        // Used for parent Model class so Model elements can be set without redeclaring on subclasses.
        $this->$name = $value;
    }
}