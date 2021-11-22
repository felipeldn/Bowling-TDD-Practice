<?php

namespace Bowling;

class Game
{
    private $rolls = [];
    private $count = 0;

    public function roll(int $pins)
    {
        $this->count += $pins;
    }

    public function score(): int
    {
        return $this->count;
    }
}