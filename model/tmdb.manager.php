<?php
require_once('conf/init.inc.php');


class TmdbManager
{
    /***************************
     * ----- PARAMS STRING -----
     ***************************/
    private $api_key = '9ff5f27b6f00c3da0be7419bc71fa24e';
    private $serie_detail_url = 'https://api.themoviedb.org/3/tv/';

    /**************************************
     * ----- INIT SERIE DETAIL FUNC -----
     **************************************/
    function initSerieDetail($rows_series){

        foreach ($rows_series as $s){

            $new_season = new season();
            $new_season->media_id = $s->id;

            // proceed
            $res_detail = $this->getData('GET', $this->serie_detail_url.$s->id.'?api_key='.$this->api_key.'&language=fr-FR');
            $tmp = json_decode($res_detail);

            // add 8 by default to compensate the missings of API
            $new_season->s1 = 12;
            $new_season->s2 = 12;

            $new_season->total_season = 2;

            // add
            $new_season->insertRow();
        }
    }


    /***************************
     * ----- INIT DATA FUNC -----
     ***************************/
    function init(){

        foreach (range('a','z') as $a){
            $res_movies = $this->getData('GET', 'https://api.themoviedb.org/3/search/movie?api_key='.$this->api_key.'&language=fr-FR&page=10&include_adult=false&query='.$a);
            $res_series = $this->getData('GET', 'https://api.themoviedb.org/3/search/tv?api_key=9ff5f27b6f00c3da0be7419bc71fa24e&language=fr-FR&page=1&include_adult=false&query='.$a);

            $this->insertDataToSQL($res_movies);
            $this->insertDataToSQL($res_series, 'serie');
        }

    }

    /***************************
     * ----- GET DATA FUNC -----
     ***************************/
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

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;

    }


    /***************************
     * --- INSERT DATA FUNC -----
     ***************************/
    function insertDataToSQL($encoded_data, $method = 'movie'){

        // decode data
        $tmp = json_decode($encoded_data);
        $data = $tmp->results;

        // loop
        foreach ($data as $elem){

            $test = new media();
            $count = $test->nbRows();
            $test->getRowIdAPI($elem->id);

            // skip if
            if($elem->poster_path == null || $elem->backdrop_path == null || $elem->overview == null || $elem->vote_average == null) continue;
            if($count > 0){
                if($test->id != null) continue;
            }

            $new_media = new media();
            $new_list_genre_id = new list_genre();

            // check how many genre
            switch (sizeof($elem->genre_ids)){

                case 1 :
                    $new_list_genre_id->first = $elem->genre_ids[0];
                    break;
                case 2 :
                    $new_list_genre_id->first = $elem->genre_ids[0];
                    $new_list_genre_id->second = $elem->genre_ids[1];
                    break;
                case 3 :
                    $new_list_genre_id->first = $elem->genre_ids[0];
                    $new_list_genre_id->second = $elem->genre_ids[1];
                    $new_list_genre_id->third = $elem->genre_ids[2];
                    break;
                case 4 :
                    $new_list_genre_id->first = $elem->genre_ids[0];
                    $new_list_genre_id->second = $elem->genre_ids[1];
                    $new_list_genre_id->third = $elem->genre_ids[2];
                    $new_list_genre_id->fourth = $elem->genre_ids[3];
                    break;
                case 5 :
                    $new_list_genre_id->first = $elem->genre_ids[0];
                    $new_list_genre_id->second = $elem->genre_ids[1];
                    $new_list_genre_id->third = $elem->genre_ids[2];
                    $new_list_genre_id->fifth = $elem->genre_ids[4];
                    break;

            }


            $new_media->api_id = $elem->id;
            $new_media->title = ($method == 'movie') ? $elem->original_title : $elem->original_name;
            $new_media->description = $elem->overview;
            $new_media->popularity = $elem->popularity;
            $new_media->vote_count = $elem->vote_count;
            $new_media->poster_path = $elem->poster_path;
            $new_media->backdrop_path = $elem->backdrop_path;
            $new_media->vote_average = $elem->vote_average;

            // fake duration according to the fake url
            $new_media->duration = ($method == 'movie') ? 2523 : 234;

            $new_media->type = ($method == 'movie') ? 'movie' : 'serie';
            $new_media->release_date = ($method == 'movie') ? $elem->release_date : $elem->first_air_date;
            $new_media->trailer_url = ($method == 'movie') ? 'CfkHyFClLSg' : 't80H8HuuEFQ';

            $new_list_genre_id->insertRow();

            $new_media->list_genre_id = $new_list_genre_id->id;
            $new_media->insertRow();
        }

    }



}