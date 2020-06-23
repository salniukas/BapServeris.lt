@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Žaidėjų Sąrašas</h4>
            <p class="card-category">Čia galite matyti visus serverio žaidėjus</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Avataras
                  </th>
                  <th>
                    Minecraft vartotojo vardas
                  </th>
                  <th>
                    Veiksmai
                  </th>
                </thead>
                <tbody>
                @foreach($players as $player)
                  <tr>
                    <td>
                      <img src="https://minotar.net/avatar/{{ $player->username }}/24">
                    </td>
                    @if($player->donator === 1)
                    <td class="text-primary">
                      {{ $player->username }}
                    </td>
                    @else
                    <td>
                      {{ $player->username }}
                    </td>
                    @endif
                    <td>
                      
                      <a href="../gift/{{ $player->id }}">Dovanoti Paslaugą</a>
                    </td>
                  </tr>
                  @endforeach
                  {{ $players->links() }}
                </tbody>
              </table>
              {{ $players->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection