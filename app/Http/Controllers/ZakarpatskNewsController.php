<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class ZakarpatskNewsController extends Controller
{
	public function beregoveHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Берегове, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Берегового, головні новини Берегове, новини ТОП Берегове, новини новини бізнесу Берегове, стрічка новин Берегове, Думки Берегове, новини Берегове сьогодні, останні новини сьогодні Берегове, інформаційна агенція Берегове, інформація Берегове',
			'site' => 'Головні новини міста Берегове, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/beregove',
			'keywords' => 'Головний сайт Берегового, головні новини Берегове, новини ТОП Берегове, новини новини бізнесу Берегове, стрічка новин Берегове, Думки Берегове, новини Берегове сьогодні, останні новини сьогодні Берегове, інформаційна агенція Берегове, інформація Берегове',
		];

		$city = [
			'name' => 'Берегове',
			'name_link' => 'beregove',
			'main_link' => 'beregove.index',
			'news_line' => 'news.line',
			'news_link' => 'beregove.news',
		];

		$url = env("SERVER_API_URL") . '/beregove/with-nn';
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
	public function hustHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Хуст, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Хуст, головні новини Хуст, новини ТОП Хуст, новини новини бізнесу Хуст, стрічка новин Хуст, Думки Хуст, новини Хуст сьогодні, останні новини сьогодні Хуст, інформаційна агенція Хуст, інформація Хуст',
			'site' => 'Головні новини міста Хуст, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/hust',
			'keywords' => 'Головний сайт Хуст, головні новини Хуст, новини ТОП Хуст, новини новини бізнесу Хуст, стрічка новин Хуст, Думки Хуст, новини Хуст сьогодні, останні новини сьогодні Хуст, інформаційна агенція Хуст, інформація Хуст',
		];

		$city = [
			'name' => 'Хуст',
			'name_link' => 'hust',
			'main_link' => 'hust.index',
			'news_line' => 'news.line',
			'news_link' => 'hust.news',
		];

		$url = env("SERVER_API_URL") . '/hust/with-nn';
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
	public function mukachevoHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Мукачево, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Мукачева, головні новини Мукачево, новини ТОП Мукачево, новини новини бізнесу Мукачево, стрічка новин Мукачево, Думки Мукачево, новини Мукачево сьогодні, останні новини сьогодні Мукачево, інформаційна агенція Мукачево, інформація Мукачево',
			'site' => 'Головні новини міста Мукачево, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/mukachevo',
			'keywords' => 'Головний сайт Мукачева, головні новини Мукачево, новини ТОП Мукачево, новини новини бізнесу Мукачево, стрічка новин Мукачево, Думки Мукачево, новини Мукачево сьогодні, останні новини сьогодні Мукачево, інформаційна агенція Мукачево, інформація Мукачево',
		];

		$city = [
			'name' => 'Мукачево',
			'name_link' => 'mukachevo',
			'main_link' => 'mukachevo.index',
			'news_line' => 'news.line',
			'news_link' => 'mukachevo.news',
		];

		$url = env("SERVER_API_URL") . '/mukachevo/with-nn';
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
	public function uzhhorodHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Ужгород, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ужгорода, головні новини Ужгород, новини ТОП Ужгород, новини новини бізнесу Ужгород, стрічка новин Ужгород, Думки Ужгород, новини Ужгород сьогодні, останні новини сьогодні Ужгород, інформаційна агенція Ужгород, інформація Ужгород',
			'site' => 'Головні новини міста Ужгород, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/uzhhorod',
			'keywords' => 'Головний сайт Ужгорода, головні новини Ужгород, новини ТОП Ужгород, новини новини бізнесу Ужгород, стрічка новин Ужгород, Думки Ужгород, новини Ужгород сьогодні, останні новини сьогодні Ужгород, інформаційна агенція Ужгород, інформація Ужгород',
		];

		$city = [
			'name' => 'Ужгород',
			'name_link' => 'uzhhorod',
			'main_link' => 'uzhhorod.index',
			'news_line' => 'news.line',
			'news_link' => 'uzhhorod.news',
		];

		$url = env("SERVER_API_URL") . '/uzhhorod/with-nn';
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
	public function vinohradivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Виноградів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Виноградів, головні новини Виноградів, новини ТОП Виноградів, новини новини бізнесу Виноградів, стрічка новин Виноградів, Думки Виноградів, новини Виноградів сьогодні, останні новини сьогодні Виноградів, інформаційна агенція Виноградів, інформація Виноградів',
			'site' => 'Головні новини міста Виноградів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vinohradiv',
			'keywords' => 'Головний сайт Виноградів, головні новини Виноградів, новини ТОП Виноградів, новини новини бізнесу Виноградів, стрічка новин Виноградів, Думки Виноградів, новини Виноградів сьогодні, останні новини сьогодні Виноградів, інформаційна агенція Виноградів, інформація Виноградів',
		];

		$city = [
			'name' => 'Виноградів',
			'name_link' => 'vinohradiv',
			'main_link' => 'vinohradiv.index',
			'news_line' => 'news.line',
			'news_link' => 'vinohradiv.news',
		];

		$url = env("SERVER_API_URL") . '/vinohradiv/with-nn';
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
