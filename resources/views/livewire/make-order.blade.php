<div class="flex flex-col w-full h-auto bg-[#dfc6b4] items-center gap-6 p-5">
    <p class="mt-10 font-sans text-4xl font-semibold">Оформление заказа</p>
    <p class="mt-10 font-sans text-xl font-semibold">Выберите лекарства для покупки</p>
    <div class=" w-1/2 h-auto flex flex-col rounded-2xl p-5 justify-center items-center gap-6">
        @forelse(auth()->user()->medicineInBucet as $med)
            <div class="flex flex-row w-full h-auto p-5 justify-between bg-gray-400 items-center text-xl text-white">
                <input type="checkbox" wire:model.live="selectedMedicines" value="{{$med->id}}" name="" id="">
                <p>{{$med->Name}}</p>
                <p>{{$med->Cost}}</p>
                <p>{{$med->type->TypeName}}</p>
                <p>{{$med->isOnlyPrescription == 1 ? 'Только по рецепту' : 'Без рецепта'}}</p>
                <img class="w-16 h-16" src="{{asset('storage/'.$med->ImageLink)}}" alt="">
            </div>
        @empty
            <p>Вы пока не добавили товаров в корзину!</p>
        @endforelse

        <p class="text-5xl text-white">Итоговая стоимость: {{$totalSum * $counts}} ₽</p>

    </div>
    <form  class="flex flex-col items-center justify-center bg-white gap-6 p-10 rounded-2xl w-1/4 h-auto" wire:submit="createOrders">
        <label for="">Выберите тип доставки</label>
        <select name="" id="" wire:model="delType">
            <option value="delivery">Курьер</option>
            <option value="self">Самовывоз</option>
        </select>
        <label for="">Выберите количество товара</label>
        <input value="1" type="number" name="" wire:model.live="counts" id="">
        <label for="">Выберите адрес доставки</label>
        <p class="text-sm text-lights">*Если вы выбрали доставку самовывозом, товар придёт в ближайшую к вам аптеку. Адрес аптеки будет сообщен позже</p>
        <input type="text" name="" placeholder="Адрес доствки" id="">
        <button type="submit">Оформить заказ</button>
    </form>
    @script
    <script>
        $wire.on('orderCreated', () => {
            swal.fire({
                title: 'Заказ создан успшно',
                text: 'Вы сможете {{$counts}} товар(ов) их в личном кабинете',
                icon: 'success'
            }).then(res => {
                if(res.isConfirmed){
                    window.location.href = '{{route('profile')}}';
                }
            });
        })
        $wire.on('orderNotCreated', ({error}) => {
            swal.fire({
                title: 'Заказ создан неуспшно',
                text: 'Вы не сможете увидеть их в личном кабинете. ' + error,
                icon: 'error'
            });
        })
    </script>
    @endscript
</div>
