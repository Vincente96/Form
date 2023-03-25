<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserForm extends Component
{
    public $user;

    public $password;

    protected $listeners = [
        'loadUser',
    ];

//     protected $rules = [
//         'user.name' => 'required',
//         'user.email' => 'required|email|unique:users,email,'.$this->user->id
// ,        'password' => 'required',
//     ];

    public function rules() {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->resetUser();
    }

    public function resetUser()
    {
        $this->user = new User();
        $this->password = '';    }

    public function store()
    {
        $this->validate();

        $this->user->fill([
            'password' => \Illuminate\Support\Facades\Hash::make($this->password),
        ])->save();

        session()->flash('success', 'Utente creato correttamente');

        $this->emitTo('user-list', 'loadUsers');

        $this->resetUser();
    }

    public function loadUser($user_id)
    {
        $this->user = User::find($user_id);
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
