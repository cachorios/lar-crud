<?php

namespace Cachorios\CrudLar\Console;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use RuntimeException;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crudlar:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install CrudLar';

    public function handle()
    {
        $this->info('Installing CrudLar by Lar...');

        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/livewire/resources/views/components', resource_path('views/components'));
    }


    /**
     * Run the given commands.
     *
     * @param  array  $commands
     * @return void
     */
//    protected function runCommands($commands)
//    {
//        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);
//
//        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
//            try {
//                $process->setTty(true);
//            } catch (RuntimeException $e) {
//                $this->output->writeln('  <bg=yellow;fg=black> WARN </> '.$e->getMessage().PHP_EOL);
//            }
//        }
//
//        $process->run(function ($type, $line) {
//            $this->output->write('    '.$line);
//        });
//    }





}