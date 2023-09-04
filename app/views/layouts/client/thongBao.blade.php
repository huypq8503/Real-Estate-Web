@if(isset($_SESSION['thong_bao']))
    <script>
        window.onload = function (){
            Swal.fire({
                title: '{{$_SESSION['thong_bao']}}',
                width: 650,
                allowOutsideClick: true,
                padding: '3em',
                color: '#716add',
                background: '#fff url({{BASE_URL."public/images/img.png"}})',
                backdrop: `
    rgba(0,0,123,0.4)
    url("{{BASE_URL."public/images/gif.gif"}}")
    left top
    no-repeat
  `
            })
        }
    </script>
    @unset($_SESSION['thong_bao'])
@endif