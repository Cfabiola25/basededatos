<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Speaker;
use App\Models\EventsAgenda;

class EventSpeakerSeeder extends Seeder
{
    public function run(): void
    {
        // Helper: encuentra speaker por nombre y apellido (trimming y case-insensitive)
        $findSpeaker = function (string $first, string $last): ?Speaker {
            return Speaker::whereRaw('LOWER(name)=? AND LOWER(last_name)=?', [
                mb_strtolower(trim($first), 'UTF-8'),
                mb_strtolower(trim($last), 'UTF-8'),
            ])->first();
        };

        // Helper: encuentra evento por título exacto o alternativas (LIKE). Puedes filtrar por place si quieres acotar.
        $findEvent = function (array $titles, ?string $place = null): ?EventsAgenda {
            $q = EventsAgenda::query();
            $q->where(function ($qq) use ($titles) {
                foreach ($titles as $t) {
                    $tt = trim($t);
                    // Si el título viene con % lo tratamos como LIKE, si no, exacto.
                    if (str_contains($tt, '%')) {
                        $qq->orWhere('title', 'LIKE', $tt);
                    } else {
                        $qq->orWhere('title', $tt);
                    }
                }
            });
            if ($place) $q->where('place', $place);
            return $q->first();
        };

        // === Mapeo evento → speakers (lo que muestran las piezas gráficas) ===
        $links = [

            // =================== MARTES 21 - MAÑANA (Conferencias) ===================
            [
                'titles'   => ['Innovación Turística y Sostenible'],
                'place'    => 'Salón Terracota',
                'speakers' => [['Federico','De Arteaga Vidiella']],
            ],
            [
                'titles'   => ['Preservación de la Cocina Tradicional – Fotografía de Producto Gastronómico','Preservación de la Cocina Tradicional - Fotografía de Producto Gastronómico'],
                'place'    => 'Salón Cian',
                'speakers' => [['Javier','Suescún']],
            ],
            [
                'titles'   => ['Sesión 1. La Neo Artesanía y su incidencia en la Economía Circular','%Neo Artesanía%'],
                'place'    => 'Salón Rubí',
                'speakers' => [['María Cecilia','López']],
            ],
            [
                'titles'   => ['Soluciones Digitales para la Gestión Productiva del Departamento'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [['Andrés','Díaz Molina']],
            ],
            [
                'titles'   => ['Marketing Promocional de Destinos Turísticos Como Idea de Negocio'],
                'place'    => 'Salón Terracota',
                'speakers' => [['Jhon Faber','Giraldo']],
            ],
            [
                'titles'   => ['El Poder de WayFinding: Experiencia Ciudades Legibles','%WayFinding%'],
                'place'    => 'Salón Cian',
                'speakers' => [['Lucas','López']],
            ],
            [
                'titles'   => ['Sesión 1. Colección Cápsula Efectiva','%Cápsula Efectiva%'],
                'place'    => 'Salón Rubí',
                'speakers' => [['Juan Carlos','León']],
            ],
            [
                'titles'   => ['Datos, Experiencias y Decisiones: Cómo la IA está Transformando el Turismo','%IA está Transformando el Turismo%'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [['Alberto','Mena']],
            ],

            // =================== MARTES 21 - TARDE (Workshops) ===================
            [
                'titles'   => ['IA para la Generación Gráfica'],
                'place'    => 'Aula A104',
                'speakers' => [['Wilfer','Montoya Benjumea']],
            ],
            // "Fotografía de Producto" figura como (Por Definir) en la gráfica → lo dejamos sin speaker
            [
                'titles'   => ['Fase 1. Prototipado y Validación de Soluciones Empresariales','%Fase 1%Prototipado%'],
                'place'    => 'Aula C302 a C306',
                'speakers' => [
                    ['Alberto','Mena'],
                    ['Otniel Josafat','López Altamirano'],
                ],
            ],
            [
                'titles'   => ['Despertando la Mentalidad Innovadora'],
                'place'    => 'Aula C401',
                'speakers' => [['Federico','De Arteaga Vidiella']],
            ],
            [
                'titles'   => ['Narrativas de Región'],
                'place'    => 'Aula A302',
                'speakers' => [['María Cecilia','López']],
            ],
            [
                'titles'   => ['Desarrollo de Capacidades en Innovación y Gestión de Empresas Turísticas','%Capacidades en Innovación%'],
                'place'    => 'Aula C301',
                'speakers' => [['Julio César','Acosta Prado']],
            ],

            // =================== MARTES 21 - NOCHE (Conferencias) ===================
            [
                'titles'   => ['Automatización y Talento Humano:%','Automatización y talento humano:%'],
                'place'    => 'Salón Rubí',
                'speakers' => [['Alberto','Mena']],
            ],
            [
                // Tu seeder dice "Innovación como Herramienta de Desarrollo..." pero la pieza dice "Rentabilidad de la Gestión de Empresas Turísticas"
                'titles'   => ['Rentabilidad de la Gestión de Empresas Turísticas','Innovación como Herramienta de Desarrollo%'],
                'place'    => 'Salón Terracota',
                'speakers' => [['Julio César','Acosta Prado']],
            ],
            [
                'titles'   => ['Logística de Eventos'],
                'place'    => 'Virtual',
                'speakers' => [['Manuel','Fernández-Villacañas Marín']],
            ],
            [
                'titles'   => ['Estrategias Comerciales para el Impulso de Productos Turísticos'],
                'place'    => 'Virtual',
                'speakers' => [['Natalia','Bayona']],
            ],

            // =================== MIÉRCOLES 22 - MAÑANA ===================
            [
                'titles'   => ['Generación Gráfica con IA para la Divulgación Turística','%IA para la Divulgación%'],
                'place'    => 'Salón Cian',
                'speakers' => [['Wilfer','Montoya Benjumea']],
            ],
            [
                'titles'   => ['Entornos Mediáticos Expandidos:%'],
                'place'    => 'Salón Terracota',
                'speakers' => [['Otniel Josafat','López Altamirano']],
            ],
            [
                'titles'   => ['Modelos de Desarrollo Turístico Rentables y Sostenibles,%Sierra%'],
                'place'    => 'Salón Rubí',
                'speakers' => [['Alejandra','Izquierdo Cujar']],
            ],
            [
                'titles'   => ['Sesión 2. Destino Moda:%'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [['Juan Carlos','León']],
            ],
            [
                'titles'   => ['La Infografía como Herramienta de Divulgación%'],
                'place'    => 'Salón Cian',
                'speakers' => [['Gerardo','Luna Gijón']],
            ],
            [
                'titles'   => ['Identificación de Productos y Servicios Exportables','%Exportables%'],
                'place'    => 'Salón Terracota',
                'speakers' => [['Miguelina','Ruiz Díaz']],
            ],
            [
                'titles'   => ['Turismo Rural Sostenible:%'],
                'place'    => 'Salón Rubí',
                'speakers' => [['Héctor Daniel','Martínez']],
            ],
            [
                'titles'   => ['Sección 2. La Neo Artesanía y su Incidencia en la Economía Circular','%Neo Artesanía%'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [['María Cecilia','López']],
            ],

            // =================== MIÉRCOLES 22 - TARDE (Workshops + Mesa) ===================
            [
                'titles'   => ['Ficha Técnica Fashion Pro: Diseña con Visión de Industria'],
                'place'    => 'Aula A302',
                'speakers' => [['Juan Carlos','León']],
            ],
            [
                'titles'   => ['Taller de Diseño de Experiencias Turísticas'],
                'place'    => 'Aula C401',
                'speakers' => [['Héctor Daniel','Martínez']],
            ],
            [
                'titles'   => ['Herramientas Tecnológicas de Acceso Libre para el Diseño Infográfico','%Acceso Libre%Infográfico%'],
                'place'    => 'Aula C101',
                'speakers' => [['Gerardo','Luna Gijón']],
            ],
            [
                'titles'   => ['Componentes y Factores Presentados en los Fondos de Inversión','%Fondos de Inversión%'],
                'place'    => 'Aula C301',
                'speakers' => [['Ricardo Alexis','López Gallego']],
            ],
            [
                'titles'   => ['Fase 2. Prototipado y Validación de Soluciones Empresariales','%Fase 2%Prototipado%'],
                'place'    => 'Aula',
                'speakers' => [['Otniel Josafat','López Altamirano']],
            ],

            // =================== MIÉRCOLES 22 - NOCHE (Conferencias + Virtuales) ===================
            [
                'titles'   => ['Estrategias Transmedia para Impulsar el Turismo del Futuro','%Transmedia%'],
                'place'    => 'Salón Rubí',
                'speakers' => [['Otniel Josafat','López Altamirano']],
            ],
            [
                'titles'   => ['Estrategias de Financiación:%Bonos de Carbono%'],
                'place'    => 'Salón Terracota',
                'speakers' => [['Ricardo Alexis','López Gallego']],
            ],
            [
                'titles'   => ['Retail Design para UX en el Sector Gastronómico'],
                'place'    => 'Salón Cian',
                'speakers' => [['Lucía Corali Nelly','Risco Mc Gregor']],
            ],
            [
                'titles'   => ['Inversión Extranjera y Turismo:%Desarrollo Sostenible%'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [['Andrea Paola','Santanilla Narvaez']],
            ],
            [
                'titles'   => ['Impulsa la Competitividad Regional'],
                'place'    => 'Virtual',
                'speakers' => [['Luis','Aníbal Mora García']],
            ],
            [
                'titles'   => ['Conecta para Crecer:%Asociatividad%'],
                'place'    => 'Virtual',
                'speakers' => [['Angela','Pantoja']],
            ],
            [
                'titles'   => ['Estrategias Trasmedia para Impulsar el Turismo del Futuro (Virtual)','%Trasmedia%Virtual%'],
                'place'    => 'Virtual',
                'speakers' => [['Otniel Josafat','López Altamirano']],
            ],
            [
                'titles'   => ['Branding Experiencial para el Fortalecimiento de Marcas en el Sector Turístico'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [['Franklin', 'Eduardo López']],
            ],

            // =================== JUEVES 23 - MAÑANA ===================
            [
                'titles'   => ['Retail Design para UX en el Sector Gastronómico','Retail Design en Espacios Gastronómicos'],
                'place'    => 'Salón Cian',
                'speakers' => [['Lucía Corali Nelly','Risco Mc Gregor']],
            ],
            [
                'titles'   => ['Cerrando Brechas Digitales en el Turismo Colombiano,%Inclusión y la Conectividad%'],
                'place'    => 'Salón Terracota',
                'speakers' => [['Karina','Vélez Gómez']],
            ],
            [
                'titles'   => ['Soluciones Fintech para Empresas Rurales'],
                'place'    => 'Salón Rubí',
                'speakers' => [['Magreth','Gutiérrez Vargas']],
            ],
            [
                'titles'   => ['Innovación en la Industria Calzado Nothink Shoes'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [
                    ['Asia','Pellegrini'],
                    ['Luna T.','García'],
                ],
            ],
            [
                'titles'   => ['Branding Experiencial para el Fortalecimiento de Marcas en el Sector Turístico'],
                'place'    => 'Salón Cian',
                'speakers' => [['Franklin', 'Eduardo López']],
            ],
            [
                'titles'   => ['E-Commerce de Productos y Servicios + Sostenibilidad,%Apuesta de Negocio%'],
                'place'    => 'Salón Terracota',
                'speakers' => [['Juan Carlos','Peña Castro']],
            ],
            [
                'titles'   => ['Estrategia para la Presentación de Proyectos Turísticos'],
                'place'    => 'Salón Rubí',
                'speakers' => [['Alejandro','Fajardo']],
            ],
            [
                'titles'   => ['Materia Viva: Artesanía, Moda y Sostenibilidad'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [['Angela María','Galindo Cañon']],
            ],

            // =================== JUEVES 23 - TARDE (Workshops) ===================
            [
                'titles'   => ['Realidad Aumentada para la Promoción Publicitaria'],
                'place'    => 'Aula A104',
                'speakers' => [['Carlos Enrique','Fernández García']],
            ],
            [
                'titles'   => ['Uso de Tecnologías Financieras que Faciliten el Cierre de Negocios en Ferias y Ruedas de Negocios','%Tecnologías Financieras%Ferias%Ruedas%'],
                'place'    => 'Aula C301',
                'speakers' => [['Magreth','Gutiérrez Vargas']],
            ],
            [
                'titles'   => ['Fase 3 Final. Prototipado y Validación de Soluciones Empresariales','%Fase 3%Prototipado%'],
                'place'    => 'Aula C302 a C306',
                'speakers' => [
                    ['Otniel Josafat','López Altamirano'],
                    ['Alberto','Mena'],
                    ['Karina','Vélez Gómez'],
                ],
            ],
            [
                'titles'   => ['De la Idea al Impacto: Fórmula de Proyectos Rentables y Sostenibles'],
                'place'    => 'Aula C401',
                'speakers' => [['Alejandro','Fajardo']],
            ],

            // =================== JUEVES 23 - NOCHE ===================
            [
                'titles'   => ['Proyectos de Innovación en Comunicación y Diseño con Inteligencia Artificial'],
                'place'    => 'Auditorio 5ta Avenida',
                'speakers' => [['Carlos Enrique','Fernández García']],
            ],
            [
                'titles'   => ['Comercio Exterior como Mecanismo para el Crecimiento Empresarial de la Región'],
                'place'    => 'Virtual',
                'speakers' => [['Amalia','Aguilar Castillo']],
            ],
            [
                'titles'   => ['Sostenibilidad y Reducción de Impactos'],
                'place'    => 'Virtual',
                'speakers' => [['Diego','Santos González']],
            ],
        ];

        $insertCount = 0;
        foreach ($links as $row) {
            $event = $findEvent($row['titles'], $row['place'] ?? null);

            if (!$event) {
                $this->warnRow('EVENTO NO ENCONTRADO', $row['titles'], $row['place'] ?? null);
                continue;
            }

            foreach ($row['speakers'] as [$first,$last]) {
                $sp = $findSpeaker($first, $last);
                if (!$sp) {
                    $this->warn("SPEAKER NO ENCONTRADO: {$first} {$last}");
                    continue;
                }

                // Inserta en pivote evitando duplicados
                $exists = DB::table('event_speakers')
                    ->where('event_id', $event->id)
                    ->where('speaker_id', $sp->id)
                    ->exists();

                if (!$exists) {
                    DB::table('event_speakers')->insert([
                        'uuid'            => Str::uuid(),
                        'event_id' => $event->id,
                        'speaker_id'      => $sp->id,
                        'created_at'      => now(),
                        'updated_at'      => now(),
                    ]);
                    $insertCount++;
                }
            }
        }

        $this->command->info("Vinculaciones event_speakers creadas/aseguradas: {$insertCount}");
    }

    private function warn(string $msg): void
    {
        if (app()->runningInConsole()) {
            $this->command->warn($msg);
        } else {
            dump($msg);
        }
    }

    private function warnRow(string $prefix, array $titles, ?string $place): void
    {
        $t = implode(' | ', $titles);
        $p = $place ? " @ {$place}" : '';
        $this->warn("{$prefix}: {$t}{$p}");
    }
}
