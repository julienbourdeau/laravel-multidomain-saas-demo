<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\Team;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class EnsureCurrentTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            $id = $request->user()->currentTeam->id;

            Post::addGlobalScope(function($builder) use ($id) {
                $builder->where('team_id', $id);
            });
        }

        if ($team = Team::where('domain', $request->route()->parameter('blog'))->first()) {
            $id = $team->id;

            Post::addGlobalScope(function($builder) use ($id) {
                $builder->where('team_id', $id);
            });

            URL::defaults([
                'blog' => $team->domain,
            ]);
        }

        return $next($request);
    }
}
