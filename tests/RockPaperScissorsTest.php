<?php

    require_once 'src/RockPaperScissors.php';

    class RockPaperScissorsTest extends PHPUnit_Framework_TestCase
    {

        function test_gun_dragon()
        {

            $test_RockPaperScissors = new RockPaperScissors;
            $first_input = array('player'=>"Player 1", 'choice'=>"gun", 'beats'=>array('wolf', 'tree', 'human', 'snake', 'scissors', 'fire', 'rock'));
            $second_input = array('player'=>"Player 2", 'choice'=>"dragon");

            $result = $test_RockPaperScissors->winChecker($first_input, $second_input);

            $this->assertEquals("Player 2's dragon beats Player 1's gun", $result);
        }

        function test_draw()
        {

            $test_RockPaperScissors = new RockPaperScissors;
            $first_input = array('player'=>"Player 1", 'choice'=>"paper", 'beats'=>"rock");
            $second_input = array('player'=>"Player 2", 'choice'=>"paper", 'beats'=>"rock");

            $result = $test_RockPaperScissors->winChecker($first_input, $second_input);

            $this->assertEquals("Draw", $result);
        }

    }






?>
