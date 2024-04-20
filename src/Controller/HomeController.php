<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\EmploidutempsRepository;

class HomeController extends AbstractController
{
  private $EmploidutempsRepository;

  public function __construct(EmploidutempsRepository $EmploidutempsRepository)
  {
      $this->EmploidutempsRepository = $EmploidutempsRepository;
  }
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
      $emploidutemps = $this->EmploidutempsRepository->findAll();
        return $this->render('home/index.html.twig', [
            'emploidutemps' => $emploidutemps,
        ]);
    }
}
