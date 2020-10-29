<?php

namespace App\Support\Console;

use App\Support\Console\Parser;
use App\Support\Console\ProgressBar;
use WP_CLI;
use function WP_CLI\Utils\format_items as wpcli_format_items;

abstract class Command
{
    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = '';

    /**
     * The command name.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * The command synopsis.
     *
     * @var array
     */
    protected $synopsis = [];

    /**
     * The allowed arguments.
     *
     * @var array
     */
    protected $allowedArguments = [];

    /**
     * The console arguments.
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The console options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * Register the command.
     */
    public function __construct()
    {
        $this->parseSignature();

        $this->register();
    }

    /**
     * Register the WP_CLI command.
     */
    protected function register()
    {
        WP_CLI::add_command($this->name, $this, $this->synopsis);
    }

    /**
     * Parse the signature into the command name arguments, options and synopsis.
     *
     * @return void
     */
    protected function parseSignature(): void
    {
        [$name, $arguments, $options] = Parser::parse($this->signature);

        $this->name = $name;

        $this->allowedArguments = $arguments;

        $this->synopsis = [
            'shortdesc' => $this->description,
            'synopsis'  => array_merge($arguments, $options),
        ];
    }

    /**
     * Set up the command arguments and options.
     *
     * @param array $args    The console arguments.
     * @param array $options The console options and flags.
     *
     * @return void
     */
    public function __invoke(array $args, array $options): void
    {
        $this->arguments = $this->parseArguments($args);

        $this->options = $options;

        $this->handle();
    }

    /**
     * Handle the command call.
     *
     * @return void
     */
    abstract protected function handle(): void;

    /**
     * Parse the arguments into a keyed array.
     *
     * @param array $args The arguments to parse.
     *
     * @return array
     */
    protected function parseArguments(array $args): array
    {
        $arguments = [];

        foreach ($this->allowedArguments as $index => $argument) {
            $arguments[$argument['name']] = $args[$index];
        }
        return $arguments;
    }

    /**
     * Get all the arguments.
     *
     * @return array
     */
    protected function arguments(): array
    {
        return $this->arguments;
    }

    /**
     * Get a named argument.
     *
     * @param string $key The argument name.
     *
     * @return mixed
     */
    protected function argument(string $key)
    {
        return $this->arguments[$key] ?? null;
    }

    /**
     * Get all the options.
     *
     * @return array
     */
    protected function options(): array
    {
        return $this->options;
    }

    /**
     * Get an option.
     *
     * @param string $key The option name.
     *
     * @return mixed
     */
    protected function option(string $key)
    {
        return $this->options[$key] ?? null;
    }

    /**
     * Send an success to the console.
     *
     * @var string $message The message to output to the console.
     *
     * @return \App\Support\Console\Command
     */
    protected function success(string $message): Command
    {
        WP_CLI::success($message);

        return $this;
    }

    /**
     * Send a warning to the console.
     *
     * @var string $message The message to output to the console.
     *
     * @return \App\Support\Console\Command
     */
    protected function warning(string $message): Command
    {
        WP_CLI::warning($message);

        return $this;
    }

    /**
     * Send an error to the console.
     *
     * @var string $message The message to output to the console.
     *
     * @return void
     */
    protected function error(string $message): void
    {
        WP_CLI::error($message);
    }

    /**
     * Send an message to the console.
     *
     * @var string $message The message to output to the console.
     *
     * @return \App\Support\Console\Command
     */
    protected function line(string $message): Command
    {
        WP_CLI::log(WP_CLI::colorize($message . '%n'));

        return $this;
    }

    /**
     * Output a table
     *
     * @param array $headers
     * @param array $data
     *
     * @return \App\Support\Console\Command
     */
    protected function table(array $headers, array $data): Command
    {
        $this->line(wpcli_format_items('table', $data, $headers));

        return $this;
    }

    /**
     * Create a new progress bar
     *
     * @param integer $count
     *
     * @return \App\Support\Console\ProgressBar
     */
    public function createProgressBar(int $count): ProgressBar
    {
        return new ProgressBar($count);
    }

    /**
     * Ask the user to confirm an action.
     *
     * @param string $message The message to post to the console.
     * @param bool   $skip    Should the confirm be skipped?
     *
     * @return bool
     */
    protected function confirm(string $question, bool $skip = false): bool
    {
        if (!$skip) {
            $answer = $this->ask($question . ' [y/n]');

            return $answer  == 'y' || $answer === 'yes';
        }
        return true;
    }

    /**
     * Prompt the user with a question and return their answer.
     *
     * @param string $question The question to ask the user.
     *
     * @return string
     */
    protected function ask(string $question)
    {
        fwrite(STDOUT, $question . ' ');

        return trim(fgets(STDIN));
    }

    /**
     * Terminate the console with an optional line output.
     *
     * @param string|null $message The message to output.
     *
     * @return void
     */
    protected function terminate(?string $message = null): void
    {
        if ($message) {
            $this->line($message);
        }
        die;
    }

    /**
     * Call a command
     *
     * @param string $command The command to run.
     *
     * @return void
     */
    protected function call(string $command): void
    {
        WP_CLI::runcommand($command);
    }
}
