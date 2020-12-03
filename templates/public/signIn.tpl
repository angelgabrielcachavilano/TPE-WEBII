{include file='templates/public/header.tpl'}
<div class="row mt-5">
    <div class="col-4"></div>
    <div class=" col-4 mt-5">

        <form action="singIn" method="POST" class="formreg textuser">
            <h1 class="tituloreg mt-3">Registarse</h1>

            <img src="images/logo.png" width="350" height="250" class="d-inline-block align-top" alt="" loading="lazy">

            <div class="form-group col-12">

                <label for="staticEmail" class="col-sm-2 col-form-label mt-4">Email</label>

                <div>
                    <input type="text" class="form-control mt-4 " name="email" id="staticEmail" placeholder="Ingrese su email aqui">
                </div>
            </div>

            <div class="form-group col-12">
                <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                <div>
                    <input type="password" class="form-control " name="password" placeholder="Ingrese su contraseña aqui">
                </div>
            </div>
            <div class="form-group col-12">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirmar contraseña</label>
                <div>
                    <input type="password" class="form-control " name="password2" placeholder="Confirme su contraseña aqui">
                </div>
            </div>


            {if isset($error)}
            <div class="alertuserreg mb-5 mt-2" role="alert">{$error}</div>
            {/if}


            <button type="submit" class="btn btn-success mb-3">Enviar</button>
            <a type="submit" class="btn btn-info mb-3 ml-3" href="{BASE_URL}login">Cancelar</a>

        </form>
    </div>
    <div class="col-4"></div>
</div>
{include file='templates/public/footer.tpl'}