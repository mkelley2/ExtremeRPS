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
                    return $player1input['player'] . " wins with " . $player1input['choice'];
                }else{
                    return $player2input['player'] . " wins with " . $player2input['choice'];
                }
            }
        }

        function player1InputSetup()
        {
            if($_POST['player1Input']==="Rock"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Human', 'Snake', 'Scissors', 'Fire');
            }else if($_POST['player1Input']==="Fire"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Human', 'Snake', 'Scissors', 'Paper');
            }else if($_POST['player1Input']==="Scissors"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Human', 'Snake', 'Air', 'Paper');
            }else if($_POST['player1Input']==="Snake"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Human', 'Water', 'Air', 'Paper');
            }else if($_POST['player1Input']==="Human"){
                $player1Beats = array('Sponge', 'Wolf', 'Tree', 'Dragon', 'Water', 'Air', 'Paper');
            }else if($_POST['player1Input']==="Tree"){
                $player1Beats = array('Sponge', 'Wolf', 'Devil', 'Dragon', 'Water', 'Air', 'Paper');
            }else if($_POST['player1Input']==="Wolf"){
                $player1Beats = array('Sponge', 'Lightning', 'Devil', 'Dragon', 'Water', 'Air', 'Paper');
            }else if($_POST['player1Input']==="Sponge"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Dragon', 'Water', 'Air', 'Paper');
            }else if($_POST['player1Input']==="Paper"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Dragon', 'Water', 'Air', 'Rock');
            }else if($_POST['player1Input']==="Air"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Dragon', 'Water', 'Fire', 'Rock');
            }else if($_POST['player1Input']==="Water"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Dragon', 'Scissors', 'Fire', 'Rock');
            }else if($_POST['player1Input']==="Dragon"){
                $player1Beats = array('Gun', 'Lightning', 'Devil', 'Snake', 'Scissors', 'Fire', 'Rock');
            }else if($_POST['player1Input']==="Devil"){
                $player1Beats = array('Gun', 'Lightning', 'Human', 'Snake', 'Scissors', 'Fire', 'Rock');
            }else if($_POST['player1Input']==="Lightning"){
                $player1Beats = array('Gun', 'Tree', 'Human', 'Snake', 'Scissors', 'Fire', 'Rock');
            }else if($_POST['player1Input']==="Gun"){
                $player1Beats = array('Wolf', 'Tree', 'Human', 'Snake', 'Scissors', 'Fire', 'Rock');
            }

            return array('player'=>"Player 1", 'choice'=>$_POST['player1Input'], 'beats'=>$player1Beats);
        }

        function player2InputSetup()
        {
            return array('player'=>"Player 2", 'choice'=>$_POST['player2Input']);
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
