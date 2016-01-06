<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 03/11/15
 * Time: 00:03
 */

namespace AcessoProject\Services;



use AcessoProject\Http\Requests\Client;
use AcessoProject\Http\Requests\ClientRequest;
use AcessoProject\Repositories\ClientRepository;

class ClientService
{

    protected $repository;
    /**
     * @var ClientRepository
     */
    private $clientRepository;


    public function __construct(ClientRepository $clientRepository)
    {

        $this->clientRepository = $clientRepository;

    }

    public function create($data)
    {
        $this->clientRepository->create($data);
    }

    public function update(array $data, $id)
    {
        $this->clientRepository->update($data,$id);
    }

}