<section class="space-y-6">
    <header>
        <h2 class="text-title font-medium text-blue">
            {{ __('Delete Account') }}
        </h2>

        <div class="flex justify-between items-center">
            <p class="mt-1 text-sm text-white">
                Once your account is deleted, <span class="text-red-600">all of its resources and data will be permanently deleted. </span> This action cannot be undone.
            </p>
            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >{{ __('Delete Account') }}</x-danger-button>
        </div>
    </header>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-title font-medium text-midnight">
                {{ __('Are you sure?') }}
            </h2>

            <p class="mt-1 text-sm text-midnight">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 shadow-md"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
