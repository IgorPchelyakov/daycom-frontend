<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class ZaporizhzhiaNewsController extends Controller
{
	public function berdyanskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Бердянськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бердянськ, головні новини Бердянськ, новини ТОП Бердянськ, новини новини бізнесу Бердянськ, стрічка новин Бердянськ, Думки Бердянськ, новини Бердянськ сьогодні, останні новини сьогодні Бердянськ, інформаційна агенція Бердянськ, інформація Бердянськ',
			'site' => 'Головні новини міста Бердянськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/berdyansk',
			'keywords' => 'Головний сайт Бердянськ, головні новини Бердянськ, новини ТОП Бердянськ, новини новини бізнесу Бердянськ, стрічка новин Бердянськ, Думки Бердянськ, новини Бердянськ сьогодні, останні новини сьогодні Бердянськ, інформаційна агенція Бердянськ, інформація Бердянськ',
		];

		$city = [
			'name' => 'Бердянськ',
			'name_link' => 'berdyansk',
			'main_link' => 'berdyansk.index',
			'news_line' => 'news.line',
			'news_link' => 'berdyansk.news',
		];

		$url = env("SERVER_API_URL") . '/berdyansk/with-nn';
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
	public function dniprorudneHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Дніпрорудне, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Дніпрорудне, головні новини Дніпрорудне, новини ТОП Дніпрорудне, новини новини бізнесу Дніпрорудне, стрічка новин Дніпрорудне, Думки Дніпрорудне, новини Дніпрорудне сьогодні, останні новини сьогодні Дніпрорудне, інформаційна агенція Дніпрорудне, інформація Дніпрорудне',
			'site' => 'Головні новини міста Дніпрорудне, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/dniprorudne',
			'keywords' => 'Головний сайт Дніпрорудне, головні новини Дніпрорудне, новини ТОП Дніпрорудне, новини новини бізнесу Дніпрорудне, стрічка новин Дніпрорудне, Думки Дніпрорудне, новини Дніпрорудне сьогодні, останні новини сьогодні Дніпрорудне, інформаційна агенція Дніпрорудне, інформація Дніпрорудне',
		];

		$city = [
			'name' => 'Дніпрорудне',
			'name_link' => 'dniprorudne',
			'main_link' => 'dniprorudne.index',
			'news_line' => 'news.line',
			'news_link' => 'dniprorudne.news',
		];

		$url = env("SERVER_API_URL") . '/dniprorudne/with-nn';
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
	public function energodarHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Енергодар, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Енергодар, головні новини Енергодар, новини ТОП Енергодар, новини новини бізнесу Енергодар, стрічка новин Енергодар, Думки Енергодар, новини Енергодар сьогодні, останні новини сьогодні Енергодар, інформаційна агенція Енергодар, інформація Енергодар',
			'site' => 'Головні новини міста Енергодар, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/energodar',
			'keywords' => 'Головний сайт Енергодар, головні новини Енергодар, новини ТОП Енергодар, новини новини бізнесу Енергодар, стрічка новин Енергодар, Думки Енергодар, новини Енергодар сьогодні, останні новини сьогодні Енергодар, інформаційна агенція Енергодар, інформація Енергодар',
		];

		$city = [
			'name' => 'Енергодар',
			'name_link' => 'energodar',
			'main_link' => 'energodar.index',
			'news_line' => 'news.line',
			'news_link' => 'energodar.news',
		];

		$url = env("SERVER_API_URL") . '/energodar/with-nn';
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
	public function melitopolHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Мелітополь, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Мелітополь, головні новини Мелітополь, новини ТОП Мелітополь, новини новини бізнесу Мелітополь, стрічка новин Мелітополь, Думки Мелітополь, новини Мелітополь сьогодні, останні новини сьогодні Мелітополь, інформаційна агенція Мелітополь, інформація Мелітополь',
			'site' => 'Головні новини міста Мелітополь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/melitopol',
			'keywords' => 'Головний сайт Мелітополь, головні новини Мелітополь, новини ТОП Мелітополь, новини новини бізнесу Мелітополь, стрічка новин Мелітополь, Думки Мелітополь, новини Мелітополь сьогодні, останні новини сьогодні Мелітополь, інформаційна агенція Мелітополь, інформація Мелітополь',
		];

		$city = [
			'name' => 'Мелітополь',
			'name_link' => 'melitopol',
			'main_link' => 'melitopol.index',
			'news_line' => 'news.line',
			'news_link' => 'melitopol.news',
		];

		$url = env("SERVER_API_URL") . '/melitopol/with-nn';
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
	public function pologyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Пологи, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Пологи, головні новини Пологи, новини ТОП Пологи, новини новини бізнесу Пологи, стрічка новин Пологи, Думки Пологи, новини Пологи сьогодні, останні новини сьогодні Пологи, інформаційна агенція Пологи, інформація Пологи',
			'site' => 'Головні новини міста Пологи, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pology',
			'keywords' => 'Головний сайт Пологи, головні новини Пологи, новини ТОП Пологи, новини новини бізнесу Пологи, стрічка новин Пологи, Думки Пологи, новини Пологи сьогодні, останні новини сьогодні Пологи, інформаційна агенція Пологи, інформація Пологи',
		];

		$city = [
			'name' => 'Пологи',
			'name_link' => 'pology',
			'main_link' => 'pology.index',
			'news_line' => 'news.line',
			'news_link' => 'pology.news',
		];

		$url = env("SERVER_API_URL") . '/pology/with-nn';
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
	public function tokmakHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Токмак, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Токмак, головні новини Токмак, новини ТОП Токмак, новини новини бізнесу Токмак, стрічка новин Токмак, Думки Токмак, новини Токмак сьогодні, останні новини сьогодні Токмак, інформаційна агенція Токмак, інформація Токмак',
			'site' => 'Головні новини міста Токмак, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/tokmak',
			'keywords' => 'Головний сайт Токмак, головні новини Токмак, новини ТОП Токмак, новини новини бізнесу Токмак, стрічка новин Токмак, Думки Токмак, новини Токмак сьогодні, останні новини сьогодні Токмак, інформаційна агенція Токмак, інформація Токмак',
		];

		$city = [
			'name' => 'Токмак',
			'name_link' => 'tokmak',
			'main_link' => 'tokmak.index',
			'news_line' => 'news.line',
			'news_link' => 'tokmak.news',
		];

		$url = env("SERVER_API_URL") . '/tokmak/with-nn';
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
	public function zaporizhzhiaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Запоріжжя, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Запоріжжя, головні новини Запоріжжя, новини ТОП Запоріжжя, новини новини бізнесу Запоріжжя, стрічка новин Запоріжжя, Думки Запоріжжя, новини Запоріжжя сьогодні, останні новини сьогодні Запоріжжя, інформаційна агенція Запоріжжя, інформація Запоріжжя',
			'site' => 'Головні новини міста Запоріжжя, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zaporizhzhia',
			'keywords' => 'Головний сайт Запоріжжя, головні новини Запоріжжя, новини ТОП Запоріжжя, новини новини бізнесу Запоріжжя, стрічка новин Запоріжжя, Думки Запоріжжя, новини Запоріжжя сьогодні, останні новини сьогодні Запоріжжя, інформаційна агенція Запоріжжя, інформація Запоріжжя',
		];

		$city = [
			'name' => 'Запоріжжя',
			'name_link' => 'zaporizhzhia',
			'main_link' => 'zaporizhzhia.index',
			'news_line' => 'news.line',
			'news_link' => 'zaporizhzhia.news',
		];

		$url = env("SERVER_API_URL") . '/zaporizhzhia/with-nn';
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
