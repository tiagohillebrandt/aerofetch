<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Abstract Model.
 *
 * @since 1.0.0
 */
abstract class AbstractModel
{
    /**
     * The magic getter.
     *
     * @since 1.0.0
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
     * @since 1.0.0
     *
     * @param string $name  The property name.
     * @param mixed  $value The property value.
     *
     * @return void
     */
    public function __set(string $name, $value) // phpcs:ignore Squiz.Commenting.FunctionComment.TypeHintMissing
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
}
