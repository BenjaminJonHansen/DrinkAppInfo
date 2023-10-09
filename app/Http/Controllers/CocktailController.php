<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class CocktailController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // function get_cocktail_list() {
    
    // $cocktails = array();


    // $request = new HttpRequest();
    // $request->setUrl('https://the-cocktail-db.p.rapidapi.com/search.php');
    // $request->setMethod(HTTP_METH_GET);
    // $request->setHeaders([	'X-RapidAPI-Key' => 'a9527b68damsh3ea8f877d4a3b93p110f8bjsn0137531fd001',	'X-RapidAPI-Host' => 'the-cocktail-db.p.rapidapi.com']);
    // try {	$response = $request->send();
	// echo $response->getBody();} catch (HttpException $ex) {	echo $ex;}
    // }

    public function index()
    {
        return view('homePage', ['product' => \App\Models\User::factory(1)->make()]);
    }

    public function dumb()
    {
        $query = request()->input('query');
        $response = Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $query)->json()['drinks'] ?? [];
        $drinks = [];
        foreach($response as $entry){
            $drinks[] = new \App\Models\Drink($entry);
        }
        return view('dumb', ['drinks' => $drinks]);
    }

    public function search()
    {
        $query = request()->input('query');
        return Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $query)->json();
    }

    public function get_cocktail_list() {
        $cocktails = array();
    
        $url = 'https://the-cocktail-db.p.rapidapi.com/search.php';

        $api_key = 'a9527b68damsh3ea8f877d4a3b93p110f8bjsn0137531fd001';
        $headers = [
            'X-RapidAPI-Key' => $api_key,
            'X-RapidAPI-Host' => 'the-cocktail-db.p.rapidapi.com'
        ];

        $response = Http::withHeaders($headers)->get($url);
        dd($response->json());

    
        // Initialize cURL session
        $ch = curl_init($url);
    
        // Set cURL options
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        // Execute the cURL request
        $response = curl_exec($ch);
    
        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
            // Parse the JSON response
            $data = json_decode($response, true);
    
            // Check if the response contains cocktails
            if (isset($data['drinks'])) {
                foreach ($data['drinks'] as $drink) {
                    $cocktailName = $drink['strDrink'];
                    // Add the cocktail name to the array
                    $cocktails[] = $cocktailName;
                }
            } else {
                echo 'No cocktails found.';
            }
        }
    
        // Close the cURL session
        curl_close($ch);
    
        return $cocktails;
    }
    
    // Example usage:
    // $cocktailList = get_cocktail_list();
    // print_r($cocktailList);
    
}

