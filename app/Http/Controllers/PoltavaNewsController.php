<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class PoltavaNewsController extends Controller
{
	public function hadiachHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Гадяч, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Гадяч, головні новини Гадяч, новини ТОП Гадяч, новини новини бізнесу Гадяч, стрічка новин Гадяч, Думки Гадяч, новини Гадяч сьогодні, останні новини сьогодні Гадяч, інформаційна агенція Гадяч, інформація Гадяч',
			'site' => 'Головні новини міста Гадяч, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/hadiach',
			'keywords' => 'Головний сайт Гадяч, головні новини Гадяч, новини ТОП Гадяч, новини новини бізнесу Гадяч, стрічка новин Гадяч, Думки Гадяч, новини Гадяч сьогодні, останні новини сьогодні Гадяч, інформаційна агенція Гадяч, інформація Гадяч',
		];

		$city = [
			'name' => 'Гадяч',
			'name_link' => 'hadiach',
			'main_link' => 'hadiach.index',
			'news_line' => 'news.line',
			'news_link' => 'hadiach.news',
		];

		$url = env("SERVER_API_URL") . '/hadiach/with-nn';
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
	public function horishniPlavniHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Горішні Плавні, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Горішні Плавні, головні новини Горішні Плавні, новини ТОП Горішні Плавні, новини новини бізнесу Горішні Плавні, стрічка новин Горішні Плавні, Думки Горішні Плавні, новини Горішні Плавні сьогодні, останні новини сьогодні Горішні Плавні, інформаційна агенція Горішні Плавні, інформація Горішні Плавні',
			'site' => 'Головні новини міста Горішні Плавні, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/horishni-plavni',
			'keywords' => 'Головний сайт Горішні Плавні, головні новини Горішні Плавні, новини ТОП Горішні Плавні, новини новини бізнесу Горішні Плавні, стрічка новин Горішні Плавні, Думки Горішні Плавні, новини Горішні Плавні сьогодні, останні новини сьогодні Горішні Плавні, інформаційна агенція Горішні Плавні, інформація Горішні Плавні',
		];

		$city = [
			'name' => 'Горішні Плавні',
			'name_link' => 'horishni-plavni',
			'main_link' => 'horishni-plavni.index',
			'news_line' => 'news.line',
			'news_link' => 'horishni-plavni.news',
		];

		$url = env("SERVER_API_URL") . '/horishni-plavni/with-nn';
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
	public function kremenchukHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Кременчук, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Кременчук, головні новини Кременчук, новини ТОП Кременчук, новини новини бізнесу Кременчук, стрічка новин Кременчук, Думки Кременчук, новини Кременчук сьогодні, останні новини сьогодні Кременчук, інформаційна агенція Кременчук, інформація Кременчук',
			'site' => 'Головні новини міста Кременчук, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kremenchuk',
			'keywords' => 'Головний сайт Кременчук, головні новини Кременчук, новини ТОП Кременчук, новини новини бізнесу Кременчук, стрічка новин Кременчук, Думки Кременчук, новини Кременчук сьогодні, останні новини сьогодні Кременчук, інформаційна агенція Кременчук, інформація Кременчук',
		];

		$city = [
			'name' => 'Кременчук',
			'name_link' => 'kremenchuk',
			'main_link' => 'kremenchuk.index',
			'news_line' => 'news.line',
			'news_link' => 'kremenchuk.news',
		];

		$url = env("SERVER_API_URL") . '/kremenchuk/with-nn';
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
	public function lubnyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Лубни, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Лубни, головні новини Лубни, новини ТОП Лубни, новини новини бізнесу Лубни, стрічка новин Лубни, Думки Лубни, новини Лубни сьогодні, останні новини сьогодні Лубни, інформаційна агенція Лубни, інформація Лубни',
			'site' => 'Головні новини міста Лубни, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/lubny',
			'keywords' => 'Головний сайт Лубни, головні новини Лубни, новини ТОП Лубни, новини новини бізнесу Лубни, стрічка новин Лубни, Думки Лубни, новини Лубни сьогодні, останні новини сьогодні Лубни, інформаційна агенція Лубни, інформація Лубни',
		];

		$city = [
			'name' => 'Лубни',
			'name_link' => 'lubny',
			'main_link' => 'lubny.index',
			'news_line' => 'news.line',
			'news_link' => 'lubny.news',
		];

		$url = env("SERVER_API_URL") . '/lubny/with-nn';
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
	public function myrhorodHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Миргород, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Миргорода, головні новини Миргород, новини ТОП Миргород, новини новини бізнесу Миргород, стрічка новин Миргород, Думки Миргород, новини Миргород сьогодні, останні новини сьогодні Миргород, інформаційна агенція Миргород, інформація Миргород',
			'site' => 'Головні новини міста Миргород, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/myrhorod',
			'keywords' => 'Головний сайт Миргорода, головні новини Миргород, новини ТОП Миргород, новини новини бізнесу Миргород, стрічка новин Миргород, Думки Миргород, новини Миргород сьогодні, останні новини сьогодні Миргород, інформаційна агенція Миргород, інформація Миргород',
		];

		$city = [
			'name' => 'Миргород',
			'name_link' => 'myrhorod',
			'main_link' => 'myrhorod.index',
			'news_line' => 'news.line',
			'news_link' => 'myrhorod.news',
		];

		$url = env("SERVER_API_URL") . '/myrhorod/with-nn';
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
	public function poltavaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Полтава, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Полтави, головні новини Полтава, новини ТОП Полтава, новини новини бізнесу Полтава, стрічка новин Полтава, Думки Полтава, новини Полтава сьогодні, останні новини сьогодні Полтава, інформаційна агенція Полтава, інформація Полтава',
			'site' => 'Головні новини міста Полтава, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/poltava',
			'keywords' => 'Головний сайт Полтави, головні новини Полтава, новини ТОП Полтава, новини новини бізнесу Полтава, стрічка новин Полтава, Думки Полтава, новини Полтава сьогодні, останні новини сьогодні Полтава, інформаційна агенція Полтава, інформація Полтава',
		];

		$city = [
			'name' => 'Полтава',
			'name_link' => 'poltava',
			'main_link' => 'poltava.index',
			'news_line' => 'news.line',
			'news_link' => 'poltava.news',
		];

		$url = env("SERVER_API_URL") . '/poltava/with-nn';
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
