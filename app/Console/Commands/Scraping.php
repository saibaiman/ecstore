<?php

namespace App\Console\Commands;

//use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Console\Command;
use Goutte\Client;
use Goutte;

class Scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
		$client = $this->getLoggedInClient();
		$home = $client->request('GET', 'https://mixi.jp/home.pl');
		echo 'スクリプトを実行します。' . PHP_EOL;
		$home->filter('a')->each(function ($element) {
			echo 'content text:' . $element->attr('href') . "\n";
		});
		echo 'スクリプトを終了します。' . PHP_EOL;
//		foreach ($a_href as $url) {
//			echo $url . "\n";
//		}
	}

	private function getLoggedInClient() {
		$client = new Client();
		$login_page = $client->request('GET', 'https://mixi.jp/home.pl');
		sleep(1);
		$login_form = $login_page->filter('form')->form();
		$login_form['email'] = 'nagainozomi.19350511@icloud.com';
		$login_form['password'] = 'saibaiman';
		$client->submit($login_form);
		return $client;
	}

		/*$goutte = Goutte::request('GET', 'https://zabuu.site/user/detail/2935683650');

		$name = $goutte->filter('div > h1')->text();

		$answered_count = $goutte->filter('div.answered > p.answered_count')->text();
		$favorite_count = $goutte->filter('div.answered > p.favorite_count')->text();
		$url = array();
		$url = $goutte->filter('div.ans_before > a')->extract('href');

		echo $name . "\n";
		echo $answered_count . "\n";
		echo $favorite_count . "\n";
		echo 'スクリプトを実行します' . PHP_EOL;
		foreach ($a_href as $url) {
			echo $url . "\n";
		}
		echo 'スクリプトを終了します'. PHP_EOL;
		 */

}
