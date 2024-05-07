<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class DniproNewsController extends Controller
{
	public function dniproHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Дніпро, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Дніпра, головні новини Дніпро, новини ТОП Дніпро, новини новини бізнесу Дніпро, стрічка новин Дніпро, Думки Дніпро, новини Дніпро сьогодні, останні новини сьогодні Дніпро, інформаційна агенція Дніпро, інформація Дніпро',
			'site' => 'Головні новини міста Дніпро, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/dnipro',
			'keywords' => 'Головний сайт Дніпра, головні новини Дніпро, новини ТОП Дніпро, новини новини бізнесу Дніпро, стрічка новин Дніпро, Думки Дніпро, новини Дніпро сьогодні, останні новини сьогодні Дніпро, інформаційна агенція Дніпро, інформація Дніпро',
		];

		$city = [
			'name' => 'Дніпро',
			'name_link' => 'dnipro',
			'main_link' => 'dnipro.index',
			'news_line' => 'news.line',
			'news_link' => 'dnipro.news',
		];

		$url = env("SERVER_API_URL") . '/dnipro/with-nn';
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
	public function kamianskeHome()
	{
		$metaData = [
			'title' => "Головні новини міста Кам'янське, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт Кам'янського, головні новини Кам'янське, новини ТОП Житомир, новини новини бізнесу Кам'янське, стрічка новин Кам'янське, Думки Кам'янське, новини Кам'янське сьогодні, останні новини сьогодні Кам'янське, інформаційна агенція Кам'янське, інформація Кам'янське",
			'site' => "Головні новини міста Кам'янське, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/',
			'keywords' => "Головний сайт Кам'янського, головні новини Кам'янське, новини ТОП Житомир, новини новини бізнесу Кам'янське, стрічка новин Кам'янське, Думки Кам'янське, новини Кам'янськесьогодні, останні новини сьогодні Кам'янське, інформаційна агенція Кам'янське, інформація Кам'янське",
		];

		$city = [
			'name' => "Кам'янське",
			'name_link' => 'kamianske',
			'main_link' => 'kamianske.index',
			'news_line' => 'news.line',
			'news_link' => 'kamianske.news',
		];

		$url = env("SERVER_API_URL") . '/kamianske/with-nn';
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
	public function kryvyiRihHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Кривий Ріг, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Кривого Рогу, головні новини Кривий Ріг, новини ТОП Кривий Ріг, новини новини бізнесу Кривий Ріг, стрічка новин Кривий Ріг, Думки Кривий Ріг, новини Кривий Ріг сьогодні, останні новини сьогодні Кривий Ріг, інформаційна агенція Кривий Ріг, інформація Кривий Ріг',
			'site' => 'Головні новини міста Кривий Ріг, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kryvyi-rih',
			'keywords' => 'Головний сайт Кривого Рогу, головні новини Кривий Ріг, новини ТОП Кривий Ріг, новини новини бізнесу Кривий Ріг, стрічка новин Кривий Ріг, Думки Кривий Ріг, новини Кривий Ріг сьогодні, останні новини сьогодні Кривий Ріг, інформаційна агенція Кривий Ріг, інформація Кривий Ріг',
		];

		$city = [
			'name' => 'Кривий Ріг',
			'name_link' => 'kryvyi-rih',
			'main_link' => 'kryvyi-rih.index',
			'news_line' => 'news.line',
			'news_link' => 'kryvyi-rih.news',
		];

		$url = env("SERVER_API_URL") . '/kryvyi-rih/with-nn';
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
	public function marganetsHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Марганець, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Марганеців, головні новини Марганець, новини ТОП Марганець, новини новини бізнесу Марганець, стрічка новин Марганець, Думки Марганець, новини Марганець сьогодні, останні новини сьогодні Марганець, інформаційна агенція Марганець, інформація Марганець',
			'site' => 'Головні новини міста Марганець, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/marganets',
			'keywords' => 'Головний сайт Марганеців, головні новини Марганець, новини ТОП Марганець, новини новини бізнесу Марганець, стрічка новин Марганець, Думки Марганець, новини Марганець сьогодні, останні новини сьогодні Марганець, інформаційна агенція Марганець, інформація Марганець',
		];

		$city = [
			'name' => 'Марганець',
			'name_link' => 'marganets',
			'main_link' => 'marganets.index',
			'news_line' => 'news.line',
			'news_link' => 'marganets.news',
		];

		$url = env("SERVER_API_URL") . '/marganets/with-nn';
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
	public function nikopolHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Нікополь, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Нікополя, головні новини Нікополь, новини ТОП Нікополь, новини новини бізнесу Нікополь, стрічка новин Нікополь, Думки Нікополь, новини Нікополь сьогодні, останні новини сьогодні Нікополь, інформаційна агенція Нікополь, інформація Нікополь',
			'site' => 'Головні новини міста Нікополь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/nikopol',
			'keywords' => 'Головний сайт Нікополя, головні новини Нікополь, новини ТОП Нікополь, новини новини бізнесу Нікополь, стрічка новин Нікополь, Думки Нікополь, новини Нікополь сьогодні, останні новини сьогодні Нікополь, інформаційна агенція Нікополь, інформація Нікополь',
		];

		$city = [
			'name' => 'Нікополь',
			'name_link' => 'nikopol',
			'main_link' => 'nikopol.index',
			'news_line' => 'news.line',
			'news_link' => 'nikopol.news',
		];

		$url = env("SERVER_API_URL") . '/nikopol/with-nn';
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
	public function novomoskovskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Новомосковськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Новомосковська, головні новини Новомосковськ, новини ТОП Новомосковськ, новини новини бізнесу Новомосковськ, стрічка новин Новомосковськ, Думки Новомосковськ, новини Новомосковськ сьогодні, останні новини сьогодні Новомосковськ, інформаційна агенція Новомосковськ, інформація Новомосковськ',
			'site' => 'Головні новини міста Новомосковськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/novomoskovsk',
			'keywords' => 'Головний сайт Новомосковська, головні новини Новомосковськ, новини ТОП Новомосковськ, новини новини бізнесу Новомосковськ, стрічка новин Новомосковськ, Думки Новомосковськ, новини Новомосковськ сьогодні, останні новини сьогодні Новомосковськ, інформаційна агенція Новомосковськ, інформація Новомосковськ',
		];

		$city = [
			'name' => 'Новомосковськ',
			'name_link' => 'novomoskovsk',
			'main_link' => 'novomoskovsk.index',
			'news_line' => 'news.line',
			'news_link' => 'novomoskovsk.news',
		];

		$url = env("SERVER_API_URL") . '/novomoskovsk/with-nn';
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
	public function pavlogradHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Павлоград, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Павлограда, головні новини Павлоград, новини ТОП Павлоград, новини новини бізнесу Павлоград, стрічка новин Павлоград, Думки Павлоград, новини Павлоград сьогодні, останні новини сьогодні Павлоград, інформаційна агенція Павлоград, інформація Павлоград',
			'site' => 'Головні новини міста Павлоград, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pavlograd',
			'keywords' => 'Головний сайт Павлограда, головні новини Павлоград, новини ТОП Павлоград, новини новини бізнесу Павлоград, стрічка новин Павлоград, Думки Павлоград, новини Павлоград сьогодні, останні новини сьогодні Павлоград, інформаційна агенція Павлоград, інформація Павлоград',
		];

		$city = [
			'name' => 'Павлоград',
			'name_link' => 'pavlograd',
			'main_link' => 'pavlograd.index',
			'news_line' => 'news.line',
			'news_link' => 'pavlograd.news',
		];

		$url = env("SERVER_API_URL") . '/pavlograd/with-nn';
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
	public function pershotravenskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Першотравенськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Першотравенська, головні новини Першотравенськ, новини ТОП Першотравенськ, новини новини бізнесу Першотравенськ, стрічка новин Першотравенськ, Думки Першотравенськ, новини Першотравенськ сьогодні, останні новини сьогодні Першотравенськ, інформаційна агенція Першотравенськ, інформація Першотравенськ',
			'site' => 'Головні новини міста Першотравенськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pershotravensk',
			'keywords' => 'Головний сайт Першотравенська, головні новини Першотравенськ, новини ТОП Першотравенськ, новини новини бізнесу Першотравенськ, стрічка новин Першотравенськ, Думки Першотравенськ, новини Першотравенськ сьогодні, останні новини сьогодні Першотравенськ, інформаційна агенція Першотравенськ, інформація Першотравенськ',
		];

		$city = [
			'name' => 'Першотравенськ',
			'name_link' => 'pershotravensk',
			'main_link' => 'pershotravensk.index',
			'news_line' => 'news.line',
			'news_link' => 'pershotravensk.news',
		];

		$url = env("SERVER_API_URL") . '/pershotravensk/with-nn';
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
	public function pokrovHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Покров, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Покрова, головні новини Покров, новини ТОП Покров, новини новини бізнесу Покров, стрічка новин Покров, Думки Покров, новини Покров сьогодні, останні новини сьогодні Покров,  інформаційна агенція Покров, інформація Покров',
			'site' => 'Головні новини міста Покров, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pokrov',
			'keywords' => 'Головний сайт Покрова, головні новини Покров, новини ТОП Покров, новини новини бізнесу Покров, стрічка новин Покров, Думки Покров, новини Покров сьогодні, останні новини сьогодні Покров, інформаційна агенція Покров, інформація Покров',
		];

		$city = [
			'name' => 'Покров',
			'name_link' => 'pokrov',
			'main_link' => 'pokrov.index',
			'news_line' => 'news.line',
			'news_link' => 'pokrov.news',
		];

		$url = env("SERVER_API_URL") . '/pokrov/with-nn';
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
	public function pyatihatkyHome()
	{
		$metaData = [
			'title' => "Головні новини міста П'ятихатки, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт П'ятихатки, головні новини П'ятихатки, новини ТОП П'ятихатки, новини новини бізнесу П'ятихатки, стрічка новин П'ятихатки, Думки П'ятихатки, новини П'ятихатки сьогодні, останні новини сьогодні П'ятихатки, інформаційна агенція П'ятихатки, інформація П'ятихатки",
			'site' => "Головні новини міста П'ятихатки, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/pyatihatky',
			'keywords' => "Головний сайт П'ятихатки, головні новини П'ятихатки, новини ТОП П'ятихатки, новини новини бізнесу П'ятихатки, стрічка новин П'ятихатки, Думки П'ятихатки, новини П'ятихатки сьогодні, останні новини сьогодні П'ятихатки, інформаційна агенція П'ятихатки, інформація П'ятихатки",
		];

		$city = [
			'name' => "П'ятихатки",
			'name_link' => 'pyatihatky',
			'main_link' => 'pyatihatky.index',
			'news_line' => 'news.line',
			'news_link' => 'pyatihatky.news',
		];

		$url = env("SERVER_API_URL") . '/pyatihatky/with-nn';
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
	public function sinelnikovoHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Синельникове, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Синельникове, головні новини Синельникове, новини ТОП Синельникове, новини новини бізнесу Синельникове, стрічка новин Синельникове, Думки Синельникове, новини Синельникове сьогодні, останні новини сьогодні Синельникове,  інформаційна агенція Синельникове, інформація Синельникове',
			'site' => 'Головні новини міста Синельникове, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/sinelnikovo',
			'keywords' => 'Головний сайт Синельникове, головні новини Синельникове, новини ТОП Синельникове, новини новини бізнесу Синельникове, стрічка новин Синельникове, Думки Синельникове, новини Синельникове сьогодні, останні новини сьогодні Синельникове,  інформаційна агенція Синельникове, інформація Синельникове',
		];

		$city = [
			'name' => 'Синельникове',
			'name_link' => 'sinelnikovo',
			'main_link' => 'sinelnikovo.index',
			'news_line' => 'news.line',
			'news_link' => 'sinelnikovo.news',
		];

		$url = env("SERVER_API_URL") . '/sinelnikovo/with-nn';
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
	public function ternivkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Тернівка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Тернівки, головні новини Тернівка, новини ТОП Тернівка, новини новини бізнесу Тернівка, стрічка новин Тернівка, Думки Тернівка, новини Тернівка сьогодні, останні новини сьогодні Тернівка, інформаційна агенція Тернівка, інформація Тернівка',
			'site' => 'Головні новини міста Тернівка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/ternivka',
			'keywords' => 'Головний сайт Тернівки, головні новини Тернівка, новини ТОП Тернівка, новини новини бізнесу Тернівка, стрічка новин Тернівка, Думки Тернівка, новини Тернівка сьогодні, останні новини сьогодні Тернівка, інформаційна агенція Тернівка, інформація Тернівка',
		];

		$city = [
			'name' => 'Тернівка',
			'name_link' => 'ternivka',
			'main_link' => 'ternivka.index',
			'news_line' => 'news.line',
			'news_link' => 'ternivka.news',
		];

		$url = env("SERVER_API_URL") . '/ternivka/with-nn';
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
	public function vilnohorskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Вільногірськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вільногірська, головні новини Вільногірськ, новини ТОП Вільногірськ, новини новини бізнесу Вільногірськ, стрічка новин Вільногірськ, Думки Вільногірськ, новини Вільногірськ сьогодні, останні новини сьогодні Вільногірськ, інформаційна агенція Вільногірськ, інформація Вільногірськ',
			'site' => 'Головні новини міста Вільногірськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vilnohorsk',
			'keywords' => 'Головний сайт Вільногірська, головні новини Вільногірськ, новини ТОП Вільногірськ, новини новини бізнесу Вільногірськ, стрічка новин Вільногірськ, Думки Вільногірськ, новини Вільногірськ сьогодні, останні новини сьогодні Вільногірськ, інформаційна агенція Вільногірськ, інформація Вільногірськ',
		];

		$city = [
			'name' => 'Вільногірськ',
			'name_link' => 'vilnohorsk',
			'main_link' => 'vilnohorsk.index',
			'news_line' => 'news.line',
			'news_link' => 'vilnohorsk.news',
		];

		$url = env("SERVER_API_URL") . '/vilnohorsk/with-nn';
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
	public function zhovtiVodyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Жовті Води, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Жовтих Вод, головні новини Жовті Води, новини ТОП Жовті Води, новини новини бізнесу Жовті Води, стрічка новин Жовті Води, Думки Жовті Води, новини Жовті Води сьогодні, останні новини сьогодні Жовті Води, інформаційна агенція Жовті Води, інформація Жовті Води',
			'site' => 'Головні новини міста Жовті Води, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zhovti-vody',
			'keywords' => 'Головний сайт Жовтих Вод, головні новини Жовті Води, новини ТОП Жовті Води, новини новини бізнесу Жовті Води, стрічка новин Жовті Води, Думки Жовті Води, новини Жовті Води сьогодні, останні новини сьогодні Жовті Води, інформаційна агенція Жовті Води, інформація Жовті Води',
		];

		$city = [
			'name' => 'Жовті Води',
			'name_link' => 'zhovti-vody',
			'main_link' => 'zhovti-vody.index',
			'news_line' => 'news.line',
			'news_link' => 'zhovti-vody.news',
		];

		$url = env("SERVER_API_URL") . '/zhovti-vody/with-nn';
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

	public function dniproLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Дніпро, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Дніпра, головні новини Дніпро, новини ТОП Дніпро, новини новини бізнесу Дніпро, стрічка новин Дніпро, Думки Дніпро, новини Дніпро сьогодні, останні новини сьогодні Дніпро, інформаційна агенція Дніпро, інформація Дніпро',
			'site' => 'Головні новини міста Дніпро, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/dnipro',
			'keywords' => 'Головний сайт Дніпра, головні новини Дніпро, новини ТОП Дніпро, новини новини бізнесу Дніпро, стрічка новин Дніпро, Думки Дніпро, новини Дніпро сьогодні, останні новини сьогодні Дніпро, інформаційна агенція Дніпро, інформація Дніпро',
		];

		$city = [
			'name' => 'Дніпро',
			'name_link' => 'dnipro',
			'main_link' => 'dnipro.index',
			'news_line' => 'news.line',
			'news_link' => 'dnipro.news',
		];

		$url = 'https://sside.daycom.com.ua/api/dnipro/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function kamianskeLine()
	{
		$metaData = [
			'title' => "Головні новини міста Кам'янське, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт Кам'янського, головні новини Кам'янське, новини ТОП Житомир, новини новини бізнесу Кам'янське, стрічка новин Кам'янське, Думки Кам'янське, новини Кам'янське сьогодні, останні новини сьогодні Кам'янське, інформаційна агенція Кам'янське, інформація Кам'янське",
			'site' => "Головні новини міста Кам'янське, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/',
			'keywords' => "Головний сайт Кам'янського, головні новини Кам'янське, новини ТОП Житомир, новини новини бізнесу Кам'янське, стрічка новин Кам'янське, Думки Кам'янське, новини Кам'янськесьогодні, останні новини сьогодні Кам'янське, інформаційна агенція Кам'янське, інформація Кам'янське",
		];

		$city = [
			'name' => "Кам'янське",
			'name_link' => 'kamianske',
			'main_link' => 'kamianske.index',
			'news_line' => 'news.line',
			'news_link' => 'kamianske.news',
		];

		$url = 'https://sside.daycom.com.ua/api/kamianske/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function kryvyiRihLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Кривий Ріг, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Кривого Рогу, головні новини Кривий Ріг, новини ТОП Кривий Ріг, новини новини бізнесу Кривий Ріг, стрічка новин Кривий Ріг, Думки Кривий Ріг, новини Кривий Ріг сьогодні, останні новини сьогодні Кривий Ріг, інформаційна агенція Кривий Ріг, інформація Кривий Ріг',
			'site' => 'Головні новини міста Кривий Ріг, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kryvyi-rih',
			'keywords' => 'Головний сайт Кривого Рогу, головні новини Кривий Ріг, новини ТОП Кривий Ріг, новини новини бізнесу Кривий Ріг, стрічка новин Кривий Ріг, Думки Кривий Ріг, новини Кривий Ріг сьогодні, останні новини сьогодні Кривий Ріг, інформаційна агенція Кривий Ріг, інформація Кривий Ріг',
		];

		$city = [
			'name' => 'Кривий Ріг',
			'name_link' => 'kryvyi-rih',
			'main_link' => 'kryvyi-rih.index',
			'news_line' => 'news.line',
			'news_link' => 'kryvyi-rih.news',
		];

		$url = 'https://sside.daycom.com.ua/api/kryvyi-rih/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function marganetsLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Марганець, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Марганеців, головні новини Марганець, новини ТОП Марганець, новини новини бізнесу Марганець, стрічка новин Марганець, Думки Марганець, новини Марганець сьогодні, останні новини сьогодні Марганець, інформаційна агенція Марганець, інформація Марганець',
			'site' => 'Головні новини міста Марганець, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/marganets',
			'keywords' => 'Головний сайт Марганеців, головні новини Марганець, новини ТОП Марганець, новини новини бізнесу Марганець, стрічка новин Марганець, Думки Марганець, новини Марганець сьогодні, останні новини сьогодні Марганець, інформаційна агенція Марганець, інформація Марганець',
		];

		$city = [
			'name' => 'Марганець',
			'name_link' => 'marganets',
			'main_link' => 'marganets.index',
			'news_line' => 'news.line',
			'news_link' => 'marganets.news',
		];

		$url = 'https://sside.daycom.com.ua/api/marganets/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function nikopolLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Нікополь, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Нікополя, головні новини Нікополь, новини ТОП Нікополь, новини новини бізнесу Нікополь, стрічка новин Нікополь, Думки Нікополь, новини Нікополь сьогодні, останні новини сьогодні Нікополь, інформаційна агенція Нікополь, інформація Нікополь',
			'site' => 'Головні новини міста Нікополь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/nikopol',
			'keywords' => 'Головний сайт Нікополя, головні новини Нікополь, новини ТОП Нікополь, новини новини бізнесу Нікополь, стрічка новин Нікополь, Думки Нікополь, новини Нікополь сьогодні, останні новини сьогодні Нікополь, інформаційна агенція Нікополь, інформація Нікополь',
		];

		$city = [
			'name' => 'Нікополь',
			'name_link' => 'nikopol',
			'main_link' => 'nikopol.index',
			'news_line' => 'news.line',
			'news_link' => 'nikopol.news',
		];

		$url = 'https://sside.daycom.com.ua/api/nikopol/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function novomoskovskLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Новомосковськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Новомосковська, головні новини Новомосковськ, новини ТОП Новомосковськ, новини новини бізнесу Новомосковськ, стрічка новин Новомосковськ, Думки Новомосковськ, новини Новомосковськ сьогодні, останні новини сьогодні Новомосковськ, інформаційна агенція Новомосковськ, інформація Новомосковськ',
			'site' => 'Головні новини міста Новомосковськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/novomoskovsk',
			'keywords' => 'Головний сайт Новомосковська, головні новини Новомосковськ, новини ТОП Новомосковськ, новини новини бізнесу Новомосковськ, стрічка новин Новомосковськ, Думки Новомосковськ, новини Новомосковськ сьогодні, останні новини сьогодні Новомосковськ, інформаційна агенція Новомосковськ, інформація Новомосковськ',
		];

		$city = [
			'name' => 'Новомосковськ',
			'name_link' => 'novomoskovsk',
			'main_link' => 'novomoskovsk.index',
			'news_line' => 'news.line',
			'news_link' => 'novomoskovsk.news',
		];

		$url = 'https://sside.daycom.com.ua/api/novomoskovsk/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function pavlogradLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Павлоград, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Павлограда, головні новини Павлоград, новини ТОП Павлоград, новини новини бізнесу Павлоград, стрічка новин Павлоград, Думки Павлоград, новини Павлоград сьогодні, останні новини сьогодні Павлоград, інформаційна агенція Павлоград, інформація Павлоград',
			'site' => 'Головні новини міста Павлоград, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pavlograd',
			'keywords' => 'Головний сайт Павлограда, головні новини Павлоград, новини ТОП Павлоград, новини новини бізнесу Павлоград, стрічка новин Павлоград, Думки Павлоград, новини Павлоград сьогодні, останні новини сьогодні Павлоград, інформаційна агенція Павлоград, інформація Павлоград',
		];

		$city = [
			'name' => 'Павлоград',
			'name_link' => 'pavlograd',
			'main_link' => 'pavlograd.index',
			'news_line' => 'news.line',
			'news_link' => 'pavlograd.news',
		];

		$url = 'https://sside.daycom.com.ua/api/pavlograd/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function pershotravenskLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Першотравенськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Першотравенська, головні новини Першотравенськ, новини ТОП Першотравенськ, новини новини бізнесу Першотравенськ, стрічка новин Першотравенськ, Думки Першотравенськ, новини Першотравенськ сьогодні, останні новини сьогодні Першотравенськ, інформаційна агенція Першотравенськ, інформація Першотравенськ',
			'site' => 'Головні новини міста Першотравенськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pershotravensk',
			'keywords' => 'Головний сайт Першотравенська, головні новини Першотравенськ, новини ТОП Першотравенськ, новини новини бізнесу Першотравенськ, стрічка новин Першотравенськ, Думки Першотравенськ, новини Першотравенськ сьогодні, останні новини сьогодні Першотравенськ, інформаційна агенція Першотравенськ, інформація Першотравенськ',
		];

		$city = [
			'name' => 'Першотравенськ',
			'name_link' => 'pershotravensk',
			'main_link' => 'pershotravensk.index',
			'news_line' => 'news.line',
			'news_link' => 'pershotravensk.news',
		];

		$url = 'https://sside.daycom.com.ua/api/pershotravensk/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function pokrovLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Покров, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Покрова, головні новини Покров, новини ТОП Покров, новини новини бізнесу Покров, стрічка новин Покров, Думки Покров, новини Покров сьогодні, останні новини сьогодні Покров,  інформаційна агенція Покров, інформація Покров',
			'site' => 'Головні новини міста Покров, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pokrov',
			'keywords' => 'Головний сайт Покрова, головні новини Покров, новини ТОП Покров, новини новини бізнесу Покров, стрічка новин Покров, Думки Покров, новини Покров сьогодні, останні новини сьогодні Покров, інформаційна агенція Покров, інформація Покров',
		];

		$city = [
			'name' => 'Покров',
			'name_link' => 'pokrov',
			'main_link' => 'pokrov.index',
			'news_line' => 'news.line',
			'news_link' => 'pokrov.news',
		];

		$url = 'https://sside.daycom.com.ua/api/pokrov/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function pyatihatkyLine()
	{
		$metaData = [
			'title' => "Головні новини міста П'ятихатки, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт П'ятихатки, головні новини П'ятихатки, новини ТОП П'ятихатки, новини новини бізнесу П'ятихатки, стрічка новин П'ятихатки, Думки П'ятихатки, новини П'ятихатки сьогодні, останні новини сьогодні П'ятихатки, інформаційна агенція П'ятихатки, інформація П'ятихатки",
			'site' => "Головні новини міста П'ятихатки, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/pyatihatky',
			'keywords' => "Головний сайт П'ятихатки, головні новини П'ятихатки, новини ТОП П'ятихатки, новини новини бізнесу П'ятихатки, стрічка новин П'ятихатки, Думки П'ятихатки, новини П'ятихатки сьогодні, останні новини сьогодні П'ятихатки, інформаційна агенція П'ятихатки, інформація П'ятихатки",
		];

		$city = [
			'name' => "П'ятихатки",
			'name_link' => 'pyatihatky',
			'main_link' => 'pyatihatky.index',
			'news_line' => 'news.line',
			'news_link' => 'pyatihatky.news',
		];

		$url = 'https://sside.daycom.com.ua/api/pyatihatky/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function sinelnikovoLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Синельникове, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Синельникове, головні новини Синельникове, новини ТОП Синельникове, новини новини бізнесу Синельникове, стрічка новин Синельникове, Думки Синельникове, новини Синельникове сьогодні, останні новини сьогодні Синельникове,  інформаційна агенція Синельникове, інформація Синельникове',
			'site' => 'Головні новини міста Синельникове, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/sinelnikovo',
			'keywords' => 'Головний сайт Синельникове, головні новини Синельникове, новини ТОП Синельникове, новини новини бізнесу Синельникове, стрічка новин Синельникове, Думки Синельникове, новини Синельникове сьогодні, останні новини сьогодні Синельникове,  інформаційна агенція Синельникове, інформація Синельникове',
		];

		$city = [
			'name' => 'Синельникове',
			'name_link' => 'sinelnikovo',
			'main_link' => 'sinelnikovo.index',
			'news_line' => 'news.line',
			'news_link' => 'sinelnikovo.news',
		];

		$url = 'https://sside.daycom.com.ua/api/sinelnikovo/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function ternivkaLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Тернівка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Тернівки, головні новини Тернівка, новини ТОП Тернівка, новини новини бізнесу Тернівка, стрічка новин Тернівка, Думки Тернівка, новини Тернівка сьогодні, останні новини сьогодні Тернівка, інформаційна агенція Тернівка, інформація Тернівка',
			'site' => 'Головні новини міста Тернівка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/ternivka',
			'keywords' => 'Головний сайт Тернівки, головні новини Тернівка, новини ТОП Тернівка, новини новини бізнесу Тернівка, стрічка новин Тернівка, Думки Тернівка, новини Тернівка сьогодні, останні новини сьогодні Тернівка, інформаційна агенція Тернівка, інформація Тернівка',
		];

		$city = [
			'name' => 'Тернівка',
			'name_link' => 'ternivka',
			'main_link' => 'ternivka.index',
			'news_line' => 'news.line',
			'news_link' => 'ternivka.news',
		];

		$url = 'https://sside.daycom.com.ua/api/ternivka/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function vilnohorskLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Вільногірськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вільногірська, головні новини Вільногірськ, новини ТОП Вільногірськ, новини новини бізнесу Вільногірськ, стрічка новин Вільногірськ, Думки Вільногірськ, новини Вільногірськ сьогодні, останні новини сьогодні Вільногірськ, інформаційна агенція Вільногірськ, інформація Вільногірськ',
			'site' => 'Головні новини міста Вільногірськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vilnohorsk',
			'keywords' => 'Головний сайт Вільногірська, головні новини Вільногірськ, новини ТОП Вільногірськ, новини новини бізнесу Вільногірськ, стрічка новин Вільногірськ, Думки Вільногірськ, новини Вільногірськ сьогодні, останні новини сьогодні Вільногірськ, інформаційна агенція Вільногірськ, інформація Вільногірськ',
		];

		$city = [
			'name' => 'Вільногірськ',
			'name_link' => 'vilnohorsk',
			'main_link' => 'vilnohorsk.index',
			'news_line' => 'news.line',
			'news_link' => 'vilnohorsk.news',
		];

		$url = 'https://sside.daycom.com.ua/api/vilnohorsk/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}
	public function zhovtiVodyLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Жовті Води, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Жовтих Вод, головні новини Жовті Води, новини ТОП Жовті Води, новини новини бізнесу Жовті Води, стрічка новин Жовті Води, Думки Жовті Води, новини Жовті Води сьогодні, останні новини сьогодні Жовті Води, інформаційна агенція Жовті Води, інформація Жовті Води',
			'site' => 'Головні новини міста Жовті Води, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zhovti-vody',
			'keywords' => 'Головний сайт Жовтих Вод, головні новини Жовті Води, новини ТОП Жовті Води, новини новини бізнесу Жовті Води, стрічка новин Жовті Води, Думки Жовті Води, новини Жовті Води сьогодні, останні новини сьогодні Жовті Води, інформаційна агенція Жовті Води, інформація Жовті Води',
		];

		$city = [
			'name' => 'Жовті Води',
			'name_link' => 'zhovti-vody',
			'main_link' => 'zhovti-vody.index',
			'news_line' => 'news.line',
			'news_link' => 'zhovti-vody.news',
		];

		$url = 'https://sside.daycom.com.ua/api/zhovti-vody/with-nn';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {
			$data = json_decode($response, true);

			if ($data !== null) {
				$categories = [
					'Головне сьогодні' => 10,
					'ТОП новини від Дейком' => 12,
					'Стрічка новин' => 46,
				];

				$sections = [
					'Війна Росії проти України' => 5,
					'Суспільство' => 10,
					'Європа' => 10,
					'Китай' => 2,
					'Сполучені Штати' => 3,
					'Економіка' => 10,
					'Фінанси' => 10,
					'Технології' => 10,
					'Наука' => 4,
					'Культура' => 10,
					'Музика' => 10,
					'Кіно' => 10,
					'Спорт' => 4,
					'Політика' => 10,
					'Влада' => 10,
					'Північна Америка' => 10,
					'Південна Америка' => 10,
					'Близький схід' => 5,
					'Тихоокеанський регіон' => 5,
					'Африка' => 5,
					'Думка' => 10,
					'Аналітика' => 10,
				];

				$filteredCategories = [];
				$filteredSections = [];
				$filteredEconomicAndFinance = [];
				$filteredCultureMusicMovies = [];
				$filteredPoliticsAndPower = [];
				$filteredNorthAndSouthAmerica = [];
				$combinedData = [];

				$currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
				$currentDate->modify('+2 hour');

				foreach ($categories as $category => $count) {
					$filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['block'] === $category && $itemDate <= $currentDate;
					});

					$filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
				}

				foreach ($sections as $section => $count) {
					$filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
						$itemDate = new \DateTime($item['publishedAt']);
						return $item['section'] === $section && $itemDate <= $currentDate;
					});

					$filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
				}

				$filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

				usort($filteredEconomicAndFinance, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

				$filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

				usort($filteredCultureMusicMovies, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

				$filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

				usort($filteredPoliticsAndPower, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

				$filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

				usort($filteredNorthAndSouthAmerica, function ($a, $b) {
					return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
				});

				$filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

				foreach ($categories as $category => $count) {
					foreach ($filteredCategories[$category] as $item) {
						$combinedData[$category][] = $item;
					}
				}

				foreach ($sections as $section => $count) {
					foreach ($filteredSections[$section] as $item) {
						$combinedData[$section][] = $item;
					}
				}

				$combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
				$combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
				$combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
				$combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

				return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
	}

	public function dniproNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Дніпро, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Дніпра, головні новини Дніпро, новини ТОП Дніпро, новини новини бізнесу Дніпро, стрічка новин Дніпро, Думки Дніпро, новини Дніпро сьогодні, останні новини сьогодні Дніпро, інформаційна агенція Дніпро, інформація Дніпро',
			'site' => 'Головні новини міста Дніпро, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/dnipro',
			'keywords' => 'Головний сайт Дніпра, головні новини Дніпро, новини ТОП Дніпро, новини новини бізнесу Дніпро, стрічка новин Дніпро, Думки Дніпро, новини Дніпро сьогодні, останні новини сьогодні Дніпро, інформаційна агенція Дніпро, інформація Дніпро',
		];

		$city = [
			'name' => 'Дніпро',
			'name_link' => 'dnipro',
			'main_link' => 'dnipro.index',
			'news_line' => 'news.line',
			'news_link' => 'dnipro.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/dnipro/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function kamianskeNews($url)
	{
		$metaData = [
			'title' => "Головні новини міста Кам'янське, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт Кам'янського, головні новини Кам'янське, новини ТОП Житомир, новини новини бізнесу Кам'янське, стрічка новин Кам'янське, Думки Кам'янське, новини Кам'янське сьогодні, останні новини сьогодні Кам'янське, інформаційна агенція Кам'янське, інформація Кам'янське",
			'site' => "Головні новини міста Кам'янське, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/',
			'keywords' => "Головний сайт Кам'янського, головні новини Кам'янське, новини ТОП Житомир, новини новини бізнесу Кам'янське, стрічка новин Кам'янське, Думки Кам'янське, новини Кам'янськесьогодні, останні новини сьогодні Кам'янське, інформаційна агенція Кам'янське, інформація Кам'янське",
		];

		$city = [
			'name' => "Кам'янське",
			'name_link' => 'kamianske',
			'main_link' => 'kamianske.index',
			'news_line' => 'news.line',
			'news_link' => 'kamianske.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/kamianske/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function kryvyiRihNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Кривий Ріг, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Кривого Рогу, головні новини Кривий Ріг, новини ТОП Кривий Ріг, новини новини бізнесу Кривий Ріг, стрічка новин Кривий Ріг, Думки Кривий Ріг, новини Кривий Ріг сьогодні, останні новини сьогодні Кривий Ріг, інформаційна агенція Кривий Ріг, інформація Кривий Ріг',
			'site' => 'Головні новини міста Кривий Ріг, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kryvyi-rih',
			'keywords' => 'Головний сайт Кривого Рогу, головні новини Кривий Ріг, новини ТОП Кривий Ріг, новини новини бізнесу Кривий Ріг, стрічка новин Кривий Ріг, Думки Кривий Ріг, новини Кривий Ріг сьогодні, останні новини сьогодні Кривий Ріг, інформаційна агенція Кривий Ріг, інформація Кривий Ріг',
		];

		$city = [
			'name' => 'Кривий Ріг',
			'name_link' => 'kryvyi-rih',
			'main_link' => 'kryvyi-rih.index',
			'news_line' => 'news.line',
			'news_link' => 'kryvyi-rih.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/kryvyi-rih/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function marganetsNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Марганець, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Марганеців, головні новини Марганець, новини ТОП Марганець, новини новини бізнесу Марганець, стрічка новин Марганець, Думки Марганець, новини Марганець сьогодні, останні новини сьогодні Марганець, інформаційна агенція Марганець, інформація Марганець',
			'site' => 'Головні новини міста Марганець, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/marganets',
			'keywords' => 'Головний сайт Марганеців, головні новини Марганець, новини ТОП Марганець, новини новини бізнесу Марганець, стрічка новин Марганець, Думки Марганець, новини Марганець сьогодні, останні новини сьогодні Марганець, інформаційна агенція Марганець, інформація Марганець',
		];

		$city = [
			'name' => 'Марганець',
			'name_link' => 'marganets',
			'main_link' => 'marganets.index',
			'news_line' => 'news.line',
			'news_link' => 'marganets.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/marganets/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function nikopolNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Нікополь, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Нікополя, головні новини Нікополь, новини ТОП Нікополь, новини новини бізнесу Нікополь, стрічка новин Нікополь, Думки Нікополь, новини Нікополь сьогодні, останні новини сьогодні Нікополь, інформаційна агенція Нікополь, інформація Нікополь',
			'site' => 'Головні новини міста Нікополь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/nikopol',
			'keywords' => 'Головний сайт Нікополя, головні новини Нікополь, новини ТОП Нікополь, новини новини бізнесу Нікополь, стрічка новин Нікополь, Думки Нікополь, новини Нікополь сьогодні, останні новини сьогодні Нікополь, інформаційна агенція Нікополь, інформація Нікополь',
		];

		$city = [
			'name' => 'Нікополь',
			'name_link' => 'nikopol',
			'main_link' => 'nikopol.index',
			'news_line' => 'news.line',
			'news_link' => 'nikopol.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/nikopol/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function novomoskovskNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Новомосковськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Новомосковська, головні новини Новомосковськ, новини ТОП Новомосковськ, новини новини бізнесу Новомосковськ, стрічка новин Новомосковськ, Думки Новомосковськ, новини Новомосковськ сьогодні, останні новини сьогодні Новомосковськ, інформаційна агенція Новомосковськ, інформація Новомосковськ',
			'site' => 'Головні новини міста Новомосковськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/novomoskovsk',
			'keywords' => 'Головний сайт Новомосковська, головні новини Новомосковськ, новини ТОП Новомосковськ, новини новини бізнесу Новомосковськ, стрічка новин Новомосковськ, Думки Новомосковськ, новини Новомосковськ сьогодні, останні новини сьогодні Новомосковськ, інформаційна агенція Новомосковськ, інформація Новомосковськ',
		];

		$city = [
			'name' => 'Новомосковськ',
			'name_link' => 'novomoskovsk',
			'main_link' => 'novomoskovsk.index',
			'news_line' => 'news.line',
			'news_link' => 'novomoskovsk.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/novomoskovsk/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function pavlogradNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Павлоград, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Павлограда, головні новини Павлоград, новини ТОП Павлоград, новини новини бізнесу Павлоград, стрічка новин Павлоград, Думки Павлоград, новини Павлоград сьогодні, останні новини сьогодні Павлоград, інформаційна агенція Павлоград, інформація Павлоград',
			'site' => 'Головні новини міста Павлоград, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pavlograd',
			'keywords' => 'Головний сайт Павлограда, головні новини Павлоград, новини ТОП Павлоград, новини новини бізнесу Павлоград, стрічка новин Павлоград, Думки Павлоград, новини Павлоград сьогодні, останні новини сьогодні Павлоград, інформаційна агенція Павлоград, інформація Павлоград',
		];

		$city = [
			'name' => 'Павлоград',
			'name_link' => 'pavlograd',
			'main_link' => 'pavlograd.index',
			'news_line' => 'news.line',
			'news_link' => 'pavlograd.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/pavlograd/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function pershotravenskNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Першотравенськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Першотравенська, головні новини Першотравенськ, новини ТОП Першотравенськ, новини новини бізнесу Першотравенськ, стрічка новин Першотравенськ, Думки Першотравенськ, новини Першотравенськ сьогодні, останні новини сьогодні Першотравенськ, інформаційна агенція Першотравенськ, інформація Першотравенськ',
			'site' => 'Головні новини міста Першотравенськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pershotravensk',
			'keywords' => 'Головний сайт Першотравенська, головні новини Першотравенськ, новини ТОП Першотравенськ, новини новини бізнесу Першотравенськ, стрічка новин Першотравенськ, Думки Першотравенськ, новини Першотравенськ сьогодні, останні новини сьогодні Першотравенськ, інформаційна агенція Першотравенськ, інформація Першотравенськ',
		];

		$city = [
			'name' => 'Першотравенськ',
			'name_link' => 'pershotravensk',
			'main_link' => 'pershotravensk.index',
			'news_line' => 'news.line',
			'news_link' => 'pershotravensk.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/pershotravensk/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function pokrovNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Покров, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Покрова, головні новини Покров, новини ТОП Покров, новини новини бізнесу Покров, стрічка новин Покров, Думки Покров, новини Покров сьогодні, останні новини сьогодні Покров,  інформаційна агенція Покров, інформація Покров',
			'site' => 'Головні новини міста Покров, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pokrov',
			'keywords' => 'Головний сайт Покрова, головні новини Покров, новини ТОП Покров, новини новини бізнесу Покров, стрічка новин Покров, Думки Покров, новини Покров сьогодні, останні новини сьогодні Покров, інформаційна агенція Покров, інформація Покров',
		];

		$city = [
			'name' => 'Покров',
			'name_link' => 'pokrov',
			'main_link' => 'pokrov.index',
			'news_line' => 'news.line',
			'news_link' => 'pokrov.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/pokrov/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function pyatihatkyNews($url)
	{
		$metaData = [
			'title' => "Головні новини міста П'ятихатки, України та світу на сторінках газети Дейком",
			'description' => "Головний сайт П'ятихатки, головні новини П'ятихатки, новини ТОП П'ятихатки, новини новини бізнесу П'ятихатки, стрічка новин П'ятихатки, Думки П'ятихатки, новини П'ятихатки сьогодні, останні новини сьогодні П'ятихатки, інформаційна агенція П'ятихатки, інформація П'ятихатки",
			'site' => "Головні новини міста П'ятихатки, України та світу на сторінках газети Дейком",
			'url' => 'https://daycom.com.ua/pyatihatky',
			'keywords' => "Головний сайт П'ятихатки, головні новини П'ятихатки, новини ТОП П'ятихатки, новини новини бізнесу П'ятихатки, стрічка новин П'ятихатки, Думки П'ятихатки, новини П'ятихатки сьогодні, останні новини сьогодні П'ятихатки, інформаційна агенція П'ятихатки, інформація П'ятихатки",
		];

		$city = [
			'name' => "П'ятихатки",
			'name_link' => 'pyatihatky',
			'main_link' => 'pyatihatky.index',
			'news_line' => 'news.line',
			'news_link' => 'pyatihatky.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/pyatihatky/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function sinelnikovoNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Синельникове, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Синельникове, головні новини Синельникове, новини ТОП Синельникове, новини новини бізнесу Синельникове, стрічка новин Синельникове, Думки Синельникове, новини Синельникове сьогодні, останні новини сьогодні Синельникове,  інформаційна агенція Синельникове, інформація Синельникове',
			'site' => 'Головні новини міста Синельникове, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/sinelnikovo',
			'keywords' => 'Головний сайт Синельникове, головні новини Синельникове, новини ТОП Синельникове, новини новини бізнесу Синельникове, стрічка новин Синельникове, Думки Синельникове, новини Синельникове сьогодні, останні новини сьогодні Синельникове,  інформаційна агенція Синельникове, інформація Синельникове',
		];

		$city = [
			'name' => 'Синельникове',
			'name_link' => 'sinelnikovo',
			'main_link' => 'sinelnikovo.index',
			'news_line' => 'news.line',
			'news_link' => 'sinelnikovo.news',
		];
		$rUrl = 'https://sside.daycom.com.ua/api/sinelnikovo/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function ternivkaNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Тернівка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Тернівки, головні новини Тернівка, новини ТОП Тернівка, новини новини бізнесу Тернівка, стрічка новин Тернівка, Думки Тернівка, новини Тернівка сьогодні, останні новини сьогодні Тернівка, інформаційна агенція Тернівка, інформація Тернівка',
			'site' => 'Головні новини міста Тернівка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/ternivka',
			'keywords' => 'Головний сайт Тернівки, головні новини Тернівка, новини ТОП Тернівка, новини новини бізнесу Тернівка, стрічка новин Тернівка, Думки Тернівка, новини Тернівка сьогодні, останні новини сьогодні Тернівка, інформаційна агенція Тернівка, інформація Тернівка',
		];

		$city = [
			'name' => 'Тернівка',
			'name_link' => 'ternivka',
			'main_link' => 'ternivka.index',
			'news_line' => 'news.line',
			'news_link' => 'ternivka.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/ternivka/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function vilnohorskNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Вільногірськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вільногірська, головні новини Вільногірськ, новини ТОП Вільногірськ, новини новини бізнесу Вільногірськ, стрічка новин Вільногірськ, Думки Вільногірськ, новини Вільногірськ сьогодні, останні новини сьогодні Вільногірськ, інформаційна агенція Вільногірськ, інформація Вільногірськ',
			'site' => 'Головні новини міста Вільногірськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vilnohorsk',
			'keywords' => 'Головний сайт Вільногірська, головні новини Вільногірськ, новини ТОП Вільногірськ, новини новини бізнесу Вільногірськ, стрічка новин Вільногірськ, Думки Вільногірськ, новини Вільногірськ сьогодні, останні новини сьогодні Вільногірськ, інформаційна агенція Вільногірськ, інформація Вільногірськ',
		];

		$city = [
			'name' => 'Вільногірськ',
			'name_link' => 'vilnohorsk',
			'main_link' => 'vilnohorsk.index',
			'news_line' => 'news.line',
			'news_link' => 'vilnohorsk.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/vilnohorsk/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
	public function zhovtiVodyNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Жовті Води, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Жовтих Вод, головні новини Жовті Води, новини ТОП Жовті Води, новини новини бізнесу Жовті Води, стрічка новин Жовті Води, Думки Жовті Води, новини Жовті Води сьогодні, останні новини сьогодні Жовті Води, інформаційна агенція Жовті Води, інформація Жовті Води',
			'site' => 'Головні новини міста Жовті Води, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zhovti-vody',
			'keywords' => 'Головний сайт Жовтих Вод, головні новини Жовті Води, новини ТОП Жовті Води, новини новини бізнесу Жовті Води, стрічка новин Жовті Води, Думки Жовті Води, новини Жовті Води сьогодні, останні новини сьогодні Жовті Води, інформаційна агенція Жовті Води, інформація Жовті Води',
		];

		$city = [
			'name' => 'Жовті Води',
			'name_link' => 'zhovti-vody',
			'main_link' => 'zhovti-vody.index',
			'news_line' => 'news.line',
			'news_link' => 'zhovti-vody.news',
		];
		$rUrl = 'https://sside.daycom.com.ua/api/zhovti-vody/news/' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $rUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

		if ($response) {

			$data = json_decode($response, true);

			if ($data !== null) {
				$userId = $data['UserId'];
				$userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
				$userCh = curl_init();
				curl_setopt($userCh, CURLOPT_URL, $userUrl);
				curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
				$userResponse = curl_exec($userCh);

				if ($userResponse) {
					$userData = json_decode($userResponse, true);
					if ($userData !== null) {
						return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
					} else {
						echo "Помилка при декодуванні JSON.";
					}
				} else {
					echo "Не вдалося отримати JSON про користувача.";
				}
			} else {
				echo "Ошибка при декодировании JSON.";
			}
		} else {
			echo "Не удалось получить JSON-ответ";
		}

		curl_close($ch);
		curl_close($userCh);
	}
}
