<?php

namespace E00Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/e00/firstpage/")
     */
    public function indexAction()
    {
        return new Response(
            '<html><body><p>Hello World!</p></body></html>'
        );
    }
}
