<!-- Nav tabs -->
<div class="leaflet-sidebar-tabs">
    <ul role="tablist">
        <!-- top aligned tabs -->
        <li><a href="#home" role="tab"><i class="fa fa-bars"></i></a></li>

    </ul>

    <ul role="tablist">
    </ul>
</div>

<!-- Tab panes -->
<div class="leaflet-sidebar-content">

    <div class="leaflet-sidebar-pane" id="home">
        <h1 class="leaflet-sidebar-header">


            Busqueda de ruta



            <div class="leaflet-sidebar-close"><i class="fa fa-caret-left"></i></div>
        </h1>
        <form action="">
            <div class="form-group pt-2">
                <label for="nombre" class="form-label">Nombre:

                </label>

                <div data-controller="input">
                    <input class="form-control" name="name" title="Full Name:" placeholder="Introduca su nombre"
                        required="required" id="nombre">
                </div>


            </div>
            <label for="lineas" class="form-label">Elija una línea:</label>

            <select name="lineas" id="lineas" class="form-control">
                <option value="" selected="selected">Sin seleccion</option>
                <optgroup label="Bizkaia">
                    <option value="1">Lezama-Ermua</option>
                    <option value="2">Lezama-Bermeo</option>
                </optgroup>
                <optgroup label="Gipuzkoa">
                    <option value="3">L3</option>
                    <option value="4">Ermua-Hendaia</option>
                </optgroup>

            </select>
        </form>
    </div>


</div>
