<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionItemRequest;
use App\Http\Requests\UpdateTransactionItemRequest;
use App\Repositories\TransactionItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransactionItemController extends AppBaseController
{
    /** @var  TransactionItemRepository */
    private $transactionItemRepository;

    public function __construct(TransactionItemRepository $transactionItemRepo)
    {
        $this->transactionItemRepository = $transactionItemRepo;
    }

    /**
     * Display a listing of the TransactionItem.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transactionItemRepository->pushCriteria(new RequestCriteria($request));
        $transactionItems = $this->transactionItemRepository->all();

        return view('transaction_items.index')
            ->with('transactionItems', $transactionItems);
    }

    /**
     * Show the form for creating a new TransactionItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('transaction_items.create');
    }

    /**
     * Store a newly created TransactionItem in storage.
     *
     * @param CreateTransactionItemRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionItemRequest $request)
    {
        $input = $request->all();

        $transactionItem = $this->transactionItemRepository->create($input);

        Flash::success('Transaction Item saved successfully.');

        return redirect(route('transactionItems.index'));
    }

    /**
     * Display the specified TransactionItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transactionItem = $this->transactionItemRepository->findWithoutFail($id);

        if (empty($transactionItem)) {
            Flash::error('Transaction Item not found');

            return redirect(route('transactionItems.index'));
        }

        return view('transaction_items.show')->with('transactionItem', $transactionItem);
    }

    /**
     * Show the form for editing the specified TransactionItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transactionItem = $this->transactionItemRepository->findWithoutFail($id);

        if (empty($transactionItem)) {
            Flash::error('Transaction Item not found');

            return redirect(route('transactionItems.index'));
        }

        return view('transaction_items.edit')->with('transactionItem', $transactionItem);
    }

    /**
     * Update the specified TransactionItem in storage.
     *
     * @param  int              $id
     * @param UpdateTransactionItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionItemRequest $request)
    {
        $transactionItem = $this->transactionItemRepository->findWithoutFail($id);

        if (empty($transactionItem)) {
            Flash::error('Transaction Item not found');

            return redirect(route('transactionItems.index'));
        }

        $transactionItem = $this->transactionItemRepository->update($request->all(), $id);

        Flash::success('Transaction Item updated successfully.');

        return redirect(route('transactionItems.index'));
    }

    /**
     * Remove the specified TransactionItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transactionItem = $this->transactionItemRepository->findWithoutFail($id);

        if (empty($transactionItem)) {
            Flash::error('Transaction Item not found');

            return redirect(route('transactionItems.index'));
        }

        $this->transactionItemRepository->delete($id);

        Flash::success('Transaction Item deleted successfully.');

        return redirect(route('transactionItems.index'));
    }
}
