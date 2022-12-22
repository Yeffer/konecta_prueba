##PRUEBA KONECTA - BY YEFFER

1. Tener en el sistema operativo composer de manera global
2. Tener instalado GIT
3. Tener instalado node.js: -npm i
4. Tener instalado composer
5. Contar con un entorno de desarrollo como Xamp, Wamp o Laragon
6. Clonar el repositorio del proyecto en: https://github.com/Yeffer/konecta_prueba.git
7. Instalar dependencias del proyecto composer install
8. Generar archivo .env (Compartido en el correo)
9. Crear la siguiente base de datos: CREATE DATABASE `konecta_prueba` /*!40100 COLLATE 'utf8_bin' */
10. Agregar información de variables globales .ENV (Configirar conexión a DB creada)
11. Ejecutar el siguiente comando desde consola en la ubicación del proyecto: composer dump-autoload
12. Crear migraciones: php artisan migration
13. Correr los seeds: php artisan db:seed --class=UserSeeder
14. Inicializar el proyecto con el siguiente comando: php artisan serve
    Ir a la URL proporcionada por el anterior comando ejm: http://127.0.0.1:8000/


15. CONSULTAS ADICIONALES
 ->consulta del producto que más stock tiene:

    SELECT id, name, reference, price, weight, stock
    FROM konecta_prueba.products
    WHERE stock IN (SELECT max(stock) FROM products);

->consulta de ventas que más stock tiene.

    SELECT P.id, P.name as Nombre, P.reference as Referencia, C.name AS Categoria, P.price as Precio, P.weight as Peso, P.stock, s.quantity AS Cantidad 
    FROM konecta_prueba.products P 
    INNER JOIN konecta_prueba.sales s  ON P.id = s.product_id 
    INNER JOIN konecta_prueba.categories C ON P.category_id = C.id 
    WHERE s.quantity IN (SELECT MAX(quantity) FROM konecta_prueba.sales);
