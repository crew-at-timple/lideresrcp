<div class="capsule-videos">
    <div class="capsule-videos--header mb-3">
        <div class="fs-14 fw-500 mb-2">¿Alguna vez te paso?</div>
        <div class="fs-18 fw-700">Enviada por</div>
        <div class="fs-18 fw-500 c-orange">lider.ejemplo@bbva.com</div>

        <div class="avatar" data-bs-toggle="tooltip" title="">
            <span>ac</span>
        </div>
    </div>
    <div class="capsule-videos--content fs-14 fw-300 lh-sm">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>

    <div class="capsule-videos--comments">
        <div class="fs-14 fw-700 mb-2">Comentarios</div>
        <?php
        include(locate_template(array('template-parts/capsule-comentario.php'), false, false));
        ?>
        <?php
        include(locate_template(array('template-parts/capsule-comentario.php'), false, false));
        ?>

        <div class="capsule-videos--comments_form">
            <form>
                <div class=" avatar-floating__wrapper">
                    <div class="mb-4 avatar-floating">
                        <label for="" class="form-label visually-hidden">Comentar</label>
                        <textarea class="form-control form-control-blue" id="" rows="3"></textarea>

                        <div class="avatar" data-bs-toggle="tooltip" title="">
                            <span>ac</span>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-animation btn-gray d-block w-100">Comentar</button>
                </div>
            </form>
        </div>
    </div>
</div>