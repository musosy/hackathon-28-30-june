<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ChannelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends AbstractController
{
    private $channelRepo;
    private $categoryRepo;
    public function __construct(ChannelRepository $channelRepo, CategoryRepository $categoryRepo)
    {
        $this->channelRepo = $channelRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/channel/{id}", name="chat_channel")
     */
    public function chatChannel(int $id)
    {
        return $this->json($this->channelRepo->findOneBy(['id' => $id]));
    }
    /**
     * @Route("/chat", name="chat")
     */
    public function chat()
    {
        return $this->render('default/index.html.twig');
    }

     /**
     * @Route("/user", name="user")
     */
    public function user(): Response
    {
        return $this->json($this->getUser());
    }

    /**
     * @Route("/channel", name="channel")
     */
    public function channel(): Response
    {
        $channels = $this->channelRepo->findAll();
        $level = $this->getUser()->getRoles()[0];
        $services = $this->getUser()->getServices();
        switch ($level) {
            case 'LEVEL_1':
                $channels = [];
                foreach ($services as $ser) {
                    $channels[] = $this->channelRepo->findOneBy(['id' => $ser->getCategory()->getId()]);
                }
                break;
            case 'LEVEL_2':
                $gig = [];
                $channels = [];
                foreach ($services as $ser) {
                    in_array($ser->getCategory()->getGig(), $gig) ? false : $gig[] = $ser->getCategory()->getGig();
                }
                foreach($gig as $g) {
                    foreach($g->getCategories() as $cat) {
                        $channels[] = $this->channelRepo->findOneBy(['id' => $cat->getId()]);
                    }
                }
                break;
            case 'PRO':
                $channels = $this->channelRepo->findAll();
                break;
        }
        return $this->json($channels);
    }
}
