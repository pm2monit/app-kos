<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p><?php echo date('Y'); ?> &copy; Kostel Cendekia</p>
        </div>
        <div class="float-end">
            <p>Created with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="#"> IT Functional </a></p>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="ModalGue" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="ModalHeader">...</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body" id="ModalContent">
    ...
  </div>
  <div class="modal-footer" id="ModalFooter">

  </div>
</div>
</div>
</div>


<script>
$('#ModalGue').on('hide.bs.modal', function () {
   setTimeout(function(){
      $('#ModalHeader, #ModalContent, #ModalFooter').html('');
   }, 500);
});
</script>
