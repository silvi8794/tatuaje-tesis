<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;


Trait ApiResponser
{
    //----ApiResponse tendra el codigo necesario para construir las respuestas de nuestra API----//

    //*---Metodo successResponse
    //Metodo encargado de construir respuestas satisfactorias
    //en formato JSON
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    //*---Metodo errorResponse
    //Metodo encargado de construir respuestas de error
    //en formato JSON
    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    //*---Metodo showAll
    //Metodo encargado de mostrar una respuesta con multiples elementos,
    //es decir, una coleccion, por ej. cuando se retorna la lista de todos los alumnos
    protected function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()){

            return $this->successResponse([ 'data' => $collection], $code);
        }

        $transformer = $collection->first()->transformer;

        $collection = $this->filterData($collection, $transformer);
        $collection = $this->sortData($collection, $transformer);
        $collection = $this->paginate($collection);
        $collection = $this->transformData($collection, $transformer);
        //$collection = $this->cacheResponse($collection);

         return $this->successResponse($collection, $code);
        //return $this->successResponse(['data' => $collection], $code);
    }

    //*---Metodo showOne
    //Metodo encargado de mostrar una respuesta con una instancia especifica
    //de un Modelo, por ej. cuando retornamos una instancia de un curso existente
    protected function showOne(Model $instance, $code = 200)
    {
        $transformer = $instance->transformer;
        $instance = $this->transformData($instance, $transformer);

        return $this->successResponse($instance, $code);
        //return $this->successResponse(['data' => $instance], $code);
    }

     protected function filterData(Collection $collection, $transformer)
    {
        foreach (request()->query() as $query => $value) {
            $attribute = $transformer::originalAttribute($query);

            if (isset($attribute, $value)) {
                $collection = $collection->where($attribute, $value);
            }
        }

        return $collection;
    }

    //ordena
     protected function sortData(Collection $collection, $transformer)
    {
        if(request()->has('sort_by')){
            $attribute = $transformer::originalAttribute(request()->sort_by);

            $collection = $collection->sortBy->{$attribute};
        }

        return $collection;

    }

    protected function paginate(Collection $collection)
    {

        $rules = [
            'per_page' => 'integer|min:2|max:50'
        ];

        Validator::validate(request()->all(), $rules);

        //Resolver pagina en la cual nos encontramos (actual)
        $page = LengthAwarePaginator::resolveCurrentPage();

        //Cantidad de elementos por pagina
        $perPage = 10;

        //Definir tamaño de pagina personalizado
        if (request()->has('per_page')) {

            $perPage = (int) request()->per_page;
        }


        //Dividir la coleccion en diferentes secciones dependiendo del tamaño de la pagina
        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();


        //Creacion de instancia del paginador
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        //Agregar a los resultados paginados la lista de parametros que puedan estar incluidos y no perderlos
        $paginated->appends(request()->all());

        return $paginated;
    }



    protected function transformData($data, $transformer)
    {
        //$transformation = fractal($data, new $transformer);

        //return $transformation->toArray();
        return $data;
    }

     protected function showMessage($message, $code = 200)
    {

        return $this->successResponse(['data' => $message], $code);
    }


    // protected function cacheResponse($data)
    // {
    //     //Determinar url de la solicitud
    //     $url = request()->url();

    //     //obtener parametros de la url para ordenarlos
    //     //para evitar inconsistencias con la cache
    //     $queryParams = request()->query();

    //     //Metodo que ordena array de parametros dependiendo de la clave
    //     ksort($queryParams);

    //     //Construir queryString
    //     $queryString = http_build_query($queryParams);

    //     //Construir URL completa
    //     $fullUrl = "{$url}?{$queryString}";

    //     return Cache::remember($fullUrl, 15/60, function() use($data){
    //         return $data;
    //     });
    // }


}
