{literal}
<div id="vue-comentario">
    <ul id="vue-comentario" class="list-group">
        <li v-for="comentario in comentarios"> 
            Mensaje: {{ comentario.mensaje }}
            <br>
            Valoración: {{ comentario.valoracion }}
            <button v-if="isAdmin" :data-id-comentario="comentario.id_comentario" v-on:click="deleteComentario">Eliminar</button>
         </li>
    </ul>
</div>
{/literal}