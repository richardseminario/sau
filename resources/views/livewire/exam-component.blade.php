<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Examen por Categorías</h1>

    <div class="flex flex-wrap gap-3 mb-6">
        @foreach($categories as $category)
            <button wire:click="selectCategory({{ $category->id }})"
                    class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    @if($questions)
        <div>
            @foreach($questions as $index => $question)
                <div class="mb-4">
                    <p class="font-semibold">{{ $index + 1 }}. {{ $question->question_text }}</p>

                    @foreach($question->answers as $answer)
                        <label class="flex items-center gap-2">
                            <input type="radio"
                                   wire:model="answers.{{ $question->id }}"
                                   value="{{ $answer->id }}">
                            <span>{{ $answer->text }}</span>
                        </label>
                    @endforeach
                </div>
                <hr class="my-2">
            @endforeach
        </div>

        <div class="mt-6">
            <button wire:click="submitExam"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-500">
                Enviar Examen
            </button>
        </div>
    @endif

    {{-- Modal de resultado --}}
     @if($showResult)
    <div class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-xl shadow-lg max-w-xl w-full text-center relative">
            <h2 class="text-2xl font-bold mb-3 text-blue-900">Resultados del Examen</h2>

            <p class="text-lg mb-1">✅ Correctas: <strong>{{ $score }}</strong></p>
            <p class="text-lg mb-1">❌ Incorrectas: <strong>{{ $incorrect }}</strong></p>
            <p class="text-lg mb-3">📊 Calificación: <strong>{{ $percentage }}%</strong></p>

            <hr class="my-3">

            <div class="max-h-64 overflow-y-auto text-left px-3">
                @foreach($resultAnswers as $questionId => $res)
                    @php
                        $question = \App\Models\Question::find($questionId);
                    @endphp
                    <div class="mb-3">
                        <p class="font-semibold">{{ $question->question_text }}</p>
                        <p>
                            <span class="{{ $res['is_correct'] ? 'text-green-600' : 'text-red-600' }}">
                                Tu respuesta: {{ $res['selected'] }}
                            </span>
                            <br>
                            <span class="text-blue-700">Correcta: {{ $res['correct'] }}</span>
                        </p>
                    </div>
                    <hr>
                @endforeach
            </div>

            <button wire:click="$set('showResult', false)"
                    class="mt-5 bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-600 transition">
                Cerrar
            </button>
        </div>
    </div>
@endif
</div>
