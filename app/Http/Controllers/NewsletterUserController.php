<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsletterUserRequest;
use App\Http\Requests\UpdateNewsletterUserRequest;
use App\Repositories\NewsletterUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\NewsletterUser;

class NewsletterUserController extends AppBaseController
{
    /** @var  NewsletterUserRepository */
    private $newsletterUserRepository;

    public function __construct(NewsletterUserRepository $newsletterUserRepo)
    {
        $this->newsletterUserRepository = $newsletterUserRepo;
    }

    /**
     * Display a listing of the NewsletterUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $s = $request->input('s');
        if(empty($s)){
            $newsletterUsers = NewsletterUser::orderBy('id', 'desc')->paginate(20);
        }else{
            $newsletterUsers = NewsletterUser::where('nome', 'like', '%'.$s.'%')
                                              ->orWhere('email', 'like', '%'.$s.'%')
                                              ->distinct()
                                              ->orderBy('id', 'desc')->paginate(20);
        }
        return view('newsletter_users.index')
            ->with('newsletterUsers', $newsletterUsers);
    }

    /**
     * Show the form for creating a new NewsletterUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('newsletter_users.create');
    }

    /**
     * Store a newly created NewsletterUser in storage.
     *
     * @param CreateNewsletterUserRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsletterUserRequest $request)
    {
        $input = $request->all();
        if(NewsletterUser::where('email', $input['email'])->count() <= 0){
            $newsletterUser = $this->newsletterUserRepository->create($input);
        }
        return response()->json('Veículo consultado com sucesso');
    }

    /**
     * Display the specified NewsletterUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            Flash::error('Newsletter User não encontrado');

            return redirect(route('newsletterUsers.index'));
        }

        return view('newsletter_users.show')->with('newsletterUser', $newsletterUser);
    }

    /**
     * Show the form for editing the specified NewsletterUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            Flash::error('Newsletter User não encontrado');

            return redirect(route('newsletterUsers.index'));
        }

        return view('newsletter_users.edit')->with('newsletterUser', $newsletterUser);
    }

    /**
     * Update the specified NewsletterUser in storage.
     *
     * @param  int              $id
     * @param UpdateNewsletterUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsletterUserRequest $request)
    {
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            Flash::error('Newsletter User não encontrado');

            return redirect(route('newsletterUsers.index'));
        }

        $newsletterUser = $this->newsletterUserRepository->update($request->all(), $id);

        Flash::success('Newsletter User atualizado com sucesso.');

        return redirect(route('newsletterUsers.index'));
    }

    /**
     * Remove the specified NewsletterUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsletterUser = $this->newsletterUserRepository->findWithoutFail($id);

        if (empty($newsletterUser)) {
            Flash::error('Newsletter User não encontrado');

            return redirect(route('newsletterUsers.index'));
        }

        $this->newsletterUserRepository->delete($id);

        Flash::success('Newsletter User apagado com sucesso.');

        return redirect(route('newsletterUsers.index'));
    }
}
