<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class LvivNewsController extends Controller
{
	public function boryslavHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Борислав, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Борислава, головні новини Борислав, новини ТОП Борислав, новини новини бізнесу Борислав, стрічка новин Борислав, Думки Борислав, новини Борислав сьогодні, останні новини сьогодні Борислав, інформаційна агенція Борислав, інформація Борислав',
			'site' => 'Головні новини міста Борислав, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/boryslav',
			'keywords' => 'Головний сайт Борислава, головні новини Борислав, новини ТОП Борислав, новини новини бізнесу Борислав, стрічка новин Борислав, Думки Борислав, новини Борислав сьогодні, останні новини сьогодні Борислав, інформаційна агенція Борислав, інформація Борислав',
		];

		$city = [
			'name' => 'Борислав',
			'name_link' => 'boryslav',
			'main_link' => 'boryslav.index',
			'news_line' => 'news.line',
			'news_link' => 'boryslav.news',
		];

		$url = env("SERVER_API_URL") . '/boryslav/with-nn';
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
	public function brodyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Броди, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Броди, головні новини Броди, новини ТОП Броди, новини новини бізнесу Броди, стрічка новин Броди, Думки Броди, новини Броди сьогодні, останні новини сьогодні Броди, інформаційна агенція Броди, інформація Броди',
			'site' => 'Головні новини міста Броди, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/brody',
			'keywords' => 'Головний сайт Броди, головні новини Броди, новини ТОП Броди, новини новини бізнесу Броди, стрічка новин Броди, Думки Броди, новини Броди сьогодні, останні новини сьогодні Броди, інформаційна агенція Броди, інформація Броди',
		];

		$city = [
			'name' => 'Броди',
			'name_link' => 'brody',
			'main_link' => 'brody.index',
			'news_line' => 'news.line',
			'news_link' => 'brody.news',
		];

		$url = env("SERVER_API_URL") . '/brody/with-nn';
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
	public function chervonogradHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Червоноград, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Червонограда, головні новини Червоноград, новини ТОП Червоноград, новини новини бізнесу Червоноград, стрічка новин Червоноград, Думки Червоноград, новини Червоноград сьогодні, останні новини сьогодні Червоноград, інформаційна агенція Червоноград, інформація Червоноград',
			'site' => 'Головні новини міста Червоноград, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/chervonograd',
			'keywords' => 'Головний сайт Червонограда, головні новини Червоноград, новини ТОП Червоноград, новини новини бізнесу Червоноград, стрічка новин Червоноград, Думки Червоноград, новини Червоноград сьогодні, останні новини сьогодні Червоноград, інформаційна агенція Червоноград, інформація Червоноград',
		];

		$city = [
			'name' => 'Червоноград',
			'name_link' => 'chervonograd',
			'main_link' => 'chervonograd.index',
			'news_line' => 'news.line',
			'news_link' => 'chervonograd.news',
		];

		$url = env("SERVER_API_URL") . '/chervonograd/with-nn';
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
	public function drohobychHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Дрогобич, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Дрогобичі, головні новини Дрогобич, новини ТОП Дрогобич, новини новини бізнесу Дрогобич, стрічка новин Дрогобич, Думки Дрогобич, новини Дрогобич сьогодні, останні новини сьогодні Дрогобич, інформаційна агенція Дрогобич, інформація Дрогобич',
			'site' => 'Головні новини міста Дрогобич, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/drohobych',
			'keywords' => 'Головний сайт Дрогобичі, головні новини Дрогобич, новини ТОП Дрогобич, новини новини бізнесу Дрогобич, стрічка новин Дрогобич, Думки Дрогобич, новини Дрогобич сьогодні, останні новини сьогодні Дрогобич, інформаційна агенція Дрогобич, інформація Дрогобич',
		];

		$city = [
			'name' => 'Дрогобич',
			'name_link' => 'drohobych',
			'main_link' => 'drohobych.index',
			'news_line' => 'news.line',
			'news_link' => 'drohobych.news',
		];

		$url = env("SERVER_API_URL") . '/drohobych/with-nn';
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
	public function lvivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Львів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Львова, головні новини Львів, новини ТОП Львів, новини новини бізнесу Львів, стрічка новин Львів, Думки Львів, новини Львів сьогодні, останні новини Львів сьогодні,  інформаційна агенція Львів, інформація Львів',
			'site' => 'Головні новини міста Львів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/lviv',
			'keywords' => 'Головний сайт Львова, головні новини Львів, новини ТОП Львів, новини новини бізнесу Львів, стрічка новин Львів, Думки Львів, новини Львів сьогодні, останні новини Львів сьогодні,  інформаційна агенція Львів, інформація Львів',
		];

		$city = [
			'name' => 'Львів',
			'name_link' => 'lviv',
			'main_link' => 'lviv.index',
			'news_line' => 'news.line',
			'news_link' => 'lviv.news',
		];

		$url = env("SERVER_API_URL") . '/lviv/with-nn';
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
	public function novoyavorivskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Новояворівськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Новояворівська, головні новини Новояворівськ, новини ТОП Новояворівськ, новини новини бізнесу Новояворівськ, стрічка новин Новояворівськ, Думки Новояворівськ, новини Новояворівськ сьогодні, останні новини сьогодні Новояворівськ, інформаційна агенція Новояворівськ, інформація Новояворівськ',
			'site' => 'Головні новини міста Новояворівськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/novoyavorivsk',
			'keywords' => 'Головний сайт Новояворівська, головні новини Новояворівськ, новини ТОП Новояворівськ, новини новини бізнесу Новояворівськ, стрічка новин Новояворівськ, Думки Новояворівськ, новини Новояворівськ сьогодні, останні новини сьогодні Новояворівськ, інформаційна агенція Новояворівськ, інформація Новояворівськ',
		];

		$city = [
			'name' => 'Новояворівськ',
			'name_link' => 'novoyavorivsk',
			'main_link' => 'novoyavorivsk.index',
			'news_line' => 'news.line',
			'news_link' => 'novoyavorivsk.news',
		];

		$url = env("SERVER_API_URL") . '/novoyavorivsk/with-nn';
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
	public function noviyRozdilHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Новий Розділ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Новий Розділ, головні новини Новий Розділ, новини ТОП Новий Розділ, новини новини бізнесу Новий Розділ, стрічка новин Новий Розділ, Думки Новий Розділ, новини Новий Розділ сьогодні, останні новини сьогодні Новий Розділ, інформаційна агенція Новий Розділ, інформація Новий Розділ',
			'site' => 'Головні новини міста Новий Розділ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/noviy-rozdil',
			'keywords' => 'Головний сайт Новий Розділ, головні новини Новий Розділ, новини ТОП Новий Розділ, новини новини бізнесу Новий Розділ, стрічка новин Новий Розділ, Думки Новий Розділ, новини Новий Розділ сьогодні, останні новини сьогодні Новий Розділ, інформаційна агенція Новий Розділ, інформація Новий Розділ',
		];

		$city = [
			'name' => 'Новий Розділ',
			'name_link' => 'noviy-rozdil',
			'main_link' => 'noviy-rozdil.index',
			'news_line' => 'news.line',
			'news_link' => 'noviy-rozdil.news',
		];

		$url = env("SERVER_API_URL") . '/noviy-rozdil/with-nn';
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
	public function sambirHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Самбір, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Самбіра, головні новини Самбір, новини ТОП Самбір, новини новини бізнесу Самбір, стрічка новин Самбір, Думки Самбір, новини Самбір сьогодні, останні новини сьогодні Самбір,  інформаційна агенція Самбір, інформація Самбір',
			'site' => 'Головні новини міста Самбір, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/sambir',
			'keywords' => 'Головний сайт Самбіра, головні новини Самбір, новини ТОП Самбір, новини новини бізнесу Самбір, стрічка новин Самбір, Думки Самбір, новини Самбір сьогодні, останні новини сьогодні Самбір,  інформаційна агенція Самбір, інформація Самбір',
		];

		$city = [
			'name' => 'Самбір',
			'name_link' => 'sambir',
			'main_link' => 'sambir.index',
			'news_line' => 'news.line',
			'news_link' => 'sambir.news',
		];

		$url = env("SERVER_API_URL") . '/sambir/with-nn';
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
	public function sokalHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Сокаль, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Сокаль, головні новини Сокаль, новини ТОП Сокаль, новини новини бізнесу Сокаль, стрічка новин Сокаль, Думки Сокаль, новини Сокаль сьогодні, останні новини сьогодні Сокаль, інформаційна агенція Сокаль, інформація Сокаль',
			'site' => 'Головні новини міста Сокаль, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/sokal',
			'keywords' => 'Головний сайт Сокаль, головні новини Сокаль, новини ТОП Сокаль, новини новини бізнесу Сокаль, стрічка новин Сокаль, Думки Сокаль, новини Сокаль сьогодні, останні новини сьогодні Сокаль, інформаційна агенція Сокаль, інформація Сокаль',
		];

		$city = [
			'name' => 'Сокаль',
			'name_link' => 'sokal',
			'main_link' => 'sokal.index',
			'news_line' => 'news.line',
			'news_link' => 'sokal.news',
		];

		$url = env("SERVER_API_URL") . '/sokal/with-nn';
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
	public function stebnykHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Стебник, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Стебників, головні новини Стебник, новини ТОП Стебник, новини новини бізнесу Стебник, стрічка новин Стебник, Думки Стебник, новини Стебник сьогодні, останні новини сьогодні Стебник, інформаційна агенція Стебник, інформація Стебник',
			'site' => 'Головні новини міста Стебник, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/stebnyk',
			'keywords' => 'Головний сайт Стебників, головні новини Стебник, новини ТОП Стебник, новини новини бізнесу Стебник, стрічка новин Стебник, Думки Стебник, новини Стебник сьогодні, останні новини сьогодні Стебник, інформаційна агенція Стебник, інформація Стебник',
		];

		$city = [
			'name' => 'Стебник',
			'name_link' => 'stebnyk',
			'main_link' => 'stebnyk.index',
			'news_line' => 'news.line',
			'news_link' => 'stebnyk.news',
		];

		$url = env("SERVER_API_URL") . '/stebnyk/with-nn';
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
	public function striyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Стрий, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Стрий, головні новини Стрий, новини ТОП Стрий, новини новини бізнесу Стрий, стрічка новин Стрий, Думки Стрий, новини Стрий сьогодні, останні новини сьогодні Стрий,  інформаційна агенція Стрий, інформація Стрий',
			'site' => 'Головні новини міста Стрий, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/striy',
			'keywords' => 'Головний сайт Стрий, головні новини Стрий, новини ТОП Стрий, новини новини бізнесу Стрий, стрічка новин Стрий, Думки Стрий, новини Стрий сьогодні, останні новини сьогодні Стрий,  інформаційна агенція Стрий, інформація Стрий',
		];

		$city = [
			'name' => 'Стрий',
			'name_link' => 'striy',
			'main_link' => 'striy.index',
			'news_line' => 'news.line',
			'news_link' => 'striy.news',
		];

		$url = env("SERVER_API_URL") . '/striy/with-nn';
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
	public function truskavetsHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Трускавець, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Трускавецька, головні новини Трускавець, новини ТОП Трускавець, новини новини бізнесу Трускавець, стрічка новин Трускавець, Думки Трускавець, новини Трускавець сьогодні, останні новини сьогодні Трускавець, інформаційна агенція Трускавець, інформація Трускавець',
			'site' => 'Головні новини міста Трускавець, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/truskavets',
			'keywords' => 'Головний сайт Трускавецька, головні новини Трускавець, новини ТОП Трускавець, новини новини бізнесу Трускавець, стрічка новин Трускавець, Думки Трускавець, новини Трускавець сьогодні, останні новини сьогодні Трускавець, інформаційна агенція Трускавець, інформація Трускавець',
		];

		$city = [
			'name' => 'Трускавець',
			'name_link' => 'truskavets',
			'main_link' => 'truskavets.index',
			'news_line' => 'news.line',
			'news_link' => 'truskavets.news',
		];

		$url = env("SERVER_API_URL") . '/truskavets/with-nn';
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
	public function zolochivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Золочів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Золочів, головні новини Золочів, новини ТОП Золочів, новини новини бізнесу Золочів, стрічка новин Золочів, Думки Золочів, новини Золочів сьогодні, останні новини сьогодні Золочів, інформаційна агенція Золочів, інформація Золочів',
			'site' => 'Головні новини міста Золочів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zolochiv',
			'keywords' => 'Головний сайт Золочів, головні новини Золочів, новини ТОП Золочів, новини новини бізнесу Золочів, стрічка новин Золочів, Думки Золочів, новини Золочів сьогодні, останні новини сьогодні Золочів, інформаційна агенція Золочів, інформація Золочів',
		];

		$city = [
			'name' => 'Золочів',
			'name_link' => 'zolochiv',
			'main_link' => 'zolochiv.index',
			'news_line' => 'news.line',
			'news_link' => 'zolochiv.news',
		];

		$url = env("SERVER_API_URL") . '/zolochiv/with-nn';
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
