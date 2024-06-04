<x-main-layout title="{{$user->name}} {{$user->surname}} | Профиль">
    <livewire:change-profile-info/>
    <div class="flex flex-col w-full h-screen overflow-y-hidden" style="background-image: url('{{asset('storage/backs/auth_bg.png')}}')">
        <div class="flex flex-row bg-[#dfc6b4] w-full h-1/6 rounded-2xl items-center justify-between p-10">
            <button id="backButton"><img class="rounded-3xl w-16 h-16" src="{{asset('storage/other/backButton.png')}}" alt=""></button>
            <p class="text-2xl font-bold">Мой профиль</p>
        </div>
        <div class="flex flex-row w-full h-full">
            <div class="flex flex-col h-full w-1/4 bg-[#dfc6b4] items-center gap-6">
                <img class="w-full h-1/3" src="{{asset('storage/other/user.png')}}" alt="">
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->name}}</p>
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->surname}}</p>
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->fname}}</p>
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->age}} лет</p>
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->email}}</p>
                <div id="buttons" class="flex flex-col items items-center gap-6">
                    <button class="text-2xl p-5 border-2 border-gray-500 bg-[#AF877A]" onclick="window.location.href = '{{route('logout')}}'">выйти с аккаунта</button>
                    <button id="cng"
                            class="text-2xl p-5 border-2 border-gray-500 bg-[#AF877A]"
                    >изменить данные профиля</button>
                </div>
            </div>
            <div class="flex flex-col items-center w-full gap-6 bg-white bg-opacity-50">
                <p class="text-5xl font-bold text-gray-900">История заказов</p>
                <div class="bg-white grid grid-cols-2 w-full h-full overflow-y-scroll gap-6 rounded-2xl text-2xl p-10 mb-10">
                @forelse($userBills as $userBill)
                        <div class="flex flex-col w-auto h-full gap-6 p-5 items-center justify-between border-gray-500 border-2 rounded-2xl">
                            <img class="w-auto h-46" src="{{asset('storage/'.$userBill->medicine->ImageLink)}}">
                            <div class="flex flex-row w-full h-auto gap-6 text-center justify-center">
                                <p>{{$userBill->medicine->Name}}</p>
                                <p class="text-green-500">Цена: {{$userBill->Cost}} ₽</p>
                            </div>
                            <p>Тип доставки: {{$userBill->DeliveryType}}</p>
                            <p>Тип препарата: {{$userBill->medicine->type->TypeName}}</p>
                            <p>Дата покупки: {{\Carbon\Carbon::parse($userBill->DateOfBuy)->locale('ru')->format('M d Y')}}</p>
                        </div>
                @empty
                    <p class="text-5xl font-bold text-gray-900">Вы пока не совершали заказов</p>
                @endforelse

            </div>
                <p class="mt-20"></p>
            </div>
        </div>

    </div>

    <script>
        document.querySelector('#backButton').addEventListener('click', ()=>{
            window.history.go(-1);
            return false;
        })
        document.querySelector('#cng').addEventListener('click', ()=>{
            document.querySelector('#chngPanel').style.display = 'block';
        })
    </script>

</x-main-layout>
