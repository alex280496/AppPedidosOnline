@extends('layouts.app')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ ('/img/profile_city.jpg') }}')">
  </div>
  <div class="main main-raised">
    <div class="container-fluid">

      <div class="text-center">
        <h2 class="title">Listado de Productos</h2>
        <div class="team">
           <div class="row">
             <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a>
            

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th >Categoria</th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center">{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category ? $product->category->name : 'General'}}</td>
                        <td class="text-right">&euro; {{$product->price}}</td>
                        <td class="td-actions text-right">
                            

                            <form method="post" action="{{ url( '/admin/products/'.$product->id) }}">
                              {{ csrf_field() }}
                              {{ method_field('DELETE')}} 
                              <a rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                <i class="fa fa-info"></i>
                              </a>
                              <a  href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                                  <i class="fa fa-edit"></i>
                              </a>

                              <button   rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs">
                                <i class="fa fa-times"></i>
                            </button>
                              
                            </form>


                            
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$products->links()}}

          </div>
        </div>
      </div>

      
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
@endsection
