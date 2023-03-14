<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estimator;
use Illuminate\Support\Arr;
use Termwind\Components\Dd;

class EstimatorComponent extends Component
{

    public $estimatorSequence = [];
    public $currentEstimator = 0;
    public $i = 0;
    public $answers = [];
    public $nextEstimators = [];
    public $result = [];
    public $estimatePrice = 0;
    public $questionsAnswers = [];
    public $showResult = false;



    public function mount()
    {
        $this->estimatorSequence = Estimator::where('is_special_case', false)->pluck('id')->toArray();
        // dd($this->estimatorSequence);
        $this->currentEstimator = $this->estimatorSequence[0];
        // array_splice($this->estimatorSequence, 5, 0, [6,7]);
    }

    public function updatedAnswers($value)
    {
        foreach ($this->answers as $key => $answer) {
            if (is_array($answer)) {
                $this->nextEstimators[$key] = Estimator::find($key)->options()->whereIn('option', $answer)->get();
                $harga = collect(Arr::flatten($this->nextEstimators[$key]))->sum('value');
                if ($harga > 0) {
                    $this->questionsAnswers[$key] = [
                        'question' => Estimator::find($key)->question,
                        'answer' => $answer,
                        'harga' => $harga,
                    ];
                }

            } else {
                $estimator = Estimator::find($key);
                if ($estimator->answer_type == 'integer') {
                    $harga = $answer * $estimator->options()->first()->value;
                    if ($harga > 0) {
                        $this->questionsAnswers[$key] = [
                            'question' => $estimator->question,
                            'answer' => $answer,
                            'harga' => $harga,
                        ];
                    }
                    $this->nextEstimators[$key] = Estimator::find($key)->options()->first();
                } else {
                    $harga = Estimator::find($key)->options()->where('option', $answer)->first()->value ?? 0;
                    if ($harga > 0) {
                        $this->questionsAnswers[$key] = [
                            'question' => $estimator->question,
                            'answer' => $answer,
                            'harga' => $harga,
                        ];
                    }
                    $this->nextEstimators[$key] = Estimator::find($key)->options()->where('option', $answer)->first();
                }
            }
        }
        $this->estimatePrice =  collect(Arr::flatten($this->nextEstimators))->sum('value');
        $this->nextEstimators = collect(Arr::flatten($this->nextEstimators))
            ->whereNotNull('next_question_id')
            ->where('next_question_id', '!=', '')
            ->pluck('next_question_id')->toArray();


        $this->estimatorSequence = Estimator::where('is_special_case', false)->pluck('id')->toArray();
        $this->estimatorSequence = array_merge($this->estimatorSequence, $this->nextEstimators);
        $this->estimatorSequence = array_unique($this->estimatorSequence);
        sort($this->estimatorSequence);
    }





    public function nextQuestion()
    {
        if (isset($this->estimatorSequence[$this->i + 1])) {
            $this->currentEstimator = $this->estimatorSequence[++$this->i];
        } else {
            $this->showResult = true;
        }
    }

    public function prevQuestion()
    {
        $this->currentEstimator = $this->estimatorSequence[--$this->i];
    }




    public function render()
    {
        $estimator = Estimator::find($this->currentEstimator);
        return view('livewire.estimator', compact('estimator'));
    }
}
