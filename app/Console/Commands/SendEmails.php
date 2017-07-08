<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App/User;
use App/DripEmailer;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send drip emails to a user';
    /**
     * The Email application service dependecy variable.
     *
     * @var DripEmailer
     */
     protected $drip;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DripEmailer $drip)
    {
        parent::__construct();
        $this->drip = $drip;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->drip->send(User::find($this->argument('user')));
    }
}
