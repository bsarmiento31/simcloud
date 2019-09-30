<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Perfil</h2>
        <ol class="breadcrumb">
            <li>
                <a href="inicio">Home</a>
            </li>
            <li class="active">
                <strong>Peril</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        
    </div>
</div>

<div class="row m-b-lg m-t-lg animated fadeInRight">
    <div class="col-md-6">
        <div class="profile-image">
            <img src="<?php echo $contactos["foto"]  ?>" class="img-circle circle-border m-b-md" alt="profile">
        </div>
        <div class="profile-info">
            <div class="">
                <div>
                    <h2 class="no-margins">
                    asas
                    </h2>
                    <h4>Contacto de assa</h4>
                    <small>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <table class="table small m-b-xs">
            <tbody>
                <tr>
                    <td>
                        <strong>142</strong> Projects
                    </td>
                    <td>
                        <strong>22</strong> Followers
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>61</strong> Comments
                    </td>
                    <td>
                        <strong>54</strong> Articles
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>154</strong> Tags
                    </td>
                    <td>
                        <strong>32</strong> Friends
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-3">
        <small>Sales in last 24h</small>
        <h2 class="no-margins">206 480</h2>
        <div id="sparkline1"></div>
    </div>

</div>

<div class="row animated fadeInRight">
    <div class="col-lg-3">
        <div class="ibox">
            <div class="ibox-content">
                <h3>About saas</h3>
                <p class="small">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                    <br/>
                    <br/>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                </p>
                <p class="small font-bold">
                    <span><i class="fa fa-circle text-navy"></i> Online status</span>
                </p>
            </div>
        </div>

        <div class="ibox">
                <div class="ibox-content">
                    <h3>Documentos Relacionados</h3>
                        <ul class="list-unstyled file-list">
                            <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                            <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                            <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                            <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                            <li><a href=""><i class="fa fa-file-powerpoint-o"></i> Presentation.pptx</a></li>
                            <li><a href=""><i class="fa fa-file"></i> 10_08_2015.docx</a></li>
                        </ul>
                </div>
            </div>
                <div class="ibox">
                    <div class="ibox-content">
                            <h3>Mensajes Privados</h3>

                            <p class="small">
                                Enviar mensaje aassa
                            </p>

                            <div class="form-group">
                                <label>Asunto</label>
                                <input type="email" class="form-control" placeholder="Asunto">
                            </div>
                            <div class="form-group">
                                <label>Mensaje</label>
                                <textarea class="form-control" placeholder="Tu Mensaje" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block">Enviar</button>

                    </div>
                </div>

    </div>

<div class="col-lg-5">

    <div class="ibox">
            <div class="ibox-content">
                <h3>Información personal</h3>
                <hr>
                <br>
                <h3>Nombre</h3>
                <h2>sdds</h2>
                <hr>
                <h3>Empresa</h3>
                <h2>sdsd</h2>
                <hr>
                <h3>Email</h3>
                <h2>sdd</h2>
                <hr>
                <h3>Cargo</h3>
                <h2>sdds</h2>
                <hr>
                <h3>Celular</h3>
                <h2>sdds</h2>
                <hr>
                <h3>Telefono</h3>
                <h2>sdd</h2>
                <hr>
                <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#modalEditarContactos">Editar</button>
            </div>
        </div>

</div>


    <div class="col-lg-4 m-b-lg">
        <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
            <div class="vertical-timeline-block">
                <div class="vertical-timeline-icon navy-bg">
                    <i class="fa fa-briefcase"></i>
                </div>

                <div class="vertical-timeline-content">
                    <h2>Notas</h2>
                    <div class="form-group">
                        <textarea class="form-control" id="ContactoNotaText" placeholder="Agregar Nota" rows="3" required></textarea>
                    </div>
                    <input type="hidden" placeholder="id" id="idContactoNotaText" value="sdsd"  >

                    <button id="guardar" class="btn btn-primary">Agregar</button>
                  
                    <div id="respuesta"><p class="small"></p></div>
                    <!-- <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                    </p> -->
                   <!--  <span class="vertical-date">
                    Today <br>
                    <small>Dec 24</small>
                    </span> -->              
                </div>
            </div>

            <div class="vertical-timeline-block">
                <div class="vertical-timeline-icon blue-bg">
                    <i class="fa fa-file-text"></i>
                </div>

                <div class="vertical-timeline-content">
                    <h2>Send documents to Mike</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                    <a href="#" class="btn btn-sm btn-success"> Download document </a>
                        <span class="vertical-date">
                            Today <br>
                            <small>Dec 24</small>
                        </span>
                </div>
            </div>

            <div class="vertical-timeline-block">
                <div class="vertical-timeline-icon lazur-bg">
                    <i class="fa fa-coffee"></i>
                </div>

                <div class="vertical-timeline-content">
                    <h2>Coffee Break</h2>
                    <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                    <a href="#" class="btn btn-sm btn-info">Read more</a>
                    <span class="vertical-date"> Yesterday <br><small>Dec 23</small></span>
                </div>
            </div>

            <div class="vertical-timeline-block">
                <div class="vertical-timeline-icon yellow-bg">
                    <i class="fa fa-phone"></i>
                </div>

                <div class="vertical-timeline-content">
                    <h2>Phone with Jeronimo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                    <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                </div>
            </div>

            <div class="vertical-timeline-block">
                <div class="vertical-timeline-icon navy-bg">
                    <i class="fa fa-comments"></i>
                </div>

                <div class="vertical-timeline-content">
                    <h2>Chat with Monica and Sandra</h2>
                    <p>Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
                    <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                </div>
            </div>
        </div>

    </div>
    
</div>




<!-- Editar Cliente-->

 <div class="modal inmodal" id="modalEditarContactos" tabindex="-1" role="dialog"  aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content animated fadeIn">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <i class="fa fa-clock-o modal-icon"></i>
                 <h4 class="modal-title">Editar el contacto</h4>
                 <small>Ingrese los datos correspondientes del contacto</small>
             </div>
             <div class="modal-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">

                <input type="hidden" placeholder="id" id="editarIdContacto"  name="editarIdContacto">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del contacto</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Nombre" id="editarNombreContacto" name="editarNombreContacto" class="form-control">
                           
                        </div>
                    </div> 
                    
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Empresa</label>
                        <div class="col-sm-10">
                        <select class="form-control m-b" id="editarClienteContacto" name="editarClienteContacto">
                        
                               <option value="ghghgh">ghghgh</option>
                           
                        </select>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" placeholder="Email" id="editarEmailContacto" name="editarEmailContacto" class="form-control">
                           
                        </div>
                    </div>
 
                    <div class="hr-line-dashed"></div>

                     <div class="form-group">
                        <label class="col-sm-2 control-label">Cargo</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Cargo" id="editarCargoContacto" name="editarCargoContacto" class="form-control">
                           
                        </div>
                    </div> 

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="telefono" id="editarTelefonoContacto" name="editarTelefonoContacto" class="form-control">
                           
                        </div>
                    </div> 

                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Celular</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Celular" id="editarCelularContacto" name="editarCelularContacto" class="form-control">
                           
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subir Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control nuevaFotoContacto" id="editarFotoContacto" name="editarFotoContacto">
                            <p>Peso máximo de la foto 2MB</p>
                            <img src="vistas/img/profile_small.jpg" class="img-thumbnail previsualizarContacto" width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                        </div>
                    </div> 

                    
                 

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar Contacto</button>
                </div>
        
                </form>
              
             </div>
            
         </div>
     </div>
</div>


