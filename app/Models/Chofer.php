<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chofer
 * 
 * @property int $Numero
 * @property string $Nombre
 * @property string $Apellido_Pat
 * @property string $Apellido_Mat
 * @property string $Correo
 * @property string $Contrasena
 * 
 * @property Collection|Camion[] $camions
 *
 * @package App\Models
 */
class Chofer extends Model
{
	protected $table = 'choferes';
	protected $primaryKey = 'Numero';
	public $timestamps = false;

	protected $fillable = [
		'Nombre',
		'Apellido_Pat',
		'Apellido_Mat',
		'Correo',
		'Contrasena'
	];

	public function camions()
	{
		return $this->hasMany(Camion::class, 'Chofers');
	}
}
