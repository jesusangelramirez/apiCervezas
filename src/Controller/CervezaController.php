<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CervezaController extends AbstractController
{
    /**
     * @Route("/cerveza", name="cerveza")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CervezaController.php',
        ]);
    }
}
