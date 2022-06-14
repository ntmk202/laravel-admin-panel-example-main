<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Flowers') }}
        </h2>
        
    </x-slot>

        <div class="py-4 m-6">
            <div class=" flex items-center  mt-3 m-4">
                <a href="{{ url('add-flowers')}}" class="m-2 p-2 bg-green-400 rounded">
                    Create Product
                </a>
        </div>

            <!-- Session Status -->
        @if(session('status'))
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @endif
        
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
           
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Flower id</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Info</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Price</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Humidity</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Temparature</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Light</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Weight</th>
                    <th scope="col" class="relative px-4 py-2">Action</th>
                    <!-- <th scope="col" class="relative px-4 py-2">Delete</th> -->
                </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200">
                <tr></tr>
                @php $i=0; @endphp
                @if (is_array($flowers) || is_object($flowers))
                @foreach ( $flowers as $key => $item)
                <tr>
                    <td class="px-4 py-2 whitespace-nowrap">{{$i++}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['id']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['name']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['info']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap"><img src="{{$item['img']}}" style="height: 50px;width: 50px;"></td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['price']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['humidity']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['temperature']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['light']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['weight']}}</td>
                    <!-- <td class="px-4 py-2 whitespace-nowrap"></td> -->
                    <!-- <td class="px-4 py-2 whitespace-nowrap"><a href="{{url('delete-flowers/'.$key)}}" class="m-2 p-2 bg-red-400 rounded">Delete</a></td> -->
                    <td class="px-4 py-2 whitespace-nowrap">
                        <a href="{{url('edit-flowers/'.$key)}}" class="m-2 p-2 bg-yellow-400 rounded">Edit</a>
                        <form action="{{url('delete-flowers/'.$key)}}" method="post">
                            @csrf 
                            @method('delete')
                            <button type="text" class="m-2 p-2 bg-red-400 rounded">Delete</button>
                        </form>
                    </td>
                </tr> 
                    @endforeach
                @endif
                <!-- More items... -->
                </tbody>
            </table>
            </div>
        </div>
        </div>

    </div>

</x-app-layout>