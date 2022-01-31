<?php
namespace App\Validators;

use App\Table\CategoryTable;

class HomeValidator extends AbstractValidator{


    public function __construct(array $data, CategoryTable $table, ?int $id = null)
    {
        parent::__construct($data);
        $this->validator->rule('image','image');
        $this->validator->rule(function($field,$value) use ($table, $id){
            return !$table->exists($field,$value, $id);
        },'slug','Ce slug est déja utilisé');
    }
    
}