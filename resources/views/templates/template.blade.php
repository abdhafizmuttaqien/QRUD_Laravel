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
            <a id="input_modal" href="#" class="ui primary labeled icon button">
                <i class="boxes icon"></i>
                Tambah Data
            </a>                     
        </div>
        
        <table id="example" class = "ui celled table center aligned">
            <thead>
                <tr>
                <th>No</th>
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
                    <td>{{$list->nama_barang}}</td>
                    <td>{{$list->stok}}</td>
                    <td>{{$list->jumlah_terjual}}</td>
                    <td>{{$list->created_at->format('d-m-Y')}}</td>
                    <td>{{$list->jenis_barang}}</td>
                    <td>
                        <div class="ui buttons">
                                <a href="/ubah/{{$list->id}}" class="ui positive button">Edit</a>
                            <div class="or" data-text="or"></div>
                            <form method="post" action="/delete/{{$list->id}}">
                            @method('delete')
                            @csrf
                                <button class="ui negative button">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr> 
                <?php $count++ ?>
                @endforeach           
            </tbody>
        </table>
        
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

    <!-- form edit with modal 
    <div id="modaledit" class="ui modal">
        <div class="ui center aligned header">Edit Data</div>
        <div class="scrolling content">
            <form method="post" action="{{url('/ubah/')}}" class="ui form">
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
    </div>-->



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
        $('#example').DataTable();
    } );
    </script>   
    
    <script>
        $( "#input_modal" ).click(function() {
            $("#modalinput").modal('show');
        });
    </script>

<!-- get data to modal edit data 
    <script>
        $( "#edit_modal" ).click(function() {
            // var user_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: "{{url('/edit/5')}}",
                dataType: 'json',
                contentType: 'application/json',
                // data: {
                //     date: date
                // },
                success: function(data){
                    console.log(data.data);
                    $("#modaledit").modal('show');
                    $('#id').val(data.data.id);
                    $('#nama_barang').val(data.data.nama_barang);
                    $('#stok').val(data.data.stok);
                    $('#jumlah_terjual').val(data.data.jumlah_terjual);
                    $('#jenis_barang').val(data.data.jenis_barang);
                    $('#id').val(data.data.id);
                    var id  = data.data.id;
                    console.log(id);
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        });

        $( "#update_button" ).click(function() {
            // var user_id = $(this).data('id');
            var id = document.getElementById("#id").value;
            console.log(id);
            // $.ajax({
            //     type: 'GET',
            //     url: "{{url('/edit/5')}}",
            //     dataType: 'json',
            //     contentType: 'application/json',
            //     // data: {
            //     //     date: date
            //     // },
            //     success: function(data){
            //         console.log(data.data);
            //         $("#modaledit").modal('show');
            //         $('#id').val(data.data.id);
            //         $('#nama_barang').val(data.data.nama_barang);
            //         $('#stok').val(data.data.stok);
            //         $('#jumlah_terjual').val(data.data.jumlah_terjual);
            //         $('#jenis_barang').val(data.data.jenis_barang);
            //         var id  = data.data.id;
            //         console.log(id);
            //     },
            //     error: function(xhr){
            //         console.log(xhr.responseText);
            //     }
            // });
        });

    </script> -->

  </body>
</html>