<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Exam;
use App\Models\Answer;
use App\Models\ExamResult;
use App\Models\Question;

class ExamComponent extends Component
{
    public $categories;
    public $selectedCategory = null;
    public $questions = [];
    public $answers = [];
    public $showResult = false;
    public $score = 0;
    public $incorrect = 0;
    public $percentage = 0;
    public $resultAnswers = [];

    
    public function mount()
    {
        $this->categories = \App\Models\Category::all();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $exam = Exam::with('questions.answers')->where('category_id', $categoryId)->first();

        if ($exam) {
            $this->questions = $exam->questions;
            foreach ($this->questions as $question) {
                $this->answers[$question->id] = null;
            }
        }
    }

public function submitExam()
    {
        $user = Auth::user();
        if (!$user) {
            session()->flash('error', 'Debe iniciar sesión para enviar el examen.');
            return;
        }

        $score = 0;
        $total = count($this->answers);
        $this->resultAnswers = [];

        foreach ($this->answers as $questionId => $answerId) {
            $selectedAnswer = Answer::find($answerId);
            $correctAnswer = Answer::where('question_id', $questionId)
                ->where('is_correct', 1)
                ->firstOrFail();

            // Contar correctas
            if ($selectedAnswer && $selectedAnswer->is_correct) {
                $score++;
            }

            // Guardar resultados por pregunta
            $this->resultAnswers[$questionId] = [
                'selected' => $selectedAnswer ? $selectedAnswer->text : 'No respondida',
                'correct' => $correctAnswer ? $correctAnswer->text : 'Sin respuesta correcta',
                'is_correct' => $selectedAnswer && $selectedAnswer->is_correct,
            ];
        }

        // Calcular puntajes
        $this->score = $score;
        $this->incorrect = $total - $score;
        $this->percentage = $total > 0 ? round(($score / $total) * 100, 2) : 0;
        $this->showResult = true;

        // Guardar resultado
        ExamResult::create([
            'user_id' => $user->id,
            'exam_id' => \App\Models\Exam::where('category_id', $this->selectedCategory)->value('id'),
            'score' => $score,
            'total' => $total,
            'percentage' => $this->percentage,
        ]);
    }
    
    public function render()
    {
        return view('livewire.exam-component')
            ->layout('layouts.app');
    }
}

