<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\Notifications;
use App\Notifications\Reservation;

class EmailReservationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:notify
    {count : The number of bookings to retrieve}
    {--dry-run= : to have this command do no actuale work}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notifies reservation holders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Notifications $notify)
    {
        $this->notify = $notify;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $answer = $this->ask('what service to use?');
        // $answer = $this->anticipate('what service to use?', ['sms', 'email']);
        $answer = $this->choice('what service to use?', ['sms', 'email']);
        var_dump($answer);

        $count = $this->argument('count');
        if (!is_numeric($count)) {
            $this->alert('count must be a number');
            return 1;
        }
        $bookings = \App\Booking::with(['room.roomType', 'users'])->limit($count)->get();
        $this->info(sprintf('number of bookings to alert for is: %d', $bookings->count()));

        $bar = $this->output->createProgressBar($bookings->count());
        $bar->start();
        foreach ($bookings as $booking) {
            $this->proccessBookings($booking);
            $bar->advance();
        }

        $bar->finish();
        $this->comment('Command completed');
    }

    public function proccessBookings($booking)
    {
        if($this->option('dry-run')){
            $this->info('woud proccess bookings');
        }else{
            $booking->notify(new Reservation('dan dan'));
        }
    }
}
