<x-main-layout title="Главная страница">
    <style>
    </style>
    <div class="w-full h-screen flex flex-col gap-6" style="background-image: url('{{asset('storage/backs/indexFont.jpg')}}')">
        <div class="w-full h-1/6 bg-opacity-60 bg-amber-100 flex flex-row justify-between p-5">
            <div class="flex flex-row items-center gap-6">
                <div class="relative inline-block text-left">
                    <button class="pl-20 pr-20 text-xl border-gray-500 border-2 text-gray-500 rounded-3xl bg-white"
                            onclick="toggleDropdown('dropdownMenuBottom')">
                        Категория
                    </button>
                    <div class="hidden origin-bottom absolute left-0 mt-2
                        w-56 rounded-md shadow-lg bg-white ring-1
                        ring-black ring-opacity-5 animate-fadeIn"
                         id="dropdownMenuBottom">
                        @foreach(\App\Models\TypeOfMedicine::all() as $med)
                            <a href="#" class="block px-4 py-2 text-sm
                                   text-gray-700
                                   hover:bg-gray-100">
                                {{$med->TypeName}}
                            </a>
                        @endforeach
                    </div>
                </div>
                <button class="w-14 h-14"><img src="{{asset('storage/other/mobila.png')}}" alt=""></button>
            </div>
            <div class="flex flex-row items-center">
                <img class="h-64 w-64" src="{{asset('storage/other/logo.png')}}" alt="">
            </div>
            <div class="w-auto flex flex-row items-center gap-6">
                <input type="text" placeholder="я ищу, например, ингавирин" class="text-sm w-96 h-1/2 pl-20 pr-20 border-gray-500 border-2 text-gray-500 rounded-3xl bg-white">
                <button title="Бот-помошник" class="w-16 h-16"><img src="{{asset('storage/other/mail.png')}}" alt=""></button>
                <a href="{{route('profile')}}"><button class="w-16 h-16"><img src="{{asset('storage/other/user.png')}}" alt=""></button></a>
            </div>
        </div>
        <div class="flex flex-col items-center h-1/2 justify-center">
            <p class="text-8xl text-black">Нужное всегда найдется</p>
            <p class="font-serif text-8xl text-black  font-bold">Бот - консультант лично для вас</p>
        </div>
    </div>
    <div class="text-5xl w-full h-screen flex flex-col items-center gap-6 mt-10">
        <p>Наша энциклопедия лекарств</p>
        <div class="relative w-1/4 1/4 mx-auto">
            <div class="slide relative">
                <img class="w-full h-full object-cover"
                     src="{{asset('storage/other/booka.png')}}">
                <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Против аллергии</div>
            </div>

            <div class="slide relative">
                <img class="w-full h-full object-cover"
                     src="{{asset('storage/other/booka.png')}}">
                <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Против головной боли</div>
            </div>

            <div class="slide relative">
                <img class="w-full h-full object-cover"
                     src="{{asset('storage/other/booka.png')}}">
                <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Обезбаливающие
                </div>
            </div>

            <!-- The previous button -->
            <a class="absolute left-0 top-1/2 p-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white hover:text-amber-500 cursor-pointer"
               onclick="moveSlide(-1)">❮</a>

            <!-- The next button -->
            <a class="absolute right-0 top-1/2 p-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white hover:text-amber-500 cursor-pointer"
               onclick="moveSlide(1)">❯</a>

        </div>
        <br>

        <!-- The dots -->
        <div class="flex justify-center items-center space-x-5">
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(1)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(2)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(3)"></div>
        </div>
    </div>
    <div class="w-full h-screen flex flex-col items-center gap-6 justify-center">
        <img src="{{asset('storage/backs/indexfon1.jpg')}}" class="object-cover w-full h-full absolute -z-10" alt="">
        <p class="text-5xl">Покажем на карте ближайшие аптеки</p>
        <div class="map-holder">
            <div id="map" style="resize:both;width: 500px; height: 500px; border: 5px solid rgba(236, 199, 120, 0.616);"></div>
        </div>
    </div>


    <script>
        // set the default active slide to the first one
        let slideIndex = 1;
        showSlide(slideIndex);

        // change slide with the prev/next button
        function moveSlide(moveStep) {
            showSlide(slideIndex += moveStep);
        }

        // change slide with the dots
        function currentSlide(n) {
            showSlide(slideIndex = n);
        }

        function showSlide(n) {
            let i;
            const slides = document.getElementsByClassName("slide");
            const dots = document.getElementsByClassName('dot');

            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }

            // hide all slides
            for (i = 0; i < slides.length; i++) {
                slides[i].classList.add('hidden');
            }

            // remove active status from all dots
            for (i = 0; i < dots.length; i++) {
                dots[i].classList.remove('bg-yellow-500');
                dots[i].classList.add('bg-green-600');
            }

            // show the active slide
            slides[slideIndex - 1].classList.remove('hidden');

            // highlight the active dot
            dots[slideIndex - 1].classList.remove('bg-green-600');
            dots[slideIndex - 1].classList.add('bg-yellow-500');
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                initMap(position.coords.longitude, position.coords.latitude);
            })
        }


        async function initMap(lat, long) {

            await ymaps3.ready;

            const { YMap, YMapDefaultSchemeLayer } = ymaps3;

            // Иницилиазируем карту
            const map = new YMap(
                // Передаём ссылку на HTMLElement контейнера
                document.getElementById('map'),

                // Передаём параметры инициализации карты
                {
                    location: {
                        // Координаты центра карты
                        center: [lat, long],

                        // Уровень масштабирования
                        zoom: 15
                    }

                }
            );
            const { YMapDefaultMarker } = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');

            map.addChild(new YMapDefaultSchemeLayer(
                {
                    "customization": [
                        {
                            "tags": {
                                "any": ['major_landmark', 'outdoor', 'shopping', 'commercial_services', 'food_and_drink', 'cemetery']
                            },
                            "elements": ["geometry", "label"],
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "tags": {
                                "any": ['medical']
                            },
                            "elements": ["geometry", "label"],
                            "stylers": [
                                {
                                    "scale": 2
                                }
                            ]
                        }
                    ]
                }
            ));
            const markerElement = document.createElement('div');
            markerElement.className = 'marker-class';
            markerElement.innerText = "I'm marker!";

            const marker = new YMapMarker(
                {
                    source: 'markerSource',
                    coordinates: [lat, long],
                    draggable: true,
                    mapFollowsOnDrag: true
                },
                markerElement
            );

            map.addChild(marker);
        }

        function toggleDropdown(menuId) {
            const dropdownMenu = document
                .getElementById(menuId);
            dropdownMenu.classList.toggle('hidden');
        }
    </script>

</x-main-layout>
