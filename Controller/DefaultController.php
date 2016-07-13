<?php

namespace Practice\HighchartsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HighchartsBundle:Default:index.html.twig');
    }
}
