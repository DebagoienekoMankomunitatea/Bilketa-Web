<?php
/**
 * TODO : set enviroment
 * ref : https://gist.github.com/937433#file_bootstrap.php
 */


    if (isset($_SERVER['REMOTE_ADDR'])) {

        die('Command Line Only!');
    }

    defined('__DIR__') || define('__DIR__', dirname(__FILE__));

    defined('APPLICATION_PATH') ||
    define('APPLICATION_PATH', realpath(__DIR__ . '/../'));



    // Cargamos el modelo que se nos pide desde dialplan
    $_SERVER['argv'][0] = $fastagi->request['agi_request'];
    $_SERVER['argv'][1] = "-a";
    $_SERVER['argv']['a'] = $argx['model'];

    require_once 'Zend/Loader/Autoloader.php';
    $loader = Zend_Loader_Autoloader::getInstance();

    // we need this custom namespace to load our custom class
    $loader->registerNamespace('Iron_');

    $getopt = new Zend_Console_Getopt(array(
        'action|a=s' => 'action to perform in format of "module/controller/action/param1/param2/param3/.."',
        'env|e-s'    => 'defines application environment (defaults to "production")',
        'help|h'     => 'displays usage information',
    ));

    try {
        $getopt->parse();
    } catch (Zend_Console_Getopt_Exception $e) {
        // Bad options passed: report usage
        echo $e->getUsageMessage();
        return false;
    }

    // show help message in case it was requested or params were incorrect (module, controller and action)
    if ($getopt->getOption('h') || !$getopt->getOption('a')) {
        echo $getopt->getUsageMessage();
        return true;
    }

    // initialize values based on presence or absence of CLI options
//    $env      = $getopt->getOption('e');
    $env    = $_ENV['APPLICATION_ENV'];
    defined('APPLICATION_ENV')
     || define('APPLICATION_ENV', (null === $env) ? 'production' : $env);

    // initialize Zend_Application
    $application = new Zend_Application (
        APPLICATION_ENV,
        APPLICATION_PATH . '/configs/application.ini'
    );

    // bootstrap and retrive the frontController resource
    $front = $application->getBootstrap()
          ->bootstrap('frontController')
          ->getResource('frontController');

    $params = array_reverse(explode('/', $getopt->getOption('a')));
    $module = array_pop($params);
    $controller = array_pop($params);
    $action = array_pop($params);
    $request = new Zend_Controller_Request_Simple ($action, $controller, $module);

    // set front controller options to make everything operational from CLI
    $front->setRequest($request)
       ->setResponse(new Zend_Controller_Response_Cli())
       ->setRouter(new Iron_Controller_Router_Cli())
       ->throwExceptions(false);

    //Pasamos $fastagi
    Zend_Registry::set('fastagi', $fastagi);

    // lets bootstrap our application and enjoy!

    try {

        $application->bootstrap()->run();

    } catch (Exception $e) {


        echo "hola";
    }

