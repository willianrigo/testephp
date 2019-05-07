<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model
{
    public $table = "anamneses";
    protected $fillable = [
        'question',
        'answer'
      ];
}
