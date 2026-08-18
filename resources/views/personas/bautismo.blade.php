    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Certificado de Bautismo</title>

    <style>

      body {
        font-family: "Times New Roman", serif;
        margin: 0;
        padding: 0;
        background: #ccc;
      }

      /* HOJA REAL */
      .hoja {
        width: 21cm;
        height: 29.7cm; /* 🔥 CAMBIO CLAVE */
        margin: auto;
        background: white;
        padding: 2cm; /* 🔥 bajamos un poco */
        box-sizing: border-box;
        overflow: hidden; /* 🔥 evita que salte a otra hoja */
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
        text-transform: uppercase;
      }

      .encabezado h2 {
        font-size: 14pt;
        margin: 2px 0;
        color: #003366;
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
        line-height: 1.7;
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

      /* OBSERVACIONES */
      .observaciones {
        margin-top: 40px;
        font-size: 12pt;
      }

      .linea {
        border-bottom: 1px solid black;
        height: 20px;
        margin-bottom: 8px;
      }

      /* PIE */
      .pie {
        text-align: center;
        font-size: 11pt;
        font-style: italic;
        margin-top: 40px;
      }

      /* IMPRESIÓN */
      @media print {
        body {
          background: white;
        }
      
            @page {
          size: A4; 
          margin: 0;
        }
          
        .hoja {
          margin: 0;
          width: 100%;
          padding: 2cm;
        }

        .linea-pro {
        display: inline-block;  
        width: 320px;
        border-bottom: 1px solid #000;
        position: relative;
        top: -3px;
      }


      }

    </style>
    </head>

    <body>

    <div class="hoja">

      <!-- ENCABEZADO -->
      <div class="encabezado">
        <table>
          <tr>
            <td align="left" style="padding-left: 20px;">
              <img src="{{ asset('images/escudo_izquier.jpeg') }}">
            </td>

            <td align="center">
              <h1>Diócesis de Comayagua</h1>
              <p class="subtitulo-pais">HONDURAS, C.A.</p>
              <h2>CERTIFICADO DE BAUTISMO</h2>
              <p>DE ACUERDO A LAS ORDENANZAS DE NUESTRO SEÑOR JESUCRISTO SEGÚN EL EVANGELIO DE SAN MATEO: 28:18-20</p>
            </td>

            <td align="right" style="padding-right: 20px;">
              <img src="{{ asset('images/escudo_dere.jpeg') }}">
            </td>
          </tr>
        </table>
      </div>

      <!-- CONTENIDO -->
      <div class="contenido">

        <p>
        El suscrito Párroco
          _____________________________,
         certifica que en el libro No. 
          <strong>{{ $sacramento->libro ?? '____' }}</strong>
          donde se hallan inscritas las partidas de Bautismos celebrados en el año 
          <strong>{{ \Carbon\Carbon::parse($sacramento->fecha_sacramento)->year ?? '____' }}</strong>,
          Folio No. <strong>{{ $sacramento->folio ?? '____' }}</strong>,
          N° <strong>{{ $sacramento->partida ?? '____' }}</strong>,
          se registra una partida que a la letra dice así:
        </p>

        <p>
          En la Parroquia <strong>{{ $sacramento->parroquia ?? '____' }}</strong>, de 
          <strong>{{ $sacramento->lugar ?? '____' }}</strong>,
          Yo, el Presbítero <strong>{{ $sacramento->ministro ?? '____' }}</strong>,
          bauticé solemnemente un(a) niño(a) que nació en 
          <strong>{{ $persona->lugar_nacimiento ?? '____' }}</strong>
          el día <strong>{{ \Carbon\Carbon::parse($persona->fecha_nacimiento)->format('d/m/Y') ?? '____' }}</strong>,
          a quien se le puso el nombre de 
          <strong>{{ $persona->nombres }} {{ $persona->apellidos }}</strong>,
          hijo(a) legítimo/natural de 
          <strong>{{ $sacramento->padre ?? '____' }}</strong>
          y de <strong>{{ $sacramento->madre ?? '____' }}</strong>.
        </p>

        <p>
          Fueron sus padrinos 
          <strong>{{ $sacramento->padrino1 ?? '____' }}</strong> y 
          <strong>{{ $sacramento->padrino2 ?? '____' }}</strong>,
          a quienes advertí de su obligación y parentesco espiritual.
        </p>

        <p>
          Al margen se lee: <strong>{{ $sacramento->notas ?? 'Ninguna' }}</strong>.
        </p>

        <p>
          Es conforme al original y para los efectos que se deseen y que en derecho correspondan,
          se extiende la presente certificación.
        </p>

        @php
          \Carbon\Carbon::setLocale('es');
          $mes = ucfirst(now()->translatedFormat('F'));
        @endphp

      
        @php
        $hoy = now('America/Tegucigalpa');
        @endphp


            <p>
          En <strong>{{ $sacramento->parroquia ?? '____' }}</strong>, a los 
          <strong>{{ $hoy->format('d') }}</strong>
          días del mes de 
          <strong>{{ ucfirst($hoy->translatedFormat('F')) }}</strong>
          del año 
          <strong>{{ $hoy->year }}</strong>.
          </p>
      
      </div>

      <!-- FIRMA -->
      <div class="firma">
        <div class="linea-firma"></div>
        <p>PÁRROCO RESPONSABLE</p>
        <p><em>(Sello)</em></p>
      </div>

      <!-- OBSERVACIONES -->
      <div class="observaciones">
        <strong>OBSERVACIONES:</strong> 
        <div class="linea"></div>
        <div class="linea"></div>
        <div class="linea"></div>
      </div>

      <!-- PIE --> 
      <div class="pie">
        “La familia que ora unida, se mantiene unida”
      </div>

    </div>

    </body> 
    </html>

      