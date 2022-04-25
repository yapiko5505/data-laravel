@extends('layouts.app')

@section('content')
    <div class="container mt-3" style="max-width: 800px;">

        <div class="text-right">
            <label for="addressAdd" class="font-weight-bold">検索</label>
        </div>

        <form action="/address/find" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control id="addressAdd" name="input" />
                <input type="submit" value="検索">
            </div>
        </form>
        @if(isset($address))
            <table class="table table-borderred mt-2">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">
                            データ
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{$address->getData()}}
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif

        <div class="my-4">
            <a href="{{ url('/address/') }}">＞　一覧・編集ページへ</a>
        </div>
    </div>
@endsection