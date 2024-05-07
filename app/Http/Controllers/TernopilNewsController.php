<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class TernopilNewsController extends Controller
{
	public function chortkivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Чортків, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Чортків, головні новини Чортків, новини ТОП Чортків, новини новини бізнесу Чортків, стрічка новин Чортків, Думки Чортків, новини Чортків сьогодні, останні новини сьогодні Чортків, інформаційна агенція Чортків, інформація Чортків',
			'site' => 'Головні новини міста Чортків, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/chortkiv',
			'keywords' => 'Головний сайт Чортків, головні новини Чортків, новини ТОП Чортків, новини новини бізнесу Чортків, стрічка новин Чортків, Думки Чортків, новини Чортків сьогодні, останні новини сьогодні Чортків, інформаційна агенція Чортків, інформація Чортків',
		];

		$city = [
			'name' => 'Чортків',
			'name_link' => 'chortkiv',
			'main_link' => 'chortkiv.index',
			'news_line' => 'news.line',
			'news_link' => 'chortkiv.news',
		];

		$url = env("SERVER_API_URL") . '/chortkiv/with-nn';
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
	public function kremenetsHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Кременець, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Кременець, головні новини Кременець, новини ТОП Кременець, новини новини бізнесу Кременець, стрічка новин Кременець, Думки Кременець, новини Кременець сьогодні, останні новини сьогодні Кременець,  інформаційна агенція Кременець, інформація Кременець',
			'site' => 'Головні новини міста Кременець, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kremenets',
			'keywords' => 'Головний сайт Кременець, головні новини Кременець, новини ТОП Кременець, новини новини бізнесу Кременець, стрічка новин Кременець, Думки Кременець, новини Кременець сьогодні, останні новини сьогодні Кременець,  інформаційна агенція Кременець, інформація Кременець',
		];

		$city = [
			'name' => 'Кременець',
			'name_link' => 'kremenets',
			'main_link' => 'kremenets.index',
			'news_line' => 'news.line',
			'news_link' => 'kremenets.news',
		];

		$url = env("SERVER_API_URL") . '/kremenets/with-nn';
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
	public function ternopilHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Тернопіль, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Тернопіля, головні новини Тернопіль, новини ТОП Тернопіль, новини новини бізнесу Тернопіль, стрічка новин Тернопіль, Думки Тернопіль, новини Тернопіль сьогодні, останні новини сьогодні Тернопіль, інформаційна агенція Тернопіль, інформація Тернопіль',
			'site' => 'Головні новини міста Тернопіль, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/ternopil',
			'keywords' => 'Головний сайт Тернопіля, головні новини Тернопіль, новини ТОП Тернопіль, новини новини бізнесу Тернопіль, стрічка новин Тернопіль, Думки Тернопіль, новини Тернопіль сьогодні, останні новини сьогодні Тернопіль, інформаційна агенція Тернопіль, інформація Тернопіль',
		];

		$city = [
			'name' => 'Тернопіль',
			'name_link' => 'ternopil',
			'main_link' => 'ternopil.index',
			'news_line' => 'news.line',
			'news_link' => 'ternopil.news',
		];

		$url = env("SERVER_API_URL") . '/ternopil/with-nn';
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
