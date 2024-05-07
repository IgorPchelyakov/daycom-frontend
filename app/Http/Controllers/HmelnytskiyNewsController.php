<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class HmelnytskiyNewsController extends Controller
{
	public function hmelnytskiyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Хмельницький, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Хмельницький, головні новини Хмельницький, новини ТОП Житомир, новини новини бізнесу Хмельницький, стрічка новин Хмельницький, Думки Хмельницький, новини Хмельницький сьогодні, останні новини сьогодні Хмельницький, інформаційна агенція Хмельницький, інформація Хмельницький',
			'site' => 'Головні новини міста Хмельницький, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/hmelnytskiy',
			'keywords' => 'Головний сайт Хмельницький, головні новини Хмельницький, новини ТОП Житомир, новини новини бізнесу Хмельницький, стрічка новин Хмельницький, Думки Хмельницький, новини Хмельницький сьогодні, останні новини сьогодні Хмельницький, інформаційна агенція Хмельницький, інформація Хмельницький',
		];

		$city = [
			'name' => 'Хмельницький',
			'name_link' => 'hmelnytskiy',
			'main_link' => 'hmelnytskiy.index',
			'news_line' => 'news.line',
			'news_link' => 'hmelnytskiy.news',
		];

		$url = env("SERVER_API_URL") . '/hmelnytskiy/with-nn';
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
	public function kamyanetsPodilskyHome()
	{
		$metaData = [
			'title' => "Головні новини міста Кам'янець-Подільський, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт Кам'янець-Подільського, головні новини Кам'янець-Подільський, новини ТОП Кам'янець-Подільський, новини новини бізнесу Кам'янець-Подільський, стрічка новин Кам'янець-Подільський, Думки Кам'янець-Подільський, новини Кам'янець-Подільський сьогодні, останні новини сьогодні Кам'янець-Подільський,  інформаційна агенція Кам'янець-Подільський, інформація Кам'янець-Подільський",
			'site' => "Головні новини міста Кам'янець-Подільський, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/kamyanets-podilsky',
			'keywords' => "Головний сайт Кам'янець-Подільського, головні новини Кам'янець-Подільський, новини ТОП Кам'янець-Подільський, новини новини бізнесу Кам'янець-Подільський, стрічка новин Кам'янець-Подільський, Думки Кам'янець-Подільський, новини Кам'янець-Подільський сьогодні, останні новини сьогодні Кам'янець-Подільський,  інформаційна агенція Кам'янець-Подільський, інформація Кам'янець-Подільський",
		];

		$city = [
			'name' => "Кам'янець-Подільський",
			'name_link' => 'kamyanets-podilsky',
			'main_link' => 'kamyanets-podilsky.index',
			'news_line' => 'news.line',
			'news_link' => 'kamyanets-podilsky.news',
		];

		$url = env("SERVER_API_URL") . '/kamyanets-podilsky/with-nn';
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
	public function krasylivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Красилів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Красилів, головні новини Красилів, новини ТОП Красилів, новини новини бізнесу Красилів, стрічка новин Красилів, Думки Красилів, новини Красилів сьогодні, останні новини сьогодні Красилів, інформаційна агенція Красилів, інформація Красилів',
			'site' => 'Головні новини міста Красилів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/krasyliv',
			'keywords' => 'Головний сайт Красилів, головні новини Красилів, новини ТОП Красилів, новини новини бізнесу Красилів, стрічка новин Красилів, Думки Красилів, новини Красилів сьогодні, останні новини сьогодні Красилів, інформаційна агенція Красилів, інформація Красилів',
		];

		$city = [
			'name' => 'Красилів',
			'name_link' => 'krasyliv',
			'main_link' => 'krasyliv.index',
			'news_line' => 'news.line',
			'news_link' => 'krasyliv.news',
		];

		$url = env("SERVER_API_URL") . '/krasyliv/with-nn';
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
	public function netishinHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Нетішин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Нетішина, головні новини Нетішин, новини ТОП Нетішин, новини новини бізнесу Нетішин, стрічка новин Нетішин, Думки Нетішин, новини Нетішин сьогодні, останні новини сьогодні Нетішин, інформаційна агенція Нетішин, інформація Нетішин',
			'site' => 'Головні новини міста Нетішин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/netishin',
			'keywords' => 'Головний сайт Нетішина, головні новини Нетішин, новини ТОП Нетішин, новини новини бізнесу Нетішин, стрічка новин Нетішин, Думки Нетішин, новини Нетішин сьогодні, останні новини сьогодні Нетішин, інформаційна агенція Нетішин, інформація Нетішин',
		];

		$city = [
			'name' => 'Нетішин',
			'name_link' => 'netishin',
			'main_link' => 'netishin.index',
			'news_line' => 'news.line',
			'news_link' => 'netishin.news',
		];

		$url = env("SERVER_API_URL") . '/netishin/with-nn';
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
	public function polonneHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Полонне, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Полонне, головні новини Полонне, новини ТОП Полонне, новини новини бізнесу Полонне, стрічка новин Полонне, Думки Полонне, новини Полонне сьогодні, останні новини сьогодні Полонне, інформаційна агенція Полонне, інформація Полонне',
			'site' => 'Головні новини міста Полонне, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/polonne',
			'keywords' => 'Головний сайт Полонне, головні новини Полонне, новини ТОП Полонне, новини новини бізнесу Полонне, стрічка новин Полонне, Думки Полонне, новини Полонне сьогодні, останні новини сьогодні Полонне, інформаційна агенція Полонне, інформація Полонне',
		];

		$city = [
			'name' => 'Полонне',
			'name_link' => 'polonne',
			'main_link' => 'polonne.index',
			'news_line' => 'news.line',
			'news_link' => 'polonne.news',
		];

		$url = env("SERVER_API_URL") . '/polonne/with-nn';
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
	public function shepetivkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Шепетівка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Шепетівки, головні новини Шепетівка, новини ТОП Шепетівка, новини новини бізнесу Шепетівка, стрічка новин Шепетівка, Думки Шепетівка, новини Шепетівка сьогодні, останні новини сьогодні Шепетівка, інформаційна агенція Шепетівка, інформація Шепетівка',
			'site' => 'Головні новини міста Шепетівка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/shepetivka',
			'keywords' => 'Головний сайт Шепетівки, головні новини Шепетівка, новини ТОП Шепетівка, новини новини бізнесу Шепетівка, стрічка новин Шепетівка, Думки Шепетівка, новини Шепетівка сьогодні, останні новини сьогодні Шепетівка, інформаційна агенція Шепетівка, інформація Шепетівка',
		];

		$city = [
			'name' => 'Шепетівка',
			'name_link' => 'shepetivka',
			'main_link' => 'shepetivka.index',
			'news_line' => 'news.line',
			'news_link' => 'shepetivka.news',
		];

		$url = env("SERVER_API_URL") . '/shepetivka/with-nn';
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
	public function slavutaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Славута, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Славута, головні новини Славута, новини ТОП Славута, новини новини бізнесу Славута, стрічка новин Славута, Думки Славута, новини Славута сьогодні, останні новини сьогодні Славута, інформаційна агенція Славута, інформація Славута',
			'site' => 'Головні новини міста Славута, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/slavuta',
			'keywords' => 'Головний сайт Славута, головні новини Славута, новини ТОП Славута, новини новини бізнесу Славута, стрічка новин Славута, Думки Славута, новини Славута сьогодні, останні новини сьогодні Славута, інформаційна агенція Славута, інформація Славута',
		];

		$city = [
			'name' => 'Славута',
			'name_link' => 'slavuta',
			'main_link' => 'slavuta.index',
			'news_line' => 'news.line',
			'news_link' => 'slavuta.news',
		];

		$url = env("SERVER_API_URL") . '/slavuta/with-nn';
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
	public function starokostyntynivkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Старокостянтинів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Старокостянтиніва, головні новини Старокостянтинів, новини ТОП Старокостянтинів, новини новини бізнесу Старокостянтинів, стрічка новин Старокостянтинів, Думки Старокостянтинів, новини Старокостянтинів сьогодні, останні новини сьогодні Старокостянтинів, інформаційна агенція Старокостянтинів, інформація Старокостянтинів',
			'site' => 'Головні новини міста Старокостянтинів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/starokostyntynivka',
			'keywords' => 'Головний сайт Старокостянтиніва, головні новини Старокостянтинів, новини ТОП Старокостянтинів, новини новини бізнесу Старокостянтинів, стрічка новин Старокостянтинів, Думки Старокостянтинів, новини Старокостянтинів сьогодні, останні новини сьогодні Старокостянтинів, інформаційна агенція Старокостянтинів, інформація Старокостянтинів',
		];

		$city = [
			'name' => 'Старокостянтинів',
			'name_link' => 'starokostyntynivka',
			'main_link' => 'starokostyntynivka.index',
			'news_line' => 'news.line',
			'news_link' => 'starokostyntynivka.news',
		];

		$url = env("SERVER_API_URL") . '/starokostyntynivka/with-nn';
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
	public function volochyskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Волочиськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Волочиська, головні новини Волочиськ, новини ТОП Волочиськ, новини новини бізнесу Волочиськ, стрічка новин Волочиськ, Думки Волочиськ, новини Волочиськ сьогодні, останні новини сьогодні Волочиськ, інформаційна агенція Волочиськ, інформація Волочиськ',
			'site' => 'Головні новини міста Волочиськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/volochysk',
			'keywords' => 'Головний сайт Волочиська, головні новини Волочиськ, новини ТОП Волочиськ, новини новини бізнесу Волочиськ, стрічка новин Волочиськ, Думки Волочиськ, новини Волочиськ сьогодні, останні новини сьогодні Волочиськ, інформаційна агенція Волочиськ, інформація Волочиськ',
		];

		$city = [
			'name' => 'Волочиськ',
			'name_link' => 'volochysk',
			'main_link' => 'volochysk.index',
			'news_line' => 'news.line',
			'news_link' => 'volochysk.news',
		];

		$url = env("SERVER_API_URL") . '/volochysk/with-nn';
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
