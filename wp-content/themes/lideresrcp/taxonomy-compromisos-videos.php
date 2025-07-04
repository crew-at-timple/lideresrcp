<?php
get_header();
?>


<section class="compromiso">
    <div class="container-lg">

        <div class="mt-3 mb-4">

            <?php

            $term_slug = 'energia-rcp';
            $taxonomy_name = 'compromisos';
            $term = get_term_by('slug', $term_slug, $taxonomy_name);

            if ($term && ! is_wp_error($term)) {
                $term_link = get_term_link($term);
                if (! is_wp_error($term_link)) {
            ?>

                    <a href="<?php echo $term_link; ?>" class="btn btn-link btn-back c-blue-lt p-0">Volver atras</a>


            <?php }
            } ?>

        </div>

        <div class="compromiso--header text-center text-sm-start">
            <h1 class="c-white tiempos mb-2">EnergíaRCP</h1>
            <div class="c-white">
                Los managers tomamos el compromiso de aplicar la visión radical de cliente en aspectos claves del negocio
            </div>
        </div>

        <?php
        $current_term = get_queried_object();
        $parent = get_term($current_term->parent, 'compromisos');
        
        if ($current_term->parent) {

            if(!tarea_existe_para_usuario_y_term(wp_get_current_user()->ID, $parent->slug)){

            ?>
            <div class="compromiso--videos">

                <div class="row">

                    <div class="col-12 mb-4">
                        <?php
                        if ($current_term->parent) {
                            if (!is_wp_error($parent)) { ?>
                                <div class="fs-16 fw-700 mb-1"><?php echo esc_html($parent->name); ?></div>
                        <?php }
                        }
                        ?>

                        <h2 class="fs-18 fw-700"><?php echo esc_html($current_term->name); ?></h2>

                        <div class="fs-16"><?php echo ($current_term->description); ?></div>

                    </div>

                    <div class="col-12 col-sm-auto col-fixed mb-4 mb-sm-0">
                        <?php
                        $video_id = get_field('video', 'term_' . $current_term->term_id);

                        $video_url = get_field('video', $video_id);

                        if ($video_url):
                        ?>
                            <div class="compromiso--videos_video">
                                <div class="ratio">
                                    <video controls width="100%" preload="metadata">
                                        <source src="<?php echo $video_url['url']; ?>" type="video/mp4">
                                        Tu navegador no soporta video HTML5.
                                    </video>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="col-12 col-sm">

                        <div class="form--wrapper">

                            <form method="post" id="compromiso-grupal" enctype="multipart/form-data">

                                <div class="mb-4">
                                    <div class="fs-18 fw-700 mb-1">
                                        Compartí tu anécdota
                                    </div>
                                    <div class="fs-16 ">

                                        <?php 
                                        
                                        $tareasCargadas = obtener_autores_y_cantidad_por_term('videos');
                                        $autores = $tareasCargadas['autores'];
                                        $total = $tareasCargadas['cantidad'];
                                        
                                        if($total > 5){ ?> 

                                            Ya <?php echo $total ?> managers compartieron sus historias. Compartí la tuya y conócelas las de tus compañeros.
                                            
                                        <? } else if($total < 5 && $total > 0) { ?>

                                            Ya hay managers que compartieron sus historias. Compartí la tuya y conócelas las de tus compañeros.

                                        <?php } else { ?>

                                            Se el primero en compartír una historial real.

                                        <?php } ?>
                                    
                                    </div>
                                </div>

                                <div class="form-floating mb-4 avatar-floating">
                                    <textarea required class="form-control" placeholder="Por ejemplo: <?php echo obtener_inicio_aleatorio_anecdota(); ?>" name="anecdota" id="anecdota"></textarea>
                                    <label for="anecdota">Por ejemplo: <?php echo obtener_inicio_aleatorio_anecdota(); ?></label>
                                    <?php if ($total > 0){ ?>
                                    <div class="avatar" data-bs-toggle="tooltip" title="">
                                        <span><?php echo get_user_initials(); ?></span>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="mb-3">
                                    <label for="imagen" class="form-label"><strong>Subí una imagen (opcional):</strong></label>
                                    <input type="file" name="imagen" class="form-control" id="fotoMural" placeholder="Foto del mural de post-its">
                                </div>

                                <?php wp_nonce_field('guardar_formulario_respuesta', 'formulario_respuesta_nonce'); ?>
                                <input type="hidden" name="accion_formulario_algunavez" value="1">
                                <input type="hidden" name="subvideo" value="<?php echo $current_term->slug; ?>">


                                <div class="d-flex justify-content-between">

                                    <!-- Botón de envío -->
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-animation btn-blue">Enviar</button>
                                    </div>


                                    <?php if ($total === 0): ?>
                                    <div class="already-completed">

                                    <div class="avatars d-flex justify-content-end">

                                        <?php

                                        $user = get_userdata(get_current_user_id());

                                        $initials = get_user_initials(get_current_user_id());
                                        $email = esc_attr($user->user_email);
                                        ?>
                                        <div class="avatar" data-bs-toggle="tooltip" title="<?php echo $email; ?>">
                                            <span><?php echo esc_html($initials); ?></span>
                                        </div>


                                       

                                    </div>

                                    <div class="fs-14 fw-300">
                                        Sé el primero en compartir tu historia.
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="already-completed">
                                    <div class="avatars d-flex justify-content-end">
                                        <?php
                                        $max_visible = 5;
                                        $count = 0;

                                        foreach ($autores as $user_id) {
                                            if ($count >= $max_visible) break;

                                            $user = get_userdata($user_id);
                                            if (!$user) continue;

                                            $initials = get_user_initials($user_id);
                                            $email = esc_attr($user->user_email);
                                            ?>
                                            <div class="avatar" data-bs-toggle="tooltip" title="<?php echo $email; ?>">
                                                <span><?php echo esc_html($initials); ?></span>
                                            </div>
                                            <?php
                                            $count++;
                                        }

                                        ?>
                                    </div>

                                    <div class="fs-14 fw-300 mt-1">
                                        <?php
                                        $restantes = count($autores) - $max_visible;
                                        if ($restantes > 0) {
                                            echo 'Y ' . $restantes . ' más ya compartieron su historia.';
                                        } else {
                                            echo 'Compartí la tuya.';
                                        }
                                        ?>
                                    </div>
                                </div>

                            <?php endif; ?>



                                </div>

                            </form>

                            <!-- Avatars -->

                            

                        </div>


                    </div>
                </div>
            </div>

            <?php } else { ?>


            <div class="compromiso--videos">

                <div class="row">

                    <div class="col-6 mb-4">
                        <?php
                        if ($current_term->parent) {
                            $parent = get_term($current_term->parent, 'compromisos');
                            if (!is_wp_error($parent)) { ?>
                                <div class="fs-16 mb-1"><?php echo esc_html($parent->name); ?></div>
                        <?php }
                        }
                        ?>

                        <h2 class="fs-18 fw-700"><?php echo esc_html($current_term->name); ?></h2>

                        <div class="fs-16"><?php echo ($current_term->description); ?></div>

                        <?php
                        $video_id = get_field('video', 'term_' . $current_term->term_id);

                        $video_url = get_field('video', $video_id);

                        if ($video_url):
                        ?>
                            <div class="compromiso--videos_video">
                                <div class="ratio">
                                    <video controls width="100%" preload="metadata">
                                        <source src="<?php echo $video_url['url']; ?>" type="video/mp4">
                                        Tu navegador no soporta video HTML5.
                                    </video>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    
                </div>
            </div>

        
        <?php }
        } ?>


    </div>
</section>

<?php

get_footer();

?>