@extends('layouts.mainLayout')

@section('contentArea')
<div class="menu-ovelay"></div>
<div class="dash">
    @include('components.sidebar')
    <div class="dash-app">
        @include('components.notification')
        <div class="dash-content">
            <div class="maintitlesec bluebg">
                <h1><img src="images/pot-icon.svg" alt="" /> STATIONARY COMBUSTION</h1>
            </div>
            @include('components.content')
        </div>
    </div>
</div>

<!-- script area start -->
@include('scripts.script')
<!-- script area end -->

@endsection