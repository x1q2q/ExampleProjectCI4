<?= $this->extend('templates/base'); ?>

<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <div id="notifications"></div>
    <section class="section">
    <div class="section-header">
        <h1>General</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
        <div class="card-header row mb-2 justify-content-between">
        <div class="col">
          <h4>Data User </h4>
        </div>
        <div class="col-auto">
          <button data-toggle="modal" data-target="#modal-add" class="btn btn-action btn-success">
            Tambah Data <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
          </button>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-users" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="sort text-center" data-sort="no" style="width:8%;">No.</th>
                            <th scope="col" class="sort" data-sort="avatar">Avatar</th>
                            <th scope="col" class="sort" data-sort="username">Username</th>
                            <th scope="col" class="sort" data-sort="email">Email</th>
                            <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modal-add">
  <div class="modal-dialog modal-lg modal-centered" role="document">
    <div class="modal-content">
      <form id="form-add" action="user/insert" method="POST" enctype="multipart/form-data">
        <div class="modal-header border-bottom">
          <h5 class="modal-title">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times text-dark"></i>
          </button>
        </div>

        <div class="modal-body">
            <div class="form-group row">
                <div class="col">
                    <label for="first-name"><b>Nama Depan</b></label>
                    <input type="text" name="first_name" value="" 
                    class="form-control input-default" id="first_name">
                </div>
                <div class="col">
                    <label for="last-name"><b>Nama Belakang</b></label>
                    <input type="text" name="last_name" value="" 
                    class="form-control input-default" id="last_name">
                </div>
            </div>
            <div class="form-group">
                <label for="address"><b>Alamat Rumah</b></label>
                <textarea name="address" id="address" resize="none"
                cols="50" rows="2" class="form-control input-default"></textarea>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="place-birth"><b>Tempat Lahir</b></label>
                    <input type="text" name="place_birth" value="" 
                    class="form-control input-default" id="place_birth">
                </div>
                <div class="col">
                    <label for="date-birth"><b>Tanggal Lahir</b></label>
                    <input type="date" name="date_birth" value="" 
                    class="form-control input-default" id="date_birth">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="telepon"><b>Telepon</b></label>
                    <input type="text" name="telepon" 
                    value="" class="form-control input-default" id="telepon">
                </div>
                <div class="col">
                    <label for="email"><b>E-mail</b></label>
                    <input type="email" name="email" 
                    value="" class="form-control input-default" id="email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="username"><b>Username</b></label>
                    <input type="text" name="username" 
                    value="" class="form-control input-default" id="username">
                </div>
                <div class="col">
                    <label for="gender"><b>Jenis Kelamin</b></label>
                    <div class="row justify-content-start ml-1">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="laki-laki" checked>
                            <label class="form-check-label" for="laki-laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check ml-5">
                            <input class="form-check-input" type="radio" name="gender" id="perempuan">
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="password"><b>Password</b></label>
                    <input type="password" name="password" 
                    value="" class="form-control input-default" id="password">
                </div>
                <div class="col">
                    <label for="confirm-password"><b>Ulangi Passowrd</b></label>
                    <input type="password" name="confirm_password" 
                    value="" class="form-control input-default" id="confirm_password">
                </div>
            </div>
            <div class="form-group">
                <label for="avatar"><b>Profil</b></label>
                <input name="avatar" id="avatar" type="file" class="form-control input-default">
            </div>

        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
  </div>
</div>
</div>

<style type="text/css">
.img-avatar{
    max-height: 250px;
    width: auto;
}
</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <script src="<?= base_url('vendor/datatables/datatables.min.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            let urlPathAva = "<?= base_url('assets/img/uploads/users/'); ?>"
            var userTable = $('#table-users').DataTable({
                "defRender":true,
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Cari di sini..."
                },
                "processing": true,
                "serverSide": true,
                "order": [
                    [0, "desc"]
                ],
                "columns": [
                    {
                        "data": "id",
                        'className':'text-center',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'avatar',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            return `<img src="${urlPathAva+'/'+data}" class="img-fluid img-avatar">`;
                        }
                    },
                    {
                        'data': 'username',
                        'className': "text-left",
                        'orderable': false,
                    },
                    {
                        'data': 'email',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'className':"text-center",
                        'orderable': false,
                        render: function(data, type, row, meta) {
                            var btn = '<a data-toggle="modal" data-target="#modal-edit" '+
                            ' class="btn btn-warning btn-action mr-1" data-toggle="tooltip"'+
                            ' title="Detail" >Detail <i class="fas fa-eye"></i></a>';
                            // '<a data-toggle="modal" data-target="#modal-delete" '+
                            // ' class="btn btn-danger btn-action mr-1" data-toggle="tooltip"'+
                            // ' title="Edit">Hapus <i class="fas fa-trash"></i></a>';

                            return btn;
                        }
                    },
                ],
                "ajax": {
                    "url": "<?php echo site_url('user/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        console.log(data);
                    }
                }
            });
            userTable.on('draw', function () {
                var total_records = userTable.rows().count();
                var page_length = userTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = userTable.page.info().page+1;
            });
            function resetForm(){
                $('#form-add').each(function(){
                    $(this).find('.invalid-feedback').remove();
                    $(this).find('.form-control').removeClass('is-invalid');
                });
            }
            
            $('#form-add').submit(function(e){
                e.preventDefault();
                let formData = new FormData(this);
                resetForm();
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data:formData,
                    processData:false,
                    contentType:false,
                    success: function(response) {
                        var resp = JSON.parse(response);
                        var data = resp.data;
                        if(parseInt(resp.status) == 200){
                            $('#modal-add').modal('hide');
                            userTable.draw();
                            Notify("Berhasil menambahkan data",null,null,'success');
                            resetForm();
                        }else{
                            for(const val in data){
                                const inputTag = 'form#form-add'+' #'+val;
                                $(inputTag).addClass('is-invalid');
                                if(!$(inputTag).parent().find('.invalid-feedback').length){
                                    $(inputTag).parent().append(`<div class="invalid-feedback">
                                    ${data[val]}
                                    </div>`);
                                }                     
                            }
                        }
                    },error: function(){
                        Notify("Gagal menambahkan data",null, null,'danger');
                    }
                });
            });
        }); 
    </script>

<?= $this->endSection('extrascript'); ?>