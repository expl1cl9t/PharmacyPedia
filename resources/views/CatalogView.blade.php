<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$type->TypeName}} | Каталог</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body class="overflow-scroll">
<div class="flex flex-col w-full h-screen bg-gray-300">
    <div class="flex flex-row bg-[#dfc6b4] w-full h-1/6 rounded-2xl items-center justify-between p-10">
        <button id="backButton"><img class="rounded-3xl w-16 h-16" src="{{asset('storage/other/backButton.png')}}" alt=""></button>
        <p class="text-2xl font-bold w-full text-center">{{$type->TypeName}}</p>
    </div>
    <div class="flex flex-col w-full h-full">
        <p class="text-7xl text-rad-500 ">Популярные средства</p>
        <div class="grid grid-cols-2 justify-center w-full h-full gap-6 rounded-2xl text-2xl p-10 mb-10">
            @foreach($meds as $med)
                <div class="flex flex-col h-auto justify-between items-center border-gray-700 border-s-8 p-5 rounded-2xl gap-6 text-5xl bg-gray-400">
                    <img class="w-1/4" src="{{asset('storage/'.$med->ImageLink)}}">
                    <div class="flex flex-row w-full h-auto gap-6 text-center justify-center">
                        <p>Название: {{$med->Name}}</p>
                        <p class="text-green-900">Цена: {{$med->Cost}} ₽</p>
                    </div>
                    <p>Тип лекарства: {{$med->type->TypeName}}</p>
                    <p>{{$med->isOnlyPrescription ? 'Только по рецепту' : 'Свободный доступ'}}</p>
                    <livewire:add-to-cart-button medicne-id="{{$med->id}}"/>
                </div>
                @if($loop->iteration == 5)
                    <p></p>
                    <p class="text-7xl text-red-700">Непопулярные аналоги</p>
                    <p></p>
                @endif
            @endforeach
        </div>
    </div>
</div>


    <script>
        document.querySelector('#backButton').addEventListener('click', ()=>{
            window.location.href = '{{route('inde')}}';
        })
    </script>

</body>
</html>
