<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class SumyNewsController extends Controller
{
	public function gluhivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Глухів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Глухів, головні новини Глухів, новини ТОП Глухів, новини новини бізнесу Глухів, стрічка новин Глухів, Думки Глухів, новини Глухів сьогодні, останні новини сьогодні Глухів, інформаційна агенція Глухів, інформація Глухів',
			'site' => 'Головні новини міста Глухів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/gluhiv',
			'keywords' => 'Головний сайт Глухів, головні новини Глухів, новини ТОП Глухів, новини новини бізнесу Глухів, стрічка новин Глухів, Думки Глухів, новини Глухів сьогодні, останні новини сьогодні Глухів, інформаційна агенція Глухів, інформація Глухів',
		];

		$city = [
			'name' => 'Глухів',
			'name_link' => 'gluhiv',
			'main_link' => 'gluhiv.index',
			'news_line' => 'news.line',
			'news_link' => 'gluhiv.news',
		];

		$url = env("SERVER_API_URL") . '/gluhiv/with-nn';
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
	public function konotopHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Конотоп, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Конотопу, головні новини Конотоп, новини ТОП Конотоп, новини новини бізнесу Конотоп, стрічка новин Конотоп, Думки Конотоп, новини Конотоп сьогодні, останні новини сьогодні Конотоп, інформаційна агенція Конотоп, інформація Конотоп',
			'site' => 'Головні новини міста Конотоп, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/konotop',
			'keywords' => 'Головний сайт Конотопу, головні новини Конотоп, новини ТОП Конотоп, новини новини бізнесу Конотоп, стрічка новин Конотоп, Думки Конотоп, новини Конотоп сьогодні, останні новини сьогодні Конотоп, інформаційна агенція Конотоп, інформація Конотоп',
		];

		$city = [
			'name' => 'Конотоп',
			'name_link' => 'konotop',
			'main_link' => 'konotop.index',
			'news_line' => 'news.line',
			'news_link' => 'konotop.news',
		];

		$url = env("SERVER_API_URL") . '/konotop/with-nn';
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
	public function krolevetsHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Кролевець, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Кролевець, головні новини Кролевець, новини ТОП Кролевець, новини новини бізнесу Кролевець, стрічка новин Кролевець, Думки Кролевець, новини Кролевець сьогодні, останні новини сьогодні Кролевець, інформаційна агенція Кролевець, інформація Кролевець',
			'site' => 'Головні новини міста Кролевець, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/krolevets',
			'keywords' => 'Головний сайт Кролевець, головні новини Кролевець, новини ТОП Кролевець, новини новини бізнесу Кролевець, стрічка новин Кролевець, Думки Кролевець, новини Кролевець сьогодні, останні новини сьогодні Кролевець, інформаційна агенція Кролевець, інформація Кролевець',
		];

		$city = [
			'name' => 'Кролевець',
			'name_link' => 'krolevets',
			'main_link' => 'krolevets.index',
			'news_line' => 'news.line',
			'news_link' => 'krolevets.news',
		];

		$url = env("SERVER_API_URL") . '/krolevets/with-nn';
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
	public function lebedynHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Лебедин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Лебедин, головні новини Лебедин, новини ТОП Лебедин, новини новини бізнесу Лебедин, стрічка новин Лебедин, Думки Лебедин, новини Лебедин сьогодні, останні новини сьогодні Лебедин, інформаційна агенція Лебедин, інформація Лебедин',
			'site' => 'Головні новини міста Лебедин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/lebedyn',
			'keywords' => 'Головний сайт Лебедин, головні новини Лебедин, новини ТОП Лебедин, новини новини бізнесу Лебедин, стрічка новин Лебедин, Думки Лебедин, новини Лебедин сьогодні, останні новини сьогодні Лебедин, інформаційна агенція Лебедин, інформація Лебедин',
		];

		$city = [
			'name' => 'Лебедин',
			'name_link' => 'lebedyn',
			'main_link' => 'lebedyn.index',
			'news_line' => 'news.line',
			'news_link' => 'lebedyn.news',
		];

		$url = env("SERVER_API_URL") . '/lebedyn/with-nn';
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
	public function ohtyrkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Охтирка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Охтирки, головні новини Охтирка, новини ТОП Охтирка, новини новини бізнесу Охтирка, стрічка новин Охтирка, Думки Охтирка, новини Охтирка сьогодні, останні новини сьогодні Охтирка, інформаційна агенція Охтирка, інформація Охтирка',
			'site' => 'Головні новини міста Охтирка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/ohtyrka',
			'keywords' => 'Головний сайт Охтирки, головні новини Охтирка, новини ТОП Охтирка, новини новини бізнесу Охтирка, стрічка новин Охтирка, Думки Охтирка, новини Охтирка сьогодні, останні новини сьогодні Охтирка, інформаційна агенція Охтирка, інформація Охтирка',
		];

		$city = [
			'name' => 'Охтирка',
			'name_link' => 'ohtyrka',
			'main_link' => 'ohtyrka.index',
			'news_line' => 'news.line',
			'news_link' => 'ohtyrka.news',
		];

		$url = env("SERVER_API_URL") . '/ohtyrka/with-nn';
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
	public function romnyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Ромни, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ромни, головні новини Ромни, новини ТОП Житомир, новини новини бізнесу Ромни, стрічка новин Ромни, Думки Ромни, новини Ромни сьогодні, останні новини сьогодні Ромни, інформаційна агенція Ромни, інформація Ромни',
			'site' => 'Головні новини міста Ромни, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/romny',
			'keywords' => 'Головний сайт Ромни, головні новини Ромни, новини ТОП Житомир, новини новини бізнесу Ромни, стрічка новин Ромни, Думки Ромни, новини Ромни сьогодні, останні новини сьогодні Ромни, інформаційна агенція Ромни, інформація Ромни',
		];

		$city = [
			'name' => 'Ромни',
			'name_link' => 'romny',
			'main_link' => 'romny.index',
			'news_line' => 'news.line',
			'news_link' => 'romny.news',
		];

		$url = env("SERVER_API_URL") . '/romny/with-nn';
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
	public function shostkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Шостка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Шостки, головні новини Шостка, новини ТОП Шостка, новини новини бізнесу Шостка, стрічка новин Шостка, Думки Шостка, новини Шостка сьогодні, останні новини сьогодні Шостка, інформаційна агенція Шостка, інформація Шостка',
			'site' => 'Головні новини міста Шостка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/shostka',
			'keywords' => 'Головний сайт Шостки, головні новини Шостка, новини ТОП Шостка, новини новини бізнесу Шостка, стрічка новин Шостка, Думки Шостка, новини Шостка сьогодні, останні новини сьогодні Шостка, інформаційна агенція Шостка, інформація Шостка',
		];

		$city = [
			'name' => 'Шостка',
			'name_link' => 'shostka',
			'main_link' => 'shostka.index',
			'news_line' => 'news.line',
			'news_link' => 'shostka.news',
		];

		$url = env("SERVER_API_URL") . '/shostka/with-nn';
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
	public function sumyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Суми, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Сум, головні новини Суми, новини ТОП Суми, новини новини бізнесу Суми, стрічка новин Суми, Думки Суми, новини Суми сьогодні, останні новини сьогодні Суми, інформаційна агенція Суми, інформація Суми',
			'site' => 'Головні новини міста Суми, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/sumy',
			'keywords' => 'Головний сайт Сум, головні новини Суми, новини ТОП Суми, новини новини бізнесу Суми, стрічка новин Суми, Думки Суми, новини Суми сьогодні, останні новини сьогодні Суми, інформаційна агенція Суми, інформація Суми',
		];

		$city = [
			'name' => 'Суми',
			'name_link' => 'sumy',
			'main_link' => 'sumy.index',
			'news_line' => 'news.line',
			'news_link' => 'sumy.news',
		];

		$url = env("SERVER_API_URL") . '/sumy/with-nn';
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
	public function trostyanetsHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Тростянець, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Тростянець, головні новини Тростянець, новини ТОП Тростянець, новини новини бізнесу Тростянець, стрічка новин Тростянець, Думки Тростянець, новини Тростянець сьогодні, останні новини сьогодні Тростянець, інформаційна агенція Тростянець, інформація Тростянець',
			'site' => 'Головні новини міста Тростянець, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/trostyanets',
			'keywords' => 'Головний сайт Тростянець, головні новини Тростянець, новини ТОП Тростянець, новини новини бізнесу Тростянець, стрічка новин Тростянець, Думки Тростянець, новини Тростянець сьогодні, останні новини сьогодні Тростянець, інформаційна агенція Тростянець, інформація Тростянець',
		];

		$city = [
			'name' => 'Тростянець',
			'name_link' => 'trostyanets',
			'main_link' => 'trostyanets.index',
			'news_line' => 'news.line',
			'news_link' => 'trostyanets.news',
		];

		$url = env("SERVER_API_URL") . '/trostyanets/with-nn';
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
