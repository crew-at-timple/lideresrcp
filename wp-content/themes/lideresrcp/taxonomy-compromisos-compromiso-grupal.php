<?php
get_header();
?>

<section class="compromiso">
    <div class="container-lg">

        <div class="mt-3 mb-4">
            <a href="" class="btn btn-link btn-back c-blue-lt p-0">Volver atras</a>
        </div>

        <div class="compromiso--header text-center text-sm-start">
            <h1 class="c-white tiempos mb-2">EnergíaRCP</h1>
            <div class="c-white">
                Gerentes de sucursales y áreas, en equipo, tomamos el compromiso de aplicar la visión radical de cliente en aspectos claves del negocio
            </div>
        </div>


        <div class="compromiso--form">
            <div class="compromiso--form_tag mb-3">En progreso</div>

            <div class="h1 tiempos c-white">Compromiso Grupal RCP</div>


            <form>

                <div>
                    <p>
                        Cada equipo tiene el desafío de crear un <stong>compromiso</stong> de aplicación concreta basado en el foco trabajado por el ImpulsorRCP. Ese compromiso debe ser simple, posible, visible, y sobre todo: realizable en los próximos <strong>15 días por cada miembro del equipo de forma individual.</strong>
                    </p>
                    <p>
                        No buscamos frases lindas ni ideas abstractas. Queremos propuestas que se puedan ver, tocar, medir. Una buena prueba es esta:
                    </p>
                </div>

                <div class="mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Nombre del compromiso" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Nombre del compromiso</label>
                    </div>
                </div>

                <div>
                    <input type="submit" value="Enviar nuestro compromiso grupal" class="btn btn-white">
                </div>
            </form>
        </div>

    </div>
</section>
<?php

get_footer();

?>