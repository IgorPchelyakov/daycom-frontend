<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class NewsApiHelper
{
	public static function fetchDataFromApi($url)
	{
		$response = Http::get($url);
		return $response->json();
	}

	public static function fetchCityIsActive($url)
	{
		$response = Http::get($url);
		return $response->json();
	}

	public static function processActiveCityNewsData($data, $feed)
	{
		$categories = [
			'Головне сьогодні' => 10,
			'ТОП новини від Дейком' => 12,
			'Стрічка новин' => 46,
			'Заголовок газети 24 години' => 20,
		];

		$sections = [
			'Війна Росії проти України' => 5,
			'Суспільство' => 10,
			'Європа' => 10,
			'Китай' => 2,
			'Сполучені Штати' => 3,
			'Економіка' => 10,
			'Фінанси' => 10,
			'Технології' => 10,
			'Наука' => 4,
			'Культура' => 10,
			'Музика' => 10,
			'Кіно' => 10,
			'Спорт' => 4,
			'Політика' => 10,
			'Влада' => 10,
			'Північна Америка' => 10,
			'Південна Америка' => 10,
			'Близький схід' => 5,
			'Тихоокеанський регіон' => 5,
			'Африка' => 5,
			'Думка' => 10,
			'Аналітика' => 10,
		];

		$filteredCategories = [];
		$filteredSections = [];
		$filteredEconomicAndFinance = [];
		$filteredCultureMusicMovies = [];
		$combinedData = [];

		$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
		$currentDate->modify('+3 hour');

		$filteredNewsToday = array_filter($data, function ($item) use ($currentDate, $feed) {
			$itemDate = new \DateTime($item['publishedAt']);
			return $itemDate->format('Y-m-d') === $currentDate->format('Y-m-d')
				&& $itemDate < $currentDate
				&& $item['feed'] !== $feed;
		});

		$filteredNewsToday = array_slice($filteredNewsToday, 0, 20);

		$filteredFeed = array_filter($data, function ($item) use ($currentDate, $feed) {
			$itemDate = new \DateTime($item['publishedAt']);
			return $itemDate <= $currentDate && $item['feed'] === $feed;
		});

		$filteredFeed = array_slice($filteredFeed, 0, 20);

		foreach ($categories as $category => $count) {
			$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
				$itemDate = new \DateTime($item['publishedAt']);
				return $item['block'] === $category && $itemDate <= $currentDate;
			});

			$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
		}

		foreach ($sections as $section => $count) {
			$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate, $feed) {
				$itemDate = new \DateTime($item['publishedAt']);
				return $item['section'] === $section && $itemDate <= $currentDate && $item['feed'] !== $feed;
			});

			$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
		}

		$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

		usort($filteredEconomicAndFinance, function ($a, $b) {
			return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
		});

		$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 5);

		$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

		usort($filteredCultureMusicMovies, function ($a, $b) {
			return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
		});

		$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

		foreach ($categories as $category => $count) {
			foreach ($filteredCategories[$category] as $item) {
				$combinedData[$category][] = $item;
			}
		}

		foreach ($sections as $section => $count) {
			foreach ($filteredSections[$section] as $item) {
				$combinedData[$section][] = $item;
			}
		}

		$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
		$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;

		return [
			'filteredFeed' => $filteredFeed,
			'filteredNewsToday' => $filteredNewsToday,
			'newsData' => $combinedData
		];
	}
	public static function processCityNewsData($data)
	{
		$categories = [
			'Головне сьогодні' => 10,
			'Заголовок газети 24 години' => 20,
			'ТОП новини від Дейком' => 12,
			'Стрічка новин' => 46,
		];

		$sections = [
			'Війна Росії проти України' => 5,
			'Суспільство' => 10,
			'Європа' => 10,
			'Китай' => 2,
			'Сполучені Штати' => 3,
			'Економіка' => 10,
			'Фінанси' => 10,
			'Технології' => 10,
			'Наука' => 4,
			'Культура' => 10,
			'Музика' => 10,
			'Кіно' => 10,
			'Спорт' => 4,
			'Політика' => 10,
			'Влада' => 10,
			'Північна Америка' => 10,
			'Південна Америка' => 10,
			'Близький схід' => 5,
			'Тихоокеанський регіон' => 5,
			'Африка' => 5,
			'Думка' => 10,
			'Аналітика' => 10,
		];

		$filteredCategories = [];
		$filteredSections = [];
		$filteredEconomicAndFinance = [];
		$filteredCultureMusicMovies = [];
		$filteredPoliticsAndPower = [];
		$filteredNorthAndSouthAmerica = [];
		$combinedData = [];

		$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
		$currentDate->modify('+3 hour');

		foreach ($categories as $category => $count) {
			$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
				$itemDate = new \DateTime($item['publishedAt']);
				return $item['block'] === $category && $itemDate <= $currentDate;
			});

			$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
		}

		foreach ($sections as $section => $count) {
			$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
				$itemDate = new \DateTime($item['publishedAt']);
				return $item['section'] === $section && $itemDate <= $currentDate;
			});

			$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
		}

		$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

		usort($filteredEconomicAndFinance, function ($a, $b) {
			return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
		});

		$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

		$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

		usort($filteredCultureMusicMovies, function ($a, $b) {
			return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
		});

		$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

		$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

		usort($filteredPoliticsAndPower, function ($a, $b) {
			return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
		});

		$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

		$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

		usort($filteredNorthAndSouthAmerica, function ($a, $b) {
			return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
		});

		$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

		foreach ($categories as $category => $count) {
			foreach ($filteredCategories[$category] as $item) {
				$combinedData[$category][] = $item;
			}
		}

		foreach ($sections as $section => $count) {
			foreach ($filteredSections[$section] as $item) {
				$combinedData[$section][] = $item;
			}
		}

		$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
		$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
		$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
		$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

		return $combinedData;
	}
}