<?php

namespace App\Controller;

use App\Entity\Repo;
use App\Form\RepoType;
use App\Repository\RepoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/apirepo')]
class ApiController extends AbstractController
{
    #[Route('/list', name: 'app_apirepo_index', methods: ['GET'])]
    public function index(RepoRepository $repoRepository): Response
    {
        $repo = $repoRepository->findAll();

        $data = [];

        foreach ($repo as $p) {
            $data[] = [
                'id' => $p->getId(),
                'name' => $p->getName(),
                'description' => $p->getDescription(),
                'image' => $p->getImage(),
                'link' => $p->getLink(),
            ];
            
        }

        //dump($data);die; 
        //return $this->json($data);
        return $this->json(
          $data, 
          $status = 200, 
          $headers = ['Access-Control-Allow-Origin'=>'*']
        );

        //return $this->json(['username' => 'jane.doe']);

        //return $this->json($data);
        
    }
    }