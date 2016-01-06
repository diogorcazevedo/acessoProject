<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 06/01/16
 * Time: 09:29
 */

namespace AcessoProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

      protected $rules  = [
        'name'=>'required|max:255',
        'responsible'=>'required|max:255',
        'email'=>'required|email',
        'phone'=>'required',
        'address'=>'required'
        ];

}