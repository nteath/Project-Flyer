@extends('layouts.master')


@section('content')

    <h1 class="text-center">Selling your home ?</h1>

    <br/>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <form method="post" action="/flyers">
                @include('flyers.form')

                @include('partials.formErrors')
            </form>

        </div>
    </div>
    
@stop