<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BMA-SOLUÇÕES DIGITAIS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <style>
        .datepicker {
            z-index: 9999 !important; /* Certifique-se de que a classe datepicker fique acima dos elementos modais */
        }
    </style>

</head>
<body>
<div class="container">
    @yield('content')
</div>
@include('modal')
<script>
    $(document).ready(function(){
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>

</body>
</html>
