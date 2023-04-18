<?php
namespace App\Http\Livewire;

use App\Models\Post;

use Livewire\Component;
use Livewire\WithPagination;

class ProductsSearch extends Component
{
    use WithPagination;


    public string $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $query = Post::query();
        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }

        return view('livewire.product-search', [
            'posts' => $query->paginate(5)
        ]);
    }

    
}