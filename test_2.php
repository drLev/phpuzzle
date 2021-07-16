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
assert(three_devided_range(20, 2)[3] == 9);
assert(array_reverse(three_devided_range(20, 2))[0] == 3);

function count_even(array $arr): int
{
    return array_reduce(
        $arr,
        fn($carry, $item) => $carry += !($item % 2)
    );
}

assert(count_even([1, 2, 3]) == 1);
assert(count_even([1, 2, 3, 4, 5]) == 2);
assert(count_even([1, 3, 5, 7, 9]) == 0);
assert(count_even([2, 4, 6, 8, 10]) == 5);

function min_even(array $arr)
{
    return min(
        ($filtered = array_filter($arr, fn($item) => !($item % 2))) ?
            (count($filtered) > 0 ? $filtered : [-1]) : [-1]
    );
}

assert(min_even([1, 2, 3]) == 2);
assert(min_even([1, 3]) == -1);
assert(min_even([1, 2, 3, 4, 5, 6]) == 2);
assert(min_even([16, 15, 14]) == 14);

function min_sum_elements(array $arr): array
{
    return array_reduce($arr, function($carry, $item) use ($arr) {
        static $index = 0;
        return (array_sum($carry) > $item + ($arr[++$index] ?? PHP_INT_MAX / 2)) ? [$item, $arr[$index]] : $carry;
    }, [PHP_INT_MAX / 2, PHP_INT_MAX / 2]);
}

assert(min_sum_elements([1, 2, 3]) == [1, 2]);
assert(min_sum_elements([8, 1, 6, 3, 6, 2, 8]) == [1, 6]);
assert(min_sum_elements([16, 15, 14]) == [15, 14]);