<?php

namespace App\Livewire;

use App\Livewire\Forms\BirthdayForm;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Birthdays extends Component
{
    use Toast;

    public string $search = '';

    public bool $addModal = false;

    public bool $editModal = false;

    public BirthdayForm $form;

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    // Delete action
    public function delete(User $user): void
    {
        $user->delete();
        $this->success('User deleted. ', position: 'toast-bottom');
    }

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-64'],
            ['key' => 'age', 'label' => 'Age', 'class' => 'w-20'],
            ['key' => 'email', 'label' => 'E-mail', 'sortable' => false],
        ];
    }

    /**
     * For demo purpose, this is a static collection.
     *
     * On real projects you do it with Eloquent collections.
     * Please, refer to Mary docs to see the eloquent examples.
     */
    public function users(): Collection
    {
        return User::all()
            ->sortBy([[...array_values($this->sortBy)]])
            ->when($this->search, function (Collection $collection) {
                return $collection->filter(fn(User $item) => str($item['name'])->contains($this->search, true));
            });
    }

    public function save()
    {
        $this->form->store();
        $this->addModal = false;
    }

    public function edit(User $user)
    {
        $this->form->fillForm($user);
        $this->editModal = true;
    }

    public function update()
    {
        $this->form->update();
        $this->editModal = false;
    }

    public function render()
    {
        return view('livewire.birthdays', [
            'users' => $this->users(),
            'headers' => $this->headers()
        ]);
    }
}
