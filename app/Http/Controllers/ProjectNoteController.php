<?php

namespace AcessoProject\Http\Controllers;



use AcessoProject\Repositories\ProjectNoteRepository;
use AcessoProject\Services\ProjectNoteService;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{


    /**
     * @var ProjectNoteRepository
     */
    private $projectNoteRepository;
    /**
     * @var ProjectNoteService
     */
    private $projectNoteService;

    public function __construct(ProjectNoteRepository $projectNoteRepository,
                                ProjectNoteService $projectNoteService)
    {

        $this->projectNoteRepository = $projectNoteRepository;
        $this->projectNoteService = $projectNoteService;
    }
    public function index($id)
    {
        return $this->projectNoteRepository->findWhere(['project_id'=> $id]);
    }

    public function store(Request $request)
    {

        return $this->projectNoteService->create($request->all());

    }


    public function show($id,$noteId)
    {

        return $this->projectNoteRepository->findWhere(['project_id'=> $id,'id'=>$noteId]);

    }

    public function update(Request $request,$id,$noteId)
    {

        return $this->projectNoteService->update($request->all(),$noteId);

    }

    public function destroy($id,$noteId)
    {

        return $this->projectNoteRepository->delete($noteId);

    }
}
