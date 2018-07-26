<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Anuncio;
use App\User;
use App\Revenda;
use App\VisualizacaoAnuncio;
use Illuminate\Support\Facades\DB;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->paginate(20);

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    public function profile(Request $request){
      $user = Auth::user();
      return view('user.home')->with(['user'=> $user]);
    }

    public function meus_anuncios(Request $request){
      $user = Auth::user();
      $anuncios = Anuncio::where('user', $user->id)->paginate(5);
      return view('user.meusanuncios')->with('anuncios', $anuncios);
    }

    public function fale_conosco(Request $request){
      return view('fale_conosco');
    }

    public function duvida_comprar_carro(Request $request){
      return view('duvidas.comprar_veiculo');
    }

    public function duvida_vender_carro(Request $request){
      return view('duvidas.vender_veiculo');
    }

    public function duvida_anuncios(Request $request){
      return view('duvidas.anuncios');
    }

    public function admin(Request $request){
      $anuncios = VisualizacaoAnuncio::select([DB::raw('visualizacao_anuncios.*, count(*) as `aggregate`'), 'anuncios.*'])
                    ->join('anuncios', 'categories.anuncio', '=', 'anuncios.id')
                    ->groupBy('visualizacaos.id')
                    ->orderBy('aggregate', 'desc')
                    ->limit(10);
      return view('admin.resumo')->with([
                                         'anuncios' => $anuncios,
                                         'usuarios_count'=> User::all()->count(),
                                         'anuncios_count'=> Anuncio::all()->count(),
                                         'revendas_count'=> Revenda::all()->count(),
                                        ]);
    }

    public function tables(Request $request){
      return view('admin.tables');
    }

    public function form(Request $request){
      return view('admin.form');
    }
}
