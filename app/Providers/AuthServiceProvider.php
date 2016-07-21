<?php

namespace App\Providers;

use App\Transacao;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $transacaos = Transacao::all()->lists('permissao', 'id')->toArray();

        if(isset($transacaos)) {
            foreach ($transacaos as $transacao) {
                $gate->define($transacao, function ($usuario) use ($transacao) {
                    return in_array($transacao, session('permissao'));
                });
            }
        }
    }
}
