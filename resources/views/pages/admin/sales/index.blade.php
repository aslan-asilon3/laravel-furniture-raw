@extends('adminlte::page')

@section('content')
<style>


    /*left right modal*/
.modal.left_modal, .modal.right_modal{
  position: fixed;
  z-index: 99999;
}
.modal.left_modal .modal-dialog,
.modal.right_modal .modal-dialog {
  position: fixed;
  margin: auto;
  width: 22%;
  height: 100%;
  -webkit-transform: translate3d(0%, 0, 0);
      -ms-transform: translate3d(0%, 0, 0);
       -o-transform: translate3d(0%, 0, 0);
          transform: translate3d(0%, 0, 0);
}

.modal-dialog {
    /* max-width: 100%; */
    margin: 1.75rem auto;
}
@media (min-width: 576px)
{
.left_modal .modal-dialog {
    max-width: 100%;
}

.right_modal .modal-dialog {
    max-width: 100%;
}
}
.modal.left_modal .modal-content,
.modal.right_modal .modal-content {
  /*overflow-y: auto;
    overflow-x: hidden;*/
    height: 100vh !important;
}

.modal.left_modal .modal-body,
.modal.right_modal .modal-body {
  padding: 15px 15px 30px;
}

/*.modal.left_modal  {
    pointer-events: none;
    background: transparent;
}*/

.modal-backdrop {
    display: none;
}


/*Right*/
.modal.right_modal.fade .modal-dialog {
  right: -50%;
  -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
     -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
       -o-transition: opacity 0.3s linear, right 0.3s ease-out;
          transition: opacity 0.3s linear, right 0.3s ease-out;
}



.modal.right_modal.fade.show .modal-dialog {
  right: 0;
  box-shadow: 0px 0px 19px rgba(0,0,0,.5);
}

/* ----- MODAL STYLE ----- */
.modal-content {
  border-radius: 0;
  border: none;
}



.modal-header.left_modal, .modal-header.right_modal {

  padding: 10px 15px;
  border-bottom-color: #EEEEEE;
  background-color: #FAFAFA;
}

.modal_outer .modal-body {
    /*height:90%;*/
    overflow-y: auto;
    overflow-x: hidden;
    height: 91vh;
}
</style>


<!-- FILTER -->
<div class="card card-outline card-danger collapsed-card" >
    <div class="card-header">
        <h3 class="card-title">Filter <br></h3>
        <div class="card-tools">
            <!-- Collapsß Button -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            
        </div>
        <p style="color:red;display:none;" class="info-limit" > <br> Limit digunakan untuk membatasi jumlah baris data yang akan di export maksimal 20.000 data </p>
    </div>

    <div class="card-body" >
        <form action="" method="get"  id="search-form">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-6">
                    <label for="id_member">ID Member</label>
                    <input type="tel" name="id_member" id="id_member" class="form-control mb-2" />

                    <label for="desc_info">Batch</label>
                    <select class="form-control" name="batch" id="batch">
                        {{-- <option value="">-- Select Batch --</option>
                        @foreach ($datasales as $b)
                            <option value="{{ $b->batch }}">{{ $b->batch }}</option>
                        @endforeach --}}
                    </select>

                    <label for="no_hp">Order ID</label>
                    <input type="tel" name="order_id" id="order_id" class="form-control mb-2" />

                    <label for="poin">Poin</label>
                    <input type="number" name="poin" id="poin" class="form-control mb-2" />

                    <label for="no_hp">Nomor HP</label>
                    <input type="tel" name="no_hp" id="no_hp" class="form-control mb-2" />

                    <label for="no_hp">tanggal</label>
                    <input type="tel" name="tanggal" id="tanggal" class="form-control mb-2" />

                </div>
                <div class="col-md-6">
                    <label for="source">Source</label>
                    <input type="text" name="source" id="source" class="form-control mb-2" />

                    <label for="recipient">Recipient</label>
                    <input type="text" name="recipient" id="recipient" class="form-control mb-2" />

                    <label for="recipient">Produk</label>
                    <input type="text" name="produk" id="produk" class="form-control mb-2" />

                    <label >Limit</label><br/>
                    <select name="limit" class="form-control" id="limit" required>
                        <option value="">Select Limit</option>
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="1000">1000</option>
                        <option value="5000">5000</option>
                        <option value="10000">10,000</option>
                        <option value="20000">20,000</option>
                    </select>


                    {{-- <label for="desc_info">Status Member</label>
                    <select class="form-control mb-2" name="status_member" id="status_member">
                        <option value="">-- Select Membership --</option>
                        <option value="1">Member</option>
                        <option value="0">Non Member</option>
                    </select>

                    <label for="desc_info">Status Cek Member</label>
                    <select class="form-control mb-2" name="status_cek_is_member" id="status_cek_is_member">
                        <option value="">-- Select Status Membership --</option>
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>

                    <label for="desc_info">Status Poin</label>
                    <select class="form-control mb-2" name="status_cek_poin" id="status_cek_poin">
                        <option value="">-- Select Status Poin --</option>
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select> --}}
                </div>
            </div>
            <span id="data_reference_download"></span>
            <input id="reference_download" type="hidden" name="reference_download" value="">
        {{-- </form> --}}
    </div>

    <div class="card-footer">
        <div class="float-right">
            <a type="button" class="btn btn-flat bg-primary" id="search"><i class="fas fa-search"></i> Filter</a>
            <button type="submit" class="btn btn-flat bg-fuchsia" id="download"><i class="fas fa-download"></i> Export Data Sales</button>
            <a type="button" id="reset" class="btn btn-flat bg-secondary  btn-reset"><i class="fas fa-undo-alt"></i> Reset</a>
        </div>
    </div>
</div>


    <div class="card">
        <div class="card-body">
            <div class="row pl-2" >
                    @csrf  
                    
                    {{-- import right side --}}
                    <button class="btn  btn-success mt-3 btn-import-sales" type="button" id="btn-import" data-toggle="modal" data-target="#information_modal"><i class="fas fa-upload"></i> Import Data Sales</button>
                        <div class="progress" id="progressBar" style="text-align: center;height:20px; display:none" >
                            <div class="bar" style="text-align: center;height:20px;"></div >
                            <div class="percent" style="text-align: center; height:20px; padding-top:10px;margin:none;">0%</div >
                        </div>
                    </div>
                </form>
            </div>
            

            
            @if(count($errors) > 0)
            <div class="alert alert-danger">
            Upload Validation Error<br><br>
            <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

            @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
            {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
            <a type="button" class="close" data-dismiss="alert">×</a>
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="row p-3">
                <div class="col-md-12">
                            <div class="table-responsive" id="">
                                <table class="table table-bordered" id="data_sales_table" style="width:100%;">
                                    <thead class="thead-light text-primary">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">ID Member</th>
                                            <th class="text-center">Batch</th>
                                            <th class="text-center">Order ID</th>
                                            <th class="text-center">Poin</th>
                                            <th class="text-center">No HP</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Source</th>
                                            <th class="text-center">Recipient</th>
                                            <th class="text-center">Produk</th>
                                            {{-- <th class="text-center">Status Member</th>
                                            <th class="text-center">Status Cek is Member</th>
                                            <th class="text-center">Status Cek Poin</th>
                                            <th class="text-center">Created At</th> --}}
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>





    <!-- left modal -->
    <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
            <div class="modal-dialog" role="document">
                <form method="post" action="" id="sales-import" enctype="multipart/form-data">
                    <div class="modal-content ">
                        <!-- <input type="hidden" name="email_e" value="admin@filmscafe.in"> -->
                        <div class="modal-header">
                        <h2 class="modal-title">Input Data Sales:</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body get_quote_view_modal_body">
                                    @csrf

                                    @if (session('error'))
                                        <div class="alert alert-success">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="">File (.xls, .xlsx)</label>
                                        <input type="file" class="form-control file" name="file">
                                        <p class="text-danger">{{ $errors->first('file') }}</p>

                                        <a href="" class="btn btn-info" ><i class="fas fa-download"></i>Download Template Excel</a>
                                    </div>

                                    <div class="">
                                        <p style="font-size:17px;font-weight:bold">Langkah-langkah import data sales</p>

                                        <ol>
                                        <li>Klik tombol <b> Browse</b> dan pilih file excel yang akan di import, <br> perhatikan limit pada saat import data excel maksimal 20.000 baris data </li>
                                        <br>
                                        <li>Klik tombol <b> Download Template Excel </b>untuk mendownload template excel,<br> template ini digunakan untuk menginput data sales secara manual </li>
                                        <br>
                                        <li>Pada Kolom <b> Tanggal di Template Excel </b>dengan Format <b> Text </b>  </li>
                                        <br>
                                        {{-- <li>Milk</li> --}}
                                        </ol> 
                                    </div>
                
                                    <span id="data_reference_import"></span>
                                    <input id="reference_import" type="hidden" name="reference_import" value="">
                                    <input id="type_input" type="hidden" name="type_input" value="import">
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</a>
                                    <button id="" type="submit" class="btn bg-lime btn-flat"><i class="fas fa-upload"></i> Import</button>
                                </div>


    

                    </div><!-- modal-content -->
                </form>
            </div><!-- modal-dialog -->
    </div><!-- modal -->






@stop
@section('custom_js')
<script type="text/javascript" src="{{ asset('vendor/datatables/FixedHeader-3.2.1/js/dataTables.fixedHeader.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var tabel = $('#data_sales_table').DataTable({
            processing: true,
            ordering: true,
            serverSide: true,
            // searching: false,
            ajax: {
                url: "",
                type: 'POST',
                data: function (d) {
                    d.id     = $('#id').val();
                    d.id_member     = $('#id_member').val();
                    d.batch         = $('#batch').val();
                    d.order_id      = $('#order_id').val();
                    d.poin          = $('#poin').val();
                    d.no_hp         = $('#no_hp').val();
                    d.tanggal       = $('#tanggal').val();
                    d.source        = $('#source').val();
                    d.recipient     = $('#recipient').val();
                    d.produk        = $('#produk').val();
                    // d.status_member         = $('#status_member').val();
                    // d.status_cek_is_member         = $('#status_cek_is_member').val();
                    // d.status_cek_poin         = $('#status_cek_poin').val();
                    // d.created_at         = $('#created_at').val();
                    d.limit             = $('#limit').val();
                    // d.created_at    = $('#created_at').val();
                }
            },
            deferRender: true,
            columns: [
                { "data": "id", "name": "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { "data": "id_member", "name": "id_member" },
                { "data": "batch", "name" : "batch" },
                { "data": "order_id", "name" : "order_id" },
                { "data": "poin", "name" : "poin" },
                { "data": "no_hp", "name" : "no_hp" },
                { "data": "tanggal", "name" : "tanggal" },
                { "data": "source", "name" : "source" },
                { "data": "recipient", "name" : "recipient" },
                { "data": "produk", "name" : "produk" },
                // { "data": "status_member", "name" : "status_member" },
                // { "data": "status_cek_is_member", "name" : "status_cek_is_member" },
                // { "data": "status_cek_poin", "name" : "status_cek_poin" },
                // { "data": "created_at", "name" : "created_at" },
                // { "data": "limit", "name" : "limit" },
            ],
            pageLength: 50,
            lengthMenu: [
                [ 10, 50, 100, 200, 300, 400, 500, 1000, 2000,4000,8000,10000,20000],
                [ '10 rows', '50 rows', '100 rows', '200 rows', '300 rows','400 rows', '500 rows', '1000 rows', '2000 rows', '4000 rows', '8000 rows', '10000 rows', '20000 rows']
            ]
        });



        $('#search').click(function(){
            tabel.draw();
        })

        $('#reset').click(function(e) {
            $("#search-form").trigger("reset");
            tabel.draw();
            e.preventDefault();
            $('.btn-reset').show();
            $(".info-limit").hide();
        });

    });


   

    // $(document).ready(function(){
    //     $("#formFilterHideShow").hide();

    //     $("#filterShowForm").click(function(){
    //         document.getElementById("formFilterHideShow").style.display = "block";
    //     });
    // });

    // show info in filter
    $(".btn-tool").click(function(){
    $(".info-limit").show();
    }); 

    // // hide info in filter
    // $(".collapsed-card").click(function(){
    // $(".info-limit").hide();
    // }); 


    // Import Form 
    $("#btn-import").click(function() {
            $("#importExcel").modal('show');
        });

        // Submit Form
        $("#btnImport").on('click',function (e) {
        const file = $('.file').val();
        if(file == ""){
            alert('Please choose file');
            return false;
        }
        document.getElementById('sales-import').submit();
        $("#progressBar").show();
    });

    </script>



    <script>
        $(document).ready(function(){

        $('#modal_view_left').modal({
            show: 'false'
        });

        $('#modal_view_right').modal({
            show: 'false'
        });

        });
    </script>

@stop


