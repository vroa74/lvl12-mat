<div class="relative">
    <button 
        wire:click="toggleTheme" 
        onclick="toggleThemeManually()"
        class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        title="{{ $theme === 'light' ? 'Cambiar a modo oscuro' : 'Cambiar a modo claro' }}"
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
// Función para cambiar tema manualmente
function toggleThemeManually() {
    const html = document.documentElement;
    const isDark = html.classList.contains('dark');
    
    console.log('Estado actual del tema:', isDark ? 'dark' : 'light');
    
    if (isDark) {
        html.classList.remove('dark');
        console.log('Cambiando a tema claro');
    } else {
        html.classList.add('dark');
        console.log('Cambiando a tema oscuro');
    }
    
    console.log('Clases actuales del HTML:', html.className);
}

// Escuchar eventos de Livewire
document.addEventListener('livewire:init', function () {
    Livewire.on('themeChanged', function (theme) {
        console.log('Evento Livewire recibido - Nuevo tema:', theme);
        
        const html = document.documentElement;
        
        if (theme === 'dark') {
            html.classList.add('dark');
            console.log('Aplicando tema oscuro desde Livewire');
        } else {
            html.classList.remove('dark');
            console.log('Aplicando tema claro desde Livewire');
        }
        
        console.log('Clases finales del HTML:', html.className);
    });
});
</script>
