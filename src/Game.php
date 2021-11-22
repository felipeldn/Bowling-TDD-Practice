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
            if ($this->isSpare($ballNumber)) {
                $count += 10 + $this->getSpareBonus($ballNumber);
                $ballNumber += 2;
            } else if ($this->isStrike($ballNumber)) {
                $count += 10 + $this->getStrikeBonus($ballNumber);
                $ballNumber += 1;
            } else {
                $count += $this->rolls[$ballNumber] + $this->rolls[$ballNumber + 1];
                $ballNumber += 2;
            }
        }
        return $count;
    }

    /**
     * @param int $ballNumber
     * @return bool
     */
    public function isSpare(int $ballNumber): bool
    {
        return $this->rolls[$ballNumber] + $this->rolls[$ballNumber + 1] === 10;
    }

    /**
     * @param int $ballNumber
     * @return bool
     */
    public function isStrike(int $ballNumber): bool
    {
        return $this->rolls[$ballNumber] === 10;
    }

    /**
     * @param int $ballNumber
     * @return mixed
     */
    public function getSpareBonus(int $ballNumber)
    {
        return $this->rolls[$ballNumber + 2];;
    }

    /**
     * @param int $ballNumber
     * @return mixed
     */
    public function getStrikeBonus(int $ballNumber)
    {
       return $this->rolls[$ballNumber + 1] + $this->rolls[$ballNumber + 2];
    }
}