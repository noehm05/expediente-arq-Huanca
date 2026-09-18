## Nivel 1 — Contexto del sistema TIENDA CON INVENTARIO (LIBRERIA) NOELIA HUANCA MAMANI

En este nivel mostramos el sistema de la librería desde una vista general. 
```mermaid
flowchart TB

    encargada["👩 Encargada<br><br>Registra ventas físicas<br>Administra productos<br>Controla inventario"]

    dueña["👩‍💼 Dueña<br><br>Administra usuarios<br>Consulta ventas<br>Revisa inventario y reportes"]

    sistema["📚 SISTEMA DE TIENDA E INVENTARIO<br>PARA LIBRERÍA<br><br>Gestiona ventas físicas,<br>productos, inventario, usuarios<br>y reportes"]

    impresora["🖨️ Impresora<br><br>Imprime comprobantes<br>y reportes"]

    encargada -->|"registra y administra"| sistema
    dueña -->|"administra y consulta"| sistema
    sistema -->|"envía información"| impresora
```

### Elementos del contexto

**Encargada:** es la persona que utiliza el sistema para realizar las actividades diarias de la librería. Registra las ventas físicas, administra los productos y controla el inventario.

**Dueña:** utiliza el sistema para administrar la librería. Puede consultar las ventas, revisar el inventario, consultar reportes y administrar los usuarios y permisos.

**Sistema de tienda e inventario:** es el sistema principal de la librería. Su función es gestionar las ventas físicas, los productos, el inventario, los usuarios y los reportes.

**Impresora:** es un elemento externo que se relaciona con el sistema. El sistema puede enviar la información necesaria para imprimir comprobantes de venta y reportes.

### Relaciones principales

* La **Encargada** utiliza el sistema para registrar y administrar las actividades de la librería.
* La **Dueña** utiliza el sistema para administrar y consultar información.
* El **Sistema** envía información a la **Impresora** para generar comprobantes y reportes.

   ## Nivel 2 — Contenedores (el zoom adentro del sistema)
La pregunta que responde: ¿de qué piezas ejecutables/almacenes está hecho el sistema? Cada contenedor es algo que corre o almacena: la aplicación web, la base de datos, un servicio.
```mermaid
flowchart LR

    encargada["👩 Encargada<br><br>Registra ventas<br>Administra productos<br>Controla inventario"]

    dueña["👩‍💼 Dueña<br><br>Administra usuarios<br>Consulta ventas<br>Consulta inventario<br>Genera reportes"]

    subgraph sistema["📚 SISTEMA DE TIENDA E INVENTARIO PARA LIBRERÍA"]

        webapp["🌐 APLICACIÓN WEB<br><br>PHP + HTML + CSS<br><br>Login · Ventas · Productos<br>Inventario · Reportes"]

        api["⚙️ API / LÓGICA DE NEGOCIO<br><br>PHP<br><br>Reglas de ventas e inventario<br>Gestión de productos y usuarios<br>Generación de reportes<br><br>🔄 Strategy · 🔔 Observer"]

        bd[("🗄️ BASE DE DATOS<br><br>MySQL<br><br>Usuarios · Productos<br>Ventas · Inventario<br>Movimientos")]

    end

    impresora["🖨️ Impresora<br>Externa"]

    encargada -->|"utiliza"| webapp
    dueña -->|"utiliza"| webapp

    webapp -->|"solicita operaciones"| api
    api -->|"guarda y consulta"| bd

    api -->|"genera comprobantes y reportes"| impresora
```

### 🔄 Relación entre los contenedores

La Encargada y la Dueña utilizan la **Aplicación Web**.

La Aplicación Web envía las solicitudes a la **API / Lógica de Negocio**.

La API procesa las reglas del sistema y se comunica con la **Base de Datos** para guardar o consultar información.

Cuando se necesita generar un comprobante o reporte físico, la aplicación envía la información a la **Impresora**.

