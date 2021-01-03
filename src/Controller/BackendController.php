<?php


namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class BackendController
 * @package App\Controller
 * @Route ("backend")
 */
class BackendController extends AbstractController
{
    /**
     * @param Request $request
     * @Route ("/main", name="backend_main")
     */
    public function mainAction(Request $request){
        return $this->render("backend/main.html.twig", []);
    }

    /**
     * @Route ("/news", name="backend_news")
     * @param Request $request
     * @return Response
     */
    public function newsAction(Request $request){
        return new Response('news page');
    }
}