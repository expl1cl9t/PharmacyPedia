<div id="sendMessage" class="absolute w-full h-screen overflow-hidden bg-black bg-opacity-30 hidden flex-col items-center">
    <div class="flex flex-col w-1/3 h-1/2 bg-white rounded-2xl border-4 border-gray-500 mt-10 justify-center items-center text-2xl">
        <p>Остались вопросы? Отправьте ваш вопрос к нам.</p>
        <input wire:model="NameToRefer" type="text" placeholder="Укажите, как к вам обращаться">
        <label for="">Опишите ваш вопрос:</label>
        <textarea wire:model="Article" cols="50" rows="20" class="text-sm" placeholder="Опишите свой вопрос">

        </textarea>
        <button wire:click="sendMessage">Отправить</button>
    </div>
    @script
        <script>
            $wire.on('WasSent', ({code})=>{
               swal.fire({
                    title: 'Сообщение отправлено!',
                   text: 'Ответ будет дан вам позже в telegramm. Номер вашего обращения: ' + code,
                   icon: 'success'
               });
            }).then(result => {
                if(result.isConfirmed){
                    $('#sendMessage').css('display','none');
                }
            });
            $wire.on('errorWhereSend', ({error})=>{
                swal.fire({
                    title: 'Ошибка при отправке сообщения!',
                    text: error,
                    icon: 'error'
                });
            });
        </script>
    @endscript
</div>
