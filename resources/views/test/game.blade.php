@extends('app')

@section('content')
{{ $token }}
<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

        <div class="flex flex-wrap">
            <div class="w-full md:w-2/2 xl:w-3/3 p-3">
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Latest trade</h5>
                            <h3 class="font-bold text-3xl">
                                <p>
                                    <span id="latest_trade_user"></span>
                                </p>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    Echo.private('game.{{$token}}')
        .listen('NewGame', (e) => {
            console.log(e);
            // document.getElementById('latest_trade_user').innerText = e.trade;
        })
</script>
@endsection