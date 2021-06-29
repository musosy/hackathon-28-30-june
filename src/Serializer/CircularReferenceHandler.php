<?php

namespace App\Serializer;

use App\Entity\Category;
use App\Entity\Gig;
use App\Entity\Service;
use App\Entity\User;
use Symfony\Component\Routing\RouterInterface;

class CircularReferenceHandler
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function __invoke($object)
    {
        switch ($object) {
            case $object instanceof Category:
                return $this->router->generate("category_one", ['id' => $object->getId()]);
            case $object instanceof Gig:
                return $this->router->generate("gig_one", ['id' => $object->getId()]);
            case $object instanceof Service:
                return $this->router->generate("service_one", ['id' => $object->getId()]);
            case $object instanceof User:
                return $this->router->generate("user_one", ['id' => $object->getId()]);
        }
    }
}
