<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVersaoRequest;
use App\Http\Requests\UpdateVersaoRequest;
use App\Repositories\VersaoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modelos;

class VersaoController extends AppBaseController
{
    /** @var  VersaoRepository */
    private $versaoRepository;

    public function __construct(VersaoRepository $versaoRepo)
    {
        $this->versaoRepository = $versaoRepo;
    }

    /**
     * Display a listing of the Versao.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->versaoRepository->pushCriteria(new RequestCriteria($request));
        $versoes = $this->versaoRepository->paginate(10);

        return view('versoes.index')
            ->with('versoes', $versoes);
    }

    /**
     * Show the form for creating a new Versao.
     *
     * @return Response
     */
    public function create()
    {
          $modelos = Modelos::all();
        return view('versoes.create')->with('modelos', $modelos);
    }

    /**
     * Store a newly created Versao in storage.
     *
     * @param CreateVersaoRequest $request
     *
     * @return Response
     */
    public function store(CreateVersaoRequest $request)
    {
        $input = $request->all();

        $versao = $this->versaoRepository->create($input);

        Flash::success('Versao saved successfully.');

        return redirect(route('versoes.index'));
    }

    /**
     * Display the specified Versao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $versao = $this->versaoRepository->findWithoutFail($id);

        if (empty($versao)) {
            Flash::error('Versao not found');

            return redirect(route('versoes.index'));
        }

        return view('versoes.show')->with('versao', $versao);
    }

    /**
     * Show the form for editing the specified Versao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $versao = $this->versaoRepository->findWithoutFail($id);

        if (empty($versao)) {
            Flash::error('Versao not found');

            return redirect(route('versoes.index'));
        }
        $modelos = Modelos::all();
        return view('versoes.edit')->with('versao', $versao)->with('modelos', $modelos);
    }

    /**
     * Update the specified Versao in storage.
     *
     * @param  int              $id
     * @param UpdateVersaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVersaoRequest $request)
    {
        $versao = $this->versaoRepository->findWithoutFail($id);

        if (empty($versao)) {
            Flash::error('Versao not found');

            return redirect(route('versoes.index'));
        }

        $versao = $this->versaoRepository->update($request->all(), $id);

        Flash::success('Versao updated successfully.');

        return redirect(route('versoes.index'));
    }

    /**
     * Remove the specified Versao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $versao = $this->versaoRepository->findWithoutFail($id);

        if (empty($versao)) {
            Flash::error('Versao not found');

            return redirect(route('versoes.index'));
        }

        $this->versaoRepository->delete($id);

        Flash::success('Versao deleted successfully.');

        return redirect(route('versoes.index'));
    }
}
