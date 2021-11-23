<?php

namespace Bowling;

use GameTest;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    protected function setUp(): Game
    {
        $game = new Game();

        return $game;
    }

    /**
     * @test
     */
    public function it_should_instantiate_a_game(): void
    {
        $game = new Game();
        $this->assertInstanceOf(Game::class, $game);
    }


    public function it_should_increment_max_number_of_rolls(int $n, int $pins): Game
    {
        $game = new Game();

        for ($i = 0; $i < $n; $i++) {
            $game->roll($pins);
        }

        return $game;
    }

    /**
     * @test
     */
    public function it_should_test_for_gutter_games(): void
    {
        $game = new Game();
        $this->it_should_increment_max_number_of_rolls(20, 0);
        $this->assertEquals(0, $game->score());
    }

    /**
     * @test
     */
    public function it_should_test_for_rolls_with_all_ones(): void
    {
        $game = $this->it_should_increment_max_number_of_rolls(20, 1);
        $this->assertEquals(20, $game->score());
    }

    /**
     * @test
     */
    public function it_should_test_for_a_spare(): void
    {
        $game = new Game();

        $game->roll(5);
        $game->roll(5); // spare
        $game->roll(3);

        $this->it_should_increment_max_number_of_rolls(17, 0);
        $this->assertEquals(16, $game->score());
    }

    /**
     * @test
     */
    public function it_should_test_for_a_single_strike(): void
    {
        $game = new Game();

        $game->roll(10); // strike
        $game->roll(3);
        $game->roll(4);

        $this->it_should_increment_max_number_of_rolls(16, 0);
        $this->assertEquals(24, $game->score());

    }

    /**
     * @test
     */
    public function it_should_test_for_a_perfect_game(): void
    {
        $game = $this->it_should_increment_max_number_of_rolls(12, 10);
        $this->assertEquals(300, $game->score());
    }
}
