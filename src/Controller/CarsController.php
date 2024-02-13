<?php

namespace App\Controller;

use App\Repository\CarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CarsController extends AbstractController
{
    private $carsRepository;

    public function __construct(CarsRepository $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function index(): Response
    {
        $cars = $this->carsRepository->findAll();

        return $this->render('cars/index.html.twig', [
            'cars' => $cars,
        ]);
    }
}