<?php
get_header();
?>

<section class="compromiso">
    <div class="container-lg">

        <div class="mt-3 mb-4">
            <button class="btn btn-link btn-back c-blue-lt p-0">Volver atras</button>
        </div>

        <div class="compromiso--header text-center text-sm-start">
            <h1 class="c-white tiempos mb-2">EnergíaRCP</h1>
            <div class="c-white">
                Managers, en equipo, tomamos el compromiso de aplicar la visión radical de cliente en aspectos claves del negocio
            </div>
        </div>


        <div class="compromiso--form">
            <div class="compromiso--form_tag mb-3">En progreso</div>

            <div class="h1 tiempos c-white">Compromiso Grupal RCP</div>


            <form>

                <div class="accordion mb-4" id="formAccordion">

                    <!-- Paso 1 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        Paso 1: Foco en equipo
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" >
                        <div class="accordion-body">

                        <p>Tomando como punto de partida el video del impulsor, el equipo trabaja en conjunto para analizar el problema.</p>

                        <p>Organicen una dinámica breve de brainstorming usando post-its. Respondan preguntas como:</p>

                        <ul>
                            <li>¿Qué tenemos que mejorar?</li>
                            <li>¿Qué tenemos que empezar a hacer?</li>
                        </ul>

                        <p>💡 Cada post-it debe reflejar un aporte y apuntar a algo que impacte directamente en la experiencia del cliente.</p>

                        <p>📸 Una vez finalizado el ejercicio, saquen una foto a los post-its y súbanla acá para que quede registrada.</p>

                        <div class="mb-3">
                            <label for="fotoMural" class="form-label"><strong>Suban aquí la foto del mural:</strong></label>
                            <input type="file" class="form-control" id="fotoMural" placeholder="Foto del mural de post-its">
                        </div>

                        </div>
                    </div>
                    </div>

                    <!-- Paso 2 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        Paso 2: Acción en equipo
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" >
                        <div class="accordion-body">

                        <p>Ahora que el problema está más claro, es momento de avanzar:</p>

                        <ol>
                            <li><span class="icon"><?php echo get_svg_icon('icon-idea.svg'); ?></span> Primero, prioricen el foco sobre el que creen que vale más la pena trabajar.</li>
                            <li>💡 Luego, desarrollen ideas para entender por qué sucede, a quiénes involucra y qué impacto tiene.</li>
                            <li>🌪️ Después, suelten la creatividad: generen muchas ideas para resolverlo.</li>
                            <li>🧭 Finalmente, elijan una solución concreta y diseñen los primeros pasos para llevarla adelante.</li>
                        </ol>

                        <strong class="mt-5 mb-4 d-block">Completá el siguiente formulario de acción</strong>

                        <div class="row g-3">

                            <!-- Nombre -->
                            <div class="col-lg-6">
                                
                                <strong>a. Nombre</strong>
                                <p>Todo buen compromiso tiene un buen nombre.</p>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" placeholder="Nombre del compromiso" id="nombre" style="height: 80px;"></textarea>
                                    <label for="nombre">Nombre del compromiso</label>
                                </div>

                                <strong>b. Describan la acción concreta que van a llevar adelante.</strong>
                                <p><i>Ejemplo: “Enviar una encuesta breve a clientes recientes”</i></p>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" placeholder="Descripción del compromiso" id="descripcion" style="height: 140px;"></textarea>
                                    <label for="descripcion">Descripción del compromiso</label>
                                </div>

                                


                            </div>

                            <!-- Quién lo hace -->
                            <div class="col-lg-6">
                                
                                
                                <strong>c. Deadline</strong>
                                <p><i>Ejemplo: “Antes del viernes 12”, “Del 5 al 10 de agosto”</i></p>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" placeholder="¿Cuándo?" id="cuando" style="height: 80px;"></textarea>
                                    <label for="cuando">¿Cuándo?</label>
                                </div>

                                <strong>c. ¿Quién o quiénes lo hacen?</strong>
                                <p><i>Ejemplo: “Lucía”, “Equipo de atención”, “Juan y Romina”</i></p>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="¿Quién lo hace?" id="quien" style="height: 140px;"></textarea>
                                    <label for="quien">¿Quién lo hace?</label>
                                </div>

                                
                            </div>

                            <!-- Objetivo -->
                            <div class="col-12">

                                <strong>d. ¿Qué debería cambiar o mejorar gracias a esta acción?</strong>
                                    <p><i>Ejemplo: “Obtener insights sobre puntos de dolor en la experiencia”</i></p>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="¿Qué esperamos con cada acción?" id="que" style="height: 140px;"></textarea>
                                        <label for="que">¿Qué esperamos con cada acción?</label>
                                </div>
                            
                            </div>

                        </div>

                        </div>
                    </div>
                    </div>

                </div>

                <!-- Botón de envío -->
                <div class="text-left mt-4">
                    <button type="submit" class="btn btn-white">Enviar nuestro compromiso grupal</button>
                </div>

                </form>

        </div>

    </div>
</section>
<?php

get_footer();

?>