### P1.1 — Detectar (5 puntos)
Un archivo `detecciones.md` con una tabla de 4 filas. Por cada violacion:
- que principio se viola (S, O, L/I o D),
- donde vive (clase y metodo),
- por que es una violacion (1 a 2 lineas con TUS palabras).

Nº          Principio	                            ¿Dónde está?        	        ¿Por qué viola el principio?

1		S — Una clase, una responsabilidad        GestorDePedidos.ProcesarPedido()     Este método hace varias cosas: calcula el descuento, guarda el                                                                                             pedido, imprime el comprobante y envía un correo.
                                                                                    No tiene una sola responsabilidad.

2		I — Interfaces pequeñas y específicas      IEmpleadoDeFerreteria                La interfaz tiene varias funciones diferentes y obliga al Vendedor a                                                                                implementar funciones que no necesita, como ajustar precios y ver reportes.	

3		L — El hijo debe poder sustituir al padre      Vendedor                      Vendedor implementa IEmpleadoDeFerreteria, pero no puede realizar algunos
                                                                                métodos y lanza NotSupportedException. Por eso no puede sustituir
                                                                                  correctamente a una implementación completa de esa interfaz.	
                                                                                  
4	 D — Depender de abstracciones,             GestorDePedidos.ProcesarPedido()     El gestor crea directamente BaseDeDatosMySql y CorreoSmtp. Está 
   no de implementaciones concretas		                                             dependiendo de clases concretas en vez de utilizar abstracciones.
