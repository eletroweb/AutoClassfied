<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioFieldRequest;
use App\Http\Requests\UpdateAnuncioFieldRequest;
use App\Repositories\AnuncioFieldRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioFieldController extends AppBaseController
{
    /** @var  AnuncioFieldRepository */
    private $anuncioFieldRepository;

    public function __construct(AnuncioFieldRepository $anuncioFieldRepo)
    {
        $this->anuncioFieldRepository = $anuncioFieldRepo;
    }

    /**
     * Display a listing of the AnuncioField.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioFieldRepository->pushCriteria(new RequestCriteria($request));
        $anuncioFields = $this->anuncioFieldRepository->all();

        return view('anuncio_fields.index')
            ->with('anuncioFields', $anuncioFields);
    }

    /**
     * Show the form for creating a new AnuncioField.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_fields.create');
    }

    /**
     * Store a newly created AnuncioField in storage.
     *
     * @param CreateAnuncioFieldRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioFieldRequest $request)
    {
        $input = $request->all();

        $anuncioField = $this->anuncioFieldRepository->create($input);

        Flash::success('Campo personalizado criado com sucesso!');

        return redirect(route('anuncioFields.index'));
    }

    /**
     * Display the specified AnuncioField.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioField = $this->anuncioFieldRepository->findWithoutFail($id);

        if (empty($anuncioField)) {
            Flash::error('Anuncio Field not found');

            return redirect(route('anuncioFields.index'));
        }

        return view('anuncio_fields.show')->with('anuncioField', $anuncioField);
    }

    /**
     * Show the form for editing the specified AnuncioField.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioField = $this->anuncioFieldRepository->findWithoutFail($id);

        if (empty($anuncioField)) {
            Flash::error('Anuncio Field not found');

            return redirect(route('anuncioFields.index'));
        }

        return view('anuncio_fields.edit')->with('anuncioField', $anuncioField);
    }

    /**
     * Update the specified AnuncioField in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioFieldRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioFieldRequest $request)
    {
        $anuncioField = $this->anuncioFieldRepository->findWithoutFail($id);

        if (empty($anuncioField)) {
            Flash::error('Anuncio Field not found');

            return redirect(route('anuncioFields.index'));
        }

        $anuncioField = $this->anuncioFieldRepository->update($request->all(), $id);

        Flash::success('Anuncio Field updated successfully.');

        return redirect(route('anuncioFields.index'));
    }

    /**
     * Remove the specified AnuncioField from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioField = $this->anuncioFieldRepository->findWithoutFail($id);

        if (empty($anuncioField)) {
            Flash::error('Anuncio Field not found');

            return redirect(route('anuncioFields.index'));
        }

        $this->anuncioFieldRepository->delete($id);

        Flash::success('Anuncio Field deleted successfully.');

        return redirect(route('anuncioFields.index'));
    }
}
