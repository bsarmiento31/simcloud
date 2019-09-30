<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            

                <h1 class="logo-name" style="margin-right: 10px;">SimCloud</h1>

        
            <form class="m-t" method="post" role="form">
                <div class="form-group">
                    <input type="text" name="ingUsuario" class="form-control" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="ingPassword" class="form-control" placeholder="Contraseña" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>
                <a href="http://simcloud.com.co"><button type="button" class="btn btn-success block full-width m-b">Ir a la web</button></a>

                
                 <?php
 
                    $login = new ControladorUsuarios();
                    $login -> ctrIngresoUsuario();
        
                ?>
            </form>
            <p class="m-t"> <small>Creado por Marktech &copy; 2019</small> </p>
        </div>
    </div>