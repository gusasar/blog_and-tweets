@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create entries</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('entries')}}" method="post">
                     @csrf
                     <div class="form-group ">

                        <label for="title" >{{ __('Entry title') }}</label>
                                          <!--class="col-md-4 col-form-label text-md-right"-->
                        <div >
                            <!-- class="col-md-6" -->
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>
                     <div class="form-group ">
                                            <!--row-->
                        <label for="content" >{{ __('Content') }}</label>
                                             <!--class="col-md-4 col-form-label text-md-right"-->
                        <div >
                            <!--class="col-md-6"-->
                            <textarea  class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required="content" autofocus>
                            </textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>
                        <button type="submit" class="btn btn-primary">Publish</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
