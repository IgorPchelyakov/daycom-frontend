<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class CherkasyNewsController extends Controller
{
	public function cherkasyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Черкаси, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Черкас, головні новини Черкаси, новини ТОП Черкаси, новини новини бізнесу Черкаси, стрічка новин Черкаси, Думки Черкаси, новини Черкаси сьогодні, останні новини сьогодні Черкаси, інформаційна агенція Черкаси, інформація Черкаси',
			'site' => 'Головні новини міста Черкаси, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/cherkasy',
			'keywords' => 'Головний сайт Черкас, головні новини Черкаси, новини ТОП Черкаси, новини новини бізнесу Черкаси, стрічка новин Черкаси, Думки Черкаси, новини Черкаси сьогодні, останні новини сьогодні Черкаси, інформаційна агенція Черкаси, інформація Черкаси',
		];

		$city = [
			'name' => 'Черкаси',
			'name_link' => 'cherkasy',
			'main_link' => 'cherkasy.index',
			'news_line' => 'news.line',
			'news_link' => 'cherkasy.news',
		];

		$url = env("SERVER_API_URL") . '/cherkasy/with-nn';
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
	public function kanivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Канів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Канів, головні новини Канів, новини ТОП Канів, новини новини бізнесу Канів, стрічка новин Канів, Думки Канів, новини Канів сьогодні, останні новини сьогодні Канів, інформаційна агенція Канів, інформація Канів',
			'site' => 'Головні новини міста Канів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kaniv',
			'keywords' => 'Головний сайт Канів, головні новини Канів, новини ТОП Канів, новини новини бізнесу Канів, стрічка новин Канів, Думки Канів, новини Канів сьогодні, останні новини сьогодні Канів, інформаційна агенція Канів, інформація Канів',
		];

		$city = [
			'name' => 'Канів',
			'name_link' => 'kaniv',
			'main_link' => 'kaniv.index',
			'news_line' => 'news.line',
			'news_link' => 'kaniv.news',
		];

		$url = env("SERVER_API_URL") . '/kaniv/with-nn';
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
	public function smilaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Сміла, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Сміла, головні новини Сміла, новини ТОП Сміла, новини новини бізнесу Сміла, стрічка новин Сміла, Думки Сміла, новини Сміла сьогодні, останні новини сьогодні Сміла, інформаційна агенція Сміла, інформація Сміла',
			'site' => 'Головні новини міста Сміла, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/smila',
			'keywords' => 'Головний сайт Сміла, головні новини Сміла, новини ТОП Сміла, новини новини бізнесу Сміла, стрічка новин Сміла, Думки Сміла, новини Сміла сьогодні, останні новини сьогодні Сміла, інформаційна агенція Сміла, інформація Сміла',
		];

		$city = [
			'name' => 'Сміла',
			'name_link' => 'smila',
			'main_link' => 'smila.index',
			'news_line' => 'news.line',
			'news_link' => 'smila.news',
		];

		$url = env("SERVER_API_URL") . '/smila/with-nn';
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
	public function umanHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Умань, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Умані, головні новини Умань, новини ТОП Умань, новини новини бізнесу Умань, стрічка новин Умань, Думки Умань, новини Умань сьогодні, останні новини сьогодні Умань, інформаційна агенція Умань, інформація Умань',
			'site' => 'Головні новини міста Умань, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/uman',
			'keywords' => 'Головний сайт Умані, головні новини Умань, новини ТОП Умань, новини новини бізнесу Умань, стрічка новин Умань, Думки Умань, новини Умань сьогодні, останні новини сьогодні Умань, інформаційна агенція Умань, інформація Умань',
		];

		$city = [
			'name' => 'Умань',
			'name_link' => 'uman',
			'main_link' => 'uman.index',
			'news_line' => 'news.line',
			'news_link' => 'uman.news',
		];

		$url = env("SERVER_API_URL") . '/uman/with-nn';
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
	public function vatutineHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Ватутіне, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ватутіне, головні новини Ватутіне, новини ТОП Ватутіне, новини новини бізнесу Ватутіне, стрічка новин Ватутіне, Думки Ватутіне, новини Ватутіне сьогодні, останні новини сьогодні Ватутіне, інформаційна агенція Ватутіне, інформація Ватутіне',
			'site' => 'Головні новини міста Ватутіне, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vatutine',
			'keywords' => 'Головний сайт Ватутіне, головні новини Ватутіне, новини ТОП Ватутіне, новини новини бізнесу Ватутіне, стрічка новин Ватутіне, Думки Ватутіне, новини Ватутіне сьогодні, останні новини сьогодні Ватутіне, інформаційна агенція Ватутіне, інформація Ватутіне',
		];

		$city = [
			'name' => 'Ватутіне',
			'name_link' => 'vatutine',
			'main_link' => 'vatutine.index',
			'news_line' => 'news.line',
			'news_link' => 'vatutine.news',
		];

		$url = env("SERVER_API_URL") . '/vatutine/with-nn';
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
	public function zolotonoshaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Золотоноша, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Золотоноша, головні новини Золотоноша, новини ТОП Золотоноша, новини новини бізнесу Золотоноша, стрічка новин Золотоноша, Думки Золотоноша, новини Золотоноша сьогодні, останні новини сьогодні Золотоноша, інформаційна агенція Золотоноша, інформація Золотоноша',
			'site' => 'Головні новини міста Золотоноша, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zolotonosha',
			'keywords' => 'Головний сайт Золотоноша, головні новини Золотоноша, новини ТОП Золотоноша, новини новини бізнесу Золотоноша, стрічка новин Золотоноша, Думки Золотоноша, новини Золотоноша сьогодні, останні новини сьогодні Золотоноша, інформаційна агенція Золотоноша, інформація Золотоноша',
		];

		$city = [
			'name' => 'Золотоноша',
			'name_link' => 'zolotonosha',
			'main_link' => 'zolotonosha.index',
			'news_line' => 'news.line',
			'news_link' => 'zolotonosha.news',
		];

		$url = env("SERVER_API_URL") . '/zolotonosha/with-nn';
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
	public function zvenyhorodkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Звенигородка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Звенигородки, головні новини Звенигородка, новини ТОП Звенигородка, новини новини бізнесу Звенигородка, стрічка новин Звенигородка, Думки Звенигородка, новини Звенигородка сьогодні, останні новини сьогодні Звенигородка, інформаційна агенція Звенигородка, інформація Звенигородка',
			'site' => 'Головні новини міста Звенигородка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/',
			'keywords' => 'Головний сайт Звенигородки, головні новини Звенигородка, новини ТОП Звенигородка, новини новини бізнесу Звенигородка, стрічка новин Звенигородка, Думки Звенигородка, новини Звенигородка сьогодні, останні новини сьогодні Звенигородка, інформаційна агенція Звенигородка, інформація Звенигородка',
		];

		$city = [
			'name' => 'Звенигородка',
			'name_link' => 'zvenyhorodka',
			'main_link' => 'zvenyhorodka.index',
			'news_line' => 'news.line',
			'news_link' => 'zvenyhorodka.news',
		];

		$url = env("SERVER_API_URL") . '/zvenyhorodka/with-nn';
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
