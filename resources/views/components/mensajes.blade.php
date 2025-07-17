@if ($message = Session::get('success'))
    <div class="modal fade text-left modal-borderless" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
        {{ session()->pull('success') }}
        <div class="modal-dialog modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel110">Información
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body divider">
                    <p class="text-xl">{!! $message !!}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            $('#success').modal('show');
        });
    </script>
@endif

@if ($message = Session::get('danger'))
    <div class="modal fade text-left modal-borderless" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
        {{ session()->pull('danger') }}
        <div class="modal-dialog modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel110">Información
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body divider">
                    <p class="text-xl">{{ $message }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger ml-1" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            $('#danger').modal('show');
        });
    </script>
@endif

@if ($message = Session::get('warning'))
    <div class="modal fade text-left modal-borderless" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
        {{ session()->pull('warning') }}
        <div class="modal-dialog modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel110">Información
                    </h5>
                    <button type="button" class="close btn_salir" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body divider">
                    <p class="text-xl">{!! $message !!}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning ml-1 btn_salir" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            $('#warning').modal('show');
        });
    </script>
@endif

@if ($message = Session::get('info'))
    <div class="modal fade text-left modal-borderless" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
        {{ session()->pull('info') }}
        <div class="modal-dialog modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title white" id="myModalLabel110">Información
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body divider">
                    <p class="text-xl">{{ $message }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info ml-1" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            $('#info').modal('show');
        });
    </script>
@endif