<?php

namespace App\EventDispatcher;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'user.example' => 'onUserExample',
        ];
    }

    public function onUserExample(UserExampleEvent $event)
    {
        echo('user example event');
    }
}