<?php 

//contador para salir del bucle infinito jaja xd
$i = 0;
//Mientras exista la sesion con el rol WC Adminstrador, entonces...
while($id_rol_sesion == $WC_Admin && $i == 0) { ?>
    
            <!--Modulos usuarios-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <!--<i class="nav-icon fas fa-tachometer-alt"></i>-->
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>usuarios/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo $url; ?>usuarios/create.php" class="nav-link active">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Crear Usuario</p>
                  </a>
                </li>
              </ul>
            </li>

            <!--Modulos roles-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Roles
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>roles/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Roles</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo $url; ?>roles/create.php" class="nav-link acitve wp-admin-option">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Creación de Rol</p>
                  </a>
                </li>
              </ul>
            </li>

            <!--Modulos categorias-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tag"></i>
                <p>
                   Categorías
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>categorias/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de categorias</p>
                  </a>
                </li>
              </ul>
            </li>

            <!--Modulos Almacen-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Almacén
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>almacen/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Productos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo $url; ?>almacen/create.php" class="nav-link acitve wp-admin-option">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Creación de Producto</p>
                  </a>
                </li>
              </ul>
            </li>


            <!--Modulos Proveedores-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-duotone fa-truck"></i>
                <p>
                  Proveedores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>proveedores/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Proveedores</p>
                  </a>
                </li>
              </ul>
            </li>


             <!--Modulos Compras-->
             <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Compras
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>compras/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de compras</p>
                  </a>
                </li>
              </ul>
            </li>


            <!--Modulos Ventas-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
              <i class="nav-icon fas fa fa-handshake"></i>
                <p>
                  Ventas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>ventas/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de ventas</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>ventas/create.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear nueva venta</p>
                  </a>
                </li>
              </ul>
            </li>

            <!--Modulos Inventario-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-cubes"></i>
                <p>
                  Inventario
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>inventario/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ajuste de inventario</p>
                  </a>
                </li>
              </ul>
            </li>

            <!--Modulos Clientes-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-star"></i>
                <p>
                  Clientes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>client/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de clientes</p>
                  </a>
                </li>
              </ul>
            </li>

<?php    $i++;  }  ?>


<?php if($rol_sesion != $WC_Admin){  ?>
  
             <?php if($id_rol_sesion == 15) { ?>

            <!--Modulos Almacen-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Almacén
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>almacen/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Productos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo $url; ?>almacen/create.php" class="nav-link acitve wp-admin-option">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Creación de Producto</p>
                  </a>
                </li>
              </ul>
            </li>


            <!--Modulos Proveedores-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-duotone fa-truck"></i>
                <p>
                  Proveedores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>proveedores/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Proveedores</p>
                  </a>
                </li>
              </ul>
            </li>


             <!--Modulos Compras-->
             <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Compras
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>compras/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de compras</p>
                  </a>
                </li>
              </ul>
            </li> 

           <?php }else if($id_rol_sesion == 12) { ?>
                       <!--Modulos Ventas-->
            <li class="nav-item">
              <a href="#" class="nav-link active">
              <i class="nav-icon fas fa fa-handshake"></i>
                <p>
                  Ventas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>ventas/" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de ventas</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $url; ?>ventas/create.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear nueva venta</p>
                  </a>
                </li>
              </ul>
            </li>
         <?php  } ?>

    <?php   }  ?>





