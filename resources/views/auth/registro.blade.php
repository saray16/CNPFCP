<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - CENAMEC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5.3 + Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: rgb(103, 140, 163);
            --light: #f8f9fa;
            --dark: #343a40;
            --success: #28a745;
        }

        body {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--dark);
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .register-container {
            width: 100%;
            max-width: 500px;
        }

        .register-card {
            background-color: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            animation: fadeInUp 0.8s ease-out;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            text-align: center;
            padding: 30px 20px;
            border-bottom: none;
        }

        .card-header h1 {
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 28px;
        }

        .card-header p {
            opacity: 0.9;
            margin: 0;
            font-size: 16px;
        }

        .logo-icon {
            font-size: 48px;
            margin-bottom: 15px;
            display: block;
        }

        .card-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s;
            width: 100%;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.2rem rgba(103, 140, 163, 0.25);
        }

        .input-with-icon {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .input-with-icon .icon {
            background-color: #f8f9fa;
            border: 2px solid #e1e5e9;
            border-right: none;
            padding: 12px 15px;
            border-radius: 8px 0 0 8px;
            display: flex;
            align-items: center;
            color: var(--accent);
        }

        .input-with-icon input {
            border-radius: 0 8px 8px 0;
            flex: 1;
            border-left: none;
        }

        .password-toggle {
            cursor: pointer;
            background: #f8f9fa;
            border: 2px solid #e1e5e9;
            border-left: none;
            padding: 0 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: var(--accent);
        }

        .btn-register {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .login-link a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: var(--primary);
        }

        .company-footer {
            background: rgba(0, 0, 0, 0.2);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .company-info {
            max-width: 800px;
            margin: 0 auto;
        }

        .company-info h3 {
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 22px;
        }

        .company-info p {
            margin-bottom: 15px;
            opacity: 0.9;
            line-height: 1.5;
        }

        .contact-details {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px 0;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contact-item i {
            font-size: 18px;
        }

        .copyright {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            opacity: 0.8;
        }

        @keyframes fadeInUp {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        .alert {
            border-radius: 8px;
            border: none;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .invalid-feedback {
            display: block;
            margin-top: 5px;
            color: #dc3545;
            font-size: 14px;
        }

        .password-strength {
            height: 5px;
            background-color: #eee;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 5px;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s, background-color 0.3s;
        }

        .strength-0 { width: 20%; background-color: #e74c3c; }
        .strength-1 { width: 40%; background-color: #f39c12; }
        .strength-2 { width: 60%; background-color: #f1c40f; }
        .strength-3 { width: 80%; background-color: #2ecc71; }
        .strength-4 { width: 100%; background-color: #27ae60; }

        @media (max-width: 768px) {
            .contact-details {
                flex-direction: column;
                gap: 10px;
            }
            
            .company-info {
                padding: 0 10px;
            }
        }
    </style>
</head>
<body>

<div class="main-content">
    <div class="register-container">
        <div class="register-card">
            <div class="card-header">
                <i class="bi bi-person-plus logo-icon"></i>
                <h1>Registro de Usuario</h1>
                <p></p>
            </div>
            
            <div class="card-body">
                <!-- Mostrar errores si existen -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('registro.submit') }}" method="POST" id="registerForm">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <div class="input-with-icon">
                            <span class="icon"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required
                                   value="{{ old('name') }}" placeholder="Ingrese su nombre completo">
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <div class="input-with-icon">
                            <span class="icon"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required
                                   value="{{ old('email') }}" placeholder="Ingrese su correo electrónico">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-with-icon">
                            <span class="icon"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required
                                   placeholder="Cree una contraseña segura">
                            <span class="password-toggle" id="togglePassword">
                                <i class="bi bi-eye" id="eyeIcon"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="password-strength mt-2">
                            <div class="strength-bar" id="strengthBar"></div>
                        </div>
                        <small class="text-muted" id="passwordHint">La contraseña debe tener al menos 8 caracteres</small>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <div class="input-with-icon">
                            <span class="icon"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required
                                   placeholder="Repita la contraseña">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-register">
                        <i class="bi bi-person-plus me-2"></i>Registrarse
                    </button>
                </form>

                <div class="login-link">
                    <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Información de la empresa en el footer -->
<div class="company-footer">
    <div class="company-info">
        <h3>CENAMEC</h3>
        <p>Centro Nacional de Mejoramiento Profesional</p>
        
        <div class="contact-details">
            <div class="contact-item">
                <i class="bi bi-geo-alt"></i>
                <span>Parroquia Altagracia, Esquina de Salas, Edificio Salas MPPS: 460-5</span>
            </div>
            <div class="contact-item">
                <i class="bi bi-geo-alt"></i>
                <span>Zona Postal 1000, Municipio Libertador Caracas-Venezuela</span>
            </div>
        </div>
        
        <div class="contact-details">
            <div class="contact-item">
                <i class="bi bi-telephone"></i>
                <span>+58 212 5638244</span>
            </div>
            <div class="contact-item">
                <i class="bi bi-telephone"></i>
                <span>+58 212 5648030</span>
            </div>
            <div class="contact-item">
                <i class="bi bi-telephone"></i>
                <span>+58 212 5640323</span>
            </div>
            <div class="contact-item">
                <i class="bi bi-envelope"></i>
                <span>info@cenamec.org.ve</span>
            </div>
        </div>
        
        <div class="copyright">
            <p>© 2025 CENAMEC. Todos los derechos reservados</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Toggle para mostrar/ocultar contraseña
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        }
    });
    
    // Indicador de fortaleza de contraseña
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const strengthBar = document.getElementById('strengthBar');
        const passwordHint = document.getElementById('passwordHint');
        
        let strength = 0;
        
        if (password.length >= 8) strength++;
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
        if (password.match(/\d/)) strength++;
        if (password.match(/[^a-zA-Z\d]/)) strength++;
        
        strengthBar.className = 'strength-bar strength-' + strength;
        
        // Mensajes de ayuda
        const hints = [
            'Muy débil',
            'Débil',
            'Moderada',
            'Fuerte',
            'Muy fuerte'
        ];
        
        passwordHint.textContent = 'Fortaleza: ' + hints[strength];
        passwordHint.style.color = strength >= 3 ? '#28a745' : (strength >= 2 ? '#ffc107' : '#dc3545');
    });
</script>
</body>
</html>