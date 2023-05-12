<!-- Sidebar-->
<div class="border-end bg-w" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-w">TechShop</div>
    <div class="list-group list-group-flush bg-w">
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('dashboard') ? 'active':''; }}" href="{{ url('dashboard')}}">
            <i class="mx-2 bi bi-speedometer2"></i> Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('category') ? 'active':''; }}" href="{{ url('category')}}">
            <i class="mx-2 bi bi-phone"></i> Categories</a>
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('add-category') ? 'active':'';}}" href="{{ url('add-category')}}">
            <i class="mx-2 bi bi-phone"></i> Add Cayegories </a>
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('products') ? 'active':'';}}" href="{{ url('products')}}">
            <i class="mx-2 bi bi-boxes"></i> Products</a>
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('add-products') ? 'active':'';}}" href="{{ url('add-products')}}">
            <i class="mx-2 bi bi-box-arrow-in-down"></i> Add products</a>
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('orders') ? 'active':'';}}" href="{{ url('orders')}}">
            <i class="mx-2 bi bi-clipboard-check"></i> Orders </a>
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('users') ? 'active':'';}}" href="{{ url('users')}}">
            <i class="mx-2 bi bi-people"></i> Users </a>
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('suppliers') ? 'active':''; }}" href="{{ url('suppliers')}}">
            <i class="mx-2 bi bi-person-add"></i> Suppliers</a>
        <a class="list-group-item list-group-item-action list-group-item-w  p-3 {{ Request::is('map') ? 'active':'';}}" href="{{ url('map')}}">
            <i class="mx-2 bi bi-map"></i> Map </a>
</div>
</div>
<!-- Page content wrapper-->
