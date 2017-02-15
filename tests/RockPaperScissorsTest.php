<?php

    require_once 'src/RockPaperScissors.php';

    class RockPaperScissorsTest extends PHPUnit_Framework_TestCase
    {

        function test_gun_dragon()
        {

            $test_RockPaperScissors = new RockPaperScissors;
            $first_input = array('player'=>"Player 1", 'choice'=>"Gun", 'beats'=>array('Wolf', 'Tree', 'Human', 'Snake', 'Scissors', 'Fire', 'Rock'));
            $second_input = array('player'=>"Player 2", 'choice'=>"Dragon");

            $result = $test_RockPaperScissors->winChecker($first_input, $second_input);

            $this->assertEquals("Player 2 wins with Dragon", $result);
        }

        function test_draw()
        {

            $test_RockPaperScissors = new RockPaperScissors;
            $first_input = array('player'=>"Player 1", 'choice'=>"Paper", 'beats'=>"Rock");
            $second_input = array('player'=>"Player 2", 'choice'=>"Paper", 'beats'=>"Rock");

            $result = $test_RockPaperScissors->winChecker($first_input, $second_input);

            $this->assertEquals("Draw", $result);
        }

    }






?>
