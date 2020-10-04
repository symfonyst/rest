<?php
/**
 * Created by PhpStorm.
 * User: soprantsov
 * Date: 2020-06-20
 * Time: 11:50
 */

namespace App\Controller\Api;


use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;

/**
 * Class NewsController
 * @package App\Controller
 * @Rest\RouteResource("news")
 */
class NewsController extends AbstractFOSRestController
{
    /**
     * Получение списка последних новостей
     * @SWG\Tag (name="Новости")
     * @SWG\Response (
     *     response=200,
     *     description="Получение списка последних новостей"
     * )
     * @param Request $request
     * @return View
     */
    public function getAllAction(Request $request){
        $currentDate = new \DateTime();
        $secondDate = clone $currentDate;
        $data = [
            [
                "date" => $currentDate,
                "name" => "Тестовая новость",
                "description" => "Описание новости",
                "content" => "Контент",
            ],
            [
                "date" => $secondDate->modify('2 day'),
                "name" => "Вторая новость",
                "description" => "Описание новости",
                "content" => "Контент",
            ],
        ];
        return View::create($data, Response::HTTP_OK);
    }
}