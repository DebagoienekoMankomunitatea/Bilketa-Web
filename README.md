# Bilketa Web

### Software necesario

php5 -> PHP 5.3+ (preferible 5.4)
zendframework -> Zend-framerwork 1.11+ (preferible 1.12)

php5-imagick
php5-curl
php5-pgsql
php5-mcrypt
php-apc
php-pear
php5-dev

postgresql-9.1-client-9.1
postgresql-9.1-server-9.1
postgresql-9.1-postgis

psql bilketa-web_db -c "CREATE EXTENSION postgis";

apt-get install zendframework php5-imagick php5-curl php5-pgsql php5-mcrypt php-apc postgresql-9.1 postgresql-9.1-postgis apache2 libapache2-mod-php5 subversion make php5-dev libyaml-dev libyaml-0-2-dev php-pear make

pecl install yaml


### Especificaciones FS

./web/application/cache > rw para apache y borrable en cualquier momento sin miedo.
./web/storage > rw para apache, pero no borrable (ficheros de usuario).


### php.ini


````bash

vim /etc/php5/apache2/php.ini

upload_max_filesize = 20M
post_max_size = 22M
memory_limit = 512M
max_execution_time = 120
php_flag magic_quotes_gpc off
extension=yaml.so

````

### apache2

Modificar el DocumentRoot

````bash
    DocumentRoot /var/www/bilketa-web/web/public

    <Directory /var/www/bilketa-web/web/public>
        Options Indexes FollowSymLinks -MultiViews
        AllowOverride All
        Order allow,deny
        allow from all
        AddOutputFilterByType DEFLATE application/json
    </Directory>
        
    <DirectoryMatch .*\.svn/.*>
        Deny From All
    </DirectoryMatch>

````

````bash
a2enmod rewrite
/etc/init.d/apache restart
````

### DATABASE (postgresql)

Si se trata de una instalación nueva: Crear base de datos bilketa-web_db y cargar ./dump/bilketa-web.sql

````bash

su - postgres
createuser bilketa-web_user -W
createdb -O bilketa-web_user -E UTF-8 -T template0 bilketa-web_db

psql -d bilketa-web_db < ./dump/bilketa-web.sql
````

### app configuration

Configuración entornos:

Settear la configuración para conectar con la base de datos

````bash
vim /web/application/configs/application.ini
````


Copiar:
````bash
cp web/public/.htaccess.production web/public/.htaccess
````

## Importante 

Dado que hay aplicaciones de terceros trabajando sobre la base de datos hay que tener en cuenta que:

A las siguiente tablas no se les podrá eliminar campos ni añadir campos obligatorios:

    Camiones,
    CentrosEmergencia,
    Compostadores,
    MarcasCompostador
    Municipios,
    PuntosDescarga,
    PuntosRecogida,
    PuntosRecogidaTipos,
    ResiduosTipos,
    Rutas,
    RutasRelPuntosRecogida,
    RutasTipos,

Y las vistas siguientes no podrían modificarse:

    cubodetalle,
    operariodetalle,
    posicionamientodetalle,
    postedetalle,
    puntosrecogidadetalle
    rutasdetallepuntos,
    rutasdetalle,
    turnosdetalle,
    turnosrutapuntos,
    turnosparadaspuntos,

Al menos no sin el consentimiento de gvSig o cliente


### API resquest examples

#### MAESTROS:

````
- fetchCubosTipos
    {
    "method": "fetchCubosTipos",
    "id":1,
    "jsonrpc":"2.0",
    "params":
        {
             "pagina" : 1

        }
    }

- fetchPostesTipos
    "pagina" : 1

- fetchPuntosRecogidaTipos
    "pagina" : 1

- fetchRecogidaTipos
    "pagina" : 1

- fetchResiduosTipos
    "pagina" : 1

- fetchRoles
    "pagina" : 1

- fetchRutasTipos
    "pagina" : 1

- fetchTiposIncidencias
    "pagina" : 1

- fetchPostes
    "pagina" : 1

- fetchMunicipios
    "pagina" : 1

- fetchMunicipioById
    "municipioId" : 1

- fetchPuntosDescarga
    "pagina" : 1
````


#### MARCAS:

````
- fetchMarcasCompostador
     "pagina" : 1

- fetchMarcasCubo
     "pagina" : 1

- fetchMarcasDispositivo
     "pagina" : 1

- fetchMarcasPoste
     "pagina" : 1
````

#### OTROS:

````
- fetchCamiones
     "pagina" : 1

- fetchCompostadoras
     "pagina" : 1

- fetchDispositivos
     "pagina" : 1

- fetchOperarios
     "pagina" : 1

- fetchPuntosRecogidaPendienteEnTurno
     "idTurno" : 5

- fetchPuntosRecogidaPorRuta
     "idRuta" : 1

- fetchRutas
     "pagina" : 1

- fetchTurnosEnCurso
     "pagina" : 1

- fetchTurnosPendientesDeHoy
     "pagina" : 1

- finalizarParada
     "idParada" : 10,
     "horaFin" : "12:00:00"

- iniciarParada
     "turnosCamionesId": 24,
     "horaInicio": "11:00:00",
     "puntosRecogidasId": 1

- iniciarTurno
     "turnoId": 5,
     "camionId": 11,
     "tabletId": 1,
     "operarios": [1,2,4],
     "primerPuntoRecogidaId": 2,
     "orden" : "desc"

- registrarDescarga
     "camionId" : 11,
     "puntoDescargaId" : 1,
     "kilos" : 100

- registrarPosicion (Pendiente de implementar)
    "turnosRelCamionesId" : "",
    "precision" : "",
    "createdOn" : "",
    "posicion"  : ""

- registrarTurno
     "rutaId" : 1,
     "fecha" : "2013-07-19",
     "horaInicio" : "11:00:00"

- reportarIncidenciaDePoste
     "paradaId" : 10,
     "posteId" : 5,
     "tipoId" : 3,
     "fecha" : "2013-07-19",
     "observaciones" : "Fire!"

- fetchPostesEnPuntoRecogida
     "puntoRecogidaId" : 1

- fetchCubosEnPuntoRecogida
     "puntoRecogidaId" : 3

- fetchCubosAsociadosPoste
     "posteId" : 6
````

