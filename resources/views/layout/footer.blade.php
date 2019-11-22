        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/jquery.mask.min.js')}}"></script>

        <script>
            $(document).ready(function(){
                $('.cep').mask('00000-000');
                $('.telefone').mask('(00) #0000-0000');

                $('.add').on('click', function(){
                    $('.endereco').clone().appendTo('.enderecos');
                })
            })
        </script>
    </body>
</html>