<?php

namespace App\Controller;

use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    private $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }
    /**
     * @Route("/message/one/{id}", name="message_one", methods={"GET"})
     */
    public function one(int $id): Response
    {
        return $this->json($this->messageRepository->findOneBy(['id' => $id]));
    }

     /**
     * @Route("/message/{channel}", name="message_all", methods={"GET"})
     */
     public function All(int $id): Response
     {
         return $this->json($this->messageRepository->findAll(['channel' => $id]));
     }
}
