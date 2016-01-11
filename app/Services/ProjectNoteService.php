<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 03/11/15
 * Time: 00:03
 */

namespace AcessoProject\Services;

use AcessoProject\Repositories\ProjectNoteRepository;
use AcessoProject\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class ProjectNoteService
{


    /**
     * @var ProjectNoteRepository
     */
    private $projectNoteRepository;
    /**
     * @var ProjectNoteValidator
     */
    private $projectNoteValidator;

    public function __construct(
                                ProjectNoteRepository $projectNoteRepository,
                                ProjectNoteValidator $projectNoteValidator)
    {

        $this->projectNoteRepository = $projectNoteRepository;
        $this->projectNoteValidator = $projectNoteValidator;
    }

    public function create(array $data)
    {

        try{
            $this->projectNoteValidator->with($data)->passesOrFail();
            return  $this->projectNoteRepository->create($data);

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
            $this->projectNoteValidator->with($data)->passesOrFail();
            $this->projectNoteRepository->update($data,$id);

        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
    }

}