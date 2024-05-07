<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class KirovogradNewsController extends Controller
{
	public function kropyvnytskiyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Кропивницький, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Кропивницького, головні новини Кропивницький, новини ТОП Кропивницький, новини новини бізнесу Кропивницький, стрічка новин Кропивницький, Думки Кропивницький, новини Кропивницький сьогодні, останні новини сьогодні Кропивницький, інформаційна агенція Кропивницький, інформація Кропивницький',
			'site' => 'Головні новини міста Кропивницький, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kropyvnytskiy',
			'keywords' => 'Головний сайт Кропивницького, головні новини Кропивницький, новини ТОП Кропивницький, новини новини бізнесу Кропивницький, стрічка новин Кропивницький, Думки Кропивницький, новини Кропивницький сьогодні, останні новини сьогодні Кропивницький, інформаційна агенція Кропивницький, інформація Кропивницький',
		];

		$city = [
			'name' => 'Кропивницький',
			'name_link' => 'kropyvnytskiy',
			'main_link' => 'kropyvnytskiy.index',
			'news_line' => 'news.line',
			'news_link' => 'kropyvnytskiy.news',
		];

		$url = env("SERVER_API_URL") . '/kropyvnytskiy/with-nn';
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
	public function olexandriyaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Олександрія, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Олександрії, головні новини Олександрія, новини ТОП Олександрія, новини новини бізнесу Олександрія, стрічка новин Олександрія, Думки Олександрія, новини Олександрія сьогодні, останні новини сьогодні Олександрія, інформаційна агенція Олександрія, інформація Олександрія',
			'site' => 'Головні новини міста Олександрія, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/olexandriya',
			'keywords' => 'Головний сайт Олександрії, головні новини Олександрія, новини ТОП Олександрія, новини новини бізнесу Олександрія, стрічка новин Олександрія, Думки Олександрія, новини Олександрія сьогодні, останні новини сьогодні Олександрія, інформаційна агенція Олександрія, інформація Олександрія',
		];

		$city = [
			'name' => 'Олександрія',
			'name_link' => 'olexandriya',
			'main_link' => 'olexandriya.index',
			'news_line' => 'news.line',
			'news_link' => 'olexandriya.news',
		];

		$url = env("SERVER_API_URL") . '/olexandriya/with-nn';
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
	public function svitlovodskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Світловодськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Світловодська, головні новини Світловодськ, новини ТОП Житомир, новини новини бізнесу Світловодськ, стрічка новин Світловодськ, Думки Світловодськ, новини Світловодськ сьогодні, останні новини сьогодні Світловодськ, інформаційна агенція Світловодськ, інформація Світловодськ',
			'site' => 'Головні новини міста Світловодськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/svitlovodsk',
			'keywords' => 'Головний сайт Світловодська, головні новини Світловодськ, новини ТОП Житомир, новини новини бізнесу Світловодськ, стрічка новин Світловодськ, Думки Світловодськ, новини Світловодськ сьогодні, останні новини сьогодні Світловодськ, інформаційна агенція Світловодськ, інформація Світловодськ',
		];

		$city = [
			'name' => 'Світловодськ',
			'name_link' => 'svitlovodsk',
			'main_link' => 'svitlovodsk.index',
			'news_line' => 'news.line',
			'news_link' => 'svitlovodsk.news',
		];

		$url = env("SERVER_API_URL") . '/svitlovodsk/with-nn';
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
	public function znamyankaHome()
	{
		$metaData = [
			'title' => "Головні новини міста Знам'янка, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт Знам'янки, головні новини Знам'янка, новини ТОП Знам'янка, новини новини бізнесу Знам'янка, стрічка новин Знам'янка, Думки Знам'янка, новини Знам'янка сьогодні, останні новини сьогодні Знам'янка, інформаційна агенція Знам'янка, інформація Знам'янка",
			'site' => "Головні новини міста Знам'янка, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/znamyanka',
			'keywords' => "Головний сайт Знам'янки, головні новини Знам'янка, новини ТОП Знам'янка, новини новини бізнесу Знам'янка, стрічка новин Знам'янка, Думки Знам'янка, новини Знам'янка сьогодні, останні новини сьогодні Знам'янка, інформаційна агенція Знам'янка, інформація Знам'янка",
		];

		$city = [
			'name' => "Знам'янка",
			'name_link' => 'znamyanka',
			'main_link' => 'znamyanka.index',
			'news_line' => 'news.line',
			'news_link' => 'znamyanka.news',
		];

		$url = env("SERVER_API_URL") . '/znamyanka/with-nn';
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
