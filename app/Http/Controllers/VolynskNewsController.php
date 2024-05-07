<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class VolynskNewsController extends Controller
{
	public function kovelHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Ковель, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ковеля, головні новини Ковель, новини ТОП Ковель, новини новини бізнесу Ковель, стрічка новин Ковель, Думки Ковель, новини Ковель сьогодні, останні новини сьогодні Ковель,  Ковеля,  Ковель, інформаційна агенція Ковель, інформація Ковель',
			'site' => 'Головні новини міста Ковель, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kovel',
			'keywords' => 'Головний сайт Ковеля, головні новини Ковель, новини ТОП Ковель, новини новини бізнесу Ковель, стрічка новин Ковель, Думки Ковель, новини Ковель сьогодні, останні новини сьогодні Ковель,  Ковеля,  Ковель, інформаційна агенція Ковель, інформація Ковель',
		];

		$city = [
			'name' => 'Ковель',
			'name_link' => 'kovel',
			'main_link' => 'kovel.index',
			'news_line' => 'news.line',
			'news_link' => 'kovel.news',
		];

		$url = env("SERVER_API_URL") . '/kovel/with-nn';
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
	public function lutskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Луцьк, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Луцька, головні новини Луцьк, новини ТОП Луцьк, новини новини бізнесу Луцьк, стрічка новин Луцьк, Думки Луцьк, новини Луцьк сьогодні, останні новини сьогодні Луцьк,  Луцьку,  Луцьк, інформаційна агенція Луцьк, інформація Луцьк',
			'site' => 'Головні новини міста Луцьк, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/lutsk',
			'keywords' => 'Головний сайт Луцька, головні новини Луцьк, новини ТОП Луцьк, новини новини бізнесу Луцьк, стрічка новин Луцьк, Думки Луцьк, новини Луцьк сьогодні, останні новини сьогодні Луцьк,  Луцьку,  Луцьк, інформаційна агенція Луцьк, інформація Луцьк',
		];

		$city = [
			'name' => 'Луцьк',
			'name_link' => 'lutsk',
			'main_link' => 'lutsk.index',
			'news_line' => 'news.line',
			'news_link' => 'lutsk.news',
		];

		$url = env("SERVER_API_URL") . '/lutsk/with-nn';
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
	public function novovolynskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Нововолинськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Нововолинська, головні новини Нововолинськ, новини ТОП Нововолинськ, новини новини бізнесу Нововолинськ, стрічка новин Нововолинськ, Думки Нововолинськ, новини Нововолинськ сьогодні, останні новини сьогодні Нововолинськ,  Нововолинську,  Нововолинськ, інформаційна агенція Нововолинськ, інформація Нововолинськ',
			'site' => 'Головні новини міста Нововолинськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/novovolynsk',
			'keywords' => 'Головний сайт Нововолинська, головні новини Нововолинськ, новини ТОП Нововолинськ, новини новини бізнесу Нововолинськ, стрічка новин Нововолинськ, Думки Нововолинськ, новини Нововолинськ сьогодні, останні новини сьогодні Нововолинськ,  Нововолинську,  Нововолинськ, інформаційна агенція Нововолинськ, інформація Нововолинськ',
		];

		$city = [
			'name' => 'Нововолинськ',
			'name_link' => 'novovolynsk',
			'main_link' => 'novovolynsk.index',
			'news_line' => 'news.line',
			'news_link' => 'novovolynsk.news',
		];

		$url = env("SERVER_API_URL") . '/novovolynsk/with-nn';
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
	public function volodymyrVolynskiyHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Володимир-Волинський, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Володимир-Волинського, головні новини Володимир-Волинський, новини ТОП Володимир-Волинський, новини новини бізнесу Володимир-Волинський, стрічка новин Володимир-Волинський, Думки Володимир-Волинський, новини Володимир-Волинський сьогодні, останні новини сьогодні Володимир-Волинський, інформаційна агенція Володимир-Волинський, інформація Володимир-Волинський',
			'site' => 'Головні новини міста Володимир-Волинський, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/volodymyr-volynskiy',
			'keywords' => 'Головний сайт Володимир-Волинського, головні новини Володимир-Волинський, новини ТОП Володимир-Волинський, новини новини бізнесу Володимир-Волинський, стрічка новин Володимир-Волинський, Думки Володимир-Волинський, новини Володимир-Волинський сьогодні, останні новини сьогодні Володимир-Волинський, інформаційна агенція Володимир-Волинський, інформація Володимир-Волинський',
		];

		$city = [
			'name' => 'Володимир-Волинський',
			'name_link' => 'volodymyr-volynskiy',
			'main_link' => 'volodymyr-volynskiy.index',
			'news_line' => 'news.line',
			'news_link' => 'volodymyr-volynskiy.news',
		];

		$url = env("SERVER_API_URL") . '/volodymyr-volynskiy/with-nn';
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
