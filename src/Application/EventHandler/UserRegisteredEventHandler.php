<?php
namespace App\Application\EventHandler;

use App\Domain\Event\UserRegisteredEvent;

class UserRegisteredEventHandler
{
    public function handle(UserRegisteredEvent $event)
    {
        // Simulamos un envío de email
        echo "Email de bienvenida enviado a: " . $event->getUser()->getEmail()->getEmail();
    }
}
