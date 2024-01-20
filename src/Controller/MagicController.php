<?php

// src/Controller/MagicController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MagicController extends AbstractController{

    private $magicWords = [
        1 => 'Amistad',
        2 => 'Éxito',
        3 => 'Felicidad',
        4 => 'Prosperidad',
        5 => 'Amor',
        6 => 'Creatividad',
        7 => 'Confianza',
        8 => 'Salud',
        9 => 'Abundancia',
        10 => 'Gratitud',
        11 => 'Paz',
        12 => 'Alegría',
        13 => 'Generosidad',
        14 => 'Aventura',
        15 => 'Optimismo',
        16 => 'Harmonía',
        17 => 'Esperanza',
        18 => 'Éxito',
        19 => 'Serenidad',
        20 => 'Riqueza',
        21 => 'Amabilidad',
        22 => 'Humildad',
        23 => 'Sabiduría',
        24 => 'Simplicidad',
        25 => 'Resiliencia',
    ];




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

    #[Route('/magic/{number}', name: 'magic_word')]
    public function magicWord($number): Response{
        $word = $this->magicWords[$number] ?? null;

        if(!$word){
            return $this->redirectToRoute('magic_number');
        }

        return $this->render('magic_word.html.twig',[
            'magicNumber' => $number,
            'magicWord' => $word,
            'appName' => 'DGRMagicSymfony',
        ]);
    }

    #[Route('/dictionary/{word}', name: 'dictionary')]
    public function dictionary($word): Response{
        $uppercaseWord = strtoupper($word);


        return $this->render('dictionary.html.twig',[
            'magicNumber' => $number,
            'magicWord' => $word,
            'appName' => 'DGRMagicSymfony',
        ]);
    }
    
}