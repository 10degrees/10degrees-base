<?php

namespace App\Console\Commands;

use App\Support\Console\Command;

/**
 * Create a wp-cli command
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Demo extends Command
{
    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'demo { argument? : A positional argument }
                                 { --option=default : An option }
                                 { --flag : A boolean option }';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Demo the command capabilities';

    /**
     * Handle the command call.
     *
     * @return void
     */
    protected function handle(): void
    {
        $this->line('outputs a line')

            ->line('Most methods can be chained together')

            ->newLine(3)

            ->warning('This is a warning')

            ->success('This is a success')

            ->line('There is also error which kills the command')

            ->line($this->argument('argument') ?? 'no argument')

            ->line($this->option('option'))

            ->line($this->option('flag') ? 'flagged' : 'not flagged')

            ->table(
                ['Col A', 'Col B', 'Col C'],
                [
                    [
                        'Col A' => 'Cell A1',
                        'Col B' => 'Cell B1',
                        'Col C' => 'Cell C1',
                    ],
                    [
                        'Col A' => 'Cell A2',
                        'Col B' => 'Cell B2',
                        'Col C' => 'Cell C2',
                    ],
                    [
                        'Col A' => 'Cell A3',
                        'Col B' => 'Cell B3',
                        'Col C' => 'Cell C3',
                    ],
                ]
            );

        $bar = $this->createProgressBar(3)
            ->setMessage('Progress bar...')
            ->start();

        for ($i = 0; $i < 3; $i++) {
            sleep(1);
            $bar->advance();
        }
        $bar->finish();

        $confirmed = $this->confirm('Confirm choices:');

        $this->line($confirmed ? 'confirmed' : 'not confirmed');

        $asked = $this->ask('Ask questions?');

        $this->line($asked);

        $this->call('cli version');

        $this->line('...and finally...')->newLine(1);

        sleep(1);

        $this->terminate('Terminate the command');

        $this->error('This will kill the command');
    }
}
