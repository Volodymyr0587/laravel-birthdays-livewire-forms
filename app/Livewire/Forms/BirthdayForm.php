<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BirthdayForm extends Form
{
    public ?User $record;

    #[Validate('required')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $dob = '';

    public function fillForm(User $record)
    {
        $this->record = $record;

        $this->name = $record->name;
        $this->email = $record->email;
        $this->dob = $record->dob->format('Y-m-d');
    }

    public function store()
    {
        $this->validate();

        User::create(
            $this->all()
        );

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->record->update(
            $this->all()
        );

        $this->reset();
    }
}
