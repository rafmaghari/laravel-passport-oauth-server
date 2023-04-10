@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Clients') }}</div>

                    <div class="card-body">
                        <p>Here are the list of your clients</p>
                        @foreach($clients as $client)
                            <h3> {{ $client->id }}</h3>
                            <h3> {{ $client->name }}</h3>
                            <p> {{ $client->redirect }}</p>
                            <p> {{ $client->secret }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">{{ __('Create New Client') }}</div>
                    <div class="card-body">
                        <form action="/oauth/clients" method="POST">
                            @csrf()
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Redirect') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="redirect" type="text" name="redirect" value="{{ old('redirect') }}" required autocomplete="redirect" autofocus>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
