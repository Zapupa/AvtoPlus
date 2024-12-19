<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Заявки') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-nav-link :href="route('request.create')" type="submit"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center mb-11 ">Создать</x-nav-link>
                @foreach($repairRequests as $request)
                    <div class="p-8 flex flex-col gap-8">
                        <div class='flex justify-between gap-x-2'>
                            <p class="w-full font-bold text-base">{{ $request->problem }}</p>
                            <p class="w-full font-normal text-base">{{\Carbon\Carbon::parse($request->date)->translatedFormat('j F Y')}}</p>
                            <p class="w-full font-bold text-base">{{ $request->car_id }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>