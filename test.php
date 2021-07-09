<?php

function even_to_zero(int $value)
{
    return (int) implode(
        '',
        array_map(
            function($item) {
                static $index = 0;
                $index++;
                return $index%2?$item:0;
            },
            str_split($value)
        )
    );
}
assert(even_to_zero(12345) == 10305);
assert(even_to_zero(13572) == 10502);
assert(even_to_zero(2222) == 2020);
assert(even_to_zero(12300321) == 10300020);

function is_palindrom(string $word)
{
    return $word == implode('', array_reverse(mb_str_split($word)));
}

assert(is_palindrom('шалаш'));
assert(is_palindrom('казак'));
assert(is_palindrom('это другое'));