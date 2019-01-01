<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Laravel\Dusk\Browser;
use Symfony\Component\DomCrawler\Crawler;

use Revolution\Salvager\Facades\Salvager;

class SalvagerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Salvager::browse(function (Browser $browser) use (&$crawler) {
            $crawler = $browser->visit('https://www.google.com/')
                               ->keys('input[name=q]', 'Laravel', '{enter}')
                               ->screenshot('google-laravel')
                               ->crawler();
        });

        /**
         * @var Crawler $crawler
         */
        $crawler->filter('.r')->each(function (Crawler $node) {
            dump($node->filter('h3')->text());
            dump($node->filter('a')->attr('href'));
        });
    }
}
