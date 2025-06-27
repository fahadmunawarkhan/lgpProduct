<?php

namespace App\Livewire\Admin\Products;

use App\Models\ProductCategory as ModelsProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategory extends Component
{
    use WithPagination;

    public $showModal = false;
    public $name = '';
    public $editId = '';

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function openModal()
    {
        $this->reset('name'); // Clear the input
        $this->showModal = true;
    }

    public function editModal($id)
    {
        $category = ModelsProductCategory::findOrFail($id);
        $this->editId = $category->id;
        $this->name = $category->name;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();


        if ($this->editId) {
            ModelsProductCategory::where('id', $this->editId)->update([
                'name' => $this->name,
            ]);
            session()->flash('success', 'Product Category created successfully!');
        } else {
            ModelsProductCategory::create([
                'name' => $this->name
            ]);
            session()->flash('success', 'Product Category update successfully!');
        }

        $this->reset(['name', 'showModal']);
        $this->resetPage(); // go to first page
    }

    public function delete($id)
    {
        $category = ModelsProductCategory::find($id);
        if ($category) {
            $category->delete();
            session()->flash('success', 'Product Category deleted.');
        } else {
            session()->flash('error', 'Category not found.');
        }
    }

    public function render()
    {
        $productList = ModelsProductCategory::paginate(10);
        return view('livewire.admin.products.product-category', compact('productList'));
    }
}
