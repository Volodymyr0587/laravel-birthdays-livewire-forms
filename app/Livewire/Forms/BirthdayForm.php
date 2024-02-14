<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BirthdayForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $dob = '';

    public function store()
    {
        $this->validate();

        User::create(
            $this->all()
        );

        $this->reset();
    }
}
