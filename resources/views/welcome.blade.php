<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000000">
    <meta name="verify-paysera" content="6e5488a4bce566e633c8e744d2682a59">

    <link rel="manifest" href="./manifest.json">

    <link rel="stylesheet" href="styles/font.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/body.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modal.css">

    <!-- Import FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">


    <title>BAP! Puslapis</title>
</head>

<body>

    <!-- MODAL ============================== -->
    <div class="modalBG" onclick="modal.closeAll()"></div>
    <div class="modal m_contact m_hidden m_temp_hidden">
        <h1>Kontaktai.</h1>
        <span class="h">Email:</span><br><span>baporganizacija@gmail.com</span><br><br>
        <span class="h">Discord:</span><br><span><a href="http://discord.gg/rpqffee">http://discord.gg/rpqffee</span></a><br><br>
        {{-- <span class="h">Tel. Nr.:</span><br><span>Armandas Gudžiūnas<br> +37067916425</span> --}}
    </div>

    <div class="modal m_info m_hidden m_temp_hidden">
        <h1>Info.</h1>
        <span class="t">Naujoji serverio idėja yra niekuom neišsiskiriantis, paprastas išlikimas grindžiant mintimi, kad žmonės jaustusi panašiai, kaip privačiame BAP! serveryje ir taptų viena bei kompetetinga žmonių grupė, kuri tobulėtų ir padėtų kilti serveriui į didesnes aukštumas. Draugiška ir pozityvi bendruomenė, praleidžianti laiką gerai valiai.</span>

        <h2>Administracija.</h2>
        <span class="b">MrWeed.</span><span class="u"> (Pirmasis įkūrėjas, CEO)</span><br>
        <span class="b">PonasAkiniuotis</span><span class="u"> (Antrasis įkūrėjas, CMO)</span><br>
        <span class="b">Scarletas</span><span class="u"> (Administratorius, CTO)</span>
    </div>

    <div class="modal m_news m_hidden m_temp_hidden">
        <h1>Naujienos</h1>
        <h2>Serveris</h2>
        <span class="q">Serveris startavo, <b>laukiame jūsų mc.bapserveris.lt</b> <b>Serverio versija 1.12.2</b></span><span class="r"> (Informacija pateikta 2020-01-01)</span>

        <h2>Discord</h2>
        <span class="q1">Discord serveryje <b>yra 1420 narių.</b></span><span class="q2"> (Informacija pateikta 2019-12-2)</span>
    </div>

    <!-- HEADER ============================== -->
    <div class="header">
        <img src="./assets/logo.png" alt="Logo" class="logo">
        <div class="links">
            <a href="#" onclick="modal.toggle('contact')">Kontaktai<span><i class="fas fa-square-full"></i></span></a>
            <a href="#" onclick="modal.toggle('info')">Informacija<span><i class="fas fa-square-full"></i></span></a>
            <a href="#" onclick="modal.toggle('news')">Atnaujinimai<span><i class="fas fa-square-full"></i></span></a>
        </div>
    </div>

    <!-- MAIN CONTENT ============================== -->
    <div class="bg">
        <div class="bgText">
            <h1>Sveiki Atvykę!</h1>
            <h2>Serverio ip: mc.bapserveris.lt</h2>
            <h2>Serverio Versija: 1.12.2</h2>
        </div>
    </div>

    <div class="main">
        <div class="leftLinks">
            <div class="text_wrapper">
                <div class="link l_fir">
                    <div class="cir cir-o"></div><i class="fas fa-circle cir-o"></i><a href="#" onclick="modal.toggle('contact')">KONTAKTAI</a><br>
                </div>
                <div class="link l_sec">
                    <div class="cir cir-b"></div><i class="fas fa-circle cir-b"></i><a href="#" onclick="modal.toggle('info')">INFORMACIJA</a>
                </div>
            </div>
        </div>

        <div class="rectangle">
            <div class="t">
                <span class="r_fir">ŠIUO METU</span>
                <span class="r_sec">SERVERYJE:</span>
            </div>
            <div class="n">
                <span class="r_fir">0/</span>
                <span class="r_sec">250</span>
            </div>
        </div>

        <div class="rightLinks">
            <div class="text_wrapper">
                <div class="link l_fir">
                    <div class="cir cir-o"></div><i class="fas fa-circle cir-o"></i><a href="#" onclick="modal.toggle('news')">ATNAUJINIMAI</a><br>
                </div>
                <div class="link l_sec">
                    <div class="cir cir-b"></div><i class="fas fa-circle cir-b"></i><a href="http://bapserveris.lt/parama">PASLAUGOS</a>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER ============================== -->
    <footer>
        <span style="margin-right: 70px;">© 2020. <b>by Šalna</b></a></span>
    </footer>

    <script src="scripts/main.js"></script>
    <script src="scripts/modal.js"></script>
    <script src="scripts/getNumber.js"></script>
</body>
</html>
