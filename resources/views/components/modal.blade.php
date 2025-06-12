<style>
    .dataTables_length {
        float: center ;
    }
    .dataTables_length label {
        margin-right: 10px;
    }
    .dataTables_filter {
        margin-bottom: 15px;
        float: right;
    }

    .dataTables_filter label {
        margin-right: 6% !important;
    }
    
</style>

<div>
    <!-- Modal proveedores -->
    <div class="modal fade" id="proveedoresModal" tabindex="-1" aria-labelledby="Label" aria-hidden="true" 
                data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Listado de Proveedores</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>

            <div id="spinner-proveedores" class="text-center pb-3">
                <div class="spinner-border text-primary" style="width: 6rem; height: 6rem;" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <h4 class="text-primary">Cargando...</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

        <!-- Modal bancos -->
    <div class="modal fade" id="bancosModal" tabindex="-1" aria-labelledby="Label" aria-hidden="true" 
                data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Cuentas Bancarias del Proveedor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
            </div>

            <div id="spinner-cuentas-proveedores" class="text-center pb-3">
                <div class="spinner-border text-primary" style="width: 6rem; height: 6rem;" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <h4 class="text-primary">Cargando...</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
</div>
    
    @push('js')
        
    @endpush

    


                            