@extends('layouts.app') 
@section('title', 'Quiénes Somos - CENAMEC') 
@section('content')

<!-- Hero Section -->
<section class="hero-about py-7 position-relative overflow-hidden">
	<div class="container position-relative z-index-1">
		<div class="row align-items-center">
			<div class="col-lg-6 pe-lg-5">
				<h1 class="display-4 fw-bold mb-4 text-white">Transformando la educación científica en Venezuela</h1>
				<p class="lead mb-5 text-white opacity-75">
					Líderes en innovación educativa e investigación científica para el desarrollo nacional
				</p>

				<!-- Estadísticas destacadas -->
				<div class="d-flex flex-wrap stats-wrapper">
					<div class="stat-card me-3 mb-3">
						<div class="stat-number display-5 fw-bold text-white mb-1">35+</div>
						<div class="stat-label text-white opacity-85">Años de experiencia</div>
					</div>
					<div class="stat-card mb-3">
						<div class="stat-number display-5 fw-bold text-white mb-1">50K+</div>
						<div class="stat-label text-white opacity-85">Docentes formados</div>
					</div>
					<div class="stat-card ms-3 mb-3">
						<div class="stat-number display-5 fw-bold text-white mb-1">24</div>
						<div class="stat-label text-white opacity-85">Estados cubiertos</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mt-5 mt-lg-0">
				<div class="position-relative">
					<div class="modern-img-frame">
						<div class="frame-decoration"></div>
						<div class="img-wrapper rounded-4 overflow-hidden shadow-lg">
							<img src="" alt="Equipo CENAMEC" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Formas decorativas -->
	<div class="hero-shape-1"></div>
	<div class="hero-shape-2"></div>
	<div class="geometric-pattern"></div>
</section>

<!-- Sección Sobre CENAMEC con diseño modular -->
<section class="py-7 bg-white">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 pe-lg-5">
				<!-- Encabezado con acento decorativo -->
				<div class="section-header mb-5">
					<div class="d-flex align-items-center mb-3">
						<div class="divider-line"></div>
						<span class="section-badge">Nuestra Historia</span>
					</div>
					<h2 class="display-5 fw-bold mb-4 text-dark">
            Innovación educativa desde <span class="text-highlight">1985</span>
          </h2>
					<p class="lead text-muted mb-4 position-relative">
						<span class="quote-mark">"</span>El Centro Nacional para el Mejoramiento de la Enseñanza de la Ciencia (CENAMEC) es una institución venezolana dedicada a la investigación y formación docente en el área científica, contribuyendo al desarrollo educativo del país.
					</p>
				</div>

				<!-- Áreas principales en tarjetas superpuestas -->
				<div class="areas-wrapper mb-5">
					<div class="area-card area-card-1">
						<div class="icon-box bg-primary-soft">
							<i class="fas fa-atom text-primary"></i>
						</div>
						<h5>Ciencias Exactas</h5>
						<p class="small">Programas especializados</p>
					</div>
					<div class="area-card area-card-2">
						<div class="icon-box bg-primary-soft">
							<i class="fas fa-chalkboard-teacher text-primary"></i>
						</div>
						<h5>Formación Docente</h5>
						<p class="small">Actualización continua</p>
					</div>
				</div>

				<!-- Misión en panel destacado -->
				<div class="mission-panel">
					<div class="panel-header">
						<h4>Nuestra Misión</h4>
						<div class="icon-wrapper">
							<i class="fas fa-bullseye"></i>
						</div>
					</div>
					<div class="panel-body">
						<p>
							Fortalecer el Subsistema de Educación Básica mediante investigación aplicada, desarrollo curricular y formación permanente de los profesionales de la educación, con énfasis en las áreas científicas y tecnológicas.
						</p>
					</div>
				</div>
			</div>

			<!-- Valoraciones y Valores en diseño de pestañas -->
			<div class="col-lg-6 mt-5 mt-lg-0">
				<div class="values-tabs">
					<!-- Imagen de fondo -->
					<div class="values-image">
						<img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Laboratorio CENAMEC">
					</div>

					<!-- Contenido de pestañas -->
					<div class="tabs-content">
						<div class="tab-header">
							<h5>Nuestros Valores</h5>
						</div>

						<ul class="values-list">
							<li>
								<div class="value-item">
									<div class="value-icon">
										<i class="fas fa-check"></i>
									</div>
									<div class="value-text">
										<h6>Excelencia académica</h6>
										<p>Compromiso con la calidad educativa</p>
									</div>
								</div>
							</li>
							<li>
								<div class="value-item">
									<div class="value-icon">
										<i class="fas fa-check"></i>
									</div>
									<div class="value-text">
										<h6>Innovación pedagógica</h6>
										<p>Métodos de enseñanza vanguardistas</p>
									</div>
								</div>
							</li>
							<li>
								<div class="value-item">
									<div class="value-icon">
										<i class="fas fa-check"></i>
									</div>
									<div class="value-text">
										<h6>Compromiso social</h6>
										<p>Educación accesible para todos</p>
									</div>
								</div>
							</li>
							<li>
								<div class="value-item">
									<div class="value-icon">
										<i class="fas fa-check"></i>
									</div>
									<div class="value-text">
										<h6>Integridad profesional</h6>
										<p>Ética en todas nuestras acciones</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Sección Programas de Formación con diseño de timeline -->
<section class="py-4 bg-light-gradient">
	<div class="container">
		<!-- Encabezado con logo integrado -->
		<div class="section-intro text-center mb-100">
			<div class="logo-badge mb-7 text-center">
				<img src="{{ asset('images/logito.png') }}" alt="Logo CNPFCP" height="200" class="mb-10">
				<div class="d-flex flex-column">
					<span class="fw-bold text-dark text-primary mb-1 fs-4">COORDINACIÓN NACIONAL</span>
					<span class="text-muted fs-5">Programas de Formación Continua y Permanente</span>
				</div>
			</div>
			<p class="lead mx-auto text-dark opacity-75" style="max-width: 700px;">
				La CNPFCP es el brazo ejecutor de los programas de formación docente de CENAMEC, diseñando e implementando estrategias de capacitación para educadores en todo el territorio nacional.
			</p>
		</div>

		<!-- Contenido en dos columnas con timeline visual -->
		<div class="row g-4 mb-6">
			<div class="col-lg-6">
				<!-- Tarjeta con diseño de línea de tiempo -->
				<div class="timeline-card">
					<div class="timeline-header">
						<div class="timeline-icon">
							<i class="fas fa-history"></i>
						</div>
						<div class="timeline-title">
							<h3>Origen y Propósito</h3>
							<small>Desde 2020</small>
						</div>
					</div>
					<div class="timeline-body">
						<p>
							Creada a partir de la transferencia de programas de formación desde los Programas No Conducentes a Grado a la Universidad Nacional del Magisterio "Samuel Robinson" (UNEMSR), la CNPFCP representa el compromiso de CENAMEC con la formación continua.
						</p>

						<!-- Panel destacado -->
						<div class="highlight-panel">
							<div class="panel-icon">
								<i class="fas fa-bullseye"></i>
							</div>
							<div class="panel-content">
								<h5>Nuestro Propósito Fundamental</h5>
								<p>
									Diseñar e implementar programas de formación que respondan a las necesidades actuales del Subsistema de Educación Básica, fortaleciendo las competencias profesionales de los educadores venezolanos.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<!-- Tarjeta con diseño de red organizacional -->
				<div class="network-card">
					<div class="network-header">
						<div class="network-icon">
							<i class="fas fa-network-wired"></i>
						</div>
						<div class="network-title">
							<h3>Gestión Formativa</h3>
							<small>Red Nacional</small>
						</div>
					</div>
					<div class="network-body">
						<p>
							Nuestra gestión se desarrolla mediante una estructura articulada a nivel nacional:
						</p>

						<!-- Nodos de red -->
						<div class="network-nodes">
							<div class="node-row">
								<div class="node-item">
									<div class="node-icon">
										<i class="fas fa-university"></i>
									</div>
									<h6>Dirección General</h6>
									<p>Investigación y Formación del CENAMEC</p>
								</div>
								<div class="node-item">
									<div class="node-icon">
										<i class="fas fa-map-marked-alt"></i>
									</div>
									<h6>Zonas Educativas</h6>
									<p>División de Investigación en cada estado</p>
								</div>
							</div>
							<div class="node-row">
								<div class="node-item">
									<div class="node-icon">
										<i class="fas fa-building"></i>
									</div>
									<h6>Centros Regionales</h6>
									<p>(CRIF) en cada región del país</p>
								</div>
								<div class="node-item">
									<div class="node-icon">
										<i class="fas fa-school"></i>
									</div>
									<h6>Centros Locales</h6>
									<p>(CLIF) en comunidades estratégicas</p>
								</div>
							</div>
						</div>

						<!-- Nota al pie -->
						<div class="network-footer">
							<i class="fas fa-info-circle"></i>
							<p>
								Coordinamos una red de más de 1,200 facilitadores locales para garantizar la formación en todo el territorio nacional.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Sección de Certificación con diseño de diploma -->
		<div class="certificate-section mb-6">
			<div class="certificate-card">
				<div class="certificate-content">
					<div class="certificate-header">
						<div class="certificate-icon">
							<i class="fas fa-award"></i>
						</div>
						<div class="certificate-title">
							<h3>Certificación y Reconocimiento</h3>
							<small>Validez Nacional</small>
						</div>
					</div>
					<div class="certificate-body">
						<p>
							La CNPFCP otorga certificaciones avaladas por el Ministerio del Poder Popular para la Educación, reconocidas a nivel nacional e internacional, que acreditan la formación continua de los profesionales de la educación.
						</p>

						<div class="certificate-details">
							<div class="detail-item">
								<div class="detail-icon">
									<i class="fas fa-check-circle"></i>
								</div>
								<div class="detail-text">
									<h6>Certificación Digital</h6>
									<p>Disponible en nuestra plataforma</p>
								</div>
							</div>
							<div class="detail-item">
								<div class="detail-icon">
									<i class="fas fa-clock"></i>
								</div>
								<div class="detail-text">
									<h6>120 Horas académicas</h6>
									<p>Por programa certificado</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="certificate-image">
					<!-- Fondo decorativo -->
				</div>
			</div>
		</div>
		
		

				<!-- Grid de funciones con animaciones -->
				<div class="row g-4 functions-grid">
				<!-- Sección de Funciones Estratégicas - Diseño Profesional Mejorado -->
<section class="functions-section py-7 bg-white">
    <div class="container">
        <div class="section-header text-center mb-7">
            <div class="d-flex align-items-center justify-content-center mb-3">
                <div class="divider-line mx-3"></div>
                <span class="section-badge">Nuestras Competencias</span>
                <div class="divider-line mx-3"></div>
            </div>
            <h2 class="display-5 fw-bold mb-4 text-dark">Funciones Estratégicas</h2>
            <p class="lead mx-auto text-muted" style="max-width: 700px;">
                Áreas de acción especializada para el desarrollo y fortalecimiento del sistema educativo venezolano
            </p>
        </div>

        <!-- Grid de funciones con diseño de tarjetas hexagonales -->
        <div class="functions-grid">
            <div class="row g-5 justify-content-center">
                <!-- Función 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="function-card card border-0 shadow-hover">
                        <div class="card-body p-5 position-relative">
                            <div class="hexagon-wrapper">
                                <div class="hexagon-shape">
                                    <div class="hexagon-inner">
                                        <i class="fas fa-hands-helping"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 text-center text-dark">Apoyo a acciones formativas</h4>
                            <p class="text-secondary mb-4 text-center">
                                Brindamos el apoyo requerido para llevar a cabo las acciones formativas dirigidas a las trabajadoras y los trabajadores en ejercicio del Sistema Educativo Venezolano.
                            </p>
                            <div class="function-tags d-flex flex-wrap justify-content-center">
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Talleres</span>
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Seminarios</span>
                                <span class="badge bg-light text-dark mb-2 px-3 py-2">Diplomados</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Función 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="function-card card border-0 shadow-hover">
                        <div class="card-body p-5 position-relative">
                            <div class="hexagon-wrapper">
                                <div class="hexagon-shape">
                                    <div class="hexagon-inner">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 text-center text-dark">Gestión de programas</h4>
                            <p class="text-secondary mb-4 text-center">
                                Gestionamos los programas de formación articulando con la Dirección General de Investigación y Formación, Zonas Educativas, CRIF y CLIF.
                            </p>
                            <div class="function-tags d-flex flex-wrap justify-content-center">
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Planificación</span>
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Ejecución</span>
                                <span class="badge bg-light text-dark mb-2 px-3 py-2">Seguimiento</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Función 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="function-card card border-0 shadow-hover">
                        <div class="card-body p-5 position-relative">
                            <div class="hexagon-wrapper">
                                <div class="hexagon-shape">
                                    <div class="hexagon-inner">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 text-center text-dark">Articulación interinstitucional</h4>
                            <p class="text-secondary mb-4 text-center">
                                Articulamos acciones formativas con diversos entes como UNEXCA, Escuela Nacional de Fiscales, UNES, CONAPDIS, UNEMSR, entre otros.
                            </p>
                            <div class="function-tags d-flex flex-wrap justify-content-center">
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Alianzas</span>
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Convenios</span>
                                <span class="badge bg-light text-dark mb-2 px-3 py-2">Redes</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Función 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="function-card card border-0 shadow-hover">
                        <div class="card-body p-5 position-relative">
                            <div class="hexagon-wrapper">
                                <div class="hexagon-shape">
                                    <div class="hexagon-inner">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 text-center text-dark">Apoyo institucional</h4>
                            <p class="text-secondary mb-4 text-center">
                                Apoyamos a diferentes organismos y entes del Estado que soliciten acciones formativas para sus trabajadores.
                            </p>
                            <div class="function-tags d-flex flex-wrap justify-content-center">
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Asesoría</span>
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Capacitación</span>
                                <span class="badge bg-light text-dark mb-2 px-3 py-2">Evaluación</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Función 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="function-card card border-0 shadow-hover">
                        <div class="card-body p-5 position-relative">
                            <div class="hexagon-wrapper">
                                <div class="hexagon-shape">
                                    <div class="hexagon-inner">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 text-center text-dark">Gestión de proyectos</h4>
                            <p class="text-secondary mb-4 text-center">
                                Promovemos, organizamos y hacemos seguimiento a proyectos y programas de formación para trabajadores de la educación, familia y comunidad.
                            </p>
                            <div class="function-tags d-flex flex-wrap justify-content-center">
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Promoción</span>
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Organización</span>
                                <span class="badge bg-light text-dark mb-2 px-3 py-2">Seguimiento</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Función 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="function-card card border-0 shadow-hover">
                        <div class="card-body p-5 position-relative">
                            <div class="hexagon-wrapper">
                                <div class="hexagon-shape">
                                    <div class="hexagon-inner">
                                        <i class="fas fa-award"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 text-center text-dark">Certificación</h4>
                            <p class="text-secondary mb-4 text-center">
                                Reconocer y certificar las formaciones realizadas conforme a la evaluación efectuada una vez cumplidos los requerimientos administrativos.
                            </p>
                            <div class="function-tags d-flex flex-wrap justify-content-center">
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Reconocimiento</span>
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Certificación</span>
                                <span class="badge bg-light text-dark mb-2 px-3 py-2">Acreditación</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Función 7 -->
                <div class="col-md-6 col-lg-4 mx-auto">
                    <div class="function-card card border-0 shadow-hover">
                        <div class="card-body p-5 position-relative">
                            <div class="hexagon-wrapper">
                                <div class="hexagon-shape">
                                    <div class="hexagon-inner">
                                        <i class="fas fa-advisor"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 text-center text-dark">Asesoría especializada</h4>
                            <p class="text-secondary mb-4 text-center">
                                Servir de órgano asesor y de consulta en materias de nuestra competencia para instituciones y organismos educativos.
                            </p>
                            <div class="function-tags d-flex flex-wrap justify-content-center">
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Consultoría</span>
                                <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">Asesoramiento</span>
                                <span class="badge bg-light text-dark mb-2 px-3 py-2">Orientación</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</section>

@endsection

@push('styles')
<style>
	:root {
	    --primary-color: #2c3e50;
	    --primary-dark: #1a252f;
	    --primary-light: rgba(44, 62, 80, 0.1);
	    --secondary-color: #678ca3;
	    --accent-color: rgba(27, 54, 88, 0.87);
	    --text-dark: #2c3e50;
	    --text-muted: #6c757d;
	    --light-gray: #f8f9fa;
	    --border-color: #e9ecef;
	    --white: #ffffff;
	    --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
	    --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
	    --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
	    --transition: all 0.3s ease;
	  }
	  
	  /* Estilos generales */
	  body {
	    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	    color: var(--text-dark);
	    line-height: 1.6;
	  }
	  
	  /* Hero Section - Diseño geométrico */
	  .hero-about {
	    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
	    position: relative;
	    overflow: hidden;
	    width: 100vw;
	    margin-left: calc(-50vw + 50%);
	    margin-right: calc(-50vw + 50%);
	    padding-left: calc(50vw - 50%);
	    padding-right: calc(50vw - 50%);
	  }
	  
	  .geometric-pattern {
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background-image: 
	      radial-gradient(circle at 10% 20%, rgba(255,255,255,0.03) 0%, transparent 20%),
	      linear-gradient(135deg, transparent 50%, rgba(74, 137, 220, 0.05) 50%);
	    background-size: 40px 40px;
	    z-index: 0;
	  }
	  
	  .modern-img-frame {
	    position: relative;
	    padding: 15px;
	    background: white;
	    border-radius: 8px;
	    box-shadow: var(--shadow-lg);
	  }
	  
	  .modern-img-frame .img-wrapper {
	    position: relative;
	    overflow: hidden;
	    border-radius: 4px;
	    z-index: 2;
	  }
	  
	  .modern-img-frame .frame-decoration {
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background: linear-gradient(45deg, transparent 65%, rgba(74, 137, 220, 0.2) 100%);
	    z-index: 1;
	    border-radius: 8px;
	  }
	  
	  /* Estadísticas en tarjetas */
	  .stat-card {
	    background: rgba(255, 255, 255, 0.15);
	    backdrop-filter: blur(5px);
	    border-radius: 8px;
	    padding: 20px;
	    min-width: 150px;
	    border: 1px solid rgba(255, 255, 255, 0.2);
	    transition: transform 0.3s ease;
	  }
	  
	  .stat-card:hover {
	    transform: translateY(-5px);
	    background: rgba(255, 255, 255, 0.25);
	  }
	  
	  .stat-number {
	    position: relative;
	    display: inline-block;
	  }
	  
	  .stat-number:after {
	    content: '';
	    position: absolute;
	    bottom: 5px;
	    left: 0;
	    width: 100%;
	    height: 8px;
	    background: rgba(255, 255, 255, 0.3);
	    z-index: -1;
	    border-radius: 4px;
	  }
	  
	  .stat-label {
	    font-size: 14px;
	    font-weight: 500;
	  }
	  
	  /* Sección header con diseño */
	  .section-header {
	    position: relative;
	  }
	  
	  .divider-line {
	    width: 40px;
	    height: 3px;
	    background: var(--accent-color);
	    margin-right: 15px;
	  }
	  
	  .section-badge {
	    font-size: 12px;
	    font-weight: 600;
	    letter-spacing: 1px;
	    text-transform: uppercase;
	    color: var(--accent-color);
	  }
	  
	  .text-highlight {
	    position: relative;
	    display: inline-block;
	    z-index: 1;
	  }
	  
	  .text-highlight:after {
	    content: '';
	    position: absolute;
	    bottom: 5px;
	    left: 0;
	    width: 100%;
	    height: 10px;
	    background: rgba(74, 137, 220, 0.3);
	    z-index: -1;
	    transform: skewX(-15deg);
	  }
	  
	  .text-highlight-white:after {
	    background: rgba(255, 255, 255, 0.3);
	  }
	  
	  .quote-mark {
	    position: absolute;
	    top: -20px;
	    left: -15px;
	    font-size: 60px;
	    color: rgba(74, 137, 220, 0.2);
	    font-family: Georgia, serif;
	    line-height: 1;
	  }
	  
	  /* Áreas de especialización */
	  .areas-wrapper {
	    position: relative;
	    display: flex;
	    margin-left: -15px;
	  }
	  
	  .area-card {
	    background: white;
	    border-radius: 8px;
	    padding: 20px;
	    margin-left: 15px;
	    box-shadow: var(--shadow-sm);
	    transition: all 0.3s ease;
	    width: calc(50% - 15px);
	    position: relative;
	    z-index: 1;
	  }
	  
	  .area-card-1 {
	    transform: rotate(-2deg);
	  }
	  
	  .area-card-2 {
	    transform: rotate(2deg);
	    margin-top: 20px;
	  }
	  
	  .area-card:hover {
	    transform: rotate(0deg) translateY(-5px);
	    box-shadow: var(--shadow-md);
	    z-index: 2;
	  }
	  
	  .icon-box {
	    width: 50px;
	    height: 50px;
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    margin-bottom: 15px;
	    font-size: 20px;
	  }
	  
	  /* Panel de misión */
	  .mission-panel {
	    background: white;
	    border-radius: 8px;
	    box-shadow: var(--shadow-sm);
	    overflow: hidden;
	    border-left: 4px solid var(--accent-color);
	  }
	  
	  .panel-header {
	    background: var(--light-gray);
	    padding: 15px 20px;
	    display: flex;
	    align-items: center;
	    justify-content: space-between;
	    border-bottom: 1px solid var(--border-color);
	  }
	  
	  .panel-header h4 {
	    margin: 0;
	    font-weight: 600;
	  }
	  
	  .icon-wrapper {
	    width: 30px;
	    height: 30px;
	    background: var(--accent-color);
	    color: white;
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 14px;
	  }
	  
	  .panel-body {
	    padding: 20px;
	  }
	  
	  /* Diseño de pestañas para valores */
	  .values-tabs {
	    position: relative;
	    height: 100%;
	    min-height: 500px;
	    border-radius: 8px;
	    overflow: hidden;
	    box-shadow: var(--shadow-lg);
	  }
	  
	  .values-image {
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	  }
	  
	  .values-image img {
	    width: 100%;
	    height: 100%;
	    object-fit: cover;
	  }
	  
	  .values-image:after {
	    content: '';
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background: linear-gradient(to bottom, rgba(44, 62, 80, 0.8) 0%, rgba(44, 62, 80, 0.6) 100%);
	  }
	  
	  .tabs-content {
	    position: relative;
	    z-index: 2;
	    height: 100%;
	    padding: 30px;
	    display: flex;
	    flex-direction: column;
	    justify-content: flex-end;
	    color: white;
	  }
	  
	  .tab-header {
	    margin-bottom: 30px;
	    padding-bottom: 15px;
	    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
	  }
	  
	  .tab-header h5 {
	    font-size: 24px;
	    font-weight: 600;
	    margin: 0;
	    color: white;
	  }
	  
	 /* Lista de Valores - Versión Mejorada */
	.values-list {
	  list-style: none;
	  padding: 0;
	  margin: 0;
	}
	
	.values-list li {
	  margin-bottom: 1.5rem;
	  position: relative;
	  padding-left: 3.5rem; /* Espacio para el icono */
	  transition: all 0.3s ease;
	}
	
	.values-list li:hover {
	  transform: translateX(5px);
	}
	
	.value-item {
	  display: flex;
	  align-items: flex-start;
	}
	
	.value-icon {
	  position: absolute;
	  left: 0;
	  top: 0.2rem;
	  width: 2.5rem;
	  height: 2.5rem;
	  background: var(--accent-color);
	  border-radius: 50%;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	  font-size: 1rem;
	  color: white;
	  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
	}
	
	.value-text {
	  flex: 1;
	  padding-left: 1rem; /* Espacio entre icono y texto */
	}
	
	.value-text h6 {
	  font-size: 1.125rem;
	  font-weight: 600;
	  margin-bottom: 0.5rem;
	  color: var(--text-dark);
	  position: relative;
	  display: inline-block;
	}
	
	.value-text h6:after {
	  content: '';
	  position: absolute;
	  bottom: -2px;
	  left: 0;
	  width: 2rem;
	  height: 2px;
	  background: var(--accent-color);
	  transition: width 0.3s ease;
	}
	
	.values-list li:hover .value-text h6:after {
	  width: 100%;
	}
	
	.value-text p {
	  font-size: 0.875rem;
	  color: var(--text-muted);
	  line-height: 1.5;
	  margin: 0;
	}
	
	/* Versión para fondo oscuro */
	.values-tabs .values-list li {
	  padding-left: 3.5rem;
	}
	
	.values-tabs .value-icon {
	  background: white;
	  color: var(--accent-color);
	  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	}
	
	.values-tabs .value-text h6 {
	  color: white;
	}
	
	.values-tabs .value-text p {
	  color: rgba(255,255,255,0.8);
	}
	
	.values-tabs .value-text h6:after {
	  background: white;
	}
	  
	  /* Logo badge */
	  .logo-badge {
	    display: inline-flex;
	    align-items: center;
	    background: white;
	    padding: 10px 20px;
	    border-radius: 50px;
	    box-shadow: var(--shadow-sm);
	  }
	  
	  .logo-badge img {
	    margin-right: 15px;
	  }
	  
	  .logo-badge span {
	    font-weight: 600;
	    color: var(--primary-color);
	    text-transform: uppercase;
	    letter-spacing: 1px;
	    font-size: 14px;
	  }
	  
	  /* Tarjeta de timeline */
	  .timeline-card {
	    background: white;
	    border-radius: 20px;
	    box-shadow: var(--shadow-sm);
	    overflow: hidden;
	    height: 100%;
	    position: relative;
	    padding: 50px;
	  }
	  
	  .timeline-card:before {
	    content: '';
	    position: absolute;
	    top: 0;
	    left: 30px;
	    width: 3px;
	    height: 100%;
	    background: var(--accent-color);
	  }
	  
	  .timeline-header {
	    display: flex;
	    align-items: center;
	    margin-bottom: 20px;
	    position: relative;
	  }
	  
	  .timeline-icon {
	    width: 50px;
	    height: 50px;
	    background: var(--accent-color);
	    color: white;
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 20px;
	    margin-right: 20px;
	    flex-shrink: 0;
	  }
	  
	  .timeline-title h3 {
	    margin: 0 0 5px 0;
	    font-weight: 600;
	  }
	  
	  .timeline-title small {
	    color: var(--text-muted);
	    font-size: 14px;
	  }
	  
	  .highlight-panel {
	    background: var(--light-gray);
	    border-radius: 8px;
	    padding: 20px;
	    margin-top: 20px;
	    display: flex;
	    border-left: 3px solid var(--accent-color);
	  }
	  
	  .panel-icon {
	    width: 40px;
	    height: 40px;
	    background: var(--accent-color);
	    color: white;
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 16px;
	    margin-right: 15px;
	    flex-shrink: 0;
	  }
	  
	  .panel-content h5 {
	    margin-top: 0;
	    margin-bottom: 10px;
	    font-size: 18px;
	  }
	  
	  .panel-content p {
	    margin: 0;
	    font-size: 14px;
	  }
	  
	  /* Tarjeta de red */
	  .network-card {
	    background: white;
	    border-radius: 8px;
	    box-shadow: var(--shadow-sm);
	    overflow: hidden;
	    height: 100%;
	    padding: 30px;
	  }
	  
	  .network-header {
	    display: flex;
	    align-items: center;
	    margin-bottom: 20px;
	  }
	  
	  .network-icon {
	    width: 50px;
	    height: 50px;
	    background: var(--primary-color);
	    color: white;
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 20px;
	    margin-right: 20px;
	    flex-shrink: 0;
	  }
	  
	  .network-title h3 {
	    margin: 0 0 5px 0;
	    font-weight: 600;
	  }
	  
	  .network-title small {
	    color: var(--text-muted);
	    font-size: 14px;
	  }
	  
	  .network-nodes {
	    display: flex;
	    flex-direction: column;
	    gap: 15px;
	    margin-bottom: 20px;
	  }
	  
	  .node-row {
	    display: flex;
	    gap: 15px;
	  }
	  
	  .node-item {
	    flex: 1;
	    background: var(--light-gray);
	    border-radius: 8px;
	    padding: 15px;
	    text-align: center;
	  }
	  
	  .node-icon {
	    width: 40px;
	    height: 40px;
	    background: var(--primary-color);
	    color: white;
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 16px;
	    margin: 0 auto 10px auto;
	  }
	  
	  .node-item h6 {
	    margin: 0 0 5px 0;
	    font-size: 16px;
	  }
	  
	  .node-item p {
	    margin: 0;
	    font-size: 13px;
	    color: var(--text-muted);
	  }
	  
	  .network-footer {
	    display: flex;
	    align-items: flex-start;
	    background: var(--light-gray);
	    border-radius: 8px;
	    padding: 15px;
	    font-size: 14px;
	  }
	  
	  .network-footer i {
	    color: var(--accent-color);
	    margin-right: 10px;
	    font-size: 18px;
	    margin-top: 2px;
	  }
	  
	  .network-footer p {
	    margin: 0;
	  }
	  
	  /* Sección de certificado */
	  .certificate-section {
	    position: relative;
	  }
	  
	  .certificate-card {
	    display: flex;
	    background: white;
	    border-radius: 8px;
	    box-shadow: var(--shadow-lg);
	    overflow: hidden;
	    min-height: 300px;
	  }
	  
	  .certificate-content {
	    flex: 2;
	    padding: 40px;
	  }
	  
	  .certificate-image {
		flex: 1;
		min-width:405px;
	    background: url('#') center/cover no-repeat;
	    position: relative;
	  }
	  
	  .certificate-image:before {
	    content: '';
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background: linear-gradient(to right, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0) 100%);
	  }
	  
	  .certificate-header {
	    display: flex;
	    align-items: center;
	    margin-bottom: 20px;
	  }
	  
	  .certificate-icon {
	    width: 60px;
	    height: 60px;
	    background: var(--accent-color);
	    color: white;
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 24px;
	    margin-right: 20px;
	    flex-shrink: 0;
	  }
	  
	  .certificate-title h3 {
	    margin: 0 0 5px 0;
	    font-weight: 600;
	  }
	  
	  .certificate-title small {
	    color: var(--text-muted);
	    font-size: 14px;
	  }
	  
	  .certificate-details {
	    display: flex;
	    gap: 20px;
	    margin-top: 30px;
	  }
	  
	  .detail-item {
	    display: flex;
	    align-items: center;
	  }
	  
	  .detail-icon {
	    width: 40px;
	    height: 40px;
	    background: var(--light-gray);
	    color: var(--accent-color);
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 16px;
	    margin-right: 15px;
	    flex-shrink: 0;
	  }
	  
	  .detail-text h6 {
	    margin: 0 0 3px 0;
	    font-size: 16px;
	  }
	  
	  .detail-text p {
	    margin: 0;
	    font-size: 14px;
	    color: var(--text-muted);
	  }
	  
	  /* Sección de funciones */
	  .functions-steps {
	    display: flex;
	    flex-direction: column;
	    gap: 20px;
	  }
	  
	  .step-card {
	    display: flex;
	    background: white;
	    border-radius: 8px;
	    box-shadow: var(--shadow-sm);
	    padding: 25px;
	    transition: all 0.3s ease;
	    position: relative;
	    overflow: hidden;
	  }
	  
	  .step-card:before {
	    content: '';
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 4px
	    }
	  /* Lista de valores */
	  .values-list li {
	    padding: 12px 0;
	    border-bottom: 1px solid var(--border-color);
	  }
	  .values-list li:last-child {
	    border-bottom: none;
	  }
	
	  /* Fondo degradado suave */
	  .bg-light-gradient {
	    background: linear-gradient(to bottom, #f8f9fa 0%, #ffffff 100%);
	  }
	
	  /* Espaciado vertical */
	  .py-7 {
	    padding-top: 6rem !important;
	    padding-bottom: 6rem !important;
	  }
	  .mb-6, .mb-7 {
	    margin-bottom: 5rem !important;
	  }
	  .mb-7 {
	    margin-bottom: 6rem !important;
	  }
	
	  /* Tipografía adicional */
	  .tracking-wider {
	    letter-spacing: 0.05em;
	  }
	  .divider {
	    width: 80px;
	    height: 3px;
	    border-radius: 3px;
	  }
	  
	  .function-card {
	    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
	    border-radius: 12px;
	    overflow: hidden;
	    background: white;
	    position: relative;
	  }
	  
	  .function-card::before {
	    content: '';
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 4px;
	    background: linear-gradient(90deg, #2c3e50, #678ca3);
	    transform: scaleX(0);
	    transform-origin: left;
	    transition: transform 0.4s ease;
	  }
	  
	  .function-card:hover::before {
	    transform: scaleX(1);
	  }
	  
	  .hover-lift:hover {
	    transform: translateY(-8px);
	    box-shadow: 0 12px 20px -8px rgba(44, 62, 80, 0.2) !important;
	  }
	  
	  .icon-wrapper {
	    width: 80px;
	    height: 80px;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    transition: all 0.4s ease;
	    box-shadow: 0 4px 8px rgba(103, 140, 163, 0.2);
	  }
	  
	  .function-card:hover .icon-wrapper {
	    transform: scale(1.1) rotate(5deg);
	    box-shadow: 0 8px 16px rgba(44, 62, 80, 0.2);
	  }
	  
	  .animation-delay-1 {
	    animation-delay: 0.1s;
	  }
	  
	  .animation-delay-2 {
	    animation-delay: 0.2s;
	  }
	  
	  .animation-delay-3 {
	    animation-delay: 0.3s;
	  }
	  
	  .tags-container {
	    display: flex;
	    flex-wrap: wrap;
	    justify-content: center;
	  }
	  
	  .badge.border {
	    border: 1px solid #dee2e6 !important;
	    transition: all 0.3s ease;
	  }
	  
	  .badge.border:hover {
	    background: linear-gradient(145deg, #f8f9fa, #e9ecef) !important;
	  }
	  
	  @keyframes fadeInUp {
	    from {
	      opacity: 0;
	      transform: translateY(20px);
	    }
	    to {
	      opacity: 1;
	      transform: translateY(0);
	    }
	  }
	  
	  .function-card {
	    animation: fadeInUp 0.6s ease forwards;
	    opacity: 0;
	  }
	  
	  .text-secondary {
	    color: #6c757d !important;
	  }
	  
	
</style>