<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $connection = 'pgsql_j';
    
    protected $table = 'f_login';

    protected $primaryKey = '_nro_dip';

    public $timestamps = false;

    /*protected $fillable = [
        'r_nro_dip',
        'r_fec_nac',
        'r_nombres_apellidos',
        'r_id_programa',
        'r_programa',
        'r_id_examenes',
        'r_id_examenes_postulante',
        'r_timpo_restante',
        'r_fecha_inicio',
        'r_estado'
    ];*/

}
