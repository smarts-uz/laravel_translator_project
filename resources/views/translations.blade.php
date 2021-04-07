@extends('app')

@section('content')
    <form class="form-horizontal" action="{{ route('translations.store') }}" method="POST">
        @csrf
        {{ method_field('POST') }}
        <input type="hidden" name="lang" value="{{ $lang }}">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4" >
                    <table class="table-fixed w-full" id="tranlation-table">
                        <thead>
                        <div class="grid grid-cols-3 gap-5">
                            <h1 CLASS="text-red-500 text-2xl">Language</h1>
                            <div class="relative mr-14 my-2 w-full">
                                <input type="search" class="bg-purple-white w-full shadow rounded border-0 p-3" placeholder="Search by name...">
                                <div class="absolute bottom-4 right-5 pin-r pin-t  mr-4 text-purple-lighter">
                                    <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
    	<path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
        c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
        C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
        S32.459,40,21.983,40z"/>

	</svg>

                                </div>
                            </div>
{{--                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-1">sdff</button>--}}
                        </div>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">{{t('No.')}}</th>
                            <th class="px-4 py-2">{{t('Key')}}</th>
                            <th class="px-4 py-2">{{t('Value')}}</th>
{{--                            <th class="px-4 py-2 w-32">{{t('Action')}}</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($translations as $key => $translation)
                            <tr>
                                <td class="border px-4 py-2">{{ ($key+1) + ($translations->currentPage() - 1)*$translations->perPage() }}</td>
                                <td class="border px-4 py-2 key">{{$translation->lang_key}}</td>
                                <td class="border px-4 py-2 "><input type="text" autofocus
                                                                    value="{{$translation->lang_value??''}}"
                                                                    name="values[{{ $translation->lang_key }}]"
                                                                    class="value rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full"/>
                                </td>
{{--                                <td class="border px-4 py-2">--}}
{{--                                    <a href="{{route('translations.delete', ['id'=>$translation->id])}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded" >--}}
{{--                                        {{t("Delete")}}--}}
{{--                                    </a>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{ $translations->appends(request()->input())->links() }}
                    <div class="form-group mb-0 pt-5 text-right">

                        <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-1"
                                onclick="copyTranslation()">{{ t('Copy Translations') }}</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-1">{{t('Save')}}</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection

@section('script')

    <script type="text/javascript">
        //translate in one click
        function copyTranslation() {
            // alert(new RegExp("\s"));
            $('#tranlation-table > tbody  > tr').each(function (index, tr) {
                var value=$(tr).find('.key').text();

                $(tr).find('.value').val(value);
            });
        }
    </script>

@endsection
