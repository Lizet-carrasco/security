@extends('frontend.layouts.master')

@section('page-header')
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{{ trans('strings.here') }}</li>
@endsection


@section('renderjs')
<style>


</style>

<script>
 var table = new DataTable('#example', {
    "aoColumns": [
        { "sWidth": "2%" },
        { "sWidth": "10%" }, 
        { "sWidth": "10%" },
        { "sWidth": "20%" },
        { "sWidth": "10%" },
        { "sWidth": "5%" }, 
    ],
    // Otras configuraciones y opciones de DataTable
});

// Obtiene los datos de la quinta columna
var dataColumn5 = table.column(5).data();

// Modifica los datos eliminando los puntos y comas
table.rows().every(function() {
    var data = this.data();
    data[5] = data[5].replace(/;/g, ''); // Reemplaza todos los puntos y comas por ""
    this.data(data);
});

// Redibuja la DataTable con los datos modificados
table.draw();

</script>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
           
			<div class="panel panel-primary">
				<div class="panel-heading">
                    <i class="fa fa-list"></i> Oferta Educativa de <b>Seguridad Informática y Seguridad de Información</b> por Escuelas de la {{$universidad->nombre}}
                    <div class="pull-right">                        
                        <a class="btn btn-default btn-xs btn-plus"  href="/facultades_frontend/{{$universidad->id}}"><< Regresar</a>
                    </div>
                </div>
				<div class="panel-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr class="filters">
                                <th>N</th>
                                <th>Nombre</th>
                                <th>Siglas</th>
                                <th>Plan de estudios</th>  
                                <th>Periodo</th>   
                                <th>cursos</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n=1; ?>
                            @foreach($escuelas as $e)
                            <tr>
                                <td><?php echo $n; $n++; ?></td>
                                <td>{{$e->escuela}}</td>
                                <td>{{$e->sigla}}</td>
                                <td><a target="_blank" href="{{$e->enlace_plan}}">Plan de estudios</a></td>
                                <td>{{$e->periodo_inicio}} - {{$e->periodo_fin}}</td>
                                <td>{{$e->curso}}</td>                           
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div><!-- row -->
@endsection