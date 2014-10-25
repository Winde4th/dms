<?php

namespace Actency\DMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ActencyDMSBundle:Default:index.html.twig');
    }
}
