@extends('layouts.app')

@section('content')
<!-- Messages... -->
<div class="container-fluid section first-section message">
    <div class="container">
        <h5 class="text-blue">Messages</h5>
        <hr>
            <chats :user="{{ auth()->user() }}" :c_study="{{$study}}" :c_batch="{{$batch}}" :nim="{{$nim}}"></chats>
        <br>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ config('app.main_url').'profile' }}" class="btn lg-btn w-100">BACK TO PROFILE</a>
            </div>
        </div>
    </div>
</div>
@endsection
