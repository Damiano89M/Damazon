<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class ProfileCreateForm extends Component
{
    use WithFileUploads;

    public $image;
    public $city;
    public $bio;
    public $age;
    public $province;
      

    protected $rules = [

        'image' => 'required|image|max:2000|mimes:webp,png,jpeg,jpg',
        'city' => 'required|min:3|max:20',
        'bio' => 'required|min:3|max:1000'
    ];
    protected $messages = [

        'required' => 'Il campo deve essere compilato',
        'mimes' => 'Le estensioni devono essere :values',
        'image' => 'Il file deve essere un\'immagine',
        'min' => 'Il campo deve essere minimo di :values',
        'max' => 'Il campo deve essere minimo di :values',
    ];

    public function store() {

        $this->validate();

        Auth::user()->update([

            'image' => $this->image->store('public/users'),
            'city'=> $this->city,
            'bio' => $this->bio,
            'age' => $this->age,
            'province' => $this->province,
        ]);

        session()->flash('message', 'Modifiche avvenute con successo');
        $this->redirectRoute('auth.profile');
    }

    public function mount() {
        $this->city = Auth::user()->city;
        $this->bio = Auth::user()->bio;
        $this->age = Auth::user()->age;
        $this->province = Auth::user()->province;
    }
    public function render()
    {
        return view('livewire.profile-create-form');
    }
}
