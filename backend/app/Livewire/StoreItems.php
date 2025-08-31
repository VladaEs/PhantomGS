<?php

namespace App\Livewire;

use App\Models\ShopItem;
use Livewire\Component;

class StoreItems extends Component
{
    protected $listeners = [
        'setPriceOrder',
        'setDateOrder',
        'setPerPage',
    ];

    public $items = [];
    public $page = 1;
    public $perPage = 10;
    public $price = "ASC";
    public $date = "ASC";
    public $services = [0];

    public function render()
    {
        return view('livewire.store-items');
    }

    public function loadMore()
    {
        $query = ShopItem::query();

        if (count($this->services) > 0 && $this->services[0] != 0) {
            $query->whereIn('service_id', $this->services);
        }

        $query->orderBy('price', $this->price)
              ->orderBy('created_at', $this->date);

        $ItemsToSkip = ($this->page - 1) * $this->perPage;
        $newItems = $query->skip($ItemsToSkip)
                          ->take($this->perPage)
                          ->get();

        $this->items = count($this->items) > 0
            ? array_merge($this->items, $newItems->toArray())
            : $newItems->toArray();

        $this->page++;
    }

    public function setPriceOrder()
    {
        $this->price = $this->price === "ASC" ? "DESC" : "ASC";
        $this->resetItems();
    }

    public function setDateOrder()
    {
        $this->date = $this->date === "ASC" ? "DESC" : "ASC";
        $this->resetItems();
    }

    public function setPerPage($amount)
    {
        $this->perPage = $amount;
        $this->resetItems();
    }

    public function resetItems()
    {
        $this->items = [];
        $this->page = 1;
        $this->loadMore();
    }
}