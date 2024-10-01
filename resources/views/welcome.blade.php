<!DOCTYPE html>
<html>
<head>
    <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NMSM247H');</script>
  <!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('public/backend/assets/img/logoDDH.png') }}" type="image/png">
  <title>DDH - Discovery Diet & Health</title>

  <style>

    html, body {
        height: 100%;
        margin: 0;
        background-color: #f4f1ec;
        font-family: Arial, sans-serif;
    }

    .logo {
        width: 100%;
        max-width: 20%;
        margin: 15px auto;
        margin-left: 4%;
        display: block;
    }

    .containerUM {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .textoUM, .imagemUM {
        flex: 1;
        margin: 10px;
        text-align: center;
    }

    .fotoTexto {
        width: 100%;
        max-width: 70%;
        height: auto;
        display: block;
        margin: 0 auto;
        margin-left: 10%;
    }

    .fotoMedica {
        width: 100%;
        max-width: 80%;
        height: auto;
        display: block;
        margin: 0 auto;
        margin-top: -80px;
        margin-right: 0px;
    }


    .imagemUM {
        max-width: 100%;
    }

    button {
        background-color: #3d7182;
        font-size: 80%;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 10px 30px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        margin: 10px auto;
        margin-left: 10%;
        display: block;
        width: 30%;
        text-align: center;
    }

    button:hover {
        cursor: pointer;
        background-color: #44869b;
        transition: background-color 0.3s, color 0.3s;
    }

    .containerDOIS {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 170px 150px;
    }

    .imagemDOIS {
        max-width: 45%;
    }

    .fotoPC {
        width: 100%;
        padding-left: 55px;
    }

    .textoDOIS {
        background-color: #fff;
        border-radius: 15px;
        padding: 30px 25px 20px 50px;
        max-width: 30%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        font-size: 20px;
        color: #333;
    }

    .titulo {
        color: #3d7182;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }

      .tituloDOIS {
          color: #3d7182;
          font-family: Arial, Helvetica, sans-serif;
          text-align: center;
          font-size: 40px;
          font-weight: bold;
          margin-bottom: 15px;
      }

      .containerTRES {
          text-align: center;
          margin: 50px 70px;
      }

    .bolaCard {
        display: inline-block;
        text-align: center;
        padding: 50px;
        max-width: 300px;
    }

    .bola {
        width: 200px;
        border-radius: 50%;
    }

    .textoBola {
        background-color: #f4f1ec;
        border: solid;
        border-color: #373737;
        border-width: 1px;
        border-radius: 15px;
        padding: 20px;
        margin-top: 15px;
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #333;
    }

    a.acessar-btn {
    background-color: #3d7182;
    font-size: 80%;
    color: white;
    border: none;
    border-radius: 20px;
    padding: 10px 30px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    margin: 10px auto;
    margin-left: 10%;
    display: block;
    width: 30%;
    text-align: center;
    text-decoration: none;
    }

    a.acessar-btn:hover {
        background-color: #44869b;
    }


    @media (max-width: 768px) {
        .containerUM {
            flex-direction: column;
            align-items: center;
        }

        .textoUM {
            align-items: center;
            margin: 10px 0;
            width: 100%;
            max-width: none;
        }

        .imagemUM {
            display: none;
        }

        .fotoTexto {
            display: flex;
            align-items: center;
            max-width: 70%;
        }

        button {
            margin: 10px auto;
            margin-left: 10%;
            display: block;
            width: 30%;
            text-align: center;
        }
        .fotoPC {
            display: none;
        }

        .textoDOIS {
            padding: 15px;
        }
      }

  </style>

</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMSM247H"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="containerLogo">
        <img src="{{ asset('backend/assets/img/logoInicio.png')}}" class="logo">
    </div>
    <div class="containerUM">
        <div class="textoUM">
            <img src="{{ asset('backend/assets/img/fotoTexto.png')}}" class="fotoTexto"><br>
            <a href="{{ route('login')}}" class="acessar-btn">ACESSAR</a>
        </div>
        <div class="imagemUM">
            <img src="{{ asset('backend/assets/img/fotoMedica.png')}}" class="fotoMedica">
        </div>
    </div>
    <div class="containerDOIS">
        <div class="imagemDOIS">
            <img src="{{ asset('backend/assets/img/fotoPC.png')}}" class="fotoPC">
        </div>
        <div class="textoDOIS">
            <div class="card">
                <div class="titulo">Sobre nós</div>
                <p>Fale sobre as características mais importantes deste produto ou serviço. Destacar as mais populares funciona também! Fale sobre as características mais importantes deste produto
                ou serviço.
                Fale sobre as características mais importantes deste produto ou serviço. Destacar as mais populares funciona também! Fale sobre as características mais importantes deste produto
                ou serviço.</p>
            </div>
        </div>
    </div>
    <div class="containerTRES">
        <p class="tituloDOIS">Principais Recursos</p>
        <div class="bolaCard">
            <img src="{{ asset('backend/assets/img/fotoBolaUM.png')}}" class="bola">
            <div class="textoBola">Escreva uma característica essencial do aplicativo que está sendo anunciado.</div>
        </div>
        <div class="bolaCard">
            <img src="{{ asset('backend/assets/img/fotoBolaDOIS.png')}}" class="bola">
            <div class="textoBola">Escreva uma característica essencial do aplicativo que está sendo anunciado.</div>
        </div>
        <div class="bolaCard">
            <img src="{{ asset('backend/assets/img/fotoBolaTRES.png')}}" class="bola">
            <div class="textoBola">Escreva uma característica essencial do aplicativo que está sendo anunciado.</div>
        </div>
    </div>
    <div class="containerQUATRO">
        <p class="tituloDOIS">
            Contato
        </p>
    </div>
    <script>
    </script>
</body>
</html>
