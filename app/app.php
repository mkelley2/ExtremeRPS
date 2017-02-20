<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RockPaperScissors.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    session_start();

    if (empty($_SESSION['game_rounds'])) {
        $_SESSION['score'] = array("player1Score"=>0, "player2Score"=>0);
        $_SESSION['game_rounds'] = array();
        $_SESSION['moves'] = array('player1Moves'=>array("rock", "air", "devil", "dragon", "fire", "gun", "human", "lightning", "paper", "scissors", "snake", "sponge", "tree", "water", "wolf"), 'player2Moves'=>array("rock", "air", "devil", "dragon", "fire", "gun", "human", "lightning", "paper", "scissors", "snake", "sponge", "tree", "water", "wolf"));
        $_SESSION['game_over'] = false;
        $_SESSION['tie_game'] = false;
    }

    $app = new Silex\Application();

    $app['debug']=true;



    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        // return "Play!";
        return $app['twig']->render('form.html.twig',array('score'=>$_SESSION['score'], 'all_games'=>array(),'moves'=>$_SESSION['moves'], 'state' => "default"));
    });
    $app->post("/", function() use ($app) {
        if(isset($_POST['player-choice'])) {
            $_SESSION['state'] = $_POST['player-choice'];
        }
        return $app['twig']->render('play.html.twig',array("tie"=>$_SESSION['tie_game'], "game_over"=> $_SESSION['game_over'], 'score'=>$_SESSION['score'], 'all_games'=>array(),'moves'=>$_SESSION['moves'], 'state' => $_SESSION['state']));

    });

    $app->post("/play", function() use ($app) {

        $new_game = new RockPaperScissors();
        $state = $_SESSION['state'];
        if($state == 'single' || $state == 'soloExtreme') {
            if(isset($_POST['choice1'])) {
                $clicked1 = $_POST['choice1'];
            }else{
                return "nope";
            }

            $player1 = $new_game->player1InputSetup($clicked1);
            $player2 = $new_game->computerInputSetup();
        } else {
            if(isset($_POST['choice1']) && isset($_POST['choice2'])) {
                $clicked1 = $_POST['choice1'];
                $clicked2 = $_POST['choice2'];
            }else{
                return "nope";
            }

            $player1 = $new_game->player1InputSetup($clicked1);
            $player2 = $new_game->player2InputSetup($clicked2);
        }

        $results = $new_game->winChecker($player1, $player2);
        $new_game->save($results);
        // var_dump($_SESSION['score']);


        return $app['twig']->render('play.html.twig',array("tie"=>$_SESSION['tie_game'], "game_over"=> $_SESSION['game_over'], 'score'=>$_SESSION['score'], 'state' => $state, 'all_games' => RockPaperScissors::getAll(), 'moves'=>$_SESSION['moves']));
    });

    $app->post("/delete", function() use ($app) {
        RockPaperScissors::deleteAll();

        return $app['twig']->render('form.html.twig',array("tie"=>$_SESSION['tie_game'], "game_over"=> $_SESSION['game_over'], 'score'=>$_SESSION['score'], "all_games" => RockPaperScissors::getAll(),'moves'=>$_SESSION['moves'], 'state' => 'default'));
    });

    return $app;
?>
