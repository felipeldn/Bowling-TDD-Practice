<?php

namespace Bowling;

//use GameTest;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_instantiate_a_game(): void
    {
        $game = new Game();
        $this->assertInstanceOf(Game::class, $game);
    }


    public function it_should_increment_max_number_of_rolls(int $n, int $pins): void
    {
        $game = new Game();

        for ($i = 0; $i < $n; $i++) {
            $game->roll($pins);
        }
    }

    /**
     * @test
     */
    public function it_should_test_for_a_gutter_game(): void
    {
        $game = new Game();
        $limit = 20;
        $pins = 0;
        $this->it_should_increment_max_number_of_rolls($limit, $pins);
        $this->assertEquals(0, $game->score());
    }

    /**
     * @test
     */
    public function it_should_test_for_rolls_with_all_ones(): void
    {
        $game = new Game();
        for ($i = 0; $i < 20; ++$i) {
            $game->roll(1);
        }
        $this->assertEquals(20, $game->score());
    }

    /**
     * @test
     */

}
