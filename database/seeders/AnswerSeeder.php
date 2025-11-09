<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;

class AnswerSeeder extends Seeder
{
    public function run(): void
    {
        $questions = Question::pluck('id', 'question_text')->toArray();

        // Verificamos que existan las preguntas antes de insertar
        if (!isset($questions['¿Cuál es la fórmula del área de un círculo?'])) {
            $this->command->warn('❌ No se encontró la pregunta: "¿Cuál es la fórmula del área de un círculo?"');
            return;
        }

        // Pregunta 1
        Answer::insert([
            ['question_id' => $questions['¿Cuál es la fórmula del área de un círculo?'], 'text' => 'A = πr²', 'is_correct' => true],
            ['question_id' => $questions['¿Cuál es la fórmula del área de un círculo?'], 'text' => 'A = 2πr', 'is_correct' => false],
            ['question_id' => $questions['¿Cuál es la fórmula del área de un círculo?'], 'text' => 'A = πd', 'is_correct' => false],
            ['question_id' => $questions['¿Cuál es la fórmula del área de un círculo?'], 'text' => 'A = r²', 'is_correct' => false],
        ]);

        // Pregunta 2
        if (isset($questions['¿Qué partícula subatómica tiene una carga negativa?'])) {
            Answer::insert([
                ['question_id' => $questions['¿Qué partícula subatómica tiene una carga negativa?'], 'text' => 'Electrón', 'is_correct' => true],
                ['question_id' => $questions['¿Qué partícula subatómica tiene una carga negativa?'], 'text' => 'Protón', 'is_correct' => false],
                ['question_id' => $questions['¿Qué partícula subatómica tiene una carga negativa?'], 'text' => 'Neutrón', 'is_correct' => false],
                ['question_id' => $questions['¿Qué partícula subatómica tiene una carga negativa?'], 'text' => 'Positrón', 'is_correct' => false],
            ]);
        }

        // Pregunta 3
        if (isset($questions['¿Cuál es el pH de una solución neutra a 25°C?'])) {
            Answer::insert([
                ['question_id' => $questions['¿Cuál es el pH de una solución neutra a 25°C?'], 'text' => '7', 'is_correct' => true],
                ['question_id' => $questions['¿Cuál es el pH de una solución neutra a 25°C?'], 'text' => '0', 'is_correct' => false],
                ['question_id' => $questions['¿Cuál es el pH de una solución neutra a 25°C?'], 'text' => '14', 'is_correct' => false],
                ['question_id' => $questions['¿Cuál es el pH de una solución neutra a 25°C?'], 'text' => '1', 'is_correct' => false],
            ]);
        }

        // Pregunta 4
        if (isset($questions['¿Cuál es la molécula que almacena la información genética en los seres vivos?'])) {
            Answer::insert([
                ['question_id' => $questions['¿Cuál es la molécula que almacena la información genética en los seres vivos?'], 'text' => 'ADN', 'is_correct' => true],
                ['question_id' => $questions['¿Cuál es la molécula que almacena la información genética en los seres vivos?'], 'text' => 'ARN', 'is_correct' => false],
                ['question_id' => $questions['¿Cuál es la molécula que almacena la información genética en los seres vivos?'], 'text' => 'Proteína', 'is_correct' => false],
                ['question_id' => $questions['¿Cuál es la molécula que almacena la información genética en los seres vivos?'], 'text' => 'Lípido', 'is_correct' => false],
            ]);
        }

        // Pregunta 5
        if (isset($questions['¿En qué año comenzó la Segunda Guerra Mundial?'])) {
            Answer::insert([
                ['question_id' => $questions['¿En qué año comenzó la Segunda Guerra Mundial?'], 'text' => '1939', 'is_correct' => true],
                ['question_id' => $questions['¿En qué año comenzó la Segunda Guerra Mundial?'], 'text' => '1914', 'is_correct' => false],
                ['question_id' => $questions['¿En qué año comenzó la Segunda Guerra Mundial?'], 'text' => '1945', 'is_correct' => false],
                ['question_id' => $questions['¿En qué año comenzó la Segunda Guerra Mundial?'], 'text' => '1929', 'is_correct' => false],
            ]);
        }

        // Pregunta 6
        if (isset($questions['¿Cuál es el río más largo del mundo?'])) {
            Answer::insert([
                ['question_id' => $questions['¿Cuál es el río más largo del mundo?'], 'text' => 'Nilo', 'is_correct' => true],
                ['question_id' => $questions['¿Cuál es el río más largo del mundo?'], 'text' => 'Amazonas', 'is_correct' => false],
                ['question_id' => $questions['¿Cuál es el río más largo del mundo?'], 'text' => 'Yangtsé', 'is_correct' => false],
                ['question_id' => $questions['¿Cuál es el río más largo del mundo?'], 'text' => 'Misisipi', 'is_correct' => false],
            ]);
        }

        // Pregunta 7
        if (isset($questions['¿Quién escribió "Don Quijote de la Mancha"?'])) {
            Answer::insert([
                ['question_id' => $questions['¿Quién escribió "Don Quijote de la Mancha"?'], 'text' => 'Miguel de Cervantes', 'is_correct' => true],
                ['question_id' => $questions['¿Quién escribió "Don Quijote de la Mancha"?'], 'text' => 'Gabriel García Márquez', 'is_correct' => false],
                ['question_id' => $questions['¿Quién escribió "Don Quijote de la Mancha"?'], 'text' => 'Pablo Neruda', 'is_correct' => false],
                ['question_id' => $questions['¿Quién escribió "Don Quijote de la Mancha"?'], 'text' => 'Julio Cortázar', 'is_correct' => false],
            ]);
        }

        $this->command->info('✅ Respuestas insertadas correctamente.');
    }
}
