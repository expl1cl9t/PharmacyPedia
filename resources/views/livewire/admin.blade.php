<div class="flex flex-col bg-[#dfc6b4] w-full h-full items-center gap-6">
    <p class="text-gray-800 text-5xl font-serif font-light">Панель фармацевта</p>
    <div class="flex flex-row w-full h-full">
        <div class="flex flex-col w-full h-full items-center gap-6">
            <p class="text-2xl">Работа с лекарствами</p>
            <form class="p-10 border-2 border-gray-500 rounded-2xl text-2xl flex flex-col gap-6" wire:submit="saveMedicine">
                <p class="text-2xl">Добавление нового лекарства</p>
                <label for="">Название</label>
                <input type="text" wire:model="MedicineName" placeholder="Название лекарства">
                <label for="">Цена лекарства</label>
                <input type="number" name="" wire:model="MedicineCost" placeholder="цена" id="">
                <select wire:model="TypeOfMedicine" wire:poll>
                    @foreach(\App\Models\TypeOfMedicine::all() as $type)
                        <option value="{{$type->id}}">{{$type->TypeName}}</option>
                    @endforeach
                </select>
                <div>
                    <input type="checkbox" name="" wire:model="medicineIsOnlyPerception" id="">
                    <label for="">Только по рецепту?</label>
                </div>
                <label>Выберите изображение лекарства</label>
                <input accept="image/png, image/jpeg" type="file" name="" wire:model="medicineImage" id="">
                @if ($medicineImage)
                    <img class="w-64 h-64" src="{{ $medicineImage->temporaryUrl() }}">
                @endif
                <button class="text-2xl p-5 border-2 border-gray-500 bg-[#AF877A]" type="submit">Сохранить лекарство</button>
            </form>

        </div>
        <div class="flex flex-col w-full h-full items-center gap-6">
            <p class="text-2xl">Работа с группами лекарств</p>
            <form class="p-10 border-2 border-gray-500 rounded-2xl flex flex-col gap-6 text-2xl" wire:submit="saveType">
                <p>Добавление новой группа лекарств</p>
                <label>Название группы лекарств</label>
                <input type="text" name="" wire:model="TypeName" id="">
                <button class="text-2xl p-5 border-2 border-gray-500 bg-[#AF877A]" type="submit">Добавить тип лекарства</button>
            </form>
        </div>
    </div>

    <div class="flex flex-col w-full h-full items-center" wire:poll>
        <p class="text-3xl">Добавленные лекарства</p>
        @foreach(\App\Models\Medicine::all() as $med)
            <div class="p-10 flex flex-row gap-6 items-center justify-between w-full border-2 border-gray-500 text-2xl">
                <tr class="p-5 ">
                    <th><p>{{$med->Name}}</p></th>
                    <p>{{$med->Cost}}</p>
                    <p>{{$med->isOnlyPrescription}}</p>
                    <p>Тип: {{$med->type->TypeName}}</p>
                    <p>{{$med->isOnlyPrescription ? 'Только по рецепту' : 'Свободный доступ'}}</p>
                    <img class="w-1/6 h-1/6" src="{{asset('storage/'.$med->ImageLink)}}">
                    <p>На складе: {{$med->countOnStorage}}</p>
                    <p> Продано: {{count($med->inBills)}}</p>
                    <p>Статус: @if($med->avaliableToBuy == 1)<span class='text-green-400'>доступно к продаже</span>@else<span class='text-red-400'>заблокировано</span>@endif</p>
                    <livewire:delete-medicine-button :key="$loop->index" :medid="$med->id"/>
                    <livewire:block-unblock-medicine :key="$med->id" :medid="$med->id"/>
                </tr>
            </div>
        @endforeach
    </div>

    @script
        <script>
            $wire.on('medicineAdded', ()=>{
                swal.fire({
                    title: 'Лекарство добавлено',
                    text: 'успешно',
                    icon: 'success'
                });
            })
            $wire.on('medicineNotAdded', ({error})=>{
                swal.fire({
                    title: 'Лекарство не добавлено',
                    text: 'нет' + error,
                    icon: 'error'
                });
            })
            $wire.on('TypeCreated', ()=>{
                swal.fire({
                    title: 'Тип лекарства успешно добавлен',
                    text: 'успешно',
                    icon: 'success'
                });
            })
            $wire.on('TypeNotCreated', ({error})=>{
                swal.fire({
                    title: 'Тип лекарства не добавлен',
                    text: 'нет' + error,
                    icon: 'error'
                });
            })
        </script>
    @endscript

</div>
