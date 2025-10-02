<div class="relative">
    <button 
        wire:click="toggleTheme" 
        onclick="handleThemeToggle(this)"
        class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        title="{{ $theme === 'light' ? 'Cambiar a modo oscuro' : 'Cambiar a modo claro' }}"
        data-current-theme="{{ $theme }}"
    >
        @if($theme === 'light')
            <!-- Icono de sol para modo claro -->
            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
            </svg>
        @else
            <!-- Icono de luna para modo oscuro -->
            <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
        @endif
    </button>
</div>

<script>
// Función para manejar el toggle directamente
function handleThemeToggle(button) {
    const currentTheme = button.getAttribute('data-current-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    
    console.log('Toggle directo - Cambiando de', currentTheme, 'a', newTheme);
    
    // Aplicar cambio inmediatamente
    if (window.changeTheme) {
        window.changeTheme(newTheme);
    }
    
    // Actualizar el atributo del botón
    button.setAttribute('data-current-theme', newTheme);
}

// Escuchar eventos de Livewire
document.addEventListener('livewire:init', function () {
    Livewire.on('themeChanged', function (theme) {
        console.log('Evento Livewire recibido:', theme);
        if (window.changeTheme) {
            window.changeTheme(theme);
        }
    });
});

// También escuchar eventos de Livewire v3
document.addEventListener('livewire:load', function () {
    Livewire.on('themeChanged', function (theme) {
        console.log('Evento Livewire v3 recibido:', theme);
        if (window.changeTheme) {
            window.changeTheme(theme);
        }
    });
});
</script>
