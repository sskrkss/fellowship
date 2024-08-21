<?php

namespace App\Controller;

use App\Service\StatisticService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class StatisticController extends AbstractController
{
    public function __construct(
        private readonly StatisticService $statisticService
    ) {
    }

    #[Route('/api/v1/statistics', name: 'statistic', methods: 'GET')]
    #[OA\Tag(name: 'Statistic')]
    public function create(): JsonResponse
    {
        $sqlPath = $this->getParameter('sql_statistic');

        return $this->json(data: $this->statisticService->getStatistic($sqlPath));
    }
}
