const baseURL = "/tpe-web2-p2";
let app = new Vue({
    el: '#vue-comentario',
    data: {
        comentarios: [],
        isAdmin: false
    },
    methods: {
        deleteComentario: function(event){
            deleteComentario(event.target.attributes["data-id-comentario"].value);
        }
    }
});

function getProductRouteId() {
    const pathSplit = window.location.pathname.split("/"); 
    return pathSplit[pathSplit.length - 1];
} 

document.addEventListener('DOMContentLoaded', ()=>{
    const productId = parseInt(this.getProductRouteId());
    getComentariosByProduct(productId);
    document.querySelector('#form-comentario').addEventListener("submit", e => {
        e.preventDefault();
        addComentario();
    });
});

function getComentariosByProduct(productId) {
    fetch(baseURL + '/api/productos/' + productId + '/comentarios/')
        .then(response => response.json())
        .then(response => {
            app.comentarios = response.comments;
            app.isAdmin = response.isAdmin;
        })
        .catch(error => console.log(error))
}  

function addComentario() {
    const comentario = {
        mensaje: document.querySelector('#inputComentario').value,
        id_guitarra: getProductRouteId(),
        valoracion: document.querySelector('#selectValoracion').value
    };

    fetch(baseURL + '/api/comentarios', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(comentario)
    })
    .then(response => {
        if (response.status === 401) {
            alert('Es necesario iniciar sesión para escribir comentarios');
            return;
        }
        return response.json();
    })
    .then(comentarioDB => {
        if (comentarioDB) {
            app.comentarios.push(comentarioDB);
            document.querySelector('#form-comentario').reset();
        }
    })
    .catch(error => console.log(error))
}

function deleteComentario(idComentario) {
    fetch(baseURL + '/api/comentarios/' + idComentario, {
        method: "DELETE"
    })
    .then(response => response.json())
    .then((comentario) => {
        const comentarioIndex = app.comentarios.map((c) => {return c.id_comentario}).indexOf(idComentario);
        if(comentarioIndex !== -1){
            app.comentarios.splice(comentarioIndex, 1);
        }
    })
    .catch(error => console.log(error))
}
