<?php

namespace Pixelpro\HolaMundoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PixelproHolaMundoBundle:Default:index.html.twig');
    }
}
