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
    
    <div class="ui main text container">
        <div class="ui center aligned header">
            <h1>Ubah Data</h1>
        </div>

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

  </body>
</html>