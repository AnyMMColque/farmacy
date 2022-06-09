<?php

namespace App\Http\Livewire;

use App\Mail\Contact as MailContact;
use App\Mail\Recipe;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name;
    public $mail;
    public $message;

    public function resetVariables()
    {
        $this->reset(['name', 'mail', 'message']);
    }
    /* Enviar mensaje desde contacto */
    public function send()
    {
        $this->validate([
            'name' => 'required',
            /* 'mail' => 'email', */
            'message' => 'required'
        ]);

        /* $this->user->notify(new NotifyUser($this->toMail)); */
        Mail::to('no-reply@sanlorenzo.com')->send(new MailContact($this->name, $this->mail, $this->message));

        $this->reset();
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
