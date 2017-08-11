
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Geo Blog POC - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css" />
    <style>
        body {
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            background-color: #fff;
        }

        .columns.is-fullheight {
            margin-bottom: 0;
        }

        .footer {
            margin-top:-10px;
        }

        .left-side .hero-body {
            background-color: #999;
            background-image: url('https://hd.unsplash.com/photo-1457365050282-c53d772ef8b2');
            -ms-background-position-x: center;
            -ms-background-position-y: bottom;
            background-position: center bottom;
            background-size: cover;
        }

        .left-side .hero-body .title {
            color: #fff;
            font-weight: lighter;
        }
        trix-toolbar .button_group button, trix-toolbar .button_group input[type=button] {
            display: block;
            text-indent: -9999em;
            text-transform: uppercase;
        }
        h1.blog-title{
            font-size: 25px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/trix/0.10.2/trix.css" />
</head>
<body>
@yield('content')
<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
                <a class="" href="https://github.com/intricateweb">
                    A proof of concept by Intricate Web LLC <i class="fa fa-github"></i>
                </a>
        </div>
    </div>
</footer>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/trix/0.10.1/trix.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(function() {
        $( ".write" ).click(function() {
            $( ".welcome" ).toggle();
            $( ".post-form" ).toggle();
        });
        $( ".blog-type" ).change(function() {
            var value = $(this).val();
            $( ".blog-field" ).hide().removeAttr('required');
            $( ".photo-field" ).hide().removeAttr('required');
            $( ".video-field" ).hide().removeAttr('required');
            $( "."+value+"-field" ).show().attr('required','required');
        });
    });
</script>
<script>
    $(function() {
        @if(session('success'))
        toastr.success('{{session('success')}}');
        @endif
        @if(session('error'))
        toastr.error('{{session('error')}}');
        @endif
    });
</script>
<script>
    (function() {
        var burger = document.querySelector('.nav-toggle');
        var menu = document.querySelector('.nav-menu');
        burger.addEventListener('click', function() {
            burger.classList.toggle('is-active');
            menu.classList.toggle('is-active');
        });
    })();
</script>
@stack('scripts')
</html>
