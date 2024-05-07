<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class KyivNewsController extends Controller
{
	public function kyivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Київ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Києва, головні новини Київ, новини ТОП Київ, новини новини бізнесу Київ, стрічка новин Київ, Думки Київ, новини Київ сьогодні, останні новини сьогодні Київ,  інформаційна агенція Київ, інформація Київ',
			'site' => 'Головні новини міста Київ, Новини України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kyiv',
			'keywords' => 'Головний сайт Києва, головні новини Київ, новини ТОП Київ, новини новини бізнесу Київ, стрічка новин Київ, Думки Київ, новини Київ сьогодні, останні новини сьогодні Київ,  інформаційна агенція Київ, інформація Київ',
		];

		$city = [
			'name' => 'Київ',
			'name_link' => 'kyiv',
			'main_link' => 'kyiv.index',
			'news_line' => 'news.line',
			'news_link' => 'kyiv.news',
		];

		$url = env("SERVER_API_URL") . '/kyiv/with-nn';
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
	public function berezanHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Березань, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Березані, головні новини Березань, новини ТОП Березань, новини новини бізнесу Березань, стрічка новин Березань, Думки Березань, новини Березань сьогодні, останні новини сьогодні Березань, інформаційна агенція Березань, інформація Березань',
			'site' => 'Головні новини міста Березань, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/berezan',
			'keywords' => 'Головний сайт Березані, головні новини Березань, новини ТОП Березань, новини новини бізнесу Березань, стрічка новин Березань, Думки Березань, новини Березань сьогодні, останні новини сьогодні Березань, інформаційна агенція Березань, інформація Березань',
		];

		$city = [
			'name' => 'Березань',
			'name_link' => 'berezan',
			'main_link' => 'berezan.index',
			'news_line' => 'news.line',
			'news_link' => 'berezan.news',
		];

		$url = env("SERVER_API_URL") . '/berezan/with-nn';
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
	public function bilacerkvaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Біла Церква, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Білої Церкви, головні новини Біла Церква, новини ТОП Біла Церква, новини новини бізнесу Біла Церква, стрічка новин Біла Церква, Думки Біла Церква, новини Біла Церква сьогодні, останні новини сьогодні Біла Церква, інформаційна агенція Біла Церква, інформація Біла Церква',
			'site' => 'Головні новини міста Біла Церква, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/bilacerkva',
			'keywords' => 'Головний сайт Білої Церкви, головні новини Біла Церква, новини ТОП Біла Церква, новини новини бізнесу Біла Церква, стрічка новин Біла Церква, Думки Біла Церква, новини Біла Церква сьогодні, останні новини сьогодні Біла Церква, інформаційна агенція Біла Церква, інформація Біла Церква',
		];

		$city = [
			'name' => 'Біла Церква',
			'name_link' => 'bilacerkva',
			'main_link' => 'bilacerkva.index',
			'news_line' => 'news.line',
			'news_link' => 'bilacerkva.news',
		];

		$url = env("SERVER_API_URL") . '/bilacerkva/with-nn';
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
	public function boryspilHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Бориспіль, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Борисполя, головні новини Борисполь, новини ТОП Борисполь, новини новини бізнесу Борисполь, стрічка новин Борисполь, Думки Борисполь, новини Борисполь сьогодні, останні новини сьогодні Борисполь, інформаційна агенція Борисполь, інформація Борисполь',
			'site' => 'Головні новини міста Борисполь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/boryspil',
			'keywords' => 'Головний сайт Борисполя, головні новини Борисполь, новини ТОП Борисполь, новини новини бізнесу Борисполь, стрічка новин Борисполь, Думки Борисполь, новини Борисполь сьогодні, останні новини сьогодні Борисполь,  інформаційна агенція Борисполь, інформація Борисполь',
		];

		$city = [
			'name' => 'Бориспіль',
			'name_link' => 'boryspil',
			'main_link' => 'boryspil.index',
			'news_line' => 'news.line',
			'news_link' => 'boryspil.news',
		];

		$url = env("SERVER_API_URL") . '/boryspil/with-nn';
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
	public function boyarkaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Боярка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бояркаи, головні новини Боярка, новини ТОП Боярка, новини новини бізнесу Боярка, стрічка новин Боярка, Думки Боярка, новини Боярка сьогодні, останні новини сьогодні Боярка, інформаційна агенція Боярка, інформація Боярка',
			'site' => 'Головні новини міста Боярка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/boyarka',
			'keywords' => 'Головний сайт Бояркаи, головні новини Боярка, новини ТОП Боярка, новини новини бізнесу Боярка, стрічка новин Боярка, Думки Боярка, новини Боярка сьогодні, останні новини сьогодні Боярка, інформаційна агенція Боярка, інформація Боярка',
		];

		$city = [
			'name' => 'Боярка',
			'name_link' => 'boyarka',
			'main_link' => 'boyarka.index',
			'news_line' => 'news.line',
			'news_link' => 'boyarka.news',
		];

		$url = env("SERVER_API_URL") . '/boyarka/with-nn';
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
	public function brovaryHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Бровари, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Броварів, головні новини Бровари, новини ТОП Бровари, новини новини бізнесу Бровари, стрічка новин Бровари, Думки Бровари, новини Бровари сьогодні, останні новини сьогодні Бровари, інформаційна агенція Бровари, інформація Бровари',
			'site' => 'Головні новини міста Бровари, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/brovary',
			'keywords' => 'Головний сайт Броварів, головні новини Бровари, новини ТОП Бровари, новини новини бізнесу Бровари, стрічка новин Бровари, Думки Бровари, новини Бровари сьогодні, останні новини сьогодні Бровари, інформаційна агенція Бровари, інформація Бровари',
		];

		$city = [
			'name' => 'Бровари',
			'name_link' => 'brovary',
			'main_link' => 'brovary.index',
			'news_line' => 'news.line',
			'news_link' => 'brovary.news',
		];

		$url = env("SERVER_API_URL") . '/brovary/with-nn';
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
	public function buchaHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Буча, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бучі, головні новини Буча, новини ТОП Житомир, новини новини бізнесу Буча, стрічка новин Буча, Думки Буча, новини Буча сьогодні, останні новини сьогодні Буча, інформаційна агенція Буча, інформація Буча',
			'site' => 'Головні новини міста Буча, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/bucha',
			'keywords' => 'Головний сайт Бучі, головні новини Буча, новини ТОП Житомир, новини новини бізнесу Буча, стрічка новин Буча, Думки Буча, новини Буча сьогодні, останні новини сьогодні Буча, інформаційна агенція Буча, інформація Буча',
		];

		$city = [
			'name' => 'Буча',
			'name_link' => 'bucha',
			'main_link' => 'bucha.index',
			'news_line' => 'news.line',
			'news_link' => 'bucha.news',
		];

		$url = env("SERVER_API_URL") . '/bucha/with-nn';
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
	public function fastivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Фастів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Фастів, головні новини Фастів, новини ТОП Фастів, новини новини бізнесу Фастів, стрічка новин Фастів, Думки Фастів, новини Фастів сьогодні, останні новини сьогодні Фастів, інформаційна агенція Фастів, інформація Фастів',
			'site' => 'Головні новини міста Фастів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/fastiv',
			'keywords' => 'Головний сайт Фастів, головні новини Фастів, новини ТОП Фастів, новини новини бізнесу Фастів, стрічка новин Фастів, Думки Фастів, новини Фастів сьогодні, останні новини сьогодні Фастів, інформаційна агенція Фастів, інформація Фастів',
		];

		$city = [
			'name' => 'Фастів',
			'name_link' => 'fastiv',
			'main_link' => 'fastiv.index',
			'news_line' => 'news.line',
			'news_link' => 'fastiv.news',
		];

		$url = env("SERVER_API_URL") . '/fastiv/with-nn';
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
	public function irpinHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Ірпінь, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ірпіня, головні новини Ірпінь, новини ТОП Ірпінь, новини новини бізнесу Ірпінь, стрічка новин Ірпінь, Думки Ірпінь, новини Ірпінь сьогодні, останні новини сьогодні Ірпінь, інформаційна агенція Ірпінь, інформація Ірпінь',
			'site' => 'Головні новини міста Ірпінь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/irpin',
			'keywords' => 'Головний сайт Ірпіня, головні новини Ірпінь, новини ТОП Ірпінь, новини новини бізнесу Ірпінь, стрічка новин Ірпінь, Думки Ірпінь, новини Ірпінь сьогодні, останні новини сьогодні Ірпінь, інформаційна агенція Ірпінь, інформація Ірпінь',
		];

		$city = [
			'name' => 'Ірпінь',
			'name_link' => 'irpin',
			'main_link' => 'irpin.index',
			'news_line' => 'news.line',
			'news_link' => 'irpin.news',
		];

		$url = env("SERVER_API_URL") . '/irpin/with-nn';
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
	public function obukhivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Обухів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Обухів, головні новини Обухів, новини ТОП Обухів, новини новини бізнесу Обухів, стрічка новин Обухів, Думки Обухів, новини Обухів сьогодні, останні новини сьогодні Обухів, інформаційна агенція Обухів, інформація Обухів',
			'site' => 'Головні новини міста Обухів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/obukhiv',
			'keywords' => 'Головний сайт Обухів, головні новини Обухів, новини ТОП Обухів, новини новини бізнесу Обухів, стрічка новин Обухів, Думки Обухів, новини Обухів сьогодні, останні новини сьогодні Обухів, інформаційна агенція Обухів, інформація Обухів',
		];

		$city = [
			'name' => 'Обухів',
			'name_link' => 'obukhiv',
			'main_link' => 'obukhiv.index',
			'news_line' => 'news.line',
			'news_link' => 'obukhiv.news',
		];

		$url = env("SERVER_API_URL") . '/obukhiv/with-nn';
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
	public function pereyaslavHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Переяслав, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Переяслав, головні новини Переяслав, новини ТОП Переяслав, новини новини бізнесу Переяслав, стрічка новин Переяслав, Думки Переяслав, новини Переяслав сьогодні, останні новини сьогодні Переяслав, інформаційна агенція Переяслав, інформація Переяслав',
			'site' => 'Головні новини міста Переяслав-Хмельницкий, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pereyaslav',
			'keywords' => 'Головний сайт Переяслав, головні новини Переяслав, новини ТОП Переяслав, новини новини бізнесу Переяслав, стрічка новин Переяслав, Думки Переяслав, новини Переяслав сьогодні, останні новини сьогодні Переяслав, інформаційна агенція Переяслав, інформація Переяслав',
		];

		$city = [
			'name' => 'Переяслав',
			'name_link' => 'pereyaslav',
			'main_link' => 'pereyaslav.index',
			'news_line' => 'news.line',
			'news_link' => 'pereyaslav.news',
		];

		$url = env("SERVER_API_URL") . '/pereyaslav/with-nn';
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
	public function skvyraHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Сквира, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Сквира, головні новини Сквира, новини ТОП Сквира, новини новини бізнесу Сквира, стрічка новин Сквира, Думки Сквира, новини Сквира сьогодні, останні новини сьогодні Сквира,  інформаційна агенція Сквира, інформація Сквира',
			'site' => 'Головні новини міста Сквира, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/skvyra',
			'keywords' => 'Головний сайт Сквира, головні новини Сквира, новини ТОП Сквира, новини новини бізнесу Сквира, стрічка новин Сквира, Думки Сквира, новини Сквира сьогодні, останні новини сьогодні Сквира,  інформаційна агенція Сквира, інформація Сквира',
		];

		$city = [
			'name' => 'Сквира',
			'name_link' => 'skvyra',
			'main_link' => 'skvyra.index',
			'news_line' => 'news.line',
			'news_link' => 'skvyra.news',
		];

		$url = env("SERVER_API_URL") . '/skvyra/with-nn';
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
	public function slavutychHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Славутич, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Славутича, головні новини Славутич, новини ТОП Славутич, новини новини бізнесу Славутич, стрічка новин Славутич, Думки Славутич, новини Славутич сьогодні, останні новини сьогодні Славутич, інформаційна агенція Славутич, інформація Славутич',
			'site' => 'Головні новини міста Славутич, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/slavutych',
			'keywords' => 'Головний сайт Славутича, головні новини Славутич, новини ТОП Славутич, новини новини бізнесу Славутич, стрічка новин Славутич, Думки Славутич, новини Славутич сьогодні, останні новини сьогодні Славутич, інформаційна агенція Славутич, інформація Славутич',
		];

		$city = [
			'name' => 'Славутич',
			'name_link' => 'slavutych',
			'main_link' => 'slavutych.index',
			'news_line' => 'news.line',
			'news_link' => 'slavutych.news',
		];

		$url = env("SERVER_API_URL") . '/slavutych/with-nn';
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
	public function vasylkivHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Васильків, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Васильків, головні новини Васильків, новини ТОП Васильків, новини новини бізнесу Васильків, стрічка новин Васильків, Думки Васильків, новини Васильків сьогодні, останні новини сьогодні Васильків, інформаційна агенція Васильків, інформація Васильків',
			'site' => 'Головні новини міста Васильків, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vasylkiv',
			'keywords' => 'Головний сайт Васильків, головні новини Васильків, новини ТОП Васильків, новини новини бізнесу Васильків, стрічка новин Васильків, Думки Васильків, новини Васильків сьогодні, останні новини сьогодні Васильків, інформаційна агенція Васильків, інформація Васильків',
		];

		$city = [
			'name' => 'Васильків',
			'name_link' => 'vasylkiv',
			'main_link' => 'vasylkiv.index',
			'news_line' => 'news.line',
			'news_link' => 'vasylkiv.news',
		];

		$url = env("SERVER_API_URL") . '/vasylkiv/with-nn';
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
	public function vyshhorodHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Вишгород, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вишгорода, головні новини Вишгород, новини ТОП Вишгород, новини новини бізнесу Вишгород, стрічка новин Вишгород, Думки Вишгород, новини Вишгород сьогодні, останні новини сьогодні Вишгород, інформаційна агенція Вишгород, інформація Вишгород',
			'site' => 'Головні новини міста Вишгород, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vyshhorod',
			'keywords' => 'Головний сайт Вишгорода, головні новини Вишгород, новини ТОП Вишгород, новини новини бізнесу Вишгород, стрічка новин Вишгород, Думки Вишгород, новини Вишгород сьогодні, останні новини сьогодні Вишгород, інформаційна агенція Вишгород, інформація Вишгород',
		];

		$city = [
			'name' => 'Вишгород',
			'name_link' => 'vyshhorod',
			'main_link' => 'vyshhorod.index',
			'news_line' => 'news.line',
			'news_link' => 'vyshhorod.news',
		];

		$url = env("SERVER_API_URL") . '/vyshhorod/with-nn';
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
	public function vyshneveHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Вишневе, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вишневого, головні новини Вишневе, новини ТОП Вишневе, новини новини бізнесу Вишневе, стрічка новин Вишневе, Думки Вишневе, новини Вишневе сьогодні, останні новини сьогодні Вишневе, інформаційна агенція Вишневе, інформація Вишневе',
			'site' => 'Головні новини міста Вишневе, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vyshneve',
			'keywords' => 'Головний сайт Вишневого, головні новини Вишневе, новини ТОП Вишневе, новини новини бізнесу Вишневе, стрічка новин Вишневе, Думки Вишневе, новини Вишневе сьогодні, останні новини сьогодні Вишневе,  інформаційна агенція Вишневе, інформація Вишневе',
		];

		$city = [
			'name' => 'Вишневе',
			'name_link' => 'vyshneve',
			'main_link' => 'vyshneve.index',
			'news_line' => 'news.line',
			'news_link' => 'vyshneve.news',
		];

		$url = env("SERVER_API_URL") . '/vyshneve/with-nn';
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
	public function yagotynHome()
	{
		$metaData = [
			'title' => 'Головні новини міста Яготин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Яготина, головні новини Яготин, новини ТОП Яготин, новини новини бізнесу Яготин, стрічка новин Яготин, Думки Яготин, новини Яготин сьогодні, останні новини сьогодні Яготин, інформаційна агенція Яготин, інформація Яготин',
			'site' => 'Головні новини міста Яготин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/yagotyn',
			'keywords' => 'Головний сайт Яготина, головні новини Яготин, новини ТОП Яготин, новини новини бізнесу Яготин, стрічка новин Яготин, Думки Яготин, новини Яготин сьогодні, останні новини сьогодні Яготин, інформаційна агенція Яготин, інформація Яготин',
		];

		$city = [
			'name' => 'Яготин',
			'name_link' => 'yagotyn',
			'main_link' => 'yagotyn.index',
			'news_line' => 'news.line',
			'news_link' => 'yagotyn.news',
		];

		$url = env("SERVER_API_URL") . '/yagotyn/with-nn';
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

	public function kyivLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Київ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Києва, головні новини Київ, новини ТОП Київ, новини новини бізнесу Київ, стрічка новин Київ, Думки Київ, новини Київ сьогодні, останні новини сьогодні Київ,  інформаційна агенція Київ, інформація Київ',
			'site' => 'Головні новини міста Київ, Новини України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kyiv',
			'keywords' => 'Головний сайт Києва, головні новини Київ, новини ТОП Київ, новини новини бізнесу Київ, стрічка новин Київ, Думки Київ, новини Київ сьогодні, останні новини сьогодні Київ,  інформаційна агенція Київ, інформація Київ',
		];

		$city = [
			'name' => 'Київ',
			'name_link' => 'kyiv',
			'main_link' => 'kyiv.index',
			'news_line' => 'news.line',
			'news_link' => 'kyiv.news',
		];

		$url = 'https://sside.daycom.com.ua/api/kyiv/with-nn';
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
	public function kyivNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Київ, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Києва, головні новини Київ, новини ТОП Київ, новини новини бізнесу Київ, стрічка новин Київ, Думки Київ, новини Київ сьогодні, останні новини сьогодні Київ,  інформаційна агенція Київ, інформація Київ',
			'site' => 'Головні новини міста Київ, Новини України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/kyiv',
			'keywords' => 'Головний сайт Києва, головні новини Київ, новини ТОП Київ, новини новини бізнесу Київ, стрічка новин Київ, Думки Київ, новини Київ сьогодні, останні новини сьогодні Київ,  інформаційна агенція Київ, інформація Київ',
		];

		$city = [
			'name' => 'Київ',
			'name_link' => 'kyiv',
			'main_link' => 'kyiv.index',
			'news_line' => 'news.line',
			'news_link' => 'kyiv.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/kyiv/news/' . $url;
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
	public function berezanLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Березань, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Березані, головні новини Березань, новини ТОП Березань, новини новини бізнесу Березань, стрічка новин Березань, Думки Березань, новини Березань сьогодні, останні новини сьогодні Березань, інформаційна агенція Березань, інформація Березань',
			'site' => 'Головні новини міста Березань, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/berezan',
			'keywords' => 'Головний сайт Березані, головні новини Березань, новини ТОП Березань, новини новини бізнесу Березань, стрічка новин Березань, Думки Березань, новини Березань сьогодні, останні новини сьогодні Березань, інформаційна агенція Березань, інформація Березань',
		];

		$city = [
			'name' => 'Березань',
			'name_link' => 'berezan',
			'main_link' => 'berezan.index',
			'news_line' => 'news.line',
			'news_link' => 'berezan.news',
		];

		$url = 'https://sside.daycom.com.ua/api/berezan/with-nn';
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
	public function berezanNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Березань, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Березані, головні новини Березань, новини ТОП Березань, новини новини бізнесу Березань, стрічка новин Березань, Думки Березань, новини Березань сьогодні, останні новини сьогодні Березань, інформаційна агенція Березань, інформація Березань',
			'site' => 'Головні новини міста Березань, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/berezan',
			'keywords' => 'Головний сайт Березані, головні новини Березань, новини ТОП Березань, новини новини бізнесу Березань, стрічка новин Березань, Думки Березань, новини Березань сьогодні, останні новини сьогодні Березань, інформаційна агенція Березань, інформація Березань',
		];

		$city = [
			'name' => 'Березань',
			'name_link' => 'berezan',
			'main_link' => 'berezan.index',
			'news_line' => 'news.line',
			'news_link' => 'berezan.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/berezan/news/' . $url;
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
	public function bilacerkvaLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Біла Церква, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Білої Церкви, головні новини Біла Церква, новини ТОП Біла Церква, новини новини бізнесу Біла Церква, стрічка новин Біла Церква, Думки Біла Церква, новини Біла Церква сьогодні, останні новини сьогодні Біла Церква, інформаційна агенція Біла Церква, інформація Біла Церква',
			'site' => 'Головні новини міста Біла Церква, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/bilacerkva',
			'keywords' => 'Головний сайт Білої Церкви, головні новини Біла Церква, новини ТОП Біла Церква, новини новини бізнесу Біла Церква, стрічка новин Біла Церква, Думки Біла Церква, новини Біла Церква сьогодні, останні новини сьогодні Біла Церква, інформаційна агенція Біла Церква, інформація Біла Церква',
		];

		$city = [
			'name' => 'Біла Церква',
			'name_link' => 'bilacerkva',
			'main_link' => 'bilacerkva.index',
			'news_line' => 'news.line',
			'news_link' => 'bilacerkva.news',
		];


		$url = 'https://sside.daycom.com.ua/api/bilacerkva/with-nn';
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
	public function bilacerkvaNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Біла Церква, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Білої Церкви, головні новини Біла Церква, новини ТОП Біла Церква, новини новини бізнесу Біла Церква, стрічка новин Біла Церква, Думки Біла Церква, новини Біла Церква сьогодні, останні новини сьогодні Біла Церква, інформаційна агенція Біла Церква, інформація Біла Церква',
			'site' => 'Головні новини міста Біла Церква, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/bilacerkva',
			'keywords' => 'Головний сайт Білої Церкви, головні новини Біла Церква, новини ТОП Біла Церква, новини новини бізнесу Біла Церква, стрічка новин Біла Церква, Думки Біла Церква, новини Біла Церква сьогодні, останні новини сьогодні Біла Церква, інформаційна агенція Біла Церква, інформація Біла Церква',
		];

		$city = [
			'name' => 'Біла Церква',
			'name_link' => 'bilacerkva',
			'main_link' => 'bilacerkva.index',
			'news_line' => 'news.line',
			'news_link' => 'bilacerkva.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/bilacerkva/news/' . $url;
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
	public function boryspilLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Бориспіль, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Борисполя, головні новини Борисполь, новини ТОП Борисполь, новини новини бізнесу Борисполь, стрічка новин Борисполь, Думки Борисполь, новини Борисполь сьогодні, останні новини сьогодні Борисполь, інформаційна агенція Борисполь, інформація Борисполь',
			'site' => 'Головні новини міста Борисполь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/boryspil',
			'keywords' => 'Головний сайт Борисполя, головні новини Борисполь, новини ТОП Борисполь, новини новини бізнесу Борисполь, стрічка новин Борисполь, Думки Борисполь, новини Борисполь сьогодні, останні новини сьогодні Борисполь,  інформаційна агенція Борисполь, інформація Борисполь',
		];

		$city = [
			'name' => 'Бориспіль',
			'name_link' => 'boryspil',
			'main_link' => 'boryspil.index',
			'news_line' => 'news.line',
			'news_link' => 'boryspil.news',
		];

		$url = 'https://sside.daycom.com.ua/api/boryspil/with-nn';
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
	public function boryspilNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Бориспіль, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Борисполя, головні новини Борисполь, новини ТОП Борисполь, новини новини бізнесу Борисполь, стрічка новин Борисполь, Думки Борисполь, новини Борисполь сьогодні, останні новини сьогодні Борисполь, інформаційна агенція Борисполь, інформація Борисполь',
			'site' => 'Головні новини міста Борисполь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/boryspil',
			'keywords' => 'Головний сайт Борисполя, головні новини Борисполь, новини ТОП Борисполь, новини новини бізнесу Борисполь, стрічка новин Борисполь, Думки Борисполь, новини Борисполь сьогодні, останні новини сьогодні Борисполь,  інформаційна агенція Борисполь, інформація Борисполь',
		];

		$city = [
			'name' => 'Бориспіль',
			'name_link' => 'boryspil',
			'main_link' => 'boryspil.index',
			'news_line' => 'news.line',
			'news_link' => 'boryspil.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/boryspil/news/' . $url;
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
	public function boyarkaLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Боярка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бояркаи, головні новини Боярка, новини ТОП Боярка, новини новини бізнесу Боярка, стрічка новин Боярка, Думки Боярка, новини Боярка сьогодні, останні новини сьогодні Боярка, інформаційна агенція Боярка, інформація Боярка',
			'site' => 'Головні новини міста Боярка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/boyarka',
			'keywords' => 'Головний сайт Бояркаи, головні новини Боярка, новини ТОП Боярка, новини новини бізнесу Боярка, стрічка новин Боярка, Думки Боярка, новини Боярка сьогодні, останні новини сьогодні Боярка, інформаційна агенція Боярка, інформація Боярка',
		];

		$city = [
			'name' => 'Боярка',
			'name_link' => 'boyarka',
			'main_link' => 'boyarka.index',
			'news_line' => 'news.line',
			'news_link' => 'boyarka.news',
		];

		$url = 'https://sside.daycom.com.ua/api/boyarka/with-nn';
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
	public function boyarkaNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Боярка, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бояркаи, головні новини Боярка, новини ТОП Боярка, новини новини бізнесу Боярка, стрічка новин Боярка, Думки Боярка, новини Боярка сьогодні, останні новини сьогодні Боярка, інформаційна агенція Боярка, інформація Боярка',
			'site' => 'Головні новини міста Боярка, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/boyarka',
			'keywords' => 'Головний сайт Бояркаи, головні новини Боярка, новини ТОП Боярка, новини новини бізнесу Боярка, стрічка новин Боярка, Думки Боярка, новини Боярка сьогодні, останні новини сьогодні Боярка, інформаційна агенція Боярка, інформація Боярка',
		];

		$city = [
			'name' => 'Боярка',
			'name_link' => 'boyarka',
			'main_link' => 'boyarka.index',
			'news_line' => 'news.line',
			'news_link' => 'boyarka.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/boyarka/news/' . $url;
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
	public function brovaryLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Бровари, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Броварів, головні новини Бровари, новини ТОП Бровари, новини новини бізнесу Бровари, стрічка новин Бровари, Думки Бровари, новини Бровари сьогодні, останні новини сьогодні Бровари, інформаційна агенція Бровари, інформація Бровари',
			'site' => 'Головні новини міста Бровари, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/brovary',
			'keywords' => 'Головний сайт Броварів, головні новини Бровари, новини ТОП Бровари, новини новини бізнесу Бровари, стрічка новин Бровари, Думки Бровари, новини Бровари сьогодні, останні новини сьогодні Бровари, інформаційна агенція Бровари, інформація Бровари',
		];

		$city = [
			'name' => 'Бровари',
			'name_link' => 'brovary',
			'main_link' => 'brovary.index',
			'news_line' => 'news.line',
			'news_link' => 'brovary.news',
		];

		$url = 'https://sside.daycom.com.ua/api/brovary/with-nn';
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
	public function brovaryNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Бровари, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Броварів, головні новини Бровари, новини ТОП Бровари, новини новини бізнесу Бровари, стрічка новин Бровари, Думки Бровари, новини Бровари сьогодні, останні новини сьогодні Бровари, інформаційна агенція Бровари, інформація Бровари',
			'site' => 'Головні новини міста Бровари, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/brovary',
			'keywords' => 'Головний сайт Броварів, головні новини Бровари, новини ТОП Бровари, новини новини бізнесу Бровари, стрічка новин Бровари, Думки Бровари, новини Бровари сьогодні, останні новини сьогодні Бровари, інформаційна агенція Бровари, інформація Бровари',
		];

		$city = [
			'name' => 'Бровари',
			'name_link' => 'brovary',
			'main_link' => 'brovary.index',
			'news_line' => 'news.line',
			'news_link' => 'brovary.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/brovary/news/' . $url;
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
	public function buchaLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Буча, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бучі, головні новини Буча, новини ТОП Житомир, новини новини бізнесу Буча, стрічка новин Буча, Думки Буча, новини Буча сьогодні, останні новини сьогодні Буча, інформаційна агенція Буча, інформація Буча',
			'site' => 'Головні новини міста Буча, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/bucha',
			'keywords' => 'Головний сайт Бучі, головні новини Буча, новини ТОП Житомир, новини новини бізнесу Буча, стрічка новин Буча, Думки Буча, новини Буча сьогодні, останні новини сьогодні Буча, інформаційна агенція Буча, інформація Буча',
		];

		$city = [
			'name' => 'Буча',
			'name_link' => 'bucha',
			'main_link' => 'bucha.index',
			'news_line' => 'news.line',
			'news_link' => 'bucha.news',
		];

		$url = 'https://sside.daycom.com.ua/api/buchawith-nn';
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
	public function buchaNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Буча, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Бучі, головні новини Буча, новини ТОП Житомир, новини новини бізнесу Буча, стрічка новин Буча, Думки Буча, новини Буча сьогодні, останні новини сьогодні Буча, інформаційна агенція Буча, інформація Буча',
			'site' => 'Головні новини міста Буча, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/bucha',
			'keywords' => 'Головний сайт Бучі, головні новини Буча, новини ТОП Житомир, новини новини бізнесу Буча, стрічка новин Буча, Думки Буча, новини Буча сьогодні, останні новини сьогодні Буча, інформаційна агенція Буча, інформація Буча',
		];

		$city = [
			'name' => 'Буча',
			'name_link' => 'bucha',
			'main_link' => 'bucha.index',
			'news_line' => 'news.line',
			'news_link' => 'bucha.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/bucha/news/' . $url;
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
	public function fastivLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Фастів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Фастів, головні новини Фастів, новини ТОП Фастів, новини новини бізнесу Фастів, стрічка новин Фастів, Думки Фастів, новини Фастів сьогодні, останні новини сьогодні Фастів, інформаційна агенція Фастів, інформація Фастів',
			'site' => 'Головні новини міста Фастів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/fastiv',
			'keywords' => 'Головний сайт Фастів, головні новини Фастів, новини ТОП Фастів, новини новини бізнесу Фастів, стрічка новин Фастів, Думки Фастів, новини Фастів сьогодні, останні новини сьогодні Фастів, інформаційна агенція Фастів, інформація Фастів',
		];

		$city = [
			'name' => 'Фастів',
			'name_link' => 'fastiv',
			'main_link' => 'fastiv.index',
			'news_line' => 'news.line',
			'news_link' => 'fastiv.news',
		];

		$url = 'https://sside.daycom.com.ua/api/fastiv/with-nn';
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
	public function fastivNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Фастів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Фастів, головні новини Фастів, новини ТОП Фастів, новини новини бізнесу Фастів, стрічка новин Фастів, Думки Фастів, новини Фастів сьогодні, останні новини сьогодні Фастів, інформаційна агенція Фастів, інформація Фастів',
			'site' => 'Головні новини міста Фастів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/fastiv',
			'keywords' => 'Головний сайт Фастів, головні новини Фастів, новини ТОП Фастів, новини новини бізнесу Фастів, стрічка новин Фастів, Думки Фастів, новини Фастів сьогодні, останні новини сьогодні Фастів, інформаційна агенція Фастів, інформація Фастів',
		];

		$city = [
			'name' => 'Фастів',
			'name_link' => 'fastiv',
			'main_link' => 'fastiv.index',
			'news_line' => 'news.line',
			'news_link' => 'fastiv.news',
		];
		$rUrl = 'https://sside.daycom.com.ua/api/fastiv/news/' . $url;
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
	public function irpinLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Ірпінь, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ірпіня, головні новини Ірпінь, новини ТОП Ірпінь, новини новини бізнесу Ірпінь, стрічка новин Ірпінь, Думки Ірпінь, новини Ірпінь сьогодні, останні новини сьогодні Ірпінь, інформаційна агенція Ірпінь, інформація Ірпінь',
			'site' => 'Головні новини міста Ірпінь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/irpin',
			'keywords' => 'Головний сайт Ірпіня, головні новини Ірпінь, новини ТОП Ірпінь, новини новини бізнесу Ірпінь, стрічка новин Ірпінь, Думки Ірпінь, новини Ірпінь сьогодні, останні новини сьогодні Ірпінь, інформаційна агенція Ірпінь, інформація Ірпінь',
		];

		$city = [
			'name' => 'Ірпінь',
			'name_link' => 'irpin',
			'main_link' => 'irpin.index',
			'news_line' => 'news.line',
			'news_link' => 'irpin.news',
		];

		$url = 'https://sside.daycom.com.ua/api/irpin/with-nn';
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
	public function irpinNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Ірпінь, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Ірпіня, головні новини Ірпінь, новини ТОП Ірпінь, новини новини бізнесу Ірпінь, стрічка новин Ірпінь, Думки Ірпінь, новини Ірпінь сьогодні, останні новини сьогодні Ірпінь, інформаційна агенція Ірпінь, інформація Ірпінь',
			'site' => 'Головні новини міста Ірпінь, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/irpin',
			'keywords' => 'Головний сайт Ірпіня, головні новини Ірпінь, новини ТОП Ірпінь, новини новини бізнесу Ірпінь, стрічка новин Ірпінь, Думки Ірпінь, новини Ірпінь сьогодні, останні новини сьогодні Ірпінь, інформаційна агенція Ірпінь, інформація Ірпінь',
		];

		$city = [
			'name' => 'Ірпінь',
			'name_link' => 'irpin',
			'main_link' => 'irpin.index',
			'news_line' => 'news.line',
			'news_link' => 'irpin.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/irpin/news/' . $url;
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
	public function obukhivLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Обухів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Обухів, головні новини Обухів, новини ТОП Обухів, новини новини бізнесу Обухів, стрічка новин Обухів, Думки Обухів, новини Обухів сьогодні, останні новини сьогодні Обухів, інформаційна агенція Обухів, інформація Обухів',
			'site' => 'Головні новини міста Обухів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/obukhiv',
			'keywords' => 'Головний сайт Обухів, головні новини Обухів, новини ТОП Обухів, новини новини бізнесу Обухів, стрічка новин Обухів, Думки Обухів, новини Обухів сьогодні, останні новини сьогодні Обухів, інформаційна агенція Обухів, інформація Обухів',
		];

		$city = [
			'name' => 'Обухів',
			'name_link' => 'obukhiv',
			'main_link' => 'obukhiv.index',
			'news_line' => 'news.line',
			'news_link' => 'obukhiv.news',
		];

		$url = 'https://sside.daycom.com.ua/api/obukhiv/with-nn';
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
	public function obukhivNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Обухів, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Обухів, головні новини Обухів, новини ТОП Обухів, новини новини бізнесу Обухів, стрічка новин Обухів, Думки Обухів, новини Обухів сьогодні, останні новини сьогодні Обухів, інформаційна агенція Обухів, інформація Обухів',
			'site' => 'Головні новини міста Обухів, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/obukhiv',
			'keywords' => 'Головний сайт Обухів, головні новини Обухів, новини ТОП Обухів, новини новини бізнесу Обухів, стрічка новин Обухів, Думки Обухів, новини Обухів сьогодні, останні новини сьогодні Обухів, інформаційна агенція Обухів, інформація Обухів',
		];

		$city = [
			'name' => 'Обухів',
			'name_link' => 'obukhiv',
			'main_link' => 'obukhiv.index',
			'news_line' => 'news.line',
			'news_link' => 'obukhiv.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/obukhiv/news/' . $url;
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
	public function pereyaslavLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Переяслав, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Переяслав, головні новини Переяслав, новини ТОП Переяслав, новини новини бізнесу Переяслав, стрічка новин Переяслав, Думки Переяслав, новини Переяслав сьогодні, останні новини сьогодні Переяслав, інформаційна агенція Переяслав, інформація Переяслав',
			'site' => 'Головні новини міста Переяслав-Хмельницкий, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pereyaslav',
			'keywords' => 'Головний сайт Переяслав, головні новини Переяслав, новини ТОП Переяслав, новини новини бізнесу Переяслав, стрічка новин Переяслав, Думки Переяслав, новини Переяслав сьогодні, останні новини сьогодні Переяслав, інформаційна агенція Переяслав, інформація Переяслав',
		];

		$city = [
			'name' => 'Переяслав',
			'name_link' => 'pereyaslav',
			'main_link' => 'pereyaslav.index',
			'news_line' => 'news.line',
			'news_link' => 'pereyaslav.news',
		];

		$url = 'https://sside.daycom.com.ua/api/pereyaslav/with-nn';
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
	public function pereyaslavNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Переяслав, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Переяслав, головні новини Переяслав, новини ТОП Переяслав, новини новини бізнесу Переяслав, стрічка новин Переяслав, Думки Переяслав, новини Переяслав сьогодні, останні новини сьогодні Переяслав, інформаційна агенція Переяслав, інформація Переяслав',
			'site' => 'Головні новини міста Переяслав-Хмельницкий, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/pereyaslav',
			'keywords' => 'Головний сайт Переяслав, головні новини Переяслав, новини ТОП Переяслав, новини новини бізнесу Переяслав, стрічка новин Переяслав, Думки Переяслав, новини Переяслав сьогодні, останні новини сьогодні Переяслав, інформаційна агенція Переяслав, інформація Переяслав',
		];

		$city = [
			'name' => 'Переяслав',
			'name_link' => 'pereyaslav',
			'main_link' => 'pereyaslav.index',
			'news_line' => 'news.line',
			'news_link' => 'pereyaslav.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/pereyaslav/news/' . $url;
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
	public function skvyraLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Сквира, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Сквира, головні новини Сквира, новини ТОП Сквира, новини новини бізнесу Сквира, стрічка новин Сквира, Думки Сквира, новини Сквира сьогодні, останні новини сьогодні Сквира,  інформаційна агенція Сквира, інформація Сквира',
			'site' => 'Головні новини міста Сквира, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/skvyra',
			'keywords' => 'Головний сайт Сквира, головні новини Сквира, новини ТОП Сквира, новини новини бізнесу Сквира, стрічка новин Сквира, Думки Сквира, новини Сквира сьогодні, останні новини сьогодні Сквира,  інформаційна агенція Сквира, інформація Сквира',
		];

		$city = [
			'name' => 'Сквира',
			'name_link' => 'skvyra',
			'main_link' => 'skvyra.index',
			'news_line' => 'news.line',
			'news_link' => 'skvyra.news',
		];

		$url = 'https://sside.daycom.com.ua/api/skvyra/with-nn';
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
	public function skvyraNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Сквира, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Сквира, головні новини Сквира, новини ТОП Сквира, новини новини бізнесу Сквира, стрічка новин Сквира, Думки Сквира, новини Сквира сьогодні, останні новини сьогодні Сквира,  інформаційна агенція Сквира, інформація Сквира',
			'site' => 'Головні новини міста Сквира, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/skvyra',
			'keywords' => 'Головний сайт Сквира, головні новини Сквира, новини ТОП Сквира, новини новини бізнесу Сквира, стрічка новин Сквира, Думки Сквира, новини Сквира сьогодні, останні новини сьогодні Сквира,  інформаційна агенція Сквира, інформація Сквира',
		];

		$city = [
			'name' => 'Сквира',
			'name_link' => 'skvyra',
			'main_link' => 'skvyra.index',
			'news_line' => 'news.line',
			'news_link' => 'skvyra.news',
		];
		$rUrl = 'https://sside.daycom.com.ua/api/skvyra/news/' . $url;
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
	public function slavutychLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Славутич, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Славутича, головні новини Славутич, новини ТОП Славутич, новини новини бізнесу Славутич, стрічка новин Славутич, Думки Славутич, новини Славутич сьогодні, останні новини сьогодні Славутич, інформаційна агенція Славутич, інформація Славутич',
			'site' => 'Головні новини міста Славутич, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/slavutych',
			'keywords' => 'Головний сайт Славутича, головні новини Славутич, новини ТОП Славутич, новини новини бізнесу Славутич, стрічка новин Славутич, Думки Славутич, новини Славутич сьогодні, останні новини сьогодні Славутич, інформаційна агенція Славутич, інформація Славутич',
		];

		$city = [
			'name' => 'Славутич',
			'name_link' => 'slavutych',
			'main_link' => 'slavutych.index',
			'news_line' => 'news.line',
			'news_link' => 'slavutych.news',
		];

		$url = 'https://sside.daycom.com.ua/api/slavutych/with-nn';
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
	public function slavutychNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Славутич, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Славутича, головні новини Славутич, новини ТОП Славутич, новини новини бізнесу Славутич, стрічка новин Славутич, Думки Славутич, новини Славутич сьогодні, останні новини сьогодні Славутич, інформаційна агенція Славутич, інформація Славутич',
			'site' => 'Головні новини міста Славутич, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/slavutych',
			'keywords' => 'Головний сайт Славутича, головні новини Славутич, новини ТОП Славутич, новини новини бізнесу Славутич, стрічка новин Славутич, Думки Славутич, новини Славутич сьогодні, останні новини сьогодні Славутич, інформаційна агенція Славутич, інформація Славутич',
		];

		$city = [
			'name' => 'Славутич',
			'name_link' => 'slavutych',
			'main_link' => 'slavutych.index',
			'news_line' => 'news.line',
			'news_link' => 'slavutych.news',
		];
		$rUrl = 'https://sside.daycom.com.ua/api/slavutych/news/' . $url;
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
	public function vasylkivLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Васильків, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Васильків, головні новини Васильків, новини ТОП Васильків, новини новини бізнесу Васильків, стрічка новин Васильків, Думки Васильків, новини Васильків сьогодні, останні новини сьогодні Васильків, інформаційна агенція Васильків, інформація Васильків',
			'site' => 'Головні новини міста Васильків, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vasylkiv',
			'keywords' => 'Головний сайт Васильків, головні новини Васильків, новини ТОП Васильків, новини новини бізнесу Васильків, стрічка новин Васильків, Думки Васильків, новини Васильків сьогодні, останні новини сьогодні Васильків, інформаційна агенція Васильків, інформація Васильків',
		];

		$city = [
			'name' => 'Васильків',
			'name_link' => 'vasylkiv',
			'main_link' => 'vasylkiv.index',
			'news_line' => 'news.line',
			'news_link' => 'vasylkiv.news',
		];

		$url = 'https://sside.daycom.com.ua/api/vasylkiv/with-nn';
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
	public function vasylkivNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Васильків, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Васильків, головні новини Васильків, новини ТОП Васильків, новини новини бізнесу Васильків, стрічка новин Васильків, Думки Васильків, новини Васильків сьогодні, останні новини сьогодні Васильків, інформаційна агенція Васильків, інформація Васильків',
			'site' => 'Головні новини міста Васильків, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vasylkiv',
			'keywords' => 'Головний сайт Васильків, головні новини Васильків, новини ТОП Васильків, новини новини бізнесу Васильків, стрічка новин Васильків, Думки Васильків, новини Васильків сьогодні, останні новини сьогодні Васильків, інформаційна агенція Васильків, інформація Васильків',
		];

		$city = [
			'name' => 'Васильків',
			'name_link' => 'vasylkiv',
			'main_link' => 'vasylkiv.index',
			'news_line' => 'news.line',
			'news_link' => 'vasylkiv.news',
		];

		$rUrl = 'https://sside.daycom.com.ua/api/vasylkiv/news/' . $url;
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
	public function vyshhorodLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Вишгород, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вишгорода, головні новини Вишгород, новини ТОП Вишгород, новини новини бізнесу Вишгород, стрічка новин Вишгород, Думки Вишгород, новини Вишгород сьогодні, останні новини сьогодні Вишгород, інформаційна агенція Вишгород, інформація Вишгород',
			'site' => 'Головні новини міста Вишгород, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vyshhorod',
			'keywords' => 'Головний сайт Вишгорода, головні новини Вишгород, новини ТОП Вишгород, новини новини бізнесу Вишгород, стрічка новин Вишгород, Думки Вишгород, новини Вишгород сьогодні, останні новини сьогодні Вишгород, інформаційна агенція Вишгород, інформація Вишгород',
		];

		$city = [
			'name' => 'Вишгород',
			'name_link' => 'vyshhorod',
			'main_link' => 'vyshhorod.index',
			'news_line' => 'news.line',
			'news_link' => 'vyshhorod.news',
		];

		$url = 'https://sside.daycom.com.ua/api/vyshhorod/with-nn';
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
	public function vyshhorodNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Вишгород, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вишгорода, головні новини Вишгород, новини ТОП Вишгород, новини новини бізнесу Вишгород, стрічка новин Вишгород, Думки Вишгород, новини Вишгород сьогодні, останні новини сьогодні Вишгород, інформаційна агенція Вишгород, інформація Вишгород',
			'site' => 'Головні новини міста Вишгород, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vyshhorod',
			'keywords' => 'Головний сайт Вишгорода, головні новини Вишгород, новини ТОП Вишгород, новини новини бізнесу Вишгород, стрічка новин Вишгород, Думки Вишгород, новини Вишгород сьогодні, останні новини сьогодні Вишгород, інформаційна агенція Вишгород, інформація Вишгород',
		];

		$city = [
			'name' => 'Вишгород',
			'name_link' => 'vyshhorod',
			'main_link' => 'vyshhorod.index',
			'news_line' => 'news.line',
			'news_link' => 'vyshhorod.news',
		];
		$rUrl = 'https://sside.daycom.com.ua/api/vyshhorod/news/' . $url;
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
	public function vyshneveLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Вишневе, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вишневого, головні новини Вишневе, новини ТОП Вишневе, новини новини бізнесу Вишневе, стрічка новин Вишневе, Думки Вишневе, новини Вишневе сьогодні, останні новини сьогодні Вишневе, інформаційна агенція Вишневе, інформація Вишневе',
			'site' => 'Головні новини міста Вишневе, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vyshneve',
			'keywords' => 'Головний сайт Вишневого, головні новини Вишневе, новини ТОП Вишневе, новини новини бізнесу Вишневе, стрічка новин Вишневе, Думки Вишневе, новини Вишневе сьогодні, останні новини сьогодні Вишневе,  інформаційна агенція Вишневе, інформація Вишневе',
		];

		$city = [
			'name' => 'Вишневе',
			'name_link' => 'vyshneve',
			'main_link' => 'vyshneve.index',
			'news_line' => 'news.line',
			'news_link' => 'vyshneve.news',
		];

		$url = 'https://sside.daycom.com.ua/api/vyshneve/with-nn';
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
	public function vyshneveNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Вишневе, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Вишневого, головні новини Вишневе, новини ТОП Вишневе, новини новини бізнесу Вишневе, стрічка новин Вишневе, Думки Вишневе, новини Вишневе сьогодні, останні новини сьогодні Вишневе, інформаційна агенція Вишневе, інформація Вишневе',
			'site' => 'Головні новини міста Вишневе, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/vyshneve',
			'keywords' => 'Головний сайт Вишневого, головні новини Вишневе, новини ТОП Вишневе, новини новини бізнесу Вишневе, стрічка новин Вишневе, Думки Вишневе, новини Вишневе сьогодні, останні новини сьогодні Вишневе,  інформаційна агенція Вишневе, інформація Вишневе',
		];

		$city = [
			'name' => 'Вишневе',
			'name_link' => 'vyshneve',
			'main_link' => 'vyshneve.index',
			'news_line' => 'news.line',
			'news_link' => 'vyshneve.news',
		];
		$rUrl = 'https://sside.daycom.com.ua/api/vyshneve/news/' . $url;
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
	public function yagotynLine()
	{
		$metaData = [
			'title' => 'Головні новини міста Яготин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Яготина, головні новини Яготин, новини ТОП Яготин, новини новини бізнесу Яготин, стрічка новин Яготин, Думки Яготин, новини Яготин сьогодні, останні новини сьогодні Яготин, інформаційна агенція Яготин, інформація Яготин',
			'site' => 'Головні новини міста Яготин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/yagotyn',
			'keywords' => 'Головний сайт Яготина, головні новини Яготин, новини ТОП Яготин, новини новини бізнесу Яготин, стрічка новин Яготин, Думки Яготин, новини Яготин сьогодні, останні новини сьогодні Яготин, інформаційна агенція Яготин, інформація Яготин',
		];

		$city = [
			'name' => 'Яготин',
			'name_link' => 'yagotyn',
			'main_link' => 'yagotyn.index',
			'news_line' => 'news.line',
			'news_link' => 'yagotyn.news',
		];
		$url = 'https://sside.daycom.com.ua/api/yagotyn/with-nn';
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
	public function yagotynNews($url)
	{
		$metaData = [
			'title' => 'Головні новини міста Яготин, України та світу на сторінках газети Дейком',
			'description' => 'Головний сайт Яготина, головні новини Яготин, новини ТОП Яготин, новини новини бізнесу Яготин, стрічка новин Яготин, Думки Яготин, новини Яготин сьогодні, останні новини сьогодні Яготин, інформаційна агенція Яготин, інформація Яготин',
			'site' => 'Головні новини міста Яготин, України та світу на сторінках газети Дейком',
			'url' => 'https://daycom.com.ua/yagotyn',
			'keywords' => 'Головний сайт Яготина, головні новини Яготин, новини ТОП Яготин, новини новини бізнесу Яготин, стрічка новин Яготин, Думки Яготин, новини Яготин сьогодні, останні новини сьогодні Яготин, інформаційна агенція Яготин, інформація Яготин',
		];

		$city = [
			'name' => 'Яготин',
			'name_link' => 'yagotyn',
			'main_link' => 'yagotyn.index',
			'news_line' => 'news.line',
			'news_link' => 'yagotyn.news',
		];
		$rUrl = 'https://sside.daycom.com.ua/api/yagotyn/news/' . $url;
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
