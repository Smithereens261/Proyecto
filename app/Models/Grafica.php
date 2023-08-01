<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grafica
 * 
 * @property int $id
 * @property Carbon $fecha
 * @property int $usos
 *
 * @package App\Models
 */
class Grafica extends Model
{
	protected $table = 'grafica';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'usos' => 'int'
	];

	protected $fillable = [
		'fecha',
		'usos'
	];
}
