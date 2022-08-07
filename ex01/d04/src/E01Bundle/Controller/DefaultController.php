<?php

namespace E01Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    public $l = ["controller", "routing", "templating", "doctrine",
    "testing", "validation", "forms", "security", "cache", "translations", "services"];
    /**
     * @Route("/e01/")
     */
    public function indexAction()
    {
        return $this->render('E01Bundle:Default:index.html.twig',[
            'links' => $this->l
        ]);
    }
    /**
     * @Route("/e01/{name}")
     */
    public function getPageGit($name)
    {
        if (in_array($name, $this->l)){
            return $this->render('E01Bundle::base.html.twig',[
                'path' => 'E01Bundle:symfony2cheatsheet:' . $name . '.html.twig',
            ]);
        }
        return $this->render('E01Bundle:Default:index.html.twig',[
            'links' => $this->l
        ]);
    }
}
