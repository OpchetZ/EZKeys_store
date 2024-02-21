<x-app-layout title="EZkeys Store">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EZKeys Store') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: papayawhip">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as {{ Auth::user()->name }}

                    <div class="button">
                        <a href="{{ url('/Mykey/' . Auth::user()->id) }}">

                            <button class="btn btn-info btn-sm">My Key</button>

                        </a>
                    </div>
                    <hr>
                    <div class="row row-cols-2 row-cols-md-4 row-cols-lg-4" style="padding: 3%">
                        @php
                            function generateRandomString($len)
                            {
                                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                                $result = '';

                                for ($count = 0; $count < $len; $count++) {
                                    $randomIndex = mt_rand(0, strlen($characters) - 1);
                                    $result .= $characters[$randomIndex];
                                }

                                if (strlen($result) >= 5) {
                                    $result = substr($result, 0, 5) . '-' . substr($result, 5, 5) . '-' . substr($result, 11, 5);
                                }

                                return $result;
                            }

                            $randomString = generateRandomString(17);
                        @endphp
                        @foreach ($game as $item)
                            <div class="card pb-3" style="border: none">
                                <div class="tumb" style="margin-left: auto;margin-right:auto;">
                                    <img class="rounded" src="{{ $item->photo }}" width="400px" />
                                </div>
                                <div class="details" style="padding:20px;text-align: center;">
                                    <b class="catagory" style="font-size: 15px">{{ $item->name }}</b>
                                </div>
                                <div style="border-style: solid">
                                    <div class="price">
                                        <b>{{ $item->price }} บาท </b>
                                    </div>

                                    <div class="button">


                                        <form action="{{ route('dashboard.store') }}" method="POST">
                                            <input type="hidden" name="game_id" value="{{ $item->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            <input type="hidden" name="customer_id" value="{{ Auth::id() }}">
                                            <input name="key" type="hidden" value="{{ $randomString }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-success btn-sm">Buy Now <i class="fa fa-arrow-right"
                                                    aria-hidden="true"></i></button>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- <script>
                                var javascriptRandomNumber = "{{ $randomNumber }}";
                                console.log(javascriptRandomNumber);
                            </script> --}}
                        @endforeach
                        {{-- <script>
                            function ran(len) {
                                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                                var result = '';

                                for (var count = 0; count < len; count++) {
                                    var randomIndex = Math.floor(Math.random() * characters.length);
                                    result += characters.charAt(randomIndex);


                                }
                                if (result.length = 5) {

                                    result = result.substring(0, 5) + '-' + result.substring(6, 11) + '-' + result.substring(12, 18);
                                }


                                return result;
                            }
                            var javascriptRandomNumber = generateRandomNumber(15);
                            console.log(javascriptRandomNumber);
                            document.querySelector(".key").value = ran(17);
                        </script> --}}

                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
