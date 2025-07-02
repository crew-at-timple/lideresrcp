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

                    <a href="<?php $term_link; ?>" class="btn btn-link btn-back c-blue-lt p-0">Volver atras</a>


            <?php }
            } ?>

        </div>

        <div class="compromiso--header text-center text-sm-start">
            <h1 class="c-white tiempos mb-2">EnergíaRCP</h1>
            <div class="c-white">
                Managers, en equipo, tomamos el compromiso de aplicar la visión radical de cliente en aspectos claves del negocio
            </div>
        </div>

        <?php
        $current_term = get_queried_object();
        ?>
        <div class="compromiso--videos">

            <div class="row">

                <div class="col-12 mb-4">
                    <?php
                    if ($current_term->parent) {
                        $parent = get_term($current_term->parent, 'compromisos');
                        if (!is_wp_error($parent)) { ?>
                            <div class="fs-14 mb-1"><?php echo esc_html($parent->name); ?></div>
                    <?php }
                    }
                    ?>

                    <h2 class="fs-18 fw-700"><?php echo esc_html($current_term->name); ?></h2>

                    <div class="fs-14"><?php echo ($current_term->description); ?></div>

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

                        <form>
                            <div class="mb-4">
                                <div class="fs-18 fw-700 mb-1">
                                    Compartí tu anécdota
                                </div>
                                <div class="fs-14 fw-300">
                                    Ya 20 líderesRCP compartieron sus historias, compartí la tuya y conócelas las de tus compañeros.
                                </div>
                            </div>

                            <div class="form-floating mb-4 avatar-floating">
                                <textarea required class="form-control" placeholder="Eran las 17.52 …" name="anecdota" id="anecdota"></textarea>
                                <label for="anecdota">Eran las 17.52 …</label>
                                <div class="avatar" data-bs-toggle="tooltip" title="">
                                    <span>ac</span>
                                </div>
                            </div>

                            <!-- Botón de envío -->
                            <div class="text-left">
                                <button type="submit" class="btn btn-animation btn-blue">Enviar</button>
                            </div>

                        </form>

                        <div class="already-completed mt-4">
                            <div class="avatars">
                                <div class="avatar" data-bs-toggle="tooltip" title="">
                                    <span>ac</span>
                                </div>
                                <div class="avatar" data-bs-toggle="tooltip" title="">
                                    <span>ac</span>
                                </div>
                                <div class="avatar" data-bs-toggle="tooltip" title="">
                                    <span>ac</span>
                                </div>
                                <div class="avatar" data-bs-toggle="tooltip" title="">
                                    <span>ac</span>
                                </div>
                                <div class="avatar" data-bs-toggle="tooltip" title="">
                                    <span>ac</span>
                                </div>
                            </div>
                            <div class="fs-14 fw-300 mt-1">
                                Y 15 más ya subieron sus historias.
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</section>

<?php

get_footer();

?>