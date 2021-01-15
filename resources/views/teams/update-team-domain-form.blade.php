<x-jet-form-section submit="updateTeamDomain">
    <x-slot name="title">
        {{ __('Team Domain') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The blog domain') }}
    </x-slot>

    <x-slot name="form">

        <!-- Team Domain -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="domain" value="{{ __('Team Domain') }}" />

            <x-jet-input id="domain"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model.defer="state.domain"
                        :disabled="! Gate::check('update', $team)" />

            <x-jet-input-error for="domain" class="mt-2" />
        </div>
    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    @endif
</x-jet-form-section>
