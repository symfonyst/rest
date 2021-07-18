<?php
/**
 * Created by PhpStorm.
 * User: soprantsov
 * Date: 2020-08-09
 * Time: 22:56
 */

namespace App\Controller\Frontend;


use App\EventDispatcher\UserExampleEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class PagesController extends AbstractController
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/", name="page_main")
     */
    public function mainAction(Request $request){
        return $this->render("pages/main.html.twig", []);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route ("/news", name="page_news")
     */
    public function newsAction(Request $request){
        return $this->render("pages/news.html.twig", []);
    }

    /**
     * @param Request $request
     * @Route ("/events", name="page_events")
     */
    public function eventsAction(EventDispatcherInterface $dispatcher)
    {
        $event = new UserExampleEvent();
        $dispatcher->dispatch($event, 'user.example');
        return $this->render("pages/events.html.twig");
    }
}