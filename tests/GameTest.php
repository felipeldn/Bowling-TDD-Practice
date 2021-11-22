<?php

namespace Bowling;

//use GameTest;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     * @test
     */
    public function testGameCanBeInstantiated(): void
    {
        $game = new Game();
        $this->assertInstanceOf(Game::class, $game);
    }

    /**
     * @test
     */
    public function testGutterGame(): void
    {
        $game = new Game();
        for ($i = 0; $i < 20; ++$i) {
            $game->roll(0);
        }
        $this->assertEquals(0, $game->score());
    }

    /**
     * @test
     */
    public function testAllOnes(): void
    {
        $game = new Game();
        for ($i = 0; $i < 20; ++$i) {
            $game->roll(1);
        }
        $this->assertEquals(20, $game->score());
    }
}