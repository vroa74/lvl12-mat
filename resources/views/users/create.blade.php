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
                           class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 inline-flex items-center">
                            <i class="ri-arrow-left-line mr-2"></i>
                            Volver
                        </a>
                    </div>

                    <!-- Formulario -->
                    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nombre Completo
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Ingrese el nombre completo"
                                       required>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Email
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="usuario@ejemplo.com"
                                       required>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- RFC -->
                            <div>
                                <label for="rfc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    RFC
                                </label>
                                <input type="text" 
                                       id="rfc" 
                                       name="rfc" 
                                       value="{{ old('rfc') }}"
                                       maxlength="13"
                                       placeholder="RFC (10-13 caracteres)"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required>
                                @error('rfc')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- CURP -->
                            <div>
                                <label for="curp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    CURP
                                </label>
                                <input type="text" 
                                       id="curp" 
                                       name="curp" 
                                       value="{{ old('curp') }}"
                                       maxlength="20"
                                       placeholder="CURP (10-20 caracteres)"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required>
                                @error('curp')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sexo -->
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                    Sexo
                                </label>
                                <div class="flex bg-gray-100 dark:bg-gray-700 rounded-lg p-1">
                                    <div class="flex-1">
                                        <input type="radio" 
                                               id="sex_masculino" 
                                               name="sex" 
                                               value="masculino" 
                                               {{ old('sex') == 'masculino' ? 'checked' : '' }}
                                               class="sr-only peer">
                                        <label for="sex_masculino" 
                                               class="flex items-center justify-center w-full p-2 text-sm font-medium text-gray-500 dark:text-gray-400 rounded-md cursor-pointer peer-checked:text-blue-600 peer-checked:bg-white dark:peer-checked:bg-gray-600 dark:peer-checked:text-blue-400 hover:text-gray-600 dark:hover:text-gray-300 transition-all duration-200">
                                            <input type="radio" class="w-4 h-4 mr-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="flex-1">
                                        <input type="radio" 
                                               id="sex_femenino" 
                                               name="sex" 
                                               value="femenino" 
                                               {{ old('sex') == 'femenino' ? 'checked' : '' }}
                                               class="sr-only peer">
                                        <label for="sex_femenino" 
                                               class="flex items-center justify-center w-full p-2 text-sm font-medium text-gray-500 dark:text-gray-400 rounded-md cursor-pointer peer-checked:text-blue-600 peer-checked:bg-white dark:peer-checked:bg-gray-600 dark:peer-checked:text-blue-400 hover:text-gray-600 dark:hover:text-gray-300 transition-all duration-200">
                                            <input type="radio" class="w-4 h-4 mr-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            Femenino
                                        </label>
                                    </div>
                                </div>
                                @error('sex')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tema -->
                            <div>
                                <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tema
                                </label>
                                <select id="theme" 
                                        name="theme" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                    <option value="">Seleccione un tema</option>
                                    <option value="dark" {{ old('theme') == 'dark' ? 'selected' : '' }}>Oscuro</option>
                                    <option value="light" {{ old('theme') == 'light' ? 'selected' : '' }}>Claro</option>
                                </select>
                                @error('theme')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Estado -->
                            <div>
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Estado
                                </label>
                                <select id="status" 
                                        name="status" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('status')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Contraseña
                                </label>
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Mínimo 8 caracteres"
                                       required>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Confirmar Contraseña
                                </label>
                                <input type="password" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Confirme la contraseña"
                                       required>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('users.index') }}" 
                               class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Crear Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
