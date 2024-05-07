<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class MykolayivNewsController extends Controller
{
	public function mykolayivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Миколаїв, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Кривого Рогу, головні новини Миколаїв, новини ТОП Миколаїв, новини новини бізнесу Миколаїв, стрічка новин Миколаїв, Думки Миколаїв, новини Миколаїв сьогодні, останні новини сьогодні Миколаїв, інформаційна агенція Миколаїв, інформація Миколаїв',
			'site' => 'Головні новини міста Миколаїв, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/mykolayiv',
			'keywords' => 'Головний сайт Кривого Рогу, головні новини Миколаїв, новини ТОП Миколаїв, новини новини бізнесу Миколаїв, стрічка новин Миколаїв, Думки Миколаїв, новини Миколаїв сьогодні, останні новини сьогодні Миколаїв, інформаційна агенція Миколаїв, інформація Миколаїв',
		];

		$city = [
			'name' => 'Миколаїв',
			'name_link' => 'mykolayiv',
			'main_link' => 'mykolayiv.index',
			'news_line' => 'news.line',
			'news_link' => 'mykolayiv.news',
		];

		$url = env("SERVER_API_URL") . '/mykolayiv/with-nn';
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
	public function pervomaiskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Первомайськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Первомайська, головні новини Первомайськ, новини ТОП Первомайськ, новини новини бізнесу Первомайськ, стрічка новин Первомайськ, Думки Первомайськ, новини Первомайськ сьогодні, останні новини сьогодні Первомайськ, інформаційна агенція Первомайськ, інформація Первомайськ',
			'site' => 'Головні новини міста Первомайськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pervomaisk',
			'keywords' => 'Головний сайт Первомайська, головні новини Первомайськ, новини ТОП Первомайськ, новини новини бізнесу Первомайськ, стрічка новин Первомайськ, Думки Первомайськ, новини Первомайськ сьогодні, останні новини сьогодні Первомайськ, інформаційна агенція Первомайськ, інформація Первомайськ',
		];

		$city = [
			'name' => 'Первомайськ',
			'name_link' => 'pervomaisk',
			'main_link' => 'pervomaisk.index',
			'news_line' => 'news.line',
			'news_link' => 'pervomaisk.news',
		];

		$url = env("SERVER_API_URL") . '/pervomaisk/with-nn';
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
	public function voznesenskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Вознесенськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вознесенська, головні новини Вознесенськ, новини ТОП Вознесенськ, новини новини бізнесу Вознесенськ, стрічка новин Вознесенськ, Думки Вознесенськ, новини Вознесенськ сьогодні, останні новини сьогодні Вознесенськ, інформаційна агенція Вознесенськ, інформація Вознесенськ',
			'site' => 'Головні новини міста Вознесенськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/voznesensk',
			'keywords' => 'Головний сайт Вознесенська, головні новини Вознесенськ, новини ТОП Вознесенськ, новини новини бізнесу Вознесенськ, стрічка новин Вознесенськ, Думки Вознесенськ, новини Вознесенськ сьогодні, останні новини сьогодні Вознесенськ, інформаційна агенція Вознесенськ, інформація Вознесенськ',
		];

		$city = [
			'name' => 'Вознесенськ',
			'name_link' => 'voznesensk',
			'main_link' => 'voznesensk.index',
			'news_line' => 'news.line',
			'news_link' => 'voznesensk.news',
		];

		$url = env("SERVER_API_URL") . '/voznesensk/with-nn';
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
	public function yuzhnoukrainskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Южноукраїнськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Южноукраїнська, головні новини Южноукраїнськ, новини ТОП Южноукраїнськ, новини новини бізнесу Южноукраїнськ, стрічка новин Южноукраїнськ, Думки Южноукраїнськ, новини Южноукраїнськ сьогодні, останні новини сьогодні Южноукраїнськ, інформаційна агенція Южноукраїнськ, інформація Южноукраїнськ',
			'site' => 'Головні новини міста Южноукраїнськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/yuzhnoukrainsk',
			'keywords' => 'Головний сайт Южноукраїнська, головні новини Южноукраїнськ, новини ТОП Южноукраїнськ, новини новини бізнесу Южноукраїнськ, стрічка новин Южноукраїнськ, Думки Южноукраїнськ, новини Южноукраїнськ сьогодні, останні новини сьогодні Южноукраїнськ, інформаційна агенція Южноукраїнськ, інформація Южноукраїнськ',
		];

		$city = [
			'name' => 'Южноукраїнськ',
			'name_link' => 'yuzhnoukrainsk',
			'main_link' => 'yuzhnoukrainsk.index',
			'news_line' => 'news.line',
			'news_link' => 'yuzhnoukrainsk.news',
		];

		$url = env("SERVER_API_URL") . '/yuzhnoukrainsk/with-nn';
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
