<?php
    class RockPaperScissors
    {
      
        function winChecker($player1input, $player2input)
        {
            if(!empty($_SESSION['moves']['player2Moves']) && !empty($_SESSION['moves']['player1Moves'])){
                if(count($_SESSION['moves']['player2Moves']) == 1 && count($_SESSION['moves']['player1Moves']) == 1 && $_SESSION['moves']['player2Moves'][0] == $_SESSION['moves']['player1Moves'][0]){
                    $_SESSION['game_over'] = true;  
                    return "THE GODS HAVE BEEN DENIED THEIR TRIBUTE!";  
                }else{
                    if($player1input['choice']===$player2input['choice']){
                        return "Draw";
                    }else{
                        $position = array_search($player2input['choice'], $player1input['beats']);
                        if($position!==false){
                            $_SESSION['score']['player1Score']+=1;
                            if($_SESSION['state']=="soloExtreme" || $_SESSION['state']=="dblExtreme"){
                              $losingMove = array_search($player2input['choice'], $_SESSION['moves']['player2Moves']);
                              array_splice($_SESSION['moves']['player2Moves'], $losingMove, 1);
                              if(empty($_SESSION['moves']['player2Moves'])){
                                $_SESSION['game_over'] = true;
                                return $player1input['player'] . " ClAIMS VICTORY!";
                              }else{
                                return $player1input['player'] . " wins: " . $player1input['choice'] . " demolishes " . $player2input['choice'];
                              }
                            }else{
                              return $player1input['player'] . " wins: " . $player1input['choice'] . " beats " . $player2input['choice'];
                            }
                        }else{
                            $_SESSION['score']['player2Score']+=1;
                            if($_SESSION['state']=="soloExtreme" || $_SESSION['state']=="dblExtreme"){
                              $losingMove = array_search($player1input['choice'], $_SESSION['moves']['player1Moves']);
                              array_splice($_SESSION['moves']['player1Moves'], $losingMove, 1);
                              if(empty($_SESSION['moves']['player1Moves'])){
                                $_SESSION['game_over'] = true;
                                return $player2input['player'] . " ClAIMS VICTORY!";
                              }else{
                                return $player2input['player'] . " wins: " . $player2input['choice'] . " demolishes " . $player1input['choice'];
                              }
                            }else{
                              return $player2input['player'] . " wins: " . $player2input['choice'] . " beats " . $player1input['choice'];
                            }
                        }
                    }  
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
            $play_options = $_SESSION['moves']['player2Moves'];

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
            $_SESSION['game_over'] = false;
        }




    }


?>
