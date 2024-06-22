<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

#sup
<!https://www.etsy.com/listing/1740613299/the-treachery-of-images-canvas-wall-art?gpla=1&gao=1&&utm_source=google&utm_medium=cpc&utm_campaign=shopping_us_b-home_and_living-home_decor-wall_decor-wall_hangings-other&utm_custom1=_k_CjwKCAjw7NmzBhBLEiwAxrHQ-bUA2ZGPUfLTa9x2vl1vhUzh0ffqq0_DpgoC2lzotLk6lBFCYmcmSBoCySMQAvD_BwE_k_&utm_content=go_1843970812_75209275372_346398223084_pla-305562556206_c__1740613299_12768591&utm_custom2=1843970812&gad_source=1&gclid=CjwKCAjw7NmzBhBLEiwAxrHQ-bUA2ZGPUfLTa9x2vl1vhUzh0ffqq0_DpgoC2lzotLk6lBFCYmcmSBoCySMQAvD_BwE>
<html>
<body>

<h1>My First PHP Page</h1>

<?php
echo "what is it";
?>

</body>
</html>
