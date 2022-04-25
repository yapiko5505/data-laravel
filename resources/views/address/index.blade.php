@extends('layouts.app')

@section('content')
<div class="container" style="max-width:1200px">

@if(session('message'))
    <div class="alert alert-success" role="alert">{{ session('message')}}</div>
@endif
    <div class="col text-right">
        <a type="button" href="{{ url('/address/find/') }}" class="btn btn-info text-right" role="button"><i class="fas fa-plus"></i>検索<br></a>
        <a type="button" href="{{ url('/address/create/') }}" class="btn btn-primary text-right" role="button"><i class="fas fa-plus"></i>新規追加</a>
    </div>

    <table class="table table-borderred mt-2">
        <thead class="table-dark">
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    名称
                </th>
                <th scope="col">
                    郵便番号
                </th>
                <th scope="col">
                    住所
                </th>
                <th scope="col">
                    電話番号
                </th>
                <th scope="col">
                    メールアドレス
                </th>
                <th scope="col">
                    用途
                </th>
                <th scope="col">
                    編集
                </th>
                <th scope="col">
                    削除
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($addresses) > 0)
                @foreach($addresses as $key=>$address)
                <tr>
                    <td scope="row">
                        {{$key+1}}
                    </td>
                    <td>
                        {{$address->name}}
                    </td>
                    <td>
                        {{$address->postal}}
                    </td>
                    <td>
                        {{$address->address}}
                    </td>
                    <td>
                        {{$address->phone}}
                    </td>
                    <td>
                        {{$address->email}}
                    </td>
                    <td>
                        {{$address->todo}}
                    </td>
                    <td>
                        <a href="{{ route('address.edit', [ 'address' => $address->id ]) }}">
                            <button type="button" class="btn btn-outline-primary"><i class="far fa-edit"></i> 編集</button>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('address.destroy', $address)}}" class="float-right">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-outline-danger" onClick="return confirm('削除しますか?');"><i class="far fa-trash-alt"></i> 削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            
            @else 
                <tr>
                    <td colspan="9">追加された住所録はありません。</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex">
        <div class="mx-auto">
            {{$addresses->links("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
@endsection
            