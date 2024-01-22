@include('plantillas.navBar')

<main>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">

    <section id="form-ui">
        <form action="{{ route('subordinado.add') }}" method="post" class="form">
            @csrf
            <div id="form-body">
                <h2>Registrar Subordinado</h2>

                <!--Campo oculto para el ID del vendedor y/o del subordinado principal si viene de un subordinado-->
                <input type="hidden" name="idVendedor" value="{{ $vendedor->id }}">
                <input type="hidden" name="idSubordinadoPrincipal" value="{{ $idSubordinadoPrincipal ?? null }}">

                <!-- Area de inputs, aqui se ingresan los datos requeridos -->
                <div id="input-area">
                    <label>Nombre</label>
                    <div class="form-inp">
                        <input name="nombre" id="nombre" placeholder="Nombre(s)" type="text" maxlength="60" minlength="4" required>
                    </div>
                    @error('nombre')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Apellido Paterno</label>
                    <div class="form-inp">
                        <input name="apellidoPaterno" id="apellidoPaterno" placeholder="Apellido Paterno" type="text" maxlength="40" minlength="3" required>
                    </div>
                    @error('apellidoPaterno')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Apellido Materno</label>
                    <div class="form-inp">
                        <input name="apellidoMaterno" id="apellidoMaterno" placeholder="Apellido Materno" type="text" maxlength="40" minlength="3" required>
                    </div>
                    @error('apellidoMaterno')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Domicilio</label>
                    <div class="form-inp">
                        <input name="domicilio" id="domicilio" placeholder="Ingrese su Domicilio" type="text" maxlength="100" minlength="5" required>
                    </div>
                    @error('domicilio')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Numero de celular</label>
                    <div class="form-inp">
                        <input name="celular" id="celular" placeholder="Ingrese su numero de celular" type="text" pattern="\d{10}" required>
                    </div>
                    @error('celular')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Telefono de casa</label>
                    <div class="form-inp">
                        <input name="telefonoDeCasa" id="telefonoDeCasa" placeholder="Ingrese el numero del telefono de casa" type="text" pattern="\d{10}" required>
                    </div>
                    @error('telefonoDeCasa')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Email</label>
                    <div class="form-inp">
                        <input name="email" id="email" placeholder="Email Address" type="text" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                    </div>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Nivel</label>
                    <div class="form-inp">
                        <input type="text" value="{{ $nivel }}" readonly>
                    </div>
                </div>

                <div id="submitBtn">
                    <button id="submit-button" type="submit">Registrar</button>
                </div>

                <div id="return-index">
                    <a href="{{ route('subordinados.show', ['id' => $vendedor->id]) }}">Volver a jerarquia</a>
                </div>
               
            </div>
        </form>
    </section>
</main>
    
</body>
</html>