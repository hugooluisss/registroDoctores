<ul class="media-list">
{foreach from=$lista item="row"}
	<li class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="{$row.miniatura}" alt="{$row.nombre}">
		</a>
		<div class="media-body">
			<h4 class="media-heading">{$row.nombre}</h4>
			<span class="text-muted">{$row.real}</span>
			<div class="pull-right">
				<button type="button" class="btn btn-danger btn-circle btn-xs" action="eliminar" title="Eliminar" nombre='{$row.nombre}'><i class="fa fa-remove"></i> Eliminar</button>
			</div>
		</div>
	</li>
{foreachelse}
	<li>Sin objetos en el repositorio</li>
{/foreach}
</ul>