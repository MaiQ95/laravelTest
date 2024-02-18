<?php

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $products;

    public function mount(): void
    {
        $this->products = Product::with('user')
            ->latest()
            ->get();
    }
}; ?>

<div>
    //
</div>
