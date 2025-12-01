# Evaluación AEV2 - Nacho Fayos Martinez

---

## ✅ EJERCICIOS COMPLETADOS

| Ejercicio | Estado | Observaciones |
|-----------|--------|---------------|
| Ej. 0 - Configuración inicial | ✅ | Problema en rutas: action incorrecta |
| Ej. 1 - Modelado BD | ⚠️ | Múltiples errores críticos en entidades |
| Ej. 2.1 - Vistas y Consultas | ⚠️ | Falta información en algunos listados |
| Ej. 2.2 - CRUD Productos | ⚠️ | Implementado pero con errores en entidades |
| Ej. 3.1 - CRUD Empleados | ⚠️ | Implementado pero con errores en entidades |
| Ej. 3.2 - CRUD Departamentos | ⚠️ | Implementado pero con errores en entidades |
| Ej. 4.1 - CRUD Clientes | ⚠️ | Implementado pero con errores en entidades |
| Ej. 4.2 - CRUD Pedidos | ⚠️ | Implementado pero con errores en entidades |

**Leyenda:** ✅ Completo | ⚠️ Parcial | ❌ No realizado

---

## 🔍 ANÁLISIS DETALLADO


### Ejercicio 1 - Modelado de Entidades

#### Entity: Department

- **Problema:** Tipo de dato incorrecto para id
    - Ubicación: `src/Entity/Department.php:22`
    - Estado actual: `type: 'integer', length:2`
    - **Cómo corregir:** Debe ser `type: 'smallint'` sin length (length no aplica a integers)

- **Problema:** Campo `department_name` sin configuración `unique`
    - Ubicación: `src/Entity/Department.php:26`
    - Estado actual: `#[Column(name:'DNOMBRE', type: 'string', length:14)]`
    - **Cómo corregir:** Añadir `unique: true` → `#[Column(name:'DNOMBRE', type: 'string', length:14, unique: true)]`

- **Problema:** Campos `location` y `color` configurados como no nullable cuando deberían ser opcionales
    - Ubicación: `src/Entity/Department.php:28,31`
    - Estado actual: No tienen `nullable: true`
    - **Cómo corregir:** Añadir `nullable: true` a ambos campos y cambiar tipo PHP a nullable (`?string`)

- **Problema:** Asociación OneToMany con Employee mal configurada
    - Ubicación: `src/Entity/Department.php:34`
    - Estado actual: `#[OneToMany(mappedBy: "id", targetEntity: Employee::Class)]`
    - **Cómo corregir:** El `mappedBy` debe ser `"department"` (nombre de la propiedad en Employee, no "id"). Debe ser: `#[OneToMany(targetEntity: Employee::class, mappedBy: 'department')]`

#### Entity: Employee

- **Problema:** Campo `office` sin configuración nullable cuando debería ser opcional
    - Ubicación: `src/Entity/Employee.php:28`
    - Estado actual: `#[Column(name:'OFICIO',type: 'string', length: 10)]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?string`

- **Problema:** Asociación ManyToOne con Employee (jefe) mal configurada
    - Ubicación: `src/Entity/Employee.php:32-33`
    - Estado actual: `#[ManyToOne(inversedBy: 'employee',targetEntity:Employee::Class)]`
    - **Cómo corregir:** El `inversedBy` debe ser `"subordinates"` (no "employee"). Debe ser: `#[ManyToOne(targetEntity: Employee::class, inversedBy: 'subordinates')]`

- **Problema:** Falta la asociación OneToMany con subordinados
    - Ubicación: `src/Entity/Employee.php` (no existe)
    - **Cómo corregir:** Añadir propiedad `private Collection $subordinates` con `#[OneToMany(targetEntity: Employee::class, mappedBy: 'boss')]` e inicializarla en el constructor

- **Problema:** Campo `start_date` sin configuración nullable
    - Ubicación: `src/Entity/Employee.php:36`
    - Estado actual: `#[Column(name:'FECHA_ALTA',type: 'date')]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?\DateTime`

- **Problema:** Campo `salary` sin configuración nullable
    - Ubicación: `src/Entity/Employee.php:39`
    - Estado actual: `#[Column(name:'SALARIO',type: 'integer')]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?int`. Según la BD, este campo puede ser NULL

- **Problema:** Asociación ManyToOne con Department mal configurada
    - Ubicación: `src/Entity/Employee.php:45-46`
    - Estado actual: `#[ManyToOne(inversedBy: 'employee',targetEntity:Department::Class)]`
    - **Cómo corregir:** El `inversedBy` debe ser `"employees"` (no "employee"). Debe ser: `#[ManyToOne(targetEntity: Department::class, inversedBy: 'employees')]`

- **Problema:** Asociación OneToMany con Client mal configurada
    - Ubicación: `src/Entity/Employee.php:49`
    - Estado actual: `#[OneToMany(mappedBy: "id", targetEntity: Client::Class)]`
    - **Cómo corregir:** El `mappedBy` debe ser `"representant"` (nombre de la propiedad en Client, no "id"). Debe ser: `#[OneToMany(targetEntity: Client::class, mappedBy: 'representant')]`

#### Entity: Client

- **Problema:** Campo `status` sin configuración nullable
    - Ubicación: `src/Entity/Client.php:38`
    - Estado actual: `#[Column(name: 'ESTADO', type: 'string', length: 2)]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?string`

- **Problema:** Campo `area` sin configuración nullable
    - Ubicación: `src/Entity/Client.php:44`
    - Estado actual: `#[Column(name: 'AREA', type: 'smallint')]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?int`

- **Problema:** Campo `phone` sin configuración nullable
    - Ubicación: `src/Entity/Client.php:47`
    - Estado actual: `#[Column(name: 'TELEFONO', type: 'string', length: 9)]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?string`

- **Problema:** Asociación ManyToOne con Employee mal configurada
    - Ubicación: `src/Entity/Client.php:50-51`
    - Estado actual: `#[ManyToOne(inversedBy: "client", targetEntity: Employee::class)]` y falta `nullable: true` en JoinColumn
    - **Cómo corregir:** El `inversedBy` debe ser `"clients"` (plural). Añadir `nullable: true` en JoinColumn

- **Problema:** Campo `credit` con precision incorrecta
    - Ubicación: `src/Entity/Client.php:54`
    - Estado actual: `precision: 9`
    - **Cómo corregir:** Debe ser `precision: 8` y añadir `nullable: true`

- **Problema:** Campo `observations` sin configuración nullable
    - Ubicación: `src/Entity/Client.php:57`
    - Estado actual: `#[Column(name: 'OBSERVACIONES', type: 'text')]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?string`

- **Problema:** Asociación OneToMany con Order mal configurada
    - Ubicación: `src/Entity/Client.php:60`
    - Estado actual: `#[OneToMany(mappedBy: "client_code", targetEntity: Order::Class)]`
    - **Cómo corregir:** El `mappedBy` debe ser `"client_code"` (nombre de la propiedad en Order). Sin embargo, es recomendable cambiar el nombre de la propiedad en Order a `$customer` y aquí usar `mappedBy: 'customer'` para mantener nomenclatura en inglés consistente

#### Entity: Product

- **Problema:** Campo `description` sin configuración unique
    - Ubicación: `src/Entity/Product.php:26`
    - Estado actual: `#[Column(name: 'DESCRIPCION', type: 'string', length: 30)]`
    - **Cómo corregir:** Añadir `unique: true` → `#[Column(name: 'DESCRIPCION', type: 'string', length: 30, unique: true)]`

- **Problema:** Asociación OneToMany con Detail mal configurada
    - Ubicación: `src/Entity/Product.php:29`
    - Estado actual: `#[OneToMany(mappedBy: 'product_number', targetEntity: Detail::class)]`
    - **Cómo corregir:** El `mappedBy` debe ser `"product_number"` (nombre de la propiedad en Detail). Sin embargo, es recomendable cambiar el nombre de la propiedad en Detail a `$product` y aquí usar `mappedBy: 'product'` para mantener nomenclatura consistente

#### Entity: Order

- **Problema:** Campo `order_date` sin configuración nullable
    - Ubicación: `src/Entity/Order.php:28`
    - Estado actual: `#[Column(name: 'PEDIDO_FECHA', type: 'date')]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?\DateTime`

- **Problema:** Campo `order_type` no está configurado como ENUM
    - Ubicación: `src/Entity/Order.php:31`
    - Estado actual: `#[Column(name: 'PEDIDO_TIPO', type: 'string', length: 1, nullable: true)]`
    - **Cómo corregir:** Debe ser: `#[Column(name: 'PEDIDO_TIPO', type: 'string', nullable: true, columnDefinition: "ENUM('A', 'B', 'C')")]` (sin length)

- **Problema:** Campo `sending_date` sin configuración nullable
    - Ubicación: `src/Entity/Order.php:38`
    - Estado actual: `#[Column(name: 'FECHA_ENVIO', type: 'date')]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?\DateTime`

- **Problema:** Campo `total` sin configuración nullable
    - Ubicación: `src/Entity/Order.php:41`
    - Estado actual: `#[Column(name: 'TOTAL', type: 'decimal', precision: 8, scale: 2)]`
    - **Cómo corregir:** Añadir `nullable: true` y cambiar tipo PHP a `?float`

- **Problema:** Asociación OneToMany con Detail mal configurada
    - Ubicación: `src/Entity/Order.php:44`
    - Estado actual: `#[OneToMany(mappedBy: 'id2', targetEntity: Detail::class)]`
    - **Cómo corregir:** El `mappedBy` debe coincidir con el nombre de la propiedad en Detail. Si en Detail la propiedad se llama `$id2`, es incorrecto. Debe llamarse `$order` y aquí usar `mappedBy: 'order'`

#### Entity: Detail

- **Problema:** Estructura de clave primaria compuesta incorrecta
    - Ubicación: `src/Entity/Detail.php:20-29`
    - Estado actual: Tiene un `id` con `DETALLE_NUM` y una relación `$id2` marcada como Id
    - **Cómo corregir:** La clave primaria compuesta es (PEDIDO_NUM, DETALLE_NUM). Configurar correctamente:
    ```php
    #[Id]
    #[ManyToOne(targetEntity: Order::class, inversedBy: 'details')]
    #[JoinColumn(name: 'PEDIDO_NUM', referencedColumnName: 'PEDIDO_NUM', nullable: false)]
    private Order $order;

    #[Id]
    #[Column(name: 'DETALLE_NUM', type: 'smallint')]
    private int $detailNumber;
    ```
    - PROD_NUM debe ser solo una relación ManyToOne SIN `#[Id]`

---

### Ejercicio 2.1 - Vistas y Consultas

**Problema: Listado de Empleados falta información**
- El enunciado requiere: "Mostrar número de clientes asignados"
- La vista `EmployeeList.html` no muestra el número de clientes asignados a cada empleado
- **FALTA** una columna mostrando `$employee->getClients()->count()`
- **Cómo corregir:** Añadir una columna "Nº Clientes" en la vista que muestre `<?php echo $employee->getClients()->count(); ?>`

**Problema: Listado de Departamentos falta información**
- El enunciado requiere: "Mostrar el número de empleados de cada departamento"
- La vista `DepartmentList.html` solo muestra ID, Nombre, Ubicación y Color
- **FALTA** una columna mostrando `$department->getEmployees()->count()`
- **Cómo corregir:** Añadir una columna "Nº Empleados" en la vista que muestre `<?php echo $department->getEmployees()->count(); ?>`

---

### Ejercicio 2.2 - CRUD Productos

Los problemas de este ejercicio derivan principalmente de los errores en el modelado de entidades (asociaciones mal configuradas).

---

### Ejercicio 3.1 - CRUD Empleados

#### Create

- **Problema:** Validación de jefe incompleta
    - Ubicación: `src/Controllers/EmployeeController.php:75-80`
    - Estado actual: Comprueba si `$boss == $_POST['id']` pero no hace nada si es verdadero
    - **Cómo corregir:** Debe mostrar un mensaje de error y no crear el empleado si intenta asignarse a sí mismo como jefe

#### Update

- **Problema:** Error en actualización de comisión
    - Ubicación: `src/Controllers/EmployeeController.php:125-127`
    - Estado actual: `$employees->setComission($employees->getComission())` (asigna el mismo valor que ya tiene)
    - **Cómo corregir:** Debe ser `$employees->setComission($_POST['commision'])` o eliminar este bloque si no se va a actualizar

- **Problema:** Falta validación de que no se asigne a sí mismo como jefe
    - Ubicación: `src/Controllers/EmployeeController.php:133-136`
    - **Cómo corregir:** Añadir la misma validación que en create para evitar que un empleado sea su propio jefe

#### Delete

- **Problema:** No verifica subordinados antes de eliminar
    - Ubicación: `src/Controllers/EmployeeController.php:162-176`
    - El enunciado requiere: "Verificar que NO tenga subordinados"
    - **Cómo corregir:** Antes de eliminar, verificar que el empleado no tenga subordinados. Sin embargo, esto requiere primero corregir la asociación OneToMany con subordinados en la entidad Employee. Una vez corregida, verificar que `$employee->getSubordinates()->count() === 0` y mostrar advertencia si los tiene

- **Problema:** No verifica clientes asignados antes de eliminar
    - Ubicación: `src/Controllers/EmployeeController.php:162-176`
    - El enunciado requiere: "Verificar que NO tenga clientes asignados"
    - **Cómo corregir:** Verificar que `$employee->getClients()->count() === 0`. Mostrar advertencia en la vista si tiene clientes

- **Problema:** La vista de delete no muestra advertencias
    - Ubicación: `public/assets/EmployeeCRUD/Deleteform.html`
    - **Cómo corregir:** Añadir código para mostrar el número de subordinados y clientes asignados como advertencia antes de permitir la eliminación

---

### Ejercicio 3.2 - CRUD Departamentos

#### Delete

- **Problema:** No verifica empleados antes de eliminar
    - Ubicación: `src/Controllers/DepartmentController.php:131-145`
    - El enunciado requiere: "Verificar que NO tenga empleados asignados"
    - **Cómo corregir:** Verificar que `$department->getEmployees()->count() === 0`. Mostrar advertencia en la vista si tiene empleados

- **Problema:** La vista de delete no muestra advertencias
    - Ubicación: `public/assets/DepartmentCRUD/Deleteform.html`
    - **Cómo corregir:** Añadir código para mostrar el número de empleados asignados como advertencia antes de permitir la eliminación

---

### Ejercicio 4.1 - CRUD Clientes

#### Delete

- **Problema:** No verifica pedidos antes de eliminar
    - Ubicación: `src/Controllers/ClientController.php:166-180`
    - El enunciado requiere: "Verificar que NO tenga pedidos"
    - **Cómo corregir:** Verificar que `$client->getOrders()->count() === 0` antes de permitir la eliminación. Actualmente la vista muestra los pedidos, pero el controlador no previene la eliminación

---

### Ejercicio 4.2 - CRUD Pedidos

#### Delete

- **Problema:** No verifica detalles antes de eliminar
    - Ubicación: `src/Controllers/OrderController.php:146-159`
    - El enunciado requiere: "Verificar que NO tenga detalles"
    - **Cómo corregir:** Verificar que `$order->getDetails()->count() === 0` antes de permitir la eliminación. Actualmente la vista muestra los detalles, pero el controlador no previene la eliminación

---

## 📝 RESUMEN FINAL

- **Nota:** 9.5

Enhorabona per l'esforç 💪


