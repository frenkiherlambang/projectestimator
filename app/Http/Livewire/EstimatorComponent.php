<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estimator;

class EstimatorComponent extends Component
{

    public $estimatorId = 1;


    public function nextQuestion()
    {
        $this->estimatorId++;
    }

    public function prevQuestion()
    {
        $this->estimatorId--;
    }


    public function render()
    {
        $estimator = Estimator::find($this->estimatorId);
        return view('livewire.estimator', compact('estimator'));
    }
}
