<?php

namespace Solutionplus\Payable\Console\Commands;

use Illuminate\Console\Command;

class PaymentSetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payable:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install and Publish Solutionplus Payable Package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--tag' => 'controllers',
            '--force' => true,
        ]);

        $this->info('Package installed and controller published!');

        return Command::SUCCESS;
    }
}
