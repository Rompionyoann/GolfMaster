<?php

declare(strict_types=1);

namespace App\Events;

use App\Entity\User;
use App\Entity\Round;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Symfony\EventListener\EventPriorities;
 

class CurrentUserForRoundSubscriber implements EventSubscriberInterface
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => ['onRoundCreated', EventPriorities::PRE_VALIDATE]
        ];
    }

    public function onRoundCreated(ViewEvent $event): void
    {
        /** @var User $user */
        $user = $this->security->getUser();

        $round = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        if ($round instanceof Round && $method === "POST") {
            $round->setUser($user);
        }
    }
}