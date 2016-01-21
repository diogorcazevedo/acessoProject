<?php

namespace AcessoProject\Http\Controllers;


use AcessoProject\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectFileController extends Controller
{


    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(ProjectService $projectService)
    {


        $this->projectService = $projectService;
    }

    public function index()
    {

    }


    public function store(Request $request)
    {

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $data['file'] = $file;
        $data['extension'] = $extension;
        $data['name'] = $request->name;
        $data['project_id'] = $request->project_id;
        $data['description'] = $request->description;

        $this->projectService->createFile($data);

    }


    public function show($id)
    {


    }

    public function update(Request $request, $id)
    {


    }

    public function destroy($id)
    {


    }
}
