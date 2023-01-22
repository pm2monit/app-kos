<?= $this->extend("layout/layout") ?>

<?= $this->section("pageStyles") ?>
<!-- <link rel="stylesheet" href="/assets/css/pages/fontawesome.css"> -->
<link rel="stylesheet" href="/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="/assets/css/pages/datatables.css">
<link rel="stylesheet" href="/assets/extensions/sweetalert2/sweetalert2.min.css"/>
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<!-- CSRF -->
<input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />



<!-- Main content -->
<div class="page-heading">
    <h3>List Users</h3>
</div>

<div class="page-content">
  <section class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header">
          <div class="row">
            <div class="col-10 mt-2">
              <h3 class="card-title">List Users</h3>
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-block float-right btn-success" onclick="save()" title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i>   <?= lang('App.new') ?></button>
            </div>
          </div>
        </div>

        <div class="card-body">
          <table id="data_table" class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Username</th>
                

			          <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>


      </div>
    </div>
  </section>
</div>

      

<!-- /Main content -->

<!-- ADD modal content -->
<div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <div class="row">
            <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" required>
            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
					</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="email" class="col-form-label"> Email: <span class="text-danger">*</span> </label>
									<input type="email" id="email" name="email" class="form-control" placeholder="Email" minlength="0"  maxlength="255" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="username" class="col-form-label"> Username: </label>
									<input type="text" id="username" name="username" class="form-control" placeholder="Username" minlength="0"  maxlength="30" >
								</div>
							</div>
						</div>

          <div class="form-group text-center">
            <div id="button-ok" class="btn-group">
              <button type="submit" class="btn btn-success mr-2" id="form-btn"><?= lang("App.save") ?></button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /ADD modal content -->



<?= $this->endSection() ?>
<!-- /.content -->


<!-- page script -->
<?= $this->section("pageScripts") ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="/assets/js/pages/datatables.js"></script>
<script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>

    

<script>
  // dataTables
  
  $(document).ready(function() {
     // CSRF hash
     var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name  
     var csrfHash = $('.txt_csrfname').val();
    let table = $("#data_table").removeAttr('width').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'POST',
      'ajax': {
            'url':"<?php echo base_url($controller . "/getAll") ?>",
            'data': function(data){            
              console.log(data);
              return {
                data: data,
                [csrfName]: $('.txt_csrfname').val() 
              };
            },
            dataSrc: function(data){
              $('.txt_csrfname').val(data.token);
              return data.aaData;
            }
         }
        
    })
  })

  var urlController = '';
  var submitText = '';

  function getUrl() {
    return urlController;
  }

  function getSubmitText() {
    return submitText;
  }

  function view(id) {
    // reset the form 
    var csrfName = $('.txt_csrfname').attr('name'); 
    var csrfHash = $('.txt_csrfname').val(); 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');

    if (typeof id === 'undefined' || id < 1) { //add
      
      $('#model-header').removeClass('bg-info').addClass('bg-warning');
      $("#info-header-modalLabel").text('<?= lang("App.view") ?>');
      $('#data-modal').modal('show');
    } else { 
      //edit
      $.ajax({
        url: '<?php echo base_url($controller . "/getOne") ?>',
        type: 'post',
        data: {
          id: id,
          [csrfName]: $('.txt_csrfname').val(),
        },
        dataType: 'json',
        success: function(response) {
          // console.log(response);
          csrfName = $('.txt_csrfname').attr('name'); 
          csrfHash = $('.txt_csrfname').val(response.token); 

          let buttn_html = `<button type="button" class="btn btn-info close" data-bs-dismiss="modal" onClick="addButton()"><?= lang("App.close") ?></button>`;
          $('#model-header').removeClass('bg-success').addClass('bg-success');
          $("#info-header-modalLabel").text('<?= lang("App.view") ?>');
          $('#data-modal').modal('show');
          $("#button-ok button").remove();
          $("#button-ok").append(buttn_html);
          $("input").attr('disabled', true)
          //insert data to form
          $("#data-form #id").val(response.data.id);
			    $("#data-form #email").val(response.data.email);
			    $("#data-form #username").val(response.data.username);
			    
        }
      });
    }
  }

  function addButton() {
    window.location.reload();
  }

  function save(id) {
    // reset the form 
    var csrfName = $('.txt_csrfname').attr('name'); 
    var csrfHash = $('.txt_csrfname').val(); 

    var tampung = [];
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof id === 'undefined' || id < 1) { //add
      urlController = '<?= base_url($controller . "/add") ?>';
      submitText = '<?= lang("App.save") ?>';
      $('#model-header').removeClass('bg-info').addClass('bg-success');
      $("#info-header-modalLabel").text('<?= lang("App.add") ?>');
      $("#form-btn").text(submitText);
      $('#data-modal').modal('show');
    } else { //edit
      urlController = '<?= base_url($controller . "/edit") ?>';
      submitText = '<?= lang("App.update") ?>';
      $.ajax({
        url: '<?php echo base_url($controller . "/getOne") ?>',
        type: 'post',
        data: {
          id: id,
          [csrfName]: $('.txt_csrfname').val()
        },
        dataType: 'json',
        success: function(response) {
          csrfName = $('.txt_csrfname').attr('name'); 
          csrfHash = $('.txt_csrfname').val(response.token); 

          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          $("#data-form #id").val(response.data.id);
			    $("#data-form #email").val(response.data.email);
			    $("#data-form #username").val(response.data.username);

        }
      });
    }


    $.validator.setDefaults({
      highlight: function(element) {
        $(element).addClass('is-invalid').removeClass('is-valid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid').addClass('is-valid');
      },
      errorElement: 'div ',
      errorClass: 'invalid-feedback',
      errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else if ($(element).is('.select')) {
          element.next().after(error);
        } else if (element.hasClass('select2')) {
          //error.insertAfter(element);
          error.insertAfter(element.next());
        } else if (element.hasClass('selectpicker')) {
          error.insertAfter(element.next());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {
        var form = $('#data-form');
        console.log(csrfHash);
        console.log(form.serialize())
        $(".text-danger").remove();

        $.ajax({
          url: getUrl(),
          [csrfName]: $('.txt_csrfname').val(),
          type: 'POST',
          data: form.serialize(),
          cache: false,
          dataType: 'json',
          beforeSend: function() {
            $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
          },
          success: function(response) {

            csrfName = $('.txt_csrfname').attr('name'); 
            csrfHash = $('.txt_csrfname').val(response.token); 
            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                // $('.txt_csrfname').val(response.token);
                // $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                // $('#data-modal').modal('hide');
                
                window.location.reload();
              })
            } else {
              if (response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var ele = $("#" + index);
                  ele.closest('.form-control')
                    .removeClass('is-invalid')
                    .removeClass('is-valid')
                    .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                  ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                });
              } else {
                Swal.fire({
                  toast: false,
                  position: 'bottom-end',
                  icon: 'error',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 3000
                })

              }
            }
            $('#form-btn').html(getSubmitText());
          }
        });
        return false;
      }
    });

    $('#data-form').validate({

      //insert data-form to database

    });
  }



  function remove(id) {
    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
    Swal.fire({
      title: "<?= lang("App.remove-title") ?>",
      text: "<?= lang("App.remove-text") ?>",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '<?= lang("App.confirm") ?>',
      cancelButtonText: '<?= lang("App.cancel") ?>'
    }).then((result) => {

      if (result.value) {
        $.ajax({
          url: '<?php echo base_url($controller . "/remove") ?>',
          type: 'post',
          data: {
            id : id,
            [csrfName]: $('.txt_csrfname').val(),
          },
          dataType: 'json',
          success: function(response) {

            if (response.success === true) {
              Swal.fire({
                toast:true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                // $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                window.location.reload();
              })
            } else {
              Swal.fire({
                toast:false,
                position: 'bottom-end',
                icon: 'error',
                title: response.messages,
                showConfirmButton: false,
                timer: 3000
              })
            }
          }
        });
      }
    })
  }
</script>


<?= $this->endSection() ?>
