@extends('layouts.main')

@section('title', 'Ayuda')

@section('breadcumbs')
    <div class="page-head">
        <h2 class="page-head-title">Ayuda</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="/home">Inicio</a></li>
            <li class="active">Ayuda</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Ayuda<span class="panel-subtitle">¿Necesitas ayuda para manejar la aplicación?.</span></div>
                <div class="panel-body">
                    <div class="panel-body">
                        <ul>
                            <li><a href="#descargar">¿C&oacute;mo descargo mi copia de seguridad?</a></li>
                            <li><a href="#cambio">¿C&oacute;mo cambio mi contrase&ntilde;a de seguridad?</a></li>
                            @if (Auth::user()->user_type_id == 1)
                                <li><a href="#nuevo">¿C&oacute;mo creo un usuario nuevo?</a></li>
                                <li><a href="#eliminar">¿C&oacute;mo elimino una copia de seguridad?</a></li>
                            @endif
                        </ul>
                        <a name="descargar"><h2>¿C&oacute;mo descargo mi copia de seguridad?</h2></a>
                        <p>
                            Logueado en su cuenta, encontrar&aacute; en el men&uacute; izquierdo, el submen&uacute;
                            <strong>Copias</strong>; dando click all&iacute;, se listar&aacute; las copias que se 
                            encuentran guardadas hasta el momento. De click en el icono de forma flecha hacia abajo
                            para descargar la copia que requiera.
                        </p>
                        <a name="cambio"><h2>¿C&oacute;mo cambio mi contrase&ntilde;a de seguridad?</h2></a>
                        <p>
                            Logueado en su cuenta, en la parte superior derecha, encontrar&aacute; una imagen de perfil,
                            dando click all&iacute; se desplegara un men&uacute; flotante, de click en <strong>Mi cuenta</strong>.
                            Lo anterior mostrar&aacute; un formulario con los datos actuales; indique en el campo <i>Contraseña</i>
                            la nueva clave y confirmela en el campo <i>Confirme contraseña</i>. Por &uacute;ltimo de click en 
                            actualizar.
                        </p>
                        @if (Auth::user()->user_type_id == 1)
                            <a name="nuevo"><h2>¿C&oacute;mo creo un usuario nuevo?</h2></a>
                            <p>
                                Logueado en su cuenta de administrador, encontrar&aacute; en el men&uacute; izquierdo, el submen&uacute;
                                <strong>Usuarios</strong>, dando click all&iacute; se mostrar&aacute; una lista de todos los usuarios
                                que existen en la plataforma. En la parte superior derecha de la lista, encontrar&aacute; un <i>+</i>
                                en c&uacute;al le dirigir&aacute; al formulario de creaci&oacute;n de un usuario nuevo. Se debe tener en cuenta
                                que el <i>Nombre de negocio</i> no debe contener espacios ni caracteres especiales, ya que este nombre
                                es el que se utilizar&aacute; para la creaci&oacute;n de la carpeta donde se va a almacenar las copias de
                                seguridad.
                            </p>
                            <a name="eliminar"><h2>¿C&oacute;mo elimino una copia de seguridad?</h2></a>
                            <p>
                                Logueado en su cuenta de administrador, encontrar&aacute; en el men&uacute; izquierdo, el submen&uacute;
                                <strong>Copias</strong>; dando click all&iacute;, se listar&aacute;n todas las copias de seguridad de todos los
                                usuarios que se encuentran en la plataforma. Busque la que desea eliminar y de click en el bote de basura que
                                se encuentra en la parte derecha del registro.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
