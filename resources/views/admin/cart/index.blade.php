<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cart') }}
        </h2>
        
    </x-slot>

    
            <!-- Session Status -->
            @if(session('status'))
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @endif
        
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 px-4">
           
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">

                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">User Id</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">User Name</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Total</th>
                    <th scope="col" class="relative px-4 py-2">Order status</th>
                </tr>

                @if (is_array($flowerUid) || is_object($flowerUid))
                    @foreach ( $flowerUid as $key => $uid)
                <tr>
                <td class="px-4 py-2 whitespace-nowrap">{{$key}}</td>
                <td class="px-4 py-2 whitespace-nowrap">name</td>
                <td class="px-4 py-2 whitespace-nowrap">$0</td>
                <td class="px-4 py-2 whitespace-nowrap">status</td>
                    <tr>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Flower Id</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Image</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Price</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Quanity</th>
                    </tr>

                    @if (is_array($flowercart) || is_object($flowercart))
                            @foreach ( $flowercart as $keyy => $item)
                        <tr>                        
                            <td class="px-4 py-2 whitespace-nowrap">{{$item['id']}}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{$item['idFlower']}}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{$item['name']}}</td>
                            <td class="px-4 py-2 whitespace-nowrap"><img src="{{$item['img']}}" style="height: 50px;width: 50px;"></td>
                            <td class="px-4 py-2 whitespace-nowrap">{{$item['price']}}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{$item['quanity']}}</td>
                        </tr>
                            @endforeach
                        @endif
                </tr>
                    @endforeach
                @endif

                </thead>
                <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200">
                <tr></tr>
                <!-- More items... -->
                </tbody>
            </table>
            </div>
        </div>
        </div>

    </div>

</x-app-layout>