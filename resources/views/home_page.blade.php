<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/semantic.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.semanticui.min.css')}}" >  

    <style type="text/css">
        body {
            background-color: #FFFFFF;
        }
        .ui.menu .item img.logo {
            margin-right: 1.5em;
        }
        .main.container {
            margin-top: 7em;
        }
        .wireframe {
            margin-top: 2em;
        }
        .ui.footer.segment {
            margin: 5em 0em 0em;
            padding: 5em 0em;
        }
    </style>

    <title>List Barang</title>
  </head>
  <body>
    
    <div class="ui fixed inverted menu">
        <div class="ui container">
            <a href="#" class="header item">
                <img class="logo" src="{{ asset('img/logo.png')}}">
                Project Qtasnim
            </a>
            <!-- <a href="{{url('/transaksi')}}" class="item">Transaksi</a>
            <a href="{{url('/barang')}}" class="item">Barang</a> -->
        </div>
    </div>
    
    <div class="ui main container">
        <div class="ui center aligned header">
            <h1>Data Tabel</h1>
        </div>
        <div class="ui container"  style="margin-bottom:1.5em;">
            <a id="input_modal" class="ui primary labeled icon button">
                <i class="boxes icon"></i>
                Tambah Data
            </a>                     
        </div>
            <div class="table-responsive">
                <table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
                <!-- <table id="example" class = "ui celled table center aligned responsive"> -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Jumlah Terjual</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jenis Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                        @foreach( $data as $list)
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$list->id}}</td>
                            <td>{{$list->nama_barang}}</td>
                            <td>{{$list->stok}}</td>
                            <td>{{$list->jumlah_terjual}}</td>
                            <td>{{$list->created_at->format('d-m-Y')}}</td>
                            <td>{{$list->jenis_barang}}</td>
                            <td>
                                <div class="ui buttons">
                                        <!-- <a href="/ubah/{{$list->id}}" class="ui positive button">Edit</a> -->
                                        <!-- <input type="hidden" id="id" value="{{$list->id}}"> -->
                                        <a class="ui positive button edit">Edit</a>
                                    <div class="or" data-text="or"></div>
                                    <form method="post" action="/delete/{{$list->id}}">
                                    @method('delete')
                                    @csrf
                                        <button data-id="{{ $list->id }}" class="ui negative button delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr> 
                        <?php $count++ ?>
                        @endforeach           
                    </tbody>
                </table>       
            </div>   
        </div>   

    <!-- form input with modal -->
    <div id="modalinput" class="ui modal">
        <div class="ui center aligned header">
            Input Data
        </div>
        <div class="scrolling content">
            <form method="post" action="{{url('/input')}}" class="ui form">
            @csrf
                <div class="field">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" placeholder="Nama Barang">
                </div>
                <div class="field">
                    <label>Stok</label>
                    <input type="text" name="stok" placeholder="Stok">
                </div>
                <div class="field">
                    <label>Jumlah Terjual</label>
                    <input type="text"  name="jumlah_terjual" placeholder="Jumlah Terjual">
                </div>
                <div class="field">
                    <label>Jenis Barang</label>
                    <input type="text" name="jenis_barang" placeholder="Jenis Barang">
                </div>
                <button class="ui button" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- form edit with modal  -->
    <div id="modaledit" class="ui modal">
        <div class="ui center aligned header">Edit Data</div>
        <div class="scrolling content">
            <form method="post" action="/edit" id ="editform" class="ui form">
            @csrf
                <input type="hidden" id="id" name="id"> 
                <div class="field">
                    <label>Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                </div>
                <div class="field">
                    <label>Stok</label>
                    <input type="text" id="stok" name="stok" placeholder="Stok">
                </div>
                <div class="field">
                    <label>Jumlah Terjual</label>
                    <input type="text" id="jumlah_terjual" name="jumlah_terjual" placeholder="Jumlah Terjual">
                </div>
                <div class="field">
                    <label>Jenis Barang</label>
                    <input type="text" id="jenis_barang" name="jenis_barang" placeholder="Jenis Barang">
                </div>
                <button id="update_button" class="ui button" type="submit">Submit</button>
            </form>
        </div>
    </div>



    <div class="ui inverted vertical footer segment">
        <div class="ui center aligned container">
            <div class="ui inverted section"></div>
            <img src="{{ asset('img/logo.png')}}" class="ui centered mini image">
            <div class="ui horizontal inverted small divided link list">
                <a class="item" href="#">Site Map</a>
                <a class="item" href="#">Contact Us</a>
                <a class="item" href="#">Terms and Conditions</a>
                <a class="item" href="#">Privacy Policy</a>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('semantic/jquery.min.js') }}"></script>
    <script src="{{ asset('DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('DataTables/DataTables-1.10.24/js/dataTables.semanticui.min.js') }}"></script>
    <script src="{{ asset('semantic/semantic.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                "columnDefs": [
                        { 
                            "visible": false, 
                            "targets": 1 
                        }
                    ]
                });
    });
    </script>  

<!-- Input data Show Modal  -->
    <script>
        $( "#input_modal" ).click(function() {
            $("#modalinput").modal('show');
        });
    </script>

<!-- Update Data Using Modal   -->
    <script>    
        $(document).ready(function() {
            var table = $('#example').DataTable();

            table.on('click','.edit', function(){

                var data = table.row(this).data();
                var id = data[1];

                $.ajax({
                    type: 'GET',
                    // url: "{{url('/edit/5')}}",
                    url: '/edit/' + id,
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function(data){
                        // console.log(data.data);
                        $('#id').val(data.data.id);
                        $('#nama_barang').val(data.data.nama_barang);
                        $('#stok').val(data.data.stok);
                        $('#jumlah_terjual').val(data.data.jumlah_terjual);
                        $('#jenis_barang').val(data.data.jenis_barang);
                        $('#editform').attr('action','/edit/'+id);
                        $("#modaledit").modal('show');
                    },
                    error: function(xhr){
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>    
        $('.delete').click(function() {
            // var table = $('#example').DataTable();

            // table.on('click','.delete', function(){

            //     var data = table.row(this).data();
            //     var id = data[1];

            //     //$('#deleteform-'+id).submit();
            //     document.getElementById('deleteform-'+id).submit();
            // });
            var id = $(this).data("id");
            document.getElementById('deleteform-'+id).submit();
        });
    </script>   

  </body>

</html>