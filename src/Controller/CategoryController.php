<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/category", name="category_")
*/
class CategoryController extends AbstractController
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @Route("/all", name="all", methods={"GET"})
     */
    public function all(): Response
    {
        return $this->json($this->categoryRepository->findAll(), 200);
    }
    /**
     * @Route("/one/{id}", name="one", methods={"GET"})
     */
    public function one(int $id): Response
    {
        return $this->json($this->categoryRepository->findOneBy(['id' => $id]));
    }
}
