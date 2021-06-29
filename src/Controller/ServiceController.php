<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/service", name="service_")
*/
class ServiceController extends AbstractController
{
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @Route("/all", name="all", methods={"GET"})
     */
    public function all(): Response
    {
        return $this->json($this->serviceRepository->findAll(), 200);
    }

    /**
     * @Route("/one/{id}", name="one", methods={"GET"})
     */
    public function one(int $id): Response
    {
        return $this->json($this->serviceRepository->findOneBy(['id' => $id]));
    }
}
