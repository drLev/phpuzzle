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