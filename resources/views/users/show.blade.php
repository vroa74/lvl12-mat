<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Botón para volver -->
                    <div class="mb-6">
                        <a href="{{ route('users.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                            <i class="ri-arrow-left-line mr-2"></i>
                            Volver
                        </a>
                    </div>

                    <!-- Información del usuario -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Información Personal</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nombre Completo</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $user->email }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">RFC</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $user->rfc }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">CURP</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $user->curp }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Sexo</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ ucfirst($user->sex) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Configuración</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Tema</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $user->theme === 'dark' ? 'bg-gray-800 text-white' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $user->theme === 'dark' ? 'Oscuro' : 'Claro' }}
                                        </span>
                                    </p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estado</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $user->status ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                            {{ $user->status ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Registro</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $user->created_at->format('d/m/Y H:i:s') }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Última Actualización</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Foto de perfil si existe -->
                    @if($user->profile_photo_path)
                        <div class="mt-6 bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Foto de Perfil</h3>
                            <div class="flex items-center space-x-4">
                                <img src="{{ $user->profile_photo_url }}" 
                                     alt="{{ $user->name }}" 
                                     class="h-20 w-20 rounded-full object-cover">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Archivo: {{ $user->profile_photo_path }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Botones de acción -->
                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('users.edit', $user) }}" 
                           class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                            <i class="ri-edit-line mr-2"></i>
                            Editar Usuario
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
