<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiscountModel;

class DiscountController extends BaseController
{
    protected $discountModel;

    public function __construct()
    {
        helper(['form']);

        $this->discountModel = new DiscountModel();
    }

    public function index()
    {
        $data = [
            'discounts' => $this->discountModel->findAll()
        ];

        return view('diskon/index', $data);
    }

    public function create()
    {
        $rules = [
            'tanggal' => 'required|is_unique[discounts.tanggal]',
            'nominal' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'The tanggal field must contain a unique value.');
        }

        $this->discountModel->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('diskon')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $this->discountModel->update($id, [
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('diskon')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->discountModel->delete($id);

        return redirect()->to('diskon')->with('success', 'Data berhasil dihapus');
    }
}
