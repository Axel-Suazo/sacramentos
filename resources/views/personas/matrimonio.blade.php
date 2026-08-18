    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Certificado de Matrimonio</title>

    <style>

    body {
      font-family: "Times New Roman", serif;
      margin: 0;
      padding: 0;
      background: #ccc;
    }

    /* HOJA */
    .hoja {
      width: 21cm;
      height: 29.7cm;
      margin: auto;
      background: white;
      padding: 2cm;
      box-sizing: border-box;
    }

    /* ENCABEZADO */
    .encabezado {
      text-align: center;
      margin-bottom: 15px;
    }

    .encabezado table {
      width: 100%;
    }

    .encabezado img {
      height: 80px;
    }

    .encabezado h1 {
      font-size: 18pt;
      margin: 0;
      font-weight: bold;
    }

    .encabezado h2 {
      font-size: 14pt;
      margin: 2px 0;
      color: #8b0000;
    }

    .encabezado p {
      font-size: 11pt;
      margin: 4px 0;
      font-style: italic;
    }

    /* CONTENIDO */
    .contenido {
      margin-top: 25px;
      font-size: 13pt;
      text-align: justify;
      line-height: 1.8;
    }

    .no-justify {
      text-align: left;
    }

    /* LÍNEA */
    .linea-inline {
      display: inline-block;
      min-width: 150px;
      border-bottom: 1px solid #000;
    }

    /* FIRMA */
    .firma {
      text-align: center;
      margin-top: 70px;
    }

    .linea-firma {
      border-top: 1px solid #000;
      width: 300px;
      margin: 0 auto 5px auto;
    }



    /* PRINT */
    @media print {
      body { background: white; }

      @page {
        size: A4;
        margin: 0;
      }

      .hoja {
        width: 100%;
        margin: 0;
        padding: 2cm;
      }
    }

    </style>
    </head>

    @php
    \Carbon\Carbon::setLocale('es');
    $fecha = \Carbon\Carbon::parse($sacramento->fecha_sacramento);
    $hoy = now('America/Tegucigalpa');
    @endphp

    <body>

    <div class="hoja">

    <!-- ENCABEZADO -->
    <div class="encabezado">
      <table>
        <tr>
          <td align="left" style="padding-left:20px;">
            <img src="{{ asset('images/escudo_izquier.jpeg') }}">
          </td>

          <td align="center">
            <h1>DIÓCESIS DE COMAYAGUA</h1>
            <p><strong>HONDURAS, C.A.</strong></p>
            <h2>CERTIFICADO DE MATRIMONIO</h2>
            <p>DE ACUERDO A LAS ORDENANZAS DE NUESTRO SEÑOR JESUCRISTO SEGÚN EL EVANGELIO DE SAN MATEO: 28:18-20</p>
          </td>

          <td align="right" style="padding-right:20px;">
            <img src="{{ asset('images/escudo_dere.jpeg') }}">
          </td>
        </tr>
      </table>
    </div>

    <!-- CONTENIDO -->
    <div class="contenido">


    <p>
    El suscrito Párroco _____________________________, 
    <strong>CERTIFICA:</strong> Que en el libro No. 
    <strong>{{ $sacramento->libro }}</strong>, 
    Folio No. <strong>{{ $sacramento->folio }}</strong>, 
    N° <strong>{{ $sacramento->partida }}</strong>, 
    se registra un matrimonio entre 
    <strong>{{ $sacramento->conyuge1 }}</strong> y 
    <strong>{{ $sacramento->conyuge2 }}</strong>, 
    celebrado en la iglesia de 
    <strong>{{ $sacramento->lugar }}</strong>, 
    con fecha 
    <strong>{{ $fecha->format('d') }}</strong> días del mes de 
    <strong>{{ ucfirst($fecha->translatedFormat('F')) }}</strong> del año 
    <strong>{{ $fecha->format('Y') }}</strong>.
    </p>


    <p>
    Dicho matrimonio fue celebrado conforme a las normas establecidas por la Santa Iglesia Católica, 
    quedando debidamente registrado en los libros parroquiales correspondientes.
    </p>

    <p>
    Fueron testigos del acto 
    <strong>{{ $sacramento->padrino1 }}</strong> y 
    <strong>{{ $sacramento->padrino2 }}</strong>, 
    a quienes se les informó sobre su responsabilidad dentro del sacramento celebrado.
    </p>

    <p>
    Es conforme al original y para los efectos que se deseen y que en derecho correspondan, 
    se extiende la presente certificación.
    </p>

    <p>
    En Parroquia Nuestra Señora del Carmen, a los 
    <strong>{{ $hoy->format('d') }}</strong> días del mes de 
    <strong>{{ ucfirst($hoy->translatedFormat('F')) }}</strong> del año 
    <strong>{{ $hoy->format('Y') }}</strong>.
    </p>
    
    </div>

    <!-- FIRMA -->
    <div class="firma">
      <div class="linea-firma"></div>
      <p><strong>{{ $sacramento->ministro }}</strong></p  >
      <p><strong>SACERDOTE</strong></p>
    </div>

    </div>

    </body>
    </html>