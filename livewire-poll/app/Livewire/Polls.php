<?php

namespace App\Livewire;

use App\Models\Options;
use Livewire\Component;
use Livewire\Attributes\On; 

class Polls extends Component
{
    #[On('createdPoll')] 
    public function render()
    {
        $polls = \App\Models\Poll::with('options.votes')
        ->latest()->get();
        return view('livewire.polls',['polls' => $polls]);
    }

    public function vote(Options $options)
    {
         $options->votes()->create();
    }
}
