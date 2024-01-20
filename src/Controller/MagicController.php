<?php

// src/Controller/MagicController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MagicController extends AbstractController{
    #[Route('/', name: 'index')]
    public function index(): Response{

        return $this->render('index.html.twig',[
            'appName' => 'DGRMagicSymfony',
        ]);
    }

    #[Route('/magic/number', name: 'magic_number')]
    public function magicNumber(): Response{

        $magicNumber = mt_rand(1, 25);
        return $this->render('magic_number.html.twig',[
            'magicNumber' => $magicNumber,
            'appName' => 'DGRMagicSymfony',
        ]);
    }
}