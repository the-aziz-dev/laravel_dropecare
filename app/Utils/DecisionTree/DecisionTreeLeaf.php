<?php

namespace App\Utils\DecisionTree;

class DecisionTreeLeaf
{
    public $decision;

    public function __construct(string $decision)
    {
        $this->decision = $decision;
    }
}
