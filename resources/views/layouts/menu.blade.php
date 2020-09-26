<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roles.plural')</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('models/users.plural')</span></a>
</li>

<li class="{{ Request::is('managers*') ? 'active' : '' }}">
    <a href="{{ route('managers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/managers.plural')</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i
            class="fa fa-edit"></i><span>@lang('models/categories.plural')</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}"><i class="fa fa-edit"></i><span>@lang('models/products.plural')</span></a>
</li>

<li class="{{ Request::is('branches*') ? 'active' : '' }}">
    <a href="{{ route('branches.index') }}"><i class="fa fa-edit"></i><span>@lang('models/branches.plural')</span></a>
</li>

<li class="{{ Request::is('departments*') ? 'active' : '' }}">
    <a href="{{ route('departments.index') }}"><i class="fa fa-edit"></i><span>@lang('models/departments.plural')</span></a>
</li>

<li class="{{ Request::is('employees*') ? 'active' : '' }}">
    <a href="{{ route('employees.index') }}"><i class="fa fa-edit"></i><span>@lang('models/employees.plural')</span></a>
</li>

<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{{ route('customers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/customers.plural')</span></a>
</li>

<li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
    <a href="{{ route('suppliers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/suppliers.plural')</span></a>
</li>

<li class="{{ Request::is('quotations*') ? 'active' : '' }}">
    <ul>
        <a href="{{ route('quotations.index') }}"><i
                class="fa fa-edit"></i><span>@lang('models/quotations.plural')</span></a>
    </ul>
    <ul>
        <a href="{{ route('quotations.index') }}"><i
                class="fa fa-edit"></i><span>@lang('models/quotations.plural')</span></a>
    </ul>
</li>

