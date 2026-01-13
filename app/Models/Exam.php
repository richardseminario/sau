<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $connection = 'pgsql_j';

    protected $table = 'f_lista_preguntas';

    protected $primaryKey = '_id_examen_postulante';

    public $timestamps = false;
}
