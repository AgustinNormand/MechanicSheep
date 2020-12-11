The next "mysql" directory is data directory, do not place anything there

El directorio mysql debería ser unicamente el directorio de datos, pero los certificados estan ahí tambien porque sino no anda.
Hay que ejecutar docker-compose up -d, dejar que mysql llene el directorio mysql, luego poner los certificados para no hacer override
