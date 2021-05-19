<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-4xl text-gray-500">Products</h1>
        <x-button.primary>
            <div class="flex items-center space-x-2">
                <x-icon.plus class="w-5 h-5"></x-icon>
                <span>Create Product</span>
            </div>
        </x-button.primary>
    </div>
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
                <tr class="odd:bg-cool-gray-50"> {{-- coloca um fundo cinza só quando for par --}}
                    <td class="pl-4">
                        <div class="w-16 h-16 flex-shrink-0 rounded-lg overflow-hidden">
                            <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80" alt="">
                        </div>
                    </td>
                    <td class="text-cool-gray-900 px-4 py-2">
                        <div class="font-semibold capitalize">Product name</div>
                        <div class="text-xs text-cool-gray-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Recusandae consequuntur impedit provident aliquid sequi 
                            quaerat alias corporis autem sit dolorem assumenda tempore 
                            animi dolor fuga minima, iste quod amet deserunt!
                        </div>
                    </td>
            
                    <td class="text-cool-gray-500 text-center px-4 py-2">
                        <span class="whitespace-pre">$ 20,30</span>
                    </td>
    
                    <td class="text-cool-gray-500 text-center px-4 py-2">
                        <span class="whitespace-pre">created at</span>
                    </td>
    
                    <td class="text-cool-gray-500 text-center px-4 py-2">
                        <span class="whitespace-pre">updated at</span>
                    </td>

                    <td class="text-cool-gray-500 text-center px-4 py-2">
                        <span class="whitespace-pre">icons</span>
                    </td>
    
                </tr>
            </tbody>
        </table>
    </div>
</div>



