# Eventalia
### Aplicación web para para eventos

---

### Índice

- [Eventalia](#eventalia)
    - [Aplicación web para para eventos](#aplicación-web-para-para-eventos)
    - [Índice](#índice)
  - [1 Introducción](#1-introducción)
    - [1.1 Objetivo](#11-objetivo)

---

## 1 Introducción

Nuestra aplicación es una herramienta que te permite crear y gestionar eventos de manera sencilla y eficiente. Con esta aplicación, podrás organizar eventos de todo tipo, desde conferencias y reuniones hasta fiestas y conciertos. A continuación, te presentamos algunas de las características clave de nuestra aplicación:

- Creación de eventos: Puedes crear eventos personalizados, especificando el título, la fecha, la ubicación y otros detalles relevantes. Además, puedes agregar una descripción del evento y subir imágenes relacionadas.


- Necesidad de realizar la lectura, actualización, creación y eliminación (CRUD: _create_, _update_ _read_ y _delete_).

- Incluir una interfaz usable para la creación de los eventos.

- Disponer de un sistema de almacenamiento de los datos que garantice consistencia, disponibilidad, eficiencia, etc. en las operaciones CRUD.


- Habilitar un disparador que se active cuando el la fecha del evento esta cerca.

- Poder ofrecer ciertos datos relevantes en la toma de decisiones a la hora de asistir a un evento, ver lista o número total de participantes.

- Asignar roles a las diferentes personas que tengan acceso a la aplicación.

### 1.1 Objetivo

El resultado de este proyecto debiera entregar una aplicación web de eventos. Dicha aplicación deberá ser capaz de resolver las necesidades básicas relacionadas para una persona que quiera buscar y apuntarse a un evento. Dicha aplicación implicará un _front end_ (HTML, CSS y JavaScript) y un _back end_ (PHP, PgSQL), abarcando ambos frentes con el framework de Laravel en la versión 9 _full stack_.

### 2 Requisitos

A continuación se detallan los requisitos funcionales para cada parte interesada y, seguidamente, los requisitos no funcionales y de sistema.

### 2.1 Funcionales

#### **Usuario_Anónimo**

- RF_Usuario_Anónimo_01: Buscar evento

#### **Usuario_Registrado**

- RF_Usuario_Registrado_01: Buscar evento 
- RF_Usuario_Registrado_02: Añadir evento 
- RF_Usuario_Registrado_03: Modificar datos evento
- RF_Usuario_Registrado_04:  Eliminar evento

#### **Super usuario**

- RF_SuperUsuario_01: Buscar evento
- RF_SuperUsuario_02: Añadir evento
- RF_SuperUsuario_03: Modificar datos evento
- RF_SuperUsuario_04: Eliminar evento
- RF_SuperUsuario_07: Ver estadísticas del evento
