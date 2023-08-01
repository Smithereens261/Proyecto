<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asiento
 * 
 * @property int $Numero
 * @property bool $Disponibilidad
 * @property string $CamionFK
 * 
 * @property Camion $camion
 *
 * @package App\Models
 */
class Asiento extends Model
{
	protected $table = 'asientos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Numero' => 'int',
		'Disponibilidad' => 'bool'
	];

	protected $fillable = [
		'Numero',
		'Disponibilidad',
		'CamionFK'
	];

	public function camion()
	{
		return $this->belongsTo(Camion::class, 'CamionFK');
	}
}
