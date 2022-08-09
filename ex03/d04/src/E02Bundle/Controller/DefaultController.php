<?php

namespace E02Bundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/e03/")
     */
    public function indexAction(Request $request)
    {
        $error = "";
        $time = "";
        $form = $this->createFormBuilder()
        ->add(
            'message',
            TextareaType::class,
            [
                'required' => false,
                'label' => "Message"
            ],
        )
        ->add(
            'timestamp',
            ChoiceType::class,
            [ 
                'choices' => 
                [   
                    'Yes' => true,
                    'No' => false,        
                ],
                'label' => "Include Timestamp"
            ],
        )
        ->add(
            'submit',
            SubmitType::class,
        )
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form["timestamp"]->getData())
                $time = '[' . time() . '] ';
            if (!$form["message"]->getData()){
                $error = "Le message ne peut etre vide";
            }
            else
                file_put_contents("../" . $this->getParameter('file_name'), $time . $form["message"]->getData() . "\n", FILE_APPEND);
        }
        $file_read = [];
        if(file_exists("../" . $this->getParameter('file_name'))){
            $file = fopen("../" . $this->getParameter('file_name'), "r");
            while($line = fgets($file))
                array_push($file_read, $line);
            fclose($file);
        }
        return $this->render('E02Bundle:Default:index.html.twig',[   
            'form' => $form->createView(),
            'error' => $error,
            'file' => $file_read,
        ]);
    }
}
