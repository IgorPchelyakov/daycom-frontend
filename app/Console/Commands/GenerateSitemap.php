<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genarate all links for sitemaps';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $rUrl = 'https://sside.daycom.com.ua/api/nn-sitemaps';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $baseUrl = 'https://daycom.com.ua/news';

        if ($response) {
            $data = json_decode($response, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                $sitemapIndex = 1;
                $counter = 0;

                foreach ($data as $link) {
                    $url = $link['url'] ?? '';
                    $updatedAt = isset($link['updatedAt']) ? Carbon::parse($link['updatedAt']) : Carbon::now();

                    $sitemap->add(
                        Url::create($url)
                            ->setPriority(1)
                            ->setChangeFrequency(0)
                            ->setLastModificationDate($updatedAt)
                            ->setUrl("$baseUrl/$url")
                    );

                    $counter++;

                    if ($counter === 1000) {
                        $fileName = public_path("sitemap/news-" . str_pad($sitemapIndex, 3, '0', STR_PAD_LEFT) . ".xml");
                        $sitemap->writeToFile($fileName);
                        $this->info("Файл news-{$sitemapIndex} успішно створено");

                        $sitemap = Sitemap::create();
                        $sitemapIndex++;
                        $counter = 0;
                    }
                }

                if ($counter > 0) {
                    $fileName = public_path("sitemap/news-" . str_pad($sitemapIndex, 3, '0', STR_PAD_LEFT) . ".xml");
                    $sitemap->writeToFile($fileName);
                    $this->info("Файл news-{$sitemapIndex} успішно створено");
                }

                $this->info('Створення sitemaps успішно завершено');
            } else {
                $this->error('Помилка при декодуванні JSON: ' . json_last_error_msg());
            }
        } else {
            $this->error('Помилка при отримані даних від API');
        }

        curl_close($ch);
    }
}
