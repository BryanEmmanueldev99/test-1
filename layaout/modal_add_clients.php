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
                        <label for="" class="form-label">Razón social</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombre_cliente"
                            id="razonsocial_cliente"
                        />


                        <div class="" id="resultado_client_nombre"></div>
                                <script>
                                    $(document).ready(function() {

                                        var verify_razon_social;

                                        //comprobamos si se pulsa una tecla
                                        $("#razonsocial_cliente").keyup(function(e) {
                                            
                                            //obtenemos el texto introducido en el campo
                                            verify_razon_social = $("#razonsocial_cliente").val();
                                            
                                            //hace la búsqueda
                                            $("#resultado_client_nombre").delay(1000).queue(function(n) {

                                                $("#resultado").html('<img width="30px" class="img-fluid" src="<?= $url;  ?>public/img/ajax_loader.gif" />');

                                                $.ajax({
                                                    type: "POST",
                                                    url: "../app/controllers/clientes/provider_razon_social.php",
                                                    data: "razonsocial=" + verify_razon_social,
                                                    dataType: "html",
                                                    error: function() {
                                                        alert("error en la petición ajax");
                                                    },
                                                    success: function(data) {
                                                        $("#resultado_client_nombre").html(data);
                                                        n();
                                                    }
                                                });

                                            });

                                        });

                                    });
                                </script>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Correo del cliente</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email_cliente"

                            id="email_cliente_validate"
                        />

                        <div class="" id="resultado_client"></div>
                                <script>
                                    $(document).ready(function() {

                                        var verify_user_sesion_client;

                                        //comprobamos si se pulsa una tecla
                                        $("#email_cliente_validate").keyup(function(e) {
                                            
                                            //obtenemos el texto introducido en el campo
                                            verify_user_sesion_client = $("#email_cliente_validate").val();
                                            
                                            //hace la búsqueda
                                            $("#resultado_client").delay(1000).queue(function(n) {

                                                $("#resultado").html('<img width="30px" class="img-fluid" src="<?= $url;  ?>public/img/ajax_loader.gif" />');

                                                $.ajax({
                                                    type: "POST",
                                                    url: "../app/controllers/clientes/provider_email_client.php",
                                                    data: "u=" + verify_user_sesion_client,
                                                    dataType: "html",
                                                    error: function() {
                                                        alert("error en la petición ajax");
                                                    },
                                                    success: function(data) {
                                                        $("#resultado_client").html(data);
                                                        n();
                                                    }
                                                });

                                            });

                                        });

                                    });
                                </script>
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