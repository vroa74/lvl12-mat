<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover" style="display: block;">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <img :src="photoPreview" alt="Preview" class="rounded-full h-20 w-20 object-cover">
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- RFC -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="rfc" value="{{ __('RFC') }}" />
            <x-input id="rfc" type="text" class="mt-1 block w-full" wire:model="state.rfc" required maxlength="13" placeholder="RFC (10-13 caracteres)" />
            <x-input-error for="rfc" class="mt-2" />
        </div>

        <!-- CURP -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="curp" value="{{ __('CURP') }}" />
            <x-input id="curp" type="text" class="mt-1 block w-full" wire:model="state.curp" required maxlength="20" placeholder="CURP (10-20 caracteres)" />
            <x-input-error for="curp" class="mt-2" />
        </div>

        <!-- Sexo -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="sex" value="{{ __('Sexo') }}" />
            <select id="sex" wire:model="state.sex" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                <option value="">{{ __('Seleccione una opción') }}</option>
                <option value="masculino">{{ __('Masculino') }}</option>
                <option value="femenino">{{ __('Femenino') }}</option>
            </select>
            <x-input-error for="sex" class="mt-2" />
        </div>

        <!-- Theme -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="theme" value="{{ __('Tema') }}" />
            <select id="theme" wire:model="state.theme" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                <option value="">{{ __('Seleccione un tema') }}</option>
                <option value="dark">{{ __('Oscuro') }}</option>
                <option value="light">{{ __('Claro') }}</option>
            </select>
            <x-input-error for="theme" class="mt-2" />
        </div>

        <!-- Status -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="status" value="{{ __('Estado') }}" />
            <select id="status" wire:model="state.status" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                <option value="0">{{ __('Inactivo') }}</option>
                <option value="1">{{ __('Activo') }}</option>
            </select>
            <x-input-error for="status" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
