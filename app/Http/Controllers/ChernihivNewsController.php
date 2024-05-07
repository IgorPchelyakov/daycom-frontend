<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class ChernihivNewsController extends Controller
{
	public function bahmachHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Бахмач, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бахмача, головні новини Бахмач, новини ТОП Бахмач, новини новини бізнесу Бахмач, стрічка новин Бахмач, Думки Бахмач, новини Бахмач сьогодні, останні новини сьогодні Бахмач, інформаційна агенція Бахмач, інформація Бахмач',
			'site' => 'Головні новини міста Бахмач, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/bahmach',
			'keywords' => 'Головний сайт Бахмача, головні новини Бахмач, новини ТОП Бахмач, новини новини бізнесу Бахмач, стрічка новин Бахмач, Думки Бахмач, новини Бахмач сьогодні, останні новини сьогодні Бахмач, інформаційна агенція Бахмач, інформація Бахмач',
		];

		$city = [
			'name' => 'Бахмач',
			'name_link' => 'bahmach',
			'main_link' => 'bahmach.index',
			'news_line' => 'news.line',
			'news_link' => 'bahmach.news',
		];

		$url = env("SERVER_API_URL") . '/bahmach/with-nn';
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
	public function chernihivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Чернігів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Чернігова, головні новини Чернігів, новини ТОП Чернігів, новини новини бізнесу Чернігів, стрічка новин Чернігів, Думки Чернігів, новини Чернігів сьогодні, останні новини сьогодні Чернігів, інформаційна агенція Чернігів, інформація Чернігів',
			'site' => 'Головні новини міста Чернігів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/chernihiv',
			'keywords' => 'Головний сайт Чернігова, головні новини Чернігів, новини ТОП Чернігів, новини новини бізнесу Чернігів, стрічка новин Чернігів, Думки Чернігів, новини Чернігів сьогодні, останні новини сьогодні Чернігів, інформаційна агенція Чернігів, інформація Чернігів',
		];

		$city = [
			'name' => 'Чернігів',
			'name_link' => 'chernihiv',
			'main_link' => 'chernihiv.index',
			'news_line' => 'news.line',
			'news_link' => 'chernihiv.news',
		];

		$url = env("SERVER_API_URL") . '/chernihiv/with-nn';
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
	public function nizhinHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Ніжин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ніжин, головні новини Ніжин, новини ТОП Ніжин, новини новини бізнесу Ніжин, стрічка новин Ніжин, Думки Ніжин, новини Ніжин сьогодні, останні новини сьогодні Ніжин, інформаційна агенція Ніжин, інформація Ніжин',
			'site' => 'Головні новини міста Ніжин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/nizhin',
			'keywords' => 'Головний сайт Ніжин, головні новини Ніжин, новини ТОП Ніжин, новини новини бізнесу Ніжин, стрічка новин Ніжин, Думки Ніжин, новини Ніжин сьогодні, останні новини сьогодні Ніжин, інформаційна агенція Ніжин, інформація Ніжин',
		];

		$city = [
			'name' => 'Ніжин',
			'name_link' => 'nizhin',
			'main_link' => 'nizhin.index',
			'news_line' => 'news.line',
			'news_link' => 'nizhin.news',
		];

		$url = env("SERVER_API_URL") . '/nizhin/with-nn';
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
	public function prylukiHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Бахмач, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бахмача, головні новини Бахмач, новини ТОП Бахмач, новини новини бізнесу Бахмач, стрічка новин Бахмач, Думки Бахмач, новини Бахмач сьогодні, останні новини сьогодні Бахмач, інформаційна агенція Бахмач, інформація Бахмач',
			'site' => 'Головні новини міста Бахмач, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pryluki',
			'keywords' => 'Головний сайт Бахмача, головні новини Бахмач, новини ТОП Бахмач, новини новини бізнесу Бахмач, стрічка новин Бахмач, Думки Бахмач, новини Бахмач сьогодні, останні новини сьогодні Бахмач, інформаційна агенція Бахмач, інформація Бахмач',
		];

		$city = [
			'name' => 'Бахмач',
			'name_link' => 'pryluki',
			'main_link' => 'pryluki.index',
			'news_line' => 'news.line',
			'news_link' => 'pryluki.news',
		];

		$url = env("SERVER_API_URL") . '/pryluki/with-nn';
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
}
