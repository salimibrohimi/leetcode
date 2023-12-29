<?php

/**
 * @see https://leetcode.com/problems/median-of-two-sorted-arrays
 * @author ibrogimov.salim@gmail.com
 */

declare(strict_types=1);

final class Solution
{
    /**
     * @param int[] $m
     * @param int[] $n
     */
    public function findMedianSortedArrays(array $m, array $n): float
    {
        $merged = array_merge($m, $n);

        sort($merged, SORT_NUMERIC);

        $mergedSize = count($merged);

        $half = (int) $mergedSize / 2;

        if ($mergedSize % 2 === 0) {
            return ($merged[$half - 1] + $merged[$half]) / 2;
        }

        return $merged[$half];
    }
}

/** Tests *********************************************************************/
$solution = new Solution();

echo $solution->findMedianSortedArrays([1, 2], [2]), PHP_EOL;
echo $solution->findMedianSortedArrays([1, 2, 3], [4, 5]), PHP_EOL;
