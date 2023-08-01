<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estacione
 * 
 * @property int $Codigo
 * @property string $Nombre
 * @property string $Ubicacion
 * @property int $Ruta
 * 
 * @property Ruta $ruta
 *
 * @package App\Models
 */
class Estacione extends Model
{
	protected $table = 'estaciones';
	protected $primaryKey = 'Codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Codigo' => 'int',
		'Ruta' => 'int'
	];

	protected $fillable = [
		'Nombre',
		'Ubicacion',
		'Ruta'
	];

	public function ruta()
	{
		return $this->belongsTo(Ruta::class, 'Ruta');
	}
}
