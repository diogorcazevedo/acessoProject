<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 06/01/16
 * Time: 09:29
 */

namespace AcessoProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{

      protected $rules  = [
          'owner_id'=>'required|integer',
          'client_id'=>'required|integer',
          'name'=>'required',
          'progress'=>'required',
          'status'=>'required',
          'due_date'=>'required'
        ];

}