<?php
/**
 * Created by PhpStorm.
 * User: soprantsov
 * Date: 2020-06-20
 * Time: 11:50
 */

namespace App\Controller\Api;


use App\Entity\News;
use App\Form\NewsType;
use Doctrine\ORM\EntityNotFoundException;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
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
    public function getAllAction(Request $request)
    {
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

    public function postAction(Request $request)
    {
        try {
            $entity = new News();
            $form = $this->createForm(NewsType::class, $entity);
            $this->removeExtraFields($request, $form);
            $form->submit($request->request->all());
            if (
            $form->isValid()
            ) {
                $em = $this->get('doctrine')->getManager();
                $em->persist($entity);
                $em->flush();
                return $this->getSuccessResponse($entity);
            }
            throw new \InvalidArgumentException('Error! Invalid form data.');
        } catch (\Exception $exception) {
            return $this->getFailResponse($exception);
        }

    }

    public function putAction($id, Request $request)
    {
        return $this->patchAction($id, $request);
    }

    public function patchAction($id, Request $request)
    {
        try {
            $em = $this->get('doctrine')->getManager();
            $entity = $em->getRepository(News::class)->findOneBy([
                'id' => $id,
                'deleted' => 0
            ]);
            if (!$entity) throw new EntityNotFoundException('News not found');
            $form = $this->createForm(NewsType::class, $entity);
            $this->removeExtraFields($request, $form);
            $form->submit($request->request->all());
            if ($form->isValid()) {
                $em->persist($entity);
                $em->flush();
                return $this->getSuccessResponse($entity);
            }
            throw new \InvalidArgumentException("Invalid form");
        } catch (\Exception $exception) {
            return $this->getFailResponse($exception);
        }
    }

    public function getSuccessResponse($data)
    {
        return View::create([
            'response' => 'success',
            'data' => $data,
        ], Response::HTTP_OK);
    }


    public function getFailResponse(\Exception $exception)
    {
        return View::create([
            'response' => 'fail',
            'data' => $exception->getMessage(),
        ], Response::HTTP_BAD_REQUEST);
    }

    protected function removeExtraFields(Request $request, Form $form)
    {
        $data = $request->request->all();
        $children = $form->all();
        $data = array_intersect_key($data, $children);
        $request->request->replace($data);
    }
}