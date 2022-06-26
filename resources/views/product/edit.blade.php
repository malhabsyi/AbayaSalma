<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('\css\style.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\product.css') }}">
    <title>Abaya Salma</title>
  </head>
  <body>
    <!-- Nav Bar -->
    <header class="bg-light w-100 p-2 pt-3 d-flex justify-content-between fixed-top">
        <div class="content">
            <div class="navigationBar">
                <button class='btn shadow-none' type="button" data-bs-toggle="modal" data-bs-target="#sidebar">
                    <span class="material-icons">menu</span>
                </button>
            </div>
        </div>

        <div class="header-center ps-5 ms-5">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/abaya-salma-text-logo.png') }}" alt="Logo" width="275"  class="ms-4 ps-2">
            </a>
        </div>

        <div class="header-end">
            <div class="d-flex">
                <button class="btn shadow-none mb-2 btn-language" id="language" type="button" onclick="showBahasa()">
                    Indonesia
                </button>
                <button class="btn shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#search">
                    <span class="material-icons">
                        search
                    </span>
                </button>
                <button class="btn shadow-none btn-akun" id="akun" type="button" onclick="showAccount()">
                    <span class="material-icons">
                        person_outline
                    </span>
                </button>
            </div>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- Table -->
    <div class="container mt-10">
        <div class="row">
        <div class="d-flex justify-content-evenly mb-auto p-2">
                <div class="product-menu">
                    <b class="product-menu">
                        Product Update
                    </b>
                </div>
                <div class="slider-menu">
                    <a href="/home-slider">
                        Slider Update
                    </a>
                </div>
            </div>
            <br>
            <div class="col-md-flex">
                @if(session('status'))
                    <h5 class=alert alert-success>{{ session('status') }}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Product
                            
                        </h5>
                        <a href="{{ url('home-product') }}" class="btn btn-primary float-right">back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="product_name" 
                                value = "{{ $product->product_name }}"
                                class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input type="text" name="product_desc" 
                                value = "{{ $product->product_desc }}"
                                class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="text" name="product_stock" 
                                value = "{{ $product->product_stock }}"
                                class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="product_harga" 
                                value = "{{ $product->product_harga }}"
                                class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="product_image" class="form-control">
                                <img src="{{ asset('uploads/product/'.$product->product_image) }}" width="100px"alt="">
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="checkbox" name="status"
                                value = "{{ $product->status == '0' ? 'visible':'hidden'}}">
                                
                                0=visible , 1=hidden
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal sidebar fade" id="sidebar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog sidebar-dialog">
            <div class="modal-content sidebar-content">
                <div class="modal-header sidebar-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li><a href="{{ route('home') }}">🔥 New Products</a></li>
                        <li><a href="{{ route('home') }}">💵 Payment Confirmation</a></li>
                        <li><a class="a_not_href" onclick="showList()">👕 Product Category</a></li>
                        <div id="list-products">
                            <li><a href="{{ route('home') }}">Crewneck</a></li>
                            <li><a href="{{ route('home') }}">Hoodie</a></li>
                            <li><a href="{{ route('home') }}">Shirt</a></li>
                            <li><a href="{{ route('home') }}">T-Shirt</a></li>
                            <li><a href="{{ route('home') }}">Long Sleeves</a></li>
                        </div>
                        

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-search fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog search-dialog">
            <div class="modal-content search-content">
                <div class="p-3">
                    <button type="button" class="btn-back" data-bs-dismiss="modal">
                        <span class="material-symbols-outlined">
                            keyboard_backspace
                        </span>
                    </button>
                </div>
                <div class="p-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" ">
                        <label for="floatingInput">Search</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Chat Bubble-->
    <div class="btn-chat">
        <button class="bg-dark pt-3 p-2 ps-3 pe-3 rounded-circle" id="btn-chat" onclick="showChat()">
            <span class="material-icons md-light">comment</span>
        </button>
    </div>

    <!--Chat Room-->
    <div class="chat" id="chat">
        <div class="chat-room d-flex flex-column justify-content-between">
            <div class="chat-header">
                <h3>Chat</h3>
            </div>
            <div class="chat-footer">
                <button class="btn btn-dark shadow rounded w-100 p-2"  href="https://wa.me/089638349624" target="_blank">Mulai Chat</button>
            </div>
        </div>
    </div>

    <!--Pilih Bahasa-->
    <div class="bahasa" id="bahasa">
        <div class="bahasa-session d-flex flex-column justify-content-between">
            <label for="Kirim">Kirim Ke</label>
            <select name="kirim" id="kirim" class="form-select">
                <option value="Indonesia">Indonesia</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Singapura">Singapura</option>
            </select>
            <label for="Kirim" class="mt-2">Bahasa</label>
            <select name="pilih-bahasa" id="pilih-bahasa" class="form-select">
                <option value="Indonesia">Indonesia</option>
                <option value="Inggris">Inggris</option>
            </select>
            <button onclick="changeBahasa()" class="btn btn-danger mt-3 mb-3">Save</button>
        </div>
    </div>

    <!--menu account-->
    <div class="account" id="account">
        <div class="account-session d-flex flex-column justify-content-between">
            <div class="menu-account d-flex flex-column">
                <a href="{{ route('home') }}">Profile</a>
                <a href="{{ route('homeproduct') }}">Dashboard</a> 
            </div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger shadow-none btn-logout" id="logout">Logout</button>
            </form>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#chat').css('display', 'none');
            $('#list-products').css('display', 'none');
            $('#list-dashboard').css('display', 'none');
            $('#bahasa').css('display', 'none');
            $('#account').css('display', 'none');

            function alignModal(){
                var modalDialog = $(this).find(".search-dialog");

                // Applying the top margin on modal to align it vertically center
                modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
            }
            // Align modal when it is displayed
            $(".modal-search").on("shown.bs.modal", alignModal);

            // Align modal when user resize the window
            $(window).on("resize", function(){
                $(".modal-search:visible").each(alignModal);
            });
        });

        function dismiss_sidebar(){
            $('#sidebar').modal('hide');
        }

        function showList(){
            var display = $('#list-products').css('display');

            if(display == "none"){
                $('#list-products').css('display', 'block');
                $('#list-products').css('padding-left', '40px');
            }else{
                $('#list-products').css('display', 'none');
            }
        }

        function showChat(){
            var display = $('#chat').css('display');

            if(display == "none"){
                $('#chat').css('display', 'block');
                document.getElementById('btn-chat').innerHTML = "<span class='material-icons md-light'>close</span>";
            }else{
                document.getElementById('btn-chat').innerHTML = "<span class='material-icons md-light'>comment</span>";
                $('#chat').css('display', 'none');
            }
        }

        function showBahasa(){
            var display = $('#bahasa').css('display');

            if(display == "none"){
                $('#bahasa').css('display', 'block');
            }else{
                $('#bahasa').css('display', 'none');
            }
        }

        function changeBahasa(){
            var bahasa = document.getElementById('pilih-bahasa').value;
            document.getElementById('language').innerHTML = bahasa;
            $('#bahasa').css('display', 'none');
        }
        function showAccount(){
            var display = $('#account').css('display');

            if(display == "none"){
                $('#account').css('display', 'block');
            }else{
                $('#account').css('display', 'none');
            }
        }
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>