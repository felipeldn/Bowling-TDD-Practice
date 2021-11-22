<?php

namespace Bowling;

class Game
{
    private $rolls = [];

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $count = 0;
        $ballNumber = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->rolls[$ballNumber] + $this->rolls[$ballNumber + 1] === 10) {
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