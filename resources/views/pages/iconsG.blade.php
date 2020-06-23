@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Icons')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <form method="post" action="{{ route('paysera-redirect') }}" autocomplete="off" class="form-horizontal" id="prof">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Paslaugos') }}</h4>
                <p class="card-category">Paslaugos Dovanojimas</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Žaidėjui:') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        {{$victim->username}}
                        <input class="form-control" name="username" id="username" type="text" value="{{ $victim->username }}" hidden/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Jūsų El.Paštas:') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      @if(!Auth::user()->email)
                        <input class="form-control" name="email" id="email" type="text" value="" required/>
                      @else
                        <input class="form-control" name="email" id="email" type="text" value="{{Auth::user()->email}}" required/>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Paslauga:') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control" id="amount" name="amount">
                        <option selected="selected">PASIRINKITE PASLAUGA</option>
                        @foreach($services as $service)
                          <option value="{{$service->cost}}">
                            @if($service->name === 'atleiskit')
                            {{$service->name}} (UNBAN {{$service->cost /100}} €)
                            @else
                            {{$service->name}} ({{$service->cost /100}} €)
                            @endif
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Dovanoja') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <input class="form-control" name="giftedby" id="giftedby" type="text" value="{{ $gifter }}" required/>
                        <input class="form-control" name="gift" id="gift" type="text" value="1" hidden/>
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto d-flex justify-content-center">
                  <button type="submit"  class="btn btn-primary ">{{ __('Apmokėti') }}</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection