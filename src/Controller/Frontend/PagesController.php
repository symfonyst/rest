<?php
/**
 * Created by PhpStorm.
 * User: soprantsov
 * Date: 2020-08-09
 * Time: 22:56
 */

namespace App\Controller\Frontend;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/", name="page_main")
     */
    public function mainAction(Request $request){
//        return new Response(var_dump($this->has('twig')));
        return $this->render("pages/main.html.twig", []);
    }
}