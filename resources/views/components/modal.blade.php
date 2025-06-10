
    
        <div>
            <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" >{{ $title }}</label>
                                                <select class="form-select" id="{{ $id }}Select" aria-placeholder="Seleccionar">
                                                    
                                                </select>
                                        </div>
                                    </div>
        </div>

        <div>
            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ $title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    
    @push('js')
    <!--Funcionalidad de Perfil de Usuario -->
    <script src="assets/static/js/initTheme.js"></script>
    <script src="assets/compiled/js/app.js"></script>
    <script src="assets/compiled/js/modal.js"></script>
    @endpush

    


                            