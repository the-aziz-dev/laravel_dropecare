<?php

namespace App\Utils\DecisionTree;



class DecisionTreeBrain
{
    public static function  execute($data): void
    {

        $root = new DecisionTreeNode(
            function ($data) {
                return (
                    $data->forecast != 'clear sky' &&
                    $data->forecast != 'few clouds' &&
                    $data->forecast != 'mist'
                );
            },
            new DecisionTreeLeaf('no'),
            new DecisionTreeNode(
                function ($data) {
                    return $data->hasWater == 'yes';
                },
                new DecisionTreeLeaf('no'),
                new DecisionTreeNode(
                    function ($data) {
                        return $data->moisture >= 20;
                    },
                    new DecisionTreeLeaf('no'),
                    new DecisionTreeNode(
                        function ($data) {
                            return $data->temperature <= 37;
                        },
                        new DecisionTreeLeaf('no'),

                        new DecisionTreeLeaf('yes')
                    )
                )
            )
        );

        $decision = self::evaluateDecisionTree($data, $root);

        $data->update(['decisionTreeResult' => $decision]);

    }

    private static function evaluateDecisionTree($data, $node): string
    {
        if ($node instanceof DecisionTreeLeaf) {
            return $node->decision;
        }

        $condition = $node->condition;
        $yesChild = $node->yesChild;
        $noChild = $node->noChild;

        if ($condition($data)) {
            return self::evaluateDecisionTree($data, $yesChild);
        } else {
            return self::evaluateDecisionTree($data, $noChild);
        }
    }
}
