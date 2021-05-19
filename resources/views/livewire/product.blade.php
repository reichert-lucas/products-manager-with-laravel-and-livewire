<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-4xl text-gray-500">Products</h1>
        <x-button.primary wire:click="newProduct">
            <div class="flex items-center space-x-2">
                <x-icon.plus class="w-5 h-5"></x-icon>
                <span>Create Product</span>
            </div>
        </x-button.primary>
    </div>

    <x-jet-dialog-modal title="Product Form" wire:model="formModalOpened">
        <div class="space-y-4">

            {{-- IMAGE --}}
            <div>
                <x-jet-label for="image" class="mb-1" value="{{ __('Image') }}"></x-jet-label>

                <div x-data>
                    @if ($image)
                        <div @click="$refs.input.click()" class="w-16 h-16 cursor-pointer overflow-hidden rounded-lg">
                            <img src="{{$image->temporaryUrl()}}" class="object-cover w-full h-full" alt="" srcset="">
                        </div>
                    @elseif (isset($form->image))
                        <div @click="$refs.input.click()" class="w-16 h-16 cursor-pointer overflow-hidden rounded-lg">
                            <img src="{{ 'storage/'.$form->image }}" class="object-cover w-full h-full" alt="">
                        </div>
                    @else
                        <div @click="$refs.input.click()" class="w-16 h-16 cursor-pointer border-2 text-cool-gray-300 hover:text-cool-gray-500 hover:border-cool-gray-400 rounded-lg flex items-center justify-center transition-all duration-150">
                            <x-icon.camera class="w-8 h-8"></x-icon.camera>
                        </div>
                    @endif

                    <input type="file" wire:model="image" class="hidden" x-ref="input">
                </div>

                <x-jet-input-error for="image"></x-jet-input-error>
            </div>

            {{-- NAME --}}
            <div>
                <x-jet-label for="form.name" value="{{ __('Name') }}" />
                <x-jet-input id="form.name" type="text" class="mt-1 block w-full" placeholder="Product Name" wire:model.defer="form.name" autocomplete="form.name" />
                <x-jet-input-error for="form.name"/>
            </div>
            
            {{-- DESCRIPTION --}}
            <div>
                <x-jet-label for="form.description" value="{{ __('Description') }}" />
                <textarea id="form.description" class="px-3 py-1.5 rounded-lg border w-full shadow-sm outline-none focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-primary-400" rows="3"  placeholder="Product Description" wire:model.defer="form.description" autocomplete="form.description"></textarea>
                <x-jet-input-error for="form.description"/>
            </div>
            
            {{-- PRICE --}}
            <div>
                <x-jet-label for="form.price" value="{{ __('Price') }}" />
                <x-jet-input id="form.price" type="number" step="1" min="0" class="px-3 py-1.5 rounded-lg border w-full shadow-sm outline-none focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-primary-400" rows="3"  placeholder="Product Price" wire:model.defer="form.price" autocomplete="form.price"/>
                <x-jet-input-error for="form.price"/>
            </div>

        </div>

        <x-slot name="footer">
            <x-button.white @click="$dispatch('close')">Cancel</x-button.white>
            <x-button.primary wire:click="save">Save</x-button.primary>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal title="Please Confirm" wire:model="confirmationOpened">
        @if ($productToRemove)
            <p>Are you sure you owant remove <b>{{$productToRemove->name}}</b></p>
        @endif

        <x-slot name="footer">
            <x-button.white @click="$dispatch('close')">Cancel</x-button.white>
            <x-button.red wire:click="remove">Yes, i'm sure</x-button.red>
        </x-slot>
    </x-jet-confirmation-modal>


    <div class="rounded-xl overflw-hidden bg-white shadow">
        <table>
            <thead>
                <th class="text-left text-xs uppercase text-cool-gray-400 p-4"></th>
                <th class="text-left text-xs uppercase text-cool-gray-400 p-4">Product</th>
                <th class="text-xs uppercase whitespace-pre text-cool-gray-400 p-4">Price</th>
                <th class="text-xs uppercase whitespace-pre text-cool-gray-400 p-4">Created At</th>
                <th class="text-xs uppercase whitespace-pre text-cool-gray-400 p-4">Updated At</th>
                <th class="text-xs uppercase whitespace-pre text-cool-gray-400 p-4">Actions</th>
            </thead>
            <tbody>
                @foreach ($this->products as $product)
                    <tr class="odd:bg-cool-gray-50"> {{-- coloca um fundo cinza só quando for par --}}
                        <td class="pl-4">
                            <div class="w-16 h-16 flex-shrink-0 rounded-lg overflow-hidden">
                                @if ($product->image)
                                    <img class="object-cover w-full h-full" src="{{ 'storage/' . $product->image }}" alt="">
                                @else
                                    <x-icon.photograph class="object-cover w-full h-full"></x-icon.photograph>
                                @endif
                            </div>
                        </td>
                        <td class="text-cool-gray-900 px-4 py-2">
                            <div class="font-semibold capitalize">{{$product->name}}</div>
                            <div class="text-xs text-cool-gray-500">
                                {{$product->description}}
                            </div>
                        </td>
                
                        <td class="text-cool-gray-500 text-center px-4 py-2">
                            <span class="whitespace-pre">{{$product->price/100}}</span>
                        </td>
        
                        <td class="text-cool-gray-500 text-center px-4 py-2">
                            <span class="whitespace-pre">{{$product->created_at->toFormattedDateString()}}</span>
                        </td>
        
                        <td class="text-cool-gray-500 text-center px-4 py-2">
                            <span class="whitespace-pre">{{$product->updated_at->toFormattedDateString()}}</span>
                        </td>

                        <td class="text-cool-gray-500 text-center px-4 py-2">
                            <div class="flex items-center space-x-1">
                                <x-button wire:click="edit({{$product->id}})" class="w-7 h-7 p-1 text-primary-500 rounded-full bg-white border border-transparent hover:border-cool-gray-200 hover:bg-cool-gray-100">
                                    <x-icon.pencil-alt class="w-full h-full"></x-icon.pencil-alt>
                                </x-button>
                                <x-button wire:click="confirmRemove({{$product->id}})" class="w-7 h-7 p-1 text-red-400 rounded-full bg-white border border-transparent hover:border-red-400 hover:bg-red-400 hover:text-white">
                                    <x-icon.trash class="w-full h-full"></x-icon.trash>
                                </x-button>
                            </div>
                        </td>
        
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($this->products->hasPages())
            <div class="px-4 py-2">
                {{ $this->products->onEachSide(1)->links() }}
            </div>
        @endif
    </div>
</div>



