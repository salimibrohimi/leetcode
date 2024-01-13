<?php

/**
 * @see https://leetcode.com/problems/minimum-number-of-steps-to-make-two-strings-anagram
 * @author ibrogimov.salim@gmail.com
 */

declare(strict_types=1);

final class Solution
{
    public function minSteps(string $s, string $t): int
    {
        $charCount = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];

            if (isset($charCount[$char])) {
                $charCount[$char]++;
            } else {
                $charCount[$char] = 1;
            }
        }

        $steps = 0;

        for ($i = 0; $i < strlen($t); $i++) {
            $char = $t[$i];

            if (isset($charCount[$char]) && $charCount[$char] > 0) {
                $charCount[$char]--;
            } else {
                $steps++;
            }
        }

        return $steps;
    }
}

/** Tests *********************************************************************/
$solution = new Solution();

echo $solution->minSteps('bab', 'aba'), PHP_EOL;
echo $solution->minSteps('leetcode', 'practice'), PHP_EOL;
echo $solution->minSteps('anagram', 'mangaar'), PHP_EOL;
