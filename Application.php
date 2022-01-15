<?php

/**
 * class Application
 * @author Anil Pulami Magar
 * @package app\core
 */

namespace app\core;

use app\core\db\Database;

class Application
{
    public static Application $app;
    public static string $ROOT_DIR;
    public string $userClass;
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public View $view;
    public ?UserModel $user;


    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');

        if($primaryValue){
            $obj = new $this->userClass;
            $primaryKey = $obj->primaryKey();
            $this->user =$obj->findOne([$primaryKey => $primaryValue]);
        }else{
            $this->user = null;
        }
    }
//    /** php 8.1
//     *https://www.amitmerchant.com/initialize-objects-right-into-the-constructor-parameters-in-php-81/
//     */
//    public function __construct(
//        public Router $router = new Router,
//    ){}

//    /** php 7.4 */
//    public function __construct(
//        ?Router $router = null,
//        ?Request $request = null,
//    ){
//        $this->request = $request ?? new Request();
////        $this->router = $router ?? new Router();
//    }
    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        }catch (\Exception $e){
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('error',[
                'exception' => $e
            ]);
        }
//        echo $this->router->resolve();
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(\app\core\UserModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryKeyValue = $user->{$primaryKey};
        $this->session->set('user', $primaryKeyValue);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }


}