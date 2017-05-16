<html>
<head>
    <meta charset="UTF-8">
    <title>Compra</title>
</head>
<body>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Tienda de celulares</h1>
        <p>Regresar a productos <a href="/public">aquí</a></p>
        
       
            <table class="table table-bordered">
            <div class="row">
              <div class=" col-md-6">
                <div class="thumbnail">
                 <!-- <img src="..." alt="..."> -->
                  <div class="caption">
                    <h3>{{ $celular->titulo }}</h3>
                    <p>${{ round($celular->precio) }}</p>
                    <p>{{ $celular->descripcion }}</p>
                    <p><a  id="miBoton" class="btn btn-primary"  class="btn btn-primary" role="button">Pagar</a> </p>
                    Acepto los <a href="#">términos y condiciones </a><input type="checkbox" id="toa"/>
                 
                  </div>
                </div>
              </div>
            </div>
            </table>
    
   
      </div>
   </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Una implementación de Culqi en Laravel</p>
      </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Axios for ajax requests -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.1/axios.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../sticky-footer.css" rel="stylesheet">
    <script src="https://checkout.culqi.com/v2"></script> 
    
    <script>  
        Culqi.publicKey = 'pk_test_iM2mPZKwmg9ap3kq';
        Culqi.settings({
            title: 'Anime Toys',
            currency: 'PEN',
            description: 'Eva 05 Bandai Figure',
            amount: 35000
        });
        
    </script> 
    <script>
        
        var payButton = document.getElementById('miBoton');
        payButton.addEventListener('click', function(e){
            var toa = document.getElementById('toa');
            if(toa.checked){
                 // Abre el formulario con las opciones de Culqi.settings
                Culqi.open();
                e.preventDefault();
            }else{
                alert('acepta los terminos y condiciones.')
            }      
        });
        
    </script>
    <script>  

    function culqi() {
      if (Culqi.token) {
          console.log("iniciando ajax");
          // Imprimir Token
          axios({
                method: 'POST',
                headers: {'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-Token': "{{csrf_token()}}",
                },
                data: { "token": Culqi.token.id },
                url:"/pagar"
                
          }).then(
            function(data) {
               var result = "";
               if(data.constructor == String){
                   result = JSON.parse(data);
               }
               if(data.constructor == Object){
                   result = JSON.parse(JSON.stringify(data));
               }
               if(result.object === 'charge'){
                console.log(result.outcome.user_message);
               }
               if(result.object === 'error'){
                   console.log(result.merchant_message);
               }
             }
          ).catch(
            function(error) {
                console.log(error);
            }
          );
          
      } else {
        // Hubo un problema...
        // Mostramos JSON de objeto error en consola
        console.log("hubo un mensaje de error");
        console.log(Culqi.error.merchant_message);
        
      }
    };
</script>
    </script>  
 
</body>
</html>