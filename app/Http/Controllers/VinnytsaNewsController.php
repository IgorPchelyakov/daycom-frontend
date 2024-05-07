<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class VinnytsaNewsController extends Controller
{
	public function vinnytsaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Вінниця, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вінниці, головні новини Вінниця, новини ТОП Вінниця, новини новини бізнесу Вінниця, стрічка новин Вінниця, Думки Вінниця, новини Вінниця сьогодні, останні новини сьогодні Вінниця, інформаційна агенція Вінниця, інформація Вінниця',
			'site' => 'Новини міста Вінниця, України та світу на сторінках Дейком',
			'url' => 'https://daycom.com.ua/vinnytsa',
			'keywords' => 'Головний сайт Вінниці, головні новини Вінниця, новини ТОП Вінниця, новини новини бізнесу Вінниця, стрічка новин Вінниця, Думки Вінниця, новини Вінниця сьогодні, останні новини сьогодні Вінниця, інформаційна агенція Вінниця, інформація Вінниця',
		];

		$city = [
			'name' => 'Вінниця',
			'name_link' => 'vinnytsa',
			'main_link' => 'vinnytsa.index',
			'news_line' => 'news.line',
			'news_link' => 'vinnytsa.news',
		];

		$url = env("SERVER_API_URL") . '/vinnytsa/with-nn';
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
	public function zhmerynkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Жмеринка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Жмеринки, головні новини Жмеринка, новини ТОП Жмеринка, новини новини бізнесу Жмеринка, стрічка новин Жмеринка, Думки Жмеринка, новини Жмеринка сьогодні, останні новини сьогодні Жмеринка, інформаційна агенція Жмеринка, інформація Жмеринка',
			'site' => 'Головні новини міста Жмеринка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/zhmerynka',
			'keywords' => 'Головний сайт Жмеринки, головні новини Жмеринка, новини ТОП Жмеринка, новини новини бізнесу Жмеринка, стрічка новин Жмеринка, Думки Жмеринка, новини Жмеринка сьогодні, останні новини сьогодні Жмеринка, інформаційна агенція Жмеринка, інформація Жмеринка',
		];

		$city = [
			'name' => 'Жмеринка',
			'name_link' => 'zhmerynka',
			'main_link' => 'zhmerynka.index',
			'news_line' => 'news.line',
			'news_link' => 'zhmerynka.news',
		];

		$url = env("SERVER_API_URL") . '/zhmerynka/with-nn';
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
	public function mohylivPodilskyiHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Могилів-Подільський, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Могилів-Подільського, головні новини Могилів-Подільський, новини ТОП Могилів-Подільський, новини новини бізнесу Могилів-Подільський, стрічка новин Могилів-Подільський, Думки Могилів-Подільський, новини Могилів-Подільський сьогодні, останні новини сьогодні Могилів-Подільський, інформаційна агенція Могилів-Подільський, інформація Могилів-Подільський',
			'site' => 'Головні новини міста Могилів-Подільський, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/mohyliv-podilskyi',
			'keywords' => 'Головний сайт Могилів-Подільського, головні новини Могилів-Подільський, новини ТОП Могилів-Подільський, новини новини бізнесу Могилів-Подільський, стрічка новин Могилів-Подільський, Думки Могилів-Подільський, новини Могилів-Подільський сьогодні, останні новини сьогодні Могилів-Подільський, інформаційна агенція Могилів-Подільський, інформація Могилів-Подільський',
		];

		$city = [
			'name' => 'Могилів-Подільський',
			'name_link' => 'mohyliv-podilskyi',
			'main_link' => 'mohyliv-podilskyi.index',
			'news_line' => 'news.line',
			'news_link' => 'mohyliv-podilskyi.news',
		];

		$url = env("SERVER_API_URL") . '/mohyliv-podilskyi/with-nn';
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
	public function koziatynHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Козятин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Козятин, головні новини Козятин, новини ТОП Козятин, новини новини бізнесу Козятин, стрічка новин Козятин, Думки Козятин, новини Козятин сьогодні, останні новини сьогодні Козятин, інформаційна агенція Козятин, інформація Козятин',
			'site' => 'Головні новини міста Козятин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kozyatyn',
			'keywords' => 'Головний сайт Козятин, головні новини Козятин, новини ТОП Козятин, новини новини бізнесу Козятин, стрічка новин Козятин, Думки Козятин, новини Козятин сьогодні, останні новини сьогодні Козятин, інформаційна агенція Козятин, інформація Козятин',
		];

		$city = [
			'name' => 'Козятин',
			'name_link' => 'kozyatyn',
			'main_link' => 'kozyatyn.index',
			'news_line' => 'news.line',
			'news_link' => 'kozyatyn.news',
		];

		$url = env("SERVER_API_URL") . '/kozyatyn/with-nn';
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
	public function gaysinHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Гайсин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Гайсин, головні новини Гайсин, новини ТОП Гайсин, новини новини бізнесу Гайсин, стрічка новин Гайсин, Думки Гайсин, новини Гайсин сьогодні, останні новини сьогодні Гайсин, інформаційна агенція Гайсин, інформація Гайсин',
			'site' => 'Головні новини міста Гайсин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/gaysin',
			'keywords' => 'Головний сайт Гайсин, головні новини Гайсин, новини ТОП Гайсин, новини новини бізнесу Гайсин, стрічка новин Гайсин, Думки Гайсин, новини Гайсин сьогодні, останні новини сьогодні Гайсин, інформаційна агенція Гайсин, інформація Гайсин',
		];

		$city = [
			'name' => 'Гайсин',
			'name_link' => 'gaysin',
			'main_link' => 'gaysin.index',
			'news_line' => 'news.line',
			'news_link' => 'gaysin.news',
		];

		$url = env("SERVER_API_URL") . '/gaysin/with-nn';
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
	public function hmilnykHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Хмільник, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Хмільника, головні новини Хмільник, новини ТОП Хмільник, новини новини бізнесу Хмільник, стрічка новин Хмільник, Думки Хмільник, новини Хмільник сьогодні, останні новини сьогодні Хмільник, інформаційна агенція Хмільник, інформація Хмільник',
			'site' => 'Головні новини міста Хмільник, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/hmilnyk',
			'keywords' => 'Головний сайт Хмільника, головні новини Хмільник, новини ТОП Хмільник, новини новини бізнесу Хмільник, стрічка новин Хмільник, Думки Хмільник, новини Хмільник сьогодні, останні новини сьогодні Хмільник, інформаційна агенція Хмільник, інформація Хмільник',
		];

		$city = [
			'name' => 'Хмільник',
			'name_link' => 'hmilnyk',
			'main_link' => 'hmilnyk.index',
			'news_line' => 'news.line',
			'news_link' => 'hmilnyk.news',
		];

		$url = env("SERVER_API_URL") . '/hmilnyk/with-nn';
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
	public function ladyzhynHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Ладижин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ладижин, головні новини Ладижин, новини ТОП Ладижин, новини новини бізнесу Ладижин, стрічка новин Ладижин, Думки Ладижин, новини Ладижин сьогодні, останні новини сьогодні Ладижин, інформаційна агенція Ладижин, інформація Ладижин',
			'site' => 'Головні новини міста Ладижин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/ladyzhin',
			'keywords' => 'Головний сайт Ладижин, головні новини Ладижин, новини ТОП Ладижин, новини новини бізнесу Ладижин, стрічка новин Ладижин, Думки Ладижин, новини Ладижин сьогодні, останні новини сьогодні Ладижин, інформаційна агенція Ладижин, інформація Ладижин',
		];

		$city = [
			'name' => 'Ладижин',
			'name_link' => 'ladyzhin',
			'main_link' => 'ladyzhin.index',
			'news_line' => 'news.line',
			'news_link' => 'ladyzhin.news',
		];

		$url = env("SERVER_API_URL") . '/ladyzhin/with-nn';
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
