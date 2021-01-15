<?php

namespace App\Http\Livewire\Teams;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\UpdatesTeamNames;
use Livewire\Component;

class UpdateTeamDomainForm extends Component
{
    /**
     * The team instance.
     *
     * @var mixed
     */
    public $team;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Mount the component.
     *
     * @param  mixed  $team
     * @return void
     */
    public function mount($team)
    {
        $this->team = $team;

        $this->state = ['domain' => $team->domain];
    }

    public function updateTeamDomain()
    {
        $this->resetErrorBag();

        Gate::forUser($this->user)->authorize('update', $this->team);

        Validator::make($this->state, [
            'domain' => ['string', 'max:255'],
        ])->validateWithBag('updateTeamDomain');

        $this->team->forceFill([
            'domain' => $this->state['domain'],
        ])->save();

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('teams.update-team-domain-form');
    }
}
