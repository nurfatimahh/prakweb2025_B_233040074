<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LoginForm extends Component
{
    /**
     * Whether to show the 'remember me' checkbox
     *
     * @var bool
     */
    public $remember = true;

    public function __construct($remember = true)
    {
        $this->remember = $remember;
    }

    public function render()
    {
        return view('components.login-form');
    }
}
