<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RockPaperScissors.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    session_start();

    if (empty($_SESSION['game_rounds'])) {
        $_SESSION['game_rounds'] = array();
    }

    $app = new Silex\Application();

    $app['debug']=true;



    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        // return "Play!";
        return $app['twig']->render('form.html.twig',array('results'=>array()));
    });

    $app->post("/", function() use ($app) {
        $new_game = new RockPaperScissors();
        $player1Input=$_POST['player1Input'];
        $player2Input =$_POST['player2Input'];



        $player1 = $new_game->player1InputSetup($player1Input);
        $player2 = $new_game->player2InputSetup($player2Input);

        if($player1==="invalid" || $player2==="invalid"){
            return $app['twig']->render('form.html.twig',array("results" => "Please enter a valid move"));
        }
        $results = $new_game->winChecker($player1, $player2);
        $new_game->save($results);


        return $app['twig']->render('form.html.twig',array("all_games" => RockPaperScissors::getAll()));
    });

    return $app;
?>
