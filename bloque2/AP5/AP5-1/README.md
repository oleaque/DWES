# DWES → AP5-0 - CRUD con Doctrine ORM

## Descripción:

Este proyecto es una evolución del **AP4-1** (Introducción a Doctrine), donde se añaden las operaciones CRUD completas al sistema de gestión de tareas. Se integra el ORM Doctrine con un sistema MVC funcional para crear una aplicación web completa.

## Estructura del Proyecto:

```
AP5-0/
├── config/
│   └── rutas.json          # Configuración de rutas de la aplicación
├── public/
│   ├── index.php           # Punto de entrada de la aplicación
│   └── assets/             # Plantillas HTML
│       ├── main.html       # Página principal
│       ├── list.html       # Listado de tareas
│       ├── detail.html     # Detalle de una tarea
│       ├── form.html       # Formulario crear/editar
│       └── 404.html        # Página de error
├── src/
│   ├── Controllers/
│   │   ├── MainController.php    # Controlador principal
│   │   └── TaskController.php    # Controlador de tareas (CRUD)
│   ├── Core/
│   │   ├── Dispatcher.php        # Dispatcher de rutas
│   │   ├── EntityManager.php     # Gestor de Doctrine
│   │   ├── Request.php           # Gestión de peticiones HTTP
│   │   └── RouteCollection.php   # Colección de rutas
│   ├── Entity/
│   │   └── Task.php              # Entidad Task (Doctrine)
│   ├── Repository/
│   │   └── TaskRepository.php    # Repositorio de tareas
│   └── Views/
│       ├── MainView.php          # Vista principal
│       ├── ListTasksView.php     # Vista lista de tareas
│       ├── DetailTaskView.php    # Vista detalle de tarea
│       └── FormTaskView.php      # Vista formulario
├── .env                    # Variables de entorno (configuración BD)
└── composer.json           # Dependencias del proyecto
```

## Funcionalidades Implementadas:

### Operaciones CRUD:

1. **Create (Crear)**: Formulario para crear nuevas tareas con título, descripción, fecha de creación y fecha de vencimiento.
2. **Read (Leer)**:
   - Listado completo de todas las tareas
   - Vista detallada de una tarea individual
3. **Update (Actualizar)**: Formulario pre-rellenado para editar tareas existentes.
4. **Delete (Eliminar)**: Eliminación de tareas de la base de datos.

## Rutas Disponibles:

- `GET /` → Página principal
- `GET /list` → Listado de todas las tareas
- `GET /task/read/{id}` → Detalle de una tarea específica
- `GET /task/create` → Formulario para crear nueva tarea
- `POST /task/create` → Procesar creación de tarea
- `GET /task/update/{id}` → Formulario para editar tarea
- `POST /task/update/{id}` → Procesar actualización de tarea
- `GET /task/delete/{id}` → Eliminar tarea

## Recursos Generales:

Presentaciones y videos del Tema 5:
- Introducción a CRUD con Doctrine
- Operaciones Create, Read, Update, Delete

Material de apoyo:
- Web oficial de Doctrine ORM (https://www.doctrine-project.org/)
- Documentación de Doctrine DBAL
- Patrón MVC en PHP

## License

This work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License.

<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a>

## Credits

Authors: Lluís Alandete ([@lalandete](mailto:lalandete@florida-uni.es))