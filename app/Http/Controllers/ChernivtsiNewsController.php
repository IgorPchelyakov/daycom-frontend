<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class ChernivtsiNewsController extends Controller
{
	public function chernivtsiHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Чернівці, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Чернівців, головні новини Чернівці, новини ТОП Чернівці, новини новини бізнесу Чернівці, стрічка новин Чернівці, Думки Чернівці, новини Чернівці сьогодні, останні новини сьогодні Чернівці, інформаційна агенція Чернівці, інформація Чернівці',
			'site' => 'Головні новини міста Чернівці, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/chernivtsi',
			'keywords' => 'Головний сайт Чернівців, головні новини Чернівці, новини ТОП Чернівці, новини новини бізнесу Чернівці, стрічка новин Чернівці, Думки Чернівці, новини Чернівці сьогодні, останні новини сьогодні Чернівці, інформаційна агенція Чернівці, інформація Чернівці',
		];

		$city = [
			'name' => 'Чернівці',
			'name_link' => 'chernivtsi',
			'main_link' => 'chernivtsi.index',
			'news_line' => 'news.line',
			'news_link' => 'chernivtsi.news',
		];

		$url = env("SERVER_API_URL") . '/chernivtsi/with-nn';
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
