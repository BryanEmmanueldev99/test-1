<?php 

$b = 1;
//mientras haya sesion de WC Adminstrador pinta el contenido de...
while ($id_rol_sesion == $WC_Admin && $b == 1) { ?>  
    <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>almacen/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/almacen.png" alt="almacen">
              <p>Almacén</p>
              <strong>Total: <?php echo $total_almacen; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>compras/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/compras.png" alt="almacen">
              <p>Compras</p>
              <strong>Total: <?php echo $total_almacen; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>roles/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/roles.png" alt="roles">
              <p>Roles</p>
              <strong>Total: <?php echo $total_roles; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>usuarios/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/usuarios.png" alt="usuarios">
              <p>Usuarios</p>
              <strong>Total: <?php echo $total_user; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>
<?php $b++; } ?>


<?php
//mientras haya sesion de Almacén pinta el contenido de...
while ($id_rol_sesion == 15 && $b == 1) { ?>  
    <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>almacen/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/almacen.png" alt="almacen">
              <p>Almacén</p>
              <strong>Total: <?php echo $total_almacen; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>compras/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/compras.png" alt="almacen">
              <p>Compras</p>
              <strong>Total: <?php echo $total_almacen; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>

<?php $b++; } ?>


<?php
//mientras haya sesion de staf de ventas pinta el contenido de...
while ($id_rol_sesion == 12 && $b == 1) { ?>  
    
           <p>Modulos por  cargar...</p>

<?php $b++; } ?>