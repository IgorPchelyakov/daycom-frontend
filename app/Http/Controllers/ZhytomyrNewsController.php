<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class ZhytomyrNewsController extends Controller
{
	public function berdychivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Бердичів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бердичіва, головні новини Бердичів, новини ТОП Бердичів, новини новини бізнесу Бердичів, стрічка новин Бердичів, Думки Бердичів, новини Бердичів сьогодні, останні новини сьогодні Бердичів, інформаційна агенція Бердичів, інформація Бердичів',
			'site' => 'Головні новини міста Бердичів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/berdychiv',
			'keywords' => 'Головний сайт Бердичіва, головні новини Бердичів, новини ТОП Бердичів, новини новини бізнесу Бердичів, стрічка новин Бердичів, Думки Бердичів, новини Бердичів сьогодні, останні новини сьогодні Бердичів, інформаційна агенція Бердичів, інформація Бердичів',
		];

		$city = [
			'name' => 'Бердичів',
			'name_link' => 'berdychiv',
			'main_link' => 'berdychiv.index',
			'news_line' => 'news.line',
			'news_link' => 'berdychiv.news',
		];

		$url = env("SERVER_API_URL") . '/berdychiv/with-nn';
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
	public function korostenHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Коростень, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Коростень, головні новини Коростень, новини ТОП Коростень, новини новини бізнесу Коростень, стрічка новин Коростень, Думки Коростень, новини Коростень сьогодні, останні новини сьогодні Коростень, інформаційна агенція Коростень, інформація Коростень',
			'site' => 'Головні новини міста Коростень, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/korosten',
			'keywords' => 'Головний сайт Коростень, головні новини Коростень, новини ТОП Коростень, новини новини бізнесу Коростень, стрічка новин Коростень, Думки Коростень, новини Коростень сьогодні, останні новини сьогодні Коростень, інформаційна агенція Коростень, інформація Коростень',
		];

		$city = [
			'name' => 'Коростень',
			'name_link' => 'korosten',
			'main_link' => 'korosten.index',
			'news_line' => 'news.line',
			'news_link' => 'korosten.news',
		];

		$url = env("SERVER_API_URL") . '/korosten/with-nn';
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
	public function korostyshivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Коростишів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Коростишіва, головні новини Коростишів, новини ТОП Коростишів, новини новини бізнесу Коростишів, стрічка новин Коростишів, Думки Коростишів, новини Коростишів сьогодні, останні новини сьогодні Коростишів, інформаційна агенція Коростишів, інформація Коростишів',
			'site' => 'Головні новини міста Коростишів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/korostyshiv',
			'keywords' => 'Головний сайт Коростишіва, головні новини Коростишів, новини ТОП Коростишів, новини новини бізнесу Коростишів, стрічка новин Коростишів, Думки Коростишів, новини Коростишів сьогодні, останні новини сьогодні Коростишів, інформаційна агенція Коростишів, інформація Коростишів',
		];

		$city = [
			'name' => 'Коростишів',
			'name_link' => 'korostyshiv',
			'main_link' => 'korostyshiv.index',
			'news_line' => 'news.line',
			'news_link' => 'korostyshiv.news',
		];

		$url = env("SERVER_API_URL") . '/korostyshiv/with-nn';
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
	public function malynHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Малин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Малин, головні новини Малин, новини ТОП Малин, новини новини бізнесу Малин, стрічка новин Малин, Думки Малин, новини Малин сьогодні, останні новини сьогодні Малин,  інформаційна агенція Малин, інформація Малин',
			'site' => 'Головні новини міста Малин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/malyn',
			'keywords' => 'Головний сайт Малин, головні новини Малин, новини ТОП Малин, новини новини бізнесу Малин, стрічка новин Малин, Думки Малин, новини Малин сьогодні, останні новини сьогодні Малин,  інформаційна агенція Малин, інформація Малин',
		];

		$city = [
			'name' => 'Малин',
			'name_link' => 'malyn',
			'main_link' => 'malyn.index',
			'news_line' => 'news.line',
			'news_link' => 'malyn.news',
		];

		$url = env("SERVER_API_URL") . '/malyn/with-nn';
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
	public function novohradVolynskiyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Новоград-Волинський, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Новоград-Волинського, головні новини Новоград-Волинський, новини ТОП Новоград-Волинський, новини новини бізнесу Новоград-Волинський, стрічка новин Новоград-Волинський, Думки Новоград-Волинський, новини Новоград-Волинський сьогодні, останні новини сьогодні Новоград-Волинський, інформаційна агенція Новоград-Волинський, інформація Новоград-Волинський',
			'site' => 'Головні новини міста Новоград-Волинський, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/novohrad-volynskiy',
			'keywords' => 'Головний сайт Новоград-Волинського, головні новини Новоград-Волинський, новини ТОП Новоград-Волинський, новини новини бізнесу Новоград-Волинський, стрічка новин Новоград-Волинський, Думки Новоград-Волинський, новини Новоград-Волинський сьогодні, останні новини сьогодні Новоград-Волинський, інформаційна агенція Новоград-Волинський, інформація Новоград-Волинський',
		];

		$city = [
			'name' => 'Новоград-Волинський',
			'name_link' => 'novohrad-volynskiy',
			'main_link' => 'novohrad-volynskiy.index',
			'news_line' => 'news.line',
			'news_link' => 'novohrad-volynskiy.news',
		];

		$url = env("SERVER_API_URL") . '/novohrad-volynskiy/with-nn';
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
	public function zhytomyrHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Житомир, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Житомира, головні новини Житомир, новини ТОП Житомир, новини новини бізнесу Житомир, стрічка новин Житомир, Думки Житомир, новини Житомир сьогодні, останні новини сьогодні Житомир, інформаційна агенція Житомир, інформація Житомир',
			'site' => 'Головні новини міста Житомир, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zhytomyr',
			'keywords' => 'Головний сайт Житомира, головні новини Житомир, новини ТОП Житомир, новини новини бізнесу Житомир, стрічка новин Житомир, Думки Житомир, новини Житомир сьогодні, останні новини сьогодні Житомир, інформаційна агенція Житомир, інформація Житомир',
		];

		$city = [
			'name' => 'Житомир',
			'name_link' => 'zhytomyr',
			'main_link' => 'zhytomyr.index',
			'news_line' => 'news.line',
			'news_link' => 'zhytomyr.news',
		];

		$url = env("SERVER_API_URL") . '/zhytomyr/with-nn';
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
