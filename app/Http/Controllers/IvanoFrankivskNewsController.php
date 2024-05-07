<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class IvanoFrankivskNewsController extends Controller
{
	public function dolynaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Долина, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Долина, головні новини Долина, новини ТОП Долина, новини новини бізнесу Долина, стрічка новин Долина, Думки Долина, новини Долина сьогодні, останні новини сьогодні Долина, інформаційна агенція Долина, інформація Долина',
			'site' => 'Головні новини міста Долина, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/dolyna',
			'keywords' => 'Головний сайт Долина, головні новини Долина, новини ТОП Долина, новини новини бізнесу Долина, стрічка новин Долина, Думки Долина, новини Долина сьогодні, останні новини сьогодні Долина, інформаційна агенція Долина, інформація Долина',
		];

		$city = [
			'name' => 'Долина',
			'name_link' => 'dolyna',
			'main_link' => 'dolyna.index',
			'news_line' => 'news.line',
			'news_link' => 'dolyna.news',
		];

		$url = env("SERVER_API_URL") . '/dolyna/with-nn';
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
	public function ivanoFrankivskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Івано-Франківськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Івано-Франківська, головні новини Івано-Франківськ, новини ТОП Івано-Франківськ, новини новини бізнесу Івано-Франківськ, стрічка новин Івано-Франківськ, Думки Івано-Франківськ, новини Івано-Франківськ сьогодні, останні новини сьогодні Івано-Франківськ, інформаційна агенція Івано-Франківськ, інформація Івано-Франківськ',
			'site' => 'Головні новини міста Івано-Франківськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/ivano-frankivsk',
			'keywords' => 'Головний сайт Івано-Франківська, головні новини Івано-Франківськ, новини ТОП Івано-Франківськ, новини новини бізнесу Івано-Франківськ, стрічка новин Івано-Франківськ, Думки Івано-Франківськ, новини Івано-Франківськ сьогодні, останні новини сьогодні Івано-Франківськ, інформаційна агенція Івано-Франківськ, інформація Івано-Франківськ',
		];

		$city = [
			'name' => 'Івано-Франківськ',
			'name_link' => 'ivano-frankivsk',
			'main_link' => 'ivano-frankivsk.index',
			'news_line' => 'news.line',
			'news_link' => 'ivano-frankivsk.news',
		];

		$url = env("SERVER_API_URL") . '/ivano-frankivsk/with-nn';
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
	public function kalushHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Калуш, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Калуш, головні новини Калуш, новини ТОП Калуш, новини новини бізнесу Калуш, стрічка новин Калуш, Думки Калуш, новини Калуш сьогодні, останні новини сьогодні Калуш, інформаційна агенція Калуш, інформація Калуш',
			'site' => 'Головні новини міста Калуш, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kalush',
			'keywords' => 'Головний сайт Калуш, головні новини Калуш, новини ТОП Калуш, новини новини бізнесу Калуш, стрічка новин Калуш, Думки Калуш, новини Калуш сьогодні, останні новини сьогодні Калуш, інформаційна агенція Калуш, інформація Калуш',
		];

		$city = [
			'name' => 'Калуш',
			'name_link' => 'kalush',
			'main_link' => 'kalush.index',
			'news_line' => 'news.line',
			'news_link' => 'kalush.news',
		];

		$url = env("SERVER_API_URL") . '/kalush/with-nn';
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
	public function kolomyaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Коломия, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Коломия, головні новини Коломия, новини ТОП Коломия, новини новини бізнесу Коломия, стрічка новин Коломия, Думки Коломия, новини Коломия сьогодні, останні новини сьогодні Коломия, інформаційна агенція Коломия, інформація Коломия',
			'site' => 'Головні новини міста Коломия, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kolomya',
			'keywords' => 'Головний сайт Коломия, головні новини Коломия, новини ТОП Коломия, новини новини бізнесу Коломия, стрічка новин Коломия, Думки Коломия, новини Коломия сьогодні, останні новини сьогодні Коломия, інформаційна агенція Коломия, інформація Коломия',
		];

		$city = [
			'name' => 'Коломия',
			'name_link' => 'kolomya',
			'main_link' => 'kolomya.index',
			'news_line' => 'news.line',
			'news_link' => 'kolomya.news',
		];

		$url = env("SERVER_API_URL") . '/kolomya/with-nn';
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
	public function nadvirnaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Надвірна, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Надвірна, головні новини Надвірна, новини ТОП Надвірна, новини новини бізнесу Надвірна, стрічка новин Надвірна, Думки Надвірна, новини Надвірна сьогодні, останні новини сьогодні Надвірна, інформаційна агенція Надвірна, інформація Надвірна',
			'site' => 'Головні новини міста Надвірна, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/nadvirna',
			'keywords' => 'Головний сайт Надвірна, головні новини Надвірна, новини ТОП Надвірна, новини новини бізнесу Надвірна, стрічка новин Надвірна, Думки Надвірна, новини Надвірна сьогодні, останні новини сьогодні Надвірна, інформаційна агенція Надвірна, інформація Надвірна',
		];

		$city = [
			'name' => 'Надвірна',
			'name_link' => 'nadvirna',
			'main_link' => 'nadvirna.index',
			'news_line' => 'news.line',
			'news_link' => 'nadvirna.news',
		];

		$url = env("SERVER_API_URL") . '/nadvirna/with-nn';
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
