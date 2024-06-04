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
            $wire.on('AcessToBlockedItem', ({med})=>{
                swal.fire({
                    title: 'Товар недоступен',
                    text: med + ' недоступен для покупки в данный момент',
                    icon: 'info'
                });
            })
        </script>
    @endscript
