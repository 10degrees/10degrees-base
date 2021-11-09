<?php

namespace App\Support\Console\Commands;

use App\Support\Console\Command;

class SetEnvironment extends Command
{
    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'set-env { type : The environment type [local, development, staging, production] }';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Set the environment';

    /**
     * Handle the command call.
     *
     * @return void
     */
    protected function handle(): void
    {
        $env = $this->argument('type');

        if ($this->validEnvironmentType($env)) {
            $this->call('config set WP_ENVIRONMENT_TYPE ' . $env);
            return;
        }

        $this->error("Valid environment types are: [local, development, staging, production]");
    }

    /**
     * Validate the environment type
     *
     * @param string $env The environment type
     *
     * @return bool
     */
    protected function validEnvironmentType(string $env)
    {
        return in_array($env, ['local', 'development', 'staging', 'production']);
    }
}
