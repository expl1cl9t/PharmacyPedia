<div class="w-1/3 h-auto bg-[#dfc6b4] flex flex-col rounded-2xl items-center justify-between text-xl gap-6">
    <form wire:submit="register" class="w-full flex flex-col gap-6 p-10">
        <p class="text-3xl font-medium font-sans">Регистрация</p>
        <div class="flex flex-row w-full justify-between">
            <div class="flex flex-col">
                <label for="login">Введите фамилию</label>
                <input wire:model="Name" type="text" autocomplete="Name"  placeholder="Фамилия" class="text-left border-b-[#5b3401] border-b-2 bg-opacity-100 bg-transparent">
            </div>
            <div class="flex flex-col">
                <label for="login">Введите имя</label>
                <input wire:model="Surname" type="text" autocomplete="Surname"  placeholder="Имя" class="text-left border-b-[#5b3401] border-b-2 bg-opacity-100 bg-transparent">
            </div>
        </div>
        <div class="flex flex-row w-full justify-between">
            <div class="flex flex-col">
                <label for="login">Введите отчество</label>
                <input wire:model="Fname" type="text" autocomplete="Fname"  placeholder="Отчество" class="text-left border-b-[#5b3401] border-b-2 bg-opacity-100 bg-transparent">
            </div>
            <div class="flex flex-col">
                <label for="login">Укажите возраст</label>
                <input wire:model="Age" type="number" autocomplete="Age"  placeholder="Возраст" class="text-left border-b-[#5b3401] border-b-2 bg-opacity-100 bg-transparent">
            </div>
        </div>
        <label for="login">Укажите электронную почту</label>
        <input wire:model="Email" type="email" autocomplete="email"  placeholder="Электронная почта" class="text-left border-b-[#5b3401] border-b-2 bg-opacity-100 bg-transparent">
        <label for="login">Укажите номер телефона</label>
        <input wire:model="PhoneNumber" type="text" autocomplete="phoneNumber" placeholder="Номер телефона" class="text-left border-b-[#5b3401] border-b-2 bg-opacity-100 bg-transparent">
        <label>Выберите пол</label>
        <select wire:model="Gender" autocomplete="Gender">
            <option value="male">Мужской</option>
            <option value="female">Женский</option>
        </select>
        <label for="login">Введите логин</label>
        <input wire:model="Login" type="text" autocomplete="login"  placeholder="Логин" class="text-left border-b-[#5b3401] border-b-2 bg-opacity-100 bg-transparent">
        <label for="login">Введите пароль</label>
        <input wire:model="Password" type="password" autocomplete="password"  placeholder="Пароль" class="text-3xls text-right border-b-[#5b3401] border-b-2 bg-transparent">
        <button type="submit"
            class="p-5 bg-[#5b3401] text-white"
        >Зарегистрироваться</button>
    </form>
    <div class="flex flex-row justify-between w-full">
        <a href="/auth" wire:navigate><button>Авторизация</button></a>
        <button>Забыли пароль</button>
    </div>
    @script
        <script>
            $wire.on('registrationSuccess', ()=>{
                swal.fire({
                    text: 'Вы успешно зарегистрировались!',
                    title: 'Регистрация',
                    icon: 'success'
                }).then(result => {
                    if (result.isConfirmed){
                        $wire.navigate('/auth');
                    }
                })
            })

            $wire.on('errorWhereCreation', ({error}) => {
                swal.fire({
                    title: 'Ошибка при создании аккаунта',
                    text: error,
                    icon: "error"
                })
            })
        </script>
    @endscript
</div>
