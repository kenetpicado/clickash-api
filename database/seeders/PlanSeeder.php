<?php

namespace Database\Seeders;

use App\Models\Benefit;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Gratis',
                'description' => 'Ideal para quienes desean explorar todas las funcionalidades esenciales de nuestra plataforma sin costo alguno.',
                'price' => 0,
                'discount' => 0,
                'benefits' => [
                    'Hasta 50 transacciones mensuales sin costo',
                    'Crea hasta 5 rifas para tus eventos o promociones',
                    'Acceso a las herramientas básicas de gestión'
                ]
            ],
            [
                'name' => 'Estándar',
                'description' => 'Perfecto para pequeños negocios que necesitan más capacidad y soporte.',
                'price' => 10,
                'discount' => 0,
                'benefits' => [
                    'Transacciones ilimitadas para un crecimiento sin restricciones',
                    'Crea hasta 10 rifas para maximizar tu alcance',
                    'Añade vendedores adicionales por solo $9 cada uno',
                    'Soporte técnico dedicado para resolver tus dudas rápidamente'
                ]
            ],
            [
                'name' => 'Premium',
                'description' => 'Diseñado para negocios avanzados que buscan flexibilidad y un soporte de primera clase.',
                'price' => 20,
                'discount' => 0,
                'benefits' => [
                    'Transacciones ilimitadas para manejar grandes volúmenes',
                    'Rifas ilimitadas para campañas sin límites',
                    'Añade vendedores adicionales por solo $8 cada uno',
                    'Soporte técnico prioritario para una atención inmediata',
                    'Acceso a funcionalidades exclusivas para optimizar tus resultados'
                ]
            ],
        ];

        foreach ($plans as $plan) {
            $created = Plan::create([
                'name' => $plan['name'],
                'description' => $plan['description'],
                'price' => $plan['price'],
                'discount' => $plan['discount']
            ]);


            $created->benefits()->delete();

            $created->benefits()->createMany(
                array_map(
                    fn($benefit) => ['name' => $benefit],
                    $plan['benefits']
                )
            );
        }
    }
}
