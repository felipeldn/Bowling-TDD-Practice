<?php

namespace Bowling;

class Game
{
    private $rolls = [];
//    private $count = 0;
//    private $currentRoll = 0;

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $count = 0;
        $ballNumber = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if (10 === $this->rolls[$ballNumber] + $this->rolls[$ballNumber + 1]) {
                $count += 10 + $this->rolls[$ballNumber + 2];
                $ballNumber += 2;
            } else {
                $count += $this->rolls[$ballNumber] + $this->rolls[$ballNumber + 1];
                $ballNumber += 2;
            }
        }
        return $count;
    }
}