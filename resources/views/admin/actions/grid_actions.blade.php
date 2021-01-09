<a href="{{ route($routePrefix.'.edit', $instance->$primaryKey) }}" class="table-action"><i class="fa fa-edit"></i></a>
<a href="{{ route($routePrefix.'.show', $instance->$primaryKey) }}" class="table-action"><i class="fa fa-eye"></i></a>
<a href="{{ route($routePrefix.'.destroy', $instance->$primaryKey) }}" class="table-action table-action-delete"><i class="fa fa-trash"></i></a>
