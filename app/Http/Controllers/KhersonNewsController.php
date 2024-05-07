<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class KhersonNewsController extends Controller
{
	public function henicheskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Генічеськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Генічеська, головні новини Генічеськ, новини ТОП Генічеськ, новини новини бізнесу Генічеськ, стрічка новин Генічеськ, Думки Генічеськ, новини Генічеськ сьогодні, останні новини сьогодні Генічеськ, інформаційна агенція Генічеськ, інформація Генічеськ',
			'site' => 'Головні новини міста Генічеськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/henichesk',
			'keywords' => 'Головний сайт Генічеська, головні новини Генічеськ, новини ТОП Генічеськ, новини новини бізнесу Генічеськ, стрічка новин Генічеськ, Думки Генічеськ, новини Генічеськ сьогодні, останні новини сьогодні Генічеськ, інформаційна агенція Генічеськ, інформація Генічеськ',
		];

		$city = [
			'name' => 'Генічеськ',
			'name_link' => 'henichesk',
			'main_link' => 'henichesk.index',
			'news_line' => 'news.line',
			'news_link' => 'henichesk.news',
		];

		$url = env("SERVER_API_URL") . '/henichesk/with-nn';
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
	public function kahovkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Каховка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Каховки, головні новини Каховка, новини ТОП Каховка, новини новини бізнесу Каховка, стрічка новин Каховка, Думки Каховка, новини Каховка сьогодні, останні новини сьогодні Каховка, інформаційна агенція Каховка, інформація Каховка',
			'site' => 'Головні новини міста Каховка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kahovka',
			'keywords' => 'Головний сайт Каховки, головні новини Каховка, новини ТОП Каховка, новини новини бізнесу Каховка, стрічка новин Каховка, Думки Каховка, новини Каховка сьогодні, останні новини сьогодні Каховка, інформаційна агенція Каховка, інформація Каховка',
		];

		$city = [
			'name' => 'Каховка',
			'name_link' => 'kahovka',
			'main_link' => 'kahovka.index',
			'news_line' => 'news.line',
			'news_link' => 'kahovka.news',
		];

		$url = env("SERVER_API_URL") . '/kahovka/with-nn';
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
	public function khersonHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Херсон, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Херсона, головні новини Херсон, новини ТОП Херсон, новини новини бізнесу Херсон, стрічка новин Херсон, Думки Херсон, новини Херсон сьогодні, останні новини сьогодні Херсон, інформаційна агенція Херсон, інформація Херсон',
			'site' => 'Головні новини міста Херсон, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kherson',
			'keywords' => 'Головний сайт Херсона, головні новини Херсон, новини ТОП Херсон, новини новини бізнесу Херсон, стрічка новин Херсон, Думки Херсон, новини Херсон сьогодні, останні новини сьогодні Херсон, інформаційна агенція Херсон, інформація Херсон',
		];

		$city = [
			'name' => 'Херсон',
			'name_link' => 'kherson',
			'main_link' => 'kherson.index',
			'news_line' => 'news.line',
			'news_link' => 'kherson.news',
		];

		$url = env("SERVER_API_URL") . '/kherson/with-nn';
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
	public function novaKakhovkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Нова Каховка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Нової Каховки, головні новини Нова Каховка, новини ТОП Нова Каховка, новини новини бізнесу Нова Каховка, стрічка новин Нова Каховка, Думки Нова Каховка, новини Нова Каховка сьогодні, останні новини сьогодні Нова Каховка, інформаційна агенція Нова Каховка, інформація Нова Каховка',
			'site' => 'Головні новини міста Нова Каховка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/nova-kakhovka',
			'keywords' => 'Головний сайт Нової Каховки, головні новини Нова Каховка, новини ТОП Нова Каховка, новини новини бізнесу Нова Каховка, стрічка новин Нова Каховка, Думки Нова Каховка, новини Нова Каховка сьогодні, останні новини сьогодні Нова Каховка, інформаційна агенція Нова Каховка, інформація Нова Каховка',
		];

		$city = [
			'name' => 'Нова Каховка',
			'name_link' => 'nova-kakhovka',
			'main_link' => 'nova-kakhovka.index',
			'news_line' => 'news.line',
			'news_link' => 'nova-kakhovka.news',
		];

		$url = env("SERVER_API_URL") . '/nova-kakhovka/with-nn';
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
	public function oleshkiHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Олешки, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Олешки, головні новини Олешки, новини ТОП Олешки, новини новини бізнесу Олешки, стрічка новин Олешки, Думки Олешки, новини Олешки сьогодні, останні новини сьогодні Олешки, інформаційна агенція Олешки, інформація Олешки',
			'site' => 'Головні новини міста Олешки, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/oleshki',
			'keywords' => 'Головний сайт Олешки, головні новини Олешки, новини ТОП Олешки, новини новини бізнесу Олешки, стрічка новин Олешки, Думки Олешки, новини Олешки сьогодні, останні новини сьогодні Олешки, інформаційна агенція Олешки, інформація Олешки',
		];

		$city = [
			'name' => 'Олешки',
			'name_link' => 'oleshki',
			'main_link' => 'oleshki.index',
			'news_line' => 'news.line',
			'news_link' => 'oleshki.news',
		];

		$url = env("SERVER_API_URL") . '/oleshki/with-nn';
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
	public function skadovskHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Скадовськ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Скадовська, головні новини Скадовськ, новини ТОП Скадовськ, новини новини бізнесу Скадовськ, стрічка новин Скадовськ, Думки Скадовськ, новини Скадовськ сьогодні, останні новини сьогодні Скадовськ, інформаційна агенція Скадовськ, інформація Скадовськ',
			'site' => 'Головні новини міста Скадовськ, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/skadovsk',
			'keywords' => 'Головний сайт Скадовська, головні новини Скадовськ, новини ТОП Скадовськ, новини новини бізнесу Скадовськ, стрічка новин Скадовськ, Думки Скадовськ, новини Скадовськ сьогодні, останні новини сьогодні Скадовськ, інформаційна агенція Скадовськ, інформація Скадовськ',
		];

		$city = [
			'name' => 'Скадовськ',
			'name_link' => 'skadovsk',
			'main_link' => 'skadovsk.index',
			'news_line' => 'news.line',
			'news_link' => 'skadovsk.news',
		];

		$url = env("SERVER_API_URL") . '/skadovsk/with-nn';
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
