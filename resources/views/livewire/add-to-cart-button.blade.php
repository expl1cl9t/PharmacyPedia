<button class="w-16 h-16" wire:click="addToCart" {{$isInCart ? '' : 'disabled'}}>
    @if($isInCart)

        <img id="crdimage" src="{{asset('storage/other/cart.png')}}" alt="">
    @else
        <img id="crdimage" src="{{asset('storage/other/alreadyIncath.png')}}" alt="">
    @endif
</button>
    @script
        <script>
            $wire.on('addedInCart', ()=>{
                swal.fire({
                    title: 'Добавлено в корзину',
                    text: 'Товар {{\App\Models\Medicine::find($medicneId)->name}} добавлен в вашу корзину!',
                    icon: 'success'
                });
                document.querySelector('#crdimage').src = "{{asset('storage/other/alreadyIncath.png')}}";
            })
        </script>
    @endscript
