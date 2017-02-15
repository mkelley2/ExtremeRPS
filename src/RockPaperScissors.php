<?php
    class RockPaperScissors
    {
        function winChecker($player1input, $player2input)
        {
            if($player1input['choice']===$player2input['choice']){
                return "Draw";
            }else{
                $position = array_search($player2input['choice'], $player1input['beats']);
                if($position!==false){
                    return $player1input['player'] . "'s " . $player1input['choice'] . " beats " . $player2input['player'] . "'s " . $player2input['choice'];
                }else{
                    return $player2input['player'] . "'s " . $player2input['choice'] . " beats " . $player1input['player'] . "'s " . $player1input['choice'];
                }
            }
        }

        function player1InputSetup($clicked_choice)
        {
            if($clicked_choice==="Rock"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Human', 'Snake', 'Scissors', 'Fire');
            }else if($clicked_choice==="Fire"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Human', 'Snake', 'Scissors', 'Paper');
            }else if($clicked_choice==="Scissors"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Human', 'Snake', 'Air', 'Paper');
            }else if($clicked_choice==="Snake"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Human', 'Water', 'Air', 'Paper');
            }else if($clicked_choice==="Human"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Dragon', 'Water', 'Air', 'Paper');
            }else if($clicked_choice==="Tree"){
                $player1Beats = array('Sponge', 'Wolf', 'Devil', 'Dragon', 'Water', 'Air', 'Paper');
            }else if($clicked_choice==="Wolf"){
                $player1Beats = array('Sponge', 'Lightning', 'Devil', 'Dragon', 'Water', 'Air', 'Paper');
            }else if($clicked_choice==="Sponge"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Dragon', 'Water', 'Air', 'Paper');
            }else if($clicked_choice==="Paper"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Dragon', 'Water', 'Air', 'Rock');
            }else if($clicked_choice==="Air"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Dragon', 'Water', 'Fire', 'Rock');
            }else if($clicked_choice==="Water"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Dragon', 'Scissors', 'Fire', 'Rock');
            }else if($clicked_choice==="Dragon"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Snake', 'Scissors', 'Fire', 'Rock');
            }else if($clicked_choice==="Devil"){
                $player1Beats = array('Gun', 'Lightning', 'Human', 'Snake', 'Scissors', 'Fire', 'Rock');
            }else if($clicked_choice==="Lightning"){
                $player1Beats = array('Gun', 'Tree', 'Human', 'Snake', 'Scissors', 'Fire', 'Rock');
            }else if($clicked_choice==="Gun"){
                $player1Beats = array('Wolf', 'Tree', 'Human', 'Snake', 'Scissors', 'Fire', 'Rock');
            }

            return array('player'=>"Player 1", 'choice'=>$clicked_choice, 'beats'=>$player1Beats);
        }

        function player2InputSetup($clicked_choice)
        {
            return array('player'=>"Player 2", 'choice'=>$clicked_choice);
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
            $_SESSION['game_rounds'] = array();
        }




    }


?>
