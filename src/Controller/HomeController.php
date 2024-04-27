<?php

namespace App\Controller;

use App\Entity\Emploidutemps;
use App\Entity\TimeTable;
use App\Form\EmploidutempsFormType;
use App\Repository\EmploidutempsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\TimeTableType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Role\Role;

class HomeController extends AbstractController
{
  private $em;
  private $EmploidutempsRepository;

  public function __construct(EmploidutempsRepository $EmploidutempsRepository, EntityManagerInterface $em)
  {
      $this->EmploidutempsRepository = $EmploidutempsRepository;
      $this->em = $em;
  }
    #[Route('/home', name: 'home')]
    public function index(Request $request): Response
    {
      $emploidutemps = new Emploidutemps();
      $form = $this->createForm(EmploidutempsFormType::class, $emploidutemps);
      // $emploidutemps = $this->EmploidutempsRepository->findAll();
      $timeSlots = [
        '9:00 AM - 10:00 AM',
        '10:00 AM - 11:00 AM',
        '11:00 AM - 12:00 PM',
        '12:00 AM - 13:00 AM',
        '13:00 AM - 14:00 AM',
        '14:00 AM - 15:00 PM',
        '15:00 AM - 16:00 PM',
        // Add more time slots as needed
    ];
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      $newdata = $form->getData();
      $this->em->persist($newdata);
      $this->em->flush();
      return $this->redirectToRoute('home');
    }
        return $this->render('home/index.html.twig', [
            'timeSlots' => $timeSlots, 'form' => $form->createView(),
        ]);
    }


}
