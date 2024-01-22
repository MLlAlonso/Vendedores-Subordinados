@include('plantillas.navBar')

<main>
    <link rel="stylesheet" href="{{ asset('css/subordinado.css') }}">

    <h1 class="level1"> Jerarquia de: <span class="title" class="nombre" id="nombre">{{ $vendedor->nombre }} {{ $vendedor->apellidoPaterno }} {{ $vendedor->apellidoMaterno }}</span> </h1>
    
    <section class="list">
        <div class="card">
            <div class="decoration">
                <form action="{{ route('vendedor.destroy', $vendedor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnDelete">
                        <span class="fa-solid fa-trash"></span>
                    </button>
                </form>
                <a class="btnEdit" href="{{ route('vendedor.edit', ['id' => $vendedor->id]) }}">
                    Edit 
                    <svg class="svg" viewBox="0 0 512 512">
                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                    </svg>
                </a>
            </div>

            <div class="content">
               <a href="{{ route('subordinados') }}">
                 <span class="title" class="nombre" id="nombre">{{ $vendedor->nombre }} {{ $vendedor->apellidoPaterno }} {{ $vendedor->apellidoMaterno }}</span>
               </a>
           
               <p class="desc" name="celular" id="celular">
                   <span class="fa-solid fa-mobile-button"></span> {{ $vendedor->celular }}
               </p>
               <p class="desc" name="telefonoDeCasa" id="telefonoDeCasa">
                   <span class="fa-solid fa-square-phone"></span> {{ $vendedor->telefonoDeCasa }}
               </p>
               <p class="desc" name="email" id="email">
                   <span class="fa-solid fa-envelope"></span> {{ $vendedor->email }}
               </p>
               <p class="desc" name="domicilio" id="domicilio">
                   <span class="fa-solid fa-house"></span> {{ $vendedor->domicilio }}
               </p>
               
               <a class="action" href="{{ route('vendedor.addSubordinadoForm', ['id' => $vendedor->id]) }}"> Añadir subordinado </a>
            
            </div>
        </div>
    </section>

    <section class="sub">
        <h2 class="levelLabel">Nivel: <p name="nivel" id="nivel" class="levelLabel"></p></h2>

        <div class="subordinadosList">

            <div class="card">
                <div class="decorationSub">
                    <form action="{{ route('vendedor.destroy', $vendedor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btnDelete">
                            <span class="fa-solid fa-trash"></span>
                        </button>
                    </form>
                    <a class="btnEdit" href="{{ route('vendedor.edit', ['id' => $vendedor->id]) }}">
                        Edit 
                        <svg class="svg" viewBox="0 0 512 512">
                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                        </svg>
                    </a>
                </div>
    
                <div class="content">
                    <span class="title nombre" id="nombre">{{ $vendedor->nombre }} {{ $vendedor->apellidoPaterno }} {{ $vendedor->apellidoMaterno }}</span>
                    <p class="desc" name="celular" id="celular">
                        <span class="fa-solid fa-mobile-button"></span> {{ $vendedor->celular }}
                    </p>
                    <p class="desc" name="telefonoDeCasa" id="telefonoDeCasa">
                        <span class="fa-solid fa-square-phone"></span> {{ $vendedor->telefonoDeCasa }}
                    </p>
                    <p class="desc" name="email" id="email">
                        <span class="fa-solid fa-envelope"></span> {{ $vendedor->email }}
                    </p>
                    <p class="desc" name="domicilio" id="domicilio">
                        <span class="fa-solid fa-house"></span> {{ $vendedor->domicilio }}
                    </p>
    
                    <a class="action" href="{{ route('subordinados.show', ['id' => $vendedor->id]) }}"> Añadir subordinado <span aria-hidden="true"> → </span> </a>
                </div>
            </div>

        </div>
    </section>

</main>
    
</body>
</html>