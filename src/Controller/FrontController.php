<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class FrontController extends AbstractController
{
    private $user;
    /**
     * FrontController constructor.
     * @param Security $security
     */
    public function __construct(Security $security)
    {
        $this->user = $security->getUser();
    }

    public function index()
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'user' => $this->user
        ]);
    }
}
