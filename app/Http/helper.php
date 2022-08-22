<?php

if (!function_exists('array_prefix')) {
    function array_prefix(string $prefix, array $array): array
    {
        return array_combine(array_map(fn($item) => $prefix . $item, array_keys($array)), $array);
    }
}

if (!function_exists('gravatar_image')) {
    function gravatar_image(string $email, int $size = 64): string
    {
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?s=' . $size;
    }
}
