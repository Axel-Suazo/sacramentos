<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Constancia de Sacramentos</title>
<style>
    body {
        font-family: "Times New Roman", serif;
        margin: 0;
        padding: 0;
        background: #fff;
    }

    .pagina {
        width: 21cm;
        height: 29.7cm;
        padding: 2.5cm;
        box-sizing: border-box;
        border: 3px double #000;
        margin: 0 auto;
    }

    .titulo {
        text-align: center;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .titulo h1 {
        font-size: 22pt;
        margin: 0;
        text-transform: uppercase;
        font-weight: bold;
    }

    .titulo h2 {
        font-size: 14pt;
        margin: 5px 0;
        letter-spacing: 1px;
        font-weight: normal;
    }

    hr {
        border: none;
        border-top: 2px solid #000;
        width: 70%;
        margin: 10px auto 25px auto;
    }

    .datos {
        width: 80%;
        margin: 0 auto;
        font-size: 13pt;
        line-height: 1.8;
        text-align: left;
    }

    .tabla {
        width: 90%;
        margin: 50px auto;
        border-collapse: collapse;
        font-size: 13pt;
        text-align: center;
    }

    .tabla thead {
        background: #f5f5f5;
    }

    .tabla th, .tabla td {
        padding: 10px;
    }

    .tabla th {
        border-bottom: 2px solid #000;
        text-transform: uppercase;
    }

    .tabla td {
        border-bottom: 1px solid #ccc;
    }

    .tabla tr:last-child td {
        border-bottom: none;
    }

    .firma {
        margin-top: 80px;
        text-align: center;
    }

    .firma-linea {
        border-top: 1px solid #000;
        width: 40%;
        margin: 0 auto 5px auto;
    }

    .firma p {
        margin: 0;
        font-size: 13pt;
    }

    .pie {
        text-align: center;
        margin-top: 25px;
        font-style: italic;
        font-size: 11pt;
    }
</style>
</head>
<body>
    <div class="pagina">
        <div class="titulo">
            <h1>Parroquia Nuestra Señora del Carmen</h1>
            <h2>Constancia de Sacramentos</h2>
            <hr>
        </div>

        <div class="datos">
            <p><strong>Nombre:</strong> {{ $persona->nombres }} {{ $persona->apellidos }}</p>
            <p><strong>DNI:</strong> {{ $persona->documento_unico ?? '—' }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ $persona->fecha_nacimiento ?? '—' }}</p>
        </div>

        <table class="tabla">
            <thead>
                <tr>
                    <th>Tipo de Sacramento</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Parroquia</th>
                    <th>Ministro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($persona->sacramentos as $s)
                <tr>
                    <td>{{ $s->tipo?->nombre ?? '—' }}</td>
                    <td>{{ $s->fecha_sacramento ? \Carbon\Carbon::parse($s->fecha_sacramento)->format('d/m/Y') : '—' }}</td>
                    <td>{{ $s->lugar ?? '—' }}</td>
                    <td>{{ $s->parroquia ?? '—' }}</td>
                    <td>{{ $s->ministro ?? '—' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="firma">
            <div class="firma-linea"></div>
            <p><strong>P.</strong> ____________________________</p>
            <p><em>Párroco</em></p>
        </div>

        <div class="pie">
            “Doy fe de los sacramentos recibidos según constan en los libros parroquiales.”
        </div>
    </div>
</body>
</html>
