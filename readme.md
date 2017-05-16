# Una implementación de Culqi en Laravel 

Implementación basada en la documentación de https://developers.culqi.com/

## Para iniciar

* Clona el proyecto
* Genera tu .env file
* Crea tu BBDD
* Ejecuta  ```artisan migrate --seed```
* En ```resources/views/celular.blade.php``` coloca tu PUBLIC_API_KEY
* En ```App\Http\routes.php coloca tu SECRET_API_KEY```

## Notas

* Se usa [axios](https://www.npmjs.com/package/axios) como librería de AJAX en vez de jQuery. Ahora Laravel está muy unido a VueJS, y Vue utiliza **axios** por debajo.




