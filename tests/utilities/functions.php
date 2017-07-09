<?php

/**
 * Created by E J Del Monico on 6/19/17.
 */

/**
 * @param $class
 * @param array $attributes
 * @param null $times
 * @return mixed
 */
function create($class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}

/**
 * @param $class
 * @param array $attributes
 * @param null $times
 * @return mixed
 */
function make($class, $attributes = [], $times = null)
{
    return factory($class, $times)->make($attributes);
}
