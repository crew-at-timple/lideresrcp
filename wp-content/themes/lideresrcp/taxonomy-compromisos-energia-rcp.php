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

        
        <div class="compromiso--grid">
            
            <?php
            
            // Accede al ID del equipo del usuario actual desde la variable global
            // Verifica si el usuario está logueado y si tiene un equipo asignado
            if ($GLOBALS['current_user_team_id']) :
                // Obtiene todos los detalles del equipo (título, miembros, roles)
                $team_details = get_team_details_by_id($GLOBALS['current_user_team_id']);

                print_r($team_details);

                if ($team_details && !empty($team_details['miembros'])) :
            ?>
            <div class="compromiso--grid_team">
                <div class="compromiso--grid_team--inner">

                    <div class="compromiso--grid_title">Tu equipo</div>

                    <div class="compromiso--grid_avatars my-auto">
                        <?php
                        // Itera sobre cada miembro del equipo
                        foreach ($team_details['miembros'] as $member) :
                            // Obtiene las iniciales del usuario
                            // Asumimos que get_user_initials ahora toma el user_id directamente
                            $initials = get_user_initials($member['ID']);
                            // Prepara el texto del tooltip (si existe un rol)
                            $tooltip_text = esc_attr($member['user_email']);
                            if (isset($member['rol_en_equipo']) && !empty($member['rol_en_equipo'])) {
                                $tooltip_text .= ' (' . esc_attr($member['rol_en_equipo']) . ')';
                            }
                        ?>
                        <div class="avatar" data-bs-toggle="tooltip" title="<?php echo $tooltip_text; ?>">
                            <span><?php echo esc_html($initials); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
            <?php
                endif;
            endif;
            ?>

            <?php 

            $term_slug = 'compromiso-grupal';
            $taxonomy_name = 'compromisos';
            $term = get_term_by( 'slug', $term_slug, $taxonomy_name );

            if ( $term && ! is_wp_error( $term ) ) {
              $term_link = get_term_link( $term );
              if ( ! is_wp_error( $term_link ) ) {
            ?>

            <div class="compromiso--grid_desafio">
                <div class="compromiso--grid_desafio--inner">

                    <div class="compromiso--grid_title">Compromiso Grupal RCP</div>
                    <div class="compromiso--grid_desc">Managers, en equipo, tomamos el compromiso de aplicar la visión radical de cliente en aspectos claves del negocio</div>

                    <div class="mt-auto">
                        <a href="<?php echo $term_link; ?>" class="btn btn-white d-block w-100 mt-4">Completar tu compromiso</a>
                    </div>
                </div>
            </div>

            <?php }
            }
            ?>


            <div class="compromiso--grid_videos">
                <div class="compromiso--grid_title">¿Alguna vez te paso?</div>
                <div class="compromiso--grid_desc">Mirá los videos sobre situaciones típicas y contanos tus experiencias similares</div>

                <div class="compromiso--grid_slider">
                    <div>
                        <a href="">
                            <img src="https://placehold.co/540x960?text=Video+1" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="https://placehold.co/540x960?text=Video+2" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="https://placehold.co/540x960?text=Video+3" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="https://placehold.co/540x960?text=Video+4" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="https://placehold.co/540x960?text=Video+5" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="https://placehold.co/540x960?text=Video+6" alt="">
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>


<?php

get_footer();

?>