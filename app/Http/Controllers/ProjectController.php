<?php

namespace AcessoProject\Http\Controllers;


use AcessoProject\Repositories\ProjectRepository;
use AcessoProject\Services\ProjectService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ProjectController extends Controller
{


    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(
        ProjectRepository $projectRepository,
        ProjectService $projectService)
    {

        $this->projectRepository = $projectRepository;
        $this->projectService = $projectService;
    }

    public function index()
    {
        return $this->projectRepository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    public function store(Request $request)
    {

        return $this->projectService->create($request->all());

    }


    public function show($id)
    {
        if ($this->checkProjectPermissions($id)  == false) {
            return ['error' => 'Access Forbidden'];
        }
        return $this->projectRepository->find($id);

    }

    public function update(Request $request, $id)
    {
        if ($this->checkProjectOwner($id) == false) {
            return ['error' => 'Access Forbidden'];
        }
        return $this->projectService->update($request->all(), $id);

    }

    public function destroy($id)
    {
        if ($this->checkProjectOwner($id) == false) {
            return ['error' => 'Access Forbidden'];
        }
        return $this->projectRepository->delete($id);

    }

    private function checkProjectOwner($projectId)
    {

        $userId = \Authorizer::getResourceOwnerId();

        return $this->projectRepository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId)
    {

        $userId = \Authorizer::getResourceOwnerId();

        return $this->projectRepository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId)
    {
        if ($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)) {
            return true;
        }
            return false;
    }
}
