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

        if ($number < 1 || $number > 25) {
            return $this->render('error.html.twig',[ 
                'message' => 'Numero fuera de rango, la aplicación no reconoce el número mágico,
                si no quieres tener 13 años de mala suerte revierte este maleficio pulsando en generar nuevo número.',
                'appName' => 'DGRMagicSymfony',
            ]);
        }

        return $this->render('magic_word.html.twig',[
            'magicNumber' => $number,
            'magicWord' => $word,
            'appName' => 'DGRMagicSymfony',
        ]);

    }

    #[Route('/dictionary/{word}', name: 'dictionary')]
    public function dictionary($word): Response{
        $uppercaseWord = mb_strtoupper($word);

        try {
            $definition = $this->getDefinition($uppercaseWord);
        } catch (\Exception $e) {
            return $this->render('error.html.twig', [
                'message' => 'Palabra fuera de rango, la aplicación no reconoce la palabra mágica. Si no quieres tener 13 años de mala suerte, revierte este maleficio pulsando en generar nuevo número.',
                'appName' => 'DGRMagicSymfony',
            ]);
        }


        return $this->render('dictionary.html.twig',[
            'word' => $uppercaseWord,
            'definition' => $this->getDefinition($uppercaseWord),
            'appName' => 'DGRMagicSymfony',
        ]);
    }

    private function getDefinition($word){
        $definitions = [
            'AMISTAD' => 'La amistad es una relación afectiva entre dos o más personas.',
            'ÉXITO' => 'El éxito es la consecución de los objetivos y metas propuestas.',
            'FELICIDAD' => 'La felicidad es un estado emocional de bienestar y satisfacción.',
            'PROSPERIDAD' => 'La prosperidad es el estado de tener éxito y ser próspero en la vida.',
            'AMOR' => 'El amor es un sentimiento profundo de afecto y cariño hacia otra persona.',
            'CREATIVIDAD' => 'La creatividad es la capacidad de generar nuevas ideas o conceptos originales.',
            'CONFIANZA' => 'La confianza es la seguridad y fe en las acciones o palabras de alguien.',
            'SALUD' => 'La salud es el estado de completo bienestar físico, mental y social.',
            'ABUNDANCIA' => 'La abundancia es la presencia en gran cantidad de algo valioso.',
            'GRATITUD' => 'La gratitud es la acción de expresar agradecimiento y aprecio hacia algo o alguien.',
            'PAZ' => 'La paz es un estado de tranquilidad y ausencia de conflicto.',
            'ALEGRÍA' => 'La alegría es una emoción positiva y placentera.',
            'GENEROSIDAD' => 'La generosidad es la disposición a dar y ayudar a los demás.',
            'AVENTURA' => 'La aventura es una experiencia emocionante y arriesgada.',
            'OPTIMISMO' => 'El optimismo es la actitud positiva y la esperanza en un resultado favorable.',
            'HARMONÍA' => 'La harmonía es la combinación equilibrada de diferentes elementos.',
            'ESPERANZA' => 'La esperanza es la creencia y expectativa positiva hacia el futuro.',
            'ÉXITO' => 'El éxito es la consecución de los objetivos y metas propuestas.',
            'SERENIDAD' => 'La serenidad es la calma y paz interior en situaciones difíciles.',
            'RIQUEZA' => 'La riqueza es la abundancia de recursos valiosos.',
            'AMABILIDAD' => 'La amabilidad es la cualidad de ser amable y afectuoso.',
            'HUMILDAD' => 'La humildad es la virtud de reconocer las propias limitaciones y ser modesto.',
            'SABIDURÍA' => 'La sabiduría es el conocimiento profundo y la capacidad de aplicar la experiencia.',
            'SIMPLICIDAD' => 'La simplicidad es la cualidad de ser simple y fácil de entender.',
            'RESILIENCIA' => 'La resiliencia es la capacidad de superar adversidades y adaptarse al cambio.',
        ];
    
        return $definitions[$word];
    }
    
}