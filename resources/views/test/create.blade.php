@extends('app')

@section('content')
<div class="container">
    <div class="row">
        {{ Form::open(['url' => route('test.enter'), 'method' => 'POST', 'class' => 'formEnter']) }}
            <div class="form-group">
                <label for="username">代理帳號</label>
                <input type="text" class="form-control" id="username" name="username" value="nick888">
            </div>
            <div class="form-group">
                <label for="hash_key">Hash key</label>
                <input type="text" class="form-control" id="hash_key" name="hash_key" value="TarFhlAbUqYh6VA6xC2gpxmn9v5Vu984">
            </div>
            <div class="form-group">
                <label for="hash_iv">Hash iv</label>
                <input type="text" class="form-control" id="hash_iv" name="hash_iv" value="cDMjeZy8fvAbcyHF7XdkYBX8rJvFLFRe">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        {{ Form::close() }}
    </div>
</div>

@endsection