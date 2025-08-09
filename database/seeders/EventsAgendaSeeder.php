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

        // ==================== JORNADA MARTES ====================
        $jornadaMartes = Jornada::where('title', 'Martes - Dinámicas Mundiales que Transforman Nuestra Industria Turística')->first();
        if (!$jornadaMartes) {
            dump('No se encontró la jornada del martes');
        } else {
            $itemsMartes = [
                // Conferencias
                [ 'title' => 'Innovación Turística y Sostenible', 'program' => 'Ph. D. FEDERICO DE ARTEAGA VIDIELLA – Categoría: Turismo', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'Preservación de la Cocina Tradicional – Fotografía de Producto Gastronómico', 'program' => 'JAVIER SUESCÚN – Categoría: Diseño', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'La Neo Artesanía y su incidencia en la Economía Circular', 'program' => 'MARIA CECILIA LOPEZ – Categoría: Modas', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'Soluciones digitales para la gestión productiva del departamento', 'program' => 'ANDRÉS DÍAZ MOLINA – Categoría: Software', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'Marketing promocional de destinos turísticos como idea de negocio', 'program' => 'JHON FABER GIRALDO – Categoría: Negocios Internacionales', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'El poder de WayFinding: Experiencia Ciudades Legibles', 'program' => 'LUCAS LÓPEZ – Categoría: Diseño', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Colección cápsula efectiva', 'program' => 'JUAN CARLOS LEÓN – Categoría: Modas', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Datos, experiencias y decisiones: cómo la IA está transformando el Turismo', 'program' => 'ALBERTO MENA – Categoría: Software', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                // Actividad cultural
                [ 'title' => '4° FESCiU Internacional de Cine Universitario de Cúcuta', 'program' => 'Centro Cultural Quinta Teresa – Sala de Proyección – Categoría: Actividad Cultural', 'time' => '02:00 p.m. - 06:00 p.m.' ],
                // Workshops
                [ 'title' => 'IA para la Generación Gráfica', 'program' => 'WILFER MONTOYA BENJUMEA – Categoría: Diseño', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Fotografía de Producto', 'program' => 'JHON FABER GIRALDO GIRALDO – Categoría: Diseño', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Fase 1. Prototipado y Validación de Soluciones Empresariales', 'program' => 'ALBERTO MENA & OTNIEL J. LÓPEZ ALTAMIRANO – Categoría: Software', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Despertando la Mentalidad Innovadora', 'program' => 'FEDERICO DE ARTEAGA VIDIELLA – Categoría: Turismo', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Narrativas de Región', 'program' => 'MARIA CECILIA LÓPEZ BARRIS – Categoría: Modas', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Desarrollo de Capacidades en Innovación y Gestión de Empresas Turísticas', 'program' => 'JULIO CÉSAR ACOSTA PRADO – Categoría: Turismo y Negocios', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                // Conferencias noche
                [ 'title' => 'Rentabilidad de las empresas turísticas', 'program' => 'JULIO CÉSAR ACOSTA PRADO – Categoría: Financiera y Negocios', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Logística de eventos', 'program' => 'MANUEL FERNÁNDEZ – Categoría: Logística Virtual', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Estrategias comerciales para el impulso de productos turísticos', 'program' => 'NATALIA BAYONA – Categoría: Turismo y Negocios Virtual', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Automatización y talento humano: ¿Cómo preparar el mercado laboral turístico para la transformación digital?', 'program' => 'ALBERTO MENA – Categoría: Software', 'time' => '07:00 p.m. - 08:00 p.m.' ],
            ];

           foreach ($itemsMartes as $data) {
                EventsAgenda::create([
                    'uuid' => Str::uuid(),
                    'agenda_id' => $agenda->id,
                    'jornada_id' => $jornadaMartes->id,
                    'title' => $data['title'],
                    'program' => $data['program'],
                    'time' => $data['time'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Eventos miércoles 22 de octubre
        |--------------------------------------------------------------------------
        */
        // ==================== JORNADA MIÉRCOLES ====================
        $jornadaMiercoles = Jornada::where('title', 'Miércoles - Modelos Globales que Potencializan el Desarrollo Económico de la Región')->first();
        if (!$jornadaMiercoles) {
            dump('No se encontró la jornada del miércoles');
        } else {
            $itemsMiercoles = [
                [ 'title' => 'Generación Gráfica con IA para la Divulgación Turística', 'program' => 'WILFER MONTOYA BENJUMEA – Categoría: Diseño', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'Entornos mediáticos expandidos: Prácticas sociales y digitales', 'program' => 'OTNIEL JOSAFAT LÓPEZ ALTAMIRANO – Categoría: Software', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'Oportunidades de Financiación para proyectos agrosostenibles y el mercado de bonos de carbono', 'program' => 'RICARDO ALEXIS LÓPEZ GALLEGO – Categoría: Financiera', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'Destino Moda: Exploración social cultural a través del diseño comercial', 'program' => 'JUAN CARLOS LEÓN – Categoría: Modas', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'La Infografía como Herramienta de Divulgación para Souvenirs Autóctonos en Locaciones Turísticas', 'program' => 'GERARDO LUNA GIJÓN – Categoría: Diseño', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Identificación de productos y servicios exportables', 'program' => 'MIGUELINA RUIZ DÍAZ – Categoría: Negocios', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Turismo Rural Sostenible: Casos de Impacto y Oportunidades Reales', 'program' => 'HECTOR DANIEL MARTÍNEZ – Categoría: Turismo', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Taller de Creatividad y Pensamiento Divergente', 'program' => 'WILFER MONTOYA BENJUMEA – Categoría: Diseño', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Narrativas Inmersivas y Tecnología en Proyectos Turísticos', 'program' => 'OTNIEL JOSAFAT LÓPEZ ALTAMIRANO – Categoría: Software', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Taller: Diseño de Moda con Materiales Sostenibles', 'program' => 'MARIA CECILIA LÓPEZ BARRIS – Categoría: Modas', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Branding de Destinos Regionales', 'program' => 'GERARDO LUNA GIJÓN – Categoría: Diseño', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Estrategias de Exportación Turística para la Región', 'program' => 'MIGUELINA RUIZ DÍAZ – Categoría: Negocios', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Workshop: Sostenibilidad en Proyectos de Turismo Rural', 'program' => 'HECTOR DANIEL MARTÍNEZ – Categoría: Turismo', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Retail Design para UX en el Sector Gastronómico', 'program' => 'LUCIA CORALI NELLY RISCO – Categoría: Diseño', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Inversión Extranjera y Turismo: Motores del Desarrollo Sostenible en Colombia', 'program' => 'ANDREA PAOLA SANTANILLA NARVAEZ – Categoría: Negocios Virtual', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Impulso a la competitividad regional', 'program' => 'LUIS ANÍBAL MORA GARCÍA – Categoría: Logística Virtual', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Conecta para crecer: El poder de la asociatividad en el turismo', 'program' => 'ANGELA PANTOJA GARZÓN – Categoría: Turismo Virtual', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Estrategias trasmedia para impulsar el turismo del futuro', 'program' => 'OTNIEL JOSAFAT LÓPEZ ALTAMIRANO – Categoría: Software y Turismo', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Branding Experiencial para el Fortalecimiento de Marcas en el Sector Turístico', 'program' => 'FRANKLIN EDUARDO LÓPEZ – Categoría: Diseño', 'time' => '08:30 p.m. - 09:30 p.m.' ],
            ];

            foreach ($itemsMiercoles as $data) {
                EventsAgenda::create([
                    'uuid' => Str::uuid(),
                    'agenda_id' => $agenda->id,
                    'jornada_id' => $jornadaMiercoles->id,
                    'title' => $data['title'],
                    'program' => $data['program'],
                    'time' => $data['time'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Eventos jueves 23 de octubre
        |--------------------------------------------------------------------------
        */
        // ==================== JORNADA JUEVES ====================
        $jornadaJueves = Jornada::where('title', 'Jueves - Impacto de la Investigación y la Tecnología en el Desarrollo Turístico y Productivo de la Región')->first();
        if (!$jornadaJueves) {
            dump('No se encontró la jornada del jueves');
        } else {
            $itemsJueves = [
                [ 'title' => 'Cerrando brechas digitales en el turismo colombiano a través de la educación, la inclusión y la conectividad', 'program' => 'KARINA VÉLEZ GÓMEZ – Categoría: Software', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'Soluciones Fintech para Empresas Rurales', 'program' => 'MAGRETH GUTIERREZ VARGAS – Categoría: Financiera', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'Innovación en la Industria Calzado Nothink Shoes', 'program' => 'ASIA PELLEGRINI & LUNA T. GARCÍA – Categoría: Modas', 'time' => '08:00 a.m. - 09:00 a.m.' ],
                [ 'title' => 'E-commerce de productos y servicios + sostenibilidad, como una apuesta de negocio en la región', 'program' => 'JUAN CARLOS PEÑA CASTRO – Categoría: Negocios Internacionales', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Estrategias para la presentación de proyectos turísticos', 'program' => 'ALEJANDRO FAJARDO – Categoría: Turismo', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Materia Viva: Artesanía, Moda y Sostenibilidad', 'program' => 'ANGELA MARÍA GALINDO CAÑON – Categoría: Modas', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Tendencias en moda 2026', 'program' => 'CLAUDIA MARCELA SANZ – Categoría: Modas', 'time' => '09:30 a.m. - 10:30 a.m.' ],
                [ 'title' => 'Diseño de Experiencia Gastronómica en Retail', 'program' => 'LUCIA CORALI NELLY RISCO – Categoría: Diseño', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Inclusión Digital para el Turismo Sostenible', 'program' => 'KARINA VÉLEZ GÓMEZ – Categoría: Software', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Taller de Fintech para Emprendedores Rurales', 'program' => 'MAGRETH GUTIERREZ VARGAS – Categoría: Financiera', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Innovación en Calzado con Perspectiva de Género', 'program' => 'ASIA PELLEGRINI & LUNA T. GARCÍA – Categoría: Modas', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Estrategias de E-Commerce para Productos Artesanales', 'program' => 'JUAN CARLOS PEÑA CASTRO – Categoría: Negocios Internacionales', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Workshop: Proyectos de Turismo Comunitario', 'program' => 'ALEJANDRO FAJARDO – Categoría: Turismo', 'time' => '03:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Proyectos de Innovación en Comunicación y Diseño con Inteligencia Artificial', 'program' => 'CARLOS ENRIQUE FERNÁNDEZ GARCÍA – Categoría: Software', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Comercio electrónico como mecanismo para el crecimiento empresarial de la región', 'program' => 'AMALIA AGUILAR CASTILLO – Categoría: Negocios y Turismo Virtual', 'time' => '07:00 p.m. - 08:00 p.m.' ],
                [ 'title' => 'Sostenibilidad y reducción de impactos', 'program' => 'DIEGO SANTOS – Categoría: Logística Virtual', 'time' => '07:00 p.m. - 08:00 p.m.' ],
            ];

             foreach ($itemsJueves as $data) {
                EventsAgenda::create([
                    'uuid' => Str::uuid(),
                    'agenda_id' => $agenda->id,
                    'jornada_id' => $jornadaJueves->id,
                    'title' => $data['title'],
                    'program' => $data['program'],
                    'time' => $data['time'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // ==================== JORNADA VIERNES ====================
        $jornadaViernes = Jornada::where('title', 'Viernes: Rueda de Negocios (8:00 a.m. a 12:00 p.m.), Feria Cultural (8:00 a.m. a 6:00 p.m.), Fiesta de Cierre (6:00 p.m. a 12:00 a.m.)')->first();
        if (!$jornadaViernes) {
            dump('No se encontró la jornada del viernes');
        } else {
            $itemsViernes = [
                [ 'title' => 'Rueda de Negocios Internacional de Turismo, Diseño, Tecnología y Moda', 'program' => 'Categoría: Networking Empresarial', 'time' => '08:00 a.m. - 01:00 p.m.' ],
                [ 'title' => 'Feria Cultural, Artesanal y Gastronómica', 'program' => 'Categoría: Feria Cultural', 'time' => '02:00 p.m. - 06:00 p.m.' ],
                [ 'title' => 'Fiesta de Clausura Proyectando FESC 2025', 'program' => 'Categoría: Evento Especial', 'time' => '08:00 p.m. - 11:00 p.m.' ],
            ];

            foreach ($itemsViernes as $data) {
                EventsAgenda::create([
                    'uuid' => Str::uuid(),
                    'agenda_id' => $agenda->id,
                    'jornada_id' => $jornadaViernes->id,
                    'title' => $data['title'],
                    'program' => $data['program'],
                    'time' => $data['time'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        dump('Eventos de la agenda insertados correctamente.');

    }
}
