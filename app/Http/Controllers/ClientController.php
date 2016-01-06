<?php

namespace AcessoProject\Http\Controllers;


use AcessoProject\Http\Requests\ClientRequest;
use AcessoProject\Repositories\ClientRepository;
use AcessoProject\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{


    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var ClientService
     */
    private $clientService;

    public function __construct(
                                ClientRepository $clientRepository,
                                ClientService $clientService)
    {
        $this->clientRepository = $clientRepository;
        $this->clientService = $clientService;
    }
    public function index()
    {
        return $this->clientRepository->all();
    }

    public function store(Request $request)
    {

        return $this->clientService->create($request->all());

    }


    public function show($id)
    {

        return $this->clientRepository->find($id);

    }

    public function update(Request $request,$id)
    {

        return $this->clientService->update($request->all(),$id);

    }

    public function destroy($id)
    {

        return $this->clientRepository->delete($id);

    }
}
