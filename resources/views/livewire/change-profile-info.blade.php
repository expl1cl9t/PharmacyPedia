<div id="chngPanel" class="absolute top-[45%] left-[45%] w-1/3 h-1/3 hidden flex-col">
    <form class="flex flex-col p-5 rounded-2xl bg-white border-2 border-gray-500" wire:submit="changeInfo">
        <label for="">Выберите новое имя</label>
        <input type="text" wire:model="newName">
        <label for="">Выберите новую фамилию</label>
        <input type="text" wire:model="newSurname">
        <label for="">Выберитие новое отчество</label>
        <input type="text" wire:model="newFname">
        <label for="">Введите возраст</label>
        <input type="number" wire:model="newAge">
        <button type="submit">Применить изменения</button>
    </form>
    @script
    <script>
        $wire.on('dataChanged', ()=>{
            swal.fire({
                title: 'Изменение данных',
                text: 'Данные вашего профился изменены. Изменения отобразятся после обновления страницы',
                icon: 'success'
            });
        });
    </script>
    @endscript
</div>
