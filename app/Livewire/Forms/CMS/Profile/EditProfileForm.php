<?php

namespace App\Livewire\Forms\CMS\Profile;

use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;

class EditProfileForm extends Form
{
    public $name;

    public $username;

    public $email;

    public $phone;

    public $image;

    public function set(): void
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|unique:users,name,'.Auth::user()->id,
            'username' => 'required|string|max:50|unique:users,username,'.Auth::user()->id,
            'email' => 'required|string|max:50|unique:users,email,'.Auth::user()->id,
            'phone' => 'required|string|max:20|unique:users,phone,'.Auth::user()->id,
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(): void
    {
        $data = $this->validate();

        (new UserService)->editProfile(Auth::user(), $data);
    }
}
