<div class="flex flex-col bg-[#dfc6b4] w-full h-full items-center gap-6">
    <p class="text-gray-800 text-5xl font-serif font-light">Панель фармацевта</p>
    <div class="flex flex-row w-full h-full">
        <div class="flex flex-col w-full h-full items-center gap-6">
            <p>Работа с лекарствами</p>
            <form class="p-10 border-2 border-gray-500 rounded-2xl flex flex-col gap-6" wire:submit="saveMedicine">
                <p>Добавление нового лекарства</p>
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
                <button type="submit">Сохранить лекарство</button>
            </form>

            <div class="flex flex-col w-full h-full items-center" wire:poll>
                <p>Добавленные лекарства</p>
                @foreach(\App\Models\Medicine::all() as $med)
                    <div class="flex flex-row gap-6 items-center">
                        <tr>
                            <th><p>{{$med->Name}}</p></th>
                                <p>{{$med->Cost}}</p>
                                <p>{{$med->isOnlyPrescription}}</p>
                                <p>Тип: {{$med->type->TypeName}}</p>
                                <img class="w-1/4 h-1/4" src="{{asset('storage/'.$med->ImageLink)}}">
                        </tr>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="flex flex-col w-full h-full items-center gap-6">
            <p>Работа с группами лекарств</p>
            <form class="p-10 border-2 border-gray-500 rounded-2xl flex flex-col gap-6" wire:submit="saveType">
                <p>Добавление новой группа лекарств</p>
                <label>Название группы лекарств</label>
                <input type="text" name="" wire:model="TypeName" id="">
                <button type="submit">Добавить тип лекарства</button>
            </form>
        </div>
        <div class="flex flex-col w-full h-full items-center gap-6">
            <p>Работа с заказами</p>
            <form class="p-10 border-2 border-gray-500 rounded-2xl flex flex-col gap-6">
                <p>Добавление покупки</p>
            </form>
        </div>
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
