<?php

namespace App\Controller;

use App\Repository\GigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/gig", name="gig_")
*/
class GigController extends AbstractController
{
    private $gigRepository;

    public function __construct(GigRepository $gigRepository)
    {
        $this->gigRepository = $gigRepository;
    }

    /**
     * @Route("/all", name="all", methods={"GET"})
     */
    public function all(): Response
    {
        return $this->json($this->gigRepository->findAll(), 200);
    }

    /**
     * @Route("/one/{id}", name="one", methods={"GET"})
     */
    public function one(int $id): Response
    {
        return $this->json($this->gigRepository->findOneBy(['id' => $id]));
    }
}
