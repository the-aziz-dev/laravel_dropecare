<?php

namespace App\Utils\DecisionTree;

class DecisionTreeNode
{
    public $condition;
    public $yesChild;
    public $noChild;

    public function __construct(callable $condition, $yesChild, $noChild)
    {
        $this->condition = $condition;
        $this->yesChild = $yesChild;
        $this->noChild = $noChild;
    }
}
