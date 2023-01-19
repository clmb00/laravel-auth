@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card border-secondary">
                <div class="card-header text-white border-secondary" style="background-color: rgba(71, 37, 95, 0.6);">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col-4">
            <div class="card border-secondary">
                <div class="card-header text-white border-secondary" style="background-color: rgba(71, 37, 95, 0.6);">Number of Projects</div>

                <div class="card-body">
                    {{ $number_of_proj }}
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card border-secondary">
                <div class="card-header text-white border-secondary" style="background-color: rgba(71, 37, 95, 0.6);">Last Project</div>

                <div class="card-body">
                    {{ $last_project->name }}
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
