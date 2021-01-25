@if (in_array('edit', $actions))
    <a href="{{ route($routePrefix.'.edit', $model->$primaryKey) }}" class="table-action"><i class="fa fa-edit"></i></a>
@endif

@if (in_array('show', $actions))
    <a href="{{ route($routePrefix.'.show', $model->$primaryKey) }}" class="table-action"><i class="fa fa-eye"></i></a>
@endif

@if (in_array('destroy', $actions))
    <a href="{{ route($routePrefix.'.destroy', $model->$primaryKey) }}" class="table-action table-action-delete"><i class="fa fa-trash"></i></a>
@endif
