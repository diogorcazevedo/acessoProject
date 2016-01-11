<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 03/11/15
 * Time: 00:03
 */

namespace AcessoProject\Services;





use AcessoProject\Repositories\ProjectRepository;
use AcessoProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class ProjectService
{


    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var ProjectValidator
     */
    private $projectValidator;


    public function __construct(
                                ProjectRepository $projectRepository,
                                ProjectValidator $projectValidator)
    {

        $this->projectRepository = $projectRepository;
        $this->projectValidator = $projectValidator;
    }

    public function create(array $data)
    {

        try{
            $this->projectValidator->with($data)->passesOrFail();
            return  $this->projectRepository->create($data);

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
            $this->projectValidator->with($data)->passesOrFail();
            $this->projectRepository->update($data,$id);

        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
    }

}