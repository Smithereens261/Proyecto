<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ruta
 * 
 * @property int $Id_ruta
 * @property string $Nombre
 * 
 * @property Collection|Estacione[] $estaciones
 * @property PuntosRutum $puntos_rutum
 * @property Collection|Recorrido[] $recorridos
 *
 * @package App\Models
 */
class Ruta extends Model
{
	protected $table = 'rutas';
	protected $primaryKey = 'Id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int'
	];

	protected $fillable = [
		'Nombre'
	];

	public function estaciones()
	{
		return $this->hasMany(Estacione::class, 'Ruta');
	}

	public function puntos_rutum()
	{
		return $this->hasOne(PuntosRutum::class, 'ruta');
	}

	public function recorridos()
	{
		return $this->hasMany(Recorrido::class, 'Ruta');
	}
}
