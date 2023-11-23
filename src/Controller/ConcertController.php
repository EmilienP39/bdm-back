<?php

namespace App\Controller;

use App\Entity\Concert;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }
    #[Route('/concerts', name: 'app_concert',methods: ['GET'])]
    public function index(): JsonResponse
    {
        $concerts = $this->em->getRepository(Concert::class)->findAll();
        foreach($concerts as $concert){
            $usersArray = [];
            if(count($concert->getInteresser()) > 0){
                $interesser = $concert->getInteresser();
                foreach($interesser as $interesse){
                    $usersArray[] = [
                        'user' => [
                            'id' => $interesse->getUser()->getId(),
                            'email' => $interesse->getUser()->getEmail(),
                            'roles' => $interesse->getUser()->getRoles(),
                            'nom' => $interesse->getUser()->getNom(),
                            'prenom' => $interesse->getUser()->getPrenom(),
                            'photoProfil' => $interesse->getUser()->getPhotoProfil(),
                        ],
                        'place' => $interesse->isPlace(),
                    ];
                }
            }
            $concertsArray[] = [
                'id' => $concert->getId(),
                'groupe' => $concert->getGroupe(),
                'date' => $concert->getDate()->format('d-m-Y H:i'),
                'lieu' => $concert->getLieu(),
                'image' => $concert->getImage(),
                'demo' => $concert->getDemo(),
                'liens' => $concert->getLiens(),
                'interesser' => $usersArray,
            ];
        }
        return new JsonResponse($concertsArray);
    }

    #[Route('/concert/{id}', name: 'app_concert_user', methods: ['GET'])]
    public function indexWithUsers($id):JsonResponse{
        $concert = $this->em->getRepository(Concert::class)->find($id);
        $interesser = $concert->getInteresser();
        foreach($interesser as $interesse){
            $usersArray[] = [
                'id' => $interesse->getUser()->getId(),
                'email' => $interesse->getUser()->getEmail(),
                'password' => $interesse->getUser()->getPassword(),
                'roles' => $interesse->getUser()->getRoles(),
                'nom' => $interesse->getUser()->getNom(),
                'prenom' => $interesse->getUser()->getPrenom(),
                'photoProfil' => $interesse->getUser()->getPhotoProfil(),
                'place' => $interesse->isPlace(),
            ];
        }
        return new JsonResponse($usersArray);
    }
}
