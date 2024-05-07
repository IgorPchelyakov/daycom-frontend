<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class RivneNewsController extends Controller
{
	public function dubnoHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Дубно, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Дубно, головні новини Дубно, новини ТОП Дубно, новини новини бізнесу Дубно, стрічка новин Дубно, Думки Дубно, новини Дубно сьогодні, останні новини сьогодні Дубно, інформаційна агенція Дубно, інформація Дубно',
			'site' => 'Головні новини міста Дубно, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/dubno',
			'keywords' => 'Головний сайт Дубно, головні новини Дубно, новини ТОП Дубно, новини новини бізнесу Дубно, стрічка новин Дубно, Думки Дубно, новини Дубно сьогодні, останні новини сьогодні Дубно, інформаційна агенція Дубно, інформація Дубно',
		];

		$city = [
			'name' => 'Дубно',
			'name_link' => 'dubno',
			'main_link' => 'dubno.index',
			'news_line' => 'news.line',
			'news_link' => 'dubno.news',
		];

		$url = env("SERVER_API_URL") . '/dubno/with-nn';
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
	public function kostopilHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Костопіль, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Костопіль, головні новини Костопіль, новини ТОП Костопіль, новини новини бізнесу Костопіль, стрічка новин Костопіль, Думки Костопіль, новини Костопіль сьогодні, останні новини сьогодні Костопіль, інформаційна агенція Костопіль, інформація Костопіль',
			'site' => 'Головні новини міста Костопіль, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kostopil',
			'keywords' => 'Головний сайт Костопіль, головні новини Костопіль, новини ТОП Костопіль, новини новини бізнесу Костопіль, стрічка новин Костопіль, Думки Костопіль, новини Костопіль сьогодні, останні новини сьогодні Костопіль, інформаційна агенція Костопіль, інформація Костопіль',
		];

		$city = [
			'name' => 'Костопіль',
			'name_link' => 'kostopil',
			'main_link' => 'kostopil.index',
			'news_line' => 'news.line',
			'news_link' => 'kostopil.news',
		];

		$url = env("SERVER_API_URL") . '/kostopil/with-nn';
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
	public function rivneHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Рівне, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Рівного, головні новини Рівне, новини ТОП Житомир, новини новини бізнесу Рівне, стрічка новин Рівне, Думки Рівне, новини Рівне сьогодні, останні новини сьогодні Рівне, інформаційна агенція Рівне, інформація Рівне',
			'site' => 'Головні новини міста Рівне, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/rivne',
			'keywords' => 'Головний сайт Рівного, головні новини Рівне, новини ТОП Житомир, новини новини бізнесу Рівне, стрічка новин Рівне, Думки Рівне, новини Рівне сьогодні, останні новини сьогодні Рівне, інформаційна агенція Рівне, інформація Рівне',
		];

		$city = [
			'name' => 'Рівне',
			'name_link' => 'rivne',
			'main_link' => 'rivne.index',
			'news_line' => 'news.line',
			'news_link' => 'rivne.news',
		];

		$url = env("SERVER_API_URL") . '/rivne/with-nn';
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
	public function sarnyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Сарни, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Сарни, головні новини Сарни, новини ТОП Сарни, новини новини бізнесу Сарни, стрічка новин Сарни, Думки Сарни, новини Сарни сьогодні, останні новини сьогодні Сарни, інформаційна агенція Сарни, інформація Сарни',
			'site' => 'Головні новини міста Сарни, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/sarny',
			'keywords' => 'Головний сайт Сарни, головні новини Сарни, новини ТОП Сарни, новини новини бізнесу Сарни, стрічка новин Сарни, Думки Сарни, новини Сарни сьогодні, останні новини сьогодні Сарни, інформаційна агенція Сарни, інформація Сарни',
		];

		$city = [
			'name' => 'Сарни',
			'name_link' => 'sarny',
			'main_link' => 'sarny.index',
			'news_line' => 'news.line',
			'news_link' => 'sarny.news',
		];

		$url = env("SERVER_API_URL") . '/sarny/with-nn';
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
	public function varashHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Вараш, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вараш, головні новини Вараш, новини ТОП Вараш, новини новини бізнесу Вараш, стрічка новин Вараш, Думки Вараш, новини Вараш сьогодні, останні новини сьогодні Вараш, інформаційна агенція Вараш, інформація Вараш',
			'site' => 'Головні новини міста Вараш, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/varash',
			'keywords' => 'Головний сайт Вараш, головні новини Вараш, новини ТОП Вараш, новини новини бізнесу Вараш, стрічка новин Вараш, Думки Вараш, новини Вараш сьогодні, останні новини сьогодні Вараш, інформаційна агенція Вараш, інформація Вараш',
		];

		$city = [
			'name' => 'Вараш',
			'name_link' => 'varash',
			'main_link' => 'varash.index',
			'news_line' => 'news.line',
			'news_link' => 'varash.news',
		];

		$url = env("SERVER_API_URL") . '/varash/with-nn';
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
	public function zdolbunivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Здолбунів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Здолбунів, головні новини Здолбунів, новини ТОП Здолбунів, новини новини бізнесу Здолбунів, стрічка новин Здолбунів, Думки Здолбунів, новини Здолбунів сьогодні, останні новини сьогодні Здолбунів, інформаційна агенція Здолбунів, інформація Здолбунів',
			'site' => 'Головні новини міста Здолбунів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zdolbuniv',
			'keywords' => 'Головний сайт Здолбунів, головні новини Здолбунів, новини ТОП Здолбунів, новини новини бізнесу Здолбунів, стрічка новин Здолбунів, Думки Здолбунів, новини Здолбунів сьогодні, останні новини сьогодні Здолбунів, інформаційна агенція Здолбунів, інформація Здолбунів',
		];

		$city = [
			'name' => 'Здолбунів',
			'name_link' => 'zdolbuniv',
			'main_link' => 'zdolbuniv.index',
			'news_line' => 'news.line',
			'news_link' => 'zdolbuniv.news',
		];

		$url = env("SERVER_API_URL") . '/zdolbuniv/with-nn';
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
