<?php

/**
 * @see https://leetcode.com/problems/add-two-numbers
 * @author ibrogimov.salim@gmail.com
 */

declare(strict_types=1);

require_once('ListNode.php');

final class Solution
{
    public function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $number = $l1->val + $l2->val;
        $remainder = $number % 10;
        $quotient = (int) ($number / 10);

        if ($l1->next) {
            if ($number > 9) {
                $l1->next->val++;
            }

            return new ListNode($remainder, $this->addTwoNumbers($l1->next, $l2->next ?? new ListNode()));
        }

        if ($l2->next) {
            if ($number > 9) {
                $l2->next->val++;
            }

            return new ListNode($remainder, $this->addTwoNumbers($l1->next ?? new ListNode(), $l2->next));
        }

        return new ListNode($remainder, $quotient > 0 ? new ListNode($quotient) : null);
    }
}

/** Tests *********************************************************************/
$solution = new Solution();

$l1 = new ListNode(2, new ListNode(4, new ListNode(3)));
$l2 = new ListNode(5, new ListNode(6, new ListNode(4)));
var_dump($solution->addTwoNumbers($l1, $l2));

$l1 = new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9)))))));
$l2 = new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9))));
var_dump($solution->addTwoNumbers($l1, $l2));

$l1 = new ListNode(2, new ListNode(4, new ListNode(9)));
$l2 = new ListNode(5, new ListNode(6, new ListNode(4, new ListNode(9))));
var_dump($solution->addTwoNumbers($l1, $l2));

var_dump($solution->addTwoNumbers(new ListNode(), new ListNode()));
