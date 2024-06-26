<?php
/**
 * problemUrl = https://leetcode.com/problems/largest-local-values-in-a-matrix/description/
 */
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[][]
     */
    function largestLocal($grid) {
        $maxLocal = [];
        $n = count($grid);
        for ($i = 1; $i < $n - 1; $i++) {
            for ($j = 1; $j < $n - 1; $j++) {
                $submatrixValues = [
                    $grid[$i - 1][$j - 1], $grid[$i - 1][$j], $grid[$i - 1][$j + 1],
                    $grid[$i][$j - 1],     $grid[$i][$j],     $grid[$i][$j + 1],
                    $grid[$i + 1][$j - 1], $grid[$i + 1][$j], $grid[$i + 1][$j + 1]
                ];
                $maxLocal[$i - 1][$j - 1] = max($submatrixValues);
            }
        }
        return $maxLocal;
    }
}