<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Certificado de Curso</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', serif;
        }
        .certificate-container {
            position: relative;
            width: 100%;
            height: 100vh;
        }
        .certificate-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .text-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
        }
        .document-number {
            position: absolute;
            top: 38%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            text-align: center;
            width: 80%;
        }
        .recipient-name {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            width: 80%;
        }
        .program-name {
            position: absolute;
            top: 58%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            width: 80%;
        }
        .facilitator-name {
            position: absolute;
            top: 64%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 18px;
            text-align: center;
            width: 80%;
        }
        .duration {
            position: absolute;
            top: 69%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            text-align: center;
            width: 80%;
        }
        .verification-code {
            position: absolute;
            bottom: 15%;
            left: 50%;
            transform: translateX(-50%);
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            text-align: center;
            width: 100%;
        }
        .qr-code {
            position: absolute;
            bottom: 10%;
            right: 5%;
            width: 80px;
            height: 80px;
        }
        .qr-code img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Certificado de Curso</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', serif;
        }
        .certificate-container {
            position: relative;
            width: 100%;
            height: 100vh;
        }
        .certificate-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .text-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
        }
        .document-number {
            position: absolute;
            top: 38%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            text-align: center;
            width: 80%;
        }
        .recipient-name {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            width: 80%;
        }
        .program-name {
            position: absolute;
            top: 58%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            width: 80%;
        }
        .facilitator-name {
            position: absolute;
            top: 64%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 18px;
            text-align: center;
            width: 80%;
        }
        .duration {
            position: absolute;
            top: 69%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            text-align: center;
            width: 80%;
        }
        .verification-code {
            position: absolute;
            bottom: 15%;
            left: 50%;
            transform: translateX(-50%);
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            text-align: center;
            width: 100%;
        }
        .qr-code {
            position: absolute;
            bottom: 10%;
            right: 5%;
            width: 80px;
            height: 80px;
        }
        .qr-code img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    @php
        use SimpleSoftwareIO\QrCode\Facades\QrCode;

        $path = public_path('images/Plantilla.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $qrCodeBase64 = base64_encode(QrCode::format('png')->size(150)->generate(url('/verificar/' . $codigo_verificacion)));
    @endphp

    <div class="certificate-container">
        <img src="{{ $base64 }}" class="certificate-image" alt="Plantilla de Certificado">
        <div class="text-overlay">
            <div class="document-number">Cédula Nro. {{ $inscripcion->documento_completo }}</div>
            <div class="recipient-name">{{ strtoupper($inscripcion->nombre) }}</div>
            <div class="program-name">{{ $inscripcion->curso ?? 'Curso' }}</div>
            <div class="facilitator-name">Facilitador: {{ $inscripcion->facilitador->nombre ?? 'No asignado' }}</div>
            <div class="duration">Duración: {{ $inscripcion->duracion ?? 'N/A' }} horas</div>
            <div class="verification-code">
                Código de verificación: {{ $codigo_verificacion }} | Emitido el: {{ $fecha_emision }}
            </div>
            <div class="qr-code">
                <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="Código QR">
            </div>
        </div>
    </div>
</body>
</html>

    <div class="certificate-container">
        <img src="{{ $base64 }}" class="certificate-image" alt="Plantilla de Certificado">
        <div class="text-overlay">
            <div class="document-number">Cédula Nro. {{ $inscripcion->documento_completo }}</div>
            <div class="recipient-name">{{ strtoupper($inscripcion->nombre) }}</div>
            <div class="program-name">{{ $inscripcion->curso ?? 'Curso' }}</div>
            <div class="facilitator-name">Facilitador: {{ $inscripcion->facilitador->nombre ?? 'No asignado' }}</div>
            <div class="duration">Duración: {{ $inscripcion->duracion ?? 'N/A' }} horas</div>
            <div class="verification-code">
                Código de verificación: {{ $codigo_verificacion }} | Emitido el: {{ $fecha_emision }}
            </div>
            <div class="qr-code">
                <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="Código QR">
            </div>
        </div>
    </div>
</body>
</html>