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
        return $app['twig']->render('form.html.twig',array('all_games'=>array()));
    });

    $app->post("/", function() use ($app) {
        $new_game = new RockPaperScissors();

        if(isset($_POST['choice1']) && isset($_POST['choice2'])) {
            $clicked1 = $_POST['choice1'];
            $clicked2 = $_POST['choice2'];
        }else{
            return "nope";
        }

        $player1 = $new_game->player1InputSetup($clicked1);
        $player2 = $new_game->player2InputSetup($clicked2);
        $results = $new_game->winChecker($player1, $player2);
        $new_game->save($results);


        return $app['twig']->render('form.html.twig',array("all_games" => RockPaperScissors::getAll()));
    });

    $app->post("/delete", function() use ($app) {
        RockPaperScissors::deleteAll();

        return $app['twig']->render('form.html.twig',array("all_games" => RockPaperScissors::getAll()));
    });

    return $app;
?>
