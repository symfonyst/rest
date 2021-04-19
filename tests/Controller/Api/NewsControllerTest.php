<?php


namespace App\Tests\Controller\Api;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class NewsControllerTest extends WebTestCase
{
    public function testPost()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $client = static::createClient();
        $client->request("POST", "/api/news.json", [
            "active" => 1,
            "name" => "Свежая новость",
            "anons" => "Анонс новости",
            "content" => "Контент новости",
        ]);
        $this->assertEquals($client->getResponse()->getStatusCode(), Response::HTTP_OK);
    }

    public function testPut()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $client = static::createClient();
        $client->request("POST", "/api/news.json", [
            "active" => 1,
            "name" => "Начало учебного года",
            "anons" => "1 сентября начался учебный год",
            "content" => "С утра прошли праздничные линейки во всех школах",
        ]);
        $this->assertEquals($client->getResponse()->getStatusCode(), Response::HTTP_OK);
        $res = json_decode($client->getResponse()->getContent());
        $this->assertTrue(isset($res->data->id));
        $id = $res->data->id;
        $client->request("PATCH", "/api/news/" . $id . ".json", [
            "active" => 1,
            "name" => "Начало учебного года 2021",
            "anons" => "1 сентября начался учебный год, поздравляем всех!",
            "content" => "С утра прошли праздничные линейки во всех школах. Фотоотчет на сайте.",
        ]);
        $this->assertTrue($client->getResponse()->getStatusCode() == Response::HTTP_OK);
        $res = json_decode($client->getResponse()->getContent());
        $this->assertEquals($res->data->name, "Начало учебного года 2021");
        $client->request('DELETE', "/api/news/" . $id . ".json");
        $this->assertTrue($client->getResponse()->getStatusCode() == Response::HTTP_OK);
    }
}