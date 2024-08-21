<?php

namespace App\Controller;

use App\Model\DeleteDto;
use App\Model\PositionDeveloperDto;
use App\Model\NewDeveloperDto;
use App\Model\ProjectDeveloperDto;
use App\Resolver\RequestBodyResolver;
use App\Service\DeveloperService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

class DeveloperController extends AbstractController
{
    public function __construct(
        private readonly DeveloperService $developerService
    ) {
    }

    #[Route('/api/v1/developers/create', name: 'create_developer', methods: 'POST')]
    #[OA\Tag(name: 'Developer')]
    public function create(#[MapRequestPayload(resolver: RequestBodyResolver::class)] newDeveloperDto $newDeveloperDto): JsonResponse
    {
        return $this->json(data: $this->developerService->createDeveloper($newDeveloperDto));
    }

    #[Route('/api/v1/developers/delete', name: 'delete_developer', methods: ['DELETE'])]
    #[OA\Tag(name: 'Developer')]
    public function delete(#[MapRequestPayload(resolver: RequestBodyResolver::class)] deleteDto $deleteDto): JsonResponse
    {
        return $this->json(data: $this->developerService->deleteDeveloper($deleteDto));
    }

    #[Route('/api/v1/developers/position', name: 'move_position', methods: ['PATCH'])]
    #[OA\Tag(name: 'Developer')]
    public function movePosition(#[MapRequestPayload(resolver: RequestBodyResolver::class)] PositionDeveloperDto $positionDeveloperDto): JsonResponse
    {
        return $this->json(data: $this->developerService->movePosition($positionDeveloperDto));
    }

    #[Route('/api/v1/developers/project', name: 'move_project', methods: ['PATCH'])]
    #[OA\Tag(name: 'Developer')]
    public function moveProject(#[MapRequestPayload(resolver: RequestBodyResolver::class)] ProjectDeveloperDto $projectDeveloperDto): JsonResponse
    {
        return $this->json(data: $this->developerService->moveProject($projectDeveloperDto));
    }
}
