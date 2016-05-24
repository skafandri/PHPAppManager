<?php

namespace UpdateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UpdateBundle:Default:index.html.twig');
    }
}
