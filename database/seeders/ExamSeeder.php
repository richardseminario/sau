<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exam;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $math = Category::where('name', 'Matematicas')->first()->id;
        $physics = Category::where('name', 'Física')->first()->id;
        $chemistry = Category::where('name', 'Química')->first()->id;
        $biology = Category::where('name', 'Biología')->first()->id;
        $history = Category::where('name', 'Historia')->first()->id;
        $geography = Category::where('name', 'Geografía')->first()->id;
        $literature = Category::where('name', 'Literatura')->first()->id;

        Exam::create([
            'title' => 'Examen de Matemáticas Básicas',
            'description' => 'Un examen para evaluar conocimientos básicos de matemáticas.',
            'category_id' => $math,
            'duration' => 60,
        ]);

        Exam::create([
            'title' => 'Examen de Física General',
            'description' => 'Evalúa los conceptos fundamentales de la física.',
            'category_id' => $physics,
            'duration' => 60,
        ]);

        Exam::create([
            'title' => 'Examen de Química Introductoria',
            'description' => 'Prueba de conocimientos básicos en química.',
            'category_id' => $chemistry,
            'duration' => 60,
        ]);

        Exam::create([
            'title' => 'Examen de Biología Básica',
            'description' => 'Evalúa los conceptos esenciales de biología.',
            'category_id' => $biology,
            'duration' => 60,
        ]);

        Exam::create([
            'title' => 'Examen de Historia Universal',
            'description' => 'Prueba de conocimientos sobre eventos históricos importantes.',
            'category_id' => $history,
            'duration' => 60,
        ]);

        Exam::create([
            'title' => 'Examen de Geografía Mundial',
            'description' => 'Evalúa el conocimiento sobre países, capitales y características geográficas.',
            'category_id' => $geography,
            'duration' => 60,
        ]);

        Exam::create([
            'title' => 'Examen de Literatura Clásica',
            'description' => 'Prueba de conocimientos sobre obras y autores clásicos de la literatura.',
            'category_id' => $literature,
            'duration' => 60,
        ]);
    }
}
