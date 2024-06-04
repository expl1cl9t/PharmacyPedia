<div>
    <button wire:click="changeStatus" class="text-2xl p-5 border-2 border-gray-500 bg-[#AF877A]">Изменить статус {{$Medicine->Name}}</button>
    @script
    <script>
        $wire.on('statusChangedSuccess', ()=>{
            swal.fire({
                title: 'Статус лекарства изменён',
                text: 'успшено',
                icon: 'success'
            });
        })
        $wire.on('statusChangedError', ({error})=>{
            swal.fire({
                title: 'Ошибка при смене статуса',
                text: 'Лошибка ' + error,
                icon: 'error'
            });
        })
    </script>
    @endscript
</div>
