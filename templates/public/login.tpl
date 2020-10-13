{include file='templates/public/header.tpl'}

    <div class="row mt-5">
        <div class="col-4"></div>
        <div class=" col-4 mt-5">
            <form action="veryUser" method="POST" class="formuser textuser">
                <h1 class="titulopp">Login</h1>
                <img src="images/logo.png" width="350" height="250" class="d-inline-block align-top" alt="" loading="lazy">
                <div class="form-group col-12">
                    <label for="staticEmail" class="col-sm-2 col-form-label mt-4">Email</label>
                    <div>
                        <input type="text" class="form-control mt-4 " name="email" id="staticEmail" placeholder="Ingrese su email aqui">
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div>
                        <input type="password" class="form-control " name="password" placeholder="Ingrese su contraseña aqui">
                    </div>
                </div>
                {if LOGUEADO === false}
                <div class="alertuser mb-5 mt-2" role="alert">
                    {$message}
                </div>
                {/if}
                <button type="submit" class="btn btn-success mb-3">Login</button>
                <a type="submit" class="btn btn-info mb-3 ml-3" href="{BASE_URL}showSignIn">Registarte</a>
                <a type="submit" class="btn btn-secondary mb-3 ml-3" href="{BASE_URL}home">Entrar como invitado</a>
            </form>
        </div>
        <div class="col-4"></div>
    </div>

{include file='templates/public/footer.tpl'}