<div class="modal fade" id="confirmacao" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" action="" method="POST">  

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmação de exclusão</h4>
                </div>
                <div class="modal-body">
                    <strong>Alerta!</strong> Deseja Realmente Excluir <strong id="titulo"></strong>?
                    <input id="idCliente" name="idCliente" value="" type="hidden"/>
                </div>
                <div class="modal-footer">
                    <input  type="submit" id="excluir" name="excluir" value="Sim" class="btn btn-danger" />
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
