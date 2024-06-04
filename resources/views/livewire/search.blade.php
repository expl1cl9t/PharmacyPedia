<div id="searchBar" class="absolute w-full h-full bg-black bg-opacity-60 overflow-y-scroll flex flex-col items-center">
    <button id="closeSearch" class="absolute top-5 right-5 text-5xl text-white">X</button>
    <div class="flex flex-col h-auto w-1/2 rounded-2xl bg-white gap-6 p-5 mt-10">
        <div class="flex flex-row w-full h-full p-5 relative">
            <input type="text" wire:model="search" class="bg-gray-400 w-full rounded-2xl pl-10 text-xl">
            <button wire:click="doSearch"><img class="w-8 h-8" src="{{asset('storage/other/search.png')}}" alt=""></button>
        </div>
        <div class="w-full h-full rounded-2xl border-2 border-gray-500 gap-6 mt-10 p-5">
            @forelse($medicines as $medicine)
                <div class="flex flex-row w-full h-auto p-5 gap-10 border-gray-500 border-2 mt-4 items-center justify-between">
                    <p>{{$medicine->Name}}</p>
                    <p>{{$medicine->Cost}} рублей</p>
                    <p>{{$medicine->type->TypeName}}</p>
                    <p>{{$medicine->isOnlyPrescription == 1 ? 'Только по рецепту' : 'Без рецепта'}}</p>
                    <img class="w-16 h-16" src="{{asset('storage/'.$medicine->ImageLink)}}" alt="">
                    <livewire:add-to-cart-button :key="$loop->index" medicne-id="{{$medicine->id}}"/>
                </div>
            @empty
                <p>Поиск не нашёл результатов</p>
            @endforelse
        </div>
    </div>
    @script
        <script>
            document.querySelector('#closeSearch').addEventListener('click', () => {
                document.querySelector('#searchBar').style.display = 'none';
                document.querySelector('html').style.overflowY = 'visible';
            })
        </script>
    @endscript
</div>
