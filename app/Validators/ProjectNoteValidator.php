<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 06/01/16
 * Time: 09:29
 */

namespace AcessoProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{

      protected $rules  = [
          'project_id'=>'required|integer',
          'title'=>'required',
          'note'=>'required'
        ];

}