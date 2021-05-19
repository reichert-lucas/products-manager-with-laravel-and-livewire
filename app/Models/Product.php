<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public  function updateImage(UploadedFile $image) // salvando a imagem passada do Temporary Updated File do Livewire
    {
        tap($this->image, function ($previous) use ($image) {
            $this->forceFill([
                'image' => $image->storePublicly('products/' . $this->id, [
                    'disk' => 'public'
                ])
            ])->save();

            if ($previous) { // se existir uma imagem anterior ela deve ser deletada
                Storage::disk('public')->delete($previous);
            }
        });
    }
}
