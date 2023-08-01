<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PuntosRutum
 * 
 * @property float $lat
 * @property float $long
 * @property int $ruta
 * 
 *
 * @package App\Models
 */
class PuntosRutum extends Model
{
	protected $table = 'puntos-ruta';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'lat' => 'float',
		'long' => 'float',
		'ruta' => 'int'
	];

	protected $fillable = [
		'lat',
		'long',
		'ruta'
	];

	public function ruta()
	{
		return $this->belongsTo(Ruta::class, 'ruta');
	}
}
