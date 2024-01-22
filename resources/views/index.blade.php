@include('plantillas.navBar')

<main>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <button class="addVendedor"> <a href="{{ route('registroVendedores') }}">Agregar vendedor</a> </button>
      
    <section class="list">
        @foreach($vendedores as $vendedor)
        <div class="card">
            <div class="decoration">
                <form action="{{ route('vendedor.destroy', $vendedor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnDelete">
                        <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                            <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
                        </svg>
                    </button>
                </form>
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

               <div class="buttons">
                <a class="action" href="{{ route('subordinados.show', ['id' => $vendedor->id]) }}"> Ver más <span aria-hidden="true"> → </span> </a>

                <a class="btnEdit" href="{{ route('vendedor.edit', ['id' => $vendedor->id]) }}">
                    Edit 
                    <svg class="svg" viewBox="0 0 512 512">
                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                    </svg>
                </a>
               </div>
            </div>
        </div>
        @endforeach
    </section>

</main>
    
</body>
</html>