<?php
/**
 * Created by PhpStorm.
 * User: soprantsov
 * Date: 2020-08-09
 * Time: 22:56
 */

namespace App\Controller\Frontend;


use App\Dto\Weather\ResponseDto;
use App\Dto\Weather\WeatherDto;
use App\EventDispatcher\UserExampleEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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

    /**
     * @Route("/weather", name="page_weather")
     */
    public function weatherAction()
    {
        $ch = curl_init($_ENV['API_WEATHER']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);

        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $data = $serializer->deserialize($json, ResponseDto::class, 'json');
        return new Response(print_r($data, true));
    }
}