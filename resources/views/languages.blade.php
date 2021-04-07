@extends('app')

@section('css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
<div class="py-4 max-w-lg ml-14 sm:px-6 lg:px-1 ">
    <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg px-4 py-4">
        <h1 class="text-lg border-b-2 p-3">Default Language</h1>
        <div class="grid grid-cols-3 gap-5 p-3 ">
            <h1 class="text-md w-12 py-3">Default Language</h1>
            <div class="py-4">
                <select
                    class="mr-9 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-4 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                    @foreach($languages as $language)
                        <option class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                        value="{{$language->code}}" @if(env('DEFAULT_LANGUAGE') == $language->code) selected @endif >{{$language->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4 ml-8">
                <button type="button" class="mt-2 bg-red-500 font-bold py-2 px-4 rounded ml-4 shadow hover:bg-red-700 text-white rounded">SAVE</button>
            </div>
        </div>
    </div>
</div>
<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-2 p-8">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white justify-end	items-end text-right font-bold py-2 px-4 rounded my-1"
                onclick="myFunction()">Add New Language</button>
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">#</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Code</th>
                    <th class="px-4 py-2">RTL</th>
                    <th class="px-4 py-2 w-32">Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($languages as $language)
                <tr>
                    <td class="border px-4 py-2">{{$language->id}}</td>
                    <td class="border px-4 py-2">{{$language->name}}</td>
                    <td class="border px-4 py-2">{{$language->code}}</td>
                    <td class="border px-4 py-2">
                        <label class="switch">
                            <input type="checkbox" onchange="update_rtl_status(this);" value="{{ $language->id }}" @if($language->rtl) checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-0 justify-around">
                            <button onclick="myFunction()"
                                    class="p-1 text-teal-600 hover:bg-teal-600 hover:text-white rounded">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd"
                                          d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <button onclick="myFunction()"
                                    class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg>
                            </button>

                            <button onclick="myFunction()"
                                    class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="show" class="hidden fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                   class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
                        </div>
                        <select
                            class="mr-9 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-4 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                            @foreach($languages as $language)
                                <option class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        value="{{$language->code}}" @if(env('DEFAULT_LANGUAGE') == $language->code) selected @endif >{{$language->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button onclick="myFunction()" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Save
                            </button>
                        </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                            <button onclick="myFunction()" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                            </button>
                        </span>
            </form>
        </div>

    </div>
</div>
<div id="item" class="hidden fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                   class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput2"
                                   class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                            <input type="text" autofocus id="username"
                                   class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" />
                        </div>

                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button onclick="myFunction()" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Save
                            </button>
                        </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                            <button onclick="myFunction()" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                            </button>
                        </span>
            </form>
        </div>

    </div>
</div>
</div>


@endsection

@section('script')
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("show");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myShow() {
            var x = document.getElementById("show");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function update_rtl_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            {{--$.post('{{ route('languages.update_rtl_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){--}}
            {{--    if(data == 1){--}}
            {{--        location.reload();--}}
            {{--    }--}}
            {{--    else{--}}
            {{--        AIZ.plugins.notify('danger', '{{ t('Something went wrong') }}');--}}
            {{--    }--}}
            {{--});--}}
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{route('languages.update_rtl_status')}}',
                data:{
                    id:el.value
                }
                success: function (data) {
                    console.log(data);
                    //$("#link" + link_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    </script>

@endsection
