<!DOCTYPE HTML>
<html>
<head>

  <meta name="verify-paysera" content="6e5488a4bce566e633c8e744d2682a59">
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  <!-- Materialize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

  <!-- Roboto Font + Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- AOS -->
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
  <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">

  <!-- MC Player Counter -->
  <script src="https://cdn.rawgit.com/leonardosnt/mc-player-counter/1.1.0/dist/mc-player-counter.min.js"></script>
  

  <!-- Theme's Stylesheet -->
  <link rel="stylesheet" href="./css/theme.css" />

  <!-- Theme JS -->
  <script src="./js/smoothscroll.js"></script>
  <script src="./js/nav.js"></script>

  <!-- Site Title -->
  <title>BapServeris.lt</title>

  <!-- Meta Info -->
  <meta charset="UTF-8">
  <meta name="author" content="Šalna">
  <meta name="description" content="A friendly Minecraft server, with a relaxed vibe.">
  <meta name="keywords" content="Minecraft, Server, Your ServerName, Multiplayer">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<script src="./scripts/getNumber.js"></script>
  <!-- Nav -->
  <div class="header" style="background: url('../img/takelis.png'); background-position: 50% 10%; background-attachment: fixed;">
    <div class="navbar-fixed">
      <nav class="z-depth-0">
        <div class="nav-wrapper">
{{--           <a href="#" class="brand-logo"><img src="./assets/logo.png" alt="Logo"></a> --}}
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#about">Apie</a></li>
            <li><a href="./bans">Nuobaudų Sąrašas</a></li>
            <li><a href="#staff">Komanda</a></li>
{{--             <li><a href="#vip">Vip</a></li> --}}
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="#about">Apie</a></li>
            <li><a href="#staff">Komanda</a></li>
            <li><a href="./bans">Nuobaudų Sąrašas</a></li>
          </ul>
        </div>
      </nav>

      <!-- / Nav -->

    </div>
    <div class="header-content center-align" data-aos="fade">
      <h1 style="padding-top: 6%;">Sveiki Atvykę į <img src="./assets/logo2.png" alt="Logo"> Serverį</h1>
      <h3><div class="rectangle">
            <div class="t">
                <span class="r_fir">ŠIUO METU</span>
                <span class="r_sec">SERVERYJE:</span>
            </div>
            <div class="n">
                <span class="r_fir" id="r_fir">0/</span>
                <span class="r_sec" id="r_sec">100</span>
            </div>
        </div></h3>
        <h4>Serveris šiuo metu tvarkomas</h4>
      <a class="waves-effect waves-light btn-large grey darken-4" style="margin-bottom: 10%; margin-top: 2%;" href="/oauth/discord">Prisijungti</a>
    </div>
  </div>
  <!-- About -->

  <div class="about" id="about">
    <div class="main">
      <div class="row">
        <div class="col s12 l5 align-center">
          <img class="responsive-img" src="./img/loop.gif" data-aos="fade-right">
        </div>
        <div class="col s12 l7" data-aos="fade-left">
          <h4>Kas yra BapServeris?</h4>
          <p>Paprastas išlikimas grindžiant mintimi, kad žmonės jaustusi panašiai, kaip privačiame BAP! serveryje ir taptų viena bei 
            kompetetinga žmonių grupė, kuri tobulintų ir padėtų kilti serveriui į didesnes aukštumas. Draugiška ir pozityvi bendruomenė, praleidžianti laiką gerai valiai. </p>
          <p>Prisijunkite prie mūsų Discord ir sekite naujienas!</p>
          <a class="waves-effect waves-light btn-large grey darken-4" style="margin-top: 2%;" href="https://discord.gg/7DsVwPD">Discord</a>
        </div>
      </div>
    </div>
  </div>

  <!-- / About -->
{{--   <div class="main">
      <div class="row">
        <div class="col s12">
          <h4 class="center-align" style="padding-bottom: 1
        %;">Nuobaudų Sąrašas</h5>
      </div>
    </div>
    <div class="row">
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400">
      
      </div>
    </div>
  </div> --}}
  <!-- Staff -->

  <div class="staff" id="staff">
    <div class="main">
      <div class="row">
        <div class="col s12">
          <h4 class="center-align" style="padding-bottom: 1
        %;">Mūsų Komanda</h5>
      </div>
    </div>
    <div class="row">
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400">
        <div class="card-panel no-padding">
          <div class="row">
            <div class="col s12 no-padding">
              <img class="responsive-img" src="./img/Salniukas.png">
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              <h5>Salniukas</h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <blockquote style="margin: 0% 8% 0% 8%;">
                Svetainės sistemų programuotojas, Administratorius

              </blockquote>
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              Šalna#7007
            </div>
          </div>
        </div>
      </div>
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400" data-aos-delay="150">
        <div class="card-panel no-padding">
          <div class="row">
            <div class="col s12 no-padding">
              <img class="responsive-img" src="./img/scarletas.png">
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              <h5>Scarletass</h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <blockquote style="margin: 0% 8% 0% 8%;">
                Skripteris, CTO (Techninių dalykų Direktorius), Administratorius
              </blockquote>
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              Scarletas#0001
            </div>
          </div>
        </div>
      </div>
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400" data-aos-delay="300">
        <div class="card-panel no-padding">
          <div class="row">
            <div class="col s12 no-padding">
              <img class="responsive-img" src="./img/akiniuotis.png">
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              <h5>Ponas Akiniuotis</h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <blockquote style="margin: 0% 8% 0% 8%;">
                Pirmasis įkūrėjas, CMO (Marketingo Direktorius), Administratorius
              </blockquote>
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              PonasAkiniuotis#6878
            </div>
          </div>
        </div>
      </div>
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400" data-aos-delay="450">
        <div class="card-panel no-padding">
          <div class="row">
            <div class="col s12 no-padding">
              <img class="responsive-img" src="./img/mrWeed.png">
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              <h5>MrWeed</h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <blockquote style="margin: 0% 8% 0% 8%;">
                Antrasis įkūrėjas, CEO (Generalinis Direktorius), Administratorius
              </blockquote>
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              MrWeed.#3368
            </div>
          </div>
        </div>
      </div>
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400" data-aos-delay="450">
        <div class="card-panel no-padding">
          <div class="row">
            <div class="col s12 no-padding">
              <img class="responsive-img" src="./img/Termis.png">
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              <h5>Termis</h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <blockquote style="margin: 0% 8% 0% 8%;">
                Pagrindinis Statytojas, CCO (Statybų Vadovas)
              </blockquote>
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              TERMIS.#2988
            </div>
          </div>
        </div>
      </div>
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400" data-aos-delay="450">
        <div class="card-panel no-padding">
          <div class="row">
            <div class="col s12 no-padding">
              <img class="responsive-img" src="./img/dziugas.png">
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              <h5>Džiugas</h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <blockquote style="margin: 0% 8% 0% 8%;">
                Jaunesnysis Prižiūrėtojas, Serverio tvarkos Valdovas
              </blockquote>
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              Džiugas#0158
            </div>
          </div>
        </div>
      </div>
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400" data-aos-delay="450">
        <div class="card-panel no-padding">
          <div class="row">
            <div class="col s12 no-padding">
              <img class="responsive-img" src="./img/ignas.png">
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              <h5>Ignas</h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <blockquote style="margin: 0% 8% 0% 8%;">
                Vyriausiasis Prižiūrėtojas, Serverio tvarkos Valdovas
              </blockquote>
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              Ignas#1932
            </div>
          </div>
        </div>
      </div>
      <div class="col m6 s12 l3" data-aos="zoom-in-up" data-aos-duration="400" data-aos-delay="450">
        <div class="card-panel no-padding">
          <div class="row">
            <div class="col s12 no-padding">
              <img class="responsive-img" src="./img/blank.png">
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              <h5>Latrica</h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <blockquote style="margin: 0% 8% 0% 8%;">
                Jaunesnysis Prižiūrėtojas, Serverio tvarkos Valdovas
              </blockquote>
            </div>
          </div>
          <div class="row main">
            <div class="col s12 center-align">
              Latrica#4977
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- / Staff -->
  <div class="vip center-align" id="vip">
    <div class="main">
      <div class="row" data-aos="fade">
        <div class="col s12">
          <h4>Naujienos</h4>
        </div>
      </div>
      <div class="row">
      @foreach($blogs as $blog)
        <div class="col s12 l4" data-aos="fade">
          <div class="card-panel">
            <div class="row">
              <div class="col s12">
                <h5>{{ $blog->title }}</h5>
                  @php
                    $string = strip_tags($blog->content);
                    if (strlen($string) > 200) {

                        // truncate string
                        $stringCut = substr($string, 0, 200);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $string .= '...';
                      }
                  @endphp
                <span>{{ $string }}</span>
                <br><br>
                <br>
                <a class="waves-effect waves-light btn-large grey darken-4" href="#popup{{ $blog->id }}">Skaityti Daugiau</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="page-footer grey darken-4 z-depth-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Kontaktai</h5>
          <p class="grey-text text-lighten-4">
			baporganizacija@gmail.com<br>
			MrWeed.#3368</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright grey darken-4 z-depth-4">
      <div class="container">
        <!-- Please give credit, where credit is due. Leave this here... -->
        Created with care, by Sid Engel & Šalna.
        <a class="grey-text text-lighten-4 right" href="#!">©BapServeris.lt 2020</a>
      </div>
    </div>
  </footer>
  <!-- /Footer -->

  <!-- AOS INIT -->
  <script>
    AOS.init({
      duration: 800,
      easing: 'ease-in-sine',
      disable: 'mobile',
    });
  </script>

  <!-- Mobile Nav INIT -->
  <script>
    $(".button-collapse").sideNav();
  </script>
  <script src="./scripts/getNumber.js"></script>


<style type="text/css">
  .box {
    width: 40%;
    margin: 0 auto;
    background: rgba(255,255,255,0.2);
    padding: 35px;
    border: 2px solid #fff;
    border-radius: 20px/50px;
    background-clip: padding-box;
    text-align: center;
    z-index: 1
  }

  .button {
    font-size: 1em;
    padding: 10px;
    color: #fff;
    border: 2px solid #06D85F;
    border-radius: 20px/50px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease-out;
  }
  .button:hover {
    background: #06D85F;
  }

  .overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    visibility: hidden;
    opacity: 0;
  }
  .overlay:target {
    visibility: visible;
    opacity: 1;
  }

  .popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 50%;
    position: relative;
    transition: all 5s ease-in-out;
  }

  .popup h2 {
    margin-top: 0;
    color: #333;
    font-family: Tahoma, Arial, sans-serif;
  }
  .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: #06D85F;
  }
  .popup .content {
    max-height: 30%;
    overflow: auto;
    text-align: center;
  }

  @media screen and (max-width: 700px){
    .box{
      width: 70%;
    }
    .popup{
      width: 70%;
    }
  }
</style>


  <!-- The Modal -->
@foreach($blogs as $blog)
<div id="popup{{$blog->id}}" class="overlay">
  <div class="popup">
    <h2 class="center">{{$blog->title}}</h2>
    <a class="close" href="/#vip">&times;</a>
    <div class="content">
      {{$blog->content}}
    </div>
  </div>
</div>
@endforeach
</body>

</html>