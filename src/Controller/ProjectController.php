<?php

namespace App\Controller;

use App\Model\DeleteDto;
use App\Model\NewProjectDto;
use App\Resolver\RequestBodyResolver;
use App\Service\ProjectService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    public function __construct(
        private readonly ProjectService $projectService
    ) {
    }

    #[Route('/api/v1/projects/create', name: 'create_project', methods: 'POST')]
    #[OA\Tag(name: 'Project')]
    public function create(#[MapRequestPayload(resolver: RequestBodyResolver::class)] newProjectDto $newProjectDto): JsonResponse
    {
        return $this->json(data: $this->projectService->createProject($newProjectDto));
    }

    #[Route('/api/v1/projects/delete', name: 'delete_project', methods: ['DELETE'])]
    #[OA\Tag(name: 'Project')]
    public function delete(#[MapRequestPayload(resolver: RequestBodyResolver::class)] DeleteDto $deleteDto): JsonResponse
    {
        return $this->json(data: $this->projectService->deleteProject($deleteDto));
    }
}
