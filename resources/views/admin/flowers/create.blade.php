<?php
$rand = rand(1000,100000);
$id = "WFL" . ($rand);
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add flowers') }}
        </h2>
        
    </x-slot>

    <div class="container justify-center px-16 mt-10 ">
    <div class="ml-4 px-2">
        <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-t-lg">

        <form method="post" action="{{ url('add-flowers') }}">
            <!-- {!! csrf_field() !!} -->
            @csrf

            <div class=" mb-3">
                <x-label for="flower_id" :value="__('Flower Id')" />
                <x-input id="flower_id" class="block mt-1 w-2/5 text-red-500 bg-gray-300" type="text" name="flower_id" value=" <?php echo $id; ?> " readonly  />
            </div>

            <div class=" mb-3">
                <x-label for="name_flower" :value="__('Name Flower')" />
                <x-input id="name_flower" class="block mt-1 w-2/5 text-black" type="text" name="name_flower" :value="old('Name flower')"  />
            </div>

            <div class=" mb-3">
                <x-label for="info" :value="__('Infomation')" />
                <x-input id="info" class="block mt-1 w-2/5 text-black" type="text" name="info" :value="old('infomation')"  />
            </div>

            <div class=" mb-3">
                <x-label for="image" :value="__('Image Url')" />
                <x-input id="image" class="block mt-1 w-2/5 text-black" type="text" name="image" :value="old('image')"  />
            </div>

            <div class=" mb-3">
                <x-label for="price" :value="__('Price')" />
                <x-input id="price" class="block mt-1 w-2/5 text-black" type="text" name="price" :value="old('price ')"  />
            </div>

            <div class=" mb-3">
                <x-label for="humidity" :value="__('Humidity')" />
                <x-input id="humidity" class="block mt-1 w-2/5 text-black" type="text" name="humidity" :value="old('humidity')"  />
            </div>

            <div class=" mb-3">
                <x-label for="temperature" :value="__('Temperature')" />
                <x-input id="temperature" class="block mt-1 w-2/5 text-black" type="text" name="temperature" :value="old('temperature')"  />
            </div>

            <div class=" mb-3">
                <x-label for="light" :value="__('Light')" />
                <x-input id="light" class="block mt-1 w-2/5 text-black" type="text" name="light" :value="old('light')"  />
            </div>

            <div class=" mb-3">
                <x-label for="weight" :value="__('Weight')" />
                <x-input id="weight" class="block mt-1 w-2/5 text-black" type="text" name="weight" :value="old('weight')"  />
            </div>

            <div class="flex items-center mt-4">
                <x-button class="ml-5 bg-green-300" type="submit">
                    submit
                </x-button>
            </div>
        </form>
        </div>
    </div>
    </div>

    
</x-app-layout>