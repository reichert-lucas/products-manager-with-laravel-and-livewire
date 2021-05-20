<?php

namespace App\Http\Livewire;

use App\Models\Product as ProductModel;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Product extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $formModalOpened = false;
    public $confirmationOpened = false;
    public ProductModel $form;
    public ProductModel $productToRemove;
    /** @var TemporaryUploadedFile */
    public $image = null;

    protected $rules = [
        'form.name' => 'required',
        'form.description' => 'required',
        'form.price' => 'required|integer|min:0',
        /* 'image' => 'image|mimes:png,jpg|max:2048' */
    ];

    protected $validationAttributes = [
        'form.name' => 'product name',
        'form.description' => 'product description',
        'form.price' => 'product price'
    ];

    public function getProductsProperty()
    {
        return ProductModel::latest('id')->paginate(); 
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function newProduct()
    {
        $this->form = new ProductModel();
        $this->formModalOpened = true;
        $this->image = null;
        $this->clearValidation();
    }

    public function save()
    {
        $this->validate();
        $this->form->save();
        $this->formModalOpened = false;

        if ($this->image) {
            $this->form->updateImage($this->image);
        }
    }

    public function edit(ProductModel $product)
    {
        $this->form = $product;
        $this->formModalOpened = true;
        $this->image = null;
        $this->clearValidation();
    }

    public function confirmRemove(ProductModel $product)
    {
        $this->productToRemove = $product;
        $this->confirmationOpened = true;
    }

    public function remove()
    {
        $this->productToRemove->delete();
        $this->confirmationOpened = false;
    }
}
