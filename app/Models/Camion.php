<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Camion
 * 
 * @property string $Codigo
 * @property bool $Operando
 * @property string $Matricula
 * @property int $Choferes
 * @property string $Ubicacion
 * 
 * @property Chofer $chofer
 * @property Asiento $asiento
 * @property Collection|Recorrido[] $recorridos
 *
 * @package App\Models
 */
class Camion extends Model
{
	protected $table = 'camion';
	protected $primaryKey = 'Codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Operando' => 'bool',
		'Choferes' => 'int'
	];

	protected $fillable = [
		'Operando',
		'Matricula',
		'Choferes',
		'Ubicacion'
	];

	public function chofer()
    {
        return $this->belongsTo(Chofer::class, 'Choferes', 'Numero')->withDefault(['Nombre' => 'Sin asignar']);
    }

	public function asiento()
	{
		return $this->hasOne(Asiento::class, 'CamionFK');
	}

	public function recorridos()
	{
		return $this->hasMany(Recorrido::class, 'Camion');
	}
}
