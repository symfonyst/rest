<?php

namespace App\EventDispatcher;

use Symfony\Contracts\EventDispatcher\Event;

class UserExampleEvent extends Event
{
    public const NAME = 'user.example';

    public function __construct()
    {

    }
}