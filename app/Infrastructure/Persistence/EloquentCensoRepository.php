// app/Infrastructure/Persistence/Eloquent/EloquentCensoRepository.php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Censo\Censo;
use App\Domain\Censo\Port\Out\CensoRepository;
use App\Models\Censo as EloquentCenso;

class EloquentCensoRepository implements CensoRepository
{
    public function save(Censo $censo): Censo
    {
        $eloquent = new EloquentCenso();

        $eloquent->nombre              = $censo->nombre;
        $eloquent->fecha               = $censo->fecha;
        $eloquent->pais                = $censo->pais;
        $eloquent->departamento        = $censo->departamento;
        $eloquent->ciudad              = $censo->ciudad;
        $eloquent->casa                = $censo->casa;
        $eloquent->num_hombres         = $censo->numHombres;
        $eloquent->num_mujeres         = $censo->numMujeres;
        $eloquent->num_ancianos_hombres = $censo->numAncianosHombres;
        $eloquent->num_ancianas_mujeres = $censo->numAncianasMujeres;
        $eloquent->num_ninos           = $censo->numNinos;
        $eloquent->num_ninas           = $censo->numNinas;
        $eloquent->num_habitaciones    = $censo->numHabitaciones;
        $eloquent->num_camas           = $censo->numCamas;
        $eloquent->tiene_agua          = $censo->tieneAgua;
        $eloquent->tiene_luz           = $censo->tieneLuz;
        $eloquent->tiene_alcantarillado = $censo->tieneAlcantarillado;
        $eloquent->tiene_gas           = $censo->tieneGas;
        $eloquent->tiene_otros_servicios = $censo->tieneOtrosServicios;
        $eloquent->nombre_sensador     = $censo->nombreSensador;

        $eloquent->save();

        // actualizar ID en el dominio
        $censo->id = $eloquent->id;

        return $censo;
    }
}
