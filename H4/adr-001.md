# ADR — Uso de Strategy y Observer
## Contexto

El sistema de tienda e inventario necesita mantener su lógica de negocio organizada y permitir realizar cambios sin afectar todo el sistema.

También se necesita manejar diferentes formas de realizar algunas operaciones y comunicar ciertos cambios a otras partes del sistema.

## Decisión

Se decidió implementar los patrones **Strategy** y **Observer** dentro de la lógica de negocio.

**Strategy** se utilizará cuando una operación pueda tener diferentes formas de realizarse. Así podremos cambiar la estrategia sin modificar directamente la lógica principal.

**Observer** se utilizará cuando ocurra un cambio importante en el sistema y sea necesario avisar automáticamente a otros componentes que estén interesados.

## Justificación

Se eligieron estos patrones porque ayudan a separar responsabilidades y hacen que la lógica de negocio sea más flexible.

De esta manera, si en el futuro necesitamos cambiar una estrategia o agregar una nueva reacción ante un evento, no será necesario modificar todo el sistema.

## Consecuencias

Como beneficio, el sistema será más fácil de modificar y mantener.

Como consecuencia, se tendrán algunas clases adicionales para implementar los patrones y las relaciones entre ellas serán un poco más complejas.

