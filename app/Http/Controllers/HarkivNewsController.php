<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class HarkivNewsController extends Controller
{
	public function balakliaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Балаклія, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Балаклія, головні новини Балаклія, новини ТОП Балаклія, новини новини бізнесу Балаклія, стрічка новин Балаклія, Думки Балаклія, новини Балаклія сьогодні, останні новини сьогодні Балаклія, інформаційна агенція Балаклія, інформація Балаклія',
			'site' => 'Головні новини міста Балаклія, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/balaklia',
			'keywords' => 'Головний сайт Балаклія, головні новини Балаклія, новини ТОП Балаклія, новини новини бізнесу Балаклія, стрічка новин Балаклія, Думки Балаклія, новини Балаклія сьогодні, останні новини сьогодні Балаклія, інформаційна агенція Балаклія, інформація Балаклія',
		];

		$city = [
			'name' => 'Балаклія',
			'name_link' => 'balaklia',
			'main_link' => 'balaklia.index',
			'news_line' => 'news.line',
			'news_link' => 'balaklia.news',
		];

		$url = env("SERVER_API_URL") . '/balaklia/with-nn';
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
	public function chuguyivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Чугуїв, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Чугуїв, головні новини Чугуїв, новини ТОП Чугуїв, новини новини бізнесу Чугуїв, стрічка новин Чугуїв, Думки Чугуїв, новини Чугуїв сьогодні, останні новини сьогодні Чугуїв, інформаційна агенція Чугуїв, інформація Чугуїв',
			'site' => 'Головні новини міста Чугуїв, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/chuguyiv',
			'keywords' => 'Головний сайт Чугуїв, головні новини Чугуїв, новини ТОП Чугуїв, новини новини бізнесу Чугуїв, стрічка новин Чугуїв, Думки Чугуїв, новини Чугуїв сьогодні, останні новини сьогодні Чугуїв, інформаційна агенція Чугуїв, інформація Чугуїв',
		];

		$city = [
			'name' => 'Чугуїв',
			'name_link' => 'chuguyiv',
			'main_link' => 'chuguyiv.index',
			'news_line' => 'news.line',
			'news_link' => 'chuguyiv.news',
		];

		$url = env("SERVER_API_URL") . '/chuguyiv/with-nn';
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
	public function dergachiHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Дергачі, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Дергачі, головні новини Дергачі, новини ТОП Дергачі, новини новини бізнесу Дергачі, стрічка новин Дергачі, Думки Дергачі, новини Дергачі сьогодні, останні новини сьогодні Дергачі, інформаційна агенція Дергачі, інформація Дергачі',
			'site' => 'Головні новини міста Дергачі, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/dergachi',
			'keywords' => 'Головний сайт Дергачі, головні новини Дергачі, новини ТОП Дергачі, новини новини бізнесу Дергачі, стрічка новин Дергачі, Думки Дергачі, новини Дергачі сьогодні, останні новини сьогодні Дергачі, інформаційна агенція Дергачі, інформація Дергачі',
		];

		$city = [
			'name' => 'Дергачі',
			'name_link' => 'dergachi',
			'main_link' => 'dergachi.index',
			'news_line' => 'news.line',
			'news_link' => 'dergachi.news',
		];

		$url = env("SERVER_API_URL") . '/dergachi/with-nn';
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
	public function harkivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Харків, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Харків, головні новини Харків, новини ТОП Харків, новини новини бізнесу Харків, стрічка новин Харків, Думки Харків, новини Харків сьогодні, останні новини сьогодні Харків, інформаційна агенція Харків, інформація Харків',
			'site' => 'Головні новини міста Харків, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/harkiv',
			'keywords' => 'Головний сайт Харків, головні новини Харків, новини ТОП Харків, новини новини бізнесу Харків, стрічка новин Харків, Думки Харків, новини Харків сьогодні, останні новини сьогодні Харків, інформаційна агенція Харків, інформація Харків',
		];

		$city = [
			'name' => 'Харків',
			'name_link' => 'harkiv',
			'main_link' => 'harkiv.index',
			'news_line' => 'news.line',
			'news_link' => 'harkiv.news',
		];

		$url = env("SERVER_API_URL") . '/harkiv/with-nn';
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
	public function izumHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Ізюм, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ізюм, головні новини Ізюм, новини ТОП Ізюм, новини новини бізнесу Ізюм, стрічка новин Ізюм, Думки Ізюм, новини Ізюм сьогодні, останні новини сьогодні Ізюм, інформаційна агенція Ізюм, інформація Ізюм',
			'site' => 'Головні новини міста Ізюм, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/izum',
			'keywords' => 'Головний сайт Ізюм, головні новини Ізюм, новини ТОП Ізюм, новини новини бізнесу Ізюм, стрічка новин Ізюм, Думки Ізюм, новини Ізюм сьогодні, останні новини сьогодні Ізюм, інформаційна агенція Ізюм, інформація Ізюм',
		];

		$city = [
			'name' => 'Ізюм',
			'name_link' => 'izum',
			'main_link' => 'izum.index',
			'news_line' => 'news.line',
			'news_link' => 'izum.news',
		];

		$url = env("SERVER_API_URL") . '/izum/with-nn';
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
	public function krasnogradHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Красноград, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Красноград, головні новини Красноград, новини ТОП Красноград, новини новини бізнесу Красноград, стрічка новин Красноград, Думки Красноград, новини Красноград сьогодні, останні новини сьогодні Красноград, інформаційна агенція Красноград, інформація Красноград',
			'site' => 'Головні новини міста Красноград, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/krasnograd',
			'keywords' => 'Головний сайт Красноград, головні новини Красноград, новини ТОП Красноград, новини новини бізнесу Красноград, стрічка новин Красноград, Думки Красноград, новини Красноград сьогодні, останні новини сьогодні Красноград, інформаційна агенція Красноград, інформація Красноград',
		];

		$city = [
			'name' => 'Красноград',
			'name_link' => 'krasnograd',
			'main_link' => 'krasnograd.index',
			'news_line' => 'news.line',
			'news_link' => 'krasnograd.news',
		];

		$url = env("SERVER_API_URL") . '/krasnograd/with-nn';
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
	public function kupyanskHome()
	{
		$metaData = [
			'title' => "Головні новини міста Куп'янськ, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт Куп'янськ, головні новини Куп'янськ, новини ТОП Куп'янськ, новини новини бізнесу Куп'янськ, стрічка новин Куп'янськ, Думки Куп'янськ, новини Куп'янськ сьогодні, останні новини сьогодні Куп'янськ, інформаційна агенція Куп'янськ, інформація Куп'янськ",
			'site' => "Головні новини міста Куп'янськ, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/kupyansk',
			'keywords' => "Головний сайт Куп'янськ, головні новини Куп'янськ, новини ТОП Куп'янськ, новини новини бізнесу Куп'янськ, стрічка новин Куп'янськ, Думки Куп'янськ, новини Куп'янськ сьогодні, останні новини сьогодні Куп'янськ, інформаційна агенція Куп'янськ, інформація Куп'янськ",
		];

		$city = [
			'name' => "Куп'янськ",
			'name_link' => 'kupyansk',
			'main_link' => 'kupyansk.index',
			'news_line' => 'news.line',
			'news_link' => 'kupyansk.news',
		];

		$url = env("SERVER_API_URL") . '/kupyansk/with-nn';
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
	public function lozovaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Лозова, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Лозова, головні новини Лозова, новини ТОП Лозова, новини новини бізнесу Лозова, стрічка новин Лозова, Думки Лозова, новини Лозова сьогодні, останні новини сьогодні Лозова, інформаційна агенція Лозова, інформація Лозова',
			'site' => 'Головні новини міста Лозова, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/lozova',
			'keywords' => 'Головний сайт Лозова, головні новини Лозова, новини ТОП Лозова, новини новини бізнесу Лозова, стрічка новин Лозова, Думки Лозова, новини Лозова сьогодні, останні новини сьогодні Лозова, інформаційна агенція Лозова, інформація Лозова',
		];

		$city = [
			'name' => 'Лозова',
			'name_link' => 'lozova',
			'main_link' => 'lozova.index',
			'news_line' => 'news.line',
			'news_link' => 'lozova.news',
		];

		$url = env("SERVER_API_URL") . '/lozova/with-nn';
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
	public function lubotinHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Люботин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Люботин, головні новини Люботин, новини ТОП Люботин, новини новини бізнесу Люботин, стрічка новин Люботин, Думки Люботин, новини Люботин сьогодні, останні новини сьогодні Люботин, інформаційна агенція Люботин, інформація Люботин',
			'site' => 'Головні новини міста Люботин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/lubotin',
			'keywords' => 'Головний сайт Люботин, головні новини Люботин, новини ТОП Люботин, новини новини бізнесу Люботин, стрічка новин Люботин, Думки Люботин, новини Люботин сьогодні, останні новини сьогодні Люботин, інформаційна агенція Люботин, інформація Люботин',
		];

		$city = [
			'name' => 'Люботин',
			'name_link' => 'lubotin',
			'main_link' => 'lubotin.index',
			'news_line' => 'news.line',
			'news_link' => 'lubotin.news',
		];

		$url = env("SERVER_API_URL") . '/lubotin/with-nn';
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
	public function merefaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Мерефа, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Мерефа, головні новини Мерефа, новини ТОП Мерефа, новини новини бізнесу Мерефа, стрічка новин Мерефа, Думки Мерефа, новини Мерефа сьогодні, останні новини сьогодні Мерефа, інформаційна агенція Мерефа, інформація Мерефа',
			'site' => 'Головні новини міста Мерефа, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/merefa',
			'keywords' => 'Головний сайт Мерефа, головні новини Мерефа, новини ТОП Мерефа, новини новини бізнесу Мерефа, стрічка новин Мерефа, Думки Мерефа, новини Мерефа сьогодні, останні новини сьогодні Мерефа, інформаційна агенція Мерефа, інформація Мерефа',
		];

		$city = [
			'name' => 'Мерефа',
			'name_link' => 'merefa',
			'main_link' => 'merefa.index',
			'news_line' => 'news.line',
			'news_link' => 'merefa.news',
		];

		$url = env("SERVER_API_URL") . '/merefa/with-nn';
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
	public function pervomayskiyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Первомайський, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Первомайський, головні новини Первомайський, новини ТОП Первомайський, новини новини бізнесу Первомайський, стрічка новин Первомайський, Думки Первомайський, новини Первомайський сьогодні, останні новини сьогодні Первомайський, інформаційна агенція Первомайський, інформація Первомайський',
			'site' => 'Головні новини міста Первомайський, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pervomayskiy',
			'keywords' => 'Головний сайт Первомайський, головні новини Первомайський, новини ТОП Первомайський, новини новини бізнесу Первомайський, стрічка новин Первомайський, Думки Первомайський, новини Первомайський сьогодні, останні новини сьогодні Первомайський, інформаційна агенція Первомайський, інформація Первомайський',
		];

		$city = [
			'name' => 'Первомайський',
			'name_link' => 'pervomayskiy',
			'main_link' => 'pervomayskiy.index',
			'news_line' => 'news.line',
			'news_link' => 'pervomayskiy.news',
		];

		$url = env("SERVER_API_URL") . '/pervomayskiy/with-nn';
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
	public function vovchanskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Вовчанськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вовчанськ, головні новини Вовчанськ, новини ТОП Вовчанськ, новини новини бізнесу Вовчанськ, стрічка новин Вовчанськ, Думки Вовчанськ, новини Вовчанськ сьогодні, останні новини сьогодні Вовчанськ, інформаційна агенція Вовчанськ, інформація Вовчанськ',
			'site' => 'Головні новини міста Вовчанськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vovchansk',
			'keywords' => 'Головний сайт Вовчанськ, головні новини Вовчанськ, новини ТОП Вовчанськ, новини новини бізнесу Вовчанськ, стрічка новин Вовчанськ, Думки Вовчанськ, новини Вовчанськ сьогодні, останні новини сьогодні Вовчанськ, інформаційна агенція Вовчанськ, інформація Вовчанськ',
		];

		$city = [
			'name' => 'Вовчанськ',
			'name_link' => 'vovchansk',
			'main_link' => 'vovchansk.index',
			'news_line' => 'news.line',
			'news_link' => 'vovchansk.news',
		];

		$url = env("SERVER_API_URL") . '/vovchansk/with-nn';
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
