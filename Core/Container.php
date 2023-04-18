<?php

namespace Core;
class Container
{
    protected array $bindings = [];
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (array_key_exists($key, $this->bindings))
        {
            $resolver = $this->bindings[$key];

            return call_user_func($resolver);
        }
        else
        {
            throw new \Exception("No mathing binding found for {$key}");
        }
    }
}