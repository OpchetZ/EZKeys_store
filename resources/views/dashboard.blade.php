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
                    <hr>
                    <div class="row row-cols-2 row-cols-md-4 row-cols-lg-4" style="padding: 3%">
                        @foreach ($game as $item)
                            <div class="card pb-3">
                                
                                <div class="tumb" style="margin-left: auto;margin-right:auto;">
                                    <img class="rounded" src="{{ $item->photo }}" width="400px" />
                                </div>
                                <div class="details"style="padding:20px;text-align: center;">
                                    <b class="catagory" style="font-size: 15px">{{ $item->name }}</b>
                                </div>
                                <div class="price">
                                    <b>{{ $item->price }} บาท </b>
                                </div>
                                <div class="button">
                                    <a href="#" title="Back"><button class="btn btn-success btn-sm">Add to Cart <i
                                        class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
                                </div>

                            </div>
                            
                               
                            
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
