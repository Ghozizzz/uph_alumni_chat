@extends('layouts.app')

@section('content')
<!-- Messages... -->
<div class="container-fluid section first-section message">
    <div class="container">
        <h5 class="text-blue">Messages</h5>
        <hr>
            {{-- <chat-app :user="{{ auth()->user() }}"></chat-app> --}}
            <chats :user="{{ auth()->user() }}"></chats>
        <br>
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn lg-btn w-100">BACK TO PROFILE</button>
            </div>
        </div>
    </div>
</div>
@endsection
