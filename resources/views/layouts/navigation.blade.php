<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('site/img/profile_small_Eliot Humerez.jpg') }}" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">CEO and Funder Humcorp <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    GD+
                </div>
            </li>

            @php
                //echo "<h1>ELIOT</h1>";
            $user = \Illuminate\Support\Facades\Auth::user();
            $rol = $user->rol;
            $modulos = \App\Modulo::getModulosPorRol($user->id_rol);
            //echo $modulos;
            $moduloActive = 0;
            $cuActive = 0;
            @endphp
            @foreach($modulos as $modulo)
                @if($modulo->es_enlace == 'N')
                    <li id="mod-{{ $modulo->id }}">
                        <a href="#"><i class="{{ $modulo->icono }}"></i> <span class="nav-label"> {{ $modulo->modulo_nombre }} </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            @php
                                $casosUso = \App\CasoUso::getCUPorModuloYRol($modulo->id,$rol->id);
                            @endphp
                            @foreach($casosUso as $cu)
                                @php
                                    $isActiveRole = \App\Modulo::esCUActualPorRUTA($cu->ruta);
                                        $class = '';
                                        if ($isActiveRole) {

                                            $class = 'active';
                                            $moduloActive = $modulo->id;
                                            $cuActive = $cu->id;
                                        }
                                @endphp
                                <li class="{{ $class }}" id="cu-{{ $cu->id }}"><a href="{{ url('') }}/{{ $cu->ruta }}">{{ $cu->caso_uso_nombre }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    @php
                        $isActive = \App\Modulo::esCUActualPorRUTA($modulo->ruta);
                                $class = '';
                                if ($isActive) {
                                    $class = 'active';
                                    $moduloActive = $modulo->id;
                                }
                    @endphp
                    <li id="mod-{{ $modulo->id }}" class="{{ $class }}">
                        <a href="{{ url('') }}/{{ $modulo->ruta }}"><i class="{{ $modulo->icono }}"></i> <span class="nav-label"> {{ $modulo->modulo_nombre }} </span> </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
@push('scripts')
<script type="text/javascript">
    $("#mod-{{ $moduloActive }}").addClass("active");
    $("#cu-{{ $cuActive }}").addClass("active");
</script>
@endpush