# Pokédex en Laravel

Este proyecto es una Pokédex desarrollada en Laravel que permite consultar información de Pokémon usando la [PokeAPI](https://pokeapi.co/) y guardarla en una base de datos MySQL. Además, la aplicación muestra un nuevo Pokémon aleatorio cada 30 segundos automáticamente y permite guardar los datos del Pokémon mostrado en la base de datos.

## Tecnologías utilizadas

- **Backend**: Laravel 11, MySQL
- **Frontend**: Tailwind CSS, JavaScript
- **API**: PokeAPI para la obtención de datos de Pokémon

## Funcionalidades

- **Mostrar Pokémon aleatorio**: Muestra un Pokémon aleatorio en la vista cada 30 segundos sin necesidad de recargar la página.
- **Guardar en la base de datos**: Permite guardar en la base de datos el nombre, ID y URL de la imagen del Pokémon que se está mostrando.
- **Listar Pokémon guardados**: Una vista que muestra todos los Pokémon almacenados en la base de datos.

## Instalación y configuración

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/PoquetzSY/Pokedex_Laravel.git
   cd Pokedex_Laravel
   ```

2. **Instalar dependencias**
   
   Asegúrate de tener Composer instalado, luego ejecuta:

   ```bash
   composer install
   ```

3. **Configurar el archivo .env**
   Crea una copia del archivo .env.example y renómbralo a .env:

    ```bash
    cp .env.example .env
    ```

4. **Configura las credenciales de la base de datos en el archivo .env:**

    ```bash
    DB_CONNECTION=BASE_DE_DATOS
    DB_HOST=URL_HOST
    DB_PORT=PUERTO_DB
    DB_DATABASE=NOMBRE_DE_LA_TABLA
    DB_USERNAME=USUARIO
    DB_PASSWORD=CONTRASEÑA
    ```

5.  **También puedes definir la URL base de la PokeAPI en el archivo .env:**

    ```bash
    URL_API=https://pokeapi.co/api/v2/
    ```

6.  **Generar la clave de la aplicación**

    ```bash
    php artisan key:generate
    ```

7.  **Ejecutar las migraciones**

    Crea la base de datos y ejecuta las migraciones para crear las tablas necesarias:

    ```bash
    php artisan migrate
    ```

8.  **Iniciar el servidor**

    Ejecuta el servidor local de Laravel:

    ```bash
    php artisan serve
    ```
    
    La aplicación estará disponible en http://localhost:8000.

## Uso

### Mostrar Pokémon aleatorio

En la página principal, se mostrará un Pokémon aleatorio que se actualiza automáticamente cada 30 segundos.

### Guardar Pokémon en la base de datos

En la página principal, haz clic en el botón **Guardar en DB** para guardar el Pokémon actual en la base de datos. Esto almacena el nombre, la URL de la imagen y el ID en la tabla `pokedex`.

### Listar Pokémon guardados

Visita la ruta `/saved` para ver una lista de todos los Pokémon que has guardado en la base de datos.

## Archivos principales

- **Controladores**:
  - `PokedexController.php`: Maneja la obtención de Pokémon aleatorios desde la API y el guardado en la base de datos.

- **Modelos**:
  - `Pokedex.php`: Modelo de Eloquent para interactuar con la tabla `pokedex`.

- **Vistas**:
  - `welcome.blade.php`: Página principal donde se muestra el Pokémon aleatorio y el botón para guardar en la base de datos.
  - `saved.blade.php`: Vista para listar los Pokémon guardados en la base de datos.

## Ejemplo de configuración de rutas

    use App\Http\Controllers\PokemonController;

    Route::get('/', [PokemonController::class, 'index'])->name('home');
    Route::post('/guardar-pokemon', [PokemonController::class, 'store'])->name('storePokemon');
    Route::get('/pokemons', [PokemonController::class, 'show'])->name('pokemons.list');
    Route::get('/api/random-pokemon', [PokemonController::class, 'getRandomPokemon'])->name('api.randomPokemon');

## Personalización

Si deseas cambiar el intervalo de tiempo en el que se muestra un nuevo Pokémon, puedes modificar el valor de `setInterval` en el archivo `welcome.blade.php`:

    setInterval(fetchRandomPokemon, 30000);
    

## Créditos

Este proyecto utiliza la [PokeAPI](https://pokeapi.co/) para obtener la información de los Pokémon.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT.
