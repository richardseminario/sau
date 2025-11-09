<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Category;
use App\Models\Exam;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exam1 = Exam::where('title', 'Examen de Matemáticas Básicas')->first();
        $exam2 = Exam::where('title', 'Examen de Física General')->first();
        $exam3 = Exam::where('title', 'Examen de Química Introductoria')->first();
        $exam4 = Exam::where('title', 'Examen de Biología Básica')->first();
        $exam5 = Exam::where('title', 'Examen de Historia Universal')->first();
        $exam6 = Exam::where('title', 'Examen de Geografía Mundial')->first();
        $exam7 = Exam::where('title', 'Examen de Literatura Clásica')->first();
        
        Question::create([
            'category_id' => Category::where('name', 'Matematicas')->first()->id,
            'exam_id' => $exam1->id,
            'question_text' => '¿Cuál es la fórmula del área de un círculo?',
        ]);

        Question::create([
            'category_id' => Category::where('name', 'Física')->first()->id,
            'exam_id' => $exam2->id,
            'question_text' => '¿Qué partícula subatómica tiene una carga negativa?',
        ]);

        Question::create([
            'category_id' => Category::where('name', 'Química')->first()->id,
            'exam_id' => $exam3->id,
            'question_text' => '¿Cuál es el pH de una solución neutra a 25°C?',
        ]);

        Question::create([
            'category_id' => Category::where('name', 'Biología')->first()->id,
            'exam_id' => $exam4->id,
            'question_text' => '¿Cuál es la molécula que almacena la información genética en los seres vivos?',
        ]);

        Question::create([
            'category_id' => Category::where('name', 'Historia')->first()->id,
            'exam_id' => $exam5->id,
            'question_text' => '¿En qué año comenzó la Segunda Guerra Mundial?',
        ]);

        Question::create([
            'category_id' => Category::where('name', 'Geografía')->first()->id,
            'exam_id' => $exam6->id,
            'question_text' => '¿Cuál es el río más largo del mundo?',
        ]);

        Question::create([
            'category_id' => Category::where('name', 'Literatura')->first()->id,
            'exam_id' => $exam7->id,
            'question_text' => '¿Quién escribió "Don Quijote de la Mancha"?',
        ]);
    }
}
