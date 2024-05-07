<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class NewsController extends Controller
{
	public function Home()
	{
		$metaData = [
			'title' => '',
			'description' => '',
			'site' => '',
			'url' => 'https://daycom.com.ua/',
			'keywords' => '',
		];

		$city = [
			'name' => '',
			'name_link' => '',
			'main_link' => '.index',
			'news_line' => 'news.line',
			'news_link' => '.news',
		];

		$url = env("SERVER_API_URL") . '//with-nn';
		$cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
		$data = NewsApiHelper::fetchDataFromApi($url);
		$cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

		$isActive = $cityIsActive['city']['isActive'];

		if ($isActive === true) {
			$processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
			return view(
				'city_active_home',
				[
					'data' => $processedData['newsData'],
					'newsToday' => $processedData['filteredNewsToday'],
					'feed' => $processedData['filteredFeed'],
					'metaData' => $metaData,
					'city' => $city
				]
			);
		} else {
			$processedData = NewsApiHelper::processCityNewsData($data);
			return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
		}
	}
	public function Line()
	{

		$url = 'https://sside.daycom.com.ua/api//with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
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
				$currentDate->modify('+2 hour');

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

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function News($url)
	{
		$rUrl = 'https://sside.daycom.com.ua/api//news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
}
