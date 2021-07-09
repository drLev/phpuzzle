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
assert(is_palindrom('это другое') === false);

function array_double(array $numbers)
{
    return array_map(
        function($number) {
            return $number * 2;
        },
        $numbers
    );
}

assert(array_double([1, 2, 3]) == [2, 4, 6]);
assert(array_double([3, 2, 1]) == [6, 4, 2]);