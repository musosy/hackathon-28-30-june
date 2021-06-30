<?php

namespace App\Controller;

use App\Repository\ChannelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChannelController extends AbstractController
{
    private $channelRepository;

    public function __construct(ChannelRepository $channelRepository)
    {
        $this->channelRepository = $channelRepository;
    }
    /**
     * @Route("/channel/one/{id}", name="channel_one", methods={"GET"})
     */
    public function one(int $id): Response
    {
        return $this->json($this->channelRepository->findOneBy(['id' => $id]));
    }
}
