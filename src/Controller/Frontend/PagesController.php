<?php
/**
 * Created by PhpStorm.
 * User: soprantsov
 * Date: 2020-08-09
 * Time: 22:56
 */

namespace App\Controller\Frontend;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/", name="page_main")
     */
    public function mainAction(Request $request){
        return new Response("main page");
    }
}