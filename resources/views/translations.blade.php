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
                            <input type="text" placeholder="enter search"
                                   class=" rounded-sm px-2 py-2 mb-5 focus:outline-none bg-gray-100 w-full"/>
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-1">sdff</button>
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
                                <td class="border px-4 py-2">
                                    <a href="{{route('translations.delete', ['id'=>$translation->id])}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded" >
                                        {{t("Delete")}}
                                    </a>
                                </td>
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
            alert(new RegExp("\s"));
            $('#tranlation-table > tbody  > tr').each(function (index, tr) {
                var value=$(tr).find('.key').text();

                $(tr).find('.value').val(value);
            });
        }
    </script>

@endsection
