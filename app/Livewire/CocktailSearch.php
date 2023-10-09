<?php

namespace App\Livewire;

use App\Models\Drink;
use Livewire\Component;

class CocktailSearch extends Component
{
    public $query = '';
    public $cocktails = [];

    public function render()
    {
        return view('livewire.cocktail-search');
    }

    public function search()
    {
        $drinks = Drink::search($this->query);
        $drinks = $drinks['drinks'] ?? [];
        $this->cocktails = [];
        foreach($drinks as $drink){
            $cocktail = new Drink;
            $cocktail->name = $drink['strDrink'];
            $this->cocktails[] = $cocktail;
        }
    }
}
