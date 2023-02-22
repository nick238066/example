<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BroadcastLotteryMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendBroadcastLotteryMessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '發送訊息';

    protected $decimal;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->decimal = 2;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // php artisan command:sendBroadcastLotteryMessage
        while (1) {
            for ($i = 5; $i > 0; $i--) {
                $waitMessage = "遊戲開始倒數: {$i}秒";
                $this->line($waitMessage);
                broadcast(new \App\Events\NewTrade($waitMessage));
                sleep(1);
            }
            $rate = $this->randomFloat(1, 2);
            $num = bcadd(0, ($rate * pow(10, $this->decimal)));
            $runNum = ($num - 100);
            for ($i = 0; $i <= $runNum; $i++) {
                $nowRate = (100 + $i) / pow(10, $this->decimal);
                $this->line("print now rate: " . $nowRate);
                broadcast(new \App\Events\NewTrade($nowRate));
                usleep($this->m_sleep(250)); // 1秒 = 1000毫秒
            }
            $this->info("Rate: " . ($rate) . "\n");

            // 開獎後等待時間進入下一局
            usleep($this->m_sleep(2 * 1000)); // 1秒 = 1000毫秒
        }
    }

    function randomFloat($min = 1, $max = 10)
    {
        $num = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        return sprintf("%." . $this->decimal . "f", $num);
    }

    function m_sleep($milliseconds) {
        return usleep($milliseconds * 1000); //Microseconds->milliseconds
    }
}
