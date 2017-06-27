@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Welcome</div>--}}

                {{--<div class="panel-body">--}}
                    {{--Your Application's Landing Page.--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col-lg-12">
            <img class="img-responsive center-block" src="{{URL::asset('img/screen.jpg')}}" alt="">
            <div class="intro-text text-center">
                <h1 class="name">Zeus Private Limited</h1>
                <hr class="star-light">
                <span class="skills">Healthy - Strong - Energitic</span>
            </div>
        </div>
    </div>
</div>
@endsection
