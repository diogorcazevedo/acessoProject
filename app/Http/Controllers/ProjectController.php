<?php

namespace AcessoProject\Http\Controllers;



use AcessoProject\Repositories\ProjectRepository;
use AcessoProject\Services\ProjectService;
use Illuminate\Http\Request;

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
 ;
        $this->projectRepository = $projectRepository;
        $this->projectService = $projectService;
    }
    public function index()
    {
        return $this->projectRepository->all();
    }

    public function store(Request $request)
    {

        return $this->projectService->create($request->all());

    }


    public function show($id)
    {

        return $this->projectRepository->find($id);

    }

    public function update(Request $request,$id)
    {

        return $this->projectService->update($request->all(),$id);

    }

    public function destroy($id)
    {

        return $this->projectRepository->delete($id);

    }
}
