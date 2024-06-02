<div class="w-1/3 h-1/2 bg-[#dfc6b4] flex flex-col rounded-2xl items-center justify-between text-2xl gap-6">
    <form wire:submit="auth" class="w-full flex flex-col gap-6 p-10">
        <p class="text-3xl font-medium font-sans">Авторизация</p>
        <label for="login">Введите адрес электронной почты</label>
        <input wire:model="login" type="email" autocomplete="email" placeholder="Адрес электронной почты" class="text-left border-b-[#5b3401] border-b-2 bg-opacity-100 bg-transparent">
        <label for="login">Введите пароль</label>
        <input wire:model="password" type="password" name="password" autocomplete="password" placeholder="Пароль" class="text-3xls text-right border-b-[#5b3401] border-b-2 bg-transparent">
        <button type="submit">Авторизоваться</button>
    </form>
    <div class="flex flex-row justify-between w-full">
        <a href="/register" wire:navigate><button>Зарегистрироваться</button></a>
        <button>Забыли пароль</button>
    </div>

    @script
        <script>
            $wire.on('successAuth', () => {
                swal.fire({
                    title: 'Авторизация успшена',
                    text: 'Вы успешно авторизированы на сайте!',
                    icon: 'success'
                });
                window.location.href = '{{route('inde')}}';
            });
            $wire.on('errorAuth', ({error})=>{
                swal.fire({
                    title: 'Ошибка при авторизации',
                    text: error,
                    icon: 'error'
                });
            });
        </script>
    @endscript

</div>
