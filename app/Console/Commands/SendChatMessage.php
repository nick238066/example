<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SendChatMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:broadcastMessage {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send broadcast message.';

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
        $message = $this->argument('message');
        // event(new \App\Events\NewTrade($message));
        $user = User::find(1);
        event(new \App\Events\UserMessage($user, $message));
    }
}
