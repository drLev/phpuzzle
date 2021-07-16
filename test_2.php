<?php

function three_devided_range(int $max, int $min): array
{
    return
        array_map(function() use ($max) {
            static $index = 0;
            return floor($max / 3) * 3 - $index++ * 3;
        }, array_fill(0, floor($max / 3) - floor($min / 3), null));
}

assert(three_devided_range(20, 2)[0] == 18);
assert(three_devided_range(20, 2)[3] == 12);
assert(array_reverse(three_devided_range(20, 2)[0]) == 3);

function count_even(array $arr): int
{
    return array_reduce(
        $arr,
        fn($carry, $item) => $carry += $item%2 ? 0 : 1
    );
}

assert(count_even([1, 2, 3]) == 1);
assert(count_even([1, 2, 3, 4, 5]) == 2);
assert(count_even([1, 3, 5, 7, 9]) == 0);
assert(count_even([2, 4, 6, 8, 10]) == 5);