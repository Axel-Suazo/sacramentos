<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SacramentoTipo;

class SacramentoTipoSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Bautismo', 'descripcion' => 'Sacramento de iniciación cristiana.'],
            ['nombre' => 'Primera Comunión', 'descripcion' => 'Recepción del cuerpo y sangre de Cristo por primera vez.'],
            ['nombre' => 'Confirmación', 'descripcion' => 'Fortalece la fe recibida en el bautismo.'],
            ['nombre' => 'Matrimonio', 'descripcion' => 'Unión sacramental entre un hombre y una mujer.'],
        ];

        // Limpiamos la tabla primero para evitar duplicados
        SacramentoTipo::truncate();

        // Insertamos solo los que necesitamos
        SacramentoTipo::insert($tipos);
    }
}
