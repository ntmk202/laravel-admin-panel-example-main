<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
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
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">User id</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Password</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Phone</th>
                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Address</th>
                    <th scope="col" class="relative px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200">
                <tr></tr>
                @php $i=0; @endphp
                @if (is_array($users) || is_object($users))
                @foreach ( $users as $key => $item)
                <tr>
                    <td class="px-4 py-2 whitespace-nowrap">{{$i++}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$key}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['name']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['pass']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['email']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['phone']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{$item['address']}}</td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        <form action="{{url('delete-users/'.$key)}}" method="post">
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