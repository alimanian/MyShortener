<?php

if (! function_exists('array_prefix'))
{
    function array_prefix(string $prefix, array $array): array
    {
        return array_combine(array_map(fn($item) => $prefix.$item, array_keys($array)), $array);
    }
}
