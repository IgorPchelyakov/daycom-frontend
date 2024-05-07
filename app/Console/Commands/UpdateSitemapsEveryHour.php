<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class UpdateSitemapsEveryHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update sitemaps every hour';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rUrl = 'https://sside.daycom.com.ua/api/nn-update-sitemaps';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $records = json_decode($response, true);
            $recordsToAdd = array_filter($records, function ($record) {
                return Carbon::parse($record['updatedAt']) >= Carbon::now()->subHour();
            });

            $sitemapIndex = 1;
            $fileName = public_path("sitemap/news-" . str_pad($sitemapIndex, 3, '0', STR_PAD_LEFT) . ".xml");

            while (file_exists($fileName)) {
                $sitemapContent = file_get_contents($fileName);
                $xml = simplexml_load_string($sitemapContent);
                $count = count($xml->children());

                if ($count >= 1000) {
                    $sitemapIndex++;
                    $fileName = public_path("sitemap/news-" . str_pad($sitemapIndex, 3, '0', STR_PAD_LEFT) . ".xml");
                } else {
                    break;
                }
            }

            if (file_exists($fileName)) {
                $sitemapContent = file_get_contents($fileName);
                $xml = simplexml_load_string($sitemapContent);

                foreach ($recordsToAdd as $record) {
                    $url = $record['url'] ?? '';
                    $updatedAt = isset($record['updatedAt']) ? Carbon::parse($record['updatedAt'])->toAtomString() : Carbon::now()->toAtomString();

                    $newUrl = $xml->addChild('url');
                    $newUrl->addChild('loc', $url);
                    $newUrl->addChild('lastmod', $updatedAt);
                    // ... добавьте другие теги, если необходимо
                }

                file_put_contents($fileName, $xml->asXML());
            } else {
                // создать новый файл и добавить записи
            }
        }
        // if ($response) {
        //     $recordsToAdd = json_decode($response, true);

        //     $sitemapIndex = 1;
        //     $fileName = public_path("sitemap/news-" . str_pad($sitemapIndex, 3, '0', STR_PAD_LEFT) . ".xml");

        //     while (file_exists($fileName)) {
        //         $xml = simplexml_load_file($fileName);

        //         if (count($xml->children()) >= 1000) {
        //             $sitemapIndex++;
        //             $fileName = public_path("sitemap/news-" . str_pad($sitemapIndex, 3, '0', STR_PAD_LEFT) . ".xml");
        //         } else {
        //             break;
        //         }
        //     }

        //     if (!file_exists($fileName)) {
        //         $sitemap = Sitemap::create();
        //     } else {
        //         $sitemap = Sitemap::create();
        //         $sitemap->add(...);
        //     }

        //     foreach ($recordsToAdd as $record) {
        //         $url = $record['url'] ?? '';
        //         $updatedAt = isset($record['updatedAt']) ? Carbon::parse($record['updatedAt']) : Carbon::now();

        //         $sitemap->add(
        //             Url::create($url)
        //                 ->setLastModificationDate($updatedAt)
        //                 ->setPriority(1)
        //                 ->setChangeFrequency(0)
        //         );
        //     }

        //     $sitemap->writeToFile($fileName);
        //     $this->info("Sitemap файл успешно обновлен: {$fileName}");
        // } else {
        //     $this->error('Ошибка при получении данных от API');
        // }

        // $sitemapIndex = 1;
        // $fileName = public_path("sitemap/news-" . str_pad($sitemapIndex, 3, '0', STR_PAD_LEFT) . ".xml");

        // while (file_exists($fileName)) {
        //     $sitemapContent = file_get_contents($fileName);
        //     $xml = simplexml_load_string($sitemapContent);
        //     $count = count($xml->children());

        //     if ($count >= 1000) {
        //         $sitemapIndex++;
        //         $fileName = public_path("sitemap/news-" . str_pad($sitemapIndex, 3, '0', STR_PAD_LEFT) . ".xml");
        //     } else {
        //         break;
        //     }
        // }
        // $lastSitemapContent = file_get_contents($fileName);
        // $lastXml = simplexml_load_string($lastSitemapContent);
        // $totalCount = count($lastXml->url);

        // $this->info("Количество записей в последнем файле: {$totalCount}");

        curl_close($ch);
    }
}
