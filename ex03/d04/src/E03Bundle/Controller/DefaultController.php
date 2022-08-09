<?php

namespace E03Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/e04/")
     */
    public function indexAction()
    {
        $colors = [];
        $i = $this->getParameter('e03.number_of_colors');
        $add = 0;
        for($i = $this->getParameter('e03.number_of_colors'); $i > 0, $i--;){
            array_push($colors, [
                'black' => [
                    'red' => 0 + $add,
                    'green' => 0 + $add,
                    'blue' => 0 + $add
                    ], 
                'red' => [
                    'red' => 255,
                    'green' => 0 + $add,
                    'blue' => 0 + $add
                    ], 
                'blue' => [
                    'red' => 0 + $add,
                    'green' => 0  + $add,
                    'blue' => 255
                    ], 
                'green' => [
                    'red' => 0 + $add,
                    'green' => 255,
                    'blue' => 0  + $add
                    ],
            ]);
            $add = $add + 15;
        }
        return $this->render('E03Bundle:Default:index.html.twig', [
            "tab_color" => $colors,
        ]
    );
    }
}
