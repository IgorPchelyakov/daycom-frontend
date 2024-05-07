<?php

class DataProcessing
{
    public static function fetchDataFromAPI($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            return json_decode($response, true);
        }

        return null;
    }

    public static function filterData($data, $categories, $sections, $currentDate)
    {
        $filteredData = [];

        foreach ($categories as $category => $count) {
            $filteredData[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
                $itemDate = new \DateTime($item['publishedAt']);
                return $item['block'] === $category && $itemDate <= $currentDate;
            });

            $filteredData[$category] = array_slice($filteredData[$category], 0, $count);
        }

        foreach ($sections as $section => $count) {
            $filteredData[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
                $itemDate = new \DateTime($item['publishedAt']);
                return $item['section'] === $section && $itemDate <= $currentDate;
            });

            $filteredData[$section] = array_slice($filteredData[$section], 0, $count);
        }

        return $filteredData;
    }

    public static function sortByDate($data)
    {
        foreach ($data as $key => $items) {
            usort($data[$key], function ($a, $b) {
                return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
            });
        }

        return $data;
    }
};
