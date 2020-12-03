    <form action="buscarProducto" method="post">
        <div>
            <label for="precioMin">Precio Minimo</label>
            <input id="precioMinimo" name="input_precioMinimo">
        </div>
        <div>
            <label for="precioMax">Precio Maximo</label>
            <input id="precioMaximo" name="input_precioMaximo">
        </div>
        <div>
            <label for="modelo">Marca</label>
                <select id="marca" name="select_marca">
                    {foreach from=$marcas_smarty item=marca}
                    <option value="{$marca->id_marca}">{$marca->nombre_marca}</option>
                    {/foreach}
                </select>
        </div>
        <button type="submit">Buscar</button>
    </form>