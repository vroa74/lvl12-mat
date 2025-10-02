<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThemeToggle extends Component
{
    public $theme;

    public function mount()
    {
        $user = Auth::user();
        $this->theme = $user->theme ?? 'light';
    }

    public function toggleTheme()
    {
        // Cambiar tema
        $this->theme = $this->theme === 'light' ? 'dark' : 'light';
        
        // Guardar en DB
        $user = Auth::user();
        if ($user) {
            $user->theme = $this->theme;
            $user->save();
        }

        // Forzar actualización de la vista
        $this->dispatch('themeChanged', $this->theme);
        
        // También ejecutar JavaScript directamente
        $this->js("window.changeTheme && window.changeTheme('{$this->theme}')");
        
        // Forzar re-renderizado del componente
        $this->render();
    }

    public function render()
    {
        return view('livewire.theme-toggle');
    }
}
