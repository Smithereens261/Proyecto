<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Recorrido
 * 
 * @property int $codigo
 * @property int $Ruta
 * @property string $Camion
 * @property Carbon $Hora_inicio
 * @property Carbon $Hora_fin
 * @property Carbon $Fecha
 * 
 * @property Ruta $ruta
 * @property Camion $camion
 *
 * @package App\Models
 */
class Recorrido extends Model
{
	protected $table = 'recorridos';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'Ruta' => 'int',
		'Hora_inicio' => 'datetime',
		'Hora_fin' => 'datetime',
		'Fecha' => 'datetime'
	];

	protected $fillable = [
		'Ruta',
		'Camion',
		'Hora_inicio',
		'Hora_fin',
		'Fecha'
	];

	public function ruta()
	{
		return $this->belongsTo(Ruta::class, 'Ruta');
	}

	public function camion()
	{
		return $this->belongsTo(Camion::class, 'Camion');
	}
}
