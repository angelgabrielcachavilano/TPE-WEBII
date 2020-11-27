{include file='templates/public/header.tpl'}


<div class="row  mt-3 mb-3 ">
    <div class="col-2"></div>
    <div class="card col-8 infobeer cartabeer">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6"><img src="{BASE_URL}{$beer->imagen}" class="imgbeerinfo imagec "></div>
            <div class="col-3"></div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{$beer->nombre}
            </h5>
            <p>Tipo: <small>{$beer->categoria_nombre}</small></p>
            <p class="card-text">{$beer->descripcion}</p>
        </div>
        <ul class="list-group list-group-flush ">
            <li class="list-group-item licolor">
                <p><b>PRECIO</b>: ${$beer->precio}</p>
            </li>
            <li class="list-group-item licolor">
                <p><b>IBU</b>: {$beer->ibu}</p>
            </li>
            <li class="list-group-item licolor">
                <p><b>ALCOHOL</b>: {$beer->alcohol}%</p>
            </li>
        </ul>
        <div class="card-body">
            {if $user !== false}


            <div class="row mb-5">
                <div class="col-3"></div>
                <div class="col-6 addcom mt-2">
                    <form action="{BASE_URL}user/agregarComentario/{$beer->id_cerveza}" method="POST" id="form-comentario" class="form-group mt-2">
                        <input type="hidden" name='idCerveza' value='{$beer->id_cerveza}' class="form-control" />
                        <input type="hidden" name='idUsuario' value='{$user->id_user}' class="form-control" />
                        <h4 class="form-group">Formulario de comentario</h4>
                        <select name="puntuacion" class="form-control mb-2">
                <option hidden selected>Selecciona un puntaje</option>

                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="4">5</option>
            </select>
                        <div>
                            <label>Tu comentario:</label>
                            <textarea name="contenido" rows="5" cols="60" placeholder="Deje su comentario aqui :)"></textarea>
                        </div>
                        <label for="start">Fecha :</label>
                        <input type="date" id="start" name="fecha" value="2020-12-03" min="2019-01-01" max="2022-12-31">
                        <button type="submit" value="comentario" name="comentario" class="btn btn-success">Enviar</button>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
            {/if}
        </div>
    </div>
    <div class="col-2"></div>
</div>







<div id="app">
    <table class="table table-striped tabladecomentarios">
        <thead>
            <th scope="col">Comentario</th>
            <th scope="col">Puntuacion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Correo</th>
            {if ISADMIN === true}

            <th scope="col">ADMIN</th>
            {/if}
        </thead>
        <tbody id="container">
            <!-- {foreach $comments as $comment } -->
            <tr>
                <!-- <td>{$comment->contenido}</td>
                <td>{$comment->puntuacion}</td>
                <td>{$comment->fecha}</td>
                <td>{$comment->email}</td> -->

                <td>

                    {if ISADMIN === true}
                    <a href='{BASE_URL}api/deleteCommentary/{$comment->id_comentario}' id="delete">Borrar</a> {/if}
                </td>
            </tr>
            {/foreach}
        </tbody>
</div>
</table>

<script src="js/comment.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
{include file='templates/public/footer.tpl'}