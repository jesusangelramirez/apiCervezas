<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;

class CervezaController extends AbstractController
{
    /**
     * @Route("/cerveza/{id}", name="cerveza")
     */
    public function detallecerveza(int $id )
    {
        $cervezas = [];
        $httpClient = HttpClient::create();
        $url='https://api.punkapi.com/v2/beers/'.$id;
        $response = $httpClient->request('GET', $url);
        $beers = $response->toArray();

        foreach ($beers as $key=>$beer){
            $cervezas[0]['id'] = $beer['id'];
            $cervezas[0]['nombre'] = $beer['name'];
            $cervezas[0]['descripcion'] = $beer['description'];
            $cervezas[0]['imagen'] = $beer['image_url'];
            $cervezas[0]['slogan'] = $beer['tagline'];
            $cervezas[0]['fecha de fabricacion'] = $beer['first_brewed'];
        }
        $response = new JsonResponse($cervezas);
        return $response;
    }

}
