@extends('layouts.app')

@section('content')
<div class="container mt-3" style="max-width: 600px;">

    <div class=text-right">
        <label for="addressAdd" class="font-weight-bold">編集</label>
    </div>

    @if(session('message'))
        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
    @endif

    <form action="{{ route('address.update', ['address' => $address->id ]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="font-weight-bold">名称編集</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="addressAdd" name="name" value="{{ $address->name }}" />
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="postal" class="font-weight-bold">郵便番号編集</label>
            <input type="text" class="form-control @error('postal') is-invalid @enderror" id="addressAdd" name="postal" value="{{ $address->postal }}" />
            @error('postal')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address" class="font-weight-bold">住所編集</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="addressAdd" name="address" value="{{ $address->address }}" />
            @error('address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone" class="font-weight-bold">電話番号編集</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="addressAdd" name="phone" value="{{ $address->phone }}" />
            @error('phone')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="font-weight-bold">メールアドレス編集</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="addressAdd" name="email" value="{{ $address->email }}" />
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="todo" class="font-weight-bold">用途編集</label>
            <input type="text" class="form-control @error('todo') is-invalid @enderror" id="addressAdd" name="todo" value="{{ $address->todo }}" />
            @error('todo')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn-btn-primary">編集</button>
    </form>

    <div class="my-4">
        <a href="{{ url('/address/') }}">＞　一覧ページへ</a>
    </div>

</div>
@endsection

