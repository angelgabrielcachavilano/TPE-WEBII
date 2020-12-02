{literal}
<div id="app">
    <table class="table table-striped tabladecomentarios">
        <thead>
            <th scope="col">Comentario</th>
            <th scope="col">Puntuacion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Correo</th>
            <th scope="col">Admin</th>
        </thead>
        <tbody id="container" v-for="comment in comments">
            <template>
            <td>{{comment.contenido}}</td>
            <td>{{comment.puntuacion}}</td>
            <td>{{comment.fecha}}</td>
            <td>{{comment.email}}</td>
            <a  class="btn btn-danger mt-2" v-on:click="deleteComment(comment.id_comentario)">Borrar</a>
        </template >
        </tbody>
</div>
</table>
</div>
{/literal}