<?php


class TmdbManager
{
    private $api_key = '9ff5f27b6f00c3da0be7419bc71fa24e';

    private $search_tv_movie_actor = 'https://api.themoviedb.org/3/search/multi?api_key=9ff5f27b6f00c3da0be7419bc71fa24e&language=fr-FR&page=1&include_adult=false&query=';

    private $search_movie = 'https://api.themoviedb.org/3/search/movie?api_key=9ff5f27b6f00c3da0be7419bc71fa24e&language=en-US&page=1&include_adult=false&query=';

    private $search_tv = 'https://api.themoviedb.org/3/search/tv?api_key=9ff5f27b6f00c3da0be7419bc71fa24e&language=en-US&page=1&include_adult=false&query=';




    function getData(String $method, String $url, $data = false){

        $curl = curl_init();

        switch ($method){
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);
                if($data) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if($data) $url = sprintf('%s?%s', $url, http_build_query($data));
        }

        // Optional Authentication:
//        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;

    }



}