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
use AcessoProject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\LaravelValidator;


class ClientService
{

    protected $repository;
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var ClientValidator
     */
    private $clientValidator;


    public function __construct(
                                ClientRepository $clientRepository,
                                ClientValidator $clientValidator)
    {

        $this->clientRepository = $clientRepository;
        $this->clientValidator = $clientValidator;
    }

    public function create(array $data)
    {

        try{
            $this->clientValidator->with($data)->passesOrFail();
            return  $this->clientRepository->create($data);

        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }

    }

    public function update(array $data, $id)
    {

        try{
            $this->clientValidator->with($data)->passesOrFail();
            $this->clientRepository->update($data,$id);

        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
    }

}