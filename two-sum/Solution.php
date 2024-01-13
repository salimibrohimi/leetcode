<?php

/**
 * @see https://leetcode.com/problems/two-sum
 * @author ibrogimov.salim@gmail.com
 */

declare(strict_types=1);

final class Solution
{
    /**
     * @param int[] $numbers
     * @param int $target
     * @return int[]
     */
    public function twoSum(array $numbers, int $target): array
    {
        $invertedNumbers = [];

        foreach ($numbers as $index => $number) {
            $compliment = $target - $number;

            if (isset($invertedNumbers[$compliment])) {
                return [$invertedNumbers[$compliment], $index];
            }

            $invertedNumbers[$number] = $index;
        }

        return [];
    }
}

/** Tests *********************************************************************/
$solution = new Solution();

print_r($solution->twoSum([2, 7, 11, 15], 9));
print_r($solution->twoSum([3, 2, 4], 6));
print_r($solution->twoSum([3, -2, 4, 2], 0));
