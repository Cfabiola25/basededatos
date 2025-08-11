<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Agenda;
use App\Models\Jornada;
use App\Models\EventsAgenda;

class EventsAgendaSeeder extends Seeder
{
    public function run(): void
    {
        $agenda = Agenda::where('name', 'Proyectando FESC 2025 - II')->first();
        if (!$agenda) {
            dump('No se encontró la agenda global "Proyectando FESC 2025 - II"');
            return;
        }

        // ====== IDs REALES (ajusta a tu catálogo) ======
        $CAT_CONFERENCIAS      = 1;
        $CAT_WORKSHOPS         = 2;
        $CAT_PANELES           = 3;
        $CAT_EVENTOSESPECIALES = 4;

        $LOC_TEATRO_ZULIMA         = 1;
        $LOC_HOTEL_CASABLANCA      = 2;
        $LOC_QUINTA_TERESA         = 3;
        $LOC_FESC                  = 4;
        $LOC_CC_JARDIN_PLAZA       = 5;
        $LOC_ECOPARQUE_COMFANORTE  = 6;

        $AGENDA_ID = $agenda->id;

        /* ===================== LUNES 20 DE OCTUBRE ===================== */
        $jornadaLunes = Jornada::whereIn('title', [
            'Lunes - Tendencias Mundiales en Innovación, Tecnología e Investigación, aportándole al desarrollo turístico y productivo de la región',
        ])->first();

        if (!$jornadaLunes) {
            dump('No se encontró la jornada del lunes');
        } else {
            $JORNADA_ID = $jornadaLunes->id;

            $itemsLunes = [[
                'category_id' => $CAT_PANELES,
                'location_id' => $LOC_TEATRO_ZULIMA,
                'place'       => 'Teatro Zulima',
                'title'       => 'Panel Inaugural',
                'program'     => 'Tendencias de Colombia y el Mundo en Innovación, Tecnología e Investigación, aportándole al desarrollo turístico y productivo de la región.',
                'time'        => '06:00 p.m. - 08:00 p.m.',
            ]];

            foreach ($itemsLunes as $e) {
                EventsAgenda::create([
                    'uuid'        => Str::uuid(),
                    'agenda_id'   => $AGENDA_ID,
                    'jornada_id'  => $JORNADA_ID,
                    'category_id' => $e['category_id'],
                    'location_id' => $e['location_id'],
                    'place'       => $e['place'],
                    'title'       => $e['title'],
                    'program'     => $e['program'],
                    'time'        => $e['time'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        /* ==================== MARTES 21 DE OCTUBRE ==================== */
        $jornadaMartes = Jornada::where('title', 'Martes - Dinámicas Mundiales que Transforman Nuestra Industria Turística')->first();
        if (!$jornadaMartes) {
            dump('No se encontró la jornada del martes');
        } else {
            $JORNADA_ID = $jornadaMartes->id;

            $itemsMartes = [
                // Conferencias mañana
                [ 'title'=>'Innovación Turística y Sostenible', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Preservación de la Cocina Tradicional – Fotografía de Producto Gastronómico', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Cian', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Sesión 1. La Neo Artesanía y su incidencia en la Economía Circular', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Rubí', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Soluciones Digitales para la Gestión Productiva del Departamento', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                // 09:30 a.m. - 10:30 a.m.
                [ 'title'=>'Marketing Promocional de Destinos Turísticos Como Idea de Negocio', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'El Poder de WayFinding: Experiencia Ciudades Legibles', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Cian', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'Sesión 1. Colección Cápsula Efectiva', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Rubí', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'Datos, Experiencias y Decisiones: Cómo la IA está Transformando el Turismo', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                // Cine mañana
                [ 'title'=>'4° FESCtival Internacional de Cine Universitario de Cúcuta - Concurso de Cortometrajes (Mañana)', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Sala de Proyección', 'program'=>null, 'time'=>'08:00 a.m. - 12:00 m.' ],
                // Workshops tarde
                [ 'title'=>'IA para la Generación Gráfica', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula A104', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Fotografía de Producto', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C201 - C202', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Fase 1. Prototipado y Validación de Soluciones Empresariales', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C302 a C306', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Despertando la Mentalidad Innovadora', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C401', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Narrativas de Región', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula A302', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Desarrollo de Capacidades en Innovación y Gestión de Empresas Turísticas', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C301', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                // Cine tarde
                [ 'title'=>'4° FESCtival Internacional de Cine Universitario de Cúcuta - Concurso de Cortometrajes (Tarde)', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Sala de Proyección', 'program'=>null, 'time'=>'02:00 p.m. - 06:00 p.m.' ],
                // Gala
                [ 'title'=>'Gala Inaugural 4° FESCtival Internacional de Cine Universitario de Cúcuta', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Sala de Proyección', 'program'=>null, 'time'=>'07:00 p.m. - 09:00 p.m.' ],
                // Conferencias noche
                [ 'title'=>'Automatización y Talento Humano: ¿Cómo Preparar el Mercado Laboral Turístico para la Transformación Digital?', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Rubí', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                [ 'title'=>'Innovación como Herramienta de Desarrollo en las Regiones con Vocación Turística', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                [ 'title'=>'Logística de Eventos', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Virtual', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                [ 'title'=>'Estrategias Comerciales para el Impulso de Productos Turísticos', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Virtual', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
            ];

            foreach ($itemsMartes as $e) {
                EventsAgenda::create([
                    'uuid'        => Str::uuid(),
                    'agenda_id'   => $AGENDA_ID,
                    'jornada_id'  => $JORNADA_ID,
                    'category_id' => $e['category_id'],
                    'location_id' => $e['location_id'],
                    'place'       => $e['place'],
                    'title'       => $e['title'],
                    'program'     => $e['program'],
                    'time'        => $e['time'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        /*
        |----------------------------------------------------------------------
        | MIÉRCOLES 22 — Modelos Globales que Potencializan el Desarrollo...
        |----------------------------------------------------------------------
        */
        $jornadaMiercoles = Jornada::where('title', 'Miércoles - Modelos Globales que Potencializan el Desarrollo Económico de la Región')->first();
        if (!$jornadaMiercoles) {
            dump('No se encontró la jornada del miércoles');
        } else {
            $JORNADA_ID = $jornadaMiercoles->id;

            $itemsMiercoles = [
                // 08:00 – 09:00
                [ 'title'=>'Generación Gráfica con IA para la Divulgación Turística', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Cian', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Entornos Mediáticos Expandidos: Prácticas Sociales y Digitales', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Modelos de Desarrollo Turístico Rentables y Sostenibles, Caso Sierra de Santa Marta', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Rubí', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Sesión 2. Destino Moda: Exploración Social Cultural a través del Diseño Comercial', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                // 09:30 – 10:30
                [ 'title'=>'La Infografía como Herramienta de Divulgación para Souvenirs Autóctonos en Locaciones Turísticas', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Cian', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'Identificación de Productos y Servicios Exportables', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'Turismo Rural Sostenible: Casos de Impacto y Oportunidades Reales', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Rubí', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'Sesión 2. La Neo Artesanía y su Incidencia en la Economía Circular', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                // 10:30 – 11:30 (PANEL)
                [ 'title'=>'Modelos Globales que Potencializan el Desarrollo Económico de la Región', 'category_id'=>$CAT_PANELES, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'10:30 a.m. - 11:30 a.m.' ],
                // Cine mañana
                [ 'title'=>'4° FESCtival Internacional de Cine Universitario de Cúcuta - Concurso de Cortometrajes (Mañana)', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Sala de Proyección', 'program'=>null, 'time'=>'08:00 a.m. - 12:00 m.' ],
                // Workshops (15:00 – 18:00)
                [ 'title'=>'Ficha Técnica Fashion Pro: Diseña con Visión de Industria', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula A302', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Taller de Diseño de Experiencias Turísticas', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C401', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Herramientas Tecnológicas de Acceso Libre para el Diseño Infográfico', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C101', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Componentes y Factores Presentados en los Fondos de Inversión', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C301', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                [ 'title'=>'Fase 2. Prototipado y Validación de Soluciones Empresariales', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula', 'program'=>null, 'time'=>'03:00 p.m. - 06:00 p.m.' ],
                // Mesa Redonda (15:00 – 17:00)
                [ 'title'=>'Mesa Redonda: Hablando con los Alcaldes', 'category_id'=>$CAT_PANELES, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Coral', 'program'=>null, 'time'=>'03:00 p.m. - 05:00 p.m.' ],
                // Cine tarde
                [ 'title'=>'4° FESCtival Internacional de Cine Universitario de Cúcuta - Concurso de Cortometrajes (Tarde)', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Sala de Proyección', 'program'=>null, 'time'=>'02:00 p.m. - 06:00 p.m.' ],
                // Conferencias noche (19:00 – 20:00)
                [ 'title'=>'Estrategias Transmedia para Impulsar el Turismo del Futuro', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Rubí', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                [ 'title'=>'Estrategias de Financiación: Oportunidades para Proyectos de Economía Sostenible y Bonos de Carbono', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                [ 'title'=>'Inversión Extranjera y Turismo: Motor de Desarrollo Sostenible en Colombia', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                // Virtuales
                [ 'title'=>'Impulsa la Competitividad Regional', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Virtual', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                [ 'title'=>'Conecta para Crecer: El poder de la Asociatividad en el Turismo', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Virtual', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                [ 'title'=>'Estrategias Trasmedia para Impulsar el Turismo del Futuro (Virtual)', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Virtual', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                // 20:15 – 21:15
                [ 'title'=>'Branding Experiencial para el Fortalecimiento de Marcas en el Sector Turístico', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'08:15 p.m. - 09:15 p.m.' ],
            ];

            foreach ($itemsMiercoles as $e) {
                EventsAgenda::create([
                    'uuid'        => Str::uuid(),
                    'agenda_id'   => $AGENDA_ID,
                    'jornada_id'  => $JORNADA_ID,
                    'category_id' => $e['category_id'],
                    'location_id' => $e['location_id'],
                    'place'       => $e['place'],
                    'title'       => $e['title'],
                    'program'     => $e['program'],
                    'time'        => $e['time'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        /*
        |----------------------------------------------------------------------
        | JUEVES 23 — Impacto de la Investigación y la Tecnología...
        |----------------------------------------------------------------------
        */
        $jornadaJueves = Jornada::where('title', 'Jueves - Impacto de la Investigación y la Tecnología en el Desarrollo Turístico y Productivo de la Región')->first();
        if (!$jornadaJueves) {
            dump('No se encontró la jornada del jueves');
        } else {
            $JORNADA_ID = $jornadaJueves->id;

            $itemsJueves = [
                // 08:00 – 09:00
                [ 'title'=>'Retail Design para UX en el Sector Gastronómico', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Cian', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Cerrando Brechas Digitales en el Turismo Colombiano, a través de la Educación, la Inclusión y la Conectividad', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Soluciones Fintech para Empresas Rurales', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Rubí', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                [ 'title'=>'Innovación en la Industria Calzado Nothink Shoes', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'08:00 a.m. - 09:00 a.m.' ],
                // 09:30 – 10:30
                [ 'title'=>'Branding Experiencial para el Fortalecimiento de Marcas en el Sector Turístico', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Cian', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'E-Commerce de Productos y Servicios + Sostenibilidad, como una Apuesta de Negocio en la Región', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'Estrategia para la Presentación de Proyectos Turísticos', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Rubí', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                [ 'title'=>'Materia Viva: Artesanía, Moda y Sostenibilidad', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'09:30 a.m. - 10:30 a.m.' ],
                // 10:30 – 11:30 (PANEL)
                [ 'title'=>'Impacto de la Investigación y la Tecnología en el Desarrollo Turístico y Productivo de la Región', 'category_id'=>$CAT_PANELES, 'location_id'=>$LOC_HOTEL_CASABLANCA, 'place'=>'Salón Terracota', 'program'=>null, 'time'=>'10:30 a.m. - 11:30 a.m.' ],
                // Cine mañana
                [ 'title'=>'4° FESCtival Internacional de Cine Universitario de Cúcuta - Concurso de Cortometrajes (Mañana)', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Sala de Proyección', 'program'=>null, 'time'=>'08:00 a.m. - 12:00 m.' ],
                // Workshops 14:00 – 17:00
                [ 'title'=>'Realidad Aumentada para la Promoción Publicitaria', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula A104', 'program'=>null, 'time'=>'02:00 p.m. - 05:00 p.m.' ],
                [ 'title'=>'Uso de Tecnologías Financieras que Faciliten el Cierre de Negocios en Ferias y Ruedas de Negocios', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C301', 'program'=>null, 'time'=>'02:00 p.m. - 05:00 p.m.' ],
                [ 'title'=>'Fase 3 Final. Prototipado y Validación de Soluciones Empresariales', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C302 a C306', 'program'=>null, 'time'=>'02:00 p.m. - 05:00 p.m.' ],
                [ 'title'=>'Simuladores para la Gestión Aduanera, Logística e Internacional', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula A103', 'program'=>null, 'time'=>'02:00 p.m. - 05:00 p.m.' ],
                [ 'title'=>'De la Idea al Impacto: Fórmula de Proyectos Rentables y Sostenibles', 'category_id'=>$CAT_WORKSHOPS, 'location_id'=>$LOC_FESC, 'place'=>'Aula C401', 'program'=>null, 'time'=>'02:00 p.m. - 05:00 p.m.' ],
                // Cine tarde
                [ 'title'=>'4° FESCtival Internacional de Cine Universitario de Cúcuta - Concurso de Cortometrajes (Tarde)', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Sala de Proyección', 'program'=>null, 'time'=>'02:00 p.m. - 06:00 p.m.' ],
                // 17:00 – 19:00
                [ 'title'=>'RUTA: Centro Cultural Quinta Teresa – Cristo Rey – Biblioteca', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Ruta', 'program'=>null, 'time'=>'05:00 p.m. - 07:00 p.m.' ],
                [ 'title'=>'CITY TOUR: Cúcuta destino fronterizo e histórico', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'City Tour', 'program'=>null, 'time'=>'05:00 p.m. - 07:00 p.m.' ],
                // 19:00 – 20:00
                [ 'title'=>'Proyectos de Innovación en Comunicación y Diseño con Inteligencia Artificial', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Auditorio 5ta Avenida', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                // Virtuales
                [ 'title'=>'Comercio Exterior como Mecanismo para el Crecimiento Empresarial de la Región', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Virtual', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                [ 'title'=>'Sostenibilidad y Reducción de Impactos', 'category_id'=>$CAT_CONFERENCIAS, 'location_id'=>$LOC_FESC, 'place'=>'Virtual', 'program'=>null, 'time'=>'07:00 p.m. - 08:00 p.m.' ],
                // 20:00 – 23:00
                [ 'title'=>'Desfile de Modas: Elementales – Casa de Duendes', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_CC_JARDIN_PLAZA, 'place'=>null, 'program'=>null, 'time'=>'08:00 p.m. - 11:00 p.m.' ],
            ];

            foreach ($itemsJueves as $e) {
                EventsAgenda::create([
                    'uuid'        => Str::uuid(),
                    'agenda_id'   => $AGENDA_ID,
                    'jornada_id'  => $JORNADA_ID,
                    'category_id' => $e['category_id'],
                    'location_id' => $e['location_id'],
                    'place'       => $e['place'],
                    'title'       => $e['title'],
                    'program'     => $e['program'],
                    'time'        => $e['time'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        /*
        |----------------------------------------------------------------------
        | VIERNES 24 — Rueda de Negocios, Feria Cultural, Fiesta de Cierre
        |----------------------------------------------------------------------
        */
        $jornadaViernes = Jornada::where('title', 'Viernes: Rueda de Negocios (8:00 a.m. a 12:00 p.m.), Feria Cultural (8:00 a.m. a 6:00 p.m.), Fiesta de Cierre (6:00 p.m. a 12:00 a.m.)')->first();
        if (!$jornadaViernes) {
            dump('No se encontró la jornada del viernes');
        } else {
            $JORNADA_ID = $jornadaViernes->id;

            $itemsViernes = [
                [ 'title'=>'Rueda de Negocios: Tejiendo redes productivas, proyectamos conexiones comerciales estratégicas', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Sala / Hall', 'program'=>null, 'time'=>'08:00 a.m. - 12:00 m.' ],
                [ 'title'=>'Feria Cultural: Las riquezas de mi tierra, orgullo nortesantandereano', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_QUINTA_TERESA, 'place'=>'Av. 4 entre Cll 15 y 16 (frente C.C. Quinta Teresa)', 'program'=>null, 'time'=>'12:00 m. - 04:00 p.m.' ],
                [ 'title'=>'Fiesta de Cierre – Destino Norte de Santander', 'category_id'=>$CAT_EVENTOSESPECIALES, 'location_id'=>$LOC_ECOPARQUE_COMFANORTE, 'place'=>null, 'program'=>null, 'time'=>'06:00 p.m. - 12:00 a.m.' ],
            ];

            foreach ($itemsViernes as $e) {
                EventsAgenda::create([
                    'uuid'        => Str::uuid(),
                    'agenda_id'   => $AGENDA_ID,
                    'jornada_id'  => $JORNADA_ID,
                    'category_id' => $e['category_id'],
                    'location_id' => $e['location_id'],
                    'place'       => $e['place'],
                    'title'       => $e['title'],
                    'program'     => $e['program'],
                    'time'        => $e['time'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        dump('Eventos de la agenda insertados correctamente.');
    }
}
