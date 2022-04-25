@extends('layouts.app')

@section('content')
<div class="container mt-3" style="max-width: 600px;">

    <div class="text-right">
        <label for="addressAdd" class="font-weight-bold">新規追加</label>
    </div>

    @if(session('message'))
        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
    @endif

    <form action="{{ route('address.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="font-weight-bold">名称</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="addressAdd" name="name" />
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="postal" class="font-weight-bold">郵便番号</label>
            <input type="text" class="form-control @error('postal') is-invalid @enderror" id="addressAdd" name="postal" />
            @error('postal')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address" class="font-weight-bold">住所</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="addressAdd" name="address" />
            @error('address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone" class="font-weight-bold">電話番号</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="addressAdd" name="phone" />
            @error('phone')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="font-weight-bold">メールアドレス</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="addressAdd" name="email" />
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="todo" class="font-weight-bold">用途</label>
            <input type="text" class="form-control @error('todo') is-invalid @enderror" id="addressAdd" name="todo" />
            @error('todo')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn-btn-primary">追加</button>
    </form>

    <div class="my-4">
        <a href="{{ url('/address/') }}">＞　一覧・編集ページへ</a>
    </div>

</div>
@endsection

