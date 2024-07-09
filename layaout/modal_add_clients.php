<div class="modal fade show" id="modal-default-clients" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../app/controllers/clientes/create.php" method="post">
  
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del cliente</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombre_cliente"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Correo del cliente</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email_cliente"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Celular</label>
                        <input
                            type="text"
                            class="form-control"
                            name="celular_cliente"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">NIT/CI</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nit_ci_cliente"
                        />
                    </div>
                    

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar cliente</button>
            </div>
            </form>
        </div>

    </div>

</div>