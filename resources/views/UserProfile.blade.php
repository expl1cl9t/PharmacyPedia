<x-main-layout title="{{$user->name}} {{$user->surname}} | Профиль">
    <div class="flex flex-col w-full h-screen overflow-y-hidden" style="background-image: url('{{asset('storage/backs/auth_bg.png')}}')">
        <div class="flex flex-row bg-[#dfc6b4] w-full h-1/6 rounded-2xl items-center justify-between p-10">
            <button id="backButton"><img class="rounded-3xl w-16 h-16" src="{{asset('storage/other/backButton.png')}}" alt=""></button>
            <p class="text-2xl font-bold">Мой профиль</p>
        </div>
        <div class="flex flex-row w-full h-full">
            <div class="flex flex-col h-full w-1/4 bg-[#dfc6b4] items-center gap-6">
                <img class="w-1/2 h-1/3" src="{{asset('storage/other/user.png')}}" alt="">
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->name}}</p>
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->surname}}</p>
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->fname}}</p>
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->age}} лет</p>
                <p class="border-b-2 border-dotted border-gray-500 text-2xl">{{$user->email}}</p>
            </div>
            <div class="flex flex-col items-center w-full gap-6 bg-white bg-opacity-50">
                <p class="text-5xl font-bold text-gray-900">История заказов</p>
                @forelse($userBills as $userBill)
                    {{ $userBill }}
                @empty
                    <p class="text-5xl font-bold text-gray-900">Вы пока не совершали заказов</p>
                @endforelse
            </div>
        </div>

    </div>

    <script>
        document.querySelector('#backButton').addEventListener('click', ()=>{
            window.history.go(-1);
            return false;
        })
    </script>

</x-main-layout>
