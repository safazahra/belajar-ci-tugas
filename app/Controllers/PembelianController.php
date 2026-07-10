<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class PembelianController extends BaseController
{
    protected $transactionModel;
    protected $detailModel;

    public function __construct()
    {
        helper('number');

        $this->transactionModel = new TransactionModel();
        $this->detailModel = new TransactionDetailModel();
    }

    public function index()
    {
        $transactions = $this->transactionModel->findAll();

        $transactionIds = array_column($transactions, 'id');

        $products = $this->detailModel
            ->getProductsByTransactionIds($transactionIds);

        $data = [
            'transactions' => $transactions,
            'products'     => $products
        ];

        return view('pembelian/index', $data);
    }

    public function ubahStatus($id)
    {
        $transaksi = $this->transactionModel->find($id);

        if (!$transaksi) {
            return redirect()->back();
        }

        $statusBaru = ($transaksi['status'] == 0) ? 1 : 0;

        $this->transactionModel->update($id, [
            'status' => $statusBaru
        ]);

        return redirect()->to(base_url('pembelian'));
    }
}