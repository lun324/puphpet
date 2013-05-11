<?php

namespace Puphpet\Controller;

use Puphpet\Controller;

use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session;

class Front extends Controller
{
    public function connect(Application $app)
    {
        /** @var $controllers ControllerCollection creates a new controller based on the default route */
        $controllers = $app['controllers_factory'];

        $controllers->get('/', [$this, 'indexAction'])
             ->bind('homepage');

        $controllers->post('/create', [$this, 'createAction'])
             ->bind('create');

        return $controllers;
    }

    public function indexAction()
    {
        return $this->twig()->render('Front/index.html.twig');
    }

    public function createAction(Request $request)
    {
        $box    = $request->get('box');
        $server = $request->get('server');
        $apache = $request->get('apache');
        $php    = $request->get('php');

        $vagrantFile = $this->twig()->render('Vagrant/Vagrantfile.twig', ['box' => $box]);
    }
}
