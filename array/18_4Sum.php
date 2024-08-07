<?php
/**
 * problemUrl = https://leetcode.com/problems/4sum/description/
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */

    function fourSum($nums, $target) {
        $n = count($nums);
        if ($n < 4) return [];

        sort($nums);
        $quadruplets = [];

        for ($i = 0; $i < $n - 3; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;

            for ($j = $i + 1; $j < $n - 2; $j++) {
                if ($j > $i + 1 && $nums[$j] == $nums[$j - 1]) continue;

                $left = $j + 1;
                $right = $n - 1;

                while ($left < $right) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];

                    if ($sum == $target) {
                        $quadruplets[] = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];
                        while ($left < $right && $nums[$left] == $nums[$left + 1]) $left++;
                        while ($left < $right && $nums[$right] == $nums[$right - 1]) $right--;
                        $left++;
                        $right--;
                    } elseif ($sum < $target) {
                        $left++;
                    } else {
                        $right--;
                    }
                }
            }
        }

        return $quadruplets;
    }
}