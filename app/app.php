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

    $app->post("/clicked", function() use ($app) {
        if(isset($_POST['choice1']) && isset($_POST['choice2'])) {
            $clicked1 = $_POST['choice1'];
            $clicked2 = $_POST['choice2'];
            return $app['twig']->render('clicked.html.twig',array('result1'=>$clicked1, 'result2' => $clicked2));
        }else{
            return "nope";
        }
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
