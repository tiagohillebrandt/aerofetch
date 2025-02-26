<?php

namespace THSCD\AeroFetch\Models;

abstract class AbstractModel
{
    /**
     * The magic getter.
     *
     * @since {VERSION}
     *
     * @param string $name The property name.
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    /**
     * The magic setter.
     *
     * @since {VERSION}
     *
     * @param string $name  The property name.
     * @param mixed  $value The property value.
     */
    public function __set(string $name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
}
