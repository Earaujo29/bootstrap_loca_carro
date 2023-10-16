<div class="modal fade" id="esqueciSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Informe seu e-mail para recuperar a sua senha!</h4>
            </div>
            <form role="form" action="../../Usuario/UsuarioController.php" method="POST">
                <div class="modal-body">
                    <div class="row m-t-1">						
                        <div class="col-lg-12">							
                            <label for="cpf">Email:</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">																			
                            <input type="email" id="email" name="email" class="form-control" placeholder="Informe seu e-mail" required />				
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="recoveryPassword" id="recoveryPassword" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>