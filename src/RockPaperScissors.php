<?php
    class RockPaperScissors
    {
        // private $player1Score;
        // private $player2Score;
        // 
        // function __construct(){
        //     $this->player1Score = 0;
        //     $this->player2Score = 0;
        // }
        // 
        // function getPlayer1Score(){
        //     return $this->$player1Score;
        // }
        // 
        // function setPlayer1Score($player1Score){
        //     $this->player1Score = $player1Score;
        // }
        // 
        // function getPlayer2Score(){
        //     return $this->$player2Score;
        // }
        // 
        // function setPlayer2Score($player2Score){
        //     $this->player2Score = $player2Score;
        // }
      
        function winChecker($player1input, $player2input)
        {
            if($player1input['choice']===$player2input['choice']){
                return "Draw";
            }else{
                $position = array_search($player2input['choice'], $player1input['beats']);
                if($position!==false){
                    $_SESSION['score']['player1Score']+=1;
                    return $player1input['player'] . "'s " . $player1input['choice'] . " beats " . $player2input['player'] . "'s " . $player2input['choice'];
                }else{
                    $_SESSION['score']['player2Score']+=1;
                    return $player2input['player'] . "'s " . $player2input['choice'] . " beats " . $player1input['player'] . "'s " . $player1input['choice'];
                }
            }
        }

        function player1InputSetup($clicked_choice)
        {
            if($clicked_choice==="rock"){
                $player1Beats = array('sponge', 'wolf', 'tree', 'human', 'snake', 'scissors', 'fire');
            }else if($clicked_choice==="fire"){
                $player1Beats = array('sponge', 'wolf', 'tree', 'human', 'snake', 'scissors', 'paper');
            }else if($clicked_choice==="scissors"){
                $player1Beats = array('sponge', 'wolf', 'tree', 'human', 'snake', 'air', 'paper');
            }else if($clicked_choice==="snake"){
                $player1Beats = array('sponge', 'wolf', 'tree', 'human', 'water', 'air', 'paper');
            }else if($clicked_choice==="human"){
                $player1Beats = array('sponge', 'wolf', 'tree', 'dragon', 'water', 'air', 'paper');
            }else if($clicked_choice==="tree"){
                $player1Beats = array('sponge', 'wolf', 'devil', 'dragon', 'water', 'air', 'paper');
            }else if($clicked_choice==="wolf"){
                $player1Beats = array('sponge', 'lightning', 'devil', 'dragon', 'water', 'air', 'paper');
            }else if($clicked_choice==="sponge"){
                $player1Beats = array('gun', 'lightning', 'devil', 'dragon', 'water', 'air', 'paper');
            }else if($clicked_choice==="paper"){
                $player1Beats = array('gun', 'lightning', 'devil', 'dragon', 'water', 'air', 'rock');
            }else if($clicked_choice==="air"){
                $player1Beats = array('gun', 'lightning', 'devil', 'dragon', 'water', 'fire', 'rock');
            }else if($clicked_choice==="water"){
                $player1Beats = array('gun', 'lightning', 'devil', 'dragon', 'scissors', 'fire', 'rock');
            }else if($clicked_choice==="dragon"){
                $player1Beats = array('gun', 'lightning', 'devil', 'snake', 'scissors', 'fire', 'rock');
            }else if($clicked_choice==="devil"){
                $player1Beats = array('gun', 'lightning', 'human', 'snake', 'scissors', 'fire', 'rock');
            }else if($clicked_choice==="lightning"){
                $player1Beats = array('gun', 'tree', 'human', 'snake', 'scissors', 'fire', 'rock');
            }else if($clicked_choice==="gun"){
                $player1Beats = array('wolf', 'tree', 'human', 'snake', 'scissors', 'fire', 'rock');
            }

            return array('player'=>"Player 1", 'choice'=>$clicked_choice, 'beats'=>$player1Beats);
        }

        function player2InputSetup($clicked_choice)
        {
            return array('player'=>"Player 2", 'choice'=>$clicked_choice);
        }

        function computerInputSetup()
        {
            $play_options = array("rock", "air", "devil", "dragon", "fire", "gun", "human", "lightning", "paper", "scissors", "snake", "sponge", "tree", "water", "wolf");

            $option_index = rand(0, count($play_options)-1);

            return array('player'=>"Computer", 'choice'=>$play_options[$option_index]);
        }

        function save($results)
        {
            array_unshift($_SESSION['game_rounds'], $results);
        }

        static function getAll()
        {
            return $_SESSION['game_rounds'];
        }

        static function deleteAll()
        {
            $_SESSION['score'] = array("player1Score"=>0, "player2Score"=>0);
            $_SESSION['game_rounds'] = array();
        }




    }


?>
