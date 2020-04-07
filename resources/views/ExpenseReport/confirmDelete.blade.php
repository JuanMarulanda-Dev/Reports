<div id="ConfirmDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Confirm</h5>
            </div>
            <div class="modal-body">
                Are you sure want delete this report?
            </div>
            <div class="modal-footer">
                <form id="confirm" method="POST">
                    @csrf
                    @method('delete')
                    <button  type="submit" class="btn btn-danger">Confirmar</button>
                    <button class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>