<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Usuario') }}
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

                    <!-- Formulario -->
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Nombre Completo
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                       required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Email
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                       required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- RFC -->
                            <div>
                                <label for="rfc" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    RFC
                                </label>
                                <input type="text" 
                                       id="rfc" 
                                       name="rfc" 
                                       value="{{ old('rfc') }}"
                                       maxlength="13"
                                       placeholder="RFC (10-13 caracteres)"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                       required>
                                @error('rfc')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- CURP -->
                            <div>
                                <label for="curp" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    CURP
                                </label>
                                <input type="text" 
                                       id="curp" 
                                       name="curp" 
                                       value="{{ old('curp') }}"
                                       maxlength="20"
                                       placeholder="CURP (10-20 caracteres)"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                       required>
                                @error('curp')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sexo -->
                            <div>
                                <label for="sex" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Sexo
                                </label>
                                <select id="sex" 
                                        name="sex" 
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="masculino" {{ old('sex') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('sex') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                                @error('sex')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tema -->
                            <div>
                                <label for="theme" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Tema
                                </label>
                                <select id="theme" 
                                        name="theme" 
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                    <option value="">Seleccione un tema</option>
                                    <option value="dark" {{ old('theme') == 'dark' ? 'selected' : '' }}>Oscuro</option>
                                    <option value="light" {{ old('theme') == 'light' ? 'selected' : '' }}>Claro</option>
                                </select>
                                @error('theme')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Estado -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Estado
                                </label>
                                <select id="status" 
                                        name="status" 
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Contraseña
                                </label>
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                       required>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Confirmar Contraseña
                                </label>
                                <input type="password" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                                       required>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('users.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Crear Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
