<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModelosRequest;
use App\Http\Requests\UpdateModelosRequest;
use App\Repositories\ModelosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Marca;

class ModelosController extends AppBaseController
{
    /** @var  ModelosRepository */
    private $modelosRepository;

    public function __construct(ModelosRepository $modelosRepo)
    {
        $this->modelosRepository = $modelosRepo;
    }

    /**
     * Display a listing of the Modelos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modelosRepository->pushCriteria(new RequestCriteria($request));
        $modelos = $this->modelosRepository->paginate(10);

        return view('modelos.index')
            ->with('modelos', $modelos);
    }

    /**
     * Show the form for creating a new Modelos.
     *
     * @return Response
     */
    public function create()
    {
        $marcas = Marca::all();
        return view('modelos.create')->with('marcas', $marcas);
    }

    /**
     * Store a newly created Modelos in storage.
     *
     * @param CreateModelosRequest $request
     *
     * @return Response
     */
    public function store(CreateModelosRequest $request)
    {
        $input = $request->all();

        $modelos = $this->modelosRepository->create($input);

        Flash::success('Modelos saved successfully.');

        return redirect(route('modelos.index'));
    }

    /**
     * Display the specified Modelos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modelos = $this->modelosRepository->findWithoutFail($id);

        if (empty($modelos)) {
            Flash::error('Modelos not found');

            return redirect(route('modelos.index'));
        }

        return view('modelos.show')->with('modelos', $modelos);
    }

    /**
     * Show the form for editing the specified Modelos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modelos = $this->modelosRepository->findWithoutFail($id);

        if (empty($modelos)) {
            Flash::error('Modelos not found');

            return redirect(route('modelos.index'));
        }
        $marcas = Marca::all();
        return view('modelos.edit')->with('modelos', $modelos)->with('marcas', $marcas);
    }

    /**
     * Update the specified Modelos in storage.
     *
     * @param  int              $id
     * @param UpdateModelosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModelosRequest $request)
    {
        $modelos = $this->modelosRepository->findWithoutFail($id);

        if (empty($modelos)) {
            Flash::error('Modelos not found');

            return redirect(route('modelos.index'));
        }

        $modelos = $this->modelosRepository->update($request->all(), $id);

        Flash::success('Modelos updated successfully.');

        return redirect(route('modelos.index'));
    }

    /**
     * Remove the specified Modelos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modelos = $this->modelosRepository->findWithoutFail($id);

        if (empty($modelos)) {
            Flash::error('Modelos not found');

            return redirect(route('modelos.index'));
        }

        $this->modelosRepository->delete($id);

        Flash::success('Modelos deleted successfully.');

        return redirect(route('modelos.index'));
    }
}
