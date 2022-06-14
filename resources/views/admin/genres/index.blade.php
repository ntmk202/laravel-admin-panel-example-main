<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Genres') }}
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
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Type</th>
                </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200">
                <tr></tr>
                @php $i=0; @endphp
                @if (is_array($genres) || is_object($genres))
                @foreach ( $genres as $key => $item)
                <tr>
                    <td class="px-4 py-2 whitespace-nowrap">{{$i++}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['type']}}</td>
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