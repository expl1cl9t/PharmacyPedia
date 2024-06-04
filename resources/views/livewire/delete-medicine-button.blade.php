<div>
    <button wire:click="deleteMedicine" class="text-2xl p-5 border-2 border-gray-500 bg-[#AF877A]">Удалить {{$Medicine->Name}}</button>
    @script
    <script>
        $wire.on('successDeleted', ()=>{
            swal.fire({
                title: 'Лекарство удалено',
                text: 'Лекарство успешно удалено',
                icon: 'success'
            });
        })
        $wire.on('errorDeleted', ()=>{
            swal.fire({
                title: 'Лекарство не удалено',
                text: 'Лекарство успешно не удалено',
                icon: 'error'
            });
        })
    </script>
    @endscript
</div>
