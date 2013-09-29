<?php

namespace Puphpet\Extension\XdebugBundle\Controller;

use Puphpet\MainBundle\Extension;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class XdebugController extends Controller implements Extension\ControllerInterface
{
    public function indexAction(array $data)
    {
        return $this->render('PuphpetExtensionXdebugBundle:form:Xdebug.html.twig', [
            'xdebug' => $data,
        ]);
    }
}