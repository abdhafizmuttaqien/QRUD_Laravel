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
            <a href="{{url('/transaksi')}}" class="item">Transaksi</a>
            <a href="{{url('/barang')}}" class="item">Barang</a>
        </div>
    </div>
    
    <div class="ui main text container">
        <div class="ui center aligned header">
            <h1>Ubah Data</h1>
        </div>
        <!-- <div class="ui container"  style="margin-bottom:1.5em;">
            <a id="input_modal" href="#" class="ui primary labeled icon button">
                <i class="boxes icon"></i>
                Tambah Data
            </a>                     
        </div> -->
        
        <form method="post" action="/ubah/{{$data->id}}" class="ui form">
            @csrf
                
                <div class="field">
                    <label>Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" value="{{$data->nama_barang}}">
                </div>
                <div class="field">
                    <label>Stok</label>
                    <input type="text" id="stok" name="stok" value="{{$data->stok}}">
                </div>
                <div class="field">
                    <label>Jumlah Terjual</label>
                    <input type="text" id="jumlah_terjual" name="jumlah_terjual" value="{{$data->jumlah_terjual}}">
                </div>
                <div class="field">
                    <label>Jenis Barang</label>
                    <input type="text" id="jenis_barang" name="jenis_barang" value="{{$data->jenis_barang}}">
                </div>
                <button id="update_button" class="ui button" type="submit">Submit</button>
            </form>
        
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
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <script src="{{ asset('semantic/jquery.min.js') }}"></script>
    <!-- <script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="{{ asset('DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js') }}"></script>
    <!-- <script scr="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
    <script src="{{ asset('DataTables/DataTables-1.10.24/js/dataTables.semanticui.min.js') }}"></script>
    <!-- <script scr="https://cdn.datatables.net/1.10.24/js/dataTables.semanticui.min.js"></script> -->
    <script src="{{ asset('semantic/semantic.min.js') }}"></script>
    <!-- <script scr="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script> -->

    
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

    </script>

  </body>
</html>