<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Novo Usuário</h4>
            </div>

            <form role="form" action="../../Usuario/UsuarioController.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row form-group">
                            <div class="col-lg-12 "> 
                                <div class="input-group">
                                    <label for="nomeM" class="col-xs-12 col-mg-12 col-form-label">Nome</label>
                                    <input type="text" class="form-control col-lg-12" id="nomeM" name="nomeM" placeholder="Informe seu nome.." requerid>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12 "> 
                                <div class="input-group">
                                    <label for="loginM" class="col-xs-12 col-mg-12 col-form-label">Login</label>
                                    <input type="email" class="form-control col-lg-12" id="loginM" name="loginM" placeholder="Informe seu e-mail.." requerid >
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12 "> 
                                <div class="input-group">
                                    <label for="senhaM" class="col-xs-12 col-mg-12 col-form-label">Senha</label>
                                    <input type="password" class="form-control" id="senhaM" name="senhaM" placeholder="Informe sua senha..." requerid >
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12 "> 
                                <div class="input-group">
                                    <label for="cSenhaM" class="col-xs-12 col-mg-12 col-form-label">Confirme sua senha:</label>
                                    <input type="password" id="cSenhaM" name="cSenhaM" class="form-control col-lg-12" placeholder="Confirme sua senha" requerid />				
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="insert" name="insert" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div>