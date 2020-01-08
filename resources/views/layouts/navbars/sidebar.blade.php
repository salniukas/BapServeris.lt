
<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('BAP Serveris') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Pagrindinis') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Žaidėjų Sąrašas') }}</p>
        </a>
      </li>
      @if(Auth::user()->isAdmin || Auth::user()->isSupport)
      <li class="nav-item {{ ($activePage == 'Užsakymai' || $activePage == 'VUžsakymai') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">card_membership</i>
          <p>{{ __('Užsakymai') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'VUžsakymai' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('orders') }}">
                <span class="sidebar-normal">{{ __('Visi Užsakymai') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'UUžsakymai' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('orders-done') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal"> {{ __('Užbaigti Užsakymai') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'AUžsakymai' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('orders-deny') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Atmesti užsakymai') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'Paslaugos-Kurimas' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('service-create') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Paslaugos Kurimas') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'Paslaugos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('service-list') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Paslaugų Sąrašas') }} </span>
              </a>
            </li>
          </ul>
        </div>
        @endif
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Paslaugos') }}</p>
        </a>
      </li>
      {{-- <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>