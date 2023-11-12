# Reto: Servicio para gestión de calidad de los anuncios
Esta prueba de código está hecha con Laravel.

## Modelos
Tenemos un modelo Ad y otro Picture cada uno con sus métodos y propiedades y estas, con sus getters para acceder a ellos.

## Controladores
* CalculateScoreController
    * Aquí tenemos el controlador que calcula la puntuación de cada anuncio siguiendo unas reglas.
    * **Nota:** en una aplicación completa esto sería mejor hacerlo en un servicio y no en un controlador.
    * Tenemos varias funciones:
        * calculateScore
            * Hace la suma de la puntuación obtenida en cada parte: por las fotos, por la descripción y por estar completo o no.
            * En caso de ser necesario ajusta la puntuación entre los límites establecidos (0 y 100).
            * Si la puntuación está por debajo de 40 se actualiza el anuncio guardando la nueva puntuación y actualizando la fecha de anuncio irrelevante.
            * En caso contrario, sólo se actualiza la puntuación.
        * scorePictures
            * Cuando el anuncio no tiene imágenes le resta 10 puntos.
            * Y si las tuviese, busca cada imagen para saber su calidad y sumar los puntos correspondientes en cada caso.
        * scoreDescription
            * Si el anuncio tiene descripción le suma 5 puntos.
            * Después calcula cuántas palabras tiene la descripción y le da una puntuación en función de varias reglas.
            * Utiliza un servicio para formatear la descripción y busca si contiene unas palabras concretas, dándole 5 puntos por cada una de ellas.
        * scoreCompleted
            * Comprueba si el anuncio tiene descripción y después comprueba los datos necesarios según la tipología.
            * Para acabar, si se cumplen unas reglas u otras le suma la puntuación.


* PublicListingController
    * Lista los anuncios para los usuarios.
        * Sin anuncios irrelevantes (puntuación menor de 40)
        * Ordenados de mejor a peor


* QualityListingController
    * Muestra al encargado de calidad los anuncios irrelevantes
        * Puntuación
        * Desde qué fecha es irrelevante


## Proveedor de servicios
* TextFormatProvider
    * Se utiliza al calcular la puntuación de la descripción de un anuncio. Transforma el texto a minúsculas y sin acentos para comprobar si contiene las palabras que suman más puntos.

